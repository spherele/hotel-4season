<?php


namespace All4it;

use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\Entity\ExpressionField;
use Bitrix\Main\LoaderException;
use Bitrix\Main\ORM\Query\Query;
use Bitrix\Main\ORM\Query\QueryHelper;


class IblockHelper
{

    /**
     * Объект таблицы - ОРМ
     * @var object
     */
    private object $tableObj;

    /**
     * @param object $tableObj
     * @throws LoaderException
     */
    public function __construct(object $tableObj)
    {
        try {
            \Bitrix\Main\Loader::includeModule('iblock');
        } catch (\Bitrix\Main\LoaderException $loaderException) {
            throw new \Bitrix\Main\LoaderException($loaderException->getMessage());
        }

        $this->tableObj = $tableObj;
    }

    public function getApiObj(): object
    {
        return $this->tableObj;
    }

    public function setApiObj(object $tableObject): void
    {
        $this->tableObj = $tableObject;
    }

    /**
     * маппинг полей ИБ
     * @return array
     */
    public function fieldsMap(): array
    {
        return $this->tableObj::getMap();
    }


    /**
     * Метод группировки по секциям
     * @param array $ibData
     * @return array
     */
    public function orderIblockArrayBySections(array $ibDataArray): array
    {
        $res = [];

        foreach ($ibDataArray as $item) {
            if (empty($item['SECTION_ID'])) {
                $res['MAIN_SECTION'] = $item;

            } else {
                $res[$item['SECTION_ID']][] = $item;

            }
        }
        return $res;
    }


    private function extendEntityWithPathFields(object $query)
    {
        $query->addField(
            new \Bitrix\Main\Entity\ExpressionField(
                'SECTION_CODE_PATH',
                '
      CONCAT(
          COALESCE(%s,""), "/",
          COALESCE(%s,""), "/",
          COALESCE(%s,""), "/",
          COALESCE(%s,""), "/",
          COALESCE(%s,""), "/"
      )',
                [
                    'IBLOCK_SECTION.PARENT_SECTION.PARENT_SECTION.PARENT_SECTION.PARENT_SECTION.CODE',
                    'IBLOCK_SECTION.PARENT_SECTION.PARENT_SECTION.PARENT_SECTION.CODE',
                    'IBLOCK_SECTION.PARENT_SECTION.PARENT_SECTION.CODE',
                    'IBLOCK_SECTION.PARENT_SECTION.CODE',
                    'IBLOCK_SECTION.CODE',
                ]
            )
        );

        $query->addField(
            new \Bitrix\Main\Entity\ExpressionField(
                'DETAIL_PAGE_URL',
                '
        REPLACE(
            REPLACE(
                REPLACE(
                    REPLACE(
                        REPLACE(
                            REPLACE(
                                REPLACE(
                                    REPLACE(
                                        %s, "#ID#", %s
                                    ), "#ELEMENT_CODE#", %s
                                ), "#SECTION_CODE_PATH#", %s
                            ), "#SITE_DIR#", ""
                        ), "//", "/"
                    ), "//", "/"
                ), "//", "/"
            ), "//", "/"
        )',
                ['IBLOCK.DETAIL_PAGE_URL', 'ID', 'CODE', 'SECTION_CODE_PATH']
            )
        );

        return $query;

    }


    /**
     * МЕтод получения данных из ИБ fetchAll не для большого количества данных если
     * @param array $select
     * @param array $filter
     * @param array $order
     * @param int|null $limit
     * @param int|null $offset
     * @param array $runtime
     * @param bool $cache
     * @param array $cacheSettings
     * @param array $multiplePropsIdArray
     * @return array|null
     * @throws \Exception
     */
    public function getDataFormTable(
        array $select,
        array $filter = [],
        array $order = [],
        int   $limit = null,
        int   $offset = null,
        bool  $cache = false,
        array $multiplePropsIdArray = [] // PROPERTY_LINK_ID
    ): ?array
    {


        if (empty($this->tableObj))
            return null;

        if (empty($select))
            return null;

        $resultArray = [];


        $elementEntity = $this->tableObj::getEntity();
        $this->extendEntityWithPathFields($elementEntity);

        $query = new Query($elementEntity);

        $query->setSelect($select)
            ->setFilter($filter)
            ->setOrder($order);

        if (!is_null($offset))
            $query->setOffset($offset);
        if (!is_null($limit))
            $query->setLimit($limit);
        if ($cache)
            $query->setCacheTtl(36000);

        // Декомпозируем запрос

        if (!empty($multiplePropsIdArray)) {
            $queryCollection = QueryHelper::decompose($query);
        } else {
            $queryCollection = $query->fetchCollection();
        }

        if (empty($queryCollection))
            return [];

        // Выводим результаты
        foreach ($queryCollection as $key => $item) {

            foreach ($select as $itemSelect) {

                if (array_key_exists($itemSelect, $multiplePropsIdArray)) {

                    $this->getMultipleProperties(
                        item: $item,
                        multiplePropsIdArray: $multiplePropsIdArray,
                        itemSelect: $itemSelect,
                        key: $key,
                        resultArray: $resultArray
                    );


                    continue;
                }


                $resultArray[$key][$itemSelect] = $item->get($itemSelect);

                if (is_object($resultArray[$key][$itemSelect])) {
                    if ($resultArray[$key][$itemSelect] instanceof \Bitrix\Main\Type\DateTime) {
                        $formattedDate = $resultArray[$key][$itemSelect]->format('Y-m-d H:i:s'); // Здесь вы можете указать нужный формат даты
                        $resultArray[$key][$itemSelect] = $formattedDate;
                        continue;
                    }

                    $resultArray[$key][$itemSelect] = $resultArray[$key][$itemSelect]->getValue();
                }
            }

        }


        self::getMainLinkedItems(elements: $resultArray);

        return array_values($resultArray);
    }


    private function getMultipleProperties(
        object $item,
        string $itemSelect,
        array  $multiplePropsIdArray,
        int    $key,
        array  &$resultArray
    ): void
    {

        foreach ($item->get($itemSelect)->getAll() as $value) {


            foreach ($multiplePropsIdArray[$itemSelect] as $multipleItem) {
                $itemArray = explode('.', $multipleItem);
                $paramsArray[] = $itemArray[1];
            }


            if (in_array('VALUE', $paramsArray))
                $resultArray[$key][$itemSelect . '_VALUE'][] = $value->getValue();

            if (in_array('DESCRIPTION', $paramsArray))
                $resultArray[$key][$itemSelect . '_DESCRIPTION'][] = $value->getDescription();

        }

    }


    /**
     * @param string $propCode
     * @return array
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    public function getEnumProperty(string $propCode): array
    {

        $res = [];

        $propertyValues = \Bitrix\Iblock\PropertyEnumerationTable::getList([
            'filter' => [
                '=PROPERTY.CODE' => $propCode,
            ],
            'select' => ['ID', 'VALUE', 'XML_ID'],
        ])->fetchAll();

        // Выводим полученные значения
        foreach ($propertyValues as $value) {
            $res[$value['ID']] = $value;
        }

        return $res;
    }


    /**
     * @param array $element
     * @return void
     */
    private static function getMainLinkedItems(array &$elements): void
    {

        foreach ($elements as $key => $element) {

            if (!empty($element['PREVIEW_PICTURE']))
                $elements[$key]['PREVIEW_PICTURE'] = \CFile::GetPath($element['PREVIEW_PICTURE']);

            if (!empty($element['DETAIL_PICTURE']))
                $elements[$key]['DETAIL_PICTURE'] = \CFile::GetPath($element['PREVIEW_PICTURE']);

        }


    }


}