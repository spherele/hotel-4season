<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
\Bitrix\Main\UI\Extension::load("ui.notification");

if ($arResult["isFormErrors"] == "Y"):?><?= $arResult["FORM_ERRORS_TEXT"]; ?><? endif; ?>


<h4 style="color: black; font-weight: bold;"><?=$arParams['TITLE']?></h4>
<h5 style="color: black; font-weight: normal;"><?=$arParams['TITLE2']?> </h5>
<form method="post" id="modal__form" class="contact__form" style="background-size:cover;">

    <!-- form message -->
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success contact__msg" role="alert">

            </div>
        </div>
    </div>
    <!-- form elements -->
    <div class="row" style="padding: unset">

        <?
        $count = 0;
        foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {


            echo $arQuestion["HTML_CODE"];

            $count++;
        }
        ?>
        <div class="col-md-12 text-center">
            <button type="submit" class="butn-dark2"><span><?=$arParams['BUTTON']?> </span></button>
        </div>
    </div>
</form>


<script>
    let  formID = '<?=$arResult['arForm']['ID']?>';
    BX.message({
        requiredFieldsEmptyNotify: '<?=$arParams['REQUIRE_NOTIFY']?>',
        successNotify: '<?=$arParams['SUCCESS_NOTIFY']?>'
    });

</script>
