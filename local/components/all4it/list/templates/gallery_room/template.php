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
            <div class="gallery-room">
                <?php foreach ($arResult["ITEMS"] as $key => $item) { ?>
                <?php if ($key === 0): ?>
                    <div class="gallery-room__item" style="background-image: url(<?=$item['PREVIEW_PICTURE']?>)">
                        <a href="<?=$item['PREVIEW_PICTURE']?>" class="img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img">
                                    <img src="<?=$item['PREVIEW_PICTURE']?>" alt="">
                                </div>
                            </div>
                        </a>
                    </div>
                <?php else: ?>
                    <div class="gallery-room__item">
                        <a href="<?=$item['PREVIEW_PICTURE']?>" class="img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img">
                                    <img src="<?=$item['PREVIEW_PICTURE']?>" alt="">
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>







