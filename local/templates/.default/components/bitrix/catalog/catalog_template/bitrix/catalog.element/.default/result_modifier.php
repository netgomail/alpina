<?
use Bitrix\Main\Type\Collection;
use Bitrix\Currency\CurrencyTable;
use Bitrix\Iblock;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
$displayPreviewTextMode = array(
    'H' => true,
    'E' => true,
    'S' => true
);
$detailPictMode = array(
    'IMG' => true,
    'POPUP' => true,
    'MAGNIFIER' => true,
    'GALLERY' => true
);

$arDefaultParams = array(
    'TEMPLATE_THEME' => 'blue',
    'ADD_PICT_PROP' => '-',
    'LABEL_PROP' => '-',
    'OFFER_ADD_PICT_PROP' => '-',
    'OFFER_TREE_PROPS' => array('-'),
    'DISPLAY_NAME' => 'Y',
    'DETAIL_PICTURE_MODE' => 'IMG',
    'ADD_DETAIL_TO_SLIDER' => 'N',
    'DISPLAY_PREVIEW_TEXT_MODE' => 'E',
    'PRODUCT_SUBSCRIPTION' => 'N',
    'SHOW_DISCOUNT_PERCENT' => 'N',
    'SHOW_OLD_PRICE' => 'N',
    'SHOW_MAX_QUANTITY' => 'N',
    'SHOW_BASIS_PRICE' => 'N',
    'ADD_TO_BASKET_ACTION' => array('BUY'),
    'SHOW_CLOSE_POPUP' => 'N',
    'MESS_BTN_BUY' => '',
    'MESS_BTN_ADD_TO_BASKET' => '',
    'MESS_BTN_SUBSCRIBE' => '',
    'MESS_BTN_COMPARE' => '',
    'MESS_NOT_AVAILABLE' => '',
    'USE_VOTE_RATING' => 'N',
    'VOTE_DISPLAY_AS_RATING' => 'rating',
    'USE_COMMENTS' => 'N',
    'BLOG_USE' => 'N',
    'BLOG_URL' => 'catalog_comments',
    'BLOG_EMAIL_NOTIFY' => 'N',
    'VK_USE' => 'N',
    'VK_API_ID' => '',
    'FB_USE' => 'N',
    'FB_APP_ID' => '',
    'BRAND_USE' => 'N',
    'BRAND_PROP_CODE' => ''
);
$arParams = array_merge($arDefaultParams, $arParams);

$arParams['TEMPLATE_THEME'] = (string)($arParams['TEMPLATE_THEME']);
if ('' != $arParams['TEMPLATE_THEME'])
{
    $arParams['TEMPLATE_THEME'] = preg_replace('/[^a-zA-Z0-9_\-\(\)\!]/', '', $arParams['TEMPLATE_THEME']);
    if ('site' == $arParams['TEMPLATE_THEME'])
    {
        $templateId = COption::GetOptionString("main", "wizard_template_id", "eshop_bootstrap", SITE_ID);
        $templateId = (preg_match("/^eshop_adapt/", $templateId)) ? "eshop_adapt" : $templateId;
        $arParams['TEMPLATE_THEME'] = COption::GetOptionString('main', 'wizard_'.$templateId.'_theme_id', 'blue', SITE_ID);
    }
    if ('' != $arParams['TEMPLATE_THEME'])
    {
        if (!is_file($_SERVER['DOCUMENT_ROOT'].$this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css'))
            $arParams['TEMPLATE_THEME'] = '';
    }
}
if ('' == $arParams['TEMPLATE_THEME'])
    $arParams['TEMPLATE_THEME'] = 'blue';

$arParams['ADD_PICT_PROP'] = trim($arParams['ADD_PICT_PROP']);
if ('-' == $arParams['ADD_PICT_PROP'])
    $arParams['ADD_PICT_PROP'] = '';
$arParams['LABEL_PROP'] = trim($arParams['LABEL_PROP']);
if ('-' == $arParams['LABEL_PROP'])
    $arParams['LABEL_PROP'] = '';
$arParams['OFFER_ADD_PICT_PROP'] = trim($arParams['OFFER_ADD_PICT_PROP']);
if ('-' == $arParams['OFFER_ADD_PICT_PROP'])
    $arParams['OFFER_ADD_PICT_PROP'] = '';
if (!is_array($arParams['OFFER_TREE_PROPS']))
    $arParams['OFFER_TREE_PROPS'] = array($arParams['OFFER_TREE_PROPS']);
foreach ($arParams['OFFER_TREE_PROPS'] as $key => $value)
{
    $value = (string)$value;
    if ('' == $value || '-' == $value)
        unset($arParams['OFFER_TREE_PROPS'][$key]);
}
if (empty($arParams['OFFER_TREE_PROPS']) && isset($arParams['OFFERS_CART_PROPERTIES']) && is_array($arParams['OFFERS_CART_PROPERTIES']))
{
    $arParams['OFFER_TREE_PROPS'] = $arParams['OFFERS_CART_PROPERTIES'];
    foreach ($arParams['OFFER_TREE_PROPS'] as $key => $value)
    {
        $value = (string)$value;
        if ('' == $value || '-' == $value)
            unset($arParams['OFFER_TREE_PROPS'][$key]);
    }
}
if ('N' != $arParams['DISPLAY_NAME'])
    $arParams['DISPLAY_NAME'] = 'Y';
if (!isset($detailPictMode[$arParams['DETAIL_PICTURE_MODE']]))
    $arParams['DETAIL_PICTURE_MODE'] = 'IMG';
if ('Y' != $arParams['ADD_DETAIL_TO_SLIDER'])
    $arParams['ADD_DETAIL_TO_SLIDER'] = 'N';
if (!isset($displayPreviewTextMode[$arParams['DISPLAY_PREVIEW_TEXT_MODE']]))
    $arParams['DISPLAY_PREVIEW_TEXT_MODE'] = 'E';
if ('Y' != $arParams['PRODUCT_SUBSCRIPTION'])
    $arParams['PRODUCT_SUBSCRIPTION'] = 'N';
if ('Y' != $arParams['SHOW_DISCOUNT_PERCENT'])
    $arParams['SHOW_DISCOUNT_PERCENT'] = 'N';
if ('Y' != $arParams['SHOW_OLD_PRICE'])
    $arParams['SHOW_OLD_PRICE'] = 'N';
if ('Y' != $arParams['SHOW_MAX_QUANTITY'])
    $arParams['SHOW_MAX_QUANTITY'] = 'N';
if ($arParams['SHOW_BASIS_PRICE'] != 'Y')
    $arParams['SHOW_BASIS_PRICE'] = 'N';
if (!is_array($arParams['ADD_TO_BASKET_ACTION']))
    $arParams['ADD_TO_BASKET_ACTION'] = array($arParams['ADD_TO_BASKET_ACTION']);
$arParams['ADD_TO_BASKET_ACTION'] = array_filter($arParams['ADD_TO_BASKET_ACTION'], 'CIBlockParameters::checkParamValues');
if (empty($arParams['ADD_TO_BASKET_ACTION']) || (!in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']) && !in_array('BUY', $arParams['ADD_TO_BASKET_ACTION'])))
    $arParams['ADD_TO_BASKET_ACTION'] = array('BUY');
if ($arParams['SHOW_CLOSE_POPUP'] != 'Y')
    $arParams['SHOW_CLOSE_POPUP'] = 'N';

$arParams['MESS_BTN_BUY'] = trim($arParams['MESS_BTN_BUY']);
$arParams['MESS_BTN_ADD_TO_BASKET'] = trim($arParams['MESS_BTN_ADD_TO_BASKET']);
$arParams['MESS_BTN_SUBSCRIBE'] = trim($arParams['MESS_BTN_SUBSCRIBE']);
$arParams['MESS_BTN_COMPARE'] = trim($arParams['MESS_BTN_COMPARE']);
$arParams['MESS_NOT_AVAILABLE'] = trim($arParams['MESS_NOT_AVAILABLE']);
if ('Y' != $arParams['USE_VOTE_RATING'])
    $arParams['USE_VOTE_RATING'] = 'N';
if ('vote_avg' != $arParams['VOTE_DISPLAY_AS_RATING'])
    $arParams['VOTE_DISPLAY_AS_RATING'] = 'rating';
if ('Y' != $arParams['USE_COMMENTS'])
    $arParams['USE_COMMENTS'] = 'N';
if ('Y' != $arParams['BLOG_USE'])
    $arParams['BLOG_USE'] = 'N';
if ('Y' != $arParams['VK_USE'])
    $arParams['VK_USE'] = 'N';
if ('Y' != $arParams['FB_USE'])
    $arParams['FB_USE'] = 'N';
if ('Y' == $arParams['USE_COMMENTS'])
{
    if ('N' == $arParams['BLOG_USE'] && 'N' == $arParams['VK_USE'] && 'N' == $arParams['FB_USE'])
        $arParams['USE_COMMENTS'] = 'N';
}
if ('Y' != $arParams['BRAND_USE'])
    $arParams['BRAND_USE'] = 'N';
if ($arParams['BRAND_PROP_CODE'] == '')
    $arParams['BRAND_PROP_CODE'] = array();
if (!is_array($arParams['BRAND_PROP_CODE']))
    $arParams['BRAND_PROP_CODE'] = array($arParams['BRAND_PROP_CODE']);

$arEmptyPreview = false;
$strEmptyPreview = $this->GetFolder().'/images/no_photo.png';
if (file_exists($_SERVER['DOCUMENT_ROOT'].$strEmptyPreview))
{
    $arSizes = getimagesize($_SERVER['DOCUMENT_ROOT'].$strEmptyPreview);
    if (!empty($arSizes))
    {
        $arEmptyPreview = array(
            'SRC' => $strEmptyPreview,
            'WIDTH' => (int)$arSizes[0],
            'HEIGHT' => (int)$arSizes[1]
        );
    }
    unset($arSizes);
}
unset($strEmptyPreview);

$arSKUPropList = array();
$arSKUPropIDs = array();
$arSKUPropKeys = array();
$boolSKU = false;
$strBaseCurrency = '';
$boolConvert = isset($arResult['CONVERT_CURRENCY']['CURRENCY_ID']);

if ($arResult['MODULES']['catalog'])
{
    if (!$boolConvert)
        $strBaseCurrency = CCurrency::GetBaseCurrency();

    $arSKU = CCatalogSKU::GetInfoByProductIBlock($arParams['IBLOCK_ID']);
    $boolSKU = !empty($arSKU) && is_array($arSKU);

    if ($boolSKU && !empty($arParams['OFFER_TREE_PROPS']))
    {
        $arSKUPropList = CIBlockPriceTools::getTreeProperties(
            $arSKU,
            $arParams['OFFER_TREE_PROPS'],
            array(
                'PICT' => $arEmptyPreview,
                'NAME' => '-'
            )
        );
        $arSKUPropIDs = array_keys($arSKUPropList);
    }
}

$arResult['CHECK_QUANTITY'] = false;
if (!isset($arResult['CATALOG_MEASURE_RATIO']))
    $arResult['CATALOG_MEASURE_RATIO'] = 1;
if (!isset($arResult['CATALOG_QUANTITY']))
    $arResult['CATALOG_QUANTITY'] = 0;
$arResult['CATALOG_QUANTITY'] = (
    0 < $arResult['CATALOG_QUANTITY'] && is_float($arResult['CATALOG_MEASURE_RATIO'])
    ? (float)$arResult['CATALOG_QUANTITY']
    : (int)$arResult['CATALOG_QUANTITY']
);
$arResult['CATALOG'] = false;
if (!isset($arResult['CATALOG_SUBSCRIPTION']) || 'Y' != $arResult['CATALOG_SUBSCRIPTION'])
    $arResult['CATALOG_SUBSCRIPTION'] = 'N';

CIBlockPriceTools::getLabel($arResult, $arParams['LABEL_PROP']);

$productSlider = CIBlockPriceTools::getSliderForItem($arResult, $arParams['ADD_PICT_PROP'], 'Y' == $arParams['ADD_DETAIL_TO_SLIDER']);
if (empty($productSlider))
{
    $productSlider = array(
        0 => $arEmptyPreview
    );
}
$productSliderCount = count($productSlider);
$arResult['SHOW_SLIDER'] = true;
$arResult['MORE_PHOTO'] = $productSlider;
$arResult['MORE_PHOTO_COUNT'] = count($productSlider);

if ($arResult['MODULES']['catalog'])
{
    $arResult['CATALOG'] = true;
    if (!isset($arResult['CATALOG_TYPE']))
        $arResult['CATALOG_TYPE'] = CCatalogProduct::TYPE_PRODUCT;
    if (
        (CCatalogProduct::TYPE_PRODUCT == $arResult['CATALOG_TYPE'] || CCatalogProduct::TYPE_SKU == $arResult['CATALOG_TYPE'])
        && !empty($arResult['OFFERS'])
    )
    {
        $arResult['CATALOG_TYPE'] = CCatalogProduct::TYPE_SKU;
    }
    switch ($arResult['CATALOG_TYPE'])
    {
        case CCatalogProduct::TYPE_SET:
            $arResult['OFFERS'] = array();
            $arResult['CHECK_QUANTITY'] = ('Y' == $arResult['CATALOG_QUANTITY_TRACE'] && 'N' == $arResult['CATALOG_CAN_BUY_ZERO']);
            break;
        case CCatalogProduct::TYPE_SKU:
            break;
        case CCatalogProduct::TYPE_PRODUCT:
        default:
            $arResult['CHECK_QUANTITY'] = ('Y' == $arResult['CATALOG_QUANTITY_TRACE'] && 'N' == $arResult['CATALOG_CAN_BUY_ZERO']);
            break;
    }
}
else
{
    $arResult['CATALOG_TYPE'] = 0;
    $arResult['OFFERS'] = array();
}

if ($arResult['CATALOG'] && isset($arResult['OFFERS']) && !empty($arResult['OFFERS']))
{
    $boolSKUDisplayProps = false;

    $arResultSKUPropIDs = array();
    $arFilterProp = array();
    $arNeedValues = array();
    foreach ($arResult['OFFERS'] as &$arOffer)
    {
        foreach ($arSKUPropIDs as &$strOneCode)
        {
            if (isset($arOffer['DISPLAY_PROPERTIES'][$strOneCode]))
            {
                $arResultSKUPropIDs[$strOneCode] = true;
                if (!isset($arNeedValues[$arSKUPropList[$strOneCode]['ID']]))
                    $arNeedValues[$arSKUPropList[$strOneCode]['ID']] = array();
                $valueId = (
                    $arSKUPropList[$strOneCode]['PROPERTY_TYPE'] == Iblock\PropertyTable::TYPE_LIST
                    ? $arOffer['DISPLAY_PROPERTIES'][$strOneCode]['VALUE_ENUM_ID']
                    : $arOffer['DISPLAY_PROPERTIES'][$strOneCode]['VALUE']
                );
                $arNeedValues[$arSKUPropList[$strOneCode]['ID']][$valueId] = $valueId;
                unset($valueId);
                if (!isset($arFilterProp[$strOneCode]))
                    $arFilterProp[$strOneCode] = $arSKUPropList[$strOneCode];
            }
        }
        unset($strOneCode);
    }
    unset($arOffer);

    CIBlockPriceTools::getTreePropertyValues($arSKUPropList, $arNeedValues);
    $arSKUPropIDs = array_keys($arSKUPropList);
    $arSKUPropKeys = array_fill_keys($arSKUPropIDs, false);


    $arMatrixFields = $arSKUPropKeys;
    $arMatrix = array();

    $arNewOffers = array();

    $arIDS = array($arResult['ID']);
    $arOfferSet = array();
    $arResult['OFFER_GROUP'] = false;
    $arResult['OFFERS_PROP'] = false;

    $arDouble = array();
    foreach ($arResult['OFFERS'] as $keyOffer => $arOffer)
    {
        $arOffer['ID'] = (int)$arOffer['ID'];
        if (isset($arDouble[$arOffer['ID']]))
            continue;
        $arIDS[] = $arOffer['ID'];
        $boolSKUDisplayProperties = false;
        $arOffer['OFFER_GROUP'] = false;
        $arRow = array();
        foreach ($arSKUPropIDs as $propkey => $strOneCode)
        {
            $arCell = array(
                'VALUE' => 0,
                'SORT' => PHP_INT_MAX,
                'NA' => true
            );
            if (isset($arOffer['DISPLAY_PROPERTIES'][$strOneCode]))
            {
                $arMatrixFields[$strOneCode] = true;
                $arCell['NA'] = false;
                if ('directory' == $arSKUPropList[$strOneCode]['USER_TYPE'])
                {
                    $intValue = $arSKUPropList[$strOneCode]['XML_MAP'][$arOffer['DISPLAY_PROPERTIES'][$strOneCode]['VALUE']];
                    $arCell['VALUE'] = $intValue;
                }
                elseif ('L' == $arSKUPropList[$strOneCode]['PROPERTY_TYPE'])
                {
                    $arCell['VALUE'] = (int)$arOffer['DISPLAY_PROPERTIES'][$strOneCode]['VALUE_ENUM_ID'];
                }
                elseif ('E' == $arSKUPropList[$strOneCode]['PROPERTY_TYPE'])
                {
                    $arCell['VALUE'] = (int)$arOffer['DISPLAY_PROPERTIES'][$strOneCode]['VALUE'];
                }
                $arCell['SORT'] = $arSKUPropList[$strOneCode]['VALUES'][$arCell['VALUE']]['SORT'];
            }
            $arRow[$strOneCode] = $arCell;
        }
        $arMatrix[$keyOffer] = $arRow;

        CIBlockPriceTools::setRatioMinPrice($arOffer, false);

        $arOffer['MORE_PHOTO'] = array();
        $arOffer['MORE_PHOTO_COUNT'] = 0;
        $offerSlider = CIBlockPriceTools::getSliderForItem($arOffer, $arParams['OFFER_ADD_PICT_PROP'], $arParams['ADD_DETAIL_TO_SLIDER'] == 'Y');
        if (empty($offerSlider))
        {
            $offerSlider = $productSlider;
        }
        $arOffer['MORE_PHOTO'] = $offerSlider;
        $arOffer['MORE_PHOTO_COUNT'] = count($offerSlider);

        if (CIBlockPriceTools::clearProperties($arOffer['DISPLAY_PROPERTIES'], $arParams['OFFER_TREE_PROPS']))
        {
            $boolSKUDisplayProps = true;
        }

        $arDouble[$arOffer['ID']] = true;
        $arNewOffers[$keyOffer] = $arOffer;
    }
    $arResult['OFFERS'] = $arNewOffers;
    $arResult['SHOW_OFFERS_PROPS'] = $boolSKUDisplayProps;

    $arUsedFields = array();
    $arSortFields = array();

    foreach ($arSKUPropIDs as $propkey => $strOneCode)
    {
        $boolExist = $arMatrixFields[$strOneCode];
        foreach ($arMatrix as $keyOffer => $arRow)
        {
            if ($boolExist)
            {
                if (!isset($arResult['OFFERS'][$keyOffer]['TREE']))
                    $arResult['OFFERS'][$keyOffer]['TREE'] = array();
                $arResult['OFFERS'][$keyOffer]['TREE']['PROP_'.$arSKUPropList[$strOneCode]['ID']] = $arMatrix[$keyOffer][$strOneCode]['VALUE'];
                $arResult['OFFERS'][$keyOffer]['SKU_SORT_'.$strOneCode] = $arMatrix[$keyOffer][$strOneCode]['SORT'];
                $arUsedFields[$strOneCode] = true;
                $arSortFields['SKU_SORT_'.$strOneCode] = SORT_NUMERIC;
            }
            else
            {
                unset($arMatrix[$keyOffer][$strOneCode]);
            }
        }
    }
    $arResult['OFFERS_PROP'] = $arUsedFields;
    $arResult['OFFERS_PROP_CODES'] = (!empty($arUsedFields) ? base64_encode(serialize(array_keys($arUsedFields))) : '');

    Collection::sortByColumn($arResult['OFFERS'], $arSortFields);

    $offerSet = array();
    if (!empty($arIDS) && CBXFeatures::IsFeatureEnabled('CatCompleteSet'))
    {
        $offerSet = array_fill_keys($arIDS, false);
        $rsSets = CCatalogProductSet::getList(
            array(),
            array(
                '@OWNER_ID' => $arIDS,
                '=SET_ID' => 0,
                '=TYPE' => CCatalogProductSet::TYPE_GROUP
            ),
            false,
            false,
            array('ID', 'OWNER_ID')
        );
        while ($arSet = $rsSets->Fetch())
        {
            $arSet['OWNER_ID'] = (int)$arSet['OWNER_ID'];
            $offerSet[$arSet['OWNER_ID']] = true;
            $arResult['OFFER_GROUP'] = true;
        }
        if ($offerSet[$arResult['ID']])
        {
            foreach ($offerSet as &$setOfferValue)
            {
                if ($setOfferValue === false)
                {
                    $setOfferValue = true;
                }
            }
            unset($setOfferValue);
            unset($offerSet[$arResult['ID']]);
        }
        if ($arResult['OFFER_GROUP'])
        {
            $offerSet = array_filter($offerSet);
            $arResult['OFFER_GROUP_VALUES'] = array_keys($offerSet);
        }
    }

    $arMatrix = array();
    $intSelected = -1;
    $arResult['MIN_PRICE'] = false;
    $arResult['MIN_BASIS_PRICE'] = false;
    foreach ($arResult['OFFERS'] as $keyOffer => $arOffer)
    {
        if (empty($arResult['MIN_PRICE']) && $arOffer['CAN_BUY'])
        {
            $intSelected = $keyOffer;
            $arResult['MIN_PRICE'] = (isset($arOffer['RATIO_PRICE']) ? $arOffer['RATIO_PRICE'] : $arOffer['MIN_PRICE']);
            $arResult['MIN_BASIS_PRICE'] = $arOffer['MIN_PRICE'];
        }
        $arSKUProps = false;
        if (!empty($arOffer['DISPLAY_PROPERTIES']))
        {
            $boolSKUDisplayProps = true;
            $arSKUProps = array();
            foreach ($arOffer['DISPLAY_PROPERTIES'] as &$arOneProp)
            {
                if ('F' == $arOneProp['PROPERTY_TYPE'])
                    continue;
                $arSKUProps[] = array(
                    'NAME' => $arOneProp['NAME'],
                    'VALUE' => $arOneProp['DISPLAY_VALUE']
                );
            }
            unset($arOneProp);
        }
        if (isset($arOfferSet[$arOffer['ID']]))
        {
            $arOffer['OFFER_GROUP'] = true;
            $arResult['OFFERS'][$keyOffer]['OFFER_GROUP'] = true;
        }
        reset($arOffer['MORE_PHOTO']);
        $firstPhoto = current($arOffer['MORE_PHOTO']);
        $arOneRow = array(
            'ID' => $arOffer['ID'],
            'NAME' => $arOffer['~NAME'],
            'TREE' => $arOffer['TREE'],
            'PRICE' => (isset($arOffer['RATIO_PRICE']) ? $arOffer['RATIO_PRICE'] : $arOffer['MIN_PRICE']),
            'BASIS_PRICE' => $arOffer['MIN_PRICE'],
            'DISPLAY_PROPERTIES' => $arSKUProps,
            'PREVIEW_PICTURE' => $firstPhoto,
            'DETAIL_PICTURE' => $firstPhoto,
            'CHECK_QUANTITY' => $arOffer['CHECK_QUANTITY'],
            'MAX_QUANTITY' => $arOffer['CATALOG_QUANTITY'],
            'STEP_QUANTITY' => $arOffer['CATALOG_MEASURE_RATIO'],
            'QUANTITY_FLOAT' => is_double($arOffer['CATALOG_MEASURE_RATIO']),
            'MEASURE' => $arOffer['~CATALOG_MEASURE_NAME'],
            'OFFER_GROUP' => (isset($offerSet[$arOffer['ID']]) && $offerSet[$arOffer['ID']]),
            'CAN_BUY' => $arOffer['CAN_BUY'],
            'SLIDER' => $arOffer['MORE_PHOTO'],
            'SLIDER_COUNT' => $arOffer['MORE_PHOTO_COUNT'],
        );
        $arMatrix[$keyOffer] = $arOneRow;
    }
    if (-1 == $intSelected)
        $intSelected = 0;
    $arResult['JS_OFFERS'] = $arMatrix;
    $arResult['OFFERS_SELECTED'] = $intSelected;

    $arResult['OFFERS_IBLOCK'] = $arSKU['IBLOCK_ID'];
}

if ($arResult['MODULES']['catalog'] && $arResult['CATALOG'])
{
    if ($arResult['CATALOG_TYPE'] == CCatalogProduct::TYPE_PRODUCT || $arResult['CATALOG_TYPE'] == CCatalogProduct::TYPE_SET)
    {
        CIBlockPriceTools::setRatioMinPrice($arResult, false);
        $arResult['MIN_BASIS_PRICE'] = $arResult['MIN_PRICE'];
    }
    if (CBXFeatures::IsFeatureEnabled('CatCompleteSet') && $arResult['CATALOG_TYPE'] == CCatalogProduct::TYPE_PRODUCT)
    {
        $rsSets = CCatalogProductSet::getList(
            array(),
            array(
                '@OWNER_ID' => $arResult['ID'],
                '=SET_ID' => 0,
                '=TYPE' => CCatalogProductSet::TYPE_GROUP
            ),
            false,
            false,
            array('ID', 'OWNER_ID')
        );
        if ($arSet = $rsSets->Fetch())
        {
            $arResult['OFFER_GROUP'] = true;
        }
    }
}

if (!empty($arResult['DISPLAY_PROPERTIES']))
{
    foreach ($arResult['DISPLAY_PROPERTIES'] as $propKey => $arDispProp)
    {
        if ('F' == $arDispProp['PROPERTY_TYPE'])
            unset($arResult['DISPLAY_PROPERTIES'][$propKey]);
    }
}

$arResult['SKU_PROPS'] = $arSKUPropList;
$arResult['DEFAULT_PICTURE'] = $arEmptyPreview;

$arResult['CURRENCIES'] = array();
if ($arResult['MODULES']['currency'])
{
    if ($boolConvert)
    {
        $currencyFormat = CCurrencyLang::GetFormatDescription($arResult['CONVERT_CURRENCY']['CURRENCY_ID']);
        $arResult['CURRENCIES'] = array(
            array(
                'CURRENCY' => $arResult['CONVERT_CURRENCY']['CURRENCY_ID'],
                'FORMAT' => array(
                    'FORMAT_STRING' => $currencyFormat['FORMAT_STRING'],
                    'DEC_POINT' => $currencyFormat['DEC_POINT'],
                    'THOUSANDS_SEP' => $currencyFormat['THOUSANDS_SEP'],
                    'DECIMALS' => $currencyFormat['DECIMALS'],
                    'THOUSANDS_VARIANT' => $currencyFormat['THOUSANDS_VARIANT'],
                    'HIDE_ZERO' => $currencyFormat['HIDE_ZERO']
                )
            )
        );
        unset($currencyFormat);
    }
    else
    {
        $currencyIterator = CurrencyTable::getList(array(
            'select' => array('CURRENCY')
        ));
        while ($currency = $currencyIterator->fetch())
        {
            $currencyFormat = CCurrencyLang::GetFormatDescription($currency['CURRENCY']);
            $arResult['CURRENCIES'][] = array(
                'CURRENCY' => $currency['CURRENCY'],
                'FORMAT' => array(
                    'FORMAT_STRING' => $currencyFormat['FORMAT_STRING'],
                    'DEC_POINT' => $currencyFormat['DEC_POINT'],
                    'THOUSANDS_SEP' => $currencyFormat['THOUSANDS_SEP'],
                    'DECIMALS' => $currencyFormat['DECIMALS'],
                    'THOUSANDS_VARIANT' => $currencyFormat['THOUSANDS_VARIANT'],
                    'HIDE_ZERO' => $currencyFormat['HIDE_ZERO']
                )
            );
        }
        unset($currencyFormat, $currency, $currencyIterator);
    }
}   
    // LATEST SEEN ###############
    $latestSeen = unserialize($APPLICATION->get_cookie("LASTEST_SEEN"));   
    $latestSeen  = (!$latestSeen ? array() : $latestSeen);
    // Remove 
    unset($latestSeen[$arResult['ID']]);
    $latestSeen[$arResult['ID']] = time();
    /*if (count($latestSeen) > 6) { 
         array_shift($latestSeen);
    }*/
    $APPLICATION->set_cookie("LASTEST_SEEN", serialize($latestSeen));
    
    // SET TITLE
    $arResult["AUTHOR_NAME"] = '';
    
    if (!is_array($arResult['DISPLAY_PROPERTIES']['AUTHORS']['DISPLAY_VALUE'])
        && !empty($arResult['DISPLAY_PROPERTIES']['AUTHORS']['DISPLAY_VALUE'])) {
            $arResult['DISPLAY_PROPERTIES']['AUTHORS']['DISPLAY_VALUE'] = array($arResult['DISPLAY_PROPERTIES']['AUTHORS']['DISPLAY_VALUE']);
    }
    foreach ($arResult['DISPLAY_PROPERTIES']['AUTHORS']['DISPLAY_VALUE'] as $AUTHOR_KEY => $author) {
        if (!empty ($arResult['DISPLAY_PROPERTIES']['AUTHORS']['VALUE'][$AUTHOR_KEY]) ) {
            $aElProperties = CIBlockElement::GetByID($arResult['DISPLAY_PROPERTIES']['AUTHORS']['VALUE'][$AUTHOR_KEY])->GetNext();
            $aElProperties['LAST_NAME'] = CIBlockElement::GetProperty(AUTHORS_IBLOCK_ID,  $arResult['DISPLAY_PROPERTIES']['AUTHORS']['VALUE'][$AUTHOR_KEY],  array(),  array('CODE' => 'LAST_NAME'))->Fetch();
            $aElProperties['FIRST_NAME'] = CIBlockElement::GetProperty(AUTHORS_IBLOCK_ID,  $arResult['DISPLAY_PROPERTIES']['AUTHORS']['VALUE'][$AUTHOR_KEY],  array(),  array('CODE' => 'FIRST_NAME'))->Fetch();
            $aElProperties['SHOWINAUTHORS'] = CIBlockElement::GetProperty(AUTHORS_IBLOCK_ID,  $arResult['DISPLAY_PROPERTIES']['AUTHORS']['VALUE'][$AUTHOR_KEY],  array(),  array('CODE' => 'SHOWINAUTHORS'))->Fetch();
            $aElProperties['ORIG_NAME'] = CIBlockElement::GetProperty(AUTHORS_IBLOCK_ID,  $arResult['DISPLAY_PROPERTIES']['AUTHORS']['VALUE'][$AUTHOR_KEY],  array(),  array('CODE' => 'ORIG_NAME'))->Fetch();

            if (strlen ($aElProperties['FIRST_NAME']['VALUE']) > 0) {
                $arResult["AUTHOR_NAME"] .= (strlen ($arResult["AUTHOR_NAME"]) > 0 ? ', ' : '') . $aElProperties['FIRST_NAME']['VALUE'];
            }
            if (strlen ($aElProperties['LAST_NAME']['VALUE']) > 0) {
                $arResult["AUTHOR_NAME"] .= (strlen ($arResult["AUTHOR_NAME"]) > 0 ? ' ' : '') . $aElProperties['LAST_NAME']['VALUE'];
            }
            if (strlen ($aElProperties['ORIG_NAME']['VALUE']) > 0) {
                $arResult["AUTHOR_NAME"] .= " / " . (strlen ($arResult["AUTHOR_NAME"]) > 0 ? ' ' : '') . $aElProperties['ORIG_NAME']['VALUE'];
            }
        }
    }      
    
    if (strlen ($arResult['PROPERTIES']["ISBN"]["VALUE"]) ) {
        $title = 'Книга «' . $arResult["NAME"] . '» ' . $arResult["AUTHOR_NAME"] . ' / ISBN ' . $arResult['PROPERTIES']["ISBN"]["VALUE"] . ' купить в интернет-магазине с доставкой';
    } else if ($MEDIA_TYPE) {
        $title = $arResult["NAME"] . ' ' . $arResult["AUTHOR_NAME"] . ' / ISBN ' . $arResult['PROPERTIES']["ISBN"]["VALUE"] . ' купить в интернет-магазине с доставкой';
    } else {
        $title = $arResult["NAME"] . ' ' . $arResult["AUTHOR_NAME"] . GetMessage("TO_BUY_WITH_DELIVERY");    
    }
    if (!empty ($title) )  {
        $APPLICATION -> SetTitle($title);
    }
    
    $APPLICATION->SetPageProperty("description", $arResult["PREVIEW_TEXT"]); 
    
    $img = GetIBlockElement($arResult["PROPERTIES"]["additional_image"]["VALUE"]);
    $arResult["additional_image"]['DETAIL_PICTURE'] = CFile::ResizeImageGet($img['DETAIL_PICTURE'], 
        Array("width"=>80, "height"=>80), 
        BX_RESIZE_IMAGE_PROPORTIONAL, 
        false, 
        false, 
        false, 
        false                     
    );
    
    $arProps = CIBlockElement::GetProperty($arResult['IBLOCK_ID'], $arResult['ID'], array('sort' => 'asc'), array("CODE" => "pdf_newlist"));
    $arResult["PHOTO_COUNT"] = $arProps->SelectedRowsCount();
    while($ob = $arProps->GetNext()) {
        $arImagePath = CFile::GetPath($ob['VALUE']);
        if(!$arResult["MAIN_PICTURE"]){
            $arResult["MAIN_PICTURE"] = $arImagePath;
        }
    }
    $signingProps = CIBlockElement::GetProperty($arResult['IBLOCK_ID'], $arResult['ID'], array('sort' => 'asc'), array("CODE" => "SIGNING"));
    $signFotoCount = $signingProps->SelectedRowsCount();
    while($ob = $signingProps->GetNext()) {
        $signImagePath = CFile::GetPath($ob['VALUE']);
        if(!$arResult["SIGN_PICTURE"]) {
            $arResult["SIGN_PICTURE"] = $signImagePath;
        }
        $arResult["SIGNING_IMAGE_INFO"] = CFile::GetByID($ob["VALUE"]) -> Fetch();
    }
    
    if ($arResult["PROPERTIES"]["SERIES"]["VALUE"]) {
        
        $arResult["CURR_SERIES"] = CIBlockElement::GetByID($arResult["PROPERTIES"]["SERIES"]["VALUE"]) -> Fetch();
        
    }
    
    foreach ($arResult["PROPERTIES"]["SPONSORS"]["VALUE"] as $val) {
        $authorList = CIBlockElement::GetList (
            array(), 
            array(
                "IBLOCK_ID" => SPONSORS_IBLOCK_ID, 
                "ID" => $val
            ), 
            false, 
            false, 
            array(
                '*',
                'PROPERTY_LOGO_VOLUME_COVER',
                'PROPERTY_LOGO_FLAT_COVER',
                'PROPERTY_LOGO_FLAT_BIG_COVER',
                'PROPERTY_SPONSOR_WEBSITE'
            )
        );
        while ($authorFetchedList = $authorList -> Fetch()) { 
            if($authorFetchedList["PROPERTY_LOGO_VOLUME_COVER_VALUE"]) {
                $arResult["IMAGE"] = $authorFetchedList["PROPERTY_LOGO_VOLUME_COVER_VALUE"];
            } elseif($authorFetchedList["PROPERTY_LOGO_FLAT_COVER_VALUE"]) {
                $arResult["IMAGE"] = $authorFetchedList["PROPERTY_LOGO_FLAT_COVER_VALUE"]; 
            } elseif($authorFetchedList["PROPERTY_LOGO_FLAT_BIG_COVER_VALUE"]) {
                $arResult["IMAGE"] = $authorFetchedList["PROPERTY_LOGO_FLAT_BIG_COVER_VALUE"];
            };
            
            $arResult["SPONSOR_PREVIEW_TEXT"] = $authorFetchedList["PREVIEW_TEXT"];
            $arResult["SPONSOR_WEBSITE_VALUE"] = $authorFetchedList["PROPERTY_SPONSOR_WEBSITE_VALUE"];
            $arResult["SPONSOR_NAME"] = $authorFetchedList["NAME"];
        }
        
        $arResult["SPONSOR_PICT"] = CFile::GetPath($arResult["IMAGE"]);
    }
    
    CModule::IncludeModule("sale");
    //$BuyerList = CUser::GetByID($USER->GetID()); 
    $dbBasketItems = CSaleBasket::GetList(
        array(
            "NAME" => "ASC",
            "ID" => "ASC"
        ),
        array(
            "FUSER_ID" => CSaleBasket::GetBasketUserID(),
            "LID" => SITE_ID,
            "ORDER_ID" => "NULL"
        ),
        false,
        false,
        array("ID","PRICE","NAME","QUANTITY","DISCOUNT_PRICE","ORDER_PAYED")
    );
    while ($arItems = $dbBasketItems->Fetch()) {
        if (strlen($arItems["CALLBACK_FUNC"]) > 0) {
            CSaleBasket::UpdatePrice($arItems["ID"], 
                $arItems["CALLBACK_FUNC"], 
                $arItems["MODULE"], 
                $arItems["PRODUCT_ID"], 
                $arItems["QUANTITY"]);
            $arBasketItems = CSaleBasket::GetByID($arItems["ID"]);
        }
        if($arBasketItems["QUANTITY"] > 1) {
            $arBasketItems["PRICE"]*=$arBasketItems["QUANTITY"];
        } 
        $arResult["BASKET_ITEMS"]["sum_pruce"] += $arBasketItems["PRICE"];

    } 
    
    $rr = CCatalogDiscountSave::GetRangeByDiscount($arOrder = array(), $arFilter = array(), $arGroupBy = false, $arNavStartParams = false, $arSelectFields = array());
    $ar_sale = array();
    while($ar_sale=$rr->Fetch()) {
        $arResult["SALE_NOTE"][] = $ar_sale;
    }
    $arResult["SAVINGS_DISCOUNT"] =  CCatalogDiscountSave::GetDiscount(array('USER_ID' => $USER->GetID()), true);
    
    if($USER->IsAuthorized()){
        $rsCurUser = CUser::GetByID($USER->GetID());
        $arCurUser = $rsCurUser->Fetch();
        $arResult["MAIL"] = $arCurUser["EMAIL"];
    }
    
    $arResult["AUTHORS"] = "";
    foreach ($arResult["PROPERTIES"]["AUTHORS"]["VALUE"] as $val) {
        $authorList = CIBlockElement::GetList (array(), array("IBLOCK_ID" => 29, "ID" => $val), false, false, array("ID", "NAME"));
        while ($authorFetchedList = $authorList -> Fetch()) {
            $arResult["AUTHORS"] .= $authorFetchedList["NAME"].", ";

        }

    }
    
    $res = CIBlockElement::GetList(Array(), Array("ACTIVE"=>"Y","ID"=>$arResult['ID']), false, false, Array("TAGS"));
    if ($el = $res->Fetch()) {
        $arResult['TAGS'] = $el["TAGS"];
    }
    
    $arResult["PICTURE"] = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]["ID"], array('width'=>264, 'height'=>394), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $arResult["CURRENT_USER"] = CUser::GetByID($USER -> GetID()) -> Fetch();
    
    $userName = $arResult["CURRENT_USER"]["NAME"]." ".$arResult["CURRENT_USER"]["LAST_NAME"];
    $arResult["WISHLIST_ITEM"] = CIBlockElement::GetList(
        array(), 
        array(
            "IBLOCK_ID" => WISHLIST_IBLOCK_ID, 
            "NAME" => $userName, 
            "PROPERTY_PRODUCTS" => $arResult["ID"]
        ), 
        false, 
        false, 
        array(
            "ID", 
            "PROPERTY_PRODUCTS"
        )
    ) -> Fetch();
    
    $arResult["ITEM_IN_BASKET"] = CSaleBasket::GetList(
        array(), 
        array(
            "FUSER_ID" => CSaleBasket::GetBasketUserID(), 
            "LID" => SITE_ID, 
            "ORDER_ID" => "NULL", 
            "PRODUCT_ID" => $arResult["ID"]
        ), 
        false, 
        false, 
        array(
            "ID", 
            "CALLBACK_FUNC", 
            "MODULE", 
            "PRODUCT_ID", 
            "QUANTITY", 
            "PRODUCT_PROVIDER_CLASS"
        )
    )->Fetch(); 
    
    $review = CIBlockElement::GetList (
        array(), 
        array(
            "IBLOCK_ID" => REVIEWS_IBLOCK_ID, 
            "PROPERTY_BOOK" => $arResult["ID"]
        ), 
        false, 
        false, 
        array(  
            "ID", 
            "PROPERTY_AUTHOR", 
            "NAME", 
            "PROPERTY_BOOK", 
            "PREVIEW_TEXT", 
            "DETAIL_TEXT", 
            "PROPERTY_SOURCE_LINK"
        )
    );
    $arResult["REVIEWS_COUNT"] = $review -> SelectedRowsCount();
    while ($reviewList = $review -> Fetch()) {
        $arResult["REVIEWS"][] = $reviewList;    
    }
    
    foreach ($arResult["PROPERTIES"]["AUTHORS"]["VALUE"] as $val) {
        if ($val) {
            $authorsArray[] = $val;
        }
    }
    $currAuthor = CIBlockElement::GetList (
        array(
            "ID" => "DESC"
        ), 
        array(
            "IBLOCK_ID" => AUTHORS_IBLOCK_ID, 
            "ID" => $authorsArray
        ), 
        false, 
        false, 
        array(
            "ID", 
            "NAME", 
            "PREVIEW_TEXT", 
            "DETAIL_PICTURE", 
            "PROPERTY_ORIG_NAME"
        )
    );
    while ($author = $currAuthor -> Fetch()) {
        $arResult["AUTHOR"][] = $author;    
    }
    
    foreach ($arResult["AUTHOR"] as $key => $author) {
        $arResult["AUTHOR"][$key]["IMAGE_FILE"] = CFile::GetFileArray($author["DETAIL_PICTURE"]);
    }
    $arResult["STRING_RECS"] = file_get_contents('http://api.retailrocket.ru/api/1.0/Recomendation/UpSellItemToItems/50b90f71b994b319dc5fd855/'.$arResult["ID"]);
?>