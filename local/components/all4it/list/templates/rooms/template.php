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

        <div class="row">
            <? foreach ($arResult["ITEMS"] as $key => $item) {?>
            <div class="col-md-3">
                    <div class="item">
                        <div class="position-re o-hidden"><img src="<?=$item['PREVIEW_PICTURE']?>" alt=""></div>
                        <div class="con">
                            <h6><a href="room-details.html"><?=$item['PRICE_TEXT']?></a></h6>
                            <h5><a href="room-details.html"><?=$item['NAME_TEXT']?></a></h5>
                            <div class="line"></div>
                            <div class="row facilities">
                                <div class="col col-md-7">
                                    <ul>
                                        <li><i class="flaticon-bed"></i></li>
                                        <li><i class="flaticon-bath"></i></li>
                                        <li><i class="flaticon-breakfast"></i></li>
                                        <li><i class="flaticon-towel"></i></li>
                                    </ul>
                                </div>

                                <div class="col col-md-5 text-end">
                                    <div class="permalink"><a href="room-details.html">Подробнее<i class="ti-arrow-right"></i></a></div>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
            <?php } ?>
        </div>
</section>
<?php } ?>
