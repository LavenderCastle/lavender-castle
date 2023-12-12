<? define("NO_KEEP_STATISTIC", true);?>
<? define("NOT_CHECK_PERMISSIONS", true); ?>
<? define("NEED_AUTH", true); ?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?

//Symbol code (transliteration)
$arParams = array("replace_space"=>"-","replace_other"=>"-");
$code = Cutil::translit($_REQUEST['name'],"ru",$arParams);
//New element
$el = new CIBlockElement;
//Properties
$arProp = Array();
$arProp['WIDTH'] = $_REQUEST['diametr'];
$arProp['HEIGHT'] = $_REQUEST['height'];
$arProp['CONTAIN'] = $_REQUEST['contains'];

if (in_array(11,$_REQUEST['cats'])){
  $arProp['FLOWERS'] = 18;
} else {
  $arProp['FLOWERS'] = 19;
}

if ($_REQUEST['oprice']!='' && $_REQUEST['opt']!='') {
  $arProp['OPT'] = 31;
}

$gallery = array_reverse($_REQUEST['images']);

$section_id[$i] = $_REQUEST['cats'];

//Array of props
$arAdd = Array(
  "MODIFIED_BY"    => $USER->GetID(),
  "NAME" => $_REQUEST['name'],
  "CODE" => $code,
  "DETAIL_TEXT" => $_REQUEST['descr'],
  "IBLOCK_ID"      => 2,
  "PROPERTY_VALUES"=> $arProp,
  "ACTIVE"         => "Y",
  "DETAIL_PICTURE" => CFile::MakeFileArray($gallery[1]),
  "PREVIEW_PICTURE" => CFile::MakeFileArray($gallery[0]),
  "IBLOCK_SECTION" => $section_id[$i]
  );
//Adding new element
if($item_id = $el->Add($arAdd)):

    //Adding photos to gallery
    $arGallery = array();
    foreach ($gallery as $photo){
      array_push($arGallery,array("VALUE" => CFile::MakeFileArray($photo),"DESCRIPTION"=>""));
    }

    CIBlockElement::SetPropertyValueCode($item_id, 'MORE_PHOTO', $arGallery);

    $arFields = array(
      "ID" => $item_id,
      "QUANTITY" => $_REQUEST['ammount']
    );

    if(CCatalogProduct::Add($arFields))
    {
        if ($_REQUEST['oprice']!='' && $_REQUEST['opt']!=''){

          $arFields = Array(
             "PRODUCT_ID" => $item_id,
             "PRICE" => $_REQUEST['price'],
             "CATALOG_GROUP_ID" => 1,
             "CURRENCY" => "RUB",
             "QUANTITY_FROM" => 0,
             "QUANTITY_TO" => ($_REQUEST['opt'] - 1)
          );
          CPrice::Add($arFields);

          $arFields = Array(
             "PRODUCT_ID" => $item_id,
             "PRICE" => $_REQUEST['oprice'],
             "CATALOG_GROUP_ID" => 1,
             "CURRENCY" => "RUB",
             "QUANTITY_FROM" => $_REQUEST['opt']
          );
          CPrice::Add($arFields);

        } else {

          $arFields = Array(
             "PRODUCT_ID" => $item_id,
             "PRICE" => $_REQUEST['price'],
             "CATALOG_GROUP_ID" => 1,
             "CURRENCY" => "RUB"
          );
          CPrice::Add($arFields);

        }
    }

    echo 'ok';
else:
    echo $el->LAST_ERROR;
endif;

array_map('unlink', array_filter((array) glob("../tmp/*")));

?>
