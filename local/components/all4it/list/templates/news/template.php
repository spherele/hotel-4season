<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
  die();
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
  <section class="news section-padding bg-blck" style="padding-bottom: 120px">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-subtitle"><span></span></div>
          <?php
          // Check if the current page is not /spetspredlozheniya/index.php
          if ($_SERVER['REQUEST_URI'] !== '/spetspredlozheniya/') { ?>
            <div class="section-title"><span>
                <?= $arResult['ITEMS'][0]['IBLOCK_NAME'] ?>
              </span></div>
          <?php } ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="owl-carousel owl-theme popup-images popup-images_2">
            <? foreach ($arResult["ITEMS"] as $key => $item) { ?>
              <? $text = unserialize($item['TEXT']);
              if (is_array($text) && isset($text['TEXT'])) {
                $text = $text['TEXT'];
              }
              ?>
              <div class="item">
                <div class="position-re o-hidden">
                  <a class="popup-images__item" href="<?= $item['PREVIEW_PICTURE'] ?>" data-detail="<?= $item['SUBTITLE'] ?><br><br> <?= $text ?>">
                    <img src="<?= $item['PREVIEW_PICTURE'] ?>" alt="">
                  </a>
                </div>
                <div class="con"> <span class="category">
                    <a href="/spetspredlozheniya/">
                      <?= $item['TITLE'] ?>
                    </a>
                  </span>
                  <h5><a href="/spetspredlozheniya/">
                      <?= $item['SUBTITLE'] ?>
                    </a></h5>
                </div>
              </div>
            <? } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<? } ?>

