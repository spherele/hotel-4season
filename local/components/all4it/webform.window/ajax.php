<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Intranet\Invitation;
use Bitrix\Socialnetwork\UserToGroupTable;
use Bitrix\Socialnetwork\Item\UserToGroup;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Loader;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Localization\Loc;
use Bitrix\Disk\Ui;

class RasuWebformController extends \Bitrix\Main\Engine\Controller
{

    public function configureActions()
    {
        return [
            'sendMessage' => [
                'prefilters' => [],
            ],
        ];
    }
    public function webformSetFileAction($formId)
    {
        if (array_values($_FILES)[0]['error'] > 0){

            return ['success' => false, 'errors' => 'Файл не обнаружен! Прикрепите файл!'];

        }

        $elem = [];

        $name = array_key_first($_FILES);
        // массив описывающий загруженную на сервер фотографию

        $fileIdTemp = CFile::SaveFile($_FILES[$name], "zayavki");
        $fileArrayForResize = CFile::MakeFileArray($fileIdTemp);

        if ($fileArrayForResize){

            $elem[$name] = $fileArrayForResize;

        }


        return $this->addWebForm($formId,$elem);





    }

    public function webformSetAction($formId)
    {

            $elems = [];

            foreach ($_REQUEST as $key => $item){

                if (strpos($key,'form_') !== false || $key == 'cardPath'){

                        $elems[$key] = $item;

                }

            }

            return $this->addWebForm($formId, $elems);




    }

    private function addWebForm($id, $elems){


        // Подключаем модуль веб-форм
        CModule::IncludeModule("form");

        // Проверка валидности отправки формы

        $formErrors = CForm::Check($id, $elems, false, "Y", 'Y');

        // Если не все обязательные поля заполнены
        if (count($formErrors)) {

            return ['success' => false, 'errors' => $formErrors];

        } elseif ($RESULT_ID = CFormResult::Add($id, $elems)) {



            // Отправляем все события как в компоненте веб форм
            CFormCRM::onResultAdded($id, $RESULT_ID);
            CFormResult::SetEvent($RESULT_ID);
            CFormResult::Mail($RESULT_ID);

            // без ошибки
            return ['success' => true, 'errors' => []];

        } else {
            // ошибка создания
            return ['success' => false, 'errors' => $GLOBALS["strError"]];
        }


    }
}