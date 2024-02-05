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
<!-- Promo Video -->
<? foreach ($arResult["ITEMS"] as $key => $item) {?>
<section class="video-wrapper video section-padding bg-img bg-fixed" data-overlay-dark="3" data-background="<?=$item['PREVIEW_PICTURE']?>">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <div class="section-title" style="margin-top: 10%"><span><?=$item['TITLE']?></span></div>
            </div>
        </div>
        <div class="row">
            <div class="text-center col-md-12">
                <a class="vid" href="<?=$item['LINK']?>">
                    <div class="vid-butn">
                            <span class="icon">
                                <i class="ti-control-play"></i>
                            </span>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>
    <?php } ?>
<?php } ?>