<?

use Bitrix\Intranet\Integration\Templates\Bitrix24\ThemePicker;
use Bitrix\Landing\Binding;
use Bitrix\Main\Composite\StaticArea;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Error;
use Bitrix\Main\ErrorCollection;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Page\AssetLocation;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class ListComponent extends \CBitrixComponent implements \Bitrix\Main\Engine\Contract\Controllerable
{
    /**
     * кешируемые ключи arResult
     * @var array()
     */
    protected  array $cacheKeys = [];

    private object $iblockHelper;

    private  array $arProperties = [];

    private array $arErrors = [];

    private array $arRequiredFields = [];

    private array $arIblockProps = [];

    private array $arIblockLinks = [];


    /**
     * возвращаемые значения
     * @var mixed
     */
    protected $returned;

    public function configureActions() : array
    {
        return [];
    }


    /**
     * подключает языковые файлы
     */
    public function onIncludeComponentLang() : void
    {
        $this->includeComponentLang(basename(__FILE__));
        Loc::loadMessages(__FILE__);
    }

    /**
     * подготавливает входные параметры
     * @param array $this->arParams
     * @return array
     */
    public function onPrepareComponentParams($arParams) : array
    {
        return $arParams;
    }

    /**
     * определяет читать данные из кеша или нет
     * @return bool
     */
    protected function readDataFromCache() : bool
    {
        global $USER;
        if ($this->arParams['CACHE_TYPE'] == 'N')
            return false;

        if (is_array($this->cacheAddon))
            $this->cacheAddon[] = $USER->GetUserGroupArray();
        else
            $this->cacheAddon = array($USER->GetUserGroupArray());

        return !($this->startResultCache(false, $this->cacheAddon, md5(serialize($this->arParams))));
    }

    /**
     * кеширует ключи массива arResult
     */
    protected function putDataToCache() : void
    {
        if (is_array($this->cacheKeys) && sizeof($this->cacheKeys) > 0)
        {
            $this->SetResultCacheKeys($this->cacheKeys);
        }
    }

    /**
     * прерывает кеширование
     */
    protected function abortDataCache() : void
    {
        $this->AbortResultCache();
    }

    /**
     * завершает кеширование
     * @return bool
     */
    protected function endCache() : bool
    {
        if ($this->arParams['CACHE_TYPE'] == 'N')
            return false;

        $this->endResultCache();
    }

    /**
     * проверяет подключение необходиимых модулей
     * @throws \Bitrix\Main\LoaderException
     */
    protected function checkModules() : void
    {
        if (!Loader::includeModule('iblock'))
            throw new \Bitrix\Main\LoaderException('Модуль iblock не подключен');
    }

    /**
     * выполяет действия перед кешированием
     */
    protected function executeProlog() : void
    {
        $this->iblockHelper = new  All4it\IblockHelper(tableObj: $this->arParams['OBJECT']);

    }

    /**
     * проверяет заполнение обязательных параметров
     * @throws Exception
     */
    protected function checkParams() : void
    {
        if (empty($this->arParams['OBJECT']) || !isset($this->arParams['OBJECT'])){
            throw new Exception('Объект инфоблока не найден');
        }

        if (!is_object($this->arParams['OBJECT'])){
            throw new Exception('Параметр инфоблока не является объектом');
        }



    }


    /**
     * выполняет действия после выполения компонента, например установка заголовков из кеша
     */
    protected function executeEpilog() : void
    {
    }


	private function getIblockName(array &$res) : void{

  		 $res[0]['IBLOCK_NAME'] = '';
        // Добавляем названия инфоблоков к результатам
        if (!empty($res[0])) {
            $iblockId = $res[0]['IBLOCK_ID'];
            $res[0]['IBLOCK_NAME'] = CIBlock::GetByID($iblockId)->GetNext()['NAME'];
        }
	}
    /**
     * получение результатов
     */
    protected function getResult() : void
    {
        $res = $this->iblockHelper->getDataFormTable(
            select: $this->arParams['SELECT'] ?? ['ID', 'NAME'],
            filter: $this->arParams['FILTER'] ?? [],
            order:  $this->arParams['ORDER'] ?? [],
            limit: $this->arParams['LIMIT'] ?? 100,
            offset: $this->arParams['OFFSET'] ?? null,
            cache: $this->arParams['CACHE'],
            multiplePropsIdArray: $this->arParams['MULTIPLE_PROPS_ID_ARRAY'] ?? []
        );

		$this->getIblockName($res);



        $this->arResult['ITEMS'] = $res;
    }




    public function executeComponent()
    {
        global $APPLICATION;
        try
        {
            $this->checkModules();
            $this->checkParams();
            $this->executeProlog();

            if (!$this->readDataFromCache())
            {
                $this->getResult();
                $this->putDataToCache();
                $this->includeComponentTemplate();
            }
            $this->executeEpilog();

            return $this->returned;
        }
        catch (Exception $e)
        {
            $this->abortDataCache();
            ShowError($e->getMessage());
        }
    }



}