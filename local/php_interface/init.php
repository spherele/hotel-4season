<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main;
use Bitrix\Main\Type\Collection;

if (file_exists($_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/include/autoload.php')) {
    require($_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/include/autoload.php');
}
if (file_exists($_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/include/constants.php')) {
    require($_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/include/constants.php');
}

AddEventHandler("main", "OnAfterUserAuthorize", "RedirectAfterLogin");
function RedirectAfterLogin(&$arParams)
{
    $link = match (SITE_ID) {
        'ki' => '/voronegenergo/main/',
        default => '',
    };

    if ($link !== '') {
        // Редирект на $link
        LocalRedirect($link);
    }
}

?>