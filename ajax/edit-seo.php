<? define("NO_KEEP_STATISTIC", true);?>
<? define("NOT_CHECK_PERMISSIONS", true); ?>
<? define("NEED_AUTH", true); ?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?

//New element
$el = new CIBlockElement;
//Array of props

$arUpdateSeo = Array(
  "MODIFIED_BY"    => $USER->GetID(),
  "NAME" => $_REQUEST['name'],
  "CODE" => $_REQUEST['code'],
  "IBLOCK_ID"      => 2
);

//Updating element

if($el->Update($_REQUEST['id'],$arUpdateSeo)):
    echo 'ok';

else:
    echo $el->LAST_ERROR;
endif;

$ipropElementTemplates = new \Bitrix\Iblock\InheritedProperty\ElementTemplates(2,$_REQUEST['id']);

$templates = $ipropElementTemplates->findTemplates();

$newTemplates=array(
  'ELEMENT_META_TITLE'=> $_REQUEST['title'],
  'ELEMENT_META_DESCRIPTION' => $_REQUEST['description'],
  'ELEMENT_PREVIEW_PICTURE_FILE_ALT' => $_REQUEST['alt1'],
  'ELEMENT_DETAIL_PICTURE_FILE_ALT' => $_REQUEST['alt2']
);

$ipropElementTemplates->set($newTemplates);


$ipropElementValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(2,$_REQUEST['id']);
$ipropElementValues->clearValues();

?>
