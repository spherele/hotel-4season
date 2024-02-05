<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die(); ?>
<?php CModule::IncludeModule('iblock'); ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <? $APPLICATION->ShowHead(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <? $APPLICATION->ShowPanel(); ?>
    <title>
        <? $APPLICATION->ShowTitle() ?>
    </title>
    <link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH ?>/img/favicon.png"/>
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/plugins.css"/>
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/style.css"/>
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/style2.css"/>
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/fonts.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Wix+Madefor+Display&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap');

        <?if ($_SERVER['REQUEST_URI'] == '/') {?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 14%,
            rgba(255, 255, 255, 0.6) 20%,
            rgba(255, 255, 255, 1) 25%,
            rgba(255, 255, 255, 0.6) 30%,
            rgba(255, 255, 255, 1) 37%,
            rgba(255, 255, 255, 0.6) 45%,
            rgba(255, 255, 255, 1) 62%,
            rgba(255, 255, 255, 0.6) 80%,
            rgba(255, 255, 255, 1) 85%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-green.svg');
            /* другие свойства стиля */
        }

        <?} else if ($_SERVER['REQUEST_URI'] == '/prozhivanie/'){?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 14%,
            rgba(255, 255, 255, 0.6) 20%,
            rgba(255, 255, 255, 1) 28%,
            rgba(255, 255, 255, 0.6) 35%,
            rgba(255, 255, 255, 1) 40%,
            rgba(255, 255, 255, 0.6) 80%,
            rgba(255, 255, 255, 1) 83%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-purple.svg');
        }

        <?}
         else if (
    $_SERVER['REQUEST_URI'] == '/prozhivanie/standart/' ||
    $_SERVER['REQUEST_URI'] == '/prozhivanie/luxe/' ||
    $_SERVER['REQUEST_URI'] == '/prozhivanie/junior/' ||
    $_SERVER['REQUEST_URI'] == '/prozhivanie/cottage/' ||
    $_SERVER['REQUEST_URI'] == '/prozhivanie/ecocottage/'
) {?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 14%,
            rgba(255, 255, 255, 0.6) 20%,
            rgba(255, 255, 255, 1) 33%,
            rgba(255, 255, 255, 1) 37%,
            rgba(255, 255, 255, 0.6) 70%,
            rgba(255, 255, 255, 1) 75%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-purple.svg');
        }

        /* другие свойства стиля */
        <?} else if ($_SERVER['REQUEST_URI'] == '/vpechatleniya/'){?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 18%,
            rgba(255, 255, 255, 0.6) 25%,
            rgba(255, 255, 255, 1) 62%,
            rgba(255, 255, 255, 0.6) 73%,
            rgba(255, 255, 255, 1) 78%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-yellow.svg');
        }

        /* другие свойства стиля */
        <?} else if (
    $_SERVER['REQUEST_URI'] == '/vpechatleniya/katok/' ||
    $_SERVER['REQUEST_URI'] == '/vpechatleniya/skiing/' ||
    $_SERVER['REQUEST_URI'] == '/vpechatleniya/yoga/' ||
    $_SERVER['REQUEST_URI'] == '/vpechatleniya/billiard/' ||
    $_SERVER['REQUEST_URI'] == '/vpechatleniya/besedki/'
  ){?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 13%,
            rgba(255, 255, 255, 0.6) 25%,
            rgba(255, 255, 255, 1) 62%,
            rgba(255, 255, 255, 0.6) 73%,
            rgba(255, 255, 255, 1) 78%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-yellow.svg');
        }

        /* другие свойства стиля */
        <?} else if ($_SERVER['REQUEST_URI'] == '/vpechatleniya/banya/'){?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 13%,
            rgba(255, 255, 255, 0.6) 22%,
            rgba(255, 255, 255, 1) 26%,
            rgba(255, 255, 255, 1) 38%,
            rgba(255, 255, 255, 0.6) 45%,
            rgba(255, 255, 255, 1) 62%,
            rgba(255, 255, 255, 0.6) 73%,
            rgba(255, 255, 255, 1) 78%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-yellow.svg');
        }

        /* другие свойства стиля */
        <?} else if ($_SERVER['REQUEST_URI'] == '/restoran/'){?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 13%,
            rgba(255, 255, 255, 0.6) 25%,
            rgba(255, 255, 255, 1) 52%,
            rgba(255, 255, 255, 0.6) 64%,
            rgba(255, 255, 255, 1) 68%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-yellow.svg');
        }

        /* другие свойства стиля */
        <?} else if ($_SERVER['REQUEST_URI'] == '/meropriyatiya/'){?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 11%,
            rgba(255, 255, 255, 0.6) 20%,
            rgba(255, 255, 255, 1) 33%,
            rgba(255, 255, 255, 0.6) 37%,
            rgba(255, 255, 255, 1) 43%,
            rgba(255, 255, 255, 0.6) 60%,
            rgba(255, 255, 255, 1) 67%,
            rgba(255, 255, 255, 0.6) 80%,
            rgba(255, 255, 255, 1) 83%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-purple-dark.svg');
        }

        /* другие свойства стиля */
        <?} else if (
     $_SERVER['REQUEST_URI'] == '/meropriyatiya/banket/')
   {?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 11%,
            rgba(255, 255, 255, 0.6) 25%,
            rgba(255, 255, 255, 1) 44%,
            rgba(255, 255, 255, 0.6) 55%,
            rgba(255, 255, 255, 1) 60%,
            rgba(255, 255, 255, 0.6) 78%,
            rgba(255, 255, 255, 1) 83%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-purple-dark.svg');
        }

        /* другие свойства стиля */
      <?} else if ($_SERVER['REQUEST_URI'] == '/meropriyatiya/konferenc/'){?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 10%,
            rgba(255, 255, 255, 0.6) 25%,
            rgba(255, 255, 255, 1) 48%,
            rgba(255, 255, 255, 0.6) 55%,
            rgba(255, 255, 255, 1) 63%,
            rgba(255, 255, 255, 0.6) 78%,
            rgba(255, 255, 255, 1) 83%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-purple-dark.svg');
        }

        /* другие свойства стиля */
        <?} else if ($_SERVER['REQUEST_URI'] == '/meropriyatiya/newyear/'){?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 11%,
            rgba(255, 255, 255, 0.6) 25%,
            rgba(255, 255, 255, 1) 30%,
            rgba(255, 255, 255, 0.6) 34%,
            rgba(255, 255, 255, 1) 38%,
            rgba(255, 255, 255, 0.6) 45%,
            rgba(255, 255, 255, 1) 57%,
            rgba(255, 255, 255, 0.6) 78%,
            rgba(255, 255, 255, 1) 81%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-purple-dark.svg');
        }

        /* другие свойства стиля */
        <?} else if ($_SERVER['REQUEST_URI'] == '/meropriyatiya/korporativ/'){?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 9%,
            rgba(255, 255, 255, 0.6) 25%,
            rgba(255, 255, 255, 1) 45%,
            rgba(255, 255, 255, 0.6) 55%,
            rgba(255, 255, 255, 1) 67%,
            rgba(255, 255, 255, 0.6) 78%,
            rgba(255, 255, 255, 1) 83%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-purple-dark.svg');
        }

        /* другие свойства стиля */
        <?} else if ($_SERVER['REQUEST_URI'] == '/meropriyatiya/teambuild/'){?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 9%,
            rgba(255, 255, 255, 0.6) 25%,
            rgba(255, 255, 255, 1) 45%,
            rgba(255, 255, 255, 0.6) 55%,
            rgba(255, 255, 255, 1) 67%,
            rgba(255, 255, 255, 0.6) 78%,
            rgba(255, 255, 255, 1) 83%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-purple-dark.svg');
        }

        <?} else if ($_SERVER['REQUEST_URI'] == '/meropriyatiya/svadba/'){?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 9%,
            rgba(255, 255, 255, 0.6) 25%,
            rgba(255, 255, 255, 1) 48%,
            rgba(255, 255, 255, 0.6) 60%,
            rgba(255, 255, 255, 1) 69%,
            rgba(255, 255, 255, 0.6) 78%,
            rgba(255, 255, 255, 1) 85%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-purple-dark.svg');
        }

        <?} else if ($_SERVER['REQUEST_URI'] == '/meropriyatiya/yubilei/'){?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 9%,
            rgba(255, 255, 255, 0.6) 25%,
            rgba(255, 255, 255, 1) 43%,
            rgba(255, 255, 255, 0.6) 60%,
            rgba(255, 255, 255, 1) 65%,
            rgba(255, 255, 255, 0.6) 78%,
            rgba(255, 255, 255, 1) 85%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-purple-dark.svg');
        }

        <?} else if ($_SERVER['REQUEST_URI'] == '/meropriyatiya/kids/'){?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 11%,
            rgba(255, 255, 255, 0.6) 22%,
            rgba(255, 255, 255, 1) 30%,
            rgba(255, 255, 255, 0.6) 40%,
            rgba(255, 255, 255, 1) 58%,
            rgba(255, 255, 255, 0.6) 78%,
            rgba(255, 255, 255, 1) 80%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-purple-dark.svg');
        }

        <?} else if ($_SERVER['REQUEST_URI'] == '/galereya/'){?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 26%,
            rgba(255, 255, 255, 0.6) 45%,
            rgba(255, 255, 255, 1) 68%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-green-light.svg');
        }

        <?} else if ($_SERVER['REQUEST_URI'] == '/kontakty/'){?>
        body {
            background: linear-gradient(to bottom,
            rgba(255, 255, 255, 1) 26%,
            rgba(255, 255, 255, 0.6) 35%,
            rgba(255, 255, 255, 1) 50%),
            url('<?= SITE_TEMPLATE_PATH ?>/img/pattern-green-light.svg');
        }
        <?}?>






    </style>

</head>
<body>


<!-- Preloader -->
<div class="preloader-bg"></div>
<div id="preloader">
    <div id="preloader-status">
        <div class="preloader-position loader"><span></span></div>
    </div>
</div>


<?php
$APPLICATION->IncludeComponent(
    "bitrix:menu",
    "ev_top",
    array(
        "ALLOW_MULTI_SELECT" => "N",
        "CHILD_MENU_TYPE" => "left",
        "DELAY" => "N",
        "MAX_LEVEL" => "2",
        "MENU_CACHE_GET_VARS" => array(""),
        "MENU_CACHE_TIME" => "3600",
        "MENU_CACHE_TYPE" => "N",
        "MENU_CACHE_USE_GROUPS" => "Y",
        "ROOT_MENU_TYPE" => "top",
        "USE_EXT" => "N"
    )
);
?>

