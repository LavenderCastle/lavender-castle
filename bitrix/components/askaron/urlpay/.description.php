<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

$arComponentDescription = array(
	'NAME' => Loc::getMessage('URLPAY_NAME'),
	'DESCRIPTION' => Loc::getMessage('URLPAY_DESCRIPTION'),
//	"ICON" => "/images/viewed_products.gif",
	'PATH' => array(
		'ID' => Loc::getMessage('URLPAY_PATH_ID'),
	),
);
?>
