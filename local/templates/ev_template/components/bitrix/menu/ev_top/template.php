<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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


<nav class="navbar navbar-expand-lg">
    <div class="container">
        <div class="logo-wrapper">
            <a class="logo" href="/"> <img src="<?=SITE_TEMPLATE_PATH?>/img/logo_header_white.png" class="logo-img" alt=""> </a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="ti-menu"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item" style="display: inline; align-items: center; margin-top: .5%;">
                    <div class="dropdown">
                        <a class="nav-link" href="/prozhivanie/" style="display: inline;">Проживание</a>
                        <span class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" style="display: inline; padding-left: 0px "><i class="ti-angle-down"></i></span>
                        <ul class="dropdown-menu">
                            <li><a href="/prozhivanie/standart" class="dropdown-item"><span>Стандарт</span></a></li>
                            <li><a href="/prozhivanie/junior" class="dropdown-item"><span>Полулюкс</span></a></li>
                            <li><a href="/prozhivanie/luxe" class="dropdown-item"><span>Люкс</span></a></li>
                            <li><a href="/prozhivanie/cottage" class="dropdown-item"><span>Коттедж</span></a></li>
                            <li><a href="/prozhivanie/ecocottage" class="dropdown-item"><span>Эко-коттедж</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item" style="display: inline; align-items: center; margin-top: .5%;">
                    <div class="dropdown">
                        <a class="nav-link" href="/vpechatleniya/" style="display: inline;">Впечатления</a>
                        <span class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" style="display: inline; padding-left: 0px "><i class="ti-angle-down"></i></span>
                        <ul class="dropdown-menu">
                            <li><a href="/vpechatleniya/banya" class="dropdown-item"><span>Банный комплекс</span></a></li>
                            <li><a href="/vpechatleniya/katok" class="dropdown-item"><span>Каток</span></a></li>
                            <li><a href="/vpechatleniya/skiing" class="dropdown-item"><span>Катание на лыжах</span></a></li>
                            <li><a href="/vpechatleniya/besedki" class="dropdown-item"><span>Беседки</span></a></li>
                            <li><a href="/vpechatleniya/yoga" class="dropdown-item"><span>Йога-тур</span></a></li>
                            <li><a href="/vpechatleniya/billiard" class="dropdown-item"><span>Бильярд</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="/restoran/">Ресторан</a></li>
                <li class="nav-item" style="display: inline; align-items: center;margin-top: .5%;">
                    <div class="dropdown">
                        <a class="nav-link" href="/meropriyatiya/" style="display: inline;">Мероприятия</a>
                        <span class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" style="display: inline; padding-left: 0px "><i class="ti-angle-down"></i></span>
                        <ul class="dropdown-menu">
                            <li><a href="/meropriyatiya/banket" class="dropdown-item"><span>Банкетный зал</span></a></li>
                            <li><a href="/meropriyatiya/konferenc" class="dropdown-item"><span>Конференц-зал</span></a></li>
                            <li><a href="/meropriyatiya/newyear" class="dropdown-item"><span>Новый год</span></a></li>
                            <li><a href="/meropriyatiya/korporativ" class="dropdown-item"><span>Корпоратив</span></a></li>
                            <li><a href="/meropriyatiya/teambuild" class="dropdown-item"><span>Тимбилдинг</span></a></li>
                            <li><a href="/meropriyatiya/svadba" class="dropdown-item"><span>Свадьба</span></a></li>
                            <li><a href="/meropriyatiya/yubilei" class="dropdown-item"><span>Юбилей</span></a></li>
                            <li><a href="/meropriyatiya/kids" class="dropdown-item"><span>Детский праздник</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="/galereya/">Галерея</a></li>
                <li class="nav-item"><a class="nav-link" href="/spetspredlozheniya/">Спецпредложения</a></li>
                <li class="nav-item"><a class="nav-link" href="/kontakty/">Контакты</a></li>
            </ul>
        </div>
    </div>
</nav>


