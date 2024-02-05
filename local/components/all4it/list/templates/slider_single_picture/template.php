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

<header class="header">
    <div class="owl-carousel owl-theme owl-loaded owl-drag">

    <?php if (!empty($arResult['ITEMS'])) {?>
        <?php foreach ($arResult["ITEMS"] as $key => $item) {?>
        <!-- Header Banner -->
        <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="<?= $item['PREVIEW_PICTURE'] ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-right caption mt-90">
                        <h1><?= $item['TITLE'] ?></h1>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</header>
<?php } ?>