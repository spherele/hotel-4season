<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
    <?php foreach ($arResult["ITEMS"] as $key => $item) {?>

         <div class="pricing-card">
              <img src="<?=$item['PREVIEW_PICTURE']?>" alt="">
              <div class="desc">
                   <div class="name"><?=($item['NAME'])?></div>
                   <div class="amount"><?=($item['PRICE'])?><span><?=$item['DAY_PRICE']?></span></div>
                   <ul class="list-unstyled list">
                       <li><i class="ti-check"></i> <?=($item['ARTICLE_1'])?></li>
                       <li><i class="ti-check"></i> <?=($item['ARTICLE_2'])?></li>
                       <li><i class="ti-close unavailable"></i><?=($item['ARTICLE_3'])?></li>
                   </ul>
              </div>
         </div>
    <?php } ?>
<?php } ?>
