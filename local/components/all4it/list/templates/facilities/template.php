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
    <section class="facilties section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title" style="margin-left: 20px">Наши преимущества</div>
                </div>
            </div>

            <div class="row">
                <?foreach ($arResult["ITEMS"] as $key => $item) {?>
                    <div class="col-md-3">
                        <div class="single-facility">
                            <?php
                            // Создание класса для span на основе данных из $item
                            $spanClass = 'flaticon-' . $item['ICON'];
                            ?>
                            <span class="<?=$spanClass?>"></span>
                            <h5><?= $item['TITLE'] ?></h5>
                            <p style="font-size: 13px;"><?= $item['DESCRIPTION'] ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

