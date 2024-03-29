<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><? $APPLICATION->ShowTitle(); ?></title>
    <? $APPLICATION->ShowHead(); ?>
	<style type="text/css">
		/* Client-specific Styles */

		#outlook a {padding:0;}
		body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
		.ExternalClass {width:100%;}
		.ExternalClass,
		.ExternalClass p,
		.ExternalClass span,
		.ExternalClass font,
		.ExternalClass td,
		.ExternalClass div {line-height: 100%;}
		#backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}

		/* End reset */
	</style>
	<?$APPLICATION->ShowProperty('FACEBOOK_META');?>
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
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<!-- End Google Tag Manager -->
<? if (\Bitrix\Main\Loader::includeModule('mail')) : ?>
<?=\Bitrix\Mail\Message::getQuoteStartMarker(true); ?>
<? endif; ?>
<?
$protocol = \Bitrix\Main\Config\Option::get("main", "mail_link_protocol", 'https', $arParams["SITE_ID"]);
$serverName = $protocol."://".$arParams["SERVER_NAME"];
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" bgcolor="#337e96" style="border-collapse: collapse;mso-table-lspace: 0pt;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;background-color: #337e96;border: none;height: 100%;width: 100%;">
	<tr>
		<td style="min-width: 15px;border-collapse: collapse;border-spacing: 0;padding: 0;"></td>
		<td align="left" valign="middle" style="border-collapse: collapse;border-spacing: 0;padding:0;background: url('<?=$serverName?>/bitrix/templates/mail_user/images/top-cloud.png') no-repeat center 36px;">
			<div style="padding: 41px 0 24px;max-width: 732px;margin: 0 auto;"><?
				$str24 = '<span style="color: #c2d1d6;">24</span>';
	
				$companyName = (
					IsModuleInstalled('bitrix24')
						? COption::getOptionString('bitrix24', 'site_title', '')
						: COption::getOptionString('main', 'site_name', '')
				);
	
				if (empty($companyName))
				{
					$companyName = $arParams["SITE_NAME"];
				}
	
				$companyName .= (
					IsModuleInstalled('bitrix24')
						? (COption::GetOptionString("bitrix24", "logo24show", "Y") == "Y" ? $str24 : '')
						: $str24
				);
	
				?><h1 style="color: #ffffff;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;font-size: 35px;font-weight: bold;margin: 0;padding: 0;"><?=$companyName?></h1>
			</div>
		</td>
		<td style="min-width: 15px;border-collapse: collapse;border-spacing: 0;padding: 0;"></td>
	</tr>
	<tr>
		<td style="min-width: 15px;border-collapse: collapse;border-spacing: 0;padding: 0;"></td>
		<td align="center" valign="top" style="border-collapse: collapse;border-spacing: 0;padding:0">
			<div style="overflow: hidden;background-color: #ffffff;border-radius: 7px;padding: 25px 20px 20px;max-width: 693px;">

			<!-- ***************** END HEADER  ********************-->


			<!-- ***************** CONTENT  ********************-->			<!-- CONTENT -->