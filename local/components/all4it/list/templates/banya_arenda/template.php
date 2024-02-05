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
    <?php foreach($arResult['ITEMS'] as $key=> $item) {?>
        <?php if ($key % 2 == 0) {?>
            <div class="col-md-5">
                <div class="menu-info">
                    <h5><?=$item['TEXT_TOP']?><span class="price"><?=$item['PRICE']?></span></h5>
                    <p><?=$item['TEXT_BOTTOM']?></p>
                </div>
            </div>
        <?php } else {?>
            <div class="col-md-5 offset-md-2">
                <div class="menu-info">
                    <h5><?=$item['TEXT_TOP']?><span class="price"><?=$item['PRICE']?></span></h5>
                    <p><?=$item['TEXT_BOTTOM']?></p>
                </div>
            </div>
        <?php }?>
    <?php }?>
<?php }?>

