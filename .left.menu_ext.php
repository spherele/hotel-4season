<?
// пример файла .left.menu_ext.php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;
$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "bitrix:menu.sections",
    "",
    Array(
        "ID" => $_REQUEST["ELEMENT_ID"],
        "IBLOCK_TYPE" => "books",
        "IBLOCK_ID" => "30",
        "SECTION_URL" => "/e-store/books/index.php?SECTION_ID=#ID#",
        "CACHE_TIME" => "3600"
    )
);
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>
