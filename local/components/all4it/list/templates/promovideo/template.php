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
    <? foreach ($arResult["ITEMS"] as $key => $item) {?>
        <section class="video-wrapper video section-padding bg-img bg-fixed" data-overlay-dark="3"
                 data-background="<?=$item['PREVIEW_PICTURE']?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center">
                        <div class="section-subtitle"><span><?=$item['TEXT_TOP']?></span></div>
                        <div class="section-title"><span><?=$item['TEXT_BOTTOM']?></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center col-md-12">
                        <a class="vid" href="<?=$item['VIDEO_LINK']?>">
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
    <?}?>
<?}?>