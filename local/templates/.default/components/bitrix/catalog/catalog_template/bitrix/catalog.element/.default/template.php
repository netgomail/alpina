<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
    $this->setFrameMode(true);
?>

<?$this->setFrameMode(true);
$templateLibrary = array('popup');
$currencyList = '';
if (!empty($arResult['CURRENCIES'])) {
    $templateLibrary[] = 'currency';
    $currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}
$templateData = array(
    'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
    'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME'],
    'TEMPLATE_LIBRARY' => $templateLibrary,
    'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);

$strMainID = $this->GetEditAreaId($arResult['ID']);
$arItemIDs = array(
    'ID' => $strMainID,
    'PICT' => $strMainID.'_pict',
    'DISCOUNT_PICT_ID' => $strMainID.'_dsc_pict',
    'STICKER_ID' => $strMainID.'_sticker',
    'BIG_SLIDER_ID' => $strMainID.'_big_slider',
    'BIG_IMG_CONT_ID' => $strMainID.'_bigimg_cont',
    'SLIDER_CONT_ID' => $strMainID.'_slider_cont',
    'SLIDER_LIST' => $strMainID.'_slider_list',
    'SLIDER_LEFT' => $strMainID.'_slider_left',
    'SLIDER_RIGHT' => $strMainID.'_slider_right',
    'OLD_PRICE' => $strMainID.'_old_price',
    'PRICE' => $strMainID.'_price',
    'DISCOUNT_PRICE' => $strMainID.'_price_discount',
    'SLIDER_CONT_OF_ID' => $strMainID.'_slider_cont_',
    'SLIDER_LIST_OF_ID' => $strMainID.'_slider_list_',
    'SLIDER_LEFT_OF_ID' => $strMainID.'_slider_left_',
    'SLIDER_RIGHT_OF_ID' => $strMainID.'_slider_right_',
    'QUANTITY' => $strMainID.'_quantity',
    'QUANTITY_DOWN' => $strMainID.'_quant_down',
    'QUANTITY_UP' => $strMainID.'_quant_up',
    'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
    'QUANTITY_LIMIT' => $strMainID.'_quant_limit',
    'BASIS_PRICE' => $strMainID.'_basis_price',
    'BUY_LINK' => $strMainID.'_buy_link',
    'ADD_BASKET_LINK' => $strMainID.'_add_basket_link',
    'BASKET_ACTIONS' => $strMainID.'_basket_actions',
    'NOT_AVAILABLE_MESS' => $strMainID.'_not_avail',
    'COMPARE_LINK' => $strMainID.'_compare_link',
    'PROP' => $strMainID.'_prop_',
    'PROP_DIV' => $strMainID.'_skudiv',
    'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
    'OFFER_GROUP' => $strMainID.'_set_group_',
    'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
);?>

<div class="productElementWrapp" itemscope itemtype="http://schema.org/Book">
    <meta itemprop="inLanguage" content="ru-RU"/>

    <div class="centerWrapper"> 

        <div class="catalogIcon" onmouseover="dataLayer.push({'event' : 'smallCatalogInteractions', 'action' : 'overTheIcon'});" onclick="dataLayer.push({'event' : 'smallCatalogInteractions', 'action' : 'openSmallCatalog'});">
        </div>
        <div class="basketIcon" onmouseover="dataLayer.push({'event' : 'smallCartInteractions', 'action' : 'overTheIcon'});" onclick="dataLayer.push({'event' : 'smallCartInteractions', 'action' : 'openSmallCart'});">
        </div>

        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "catalog_crumb", Array(
            "START_FROM" => "0",    // Номер пункта, начиная с которого будет построена навигационная цепочка
            "PATH" => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
            "SITE_ID" => "-",    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
            "COMPONENT_TEMPLATE" => ".default"
            ),
            false,
            array(
                "ACTIVE_COMPONENT" => "Y"
            )
        );?>

        <div class="elementDescriptWrap">
            <div class="leftColumn">
                <div class="elementMainPict">
                    <div class="badge">
                        <?if (($arResult["PROPERTIES"]["discount_ban"]["VALUE"] != "Y") 
                            && $arResult['PROPERTIES']['spec_price']['VALUE'] ) {
                                switch ($arResult['PROPERTIES']['spec_price']['VALUE']) {
                                    case 10: 
                                        echo '<img class="discount_badge" src="/img/10percent.png">';
                                        break;
                                    case 15:
                                        echo '<img class="discount_badge" src="/img/15percent.png">';
                                        break;
                                    case 20:
                                        echo '<img class="discount_badge" src="/img/20percent.png">';
                                        break;
                                    case 30: 
                                        echo '<img class="discount_badge" src="/img/30percent.png">';
                                        break;
                                    case 40:
                                        echo '<img class="discount_badge" src="/img/40percent_black.png">';
                                        break;

                                } 
                        }?>
                    </div>
                    <?
                        if (isset($arResult["additional_image"]["DETAIL_PICTURE"]["src"])) {
                            echo '<div class="additional-image" style="position:absolute; top:-25px; left:-41px"><img src="' . $arResult["additional_image"]["DETAIL_PICTURE"]["src"] . '"></div>'; 
                        }
                    ?>

                    <div class="bookPages">
                        <?
                            if ($arResult["MAIN_PICTURE"]) {?>
                                <a class="grouped_elements" rel="group1" href="<?=$arResult["MAIN_PICTURE"]?>"><img src="<?=$arResult["MAIN_PICTURE"]?>"></a>
                            <?}      
                        ?> 
                    </div>  
                    <?if (($arResult["PHOTO_COUNT"] > 0) && ($arResult["MAIN_PICTURE"] != '')) {?>

                        <a href="<?=$arResult["MAIN_PICTURE"]?>" class="fancybox fancybox.iframe">
                            <div class="overlay">
                                <p><?= GetMessage("BROWSE_THE_BOOK") ?></p>
                            </div>
                        </a>     

                    <?}?>                     

                    <div class="element_item_img">
                        <?if ($arResult["PICTURE"]["src"]) {?>
                            <img src="<?= $arResult["PICTURE"]["src"] ?>" itemprop="image" alt="<?= $arResult["NAME"] ?>" title="<?= $arResult["NAME"] ?>" />
                        <?} else {?>
                            <img src="/images/no_photo.png">
                        <?}?>
                        <?if(!empty($arResult["PROPERTIES"]["number_volumes"]["VALUE"])) {?>
                            <span class="volumes"><?= $arResult["PROPERTIES"]["number_volumes"]["VALUE"] ?></span>
                        <?}?>
                    </div>    
                </div>
                <div class="marks">
                    <?if ($arResult["PROPERTIES"]["STATE"]["VALUE_ENUM_ID"] == NEW_BOOK_STATE_XML_ID) {?>
                        <div class="newBookMark">
                            <p><?= GetMessage("NEW_BOOK") ?></p>
                        </div>
                    <?}?>
                    <?if ($arResult["PROPERTIES"]["best_seller"]["VALUE_ENUM_ID"] == BESTSELLER_BOOK_XML_ID) {?>   
                        <div class="bestBookMark">
                            <p><?= GetMessage("BESTSELLER_BOOK") ?></p>
                        </div>
                    <?}?>    
                </div>
                <?if ($arResult["PROPERTIES"]["AUTHOR_SIGNING"]["VALUE"]) {?>
                    <a href="<?= $arResult["SIGN_PICTURE"] ?>" class="fancybox fancybox.iframe signingPopup">
                        <div class="authorSigning">
                        </div>
                    </a>
                    <a href="/search/index.php?q=%D1%81+%D0%B0%D0%B2%D1%82%D0%BE%D0%B3%D1%80%D0%B0%D1%84%D0%BE%D0%BC&s=">
                        <div class="authorSigningText">
                            <?= GetMessage("SIGNED_BOOK") ?>
                        </div>
                    </a>
                <?}?>
                <?if ($USER -> IsAuthorized()) {
                    if ($arResult["WISHLIST_ITEM"]) {?>
                        <a href="javascript:void(0)" title="<?= GetMessage("WISHLIST_IN_BASKET") ?>">
                            <p class="AlreadyInWishlist"><?= GetMessage("ALREADY_IN_WISHLIST") ?></p>
                        </a>
                    <?} else {?>
                        <a href="javascript:void(0); return true;" onclick="dataLayer.push({event: 'addToWishList'});yaCounter1611177.reachGoal('addToWishlist');">
                            <p class="buyLater">Куплю позже</p>
                        </a>
                    <?}
                }?>
                <div class="wishlist_info">
                    <div class="CloseWishlist"><img src="/img/catalogLeftClose.png"></div>
                    <span></span>
                </div>
                <div class="takePartWrap">
                    <p class="title"><?= GetMessage("TO_GET_A_CHAPTER") ?></p>    
                    <p class="text"><?= GetMessage("CHAPTER_SENT") ?></p>
                    <input type="text" placeholder="<?= GetMessage("YOUR_EMAIL") ?>"> 
                </div>

                <div class="characteris">
                    <p class="title"><?= GetMessage("PUBLISHER") ?></p>
                    <p class="text">
                        <span itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
                            <span itemprop="name">
                                <?= $arResult["PROPERTIES"]["PUBLISHER"]["VALUE"] ?>
                            </span>
                        </span>
                    </p>    
                </div>
                <div class="characteris">
                    <p class="title"><?= GetMessage("ISBN") ?></p>
                    <p class="text" itemprop="isbn"><?= $arResult["PROPERTIES"]["ISBN"]["VALUE"] ?></p>    
                </div>
                <?if ($arResult["PROPERTIES"]["SERIES"]["VALUE"]) {?>
                    <div class="characteris">
                        <p class="title"><?= GetMessage("SERIES") ?></p>
                        <a href="/series/<?= $arResult["CURR_SERIES"]["ID"] ?>/">
                            <span class="text"><?= $arResult["CURR_SERIES"]["NAME"] ?></span>
                        </a>    
                    </div>
                <?}?>
                <div class="characteris">
                    <p class="title"><?= GetMessage("COVER_TYPE") ?></p>
                    <p class="text"><?= $arResult["PROPERTIES"]["COVER_TYPE"]["VALUE"] ?></p>
                    <?if ($arResult["PROPERTIES"]['COVER_TYPE']['VALUE_ENUM_ID'] == COVER_TYPE_SOFTCOVER_XML_ID) {?>
                        <link itemprop="bookFormat" href="http://schema.org/Paperback">
                    <?} else if ($arResult["PROPERTIES"]['COVER_TYPE']['VALUE_ENUM_ID'] == COVER_TYPE_HARDCOVER_XML_ID) {?>
                        <link itemprop="bookFormat" href="http://schema.org/Hardcover">
                    <?}?>					
                </div>
                <div class="characteris">
                    <p class="title"><?= GetMessage("PAGES_COUNT") ?></p>
                    <p class="text"><span itemprop="numberOfPages"><?= $arResult["PROPERTIES"]["PAGES"]["VALUE"] ?></span><?= GetMessage("PAGES") ?></p>    
                </div>
                <?if ($arResult['CAN_BUY'] && $arResult['PROPERTIES']['STATE']['VALUE_XML_ID'] != 'soon') {?>
                    <div class="characteris">
                        <a href="http://readright.ru/?=alpinabook" target="_blank">
                            <span class="text"><?= GetMessage("HOW_TO_READ_A_BOOK_IN_A_HOUR") ?></span>
                        </a>
                    </div>    
                <?}?> 				
                <?if($arResult["PROPERTIES"]["YEAR"]["VALUE"] != "") {?>
                    <div class="characteris">
                        <p class="title"><?= $arResult["PROPERTIES"]["YEAR"]["NAME"] ?></p>
                        <p class="text">
                            <span itemprop="datePublished">
                                <?= $arResult["PROPERTIES"]["YEAR"]["VALUE"] ?>
                            </span> 
                            г.
                            <?= !empty($arResult["PROPERTIES"]["edition_n"]["VALUE"]) ? '<br />' . $arResult["PROPERTIES"]["edition_n"]["VALUE"] : ""?>
                        </p>    
                    </div>   
                <?}?>



                <div class="characteris">
                    <p class="title"><?= GetMessage("SIZES") ?></p>
                    <p class="text"><?= $arResult["PROPERTIES"]["COVER_FORMAT"]["VALUE"] ?></p>    
                </div>
                <?if ($arResult["CATALOG_WEIGHT"]) {
                    $weight = $arResult["CATALOG_WEIGHT"];
                } else if ($arResult["PROPERTIES"]["LATEST_WEIGHT"]["VALUE"]) {
                    $weight = $arResult["PROPERTIES"]["LATEST_WEIGHT"]["VALUE"];
                }
                if ($weight) {?>
                    <div class="characteris">
                        <p class="title"><?= GetMessage("WEIGHT") ?></p>
                        <p class="text"><?= $weight ?><?= GetMessage("GRAMS") ?></p>    
                    </div>
                <?}?>
                <div class="socialServises">
                    <? require('include/socialbuttons.php'); ?>
                </div>
                <?#Спонсоры книги?>
                <!-- noindex -->
                <div class="sponsors">

                    <?foreach ($arResult["PROPERTIES"]["SPONSORS"]["VALUE"] as $val) {?>
                        <span style="color:#627478"><?= $arResult["SPONSOR_PREVIEW_TEXT"] ?> </span><br />
                        <?if (!empty($arResult["SPONSOR_PICT"])) {?>
                            <a href="http://<?= $arResult["SPONSOR_WEBSITE_VALUE"] ?>" class="sponsor_website" target="_blank" rel="nofollow"><img src="<?= $arResult["SPONSOR_PICT"] ?>"> </a>
                        <?} else {?>
                            <?= $authorFetchedList["NAME"] ?>
                        <?}?>

                        <? $authors .= $author_fetched_list["NAME"] . ", ";


                            ##Спонсоры книги?>
                    <?}?>
                </div>
                <!-- /noindex -->
            </div>
            <div class="rightColumn">
                <div class="priceBasketWrap" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <meta itemprop="priceCurrency" content="RUB" />
                    <?if ($USER->IsAuthorized()) {// blackfriday черная пятница
                        if ($arResult["SAVINGS_DISCOUNT"][0]["SUMM"] < $arResult["SALE_NOTE"][0]["RANGE_FROM"]) { 
                            $printDiscountText = "<span class='sale_price'>Вам не хватает " . ($arResult["SALE_NOTE"][0]["RANGE_FROM"] - $arResult["SAVINGS_DISCOUNT"][0]["SUMM"]) . " руб. до получения скидки в " . $arResult["SALE_NOTE"][0]["VALUE"] . "%</span>";
                        } elseif ($arResult["SAVINGS_DISCOUNT"][0]["SUMM"] < $arResult["SALE_NOTE"][1]["RANGE_FROM"]) { 
                            $printDiscountText = "<span class='sale_price'>Вам не хватает " . ($arResult["SALE_NOTE"][1]["RANGE_FROM"] - $arResult["SAVINGS_DISCOUNT"][0]["SUMM"]) . " руб. до получения скидки в " . $arResult["SALE_NOTE"][1]["VALUE"] . "%</span>";
                            $discount = $arResult["SALE_NOTE"][0]["VALUE"]; // процент накопительной скидки
                        } else {
                            $discount = $arResult["SALE_NOTE"][1]["VALUE"];  // процент накопительной скидки
                        } 
                    } else { 
                        if ($arResult["BASKET_ITEMS"]["sum_pruce"] < $arResult["SALE_NOTE"][0]["RANGE_FROM"]) { 
                            $printDiscountText = "<span class='sale_price'>Вам не хватает " . ($arResult["SALE_NOTE"][0]["RANGE_FROM"] - $arResult["BASKET_ITEMS"]["sum_pruce"]) . " руб. до получения скидки в " . $arResult["SALE_NOTE"][0]["VALUE"] . "%</span>";                            
                        } elseif ($arResult["BASKET_ITEMS"]["sum_pruce"] < $arResult["SALE_NOTE"][1]["RANGE_FROM"]) { 
                            $printDiscountText = "<span class='sale_price'>Вам не хватает " . ($arResult["SALE_NOTE"][1]["RANGE_FROM"] - $arResult["BASKET_ITEMS"]["sum_pruce"]) . " руб. до получения скидки в " . $arResult["SALE_NOTE"][1]["VALUE"] . "%</span>"; 
                            $discount = $arResult["SALE_NOTE"][0]["VALUE"];  // процент накопительной скидки
                        } else {
                            $discount = $arResult["SALE_NOTE"][1]["VALUE"];  // процент накопительной скидки
                        }   
                    }?>
                    <div class="wrap_prise_top">
                        <?$StockInfo = "";
                        if (!empty($arResult["PRICES"])) {
                            // если свойство товара в состоянии "Новинка" либо не задан - то выводить стандартный блок с ценой, 
                            // иначе выводить дату выхода книги либо поле для ввода e-mail для запроса уведомления о поступлении  
                            if ((intval ($arResult["PROPERTIES"]["STATE"]["VALUE_ENUM_ID"]) != getXMLIDByCode (CATALOG_IBLOCK_ID, "STATE", "soon") ) 
                                && (intval ($arResult["PROPERTIES"]["STATE"]["VALUE_ENUM_ID"]) != getXMLIDByCode(CATALOG_IBLOCK_ID, "STATE", "net_v_nal") )) {
                                    foreach ($arResult["PRICES"] as $code => $arPrice) {?>
                                        <link itemprop="availability" href="http://schema.org/InStock">

                                        <?$StockInfo = "InStock";
                                        if (round(($arPrice["VALUE"]) * (1 - $discount / 100), 2) . " руб." == $arPrice["PRINT_VALUE"]) {
                                            $discount = false;
                                        };   
                                        if ($arPrice["DISCOUNT_DIFF_PERCENT"] > 0) {?>
                                            <div class="oldPrice"><span itemprop="price"><?= $arPrice["PRINT_VALUE"] ?></span><p></p></div>  
                                            <?// расчитываем накопительную скидку от стоимости
                                            $newPrice = round (($arPrice["DISCOUNT_VALUE"]), 2);
                                            if (strlen (stristr($newPrice, ".")) == 2) {
                                                $newPrice .= "0";
                                            }?>
                                            <p class="newPrice"><?= $newPrice ?> <span><?= GetMessage("ROUBLES") ?></span></p>
                                        <?} else if ($discount) {
                                            $newPrice = round (($arPrice["VALUE"]) * (1 - $discount / 100), 2);
                                            if (strlen (stristr($newPrice, ".")) == 2) {
                                                $newPrice .= "0";
                                            }?>  
                                            <div class="oldPrice"><span itemprop="price"><?= $arPrice["PRINT_VALUE"] ?></span><p></p></div>  
                                            <?// расчитываем накопительную скидку от стоимости?>
                                            <p class="newPrice"><?= $newPrice ?> <span><?= GetMessage("ROUBLES") ?></span></p>
                                        <?} else {
                                            $newPrice = round($arPrice["VALUE_VAT"], 2);
                                            if (strlen(stristr($newPrice, ".")) == 2) {
                                                $newPrice .= "0";
                                            }?>
                                            <p class="newPrice"><?= $newPrice ?> <span><?= GetMessage("ROUBLES") ?></span></p>
                                        <?}?>  

                                        <?if ($printDiscountText != '') {
                                            echo $printDiscountText; // цена до скидки
                                        }?>   
                                    <?}
                                } else if ($arResult["PROPERTIES"]["STATE"]["VALUE_ENUM_ID"] == getXMLIDByCode(CATALOG_IBLOCK_ID, "STATE", "soon")) { ?>
                                    <link itemprop="availability" href="http://schema.org/PreOrder">
                                    <? $StockInfo = "SoonStock"; ?>
                                    <p class="newPrice" style="font-size:20px;"><?= GetMessage("EXPECTED_DATE") ?><?= strtolower(FormatDate("j F", MakeTimeStamp($arResult['PROPERTIES']['SOON_DATE_TIME']['VALUE'], "DD.MM.YYYY HH:MI:SS"))); ?></p>

                                <?} else {?>
                                    <link itemprop="availability" href="http://schema.org/OutOfStock">
                                    <?$StockInfo = "OutOfStock";?>
                                    <?foreach ($arResult["PRICES"] as $code => $arPrice) {  
                                        if ($arPrice["DISCOUNT_DIFF"]) {?>
                                            <div class="oldPrice"><span itemprop="price"><?= $arPrice["PRINT_VALUE"] ?></span><p></p></div>
                                        <?}?>
                                        <?if ($arPrice["DISCOUNT_VALUE_VAT"]) {
                                            $newPrice = round(($arPrice["DISCOUNT_VALUE_VAT"]), 2);
                                            if (strlen(stristr($newPrice, ".")) == 2) {
                                                $newPrice .= "0";
                                            }?>    
                                            <p class="newPrice"><?= $newPrice ?> <span><?= GetMessage("ROUBLES") ?></span></p>
                                        <?} else {
                                            $newPrice = round(($arPrice["ORIG_VALUE_VAT"]), 2);
                                            if (strlen(stristr($newPrice, ".")) == 2) {
                                                $newPrice .= "0";
                                            }?>
                                            <p class="newPrice"><span itemprop="price"><?= $newPrice ?></span> <span><?= GetMessage("ROUBLES") ?></span></p>
                                        <?}?>     
                                    <?}?>
                                    <p class="newPrice notAvailable" style="font-size:28px;"><?= GetMessage("NOT_IN_STOCK") ?></p>
                                <?}?> 
                                <?if ((intval($arResult["PROPERTIES"]["STATE"]["VALUE_ENUM_ID"]) == getXMLIDByCode(CATALOG_IBLOCK_ID, "STATE", "soon")) 
                                    || (intval($arResult["PROPERTIES"]["STATE"]["VALUE_ENUM_ID"]) == getXMLIDByCode(CATALOG_IBLOCK_ID, "STATE", "net_v_nal"))) {?>
                                        <form>
                                            <div>
                                                <p>
                                                    <span class="subscribeDesc"><?= GetMessage("SUBSCRIBING_DESCRIPTION") ?></span>
                                                </p>
                                                <input data-book_id="<?= $arResult['ID'] ?>" type="text" value="<?= $arResult["MAIL"]; ?>" name="email" class="subscribeEmail"/> 
                                                <input type="button" onclick="newSubFunction(this);" class="getSubscribe" id="outOfStockClick" value="<?= GetMessage("TO_SUBSCRIBE") ?>"/>

                                            </div>
                                        </form>      
                                <?}?>
                        <?} else {?>
                            <p class="newPrice" style="font-size:28px;"><?= GetMessage("NOT_IN_STOCK") ?></p>
                                <form>
                                    <div>
                                        <p>
                                            <span class="subscribeDesc"><?= GetMessage("SUBSCRIBING_DESCRIPTION") ?></span>
                                        </p>
                                        <input data-book_id="<?= $arResult['ID'] ?>" type="text" value="<?= $arResult["MAIL"]; ?>" name="email" class="subscribeEmail"/> 
                                        <input type="button" onclick="newSubFunction(this);" class="getSubscribe" id="outOfStockClick" value="<?= GetMessage("TO_SUBSCRIBE") ?>"/>
                                    </div>
                                </form>    
                        <?}?>
                    </div>

                    <?if (!empty ($arResult["PRICES"]) ) {?>  
                        <?if ((intval($arResult["PROPERTIES"]["STATE"]["VALUE_ENUM_ID"]) != getXMLIDByCode(CATALOG_IBLOCK_ID, "STATE", "soon")) 
                            && (intval($arResult["PROPERTIES"]["STATE"]["VALUE_ENUM_ID"]) != getXMLIDByCode(CATALOG_IBLOCK_ID, "STATE", "net_v_nal"))) {?>
                                <div class="wrap_prise_bottom"> 
                                    <span class="item_buttons_counter_block">

                                        <a href="javascript:void(0)" class="minus" id="<?= $arResult['QUANTITY_DOWN']; ?>">&minus;</a>
                                        <input id="<?= $arResult['QUANTITY']; ?>" type="text" class="tac transparent_input" value="<?= (isset($arResult['OFFERS']) && !empty($arResult['OFFERS'])
                                                ? 1
                                                : $arResult['CATALOG_MEASURE_RATIO']
                                            ); ?>">
                                        <a href="javascript:void(0)" class="plus" id="<?= $arResult['QUANTITY_UP']; ?>">+</a>
                                    </span>
                                    <?if ($arResult["ITEM_IN_BASKET"]["QUANTITY"] == 0) {?>
                                        <a href="#" onclick="addtocart(<?= $arResult["ID"]; ?>, '<?= $arResult["NAME"]; ?>'); addToCartTracking(<?= $arResult["ID"]; ?>, '<?= $arResult["NAME"]; ?>', '<?= $arResult["PRICES"]["BASE"]["VALUE"] ?>', '<?= $arResult['SECTION']['NAME']; ?>', '1'); return false;">
                                            <p class="inBasket"><?= GetMessage("ADD_IN_BASKET") ?></p>
                                        </a>
                                        <?} else {?>
                                        <a href="/personal/cart/"><p class="inBasket" style="background-color: #A9A9A9;"><?= GetMessage("ALREADY_IN_BASKET") ?></p></a>
                                        <?}?>
                                    <a href="javascript:void(0);"><p class="buyOneClick"><?= GetMessage("TO_BUY_IN_1_CLICK") ?></p></a>
                                </div>
                        <?}?>

                    <?}?>

                </div>

                <div class="quickOrderDiv" style="display:none;">
                    <form method="post" id="quickOrderForm">
                        <input type="hidden" name="frmQuickOrderSent" value="Y">
                        <input type="hidden" name="qoProduct" id="id" value="<?= $arResult["ID"] ?>">
                        <div class="notify"></div>
                        <ul>
                            <li><?= GetMessage("NAME_FIELD_TITLE") ?></li>
                            <li>
                                <input type="text" name="name" value="" class="quickorder-name">
                            </li>
                            <li><?= GetMessage("PHONE_FIELD_TITLE") ?></li>
                            <li>
                                <input type="text" name="phone" value="" class="quickorder-phone">
                            </li>
                            <li><?= GetMessage("EMAIL_FIELD_TITLE") ?></li>
                            <li>
                                <input type="text" name="email" value="" class="quickorder-email">
                            </li>
                            <li class="last">
                                <input type="button" value="Оформить заказ" id="qoSend" class="input2">
                            </li>
                        </ul>
                        <a title="" href="#" onClick="$('.quickOrderDiv').hide(); $('.layout').hide(); return false;" class="closePopupContainer close1"></a>
                    </form>
                    <div class="CloseQuickOffer"><img src="/img/catalogLeftClose.png"></div>
                </div>
                <ul class="shippings">
                    <li><?= GetMessage("COURIER_DELIVERY") ?></li>
                    <li><?= GetMessage("MAIL_DELIVERY") ?></li>
                    <li><?= GetMessage("INTERNATIONAL_DELIVERY") ?></li>
                    <li><?= GetMessage("PICKUP_DELIVERY") ?></li>
                </ul>

                <div class="typesOfProduct">
                    <?if (!empty ($arResult["PROPERTIES"]["appstore"]['VALUE']) ) {?>
                        <!--noindex--><div class="productType" onclick="dataLayer.push({event: 'otherFormatsBlock', action: 'clickAppStore', label: '<?= $arResult['NAME'] ?>'});">
                            <p class="title"><a target="_blank" 
                                href="http://ad.apps.fm/I7nsUqHgFpiU6SjjFxr_lfE7og6fuV2oOMeOQdRqrE2fuH1E_AVE04uUy-835_z8AOyXPgYuNMr8J2cvDXlBe3JGR4QWfzRXdHADIOS0bhIlj-vcR89M4g_uNUXQBYtJhxsaY6DBokwX4FZL6ZW1oPCYagKnjd3JTKLywLOw94o" 
                                rel="nofollow"><?= GetMessage("BUY_IN_APPSTORE") ?></a></p>
                        </div><!--/noindex-->
                    <?}?>
                    <?if (!empty ($arResult["PROPERTIES"]["android"]['VALUE']) ) {?>
                        <!--noindex--><div class="productType" onclick="dataLayer.push({event: 'otherFormatsBlock', action: 'clickAndroid', label: '<?= $arResult['NAME'] ?>'});">
                            <p class="title"><a target="_blank" 
                                href="http://ad.apps.fm/JbkeS8Wu40Y4o7v66y0V515KLoEjTszcQMJsV6-2VnHFDLXitVHB6BlL95nuoNYfsPXjJaQ96brr8ncAvMfc6wZkKsYjZn26ZgfIprQwFxiMb6nGA0JPaw88nuXsLm5fGy9o7Q8KyEtAHAeX1UXtzRyIF-zfsrprYF9zs6rj2ac8dDeKR2QfG21w5iR5J8PU" 
                                rel="nofollow"><?= GetMessage("BUY_IN_GOOGLEPLAY") ?></a></p>
                        </div><!--/noindex-->
                    <?}?>
                </div>

                <div class="courierBlock">
                    <div style="width:400px;" id="data1">
                        <h4>Доставка по Москве*</h4>
                        <hr />
                        Осуществляется в течение двух рабочих дней с 11.00 до 19.00.
                        <br /><br />
                        В день доставки представитель курьерской службы обязательно свяжется с Вами для согласования времени доставки.
                        <br /><br />
                        Стоимость доставки - <b>149 руб.</b><br />
                        При заказе на сумму <b>от 2 000 руб. - БЕСПЛАТНО</b>.
                        <hr />
                        <div style="text-align:right">*о доставке в регионы вы можете прочитать <a href="/content/delivery/" target="_blank">здесь</a></div>
                    </div>
                </div>
                <div class="pickupBlock">
                    <div style="width:500px;" id="data2">
                        <h4>Самовывоз</h4>
                        <hr />
                        Товар будет собран в течение двух часов с момента поступления заказа.
                        <br /><br />Книги можно забрать в офисе интернет-магазина в рабочие дни <b>с 8.00 до 18.00</b>.
                        <br />
                        При заказе до 18 часов товар можно получить в тот же день!
                        <br /><br />
                        <b>Адрес</b>: м.Полежаевская, ул.4-ая Магистральная, д. 5, 2 подъезд, 2 этаж.
                        <br /><br />
                        <iframe src="https://www.google.com/maps/embed?pb=!1m25!1m12!1m3!1d2243.998204041206!2d37.52190224020577!3d55.775903036835956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m10!1i0!3e6!4m3!3m2!1d55.777864099999995!2d37.5213229!4m3!3m2!1d55.7745393!2d37.5204109!5e0!3m2!1sru!2sru!4v1395742400886" width="100%" height="350" frameborder="0" style="border:0"></iframe>
                    </div>
                </div>
                <?if ($arResult["PROPERTIES"]["author_book"]["VALUE"] == "Y") {?>
                    <div class="productAction">
                        <img src="/img/actionPicture.png">
                        <p class="title">Книга с автором</p>
                        <p class="text">Участвуй в акции и получи книгу с автографом автора</p>
                        <a href="#"><p class="takePart">Принять участие</p></a>
                    </div>
                <?}?>
            </div>
            <div class="subscr_result"></div>
            <div class="centerColumn">
                <h1 class="productName" itemprop="name"><?=$arResult["NAME"] ?></h1>
                <p class="engBookName"><?= $arResult["PROPERTIES"]["ENG_NAME"]["VALUE"] ?></p>
                <div class="authorReviewWrap">
                    <p class="reviews">
                        <span class="star"><img src="/img/activeStar.png"></span>
                        <span class="star"><img src="/img/activeStar.png"></span>
                        <span class="star"><img src="/img/activeStar.png"></span>
                        <span class="star"><img src="/img/activeStar.png"></span>
                        <span class="star"><img src="/img/unactiveStar.png"></span>
                        <span class="countOfRev"><?//=$reviews_count." ".format_by_count($reviews_count, 'отзыв', 'отзыва', 'отзывов');?></span>
                    </p>


                    <p class="productAutor">
                        <?= $arResult["AUTHOR_NAME"]; ?>
                    </p>

                </div>

                <?/* Пока закрыли другие варианты книги. Думаем, как сделать блок понятным для посетителей
                    <div class="typesOfProduct">
                    <div class="productType" onclick="dataLayer.push({event: 'otherFormatsBlock', action: 'clickCurrentVersion', label: '<?=$arResult['NAME']?>'})">
                    <p class="title"><?=$arResult["PROPERTIES"]['COVER_TYPE']['VALUE']?></p>
                    <?
                    foreach ($arResult["PRICES"] as $code => $arPrice)
                    { 
                    if ($arPrice["DISCOUNT_VALUE_VAT"])
                    {
                    ?>
                    <p class="cost"><?=ceil($arPrice["DISCOUNT_VALUE_VAT"])?> руб.</p>
                    <?
                    }
                    else
                    {
                    ?>
                    <p class="cost"><?=ceil($arPrice["ORIG_VALUE_VAT"])?> руб.</p>
                    <?  }
                    }
                    ?>
                    </div>
                    <?if (!empty($arResult["PROPERTIES"]["pereplet_v"]['VALUE'])) {
                    $pPrice = CPrice::GetList(array(),array("PRODUCT_ID"=>$arResult["PROPERTIES"]["pereplet_v"]['VALUE'],"CATALOG_GROUP_ID"=>$arResult["PRICES"][$arParams["PRICE_CODE"][0]]["PRICE_ID"]))->Fetch();
                    ?>
                    <?$pereplet_v = CCatalogProduct::GetByIDEx($arResult["PROPERTIES"]["pereplet_v"]['VALUE']);?>
                    <?if ($pPrice["PRICE"]) {?>
                    <div class="productType" onclick="dataLayer.push({event: 'otherFormatsBlock', action: 'clickHardCover', label: '<?=$arResult['NAME']?>'});">
                    <a href="<?=$pereplet_v["DETAIL_PAGE_URL"]?>"><p class="title">Твердый переплет</p>
                    <p class="cost"><?echo round($pPrice["PRICE"],0);?> руб.</p></a>
                    <?$arFile = CFile::GetFileArray($pereplet_v["DETAIL_PICTURE"]);    ?>
                    </div>
                    <?}?>
                    <?}?>

                    <?if (!empty($arResult["PROPERTIES"]["oblozhka_v"]['VALUE'])) {?>
                    <?$oblozhka_v = CCatalogProduct::GetByIDEx($arResult["PROPERTIES"]["oblozhka_v"]['VALUE']);?>
                    <div class="productType" onclick="dataLayer.push({event: 'otherFormatsBlock', action: 'clickSoftCover', label: '<?=$arResult['NAME']?>'});">
                    <a href="<?=$oblozhka_v["DETAIL_PAGE_URL"]?>"><p class="title">Мягкая обложка</p>
                    <p class="cost"><?echo $oblozhka_v["PRICES"][11]['PRICE'];?> руб.</p></a>
                    <?$arFile = CFile::GetFileArray($oblozhka_v["DETAIL_PICTURE"]);    ?>
                    </div>
                    <?}?>
                    <?if (!empty($arResult["PROPERTIES"]["superobl_v"]['VALUE'])) {?>
                    <?$superobl_v = CCatalogProduct::GetByIDEx($arResult["PROPERTIES"]["superobl_v"]['VALUE']);?>
                    <div class="productType" onclick="dataLayer.push({event: 'otherFormatsBlock', action: 'clickSuperCover', label: '<?=$arResult['NAME']?>'});">
                    <a href="<?=$superobl_v["DETAIL_PAGE_URL"]?>"><p class="title">Суперобложка</p>
                    <p class="cost"><?echo $superobl_v["PRICES"][11]['PRICE'];?> руб.</p></a>
                    <?$arFile = CFile::GetFileArray($superobl_v["DETAIL_PICTURE"]);    ?>
                    </div>
                    <?}?>
                    <?if (!empty($arResult["PROPERTIES"]["audio_v"]['VALUE'])) {?>
                    <?$superobl_v = CCatalogProduct::GetByIDEx($arResult["PROPERTIES"]["audio_v"]['VALUE']);?>
                    <div class="productType" onclick="dataLayer.push({event: 'otherFormatsBlock', action: 'clickAudio', label: '<?=$arResult['NAME']?>'});">
                    <a href="<?=$superobl_v["DETAIL_PAGE_URL"]?>"><p class="title">Аудиокнига</p>
                    <p class="cost"><?echo $superobl_v["PRICES"][11]['PRICE'];?> руб.</p></a>
                    <?$arFile = CFile::GetFileArray($superobl_v["DETAIL_PICTURE"]);    ?>
                    </div>
                    <?}?>            
                    <?if (!empty($arResult["PROPERTIES"]["appstore"]['VALUE'])) {?>
                    <!--noindex--><div class="productType" onclick="dataLayer.push({event: 'otherFormatsBlock', action: 'clickAppStore', label: '<?=$arResult['NAME']?>'});">
                    <p class="title"><a target="_blank" 
                    href="http://ad.apps.fm/I7nsUqHgFpiU6SjjFxr_lfE7og6fuV2oOMeOQdRqrE2fuH1E_AVE04uUy-835_z8AOyXPgYuNMr8J2cvDXlBe3JGR4QWfzRXdHADIOS0bhIlj-vcR89M4g_uNUXQBYtJhxsaY6DBokwX4FZL6ZW1oPCYagKnjd3JTKLywLOw94o" 
                    rel="nofollow">Купить электронную книгу в
                    <span>iPhone/iPad</span></a></p>
                    <?//<div class="imgCover" style="margin-top:-144px;"><img src="/bitrix/templates/books/images/appStoreBK_1.png" height="70" style="height:70px;" /></div>?>
                    </div><!--/noindex-->
                    <?}?>
                    <?if (!empty($arResult["PROPERTIES"]["android"]['VALUE'])) {?>
                    <!--noindex--><div class="productType" onclick="dataLayer.push({event: 'otherFormatsBlock', action: 'clickAndroid', label: '<?=$arResult['NAME']?>'});">
                    <p class="title"><a target="_blank" 
                    href="http://ad.apps.fm/JbkeS8Wu40Y4o7v66y0V515KLoEjTszcQMJsV6-2VnHFDLXitVHB6BlL95nuoNYfsPXjJaQ96brr8ncAvMfc6wZkKsYjZn26ZgfIprQwFxiMb6nGA0JPaw88nuXsLm5fGy9o7Q8KyEtAHAeX1UXtzRyIF-zfsrprYF9zs6rj2ac8dDeKR2QfG21w5iR5J8PU" 
                    rel="nofollow">Купить электронную книгу в
                    <span>Android</span></a></p>
                    <?//<div class="imgCover" style="margin-top:-144px;"><img src="/bitrix/templates/books/images/appStoreBK_1.png" height="70" style="height:70px;" /></div>?>
                    </div><!--/noindex-->
                    <?}?>
                </div>*/?>
                <ul class="productsMenu">
                    <li class="active tabsInElement" data-id="1"><?= GetMessage("ANNOTATION_TITLE") ?></li>
                    <li data-id="4" class="tabsInElement"><?= GetMessage("ABOUT_AUTHOR_TITLE") ?></li>
                    <?if ($arResult["REVIEWS_COUNT"] > 0) {?>
                        <li data-id="2" class="tabsInElement"><?= GetMessage("REVIEWS_TITLE") ?></li>
                    <?}?>
                    <li data-id="3" class="tabsInElement"><?= GetMessage("COMMENTS_TITLE") ?></li>
                </ul>
                <div class="annotation" id="prodBlock1"> 
                    <div class="showAllWrapp">

                        <?global $reviewsFilter;
                        $reviewsFilter = array ("PROPERTY_BOOK" => $arResult["ID"]);

                        $APPLICATION->IncludeComponent(
                            "bitrix:catalog.section", 
                            "this_book_reviews", 
                            array(
                                "IBLOCK_TYPE_ID" => "catalog",
                                "IBLOCK_ID" => "31",
                                "BASKET_URL" => "/personal/cart/",
                                "COMPONENT_TEMPLATE" => "this_book_reviews",
                                "IBLOCK_TYPE" => "news",
                                "SECTION_ID" => "",
                                "SECTION_CODE" => "",
                                "SECTION_USER_FIELDS" => array(
                                    0 => "",
                                    1 => "",
                                ),
                                "ELEMENT_SORT_FIELD" => "id",
                                "ELEMENT_SORT_ORDER" => "desc",
                                "ELEMENT_SORT_FIELD2" => "id",
                                "ELEMENT_SORT_ORDER2" => "asc",
                                "FILTER_NAME" => "reviewsFilter",
                                "INCLUDE_SUBSECTIONS" => "Y",
                                "SHOW_ALL_WO_SECTION" => "Y",
                                "HIDE_NOT_AVAILABLE" => "N",
                                "PAGE_ELEMENT_COUNT" => "8",
                                "LINE_ELEMENT_COUNT" => "3",
                                "PROPERTY_CODE" => array(
                                    0 => "name",
                                    1 => "comment",
                                    2 => "stars",
                                    3 => "",
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
                                "SET_TITLE" => "Y",
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

                        <?= $arResult["DETAIL_TEXT"] ?>
                    </div>

                    <?$videosCount  = 0;
                    foreach ($arResult['PROPERTIES']['video_about']['~VALUE'] as $videoYoutube) {
                        $videosCount++;
                    } 
                    if ($arResult['PROPERTIES']['video_about']['~VALUE'] != "") {?>
                        <p class="productSelectTitle"><?= GetMessage("VIDEO_PRESENTATIONS") ?> <? if($videosCount > 1) { ?><span><a href="#"><?= GetMessage("SHOW_ALL") ?></a></span><span class="count">(<?= $videosCount ?>)</span><? } ?></p>   
                    <?}?>

                    <div class="videoWrapp">
                        <?foreach ($arResult['PROPERTIES']['video_about']['~VALUE'] as $videoYoutube) {
                            echo ($videoYoutube);
                        }?>
                    </div>


                    <?if (!empty ($arResult['TAGS']) ) {
                        echo "<p class='productSelectTitle'>Ключевые понятия</p>";
                        echo "<ul class='keyWords' itemprop='keywords'>";
                        $el = array('TAGS' => $arResult['TAGS']);
                        $el['TAGS'] = explode(',', $el['TAGS']);
                        for ($i = 0; $i < ($size = sizeof ($el['TAGS']) ); $i++) {
                            if (trim ($el['TAGS'][$i]) == '') continue;
                            print "<li><a href=\"/search/index.php?q={$el['TAGS'][$i]}\" class=\"nowrap\">{$el['TAGS'][$i]}</a></li>";

                        }
                        echo "</ul>";
                    }?>
                </div>

                <?if ($arResult["REVIEWS_COUNT"] > 0) {?>
                    <div class="recenzion" id="prodBlock2">  
                        <?foreach ($arResult["REVIEWS"] as $reviewList) {?>
                            <span class="recenz_author_name"><?= $reviewList["NAME"] ?></span>
                            <div class="recenz_text">
                                <?= $reviewList["PREVIEW_TEXT"] ?>
                                <? if ($reviewList["PREVIEW_TEXT"] == "") {
                                        echo $reviewList["DETAIL_TEXT"];    
                                }?>
                                <noindex><a href="<?= $reviewList["PROPERTY_SOURCE_LINK_VALUE"] ?>" rel="nofollow"><?= $reviewList["PROPERTY_SOURCE_LINK_VALUE"] ?></a></noindex>
                            </div>

                        <?}?> 
                    </div>
                <?}?>
                <div class="review" id="prodBlock3">
                    <div class="ReviewsFormWrap">
                        <?$APPLICATION-> IncludeComponent("cackle.reviews", ".default", array( "CHANNEL_ID" => $arResult["ID"] ), false);?>
                    </div>
                </div>
                <div class="aboutAutor" id="prodBlock4">

                    <?foreach ($arResult["AUTHOR"] as $author) {
                        if (!empty ($author["PROPERTY_ORIG_NAME_VALUE"])) {
                            $authorFullName = $author["NAME"] . " / " . $author["PROPERTY_ORIG_NAME_VALUE"];
                        } else {
                            $authorFullName = $author["NAME"];      
                        }?>

                        <div class="author_info">
                            <span class="author_name"><?=$authorFullName?></span>

                            <?= !empty($author["IMAGE_FILE"]["SRC"]) ? "<img src='".$author["IMAGE_FILE"]["SRC"]."' align='left' style='padding-right:30px;' />" : ""?><?=$author["PREVIEW_TEXT"]?>

                        </div>
                        <br>

                    <?}?>
                </div>
            </div>    
        </div>
    </div>    
</div>


<? global $authBooksFilter;
if (!empty ($arResult["PROPERTIES"]["AUTHORS"]["VALUE"][0]) ) {
    $authBooksFilter = array('PROPERTY_AUTHORS' => $arResult["PROPERTIES"]["AUTHORS"]["VALUE"][0], "!ID" => $arResult["ID"]);

    $APPLICATION->IncludeComponent(
        "bitrix:catalog.section", 
        "this_author_books", 
        array(
            "IBLOCK_TYPE_ID" => "catalog",
            "IBLOCK_ID" => "4",
            "BASKET_URL" => "/personal/cart/",
            "COMPONENT_TEMPLATE" => "this_author_books",
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
            "FILTER_NAME" => "authBooksFilter",
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
            "SET_TITLE" => "Y",
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
    );
}?>

<? /* Получаем от RetailRocket рекомендации для товара */
global $recommFilter;
$recsArray = json_decode ($arResult["STRING_RECS"]);  

if ($recsArray[0] > 0) {
    $printid2 = array_slice ($recsArray, 1, 6);
    foreach ($printid2 as $recBook) {
        $recommFilter['ID'][] = $recBook;
    }
}
$printid = implode(", ", $printid2);?>
<script>
    function rrAsyncInit() {
        try {rrApi.view(<?= $arResult['ID']; ?>);} catch(e) {}
    }
</script>

<script type="text/javascript" src="//static.criteo.net/js/ld/ld.js" async="true"></script>
<script type="text/javascript">
    window.criteo_q = window.criteo_q || [];
    window.criteo_q.push(
        { event: "setAccount", account: 18519 },
        <?if ($USER -> IsAuthorized()) {?>  
            { event: "setEmail", email: "<?= $USER -> GetEmail() ?>" },
            <?}?>
        { event: "setSiteType", type: "d" },
        { event: "viewItem", item: "<?= $arResult['ID'] ?>" }
    );
</script>

<?if ($recommFilter['ID'][0] > 0) { // Если рекомендации есть, ничего не меняем и отправляем статистику в RR?>
    <script>
    function rrAsyncInit() {
        try {rrApi.recomTrack('UpSellItemToItems', <?= $arResult["ID"] ?>, [<?= $printid ?>]);} catch(e) {}
    }
    </script>
    <div class="weRecomWrap">
        <div class="centerWrapper">
            <p class="tile"><?= GetMessage("ALSO_RECOMMENDED_BOOKS") ?></p>
            <?$APPLICATION->IncludeComponent(
                "bitrix:catalog.section", 
                "all_recommended_books", 
                array(
                    "IBLOCK_TYPE_ID" => "catalog",
                    "IBLOCK_ID" => "4",
                    "BASKET_URL" => "/personal/cart/",
                    "COMPONENT_TEMPLATE" => "all_recommended_books",
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
                    "FILTER_NAME" => "recommFilter",
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
                    "SET_TITLE" => "Y",
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
                    "PAGER_SHOW_ALWAYS" => "Y",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "SET_STATUS_404" => "N",
                    "SHOW_404" => "N",
                    "MESSAGE_404" => "",
                    "BACKGROUND_IMAGE" => "-"
                ),
                false
            );

            unset($RecommFilter);?>
        </div>
    </div>
<?}?>

<div class="reviewsSliderWrapp">
    <div class="centerWrapper"> 
        <div class="giftWrap">
            <img src="/img/cifr.png"> 
            <form action="/" method="post">
                <input type="text" placeholder="Ваш e-mail" name="email" onkeypress="if (event.keyCode == 13) {return SubmitRequest(event);}">
                <input type="button" value="">
            </form>
            <div class="some_info">
                <?= GetMessage("SUBSCRIPTION_REQUEST_ACCEPTED" )?>
            </div>
            <p class="title">
                <?= GetMessage("GIFT_BOOK_TITLE") ?>                             
            </p>
            <p>
                <?= GetMessage("GIFT_BOOK_DESCRIPTION") ?>
            </p>
        </div>   

        <p class="sliderName youViewedTitle"><?= GetMessage("VIEWED_BOOKS_TITLE") ?></p>

        <? global $arFilter;
        $latestSeen = unserialize ($APPLICATION->get_cookie("LASTEST_SEEN") );
        if ($latestSeen) {        
            $arFilter = array('ID' => array());
            $latestSeen = array_slice (array_reverse (array_keys ($latestSeen) ), 0, 6);
            foreach ($latestSeen as $bookID) {
                $arFilter['ID'][] = intval($bookID);
            }

            $APPLICATION->IncludeComponent(
                "bitrix:catalog.section", 
                "viewed_books", 
                array(
                    "IBLOCK_TYPE_ID" => "catalog",
                    "IBLOCK_ID" => "4",
                    "BASKET_URL" => "/personal/cart/",
                    "COMPONENT_TEMPLATE" => "viewed_books",
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
                    "FILTER_NAME" => "arFilter",
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
                    "SET_TITLE" => "Y",
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
            );
        }?>
    </div>    
</div>

<script>
    $(document).ready(function() {
        <!-- //dataLayer GTM -->
        dataLayer.push({
            'stockInfo' : '<?= $StockInfo ?>',
            'productId' : '<?= $arResult["ID"] ?>',
            'productName' : '<?= $arResult["NAME"] ?>',
            'productPrice' : '<?= round (($arPrice["DISCOUNT_VALUE_VAT"]), 2) ?>',
            'videoPresence' : '<?= $videosCount > 0 ? 'WithVideo' : 'WithoutVideo'; ?>'
        });
        <!-- // dataLayer GTM -->		

        $(".elementMainPict .overlay").css("height", $(".element_item_img img").height());
        $(".elementMainPict .overlay p").css("margin-top", ($(".elementMainPict .overlay").height() / 2) - 10);
        if ($(".element_item_img img").height() < 394) {
            $(".element_item_img").height($(".element_item_img img").height());    
        }
        $("a#inline1").fancybox({
            'hideOnContentClick': true
        });
        $("a#inline2").fancybox({
            'hideOnContentClick': true
        });
        if ($(".grouped_elements").length > 0) {

            $("a.grouped_elements").fancybox({
                'transitionIn'    :    'elastic',
                'transitionOut'    :    'elastic',
                'speedIn'        :    600, 
                'speedOut'        :    200, 
                'overlayShow'    :    false
            });

        }
        $('.iframe').fancybox();
        $('a.fancybox').fancybox({
            'width'   :   1140,
            'height'   :   800
        });
        $(".leftColumn .signingPopup").fancybox({
            <?if ($arResult["SIGNING_IMAGE_INFO"]["WIDTH"]) {?>
                'width'   :   <?= $arResult["SIGNING_IMAGE_INFO"]["WIDTH"] ?>,
                'height'   :   <?= $arResult["SIGNING_IMAGE_INFO"]["HEIGHT"] ?>
            <?} else {?>
                'width'   :   1140,
                'height'   :   800
            <?}?>
        }); 

        if (window.innerWidth <= 1680) {
            $(".catalogIcon").hide();
            $(".basketIcon").hide();    
        }

        $(".buyLater").click(function(){
            $.post("/ajax/ajax_add2wishlist.php", {id: <?= $arResult["ID"] ?>}, function(data){
                $(".layout").show();
                $(".wishlist_info").css("top", window.pageYOffset+"px")
                $(".wishlist_info").show();
                $(".wishlist_info span").html(data);

            })    
        })
    })


</script>

