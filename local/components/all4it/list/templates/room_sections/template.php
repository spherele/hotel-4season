<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
?>
<?php if (!empty($arResult['ITEMS'])) { ?>
<? foreach ($arResult["ITEMS"] as $key => $item) { ?>

<section class="rooms1 section-padding bg-cream" data-scroll-index="1" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle"><?=$item['TITLE']?></div>
                <div class="section-title"><?=$item['SUBTITLE'] ?></div>
            </div>
        </div>
    <? } ?>
<? } ?>
