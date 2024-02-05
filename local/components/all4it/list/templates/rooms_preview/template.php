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
                            <h6><a href="/prozhivanie/<?=$item['CODE']?>"><?=$item['PRICE_TEXT']?></a></h6>
                            <h5><a href="/prozhivanie/<?=$item['CODE']?>"><?=$item['NAME_TEXT']?></a></h5>
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
                                    <div class="permalink"><a href="/prozhivanie/<?=$item['CODE']?>">Подробнее<i class="ti-arrow-right"></i></a></div>
                                </div>

                                </div>
                            </div>
                        </div>
              </div>
            <?php } ?>
        </div>
</section>
    <style>
        .con {
            margin-bottom: 23%;
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 8px;
            box-sizing: border-box;
            opacity: 1;
            visibility: visible;
            transition: none;
            background: none;
            color: white; /* Установка белого цвета текста */
        }
        @media (max-width: 768px) {
            .con{
                margin-bottom: 15%;
                position: absolute;
                bottom: 0;
                left: 0;
                padding: 8px;
                box-sizing: border-box;
                opacity: 1;
                visibility: visible;
                transition: none;
                background: none;
                color: white; /* Установка белого цвета текста */
            }
        }
        .item img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease, filter 0.3s ease;
            transform: scale(1.1); /* Увеличение изображения по умолчанию */
            filter: brightness(0.7); /* Затемнение изображения по умолчанию */
        }
    </style>

<?php } ?>
