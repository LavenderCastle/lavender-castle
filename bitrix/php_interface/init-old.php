<?

//\Bitrix\Main\Loader::includeModule('shestpa.lastmodified');

include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/wsrubi.smtp/classes/general/wsrubismtp.php");

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
?>
