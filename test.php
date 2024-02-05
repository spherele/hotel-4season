<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule('iblock');
?>



<?php
$APPLICATION->IncludeComponent(
    "all4it:list",
    "map_yandex",
    [
        'SELECT' => [
            'ID',
            'IBLOCK_ID',
            'NAME',
            'PREVIEW_PICTURE'
        ],
        'LIMIT' => 1,
        'OBJECT' => new \Bitrix\Iblock\Elements\ElementContactsTable,
        'CACHE' => true
    ],
    false
);
?>
