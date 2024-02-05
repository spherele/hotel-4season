<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

/**
 * Bitrix vars
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global CDatabase $DB
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 */

$APPLICATION->SetTitle("EV Hotel");

?>
    <!-- Slider -->

<?php
$APPLICATION->IncludeComponent(
    "all4it:list",
    "slider_main",
    [
        'SELECT' => [
            'ID',
            'IBLOCK_ID',
            'NAME',
            'TEXT_TOP',
            'TEXT_BOTTOM',
            'PREVIEW_PICTURE'
        ],
        'LIMIT' => 7,
        'OBJECT' => new \Bitrix\Iblock\Elements\ElementSliderMainTable,
        'CACHE' => true
    ],
    false

);
?>


<div class="container section-padding">
    <?php
    $APPLICATION->IncludeComponent(
        "all4it:list",
        "tags",
        [
            'SELECT' => [
                'ID',
                'IBLOCK_ID',
                'NAME',
                'PREVIEW_PICTURE',
                'TITLE'
            ],
            'LIMIT' => 2,
            'OBJECT' => new \Bitrix\Iblock\Elements\ElementTagsTable,
            'CACHE' => true

        ],
        false

    );
    ?>
</div>


    <!---Rooms & Suites--->
    <section class="rooms1 section-padding" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">Номера</div>
                </div>
            </div>
            <?php
            $APPLICATION->IncludeComponent(
                "all4it:list",
                "rooms_preview",
                [
                    'SELECT' => [
                        'ID',
                        'IBLOCK_ID',
                        'NAME',
                        'PRICE_TEXT',
                        'NAME_TEXT',
                        'PREVIEW_PICTURE',
                        'CODE'
                    ],
                    'FILTER' => ['ACTIVE' => 'Y'],
                    'ORDER' => ['SORT' => 'ASC'],
                    'LIMIT' => 4,
                    'OBJECT' => new \Bitrix\Iblock\Elements\ElementRoomspreviewTable,
                    'CACHE' => true
                ],
                false

            );
            ?>
            <!-- News -->
            <?php
            $APPLICATION->IncludeComponent(
                "all4it:list",
                "news",
                [
                    'IBLOCK_NAME',
                    'SELECT' => [
                        'ID',
                        'IBLOCK_ID',
                        'NAME',
                        'PREVIEW_PICTURE',
                        'TITLE',
                        'SUBTITLE',

                    ],
                    'FILTER' => ['ACTIVE' => 'Y'],
                    'ORDER' => ['ID' => 'ASC'],
                    'LIMIT' => 6,
                    'OBJECT' => new \Bitrix\Iblock\Elements\ElementNewsTable,
                    'CACHE' => true
                ],
                false
            );
            ?>

            <!-- Services -->
            <?php
            $APPLICATION->IncludeComponent(
                "all4it:list",
                "impressions_preview",
                [
                    'IBLOCK_NAME',
                    'SELECT' => [
                        'ID',
                        'IBLOCK_ID',
                        'NAME',
                        'PREVIEW_PICTURE',
                        'SUBTITLE',
                        'TEXT',
                        'CODE'

                    ],
                    'FILTER' => ['ACTIVE' => 'Y'],
                    'ORDER' => ['ID' => 'ASC'],
                    'LIMIT' => 3,
                    'OBJECT' => new \Bitrix\Iblock\Elements\ElementImpressionsPreviewTable,
                    'CACHE' => true
                ],
                false
            );
            ?>
            <div class="row">
                <div class="butn-dark text-center" style="margin-top: 2%;">
                    <a href="/vpechatleniya/"><span>Подробнее</span></a>
                </div>
            </div>
        </div>
    </section>


            <!-- Image Gallery -->
            <?php
            $APPLICATION->IncludeComponent(
                "all4it:list",
                "gallery",
                [
                    'IBLOCK_NAME',
                    'SELECT' => [
                        'ID',
                        'NAME',
                        'IBLOCK_ID',
                        'PREVIEW_PICTURE'
                    ],
                    'FILTER' => ['ACTIVE' => 'Y'],
                    'ORDER' => ['ID' => 'DESC'],
                    'LIMIT' => 6,
                    'OBJECT' => new \Bitrix\Iblock\Elements\ElementGalleryMainTable,
                    'CACHE' => true
                ],
                false
            );
            ?>
            <!-- Map Section -->
<?php
$APPLICATION->IncludeComponent(
    "all4it:list",
    "map_yandex",
    [
        'SELECT' => [
            'ID',
            'IBLOCK_ID',
            'NAME',
            'PREVIEW_PICTURE'
        ],
        'LIMIT' => 1,
        'OBJECT' => new \Bitrix\Iblock\Elements\ElementContactsTable,
        'CACHE' => true
    ],
    false
);
?>
    <section class="contact">
        <?php
        $APPLICATION->IncludeComponent(
            "all4it:list",
            "background_form_footer",
            [
                'SELECT' => [
                    'ID',
                    'IBLOCK_ID',
                    'PREVIEW_PICTURE'
                ],
                'FILTER' => ['ACTIVE' => 'Y'],
                'ORDER' => ['ID' => 'DESC'],
                'LIMIT' => 1,
                'OBJECT' => new \Bitrix\Iblock\Elements\ElementBackgroundFormFooterTable,
                'CACHE' => true
            ],
            false
        );
        ?>
        <div class="container">
            <div class="row">

                <div class="col-md-6 mb-60">
                    <?php
                    $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/sections/info_footer.php"
                        )

                    ); ?>
                </div>
                <div class="col-md-4 mb-30 offset-md-2"
                     style="background-color: white; padding: 20px; border-radius: 5px;">
                    <? $APPLICATION->IncludeComponent(
                        "all4it:webform.window",
                        "",
                        array(
                            "SEF_MODE" => "Y",
                            "WEB_FORM_ID" => WEBFORM_ID,
                            'TITLE' => 'Ждем вас в гости!',
                            'TITLE2' => 'Оставьте заявку, наши заботливые менеджеры ответят на ваши вопросы и расскажут про
    спецпредложения',
                            'BUTTON' => 'Отправить',
                            'REQUIRE_NOTIFY' => 'Обязательные поля не заполнены',
                            'SUCCESS_NOTIFY' => 'Форма успешно отправлена',
                            "IGNORE_CUSTOM_TEMPLATE" => "Y",
                            "USE_EXTENDED_ERRORS" => "Y",
                            "CACHE_TYPE" => "N",
                            "CACHE_TIME" => "3600",
                            "SEF_FOLDER" => "/",
                        ),
                        false
                    ); ?>
                </div>
            </div>
        </div>
        </div>
    </section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>