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
<section class="rooms1 section-padding" data-scroll-index="1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle">The Cappa Luxury Hotel</div>
                <div class="section-title">Rooms & Suites</div>
            </div>
        </div>
        <div class="row">
            <? foreach ($arResult["ITEMS"] as $key => $item) {?>
            <div class="col-md-<?= ($key < 2) ? '6' : '4'; ?>">
                    <div class="item">
                        <div class="position-re o-hidden"><img src="<?=$item['PREVIEW_PICTURE'] ?>" alt="">
                        </div>
                        <span class="category"><a href="rooms2.html">Book</a></span>
                        <div class="con">
                            <h6><a href="room-details.html"><? print_r($item['PRICE_TEXT']) ?></a></h6>
                            <h5><a href="room-details.html"><? print_r($item['NAME_TEXT']) ?></a></h5>
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
                                    <div class="permalink"><a href="room-details.html">Details <i
                                                    class="ti-arrow-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>
