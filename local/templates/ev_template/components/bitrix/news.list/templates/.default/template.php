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
<header class="header slider-fade">
    <div class="owl-carousel owl-theme">
        <?php foreach ($arResult["ITEMS"] as $key => $item) { ?>
            <?php if ($key == 0) { ?>
                <?php echo '<pre>';
        print_r($item);
        echo '</pre>'; ?>
        <div class="text-center item bg-img" data-overlay-dark="2" data-background="<?php $item['IMAGE'] ?>">
            <div class="v-middle caption">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                                <span>
                                    <i class="star-rating"></i>
                                    <i class="star-rating"></i>
                                    <i class="star-rating"></i>
                                    <i class="star-rating"></i>
                                    <i class="star-rating"></i>
                                </span>
                            <h4><?php print_r($item['TEXT_TOP']); ?></h4>
                            <h1><?php print_r($item['TEXT_BOTTOM']); ?></h1>
                            <div class="butn-light mt-30 mb-30"><a href="#"
                                                                   data-scroll-nav="1"><span>Rooms & Suites</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }}}?>

        <div class="reservation">
            <a href="tel:8551004444">
                <div class="icon d-flex justify-content-center align-items-center">
                    <i class="flaticon-call"></i>
                </div>
                <div class="call"><span>855 100 4444</span> <br>Reservation</div>
            </a>
        </div>
</header>
