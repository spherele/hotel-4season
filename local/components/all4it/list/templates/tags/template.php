<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

<link href="style.css" rel="stylesheet" />
<script src="script.js"></script>

<?php if (!empty($arResult['ITEMS'])) { ?>

    <div class="tags-slider-wrapper">
        <div class="tags-slider">
            <div class="tags-slider-pagination"></div>
            <div class="tags-slider__wrapper">
                <? foreach ($arResult["ITEMS"] as $key => $item) {?>
                    <div class="tags-slider__item" data-slide-name="<?=$item['NAME']?>">
                        <div class="tags-item">
                            <div class="tags-item__description">
                                <?=$item['TITLE']?>
                            </div>
                            <div class="tags-item__image" style="background-image: url(<?=$item['PREVIEW_PICTURE']?>)"></div>
                        </div>
                    </div>
                <?}?>
            </div>
        </div>
    </div>
<?}?>
