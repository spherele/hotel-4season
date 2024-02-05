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

<? foreach ($arResult["ITEMS"] as $key => $item) { ?>
    <section class="about section-padding" style="padding-bottom: 0">
        <div class="container">
            <div class="row">
                <div class="col-md-6 animate-box" data-animate-effect="fadeInUp" style="display: flex; flex-direction: column; justify-content: center; margin-top: 0px">

                    <?$title = unserialize($item['TITLE']);
                    if (is_array($title) && isset($title['TEXT'])) {
                        $title = $title['TEXT'];
                    }
                    ?>
                    <div class="section-title" ><?= $title ?></div>
                    <?$text = unserialize($item['TEXT']);
                    if (is_array($text) && isset($text['TEXT'])) {
                        $text = $text['TEXT'];
                    }
                    ?>
                    <p><?= $text ?></p>
                </div>
                <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp">
                    <a href="<?= $item['PREVIEW_PICTURE'] ?>" title="" class="img-zoom">
                        <div class="gallery-box-1">
                            <div class=""><img src="<?= $item['PREVIEW_PICTURE'] ?>"
                                               class="img-fluid mx-auto d-block"
                                               alt="work-img"></div>
                        </div>
                    </a>
                </div>
                <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp">
                    <a href="<?= $item['DETAIL_PICTURE'] ?>" title="" class="img-zoom">
                        <div class="gallery-box-2">
                            <div class=""><img src="<?= $item['DETAIL_PICTURE'] ?>"
                                               class="img-fluid mx-auto d-block"
                                               alt="work-img"></div>
                        </div>
                    </a>
                </div>
            </div>

<? } ?>