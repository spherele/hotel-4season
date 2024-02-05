<?
use \Bitrix\Main\Error;
use Bitrix\Main\ErrorCollection;
use \Bitrix\Landing\Binding;
use \Bitrix\Main\SystemException;
use \Bitrix\Main\Localization\Loc as Loc;
use \Bitrix\Main\Loader;
\Bitrix\Main\Loader::includeModule('all4it.rasu');

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class RasuWebformComponent extends \CBitrixComponent implements \Bitrix\Main\Engine\Contract\Controllerable, \Bitrix\Main\Errorable
{
    /**
     * кешируемые ключи arResult
     * @var array()
     */
    protected $cacheKeys = [];

    private $arProperties = [];

    private $arErrors = [];

    private $arRequiredFields = [];

    private $arIblockProps = [];

    private $arIblockLinks = [];

    /**
     * @var int
     */
    private $rowsPerPage = 5;

    /**
     * парамтеры постраничной навигации
     * @var array
     */
    protected $navParams = array();

    /**
     * вохвращаемые значения
     * @var mixed
     */
    protected $returned;

    public function configureActions()
    {
        return [];
    }


    /**
     * подключает языковые файлы
     */
    public function onIncludeComponentLang()
    {
        $this->includeComponentLang(basename(__FILE__));
        Loc::loadMessages(__FILE__);
    }

    /**
     * подготавливает входные параметры
     * @param array $this->arParams
     * @return array
     */
    public function onPrepareComponentParams($params)
    {
        $result = $params;

        if ($params['PAGE_SIZE'])
            $this->rowsPerPage = $params['PAGE_SIZE'];

        return $result;
    }

    /**
     * определяет читать данные из кеша или нет
     * @return bool
     */
    protected function readDataFromCache()
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
    protected function putDataToCache()
    {
        if (is_array($this->cacheKeys) && sizeof($this->cacheKeys) > 0)
        {
            $this->SetResultCacheKeys($this->cacheKeys);
        }
    }

    /**
     * прерывает кеширование
     */
    protected function abortDataCache()
    {
        $this->AbortResultCache();
    }

    /**
     * завершает кеширование
     * @return bool
     */
    protected function endCache()
    {
        if ($this->arParams['CACHE_TYPE'] == 'N')
            return false;

        $this->endResultCache();
    }

    /**
     * проверяет подключение необходиимых модулей
     * @throws LoaderException
     */
    protected function checkModules()
    {
        if (!Loader::includeModule('form'))
            throw new \Main\LoaderException(Loc::getMessage('STANDARD_ELEMENTS_LIST_CLASS_IBLOCK_MODULE_NOT_INSTALLED'));

    }

    /**
     * выполяет действия перед кешированием
     */
    protected function executeProlog()
    {
    }

    /**
     * проверяет заполнение обязательных параметров
     * @throws SystemException
     */
    protected function checkParams()
    {

    }

    /**
     * выполняет действия после выполения компонента, например установка заголовков из кеша
     */
    protected function executeEpilog()
    {
    }


    /**
     * Возвращаем список путей картинок медиабиблиотеки
     * @param string $collectionName
     * @return array
     */
    public function getPhotosFromMediaLibrary(string $collectionName) : array{


        //Перед использованием методов класса, подключаем
        CModule::IncludeModule("fileman");
        CMedialib::Init();


        //Получения списка всех коллекций
        $arCol = \CMedialibCollection::GetList(array('arFilter' => array('ACTIVE' => 'Y')));

        foreach ($arCol as $item){

            if ($item['NAME'] == $collectionName){
                $collectionId = $item['ID'];
            }
        }


        //Получения всех изображений коллекции
        $arItems = \CMedialibItem::GetList(array('arFilter' => array('ACTIVE' => 'Y'),'arCollections' => array($collectionId)));


        //Заполним массив путей к картинкам
        $arImgPath = array();

        foreach ($arItems as $arItem) {
            $imgPath = $arItem['PATH'];
            $arImgPath[] = $imgPath;
        }

        return $arImgPath;



    }

    /**
     * получение результатов
     */
    protected function getResult()
    {


        if (!empty($this->arParams['LIBRARY_COLLECTION_NAME']) && $this->arParams['STEPS'] == true){

            $this->arResult['MEDIALIBRARY_ITEMS'] =  $this->getPhotosFromMediaLibrary($this->arParams['LIBRARY_COLLECTION_NAME']);

        }



        if (intval($this->arParams['WEB_FORM_ID']) <= 0 && $this->arParams['WEB_FORM_ID'] <> '')
        {
            $obForm = CForm::GetBySID($this->arParams['WEB_FORM_ID']);
            if ($arForm = $obForm->Fetch())
            {
                $this->arParams['WEB_FORM_ID'] = $arForm['ID'];
            }
        }

        //bAdmin bSimple
        $this->arResult["bSimple"] = COption::GetOptionString("form", "SIMPLE", "Y") == "N" ? "N" : "Y";
        $this->arResult["bAdmin"] = defined("ADMIN_SECTION") && ADMIN_SECTION===true ? "Y" : "N";

        // check WEB_FORM_ID and get web form data
        $this->arParams["WEB_FORM_ID"] = CForm::GetDataByID(
            $this->arParams["WEB_FORM_ID"],
            $this->arResult["arForm"],
            $this->arResult["arQuestions"],
            $this->arResult["arAnswers"],
            $this->arResult["arDropDown"],
            $this->arResult["arMultiSelect"],
            $this->arResult["bAdmin"] == "Y" || $this->arParams["SHOW_ADDITIONAL"] == "Y" || $this->arParams["EDIT_ADDITIONAL"] == "Y" ? "ALL" : "N"
        );



        // if wrong WEB_FORM_ID return error;
        if ($this->arParams["WEB_FORM_ID"] > 0)
        {
            // check web form rights;
            $this->arResult["F_RIGHT"] = intval(CForm::GetPermission($this->arParams["WEB_FORM_ID"]));

            // in no form access - return error
            if ($this->arResult["F_RIGHT"] < 10)
            {
                $this->arResult["ERROR"] = "FORM_ACCESS_DENIED";
            }
        }
        else
        {
            $this->arResult["ERROR"] = "FORM_NOT_FOUND";
        }


        $this->arResult["QUESTIONS"] = array();


        // define variables to assign
        $this->arResult = array_merge(
            $this->arResult,
            array(
                "isFormNote"			=> $this->arResult["FORM_NOTE"] <> ''? "Y" : "N", // flag "is there a form note"
                "isAccessFormParams"	=> $this->arResult["F_RIGHT"] >= 25 ? "Y" : "N", // flag "does current user have access to form params"
                "isStatisticIncluded"	=> CModule::IncludeModule('statistic') ? "Y" : "N", // flag "is statistic module included"

                "FORM_HEADER" => sprintf( // form header (<form> tag and hidden inputs)
                        "<form name=\"%s\" action=\"%s\" method=\"%s\" enctype=\"multipart/form-data\">",
                        $this->arResult["arForm"]["SID"], POST_FORM_ACTION_URI, "POST"
                    ).$res .= bitrix_sessid_post().'<input type="hidden" name="WEB_FORM_ID" value="'.$this->arParams['WEB_FORM_ID'].'" />',

                "FORM_TITLE"			=> trim(htmlspecialcharsbx($this->arResult["arForm"]["NAME"])), // form title

                "FORM_DESCRIPTION" => // form description
                    $this->arResult["arForm"]["DESCRIPTION_TYPE"] == "html" ?
                        trim($this->arResult["arForm"]["DESCRIPTION"]) :
                        nl2br(htmlspecialcharsbx(trim($this->arResult["arForm"]["DESCRIPTION"]))),

                "isFormTitle"			=> $this->arResult["arForm"]["NAME"] <> '' ? "Y" : "N", // flag "does form have title"
                "isFormDescription"		=> $this->arResult["arForm"]["DESCRIPTION"] <> '' ? "Y" : "N", // flag "does form have description"
                "isFormImage"			=> intval($this->arResult["arForm"]["IMAGE_ID"]) > 0 ? "Y" : "N", // flag "does form have image"
                "isUseCaptcha"			=> $this->arResult["arForm"]["USE_CAPTCHA"] == "Y", // flag "does form use captcha"
                "DATE_FORMAT"			=> CLang::GetDateFormat("SHORT"), // current site date format
                "REQUIRED_SIGN"			=> CForm::ShowRequired("Y"), // "required" sign
                "FORM_FOOTER"			=> "</form>", // form footer (close <form> tag)
            )
        );


        // assign questions data
        foreach ($this->arResult["arQuestions"] as $key => $arQuestion)
        {
            $FIELD_SID = $arQuestion["SID"];
            $this->arResult["QUESTIONS"][$FIELD_SID] = array(
                "CAPTION" => // field caption
                    $this->arResult["arQuestions"][$FIELD_SID]["TITLE_TYPE"] == "html" ?
                        $this->arResult["arQuestions"][$FIELD_SID]["TITLE"] :
                        nl2br(htmlspecialcharsbx($this->arResult["arQuestions"][$FIELD_SID]["TITLE"])),

                "IS_HTML_CAPTION"			=> $this->arResult["arQuestions"][$FIELD_SID]["TITLE_TYPE"] == "html" ? "Y" : "N",
                "REQUIRED"					=> $this->arResult["arQuestions"][$FIELD_SID]["REQUIRED"] == "Y" ? "Y" : "N",
                "IS_INPUT_CAPTION_IMAGE"	=> intval($this->arResult["arQuestions"][$FIELD_SID]["IMAGE_ID"]) > 0 ? "Y" : "N",
            );

            // ******************************** customize answers ***************************** //

            $this->arResult["QUESTIONS"][$FIELD_SID]["HTML_CODE"] = array();


            // get answers raw structure
            $this->arResult["QUESTIONS"][$FIELD_SID]["STRUCTURE"] = $this->arResult["arAnswers"][$FIELD_SID];

            //html


            $this->arResult["QUESTIONS"][$FIELD_SID]['HTML_CODE'] = $this->textHtmlCreator(
                $this->arResult["QUESTIONS"][$FIELD_SID]["STRUCTURE"][0]['ID'],
                $this->arResult["QUESTIONS"][$FIELD_SID]['CAPTION'],
                $this->arResult["QUESTIONS"][$FIELD_SID]["STRUCTURE"][0]['FIELD_TYPE'],
                $this->arResult["QUESTIONS"][$FIELD_SID]['REQUIRED'],
                $this->arResult["QUESTIONS"][$FIELD_SID],
                $key,
                $this->arResult['arQuestions']

            );

        }





    }



    protected  function textHtmlCreator($fieldId,$placeholder,$fieldType,$required, $structure,$sid, $questionsProps){
        $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


        $listFromIb = false;
        $iblockForList = null;

        if (!empty($questionsProps[$sid]['COMMENTS']) && $fieldType == 'text'){

            $consts = get_defined_constants();

            if (!is_null($consts[$questionsProps[$sid]['COMMENTS']])){

                $listFromIb = true;
                $iblockForList = $consts[$questionsProps[$sid]['COMMENTS']];

            }


        }





        if ($required == 'Y'){


            $requiredField = 'data-required'; // атрибут для селекта обязательных полей в джс

            $sup = '*';
        }else{
            $sup = '';
            $requiredField = '';
        }


        // для формы с шагами
        $steps = '';
        if ($this->arParams['STEPS'] == true ) {

            $steps = 'data-form-item';

            if ($fieldType == 'file'){

                $this->arResult['FILE_NAME'] = 'form_file_' . $fieldId;
                return false;
            }
        }

        switch ($fieldType){

            case "url":

                $html = '<input type="hidden" name="form_url_'.$fieldId.'" value="'.$url.'">';

                break;

            case "dropdown":
                $elems = '';
                $options = '';

                foreach ($structure['STRUCTURE'] as $item){
                    $elems .= ' <li data-title="'.$item['MESSAGE'].'" data-value="'.$item['ID'].'" class="dropdown__item">
                                        <label class="radio">
                                          <input class="radio__input"  type="radio" name="form_dropdown_'.$sid.'" value="'.$item['ID'].'">
                                          <div class="radio__custom"> </div>
                                          <span class="radio__text">
                                            '.$item['MESSAGE'].'
                                          </span>
                                        </label>
                                      </li>';

                    $options .= ' <option value="'.$item['ID'].'">  '.$item['MESSAGE'].' </option>';

                }

                $html = '<div '.$requiredField.'  data-placeholder="'.$placeholder.'" data-dropdown-select id="dropdown-webform" class="dropdown j_dropdown">
                                <select multiple="">'.$options.'
                                </select>

                                <button type="button" class="button button-select button-select--flat dropdown__button j_toggleDropdown">
                                  <span data-placeholder="Select AIRS department" class="dropdown__placeholder">
                                    '.$placeholder.'
                                  </span>

                                  <div class="dropdown__arrow-wrapper">
                                    <svg class="dropdown__arrow">
                                      <use xlink:href="'.SITE_TEMPLATE_PATH.'/svg/sprite.svg#arrow-down"></use>
                                    </svg>
                                  </div>
                                </button>

                                <div class="dropdown__content dropdown__content--left dropdown__content--bottom">
                                  <div class="dropdown__container">
                                    <ul class="dropdown__list">
                                  '.$elems.'
                                    </ul>
                                  </div>
                                </div>
                              </div>';


                break;

            case "file":

                $html = ' 
                 <p class="modal-row__text">' . $placeholder . $sup . ' </p>
                <div class="modal-row">
                <div class="modal-row__wrap">
                    <div class="input-wrapper">
                    
                      <input  type="file"  name="form_file_' . $fieldId . '" class="button file_input" ' . $requiredField . '>
                    </div>
                </div>
            </div>';


                break;

            case 'text':
                if ($this->arParams['STARS']){


                    $id1 = rand(1,10);
                    $id2 = rand(11,20);
                    $id3 = rand(21,30);
                    $id4 = rand(31,40);
                    $id5 = rand(41,50);
                    $html = ' <div class="modal-row">
                <div class="modal-row__wrap">
                <div class="input-wrapper">
                ' . $placeholder . $sup. '
                  <div class="rating-area">
                                <input type="radio" id="'.$fieldId.'-'.$id1.'" name="form_text_'.$fieldId.'" value="5" ' . $requiredField . '>
                                <label for="'.$fieldId.'-'.$id1.'" title="Оценка «5»"></label>
                                <input type="radio" id="'.$fieldId.'-'.$id2.'" name="form_text_'.$fieldId.'" value="4" ' . $requiredField . '>
                                <label for="'.$fieldId.'-'.$id2.'" title="Оценка «4»"></label>
                                <input type="radio" id="'.$fieldId.'-'.$id3.'" name="form_text_'.$fieldId.'" value="3" ' . $requiredField . '>
                                <label for="'.$fieldId.'-'.$id3.'" title="Оценка «3»"></label>
                                <input type="radio" id="'.$fieldId.'-'.$id4.'" name="form_text_'.$fieldId.'" value="2" ' . $requiredField . '>
                                <label for="'.$fieldId.'-'.$id4.'" title="Оценка «2»"></label>
                                <input type="radio" id="'.$fieldId.'-'.$id5.'" name="form_text_'.$fieldId.'" value="1" ' . $requiredField . '>
                                <label for="'.$fieldId.'-'.$id5.'" title="Оценка «1»"></label>
                        </div>
                    
                   </div>
                    </div>
                </div>
            ';

                }elseif($listFromIb) {

                    $elems = '';
                    $options = '';
                    $listElems = \Rasu\Helper::getFromIblock(['IBLOCK_ID' => $iblockForList],['ID','IBLOCK_ID','NAME']);


                    foreach ($listElems as $item){
                        $elems .= ' <li data-title="'.$item['FIELDS']['NAME'].'" data-value="'.$item['FIELDS']['NAME'].'" class="dropdown__item">
                                        <label class="radio">
                                          <input class="radio__input"  type="radio" name="form_text_'.$fieldId.'" value="'.$item['FIELDS']['NAME'].'">
                                          <div class="radio__custom"> </div>
                                          <span class="radio__text">
                                            '.$item['FIELDS']['NAME'].'
                                          </span>
                                        </label>
                                      </li>';

                        $options .= ' <option value="'.$item['FIELDS']['NAME'].'">  '.$item['FIELDS']['NAME'].' </option>';

                    }

                    $html = '<div '.$requiredField.'  data-placeholder="'.$placeholder.'" data-dropdown-select id="dropdown-webform" class="dropdown j_dropdown">
                                <select multiple="">'.$options.'
                                </select>

                                <button type="button" class="button button-select button-select--flat dropdown__button j_toggleDropdown">
                                  <span data-placeholder="Select AIRS department" class="dropdown__placeholder">
                                    '.$placeholder.'
                                  </span>

                                  <div class="dropdown__arrow-wrapper">
                                    <svg class="dropdown__arrow">
                                      <use xlink:href="'.SITE_TEMPLATE_PATH.'/svg/sprite.svg#arrow-down"></use>
                                    </svg>
                                  </div>
                                </button>

                                <div class="dropdown__content dropdown__content--left dropdown__content--bottom">
                                  <div class="dropdown__container">
                                    <ul class="dropdown__list">
                                  '.$elems.'
                                    </ul>
                                  </div>
                                </div>
                              </div>';

                }else {
                $html = ' 
             <div class="col-md-6 form-group">
                        <input name="form_text_' . $fieldId . '" id="form_text_' . $fieldId . '" type="text" placeholder="' . $placeholder . $sup .' " ' .  $requiredField . '>
                    </div>';
            }
                break;

            case 'textarea':
                $html ='

<div class="col-md-12 form-group">
                                <textarea style="height: 50px;" name="form_textarea_'.$fieldId.'" id="form_textarea_'.$fieldId.'" cols="30" rows="4"
                                          placeholder="'.$placeholder.$sup.'"
                                          ' . $requiredField. '></textarea>
        </div>';

                break;

            case 'date':
                $html ='<div class="modal-row">
                                <div class="modal-row__wrap">
                                    <div
                                            id="input-dropdown-'.$fieldId.'"
                                            class="dropdown dropdown--medium dropdown--input my-datepicker j_dropdown"
                                    >
                                        <div class="input-wrapper">
                                            <input
                                                    readonly
                                                    type="text"
                                                    class="input input--gray input--placeholder j_toggleDropdown dropdown__input"
                                                    placeholder="Дата посещения *"
                                                 

                                            />

                                            <svg class="input__icon">
                                                <use xlink:href="'.SITE_TEMPLATE_PATH.'/svg/sprite.svg#calendar"></use>
                                            </svg>

                                            <span class="input__placeholder"> '.$placeholder.$sup.' </span>
                                        </div>

                                        <div-
                                                class="dropdown__content dropdown__content--right dropdown__content--top"
                                        >
                                            <div class="dropdown__container">
                                                <div class="dropdown__inner">
                                                    <div class="dropdown__body">
                                                        <input
                                                                id="datepicker-'.$fieldId.'"
                                                                type="date"
                                                                name ="form_date_'.$fieldId.'"
                                                                data-svg-src="'.SITE_TEMPLATE_PATH.'/svg/sprite.svg#arrow-right"
                                                                class="my-datepicker__input j_datepicker"
                                                                data-ranged="false"
                                                                '.$requiredField.'
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div->
                                    </div>
                                </div>
                            </div>';
                break;

        }

        return $html;

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


    /**
     * Getting array of errors.
     * @return Error[]
     */
    public function getErrors()
    {
        return $this->errorCollection->toArray();
    }

    /**
     * Getting once error with the necessary code.
     * @param string $code Code of error.
     * @return Error
     */
    public function getErrorByCode($code)
    {
        return $this->errorCollection->getErrorByCode($code);
    }

}

