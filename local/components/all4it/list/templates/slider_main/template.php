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
<header class="header slider-fade">
    <div class="owl-carousel owl-theme owl-loaded owl-drag">

        <?php if (!empty($arResult['ITEMS'])) { ?>
        <?php foreach ($arResult["ITEMS"] as $key => $item) {
            ?>
            <div class="text-center item bg-img" data-overlay-dark="2"
                 data-background="<?= $item['PREVIEW_PICTURE'] ?>">
                <div class="v-middle caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <h4><?= $item['TEXT_TOP'] ?></h4>
                                <h1><?= $item['TEXT_BOTTOM'] ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="owl-nav">
        <button type="button" role="presentation" class="owl-prev"><i class="ti-angle-left" aria-hidden="true"></i>
        </button>
        <button type="button" role="presentation" class="owl-next"><i class="ti-angle-right" aria-hidden="true"></i>
        </button>
    </div>
</header>
<?php } ?>


