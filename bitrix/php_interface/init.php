<?

//\Bitrix\Main\Loader::includeModule('shestpa.lastmodified');

//include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/wsrubi.smtp/classes/general/wsrubismtp.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/basketplus/classes/basket.php");

AddEventHandler('main', 'OnAdminContextMenuShow', 'ElementDetailAdminContextMenuShow');

function ElementDetailAdminContextMenuShow(&$items){
 if ($_SERVER['REQUEST_METHOD']=='GET' && $GLOBALS['APPLICATION']->GetCurPage()=='/bitrix/admin/iblock_element_edit.php' && $_REQUEST['ID']>0)
    {
        CModule::IncludeModule('iblock');
        $rsElement = CIBlockElement::GetList(
            $arOrder  = array("ID" => "ASC"),
            $arFilter = array(
                "=IBLOCK_ID" => $_REQUEST['IBLOCK_ID'],
                "=ID" => $_REQUEST['ID'],
            ),
            false,
            false,
            $arSelectFields = array("ID", "NAME", "IBLOCK_ID", "CODE", "DETAIL_PAGE_URL")
        );
        if($arElement = $rsElement->GetNext(true, false)):
            $items[] = array(
                "TEXT"  => "Открыть страницу элемента",
                "LINK"  => $arElement['DETAIL_PAGE_URL'],
                'LINK_PARAM' => 'target=_blank',
                "TITLE" => "Открыть страницу элемента",
                "ICON"  => "adm-btn",
            );
        endif;
        }
}

/*
AddEventHandler("main", "OnAfterUserAdd", "OnAfterUserRegisterHandler");
function OnAfterUserRegisterHandler(&$arFields){
  $newBudget = 300;
  // если регистрация успешна то
  if($arFields["ID"]>0) {
    CModule::IncludeModule('sale');
    $arBudget = Array(
    "USER_ID" => $arFields['ID'],
    "CURRENCY" => "RUB",
    "CURRENT_BUDGET" => $newBudget);
    CSaleUserAccount::Add($arBudget);
  }
  return $arFields;
}
*/
 AddEventHandler("main", "OnEndBufferContent", "myfunction");

   function myfunction(&$content)
   {
global $USER, $APPLICATION;
if (($APPLICATION->GetCurDir() == '/bitrix/' || $APPLICATION->GetCurDir() == '/bitrix/admin/') &&  !$USER->IsAuthorized()) { LocalRedirect("/404.php"); }
  }
?>
