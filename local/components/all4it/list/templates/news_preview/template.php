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
    <section class="news section-padding bg-blck">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle"><span></span></div>
                    <?php
                    // Check if the current page is not /spetspredlozheniya/index.php
                    if ($_SERVER['REQUEST_URI'] !== '/spetspredlozheniya/') { ?>
                        <div class="section-title"><span><?=$arResult['ITEMS'][0]['IBLOCK_NAME']?></span></div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        <? foreach ($arResult["ITEMS"] as $key => $item) { ?>

                            <div class="item">
                                <div class="position-re o-hidden"><img src="<?=$item['PREVIEW_PICTURE']?>"
                                                                       alt="">
                                </div>
                                <div class="con"> <span class="category">
                                    <a href="news.html"><?=$item['TITLE']?></a>
                                </span>
                                    <h5><a href="post.html"><?=$item['SUBTITLE']?></a></h5>
                                </div>
                            </div>

                        <? } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="butn-dark text-end" style="margin-top: 2%; margin-left: 2.5%">
                        <a href="/spetspredlozheniya/"><span>Подробнее</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? } ?>
