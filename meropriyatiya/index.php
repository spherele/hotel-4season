<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мероприятия");
?>

    <!-- BANNER -->
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
            'FILTER' => ['ACTIVE' => 'Y'],
            'LIMIT' => 1,
            'OBJECT' => new \Bitrix\Iblock\Elements\ElementBannermeropriyatiyaTable,
            'CACHE' => true
        ],
        false
    );
    ?>
    <!-- Services -->
    <section>
        <?php
        $APPLICATION->IncludeComponent(
            "all4it:list",
            "halls_preview",
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
                'LIMIT' => 4,
                'OBJECT' => new \Bitrix\Iblock\Elements\ElementPreviewmeropriyatiyaTable,
                'CACHE' => true
            ],
            false
        );
        ?>
    </section>

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
            'TEXT'

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
    <section>
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
                'LIMIT' => 4,
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
            'LIMIT' => 12,
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
    </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>