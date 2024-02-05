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

<?foreach ($arResult["ITEMS"] as $key => $item) {?>
    <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp">
        <img src="<?=$item['PREVIEW_PICTURE']?>"alt="" class="<?= ($key == 0) ? 'mt-90 mb-30' : ''; ?>">
    </div>
<?}?>


