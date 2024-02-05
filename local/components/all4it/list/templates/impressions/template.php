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
                <?php if (($key % 2) != 0) { ?>
                    <div class="row">
                        <div class="col-md-6 p-0 animate-box" data-animate-effect="fadeInLeft">
                            <div class="img left">
                                <a href="restaurant.html"><img src="<?= $item['PREVIEW_PICTURE'] ?>" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-6 p-0 bg-cream valign animate-box" data-animate-effect="fadeInRight">
                            <div class="content">
                                <div class="cont text-left">
                                    <div class="info">
                                        <h6><?= $item['TITLE'] ?></h6>
                                    </div>
                                    <h4><?= $item['SUBTITLE'] ?></h4>
                                    <p><?= $item['TEXT'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-md-6 p-0 bg-cream valign animate-box" data-animate-effect="fadeInRight">
                            <div class="content">
                                <div class="cont text-left">
                                    <div class="info">
                                        <h6><?= $item['TITLE'] ?></h6>
                                    </div>
                                    <h4><?= $item['SUBTITLE'] ?></h4>
                                    <p><?= $item['TEXT'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-0 animate-box" data-animate-effect="fadeInLeft">
                            <div class="img left">
                                <a href="restaurant.html"><img src="<?= $item['PREVIEW_PICTURE'] ?>" alt=""></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
            <div class="row">
                <div class="butn-dark text-end" style="margin-top: 2%; margin-left: 1%">
                    <a href="restaurant.html"><span>Подробнее</span></a>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
