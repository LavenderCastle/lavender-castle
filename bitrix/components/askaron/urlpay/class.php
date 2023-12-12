<?
namespace Askaron\UrlPay;
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class CUrlPay extends \CBitrixComponent
{
	public function executeComponent()
	{
        \Bitrix\Main\Loader::includeModule('askaron.urlpay');
        $obPayment = new Payment();
        $this->arResult["URLPAY_PAYMENT"] = $obPayment->ProcUrlHash(); // \Askaron\UrlPay\Result();
		$this->arResult["HIDE_TEMPLATE"] = $obPayment->isHideTemplate(); // bool
	    $this->includeComponentTemplate();
	}
}
?>