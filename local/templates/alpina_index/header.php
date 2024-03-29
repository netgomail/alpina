<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
    CJSCore::Init(array("fx"));
    $curPage = $APPLICATION->GetCurPage(true);
    $theme = COption::GetOptionString("main", "wizard_eshop_bootstrap_theme_id", "blue", SITE_ID);
?>

<!doctype html>
<html>
<head>
    <!--<meta http-equiv="Content-type" content="text/html; charset=utf-8"> -->
    <title><?$APPLICATION->ShowTitle()?></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script type="text/javascript" src="/js/fancybox-2/jquery.fancybox.js"></script>
    <script type="text/javascript" src="/js/fancybox-2/helpers/jquery.fancybox-thumbs.js"></script>         

    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <link rel="stylesheet" href="/css/easySlider.css" type="text/css">
    <script src="/js/fxSlider.js"></script>

    <script src="/js/circle-progress.js"></script>
    <script src="/js/jquery.appear.js"></script>
    <script src="/js/easySlider.js"></script>     
    <script src="/js/inputmask.js"></script>

    <script src="/js/main.js"></script> 
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png?v=WGG39kPBLm">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png?v=WGG39kPBLm">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png?v=WGG39kPBLm">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png?v=WGG39kPBLm">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png?v=WGG39kPBLm">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png?v=WGG39kPBLm">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png?v=WGG39kPBLm">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png?v=WGG39kPBLm">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png?v=WGG39kPBLm">
    <link rel="icon" type="image/png" href="/favicon-32x32.png?v=WGG39kPBLm" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-194x194.png?v=WGG39kPBLm" sizes="194x194">
    <link rel="icon" type="image/png" href="/favicon-96x96.png?v=WGG39kPBLm" sizes="96x96">
    <link rel="icon" type="image/png" href="/android-chrome-192x192.png?v=WGG39kPBLm" sizes="192x192">
    <link rel="icon" type="image/png" href="/favicon-16x16.png?v=WGG39kPBLm" sizes="16x16">
    <link rel="manifest" href="/manifest.json?v=WGG39kPBLm">
    <link rel="mask-icon" href="/safari-pinned-tab.svg?v=WGG39kPBLm" color="#5bbad5">
    <link rel="shortcut icon" href="/favicon.ico?v=WGG39kPBLm">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png?v=WGG39kPBLm">
    <meta name="theme-color" content="#ffffff">    
    <link rel="stylesheet" type="text/css" href="/js/fancybox-2/jquery.fancybox.css" id="fancycss" media="screen" />
    <link rel="stylesheet" type="text/css" href="/js/fancybox-2/helpers/jquery.fancybox-thumbs.css" id="fancycss" media="screen" />  

    <?$APPLICATION->ShowHead();?>

    <meta property="og:title" content="«Альпина Паблишер» — деловая литература" />
    <meta property="og:type" content="book" />
    <meta property="og:url" content="http://www.alpinabook.ru" />
    <meta property="og:image" content="http://www.alpinabook.ru/img/logo.png" />
    <meta property="og:site_name" content="www.alpinabook.ru" />
    <meta property="fb:admins" content="1425804193" />
    <meta property="fb:app_id" content="138738742872757" /> 

    <script type="text/javascript">
        //                alert(screen.width) ;
        if (screen.width<=360) {
            $('head').append('<meta name="viewport" content="user-scalable=yes, initial-scale=0.3, maximum-scale=0.8, width=device-width">');
        } else if(screen.width<=415){
            $('head').append('<meta name="viewport" content="user-scalable=yes, initial-scale=0.5, maximum-scale=0.8, width=device-width">');
        } else if(screen.width<=960){
            $('head').append('<meta name="viewport" content="user-scalable=yes, initial-scale=0.8, maximum-scale=0.8, width=device-width">');
        } else if (screen.width<1024) {
            $('head').append('<meta name="viewport" content="user-scalable=yes, initial-scale=0.5, maximum-scale=0.8, width=device-width">');
        }
    </script> 
</head>
<body itemscope itemtype="http://schema.org/WebPage">
<?if ($USER->IsAuthorized()) {
        $rsCurUser = CUser::GetByID($USER->GetID());
        $arCurUser = $rsCurUser->Fetch();
        $userGTMData = "";
        $userGTMData = (!empty($arCurUser["NAME"]) ? "'user_name' : '".$arCurUser["NAME"]."'," : "");
        $userGTMData .= (!empty($arCurUser["EMAIL"]) ? "'user_email' : '".$arCurUser["EMAIL"]."'," : "");
        $userGTMData .= (!empty($arCurUser["UF_GENDER"]) ? "'user_gender' : '".$arCurUser["UF_GENDER"]."'" : "");

    ?>

    <script type="text/javascript">
        dataLayer = [{
            'userId' : <?=$USER->GetID()?>,
            'event' : 'authentication',
            'userRegCategory' : 'UserRegistered',
            <?=$userGTMData?>
        }];
    </script>
    <?} else {?>
    <script type="text/javascript">
        dataLayer = [{
            'userRegCategory' : 'UserUnregistered'
        }];
    </script>
    <?}?>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PM87GH"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PM87GH');</script>
<!-- End Google Tag Manager -->
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<header itemscope="" id="WPHeader" itemtype="http://schema.org/WPHeader">
    <a href="/">
        <div class="logo">
            <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include", 
                    ".default", 
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "AREA_FILE_RECURSIVE" => "Y",
                        "EDIT_TEMPLATE" => "",
                        "COMPONENT_TEMPLATE" => ".default",
                        "PATH" => "/include/logo.php"
                    ),
                    false
                );?>
        </div>
    </a>
    <div class="headerWrapper">
        <ul class="menu">

            <?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu", Array(
                    "ROOT_MENU_TYPE" => "top",    // РўРёРї РјРµРЅСЋ РґР»СЏ РїРµСЂРІРѕРіРѕ СѓСЂРѕРІРЅСЏ
                    "MAX_LEVEL" => "1",    // РЈСЂРѕРІРµРЅСЊ РІР»РѕР¶РµРЅРЅРѕСЃС‚Рё РјРµРЅСЋ
                    "CHILD_MENU_TYPE" => "top",    // РўРёРї РјРµРЅСЋ РґР»СЏ РѕСЃС‚Р°Р»СЊРЅС‹С… СѓСЂРѕРІРЅРµР№
                    "USE_EXT" => "",    // РџРѕРґРєР»СЋС‡Р°С‚СЊ С„Р°Р№Р»С‹ СЃ РёРјРµРЅР°РјРё РІРёРґР° .С‚РёРї_РјРµРЅСЋ.menu_ext.php
                    "DELAY" => "N",    // РћС‚РєР»Р°РґС‹РІР°С‚СЊ РІС‹РїРѕР»РЅРµРЅРёРµ С€Р°Р±Р»РѕРЅР° РјРµРЅСЋ
                    "ALLOW_MULTI_SELECT" => "N",    // Р Р°Р·СЂРµС€РёС‚СЊ РЅРµСЃРєРѕР»СЊРєРѕ Р°РєС‚РёРІРЅС‹С… РїСѓРЅРєС‚РѕРІ РѕРґРЅРѕРІСЂРµРјРµРЅРЅРѕ
                    "MENU_CACHE_TYPE" => "N",    // РўРёРї РєРµС€РёСЂРѕРІР°РЅРёСЏ
                    "MENU_CACHE_TIME" => "3600",    // Р’СЂРµРјСЏ РєРµС€РёСЂРѕРІР°РЅРёСЏ (СЃРµРє.)
                    "MENU_CACHE_USE_GROUPS" => "N",    // РЈС‡РёС‚С‹РІР°С‚СЊ РїСЂР°РІР° РґРѕСЃС‚СѓРїР°
                    "MENU_CACHE_GET_VARS" => "",    // Р—РЅР°С‡РёРјС‹Рµ РїРµСЂРµРјРµРЅРЅС‹Рµ Р·Р°РїСЂРѕСЃР°
                    ),
                    false
                );?>
        </ul>    
    </div>
    <div class="lkWrapp">
        <div class="headBasket">
            <div class="BasketQuant">
            </div>
        </div>

        <?
            if(CUser::IsAuthorized())
            {
            ?>
            <a href="/personal/cart/?liked=yes">
                <div class="headLiked">
                    <?
                        $curr_user = CUser::GetByID($USER -> GetID()) -> Fetch();
                        $user = $curr_user["NAME"]." ".$curr_user["LAST_NAME"];
                        $wishItemList = CIBlockElement::GetList(array(), array("IBLOCK_ID" => 17, "NAME" => $user), false, false, array("NAME", "ID", "PROPERTY_PRODUCTS"));
                    ?>
                    <div class="likedQuant"><?echo($wishItemList->SelectedRowsCount());?></div>
                </div></a>
            <?
        }?>

        <a href="/personal/profile/" <?if (!$USER->IsAuthorized()){?>id="authorisationPopup"<?}?>>
            <div>
                <img src="/img/lkImg.png">
            </div>
        </a>
        <p class="telephone"><!--+7 (495) 980 80 77-->
            <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include", 
                    ".default", 
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "AREA_FILE_RECURSIVE" => "Y",
                        "EDIT_TEMPLATE" => "",
                        "COMPONENT_TEMPLATE" => ".default",
                        "PATH" => "/include/telephone.php"
                    ),
                    false
                );?>

        </p>

    </div>
</header>

<div class="mainWrapp" itemprop="mainContentOfPage">
    <!--<div class="grayBack"></div>-->
    <p class="interShop">
        Интернет-магазин
    </p>
    <p class="ibooks">
        я<img src="/img/logoBig.png">книги
    </p>

    <?$APPLICATION->IncludeComponent(
            "bitrix:search.title", 
            "search_form", 
            array(
                "CATEGORY_0" => array(
                    0 => "iblock_catalog",
                ),
                "CATEGORY_0_TITLE" => "Результат",
                "CHECK_DATES" => "N",
                "COMPONENT_TEMPLATE" => "search_form",
                "CONTAINER_ID" => "title-search-top",
                "INPUT_ID" => "title-search-input-top",
                "NUM_CATEGORIES" => "1",
                "ORDER" => "date",
                "PAGE" => "#SITE_DIR#search/index.php",
                "SHOW_INPUT" => "Y",
                "SHOW_OTHERS" => "N",
                "TOP_COUNT" => "5",
                "USE_LANGUAGE_GUESS" => "N",
                "CATEGORY_0_iblock_catalog" => array(
                    0 => "4",
                    1 => "29",
                )
            ),
            false
        );?>     
    <div class="books">
        <div class="catalogIcon" onmouseover="dataLayer.push({'event' : 'smallCatalogInteractions', 'action' : 'overTheIcon'});" onclick="dataLayer.push({'event' : 'smallCatalogInteractions', 'action' : 'openSmallCatalog'});">
            <span class="catalog_text"></span>
        </div>
        <div class="basketIcon" onmouseover="dataLayer.push({'event' : 'smallCartInteractions', 'action' : 'overTheIcon'});" onclick="dataLayer.push({'event' : 'smallCartInteractions', 'action' : 'openSmallCart'});">
        </div>

        <? 
            $arrFilter = array('PROPERTY_STATE' => '21', ">DETAIL_PICTURE" => 0, "PROPERTY_show_on_index" => 340);

            $APPLICATION->IncludeComponent(
                "bitrix:catalog.section", 
                "template1", 
                array(
                    "IBLOCK_TYPE_ID" => "catalog",
                    "IBLOCK_ID" => "4",
                    "BASKET_URL" => "/personal/cart/",
                    "COMPONENT_TEMPLATE" => "template1",
                    "IBLOCK_TYPE" => "catalog",
                    "SECTION_ID" => $_REQUEST["SECTION_ID"],
                    "SECTION_CODE" => "",
                    "SECTION_USER_FIELDS" => array(
                        0 => "",
                        1 => "",
                    ),
                    "ELEMENT_SORT_FIELD" => "PROPERTY_big_index_image",
                    "ELEMENT_SORT_ORDER" => "desc",
                    "ELEMENT_SORT_FIELD2" => "rand",
                    "ELEMENT_SORT_ORDER2" => "desc",
                    "FILTER_NAME" => "arrFilter",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "SHOW_ALL_WO_SECTION" => "Y",
                    "HIDE_NOT_AVAILABLE" => "N",
                    "PAGE_ELEMENT_COUNT" => "12",
                    "LINE_ELEMENT_COUNT" => "3",
                    "PROPERTY_CODE" => array(
                        0 => "AUTHORS",
                        1 => "number_volumes",
                        2 => "",
                    ),
                    "OFFERS_FIELD_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "OFFERS_PROPERTY_CODE" => array(
                        0 => "COLOR_REF",
                        1 => "SIZES_SHOES",
                        2 => "SIZES_CLOTHES",
                        3 => "",
                    ),
                    "OFFERS_SORT_FIELD" => "sort",
                    "OFFERS_SORT_ORDER" => "desc",
                    "OFFERS_SORT_FIELD2" => "id",
                    "OFFERS_SORT_ORDER2" => "desc",
                    "OFFERS_LIMIT" => "5",
                    "TEMPLATE_THEME" => "site",
                    "PRODUCT_DISPLAY_MODE" => "Y",
                    "ADD_PICT_PROP" => "BIG_PHOTO",
                    "LABEL_PROP" => "-",
                    "OFFER_ADD_PICT_PROP" => "-",
                    "OFFER_TREE_PROPS" => array(
                        0 => "COLOR_REF",
                        1 => "SIZES_SHOES",
                        2 => "SIZES_CLOTHES",
                    ),
                    "PRODUCT_SUBSCRIPTION" => "N",
                    "SHOW_DISCOUNT_PERCENT" => "N",
                    "SHOW_OLD_PRICE" => "Y",
                    "SHOW_CLOSE_POPUP" => "N",
                    "MESS_BTN_BUY" => "Купить",
                    "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                    "MESS_BTN_SUBSCRIBE" => "Подписаться",
                    "MESS_BTN_DETAIL" => "Подробнее",
                    "MESS_NOT_AVAILABLE" => "Нет в наличии",
                    "SECTION_URL" => "",
                    "DETAIL_URL" => "",
                    "SECTION_ID_VARIABLE" => "SECTION_ID",
                    "SEF_MODE" => "N",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_GROUPS" => "N",
                    "SET_TITLE" => "N",
                    "SET_BROWSER_TITLE" => "Y",
                    "BROWSER_TITLE" => "-",
                    "SET_META_KEYWORDS" => "Y",
                    "META_KEYWORDS" => "-",
                    "SET_META_DESCRIPTION" => "Y",
                    "META_DESCRIPTION" => "-",
                    "SET_LAST_MODIFIED" => "N",
                    "USE_MAIN_ELEMENT_SECTION" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "CACHE_FILTER" => "N",
                    "ACTION_VARIABLE" => "action",
                    "PRODUCT_ID_VARIABLE" => "id",
                    "PRICE_CODE" => array(
                        0 => "BASE",
                    ),
                    "USE_PRICE_COUNT" => "N",
                    "SHOW_PRICE_COUNT" => "1",
                    "PRICE_VAT_INCLUDE" => "Y",
                    "CONVERT_CURRENCY" => "N",
                    "USE_PRODUCT_QUANTITY" => "N",
                    "PRODUCT_QUANTITY_VARIABLE" => "",
                    "ADD_PROPERTIES_TO_BASKET" => "Y",
                    "PRODUCT_PROPS_VARIABLE" => "prop",
                    "PARTIAL_PRODUCT_PROPERTIES" => "N",
                    "PRODUCT_PROPERTIES" => array(
                    ),
                    "OFFERS_CART_PROPERTIES" => array(
                        0 => "COLOR_REF",
                        1 => "SIZES_SHOES",
                        2 => "SIZES_CLOTHES",
                    ),
                    "ADD_TO_BASKET_ACTION" => "ADD",
                    "PAGER_TEMPLATE" => "round",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "PAGER_TITLE" => "Товары",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "SET_STATUS_404" => "N",
                    "SHOW_404" => "N",
                    "MESSAGE_404" => "",
                    "BACKGROUND_IMAGE" => "-",
                    "DISABLE_INIT_JS_IN_COMPONENT" => "N"
                ),
                false
            );?> 
        <?/* Получаем рекомендации для главной от RetailRocket */
            global $SellBlockFilter;
            $stringRecs = file_get_contents('http://api.retailrocket.ru/api/1.0/Recomendation/ItemsToMain/50b90f71b994b319dc5fd855/');
            $recsArray = json_decode($stringRecs);
            $SellBlockFilter = Array('ID' => (array_slice($recsArray,0,6)));

            if ($SellBlockFilter['ID'][0] > 0) { // Если рекомендации есть, ничего не меняем 

            } else { // Если рекомендаций нет, подставляем вручную созданные*/
                $SellBlockFilter = array('PROPERTY_best_seller' => 285, ">DETAIL_PICTURE" => 0, "PROPERTY_show_on_index" => 340);
            }    

            $APPLICATION->IncludeComponent(
                "bitrix:catalog.section", 
                "template_bestsellers", 
                array(
                    "ACTION_VARIABLE" => "action",
                    "ADD_PICT_PROP" => "BIG_PHOTO",
                    "ADD_PROPERTIES_TO_BASKET" => "Y",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "ADD_TO_BASKET_ACTION" => "ADD",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "BACKGROUND_IMAGE" => "-",
                    "BASKET_URL" => "/personal/cart/",
                    "BROWSER_TITLE" => "-",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "N",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "COMPONENT_TEMPLATE" => "template_bestsellers",
                    "CONVERT_CURRENCY" => "N",
                    "DETAIL_URL" => "",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "ELEMENT_SORT_FIELD" => "PROPERTY_big_index_image",
                    "ELEMENT_SORT_FIELD2" => "PROPERTY_SALES_CNT",
                    "ELEMENT_SORT_ORDER" => "desc",
                    "ELEMENT_SORT_ORDER2" => "desc",
                    "FILTER_NAME" => "SellBlockFilter",
                    "HIDE_NOT_AVAILABLE" => "N",
                    "IBLOCK_ID" => "4",
                    "IBLOCK_TYPE" => "catalog",
                    "IBLOCK_TYPE_ID" => "catalog",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "LABEL_PROP" => "-",
                    "LINE_ELEMENT_COUNT" => "3",
                    "MESSAGE_404" => "",
                    "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                    "MESS_BTN_BUY" => "Купить",
                    "MESS_BTN_DETAIL" => "Подробнее",
                    "MESS_BTN_SUBSCRIBE" => "Подписаться",
                    "MESS_NOT_AVAILABLE" => "Нет в наличии",
                    "META_DESCRIPTION" => "-",
                    "META_KEYWORDS" => "-",
                    "OFFERS_LIMIT" => "5",
                    "OFFER_ADD_PICT_PROP" => "-",
                    "OFFER_TREE_PROPS" => array(
                        0 => "COLOR_REF",
                        1 => "SIZES_SHOES",
                        2 => "SIZES_CLOTHES",
                    ),
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "round",
                    "PAGER_TITLE" => "Товары",
                    "PAGE_ELEMENT_COUNT" => "12",
                    "PARTIAL_PRODUCT_PROPERTIES" => "N",
                    "PRICE_CODE" => array(
                        0 => "BASE",
                    ),
                    "PRICE_VAT_INCLUDE" => "Y",
                    "PRODUCT_DISPLAY_MODE" => "Y",
                    "PRODUCT_ID_VARIABLE" => "id",
                    "PRODUCT_PROPERTIES" => array(
                    ),
                    "PRODUCT_PROPS_VARIABLE" => "prop",
                    "PRODUCT_QUANTITY_VARIABLE" => "",
                    "PRODUCT_SUBSCRIPTION" => "N",
                    "PROPERTY_CODE" => array(
                        0 => "YEAR",
                        1 => "AUTHORS",
                        2 => "SALES_CNT",
                        3 => "",
                    ),
                    "SECTION_CODE" => "",
                    "SECTION_ID" => $_REQUEST["SECTION_ID"],
                    "SECTION_ID_VARIABLE" => "SECTION_ID",
                    "SECTION_URL" => "",
                    "SECTION_USER_FIELDS" => array(
                        0 => "",
                        1 => "",
                    ),
                    "SEF_MODE" => "N",
                    "SET_BROWSER_TITLE" => "Y",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "Y",
                    "SET_META_KEYWORDS" => "Y",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SHOW_ALL_WO_SECTION" => "Y",
                    "SHOW_CLOSE_POPUP" => "N",
                    "SHOW_DISCOUNT_PERCENT" => "N",
                    "SHOW_OLD_PRICE" => "Y",
                    "SHOW_PRICE_COUNT" => "1",
                    "TEMPLATE_THEME" => "site",
                    "USE_MAIN_ELEMENT_SECTION" => "N",
                    "USE_PRICE_COUNT" => "N",
                    "USE_PRODUCT_QUANTITY" => "N",
                    "DISABLE_INIT_JS_IN_COMPONENT" => "N"
                ),
                false
            );?> 
        <?  global $arrFilter_soon;
            $arrFilter_soon = array('PROPERTY_STATE' => '22', '>DETAIL_PICTURE' => 0, "PROPERTY_show_on_index" => 340);

            $APPLICATION->IncludeComponent(
                "bitrix:catalog.section", 
                "template_soon", 
                array(
                    "IBLOCK_TYPE_ID" => "catalog",
                    "IBLOCK_ID" => "4",
                    "BASKET_URL" => "/personal/cart/",
                    "COMPONENT_TEMPLATE" => "template_soon",
                    "IBLOCK_TYPE" => "catalog",
                    "SECTION_ID" => $_REQUEST["SECTION_ID"],
                    "SECTION_CODE" => "",
                    "SECTION_USER_FIELDS" => array(
                        0 => "",
                        1 => "",
                    ),
                    "ELEMENT_SORT_FIELD" => "PROPERTY_big_index_image",
                    "ELEMENT_SORT_ORDER" => "desc",
                    "ELEMENT_SORT_FIELD2" => "rand",
                    "ELEMENT_SORT_ORDER2" => "desc",
                    "FILTER_NAME" => "arrFilter_soon",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "SHOW_ALL_WO_SECTION" => "Y",
                    "HIDE_NOT_AVAILABLE" => "N",
                    "PAGE_ELEMENT_COUNT" => "12",
                    "LINE_ELEMENT_COUNT" => "3",
                    "PROPERTY_CODE" => array(
                        0 => "STATE",
                        1 => "YEAR",
                        2 => "AUTHORS",
                        3 => "SALES_CNT",
                        4 => "",
                    ),
                    "TEMPLATE_THEME" => "site",
                    "PRODUCT_DISPLAY_MODE" => "Y",
                    "ADD_PICT_PROP" => "BIG_PHOTO",
                    "LABEL_PROP" => "-",
                    "OFFER_ADD_PICT_PROP" => "-",
                    "OFFER_TREE_PROPS" => array(
                        0 => "COLOR_REF",
                        1 => "SIZES_SHOES",
                        2 => "SIZES_CLOTHES",
                    ),
                    "PRODUCT_SUBSCRIPTION" => "N",
                    "SHOW_DISCOUNT_PERCENT" => "N",
                    "SHOW_OLD_PRICE" => "Y",
                    "SHOW_CLOSE_POPUP" => "N",
                    "MESS_BTN_BUY" => "Купить",
                    "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                    "MESS_BTN_SUBSCRIBE" => "Подписаться",
                    "MESS_BTN_DETAIL" => "Подробнее",
                    "MESS_NOT_AVAILABLE" => "Нет в наличии",
                    "SECTION_URL" => "",
                    "DETAIL_URL" => "",
                    "SECTION_ID_VARIABLE" => "SECTION_ID",
                    "SEF_MODE" => "N",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_GROUPS" => "N",
                    "SET_TITLE" => "N",
                    "SET_BROWSER_TITLE" => "Y",
                    "BROWSER_TITLE" => "-",
                    "SET_META_KEYWORDS" => "Y",
                    "META_KEYWORDS" => "-",
                    "SET_META_DESCRIPTION" => "Y",
                    "META_DESCRIPTION" => "-",
                    "SET_LAST_MODIFIED" => "N",
                    "USE_MAIN_ELEMENT_SECTION" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "CACHE_FILTER" => "N",
                    "ACTION_VARIABLE" => "action",
                    "PRODUCT_ID_VARIABLE" => "id",
                    "PRICE_CODE" => array(
                        0 => "BASE",
                    ),
                    "USE_PRICE_COUNT" => "N",
                    "SHOW_PRICE_COUNT" => "1",
                    "PRICE_VAT_INCLUDE" => "Y",
                    "CONVERT_CURRENCY" => "N",
                    "USE_PRODUCT_QUANTITY" => "N",
                    "PRODUCT_QUANTITY_VARIABLE" => "",
                    "ADD_PROPERTIES_TO_BASKET" => "Y",
                    "PRODUCT_PROPS_VARIABLE" => "prop",
                    "PARTIAL_PRODUCT_PROPERTIES" => "N",
                    "PRODUCT_PROPERTIES" => array(
                    ),
                    "ADD_TO_BASKET_ACTION" => "ADD",
                    "PAGER_TEMPLATE" => "round",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "PAGER_TITLE" => "Товары",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "SET_STATUS_404" => "N",
                    "SHOW_404" => "N",
                    "MESSAGE_404" => "",
                    "BACKGROUND_IMAGE" => "-",
                    "OFFERS_LIMIT" => "5",
                    "DISABLE_INIT_JS_IN_COMPONENT" => "N"
                ),
                false
            );?>  
        <? $arrFilter_mustread = array('PROPERTY_must_read' => '242', ">DETAIL_PICTURE" => 0, "PROPERTY_show_on_index" => 340);

            $APPLICATION->IncludeComponent(
                "bitrix:catalog.section", 
                "template_mustread", 
                array(
                    "IBLOCK_TYPE_ID" => "catalog",
                    "IBLOCK_ID" => "4",
                    "BASKET_URL" => "/personal/cart/",
                    "COMPONENT_TEMPLATE" => "template_mustread",
                    "IBLOCK_TYPE" => "catalog",
                    "SECTION_ID" => $_REQUEST["SECTION_ID"],
                    "SECTION_CODE" => "",
                    "SECTION_USER_FIELDS" => array(
                        0 => "",
                        1 => "",
                    ),
                    "ELEMENT_SORT_FIELD" => "PROPERTY_big_index_image",
                    "ELEMENT_SORT_ORDER" => "desc",
                    "ELEMENT_SORT_FIELD2" => "rand",
                    "ELEMENT_SORT_ORDER2" => "desc",
                    "FILTER_NAME" => "arrFilter_mustread",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "SHOW_ALL_WO_SECTION" => "Y",
                    "HIDE_NOT_AVAILABLE" => "N",
                    "PAGE_ELEMENT_COUNT" => "12",
                    "LINE_ELEMENT_COUNT" => "3",
                    "PROPERTY_CODE" => array(
                        0 => "YEAR",
                        1 => "AUTHORS",
                        2 => "SALES_CNT",
                        3 => "",
                    ),
                    "TEMPLATE_THEME" => "site",
                    "PRODUCT_DISPLAY_MODE" => "Y",
                    "ADD_PICT_PROP" => "BIG_PHOTO",
                    "LABEL_PROP" => "-",
                    "OFFER_ADD_PICT_PROP" => "-",
                    "OFFER_TREE_PROPS" => array(
                        0 => "COLOR_REF",
                        1 => "SIZES_SHOES",
                        2 => "SIZES_CLOTHES",
                    ),
                    "PRODUCT_SUBSCRIPTION" => "N",
                    "SHOW_DISCOUNT_PERCENT" => "N",
                    "SHOW_OLD_PRICE" => "Y",
                    "SHOW_CLOSE_POPUP" => "N",
                    "MESS_BTN_BUY" => "Купить",
                    "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                    "MESS_BTN_SUBSCRIBE" => "Подписаться",
                    "MESS_BTN_DETAIL" => "Подробнее",
                    "MESS_NOT_AVAILABLE" => "Нет в наличии",
                    "SECTION_URL" => "",
                    "DETAIL_URL" => "",
                    "SECTION_ID_VARIABLE" => "SECTION_ID",
                    "SEF_MODE" => "N",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_GROUPS" => "N",
                    "SET_TITLE" => "N",
                    "SET_BROWSER_TITLE" => "Y",
                    "BROWSER_TITLE" => "-",
                    "SET_META_KEYWORDS" => "Y",
                    "META_KEYWORDS" => "-",
                    "SET_META_DESCRIPTION" => "Y",
                    "META_DESCRIPTION" => "-",
                    "SET_LAST_MODIFIED" => "N",
                    "USE_MAIN_ELEMENT_SECTION" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "CACHE_FILTER" => "N",
                    "ACTION_VARIABLE" => "action",
                    "PRODUCT_ID_VARIABLE" => "id",
                    "PRICE_CODE" => array(
                        0 => "BASE",
                    ),
                    "USE_PRICE_COUNT" => "N",
                    "SHOW_PRICE_COUNT" => "1",
                    "PRICE_VAT_INCLUDE" => "Y",
                    "CONVERT_CURRENCY" => "N",
                    "USE_PRODUCT_QUANTITY" => "N",
                    "PRODUCT_QUANTITY_VARIABLE" => "",
                    "ADD_PROPERTIES_TO_BASKET" => "Y",
                    "PRODUCT_PROPS_VARIABLE" => "prop",
                    "PARTIAL_PRODUCT_PROPERTIES" => "N",
                    "PRODUCT_PROPERTIES" => array(
                    ),
                    "ADD_TO_BASKET_ACTION" => "ADD",
                    "PAGER_TEMPLATE" => "round",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "PAGER_TITLE" => "Товары",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "SET_STATUS_404" => "N",
                    "SHOW_404" => "N",
                    "MESSAGE_404" => "",
                    "BACKGROUND_IMAGE" => "-",
                    "OFFERS_LIMIT" => "5",
                    "DISABLE_INIT_JS_IN_COMPONENT" => "N"
                ),
                false
            );?>
        <ul>
            <li class="first"><span class="active" data-id="1"><a href="/catalog/new/?SORT=NEW">Новинки</a></span></li>
            <li><span data-id="2"><a href="/catalog/bestsellers/">Бестселлеры</a></span></li>
            <li><span data-id="3"><a href="/catalog/coming-soon/">Скоро <br>в продаже</a></span></li>
            <li><span data-id="4"><a href="/catalog/mustread/">Серия <br>Must Read</a></span></li>
        </ul>
        <div class="socServ">
            <p class="text">
                ПРИСОЕДИНЯЙТЕСЬ В СОЦСЕТЯХ
            </p>
            <div class="icons">
                <a href="http://vk.com/ideabooks" target="_blank"><img src="/img/vk.png"></a>
                <a href="https://twitter.com/AlpinaBookRu"><img src="/img/twitter.png"></a>
                <a href="https://www.facebook.com/alpinabook/" target="_blank"><img src="/img/facebook.png"></a>
                <a href="https://plus.google.com/+alpinabook?prsrc=5" target="_blank"><img src="/img/google.png"></a> 
                <a href="http://instagram.com/alpinabook" target="_blank"><img src="/img/instagramm.png"></a>
            </div>
        </div>
    </div>
</div>
<div class="hintWrapp">
    <div class="catalogWrapper">
        <?/* Получаем бестселлеры от RetailRocket */

            if (isset($_COOKIE["rrpusid"])){
                $stringRecs = file_get_contents('http://api.retailrocket.ru/api/1.0/Recomendation/PersonalRecommendation/50b90f71b994b319dc5fd855/?rrUserId='.$_COOKIE["rrpusid"]);
                $recsArray = json_decode($stringRecs);
                $arrFilter = Array('ID' => (array_slice($recsArray,0,6)));
            }
            if ($arrFilter['ID'][0] > 0) { // Если персональные рекомендаций нет, не показываем блок?>
            <div class="recomendation">
                <p class="titleMain">Вам может быть интересно</p>
                <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:catalog.section", 
                        "recommended_books", 
                        array(
                            "IBLOCK_TYPE_ID" => "catalog",
                            "IBLOCK_ID" => "4",
                            "BASKET_URL" => "/personal/cart/",
                            "COMPONENT_TEMPLATE" => "recommended_books",
                            "IBLOCK_TYPE" => "catalog",
                            "SECTION_ID" => $_REQUEST["SECTION_ID"],
                            "SECTION_CODE" => "",
                            "SECTION_USER_FIELDS" => array(
                                0 => "",
                                1 => "",
                            ),
                            "ELEMENT_SORT_FIELD" => "id",
                            "ELEMENT_SORT_ORDER" => "desc",
                            "ELEMENT_SORT_FIELD2" => "id",
                            "ELEMENT_SORT_ORDER2" => "desc",
                            "FILTER_NAME" => "arrFilter",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "SHOW_ALL_WO_SECTION" => "Y",
                            "HIDE_NOT_AVAILABLE" => "N",
                            "PAGE_ELEMENT_COUNT" => "12",
                            "LINE_ELEMENT_COUNT" => "3",
                            "PROPERTY_CODE" => array(
                                0 => "",
                                1 => "",
                            ),
                            "OFFERS_FIELD_CODE" => array(
                                0 => "",
                                1 => "",
                            ),
                            "OFFERS_PROPERTY_CODE" => array(
                                0 => "COLOR_REF",
                                1 => "SIZES_SHOES",
                                2 => "SIZES_CLOTHES",
                                3 => "",
                            ),
                            "OFFERS_SORT_FIELD" => "sort",
                            "OFFERS_SORT_ORDER" => "desc",
                            "OFFERS_SORT_FIELD2" => "id",
                            "OFFERS_SORT_ORDER2" => "desc",
                            "OFFERS_LIMIT" => "5",
                            "TEMPLATE_THEME" => "site",
                            "PRODUCT_DISPLAY_MODE" => "Y",
                            "ADD_PICT_PROP" => "BIG_PHOTO",
                            "LABEL_PROP" => "-",
                            "OFFER_ADD_PICT_PROP" => "-",
                            "OFFER_TREE_PROPS" => array(
                                0 => "COLOR_REF",
                                1 => "SIZES_SHOES",
                                2 => "SIZES_CLOTHES",
                            ),
                            "PRODUCT_SUBSCRIPTION" => "N",
                            "SHOW_DISCOUNT_PERCENT" => "N",
                            "SHOW_OLD_PRICE" => "Y",
                            "SHOW_CLOSE_POPUP" => "N",
                            "MESS_BTN_BUY" => "Купить",
                            "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                            "MESS_BTN_SUBSCRIBE" => "Подписаться",
                            "MESS_BTN_DETAIL" => "Подробнее",
                            "MESS_NOT_AVAILABLE" => "Нет в наличии",
                            "SECTION_URL" => "",
                            "DETAIL_URL" => "",
                            "SECTION_ID_VARIABLE" => "SECTION_ID",
                            "SEF_MODE" => "N",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "36000000",
                            "CACHE_GROUPS" => "N",
                            "SET_TITLE" => "N",
                            "SET_BROWSER_TITLE" => "Y",
                            "BROWSER_TITLE" => "-",
                            "SET_META_KEYWORDS" => "Y",
                            "META_KEYWORDS" => "-",
                            "SET_META_DESCRIPTION" => "Y",
                            "META_DESCRIPTION" => "-",
                            "SET_LAST_MODIFIED" => "N",
                            "USE_MAIN_ELEMENT_SECTION" => "N",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "CACHE_FILTER" => "N",
                            "ACTION_VARIABLE" => "action",
                            "PRODUCT_ID_VARIABLE" => "id",
                            "PRICE_CODE" => array(
                                0 => "BASE",
                            ),
                            "USE_PRICE_COUNT" => "N",
                            "SHOW_PRICE_COUNT" => "1",
                            "PRICE_VAT_INCLUDE" => "Y",
                            "CONVERT_CURRENCY" => "N",
                            "USE_PRODUCT_QUANTITY" => "N",
                            "PRODUCT_QUANTITY_VARIABLE" => "",
                            "ADD_PROPERTIES_TO_BASKET" => "Y",
                            "PRODUCT_PROPS_VARIABLE" => "prop",
                            "PARTIAL_PRODUCT_PROPERTIES" => "N",
                            "PRODUCT_PROPERTIES" => array(
                            ),
                            "OFFERS_CART_PROPERTIES" => array(
                                0 => "COLOR_REF",
                                1 => "SIZES_SHOES",
                                2 => "SIZES_CLOTHES",
                            ),
                            "ADD_TO_BASKET_ACTION" => "ADD",
                            "PAGER_TEMPLATE" => "round",
                            "DISPLAY_TOP_PAGER" => "N",
                            "DISPLAY_BOTTOM_PAGER" => "Y",
                            "PAGER_TITLE" => "Товары",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "SET_STATUS_404" => "N",
                            "SHOW_404" => "N",
                            "MESSAGE_404" => "",
                            "BACKGROUND_IMAGE" => "-",
                            "DISABLE_INIT_JS_IN_COMPONENT" => "N"
                        ),
                        false
                    );?>
            </div>
            <?} else {?>
            <style>
                .hintWrapp {height:100%!important};
            </style>
            <?}?>

        <?/* Получаем бестселлеры от RetailRocket */
            global $BestsOnMain;
            $stringRecs = file_get_contents('http://api.retailrocket.ru/api/1.0/Recomendation/ItemsToMain/50b90f71b994b319dc5fd855/');
            $recsArray = json_decode($stringRecs);
            $BestsOnMain = Array('ID' => (array_slice($recsArray,0,6)));

            if ($BestsOnMain['ID'][0] > 0) { // Если рекомендации есть, ничего не меняем 

            } else { // Если рекомендаций нет, подставляем вручную созданные*/
                $BestsOnMain = array('PROPERTY_best_seller' => 285, ">DETAIL_PICTURE" => 0, "PROPERTY_show_on_index" => 340);
        }?>
        <div class="recomendation">
            <p class="titleMain">Бестселлеры</p>
            <?

                $APPLICATION->IncludeComponent(
                    "bitrix:catalog.section", 
                    "recommended_books", 
                    array(
                        "IBLOCK_TYPE_ID" => "catalog",
                        "IBLOCK_ID" => "4",
                        "BASKET_URL" => "/personal/cart/",
                        "COMPONENT_TEMPLATE" => "recommended_books",
                        "IBLOCK_TYPE" => "catalog",
                        "SECTION_ID" => $_REQUEST["SECTION_ID"],
                        "SECTION_CODE" => "",
                        "SECTION_USER_FIELDS" => array(
                            0 => "",
                            1 => "",
                        ),
                        //"ELEMENT_SORT_FIELD" => "PROPERTY_SALES_CNT",
                        "ELEMENT_SORT_FIELD" => "PROPERTY_POPULARITY",
                        "ELEMENT_SORT_ORDER" => "desc",
                        "ELEMENT_SORT_FIELD2" => "rand",
                        "ELEMENT_SORT_ORDER2" => "desc",
                        "FILTER_NAME" => "BestsOnMain",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "SHOW_ALL_WO_SECTION" => "Y",
                        "HIDE_NOT_AVAILABLE" => "N",
                        "PAGE_ELEMENT_COUNT" => "12",
                        "LINE_ELEMENT_COUNT" => "3",
                        "PROPERTY_CODE" => array(
                            0 => "",
                            1 => "",
                        ),
                        "OFFERS_FIELD_CODE" => array(
                            0 => "",
                            1 => "",
                        ),
                        "OFFERS_PROPERTY_CODE" => array(
                            0 => "COLOR_REF",
                            1 => "SIZES_SHOES",
                            2 => "SIZES_CLOTHES",
                            3 => "",
                        ),
                        "OFFERS_SORT_FIELD" => "sort",
                        "OFFERS_SORT_ORDER" => "desc",
                        "OFFERS_SORT_FIELD2" => "id",
                        "OFFERS_SORT_ORDER2" => "desc",
                        "OFFERS_LIMIT" => "5",
                        "TEMPLATE_THEME" => "site",
                        "PRODUCT_DISPLAY_MODE" => "Y",
                        "ADD_PICT_PROP" => "BIG_PHOTO",
                        "LABEL_PROP" => "-",
                        "OFFER_ADD_PICT_PROP" => "-",
                        "OFFER_TREE_PROPS" => array(
                            0 => "COLOR_REF",
                            1 => "SIZES_SHOES",
                            2 => "SIZES_CLOTHES",
                        ),
                        "PRODUCT_SUBSCRIPTION" => "N",
                        "SHOW_DISCOUNT_PERCENT" => "N",
                        "SHOW_OLD_PRICE" => "Y",
                        "SHOW_CLOSE_POPUP" => "N",
                        "MESS_BTN_BUY" => "Купить",
                        "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                        "MESS_BTN_SUBSCRIBE" => "Подписаться",
                        "MESS_BTN_DETAIL" => "Подробнее",
                        "MESS_NOT_AVAILABLE" => "Нет в наличии",
                        "SECTION_URL" => "",
                        "DETAIL_URL" => "",
                        "SECTION_ID_VARIABLE" => "SECTION_ID",
                        "SEF_MODE" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "36000000",
                        "CACHE_GROUPS" => "N",
                        "SET_TITLE" => "N",
                        "SET_BROWSER_TITLE" => "Y",
                        "BROWSER_TITLE" => "-",
                        "SET_META_KEYWORDS" => "Y",
                        "META_KEYWORDS" => "-",
                        "SET_META_DESCRIPTION" => "Y",
                        "META_DESCRIPTION" => "-",
                        "SET_LAST_MODIFIED" => "N",
                        "USE_MAIN_ELEMENT_SECTION" => "N",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "CACHE_FILTER" => "N",
                        "ACTION_VARIABLE" => "action",
                        "PRODUCT_ID_VARIABLE" => "id",
                        "PRICE_CODE" => array(
                            0 => "BASE",
                        ),
                        "USE_PRICE_COUNT" => "N",
                        "SHOW_PRICE_COUNT" => "1",
                        "PRICE_VAT_INCLUDE" => "Y",
                        "CONVERT_CURRENCY" => "N",
                        "USE_PRODUCT_QUANTITY" => "N",
                        "PRODUCT_QUANTITY_VARIABLE" => "",
                        "ADD_PROPERTIES_TO_BASKET" => "Y",
                        "PRODUCT_PROPS_VARIABLE" => "prop",
                        "PARTIAL_PRODUCT_PROPERTIES" => "N",
                        "PRODUCT_PROPERTIES" => array(
                        ),
                        "OFFERS_CART_PROPERTIES" => array(
                            0 => "COLOR_REF",
                            1 => "SIZES_SHOES",
                            2 => "SIZES_CLOTHES",
                        ),
                        "ADD_TO_BASKET_ACTION" => "ADD",
                        "PAGER_TEMPLATE" => "round",
                        "DISPLAY_TOP_PAGER" => "N",
                        "DISPLAY_BOTTOM_PAGER" => "Y",
                        "PAGER_TITLE" => "Товары",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "SET_STATUS_404" => "N",
                        "SHOW_404" => "N",
                        "MESSAGE_404" => "",
                        "BACKGROUND_IMAGE" => "-",
                        "DISABLE_INIT_JS_IN_COMPONENT" => "N"
                    ),
                    false
                );?>
        </div>
        <div class="saleWrapp">
            <div class="catalogWrapper">
                <div class="giftWrapBlock">
                    <div class="giftWrap">

                        <img src="/img/cifr.png"> 
                        <form action="/" method="post">
                            <input type="text" placeholder="Ваш e-mail" name="email" onkeypress="if (event.keyCode == 13) {return SubmitRequest(event);}">
                            <input type="button" value="">
                        </form>
                        <div class="some_info">
                            Заявка на подписку принята, ждите информацию на почту
                        </div>
                        <p class="title">
                            Книга в подарок
                        </p>
                        <p>
                            Подпишись на рыссылку и получи книгу бесплатно
                        </p>
                    </div>
                </div>
                <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include", 
                        ".default", 
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "AREA_FILE_RECURSIVE" => "Y",
                            "EDIT_TEMPLATE" => "",
                            "COMPONENT_TEMPLATE" => ".default",
                            "PATH" => "/include/discount_items_title.php"
                        ),
                        false
                    );?>
                <?  /*$disc_items = array ("ELEMENT_ID" => array());
                    $disc_list = CCatalogDiscount::GetList(array(), array(">=ACTIVE_FROM" => "01.12.2015 00:00:00", "<=ACTIVE_TO" => "31.12.2015 00:00:00"), false, false, array("ID", "SITE_ID", "ACTIVE", "ACTIVE_FROM", "ACTIVE_TO", 
                    "RENEWAL", "NAME", "SORT", "MAX_DISCOUNT", "VALUE_TYPE", 
                    "VALUE", "CURRENCY", "PRODUCT_ID"));
                    while ($disc_fetch = $disc_list -> Fetch())
                    {
                    $disc_items["ELEMENT_ID"][] = $disc_fetch["PRODUCT_ID"]; 
                    }*/
                    $disc_items = array ('PROPERTY_discount_on' => '276');
                    //arshow($disc_items);?> 
                <?$APPLICATION->IncludeComponent(
                        "bitrix:catalog.section", 
                        "discount_books", 
                        array(
                            "ACTION_VARIABLE" => "action",
                            "ADD_PICT_PROP" => "-",
                            "ADD_PROPERTIES_TO_BASKET" => "Y",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "ADD_TO_BASKET_ACTION" => "ADD",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "BACKGROUND_IMAGE" => "-",
                            "BASKET_URL" => "/personal/basket.php",
                            "BROWSER_TITLE" => "-",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "N",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "A",
                            "COMPONENT_TEMPLATE" => "discount_books",
                            "CONVERT_CURRENCY" => "N",
                            "DETAIL_URL" => "",
                            "DISPLAY_BOTTOM_PAGER" => "Y",
                            "DISPLAY_TOP_PAGER" => "N",
                            "ELEMENT_SORT_FIELD" => "sort",
                            "ELEMENT_SORT_FIELD2" => "id",
                            "ELEMENT_SORT_ORDER" => "asc",
                            "ELEMENT_SORT_ORDER2" => "desc",
                            "FILTER_NAME" => "disc_items",
                            "HIDE_NOT_AVAILABLE" => "N",
                            "IBLOCK_ID" => "4",
                            "IBLOCK_TYPE" => "catalog",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "LABEL_PROP" => "-",
                            "LINE_ELEMENT_COUNT" => "3",
                            "MESSAGE_404" => "",
                            "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                            "MESS_BTN_BUY" => "Купить",
                            "MESS_BTN_DETAIL" => "Подробнее",
                            "MESS_BTN_SUBSCRIBE" => "Подписаться",
                            "MESS_NOT_AVAILABLE" => "Нет в наличии",
                            "META_DESCRIPTION" => "-",
                            "META_KEYWORDS" => "-",
                            "OFFERS_LIMIT" => "5",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => ".default",
                            "PAGER_TITLE" => "Товары",
                            "PAGE_ELEMENT_COUNT" => "30",
                            "PARTIAL_PRODUCT_PROPERTIES" => "N",
                            "PRICE_CODE" => array(
                                0 => "BASE",
                            ),
                            "PRICE_VAT_INCLUDE" => "Y",
                            "PRODUCT_ID_VARIABLE" => "id",
                            "PRODUCT_PROPERTIES" => array(
                            ),
                            "PRODUCT_PROPS_VARIABLE" => "prop",
                            "PRODUCT_QUANTITY_VARIABLE" => "",
                            "PRODUCT_SUBSCRIPTION" => "N",
                            "PROPERTY_CODE" => array(
                                0 => "discount_on",
                                1 => "spec_price",
                                2 => "",
                            ),
                            "SECTION_CODE" => "",
                            "SECTION_ID" => $_REQUEST["SECTION_ID"],
                            "SECTION_ID_VARIABLE" => "SECTION_ID",
                            "SECTION_URL" => "",
                            "SECTION_USER_FIELDS" => array(
                                0 => "",
                                1 => "",
                            ),
                            "SEF_MODE" => "N",
                            "SET_BROWSER_TITLE" => "Y",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "Y",
                            "SET_META_KEYWORDS" => "Y",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SHOW_404" => "N",
                            "SHOW_ALL_WO_SECTION" => "Y",
                            "SHOW_CLOSE_POPUP" => "N",
                            "SHOW_DISCOUNT_PERCENT" => "N",
                            "SHOW_OLD_PRICE" => "N",
                            "SHOW_PRICE_COUNT" => "1",
                            "TEMPLATE_THEME" => "blue",
                            "USE_MAIN_ELEMENT_SECTION" => "N",
                            "USE_PRICE_COUNT" => "N",
                            "USE_PRODUCT_QUANTITY" => "N",
                            "DISABLE_INIT_JS_IN_COMPONENT" => "N"
                        ),
                        false
                    );?>
            </div>
        </div>

        <?/*?></p><?*/?> 
    </div>
</div>
<?$APPLICATION->IncludeComponent(
        "bitrix:news.list", 
        "main_banners", 
        array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ADD_SECTIONS_CHAIN" => "Y",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "N",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "COMPONENT_TEMPLATE" => "main_banners",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array(
                0 => "DETAIL_PICTURE",
                1 => "",
            ),
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "5",
            "IBLOCK_TYPE" => "news",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "20",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Новости",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array(
                0 => "LINK",
                1 => "",
            ),
            "SET_BROWSER_TITLE" => "Y",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "Y",
            "SET_META_KEYWORDS" => "Y",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => "ACTIVE_FROM",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "DESC",
            "SORT_ORDER2" => "ASC"
        ),
        false
    );?>
<div class="hintWrapp EditorChoiceWrapp">
    <div class="catalogWrapper">
        <p class="title">
            Подборки книг
        </p>
        <?/*?><p><?*/
            //$SelectionFilter = array(">CATALOG_PRICE_1" => 0);?>
        <?$APPLICATION->IncludeComponent(
                "bitrix:catalog.section.list", 
                "editor_choice", 
                array(
                    "VIEW_MODE" => "LIST",
                    "SHOW_PARENT_NAME" => "Y",
                    "IBLOCK_TYPE" => "catalog",
                    "IBLOCK_ID" => "4",
                    "SECTION_ID" => $_REQUEST["SECTION_ID"],
                    "SECTION_CODE" => "",
                    "SECTION_URL" => "",
                    "COUNT_ELEMENTS" => "Y",
                    "TOP_DEPTH" => "2",
                    "SECTION_FIELDS" => array(
                        0 => "",
                        1 => "",
                    ),
                    "SECTION_USER_FIELDS" => array(
                        0 => "",
                        1 => "",
                    ),
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_NOTES" => "",
                    "CACHE_GROUPS" => "N",
                    "COMPONENT_TEMPLATE" => "editor_choice"
                ),
                false
            );?>
    </div>
</div>
<? 
    $AllBooksFilter = array ("!SECTION_ID" => 57, ">CATALOG_PRICE_1" => 0, "!PROPERTY_STATE" => 23);

    $APPLICATION->IncludeComponent(
        "bitrix:catalog.section", 
        "all_books", 
        array(
            "IBLOCK_TYPE_ID" => "catalog",
            "IBLOCK_ID" => "4",
            "BASKET_URL" => "/personal/cart/",
            "COMPONENT_TEMPLATE" => "all_books",
            "IBLOCK_TYPE" => "catalog",
            "SECTION_ID" => $_REQUEST["SECTION_ID"],
            "SECTION_CODE" => "",
            "SECTION_USER_FIELDS" => array(
                0 => "",
                1 => "",
            ),
            "ELEMENT_SORT_FIELD" => "RAND",
            "ELEMENT_SORT_ORDER" => "desc",
            "ELEMENT_SORT_FIELD2" => "id",
            "ELEMENT_SORT_ORDER2" => "desc",
            "FILTER_NAME" => "AllBooksFilter",
            "INCLUDE_SUBSECTIONS" => "Y",
            "SHOW_ALL_WO_SECTION" => "Y",
            "HIDE_NOT_AVAILABLE" => "N",
            "PAGE_ELEMENT_COUNT" => "18",
            "LINE_ELEMENT_COUNT" => "6",
            "PROPERTY_CODE" => array(
                0 => "STATE",
                1 => "number_volumes",
                2 => "",
            ),
            "OFFERS_FIELD_CODE" => array(
                0 => "",
                1 => "",
            ),
            "OFFERS_PROPERTY_CODE" => array(
                0 => "COLOR_REF",
                1 => "SIZES_SHOES",
                2 => "SIZES_CLOTHES",
                3 => "",
            ),
            "OFFERS_SORT_FIELD" => "sort",
            "OFFERS_SORT_ORDER" => "desc",
            "OFFERS_SORT_FIELD2" => "id",
            "OFFERS_SORT_ORDER2" => "desc",
            "OFFERS_LIMIT" => "5",
            "TEMPLATE_THEME" => "site",
            "PRODUCT_DISPLAY_MODE" => "Y",
            "ADD_PICT_PROP" => "BIG_PHOTO",
            "LABEL_PROP" => "-",
            "OFFER_ADD_PICT_PROP" => "-",
            "OFFER_TREE_PROPS" => array(
                0 => "COLOR_REF",
                1 => "SIZES_SHOES",
                2 => "SIZES_CLOTHES",
            ),
            "PRODUCT_SUBSCRIPTION" => "N",
            "SHOW_DISCOUNT_PERCENT" => "N",
            "SHOW_OLD_PRICE" => "Y",
            "SHOW_CLOSE_POPUP" => "N",
            "MESS_BTN_BUY" => "Купить",
            "MESS_BTN_ADD_TO_BASKET" => "В корзину",
            "MESS_BTN_SUBSCRIBE" => "Подписаться",
            "MESS_BTN_DETAIL" => "Подробнее",
            "MESS_NOT_AVAILABLE" => "Нет в наличии",
            "SECTION_URL" => "",
            "DETAIL_URL" => "",
            "SECTION_ID_VARIABLE" => "SECTION_ID",
            "SEF_MODE" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "60",
            "CACHE_GROUPS" => "N",
            "SET_TITLE" => "N",
            "SET_BROWSER_TITLE" => "Y",
            "BROWSER_TITLE" => "-",
            "SET_META_KEYWORDS" => "Y",
            "META_KEYWORDS" => "-",
            "SET_META_DESCRIPTION" => "Y",
            "META_DESCRIPTION" => "-",
            "SET_LAST_MODIFIED" => "N",
            "USE_MAIN_ELEMENT_SECTION" => "N",
            "ADD_SECTIONS_CHAIN" => "N",
            "CACHE_FILTER" => "N",
            "ACTION_VARIABLE" => "action",
            "PRODUCT_ID_VARIABLE" => "id",
            "PRICE_CODE" => array(
                0 => "BASE",
            ),
            "USE_PRICE_COUNT" => "N",
            "SHOW_PRICE_COUNT" => "1",
            "PRICE_VAT_INCLUDE" => "Y",
            "CONVERT_CURRENCY" => "N",
            "USE_PRODUCT_QUANTITY" => "N",
            "PRODUCT_QUANTITY_VARIABLE" => "",
            "ADD_PROPERTIES_TO_BASKET" => "Y",
            "PRODUCT_PROPS_VARIABLE" => "prop",
            "PARTIAL_PRODUCT_PROPERTIES" => "N",
            "PRODUCT_PROPERTIES" => array(
            ),
            "OFFERS_CART_PROPERTIES" => array(
                0 => "COLOR_REF",
                1 => "SIZES_SHOES",
                2 => "SIZES_CLOTHES",
            ),
            "ADD_TO_BASKET_ACTION" => "ADD",
            "PAGER_TEMPLATE" => "round",
            "DISPLAY_TOP_PAGER" => "N",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "PAGER_TITLE" => "Товары",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "SET_STATUS_404" => "N",
            "SHOW_404" => "N",
            "MESSAGE_404" => "",
            "BACKGROUND_IMAGE" => "-",
            "DISABLE_INIT_JS_IN_COMPONENT" => "N"
        ),
        false
    );?>

<div class="reviewsWrapp">
    <div class="catalogWrapper">
        <div class="arrows">
            <img src="/img/arrowRoundLeft.png" id="left"> <img src="/img/arrowRoundRight.png" id="right">
        </div>
        <p class="revTitle">
            Отзывы
        </p>     
        <?
            $RevFilter = array("!SECTION_ID" => true);
            $APPLICATION->IncludeComponent(
                "bitrix:catalog.section", 
                "latest_reviews", 
                array(
                    "IBLOCK_TYPE_ID" => "catalog",
                    "IBLOCK_ID" => "31",
                    "BASKET_URL" => "/personal/cart/",
                    "COMPONENT_TEMPLATE" => "latest_reviews",
                    "IBLOCK_TYPE" => "catalog",
                    "SECTION_ID" => $_REQUEST["SECTION_ID"],
                    "SECTION_CODE" => "",
                    "SECTION_USER_FIELDS" => array(
                        0 => "",
                        1 => "",
                    ),
                    "ELEMENT_SORT_FIELD" => "rand",
                    "ELEMENT_SORT_ORDER" => "desc",
                    "ELEMENT_SORT_FIELD2" => "id",
                    "ELEMENT_SORT_ORDER2" => "desc",
                    "FILTER_NAME" => "RevFilter",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "SHOW_ALL_WO_SECTION" => "Y",
                    "HIDE_NOT_AVAILABLE" => "N",
                    "PAGE_ELEMENT_COUNT" => "8",
                    "LINE_ELEMENT_COUNT" => "3",
                    "PROPERTY_CODE" => array(
                        0 => "BOOK",
                        1 => "expert",
                        2 => "review",
                        3 => "name",
                        4 => "comment",
                        5 => "stars",
                        6 => "",
                    ),
                    "OFFERS_FIELD_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "OFFERS_PROPERTY_CODE" => array(
                        0 => "COLOR_REF",
                        1 => "SIZES_SHOES",
                        2 => "SIZES_CLOTHES",
                        3 => "",
                    ),
                    "OFFERS_SORT_FIELD" => "sort",
                    "OFFERS_SORT_ORDER" => "desc",
                    "OFFERS_SORT_FIELD2" => "id",
                    "OFFERS_SORT_ORDER2" => "desc",
                    "OFFERS_LIMIT" => "5",
                    "TEMPLATE_THEME" => "site",
                    "PRODUCT_DISPLAY_MODE" => "Y",
                    "ADD_PICT_PROP" => "-",
                    "LABEL_PROP" => "-",
                    "OFFER_ADD_PICT_PROP" => "-",
                    "OFFER_TREE_PROPS" => array(
                        0 => "COLOR_REF",
                        1 => "SIZES_SHOES",
                        2 => "SIZES_CLOTHES",
                    ),
                    "PRODUCT_SUBSCRIPTION" => "N",
                    "SHOW_DISCOUNT_PERCENT" => "N",
                    "SHOW_OLD_PRICE" => "Y",
                    "SHOW_CLOSE_POPUP" => "N",
                    "MESS_BTN_BUY" => "Купить",
                    "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                    "MESS_BTN_SUBSCRIBE" => "Подписаться",
                    "MESS_BTN_DETAIL" => "Подробнее",
                    "MESS_NOT_AVAILABLE" => "Нет в наличии",
                    "SECTION_URL" => "",
                    "DETAIL_URL" => "",
                    "SECTION_ID_VARIABLE" => "SECTION_ID",
                    "SEF_MODE" => "N",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_GROUPS" => "Y",
                    "SET_TITLE" => "N",
                    "SET_BROWSER_TITLE" => "Y",
                    "BROWSER_TITLE" => "-",
                    "SET_META_KEYWORDS" => "Y",
                    "META_KEYWORDS" => "-",
                    "SET_META_DESCRIPTION" => "Y",
                    "META_DESCRIPTION" => "-",
                    "SET_LAST_MODIFIED" => "N",
                    "USE_MAIN_ELEMENT_SECTION" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "CACHE_FILTER" => "N",
                    "ACTION_VARIABLE" => "action",
                    "PRODUCT_ID_VARIABLE" => "id",
                    "PRICE_CODE" => array(
                        0 => "BASE",
                    ),
                    "USE_PRICE_COUNT" => "N",
                    "SHOW_PRICE_COUNT" => "1",
                    "PRICE_VAT_INCLUDE" => "Y",
                    "CONVERT_CURRENCY" => "N",
                    "USE_PRODUCT_QUANTITY" => "N",
                    "PRODUCT_QUANTITY_VARIABLE" => "",
                    "ADD_PROPERTIES_TO_BASKET" => "Y",
                    "PRODUCT_PROPS_VARIABLE" => "prop",
                    "PARTIAL_PRODUCT_PROPERTIES" => "N",
                    "PRODUCT_PROPERTIES" => array(
                    ),
                    "OFFERS_CART_PROPERTIES" => array(
                        0 => "COLOR_REF",
                        1 => "SIZES_SHOES",
                        2 => "SIZES_CLOTHES",
                    ),
                    "ADD_TO_BASKET_ACTION" => "ADD",
                    "PAGER_TEMPLATE" => "round",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "PAGER_TITLE" => "Товары",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "SET_STATUS_404" => "N",
                    "SHOW_404" => "N",
                    "MESSAGE_404" => "",
                    "BACKGROUND_IMAGE" => "-",
                    "DISABLE_INIT_JS_IN_COMPONENT" => "N"
                ),
                false
            );?>
        <div class="dopSaleWrap">
            <div class="dopSale">
                Дополнительные скидки
            </div>

            <div class="percentBlock">
                <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include", 
                        ".default", 
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "AREA_FILE_RECURSIVE" => "Y",
                            "EDIT_TEMPLATE" => "",
                            "COMPONENT_TEMPLATE" => ".default",
                            "PATH" => "/include/main_discount_left.php"
                        ),
                        false
                    );?>
            </div>

            <div class="TwentypercentBlock">
                <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include", 
                        ".default", 
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "AREA_FILE_RECURSIVE" => "Y",
                            "EDIT_TEMPLATE" => "",
                            "COMPONENT_TEMPLATE" => ".default",
                            "PATH" => "/include/main_discount_right.php"
                        ),
                        false
                    );?>
            </div>
        </div>
    </div>
</div>
<div class="paymentWrapp">
    <div class="catalogWrapper">
        <div class="comfortPayment">
            <p class="title">
                Комфортная оплата
            </p>
            <div class="image_visa"></div>
            <div class="image_mastercard"></div>
            <div class="image_yandexmoney"></div>
            <div class="image_webmoney"></div>
            <div class="variants">
                <div>
                    <a href="/content/payment/#cash">
                        <p>
                            Оплата наличными
                        </p>
                    </a>
                    <a href="/content/payment/#bankcard">
                        <p>
                            Оплата банковской картой
                        </p>
                    </a>
                    <a href="/content/payment/#epayments">
                        <p>
                            Электронные платежи            
                        </p>
                    </a>
                </div>
                <div>
                    <a href="/content/payment/#cashless">
                        <p>
                            Безналичный перевод для юр. лиц
                        </p>
                    </a>
                    <a href="/content/payment/#banktransf">
                        <p>
                            Банковский перевод
                        </p>
                    </a>
                </div>
            </div>
        </div>
        <div class="shiping">
            <p class="title">
                Удобная доставка
            </p>
            <div class="image_iml"></div>
            <div class="image_pickpoint"></div>
            <div class="image_russianpost"></div>
            <div class="variants">
                <div>
                    <a href="/content/delivery/#moscow_courier">
                        <p>
                            Курьерская доставка по Москве и Подмосковью
                        </p>
                    </a>
                    <a href="/content/delivery/#russianpost">
                        <p>
                            Доставка почтой по всей России
                        </p>
                    </a>
                </div>
                <div>
                    <a href="/content/delivery/#iml_delivery">
                        <p>
                            Международная доставка
                        </p>
                    </a>
                    <a href="/content/delivery/#pickup">
                        <p>
                            Самовывоз м.Полежаевская
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>


    $(".some_info").click(function(){
        $(".some_info").hide();
        $(".layout").hide();
    });


    /*$(".layout").click(function(){
    alert(123);
    $(".some_info").hide();
    $(".layout").hide();
    })*/



    if ($(".saleSlider ul li").size() < 6)
    {
        $(".saleSlider .left").hide();
        $(".saleSlider .right").hide();
    } 
</script>

<script type="text/javascript" src="//static.criteo.net/js/ld/ld.js" async="true"></script>
<script type="text/javascript">
    window.criteo_q = window.criteo_q || [];
    window.criteo_q.push(
        { event: "setAccount", account: 18519 },
        <?if($USER->IsAuthorized()){?>   
            { event: "setEmail", email: "<?=$USER->GetEmail()?>" },
            <?}?>
        { event: "setSiteType", type: "d" },
        { event: "viewHome" }
    );
</script>