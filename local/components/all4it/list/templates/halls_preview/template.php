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
    <section class="services section-padding">
        <div class="container">
            <?php foreach ($arResult["ITEMS"] as $key => $item) { ?>
                <div class="row">
                    <div class="col-md-6 p-0 <?php echo ($key % 2 !== 0) ? 'order-md-first' : 'order-md-last'; ?> bg-cream valign animate-box" data-animate-effect="fadeInRight">
                        <div class="content">
                            <div class="cont text-left">
                                <div class="info">
                                    <h6><?= $item['TITLE'] ?></h6>
                                </div>
                                <h4><?= $item['SUBTITLE'] ?></h4>
                                <p><?= $item['TEXT'] ?></p>
                                <div class="butn-dark"> <a href="/meropriyatiya/"><span>Подробнее</span></a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-0 animate-box" data-animate-effect="fadeInLeft">
                        <div class="img left">
                            <a href="/meropriyatiya/"><img src="<?= $item['PREVIEW_PICTURE'] ?>" alt=""></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

<?php } ?>

