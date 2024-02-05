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
$iblockelement = explode("/", $_SERVER['REQUEST_URI']);
$iblockelement_code = $iblockelement[2];
?>

    <!-- Header Banner -->
<?php
$APPLICATION->IncludeComponent(
    "all4it:list",
    "slider_single_picture",
    [
        'SELECT' => [
            'ID',
            'IBLOCK_ID',
            'NAME',
            'TITLE',
            'PREVIEW_PICTURE'
        ],
        'LIMIT' => 1,
        'OBJECT' => new \Bitrix\Iblock\Elements\ElementBannerkatokTable,
        'CACHE' => true
    ],
    false
);
?>

<?php
$APPLICATION->IncludeComponent(
    "all4it:list",
    "about",
    [
        'SELECT' => [
            'ID',
            'IBLOCK_ID',
            'TITLE',
            'TEXT',
            'PREVIEW_PICTURE',
            'DETAIL_PICTURE'
        ],
        'FILTER' => ['ACTIVE' => 'Y'],
        'ORDER' => ['ID' => 'DESC'],
        'LIMIT' => 1,
        'OBJECT' => new \Bitrix\Iblock\Elements\ElementDesckatokTable,
        'CACHE' => true
    ],
    false
);
?>
<?php
$APPLICATION->IncludeComponent(
    'all4it:list',
    'about2',
    [
        'SELECT' => [
            'ID',
            'NAME',
            'TEXT'
        ],
        'ORDER' => ['SORT' => 'ASC'],
        'FILTER' => ['ACTIVE' => 'Y'],
        'LIMIT' => 1,
        'OBJECT' => new \Bitrix\Iblock\Elements\ElementDesckatok2Table,
        'CACHE' => false
    ],
    false,
    []
);
?>
    </div>

    </section>




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
        'FILTER' => ['ACTIVE' => 'Y','!=CODE' => $iblockelement_code],
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
            'IBLOCK_ID',
            'NAME',
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
                            "PATH" => "/sections/info_footer_contacts.php"
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
    </section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>