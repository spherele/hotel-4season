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
        <?php foreach ($arResult["ITEMS"] as $key => $item) { ?>
            <section class="about section-padding" data-scroll-index="1">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInUp">
                            <p><?=$item['TEXT']?></p>
                        </div>
                        <div class="col col-md-5 animate-box" data-animate-effect="fadeInUp">
                            <img src="<?=$item['PREVIEW_PICTURE']?>" alt="" class="mt-90 mb-30">
                        </div>
                        <div class="col col-md-5 animate-box" data-animate-effect="fadeInUp">
                            <img src="<?=$item['DETAIL_PICTURE']?>" alt="">
                        </div>

                    </div>
                </div>
            </section>
        <?php } ?>

        <?php } ?>
