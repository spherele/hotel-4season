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
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <?php
                // Check if the current page is not /galereya/index.php
                if ($_SERVER['REQUEST_URI'] !== '/galereya/') {?>
                    <div class="section-title"><?=$arResult['ITEMS'][0]['IBLOCK_NAME']?></div>
                <? } ?>
                <? foreach ($arResult["ITEMS"] as $key => $item) { ?>
                    <!-- 3 columns -->
                    <div class="col-md-4 gallery-item">
                        <a href="<?=$item['PREVIEW_PICTURE']?>" title="" class="img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img"><img src="<?=$item['PREVIEW_PICTURE']?>" class="img-fluid mx-auto d-block"
                                                              alt="work-img"></div>
                            </div>
                        </a>
                    </div>
                <? } ?>
            </div>
        </div>

        <?php
        // Check if the current page is not /galereya/index.php
        if ($_SERVER['REQUEST_URI'] !== '/galereya/') { ?>
            <div class="butn-dark text-center" style="margin-top: 1%">
                <a href="/galereya/"><span>Все фото</span></a>
            </div>
        <? } ?>

    </section>
<? } ?>
