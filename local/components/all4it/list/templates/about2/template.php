<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
/** @var CBitrixComponent $component */ ?>


<?php if (!empty($arResult['ITEMS'])) { ?>
    <div class="row">
        <?php foreach ($arResult["ITEMS"] as $key => $item) { ?>
            <?php
            $text = unserialize($item['TEXT']);
            if (is_array($text) && isset($text['TEXT'])) {
                $text = $text['TEXT'];
            }
            ?>
            <?= $text ?>
        <?php } ?>
    </div>
<?php } ?>

