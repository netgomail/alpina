<?
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
    $APPLICATION->SetTitle("Персональный раздел");
    
?>
<style>
.authWrapper {
    margin: 0 auto;
}
.lkWrapp div {
    height: 58px;
}
.ng-scope{
    display:none;
}
</style>
<?
if ($USER -> IsAuthorized())
{
    ?>
    <section class="l-section-wrap top-section color_1 full">
        <div class="container">
            <div class="top-section__edit-acc">
                <span class="top-section__edit-acc-inner js-open-acc-edit">Редактировать профиль</span><span class="ordersListA"><a href="/personal/">Список заказов</a></span><span class="wishListA"><a href="/personal/cart/?liked=yes">Лист желаний</a></span><span class="exitA"><a href="/?logout=yes">Выход</a></span>
            </div>

            <?$APPLICATION->IncludeComponent("bitrix:main.profile", "user_profile_sailplay", array(
                "SET_TITLE" => "Y",
                    "AJAX_MODE" => "Y"
                ),
                false,
                array(
                "ACTIVE_COMPONENT" => "Y"
                )
            );
            ?>         


            <!-- /account-form -->
        </div>
        <!-- /container -->
    </section>
    <!-- /l-section-wrap -->

    <app></app>
<?
}
else
{
?>      
        <div class="signinWrapper">
            <div class="centredWrapper">
                <div class="signinBlock" style="display:block;">
                    <?
                    $APPLICATION->IncludeComponent("bitrix:system.auth.authorize", "flat", Array(
                        "REGISTER_URL" => "/auth/",
                        "PROFILE_URL" => "/personal/profile/",
                        "SHOW_ERRORS" => "Y"
                        ),
                        false
                    );
                    ?>
                </div>
            </div>
        </div>
    
<?
}
?>
<script>
    $(document).ready(function () {
        // selects
        $('.js-create-select').selectize({});

        // radio and labels
        $('.js-create-radio').prettyCheckable({
            customClass: 'common-radio-wrap'
        });
        $('.js-label-satellite').on('click', function () {
            $(this).siblings('.prettyradio').find('label').click();
        });

        // account form open-close
        var accForm = $('.js-acc-edit');
        $('.js-open-acc-edit').click(function () {
            accForm.slideToggle(300);
        });
        $('.js-close-acc-edit').click(function () {
            accForm.slideUp(300);
        });
        
    });
</script>

<script type="text/javascript">
    var AUTH_HASH = '6fcc1b0c966191383b94ca00eb39b3ff1bfc376d',
    EMAIL = 'test@test,test';
    document.addEventListener('DOMContentLoaded', function () {
        var s = document.createElement("script");
        s.type = "text/javascript";
        s.src = "<?=SITE_TEMPLATE_PATH?>/js/main.min.js";
        document.getElementsByTagName("head")[0].appendChild(s);
        var ss = document.createElement("link");
        ss.type = "text/css";
        ss.rel = "stylesheet";
        ss.href = "<?=SITE_TEMPLATE_PATH?>/css/main.css";
        document.getElementsByTagName("head")[0].appendChild(ss);
    });
</script>
       
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
