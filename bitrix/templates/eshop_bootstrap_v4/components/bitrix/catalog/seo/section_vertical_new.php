<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

/**
 * @global CMain $APPLICATION
 * @var CBitrixComponent $component
 * @var array $arParams
 * @var array $arResult
 * @var array $arCurSection
 */
if ($_SESSION['sort_by']==''){
	$_SESSION['sort_by'] = 'popular';
}
if ($_REQUEST['sort_by']!=''){
	$_SESSION['sort_by'] = $_REQUEST['sort_by'];
}
if ($_SESSION['sort_by']=='popular'){
	$sortby = 'show_counter';
	$sortorder = 'desc';
} elseif ($_SESSION['sort_by']=='price'){
	$sortby = 'catalog_PRICE_1';
	$sortorder = 'asc';
} elseif ($_SESSION['sort_by']=='new'){
	$sortby = 'created';
	$sortorder = 'desc';
}

if ($_SESSION['show_by']==''){
	$_SESSION['show_by'] = 12;
}
if ($_REQUEST['show_by']!=''){
	$_SESSION['show_by'] = $_REQUEST['show_by'];
}

if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] == 'Y')
{
	$basketAction = isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? $arParams['COMMON_ADD_TO_BASKET_ACTION'] : '';
}
else
{
	$basketAction = isset($arParams['SECTION_ADD_TO_BASKET_ACTION']) ? $arParams['SECTION_ADD_TO_BASKET_ACTION'] : '';
}


if ($isSidebar)
{
	$contentBlockClass = ($isSidebarLeft ? "col-md-9 col-sm-8 order-1 order-sm-2" : "col-md-9 col-sm-8 order-1");
}
else
{
	$contentBlockClass = "col";
}
?>
<?
	$rsSections = CIBlockSection::GetList(array(),array('IBLOCK_ID' => $arParams ['IBLOCK_ID'], '=CODE' => $arResult['VARIABLES']['SECTION_CODE']));
	if ($arSection = $rsSections->Fetch())
	{
		$currentSec = $arSection['NAME'];
	}
?>
<div class="catalog-top">
            <div class="container">
                <h1 class="catalog-top__caption"><?=$currentSec?></h1>
                <div class="catalog-top__img">
										<?$img_path = CFile::GetPath($arSection['PICTURE']);?>
                    <div style="background-image: url(<?=$img_path?>)"></div>
                </div>
            </div>
</div>
<div class="breadcrumbs" id="navigation">
	<div class="container">
		<?$APPLICATION->IncludeComponent(
			"bitrix:breadcrumb",
			"lavender",
			array(
				"START_FROM" => "0",
				"PATH" => "",
				"SITE_ID" => "-"
			),
			false,
			Array('HIDE_ICONS' => 'Y')
		);?>
	</div>
</div>
<div class="container">
	<?
			$GLOBALS['currentSection'] = $arSection['ID'];
			$res = CIBlockSection::GetById($arSection['ID']);
			$ar_res = $res->GetNext();
			$parent_section = $ar_res['IBLOCK_SECTION_ID'];
			if ($parent_section==''){
				$parent_section = $arSection['ID'];
			}
	?>
	<?

			//region Catalog Section
			$sectionListParams = array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"SECTION_ID" => $parent_section,
				"SECTION_CODE" => "",
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => 0,
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
				"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
				"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
				"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
				"ADD_SECTIONS_CHAIN" => 'N'
			);
			if ($sectionListParams["COUNT_ELEMENTS"] === "Y")
			{
				$sectionListParams["COUNT_ELEMENTS_FILTER"] = "CNT_ACTIVE";
				if ($arParams["HIDE_NOT_AVAILABLE"] == "Y")
				{
					$sectionListParams["COUNT_ELEMENTS_FILTER"] = "CNT_AVAILABLE";
				}
			}
			$APPLICATION->IncludeComponent(
				"bitrix:catalog.section.list",
				"catalog",
				$sectionListParams,
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			<div style="display: none">
				<?
				//region Catalog Section
				$sectionListParams = array(
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"SECTION_ID" => $arResult['VARIABLES']['SECTION_ID'],
					"SECTION_CODE" => $arResult['VARIABLES']['SECTION_CODE'],
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
					"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
					"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
					"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
					"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
					"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
					"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
					"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
				);
				$APPLICATION->IncludeComponent(
					"bitrix:catalog.section.list",
					"catalog",
					$sectionListParams,
					$component,
					array("HIDE_ICONS" => "Y")
				);
				?>
			</div>
			<?
			unset($sectionListParams);
			//endregion
			?>
</div>
<section class="catalog">
  <div class="container">
		<input type="checkbox" id="filter-trigger" />
		<div class="catalog__filter">
				<?
				//region Filter
				if ($isFilter): ?>
						<?
						$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "lavender", array(
								"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
								"IBLOCK_ID" => $arParams["IBLOCK_ID"],
								"SECTION_ID" => $arCurSection['ID'],
								"FILTER_NAME" => $arParams["FILTER_NAME"],
								"PRICE_CODE" => $arParams["~PRICE_CODE"],
								"CACHE_TYPE" => $arParams["CACHE_TYPE"],
								"CACHE_TIME" => $arParams["CACHE_TIME"],
								"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
								"SAVE_IN_SESSION" => "N",
								"FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
								"XML_EXPORT" => "N",
								"SECTION_TITLE" => "NAME",
								"SECTION_DESCRIPTION" => "DESCRIPTION",
								'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
								"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
								'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
								'CURRENCY_ID' => $arParams['CURRENCY_ID'],
								"SEF_MODE" => $arParams["SEF_MODE"],
								"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
								"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
								"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
								"INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
							),
							$component,
							array('HIDE_ICONS' => 'Y')
						);
						?>
				<? endif
				//endregion
				?>
		</div>
		<div class="catalog__catalog">
			<div class="catalog__controls">
        <div class="catalog__sort"><span>Сортировать по:</span>
					<a href="?sort_by=popular" rel="nofollow" <?if ($sortby=='show_counter') echo 'class="active"';?>>Популярности</a>
					<a href="?sort_by=price" rel="nofollow" <?if ($sortby=='catalog_PRICE_1') echo 'class="active"';?>>Цене</a>
					<a href="?sort_by=new" rel="nofollow" <?if ($sortby=='created') echo 'class="active"';?>>Новизне</a></div>
        <div class="catalog__number"><span>Выводить по:</span>
					<a href="?show_by=12" rel="nofollow" <?if ($_SESSION['show_by']=='12') echo 'class="active"';?>>12</a>
					<a href="?show_by=18" rel="nofollow" <?if ($_SESSION['show_by']=='18') echo 'class="active"';?>>18</a>
					<a href="?show_by=24" rel="nofollow" <?if ($_SESSION['show_by']=='24') echo 'class="active"';?>>24</a>
				</div>
      </div>
			<?
			$intSectionID = $APPLICATION->IncludeComponent(
 					"bitrix:catalog.section",
 					"catalog-grid", array(
 						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
 						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
 						"ELEMENT_SORT_FIELD" => $sortby,
 						"ELEMENT_SORT_ORDER" => $sortorder,
 						"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
 						"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
 						"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"]) ? $arParams["LIST_PROPERTY_CODE"] : []),
 						"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
 						"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
 						"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
 						"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
 						"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
 						"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
 						"BASKET_URL" => $arParams["BASKET_URL"],
 						"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
 						"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
 						"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
 						"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
 						"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
 						"FILTER_NAME" => $arParams["FILTER_NAME"],
 						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
 						"CACHE_TIME" => $arParams["CACHE_TIME"],
 						"CACHE_FILTER" => $arParams["CACHE_FILTER"],
 						"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
 						"SET_TITLE" => $arParams["SET_TITLE"],
 						"MESSAGE_404" => $arParams["~MESSAGE_404"],
 						"SET_STATUS_404" => $arParams["SET_STATUS_404"],
 						"SHOW_404" => $arParams["SHOW_404"],
 						"FILE_404" => $arParams["FILE_404"],
 						"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
 						"PAGE_ELEMENT_COUNT" => $_SESSION['show_by'],
 						"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
 						"PRICE_CODE" => $arParams["~PRICE_CODE"],
 						"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
 						"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

 						"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
 						"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
 						"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
 						"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
 						"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),

 						"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
 						"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
 						"PAGER_TITLE" => $arParams["PAGER_TITLE"],
 						"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
 						"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
 						"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
 						"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
 						"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
 						"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
 						"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
 						"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
 						"LAZY_LOAD" => $arParams["LAZY_LOAD"],
 						"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
 						"LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],

 						"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
 						"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
 						"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"]) ? $arParams["LIST_OFFERS_PROPERTY_CODE"] : []),
 						"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
 						"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
 						"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
 						"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
 		     			"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"]) ? $arParams["LIST_OFFERS_LIMIT"] : 0),

 						"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
 						"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
 						"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
 						"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
 						"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
 						'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
 						'CURRENCY_ID' => $arParams['CURRENCY_ID'],
 						'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
 						'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

 						'LABEL_PROP' => $arParams['LABEL_PROP'],
 						'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
 						'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
 						'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
 						'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
 						'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
 						'PRODUCT_ROW_VARIANTS' => $arParams['LIST_PRODUCT_ROW_VARIANTS'],
 						'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
 						'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
 						'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
 						'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
 						'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

 						'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
 						'OFFER_TREE_PROPS' => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
 						'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
 						'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
 						'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
 						'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
 						'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
 						'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
 						'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
 						'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
 						'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
 						'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
 						'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
 						'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
 						'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
 						'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
 						'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

 						'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
 						'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
 						'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

 						'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
 						"ADD_SECTIONS_CHAIN" => "N",
 						'ADD_TO_BASKET_ACTION' => $basketAction,
 						'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
 						'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
 						'COMPARE_NAME' => $arParams['COMPARE_NAME'],
 						'USE_COMPARE_LIST' => 'Y',
 						'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
 						'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
 						'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
 					),
 					$component
 				);
				?>
		</div>
	</div>
</section>
<?
				$GLOBALS['CATALOG_CURRENT_SECTION_ID'] = $intSectionID;

		if (ModuleManager::isModuleInstalled("sale"))
		{
			if (!empty($arRecomData))
			{
				if (!isset($arParams['USE_BIG_DATA']) || $arParams['USE_BIG_DATA'] != 'N')
				{
					?>
							<? $APPLICATION->IncludeComponent("bitrix:catalog.section", "bootstrap_v4", array(
									"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
									"IBLOCK_ID" => $arParams["IBLOCK_ID"],
									"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
									"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
									"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
									"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
									"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"]) ? $arParams["LIST_PROPERTY_CODE"] : []),
									"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
									"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
									"BASKET_URL" => $arParams["BASKET_URL"],
									"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
									"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
									"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
									"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
									"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
									"CACHE_TYPE" => $arParams["CACHE_TYPE"],
									"CACHE_TIME" => $arParams["CACHE_TIME"],
									"CACHE_FILTER" => $arParams["CACHE_FILTER"],
									"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
									"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
									"PAGE_ELEMENT_COUNT" => 0,
									"PRICE_CODE" => $arParams["~PRICE_CODE"],
									"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
									"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

									"SET_BROWSER_TITLE" => "N",
									"SET_META_KEYWORDS" => "N",
									"SET_META_DESCRIPTION" => "N",
									"SET_LAST_MODIFIED" => "N",
									"ADD_SECTIONS_CHAIN" => "N",

									"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
									"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
									"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
									"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
									"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),

									"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
									"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
									"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"]) ? $arParams["LIST_OFFERS_PROPERTY_CODE"] : []),
									"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
									"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
									"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
									"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
									"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"]) ? $arParams["LIST_OFFERS_LIMIT"] : 0),

									"SECTION_ID" => $intSectionID,
									"SECTION_CODE" => "",
									"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
									"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
									"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
									'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
									'CURRENCY_ID' => $arParams['CURRENCY_ID'],
									'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
									'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

									'LABEL_PROP' => $arParams['LABEL_PROP'],
									'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
									'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
									'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
									'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
									'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
									'PRODUCT_ROW_VARIANTS' => "[{'VARIANT':'3','BIG_DATA':true}]",
									'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
									'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
									'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
									'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
									'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

									"DISPLAY_TOP_PAGER" => 'N',
									"DISPLAY_BOTTOM_PAGER" => 'N',
									"HIDE_SECTION_DESCRIPTION" => "Y",

									"RCM_TYPE" => isset($arParams['BIG_DATA_RCM_TYPE']) ? $arParams['BIG_DATA_RCM_TYPE'] : '',
									"SHOW_FROM_SECTION" => 'Y',

									'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
									'OFFER_TREE_PROPS' => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
									'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
									'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
									'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
									'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
									'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
									'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
									'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
									'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
									'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
									'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
									'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
									'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
									'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
									'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
									'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

									'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
									'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
									'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

									'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
									'ADD_TO_BASKET_ACTION' => $basketAction,
									'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
									'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
									'COMPARE_NAME' => $arParams['COMPARE_NAME'],
									'USE_COMPARE_LIST' => 'Y',
									'BACKGROUND_IMAGE' => '',
									'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
								),
								$component
							);
							?>

					<?
				}
			}
		}
		?>
