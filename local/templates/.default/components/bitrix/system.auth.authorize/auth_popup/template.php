<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
    die();
}

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 */

//one css for all system.auth.* forms
//$APPLICATION->SetAdditionalCSS("/bitrix/css/main/system.auth/flat/style.css");
?>
<p id="authorisationClose"><img src="/img/closeAuthorIcon.png"></p>
<div class="bx-authform">

<?
if(!empty($arParams["~AUTH_RESULT"])):
    $text = str_replace(array("<br>", "<br />"), "\n", $arParams["~AUTH_RESULT"]["MESSAGE"]);
?>
    <div class="alert alert-danger"><?=nl2br(htmlspecialcharsbx($text))?></div>
<?endif?>

<?
if($arResult['ERROR_MESSAGE'] <> ''):
    $text = str_replace(array("<br>", "<br />"), "\n", $arResult['ERROR_MESSAGE']);
?>
    <div class="alert alert-danger"><?=nl2br(htmlspecialcharsbx($text))?></div>
<?endif?>

    <?/*?><h3 class="bx-title"><?=GetMessage("AUTH_PLEASE_AUTH")?></h3><?*/?>
    <p class="title">Войти на сайт</p>

<?/*if($arResult["AUTH_SERVICES"]):?>
<?
$APPLICATION->IncludeComponent("bitrix:socserv.auth.form",
    "flat",
    array(
        "AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
        "AUTH_URL" => $arResult["AUTH_URL"],
        "POST" => $arResult["POST"],
    ),
    $component,
    array("HIDE_ICONS"=>"Y")
);
?>

    <hr class="bxe-light">
<?endif*/
?>

    <form name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">

        <input type="hidden" name="AUTH_FORM" value="Y" />
        <input type="hidden" name="TYPE" value="AUTH" />
<?if (strlen($arResult["BACKURL"]) > 0):?>
        <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?endif?>
<?foreach ($arResult["POST"] as $key => $value):?>
        <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
<?endforeach?>

        <div class="bx-authform-formgroup-container">
            <?/*?>
            <div class="bx-authform-label-container"><?=GetMessage("AUTH_LOGIN")?></div>
            <?*/?>
            <div class="bx-authform-input-container">
                <input type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>" placeholder="Ваш логин или e-mail"/>
            </div>
        </div>
        <div class="bx-authform-formgroup-container">
            <?/*?>
            <div class="bx-authform-label-container"><?=GetMessage("AUTH_PASSWORD")?></div>
            <?*/?>
            <div class="bx-authform-input-container">
<?if($arResult["SECURE_AUTH"]):?>
                <div class="bx-authform-psw-protected" id="bx_auth_secure" style="display:none"><div class="bx-authform-psw-protected-desc"><span></span><?echo GetMessage("AUTH_SECURE_NOTE")?></div></div>

<script type="text/javascript">
document.getElementById('bx_auth_secure').style.display = '';
</script>
<?endif?>
                <input type="password" name="USER_PASSWORD" maxlength="255" autocomplete="off" placeholder="Ваш пароль"/>
            </div>
        </div>
        <?if ($arParams["NOT_SHOW_LINKS"] != "Y"):?>

        <noindex>
            <div class="bx-authform-link-container">
                <p class="forgotPass"><a href="/auth/?forgot_password=yes" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a></p>
            </div>
        </noindex>
        <?endif?>
<?if($arResult["CAPTCHA_CODE"]):?>
        <input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />

        <div class="bx-authform-formgroup-container dbg_captha">
            <div class="bx-authform-label-container">
                <?echo GetMessage("AUTH_CAPTCHA_PROMT")?>
            </div>
            <div class="bx-captcha"><img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /></div>
            <div class="bx-authform-input-container">
                <input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off" />
            </div>
        </div>
<?endif;?>

<?if ($arResult["STORE_PASSWORD"] == "Y"):?>
        <div class="bx-authform-formgroup-container">
            <div class="remembMeContainer">
                    <input type="checkbox" id="remembMe" name="USER_REMEMBER" value="Y" hidden checked/>
                    <?/*?>
                    <span class="bx-filter-param-text"><?=GetMessage("AUTH_REMEMBER_ME")?></span>
                    <?*/?>
                    <label for="remembMe" class="remembMeText">Запомнить меня</label>
            </div>
        </div>
<?endif?>
        <div class="bx-authform-formgroup-container">
            <input type="submit" onclick="checkAuthFields(); return false;" class="btn btn-primary" name="Login" value="<?=GetMessage("AUTH_AUTHORIZE")?>" />
        </div>
    </form>
    <div class="auth_note"></div>
    <?if($arResult["AUTH_SERVICES"]):?>
    <p class="socServisesText">Войти используя соцсети:</p>
<?
$APPLICATION->IncludeComponent("bitrix:socserv.auth.form",
    "flat",
    array(
        "AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
        "AUTH_URL" => $arResult["AUTH_URL"],
        "POST" => $arResult["POST"],
    ),
    $component,
    array("HIDE_ICONS"=>"Y")
);
?>

    <hr class="bxe-light">
<?endif?>
<?/*if ($arParams["NOT_SHOW_LINKS"] != "Y"):?>
    <hr class="bxe-light">

    <noindex>
        <div class="bx-authform-link-container">
            <a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><b><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></b></a>
        </div>
    </noindex>
<?endif*/?>

<?/*if($arParams["NOT_SHOW_LINKS"] != "Y" && $arResult["NEW_USER_REGISTRATION"] == "Y" && $arParams["AUTHORIZE_REGISTRATION"] != "Y"):?>
    <noindex>
        <div class="bx-authform-link-container">
            <?=GetMessage("AUTH_FIRST_ONE")?><br />
            <a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow"><b><?=GetMessage("AUTH_REGISTER")?></b></a>
        </div>
    </noindex>
<?endif*/?>

<?if($arParams["NOT_SHOW_LINKS"] != "Y" && $arResult["NEW_USER_REGISTRATION"] == "Y" && $arParams["AUTHORIZE_REGISTRATION"] != "Y"):?>
    <noindex>
        <div class="bx-authform-link-container">
            <p class="noRegisterText"><?=GetMessage("AUTH_FIRST_ONE")?></p>
            <p class="onregistrationLink"><a href="/auth/?register=yes" rel="nofollow"><?=GetMessage("AUTH_REGISTER")?></a></p>
        </div>
    </noindex>
<?endif?>
</div>
<script type="text/javascript">
<?if (strlen($arResult["LAST_LOGIN"])>0):?>
try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
<?else:?>
try{document.form_auth.USER_LOGIN.focus();}catch(e){}
<?endif?>

function checkAuthFields(){
    $.post ("/ajax/CheckingAuthFields.php", {login: $('input[name=USER_LOGIN]').val(), password: $('input[name=USER_PASSWORD]').val()}, function(data){
        if (data != "SUCCESS")
        {
            $(".auth_note").html(data);
        }
        else
        {
            location.reload();
        }    
    })
    /*flag = true;
    
    if($('input[name=USER_NAME]').val() == ''){
        flag = false;
        $('input[name=USER_NAME]').css('border-color','#FF0000');
    }*/  

} 

</script>

