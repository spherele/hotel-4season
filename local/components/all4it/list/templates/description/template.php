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
<link href="style.css" rel="stylesheet" />

<?php if (!empty($arResult['ITEMS'])) { ?>
    <section class="section-padding">
        <div class="container">
            <div class="event-description">
                <?php foreach ($arResult["ITEMS"] as $key => $item) { ?>
                    <div class="event-description-text">
                        <img class="event-description__image" src="<?=$item['PREVIEW_PICTURE']?>" alt="">
                        <img class="event-description__image" src="<?=$item['DETAIL_PICTURE']?>" alt="">

                        <?php
                            $text = unserialize($item['TEXT']);
                            if (is_array($text) && isset($text['TEXT'])) {
                                $text = $text['TEXT'];
                            }
                        ?>
                        <?= $text ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>