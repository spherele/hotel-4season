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
    <section class="rooms-page " data-scroll-index="1">
        <div class="container">
            <!-- project content -->
            <div class="row">

                <? foreach ($arResult["ITEMS"] as $key => $item) {?>


                <div class="col-md-8">
                    <?$text = unserialize($item['DESCRIPTION']);
                    if (is_array($text) && isset($text['TEXT'])) {
                        $text = $text['TEXT'];
                    }
                    ?>
                    <p class="mb-30"><?=$text?></p>
                </div>
                <div class="col-md-3 offset-md-1">
                    <h6>Услуги</h6>
                    <ul class="list-unstyled page-list mb-30">
                        <li>
                            <div class="page-list-icon"><span class="flaticon-group"></span></div>
                            <div class="page-list-text">
                                <p>2-х местный</p>
                            </div>
                        </li>
                        <li>
                            <div class="page-list-icon"><span class="flaticon-wifi"></span></div>
                            <div class="page-list-text">
                                <p>Бесплатный Wi-fi</p>
                            </div>
                        </li>
                        <li>
                            <div class="page-list-icon"><span class="flaticon-clock-1"></span></div>
                            <div class="page-list-text">
                                <p>Площадь 200 м²</p>
                            </div>
                        </li>
                        <li>
                            <div class="page-list-icon"><span class="flaticon-breakfast"></span></div>
                            <div class="page-list-text">
                                <p>Завтрак</p>
                            </div>
                        </li>
                        <li>
                            <div class="page-list-icon"><span class="flaticon-towel"></span></div>
                            <div class="page-list-text">
                                <p>Полотенца</p>
                            </div>
                        </li>
                        <li>
                            <div class="page-list-icon"><span class="flaticon-swimming"></span></div>
                            <div class="page-list-text">
                                <p>Бассейн</p>
                            </div>
                        </li>

                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

<?php } ?>
