<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оплата заказа");
$APPLICATION->IncludeComponent(
	"askaron:urlpay",
	"",
	Array()
);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>