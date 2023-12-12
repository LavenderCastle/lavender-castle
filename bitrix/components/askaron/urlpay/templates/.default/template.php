<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
global $APPLICATION;

if($arResult["URLPAY_PAYMENT"]->IsSuccess())
{
	if ( $arResult["HIDE_TEMPLATE"] )
	{
		$APPLICATION->RestartBuffer();
	}

    echo $arResult["URLPAY_PAYMENT"]->GetMessage();

	if ( $arResult["HIDE_TEMPLATE"] )
	{
		die();
	}
}
else
{
    echo $arResult["URLPAY_PAYMENT"]->GetMessage();
}
?>