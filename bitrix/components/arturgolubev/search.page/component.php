<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(false);

use \Arturgolubev\Smartsearch\Unitools as UTools;

$ag_module = 'arturgolubev.smartsearch';

if(!CModule::IncludeModule("search"))
{
	ShowError(GetMessage("SEARCH_MODULE_UNAVAILABLE"));
	return;
}

if(!CModule::IncludeModule($ag_module))
{
	global $USER; if($USER->IsAdmin()){
		echo '<div style="color:red;">'.GetMessage("ARTURGOLUBEV_SMARTSEARCH_MODULE_UNAVAILABLE").'</div>';
	}
	return;
}

CPageOption::SetOptionString("main", "nav_page_in_session", "N");

if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 3600;

// activation rating
CRatingsComponentsMain::GetShowRating($arParams);

$arParams["SHOW_WHEN"] = $arParams["SHOW_WHEN"]=="Y";
$arParams["SHOW_WHERE"] = $arParams["SHOW_WHERE"]!="N";
if(!is_array($arParams["arrWHERE"]))
	$arParams["arrWHERE"] = array();

if($arParams["DISPLAY_TOP_PAGER"] == 'Y' || $arParams["DISPLAY_BOTTOM_PAGER"] == 'Y')
	$arResult["NEED_PAGER"] = 'Y';

$arParams["PAGE_RESULT_COUNT"] = intval($arParams["PAGE_RESULT_COUNT"]);
if($arParams["PAGE_RESULT_COUNT"]<=0)
	$arParams["PAGE_RESULT_COUNT"] = 50;

$arParams["MAX_SEARCH_COUNT"] = COption::GetOptionString("search", "max_result_size");

if($arResult["NEED_PAGER"] == 'Y')
{
	$arParams["PAGE_RESULT_COUNT_REAL"] = $arParams["PAGE_RESULT_COUNT"];
	
	if($arParams["MAX_SEARCH_COUNT"])
		$arParams["PAGE_RESULT_COUNT"] = $arParams["MAX_SEARCH_COUNT"];
}

$arParams["PAGER_TITLE"] = trim($arParams["PAGER_TITLE"]);
if(strlen($arParams["PAGER_TITLE"]) <= 0)
	$arParams["PAGER_TITLE"] = GetMessage("SEARCH_RESULTS");
$arParams["PAGER_SHOW_ALWAYS"] = $arParams["PAGER_SHOW_ALWAYS"]!="N";
// $arParams["USE_TITLE_RANK"] = $arParams["USE_TITLE_RANK"]=="Y";
$arParams["PAGER_TEMPLATE"] = trim($arParams["PAGER_TEMPLATE"]);

if($arParams["DEFAULT_SORT"] !== "date")
	$arParams["DEFAULT_SORT"] = "rank";

if(strlen($arParams["FILTER_NAME"])<=0 || !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["FILTER_NAME"]))
	$arFILTERCustom = array();
else
{
	$arFILTERCustom = $GLOBALS[$arParams["FILTER_NAME"]];
	if(!is_array($arFILTERCustom))
		$arFILTERCustom = array();
}

$exFILTER = CSearchParameters::ConvertParamsToFilter($arParams, "arrFILTER");

$arParams["CHECK_DATES"]=$arParams["CHECK_DATES"]=="Y";


$arResult["MODULE_SETTING"] = array();
$arResult["MODULE_SETTING"]["ALWAYS_EXTEND_SEARCH"] = (UTools::getSetting("use_with_standart") == 'Y' || UTools::getSetting("use_with_standart_page") == 'Y');
$arResult["MODULE_SETTING"]["EXTENDED_MODE"] = (UTools::getSetting("mode_spage") != 'standart');

$arResult["DEBUG"] = array();
$arResult["DEBUG"]["TYPE"] = "base";
$arResult["DEBUG"]["SMARTMODE"] = UTools::getSetting("mode_spage");
$arResult["DEBUG"]["TOP_COUNT"] = $arParams["PAGE_RESULT_COUNT"]; 

$arResult["VISUAL_PARAMS"] = array();
$arResult["VISUAL_PARAMS"]["THEME_CLASS"] = 'theme-'.UTools::getSetting('color_theme', 'blue');
$arResult["VISUAL_PARAMS"]["THEME_COLOR"] = UTools::getSetting('my_color_theme');
$arResult["VISUAL_PARAMS"]["PLACEHOLDER"] = UTools::getSetting('input_search_placeholder');
$arResult["VISUAL_PARAMS"]["CLARIFY_SECTION"] = (UTools::getSetting('clarify_section') == "Y");


global $USER; if($USER->IsAdmin()){
	$arResult["DEBUG"]["SHOW"] = UTools::getSetting('debug');
}

//options
if(isset($_REQUEST["tags"]))
	$tags = trim($_REQUEST["tags"]);
else
	$tags = false;

if(isset($_REQUEST["q"]))
	$q = trim($_REQUEST["q"]);
else
	$q = false;

if(
	$arParams["SHOW_WHEN"]
	&& isset($_REQUEST["from"])
	&& is_string($_REQUEST["from"])
	&& strlen($_REQUEST["from"])
	&& CheckDateTime($_REQUEST["from"])
)
	$from = $_REQUEST["from"];
else
	$from = "";

if(
	$arParams["SHOW_WHEN"]
	&& isset($_REQUEST["to"])
	&& is_string($_REQUEST["to"])
	&& strlen($_REQUEST["to"])
	&& CheckDateTime($_REQUEST["to"])
)
	$to = $_REQUEST["to"];
else
	$to = "";

$where = $arParams["SHOW_WHERE"]? trim($_REQUEST["where"]): "";

$how = trim($_REQUEST["how"]);
if($how == "d")
	$how = "d";
elseif($how == "r")
	$how = "";
elseif($arParams["DEFAULT_SORT"] == "date")
	$how = "d";
else
	$how = "";

if($how=="d")
	$aSort=array("DATE_CHANGE"=>"DESC", "CUSTOM_RANK"=>"DESC", "TITLE_RANK"=>"ASC");
else
	$aSort=array("CUSTOM_RANK"=>"DESC", "TITLE_RANK"=>"ASC");
		
/* if(!$arParams["USE_TITLE_RANK"])
{
	if($how=="d")
		$aSort=array("DATE_CHANGE"=>"DESC", "CUSTOM_RANK"=>"DESC", "RANK"=>"DESC");
	else
		$aSort=array("CUSTOM_RANK"=>"DESC", "RANK"=>"DESC");
} */
/*************************************************************************
			Operations with cache
*************************************************************************/
$arrDropdown = array();

$obCache = new CPHPCache;

if($arParams["CACHE_TYPE"] == "N" || ($arParams["CACHE_TYPE"] == "A" && UTools::getSetting("component_cache_on", "Y") == "N"))
{
	$arParams["CACHE_TIME"] = 0;
}

// echo '<pre>'; print_r($arResult); echo '</pre>';

if($obCache->StartDataCache($arParams["CACHE_TIME"], $this->GetCacheID(), "/".SITE_ID.$this->GetRelativePath()))
{
	// Getting of the Information block types
	$arIBlockTypes = array();
	if(CModule::IncludeModule("iblock"))
	{
		$rsIBlockType = CIBlockType::GetList(array("sort"=>"asc"), array("ACTIVE"=>"Y"));
		while($arIBlockType = $rsIBlockType->Fetch())
		{
			if($ar = CIBlockType::GetByIDLang($arIBlockType["ID"], LANGUAGE_ID))
				$arIBlockTypes[$arIBlockType["ID"]] = $ar["~NAME"];
		}
	}

	// Creating of an array for drop-down list
	foreach($arParams["arrWHERE"] as $code)
	{
		list($module_id, $part_id) = explode("_", $code, 2);
		if(strlen($module_id)>0)
		{
			if(strlen($part_id)<=0)
			{
				switch($module_id)
				{
					case "forum":
						$arrDropdown[$code] = GetMessage("SEARCH_FORUM");
						break;
					case "blog":
						$arrDropdown[$code] = GetMessage("SEARCH_BLOG");
						break;
					case "socialnetwork":
						$arrDropdown[$code] = GetMessage("SEARCH_SOCIALNETWORK");
						break;
					case "intranet":
						$arrDropdown[$code] = GetMessage("SEARCH_INTRANET");
						break;
					case "crm":
						$arrDropdown[$code] = GetMessage("SEARCH_CRM");
						break;
					case "disk":
						$arrDropdown[$code] = GetMessage("SEARCH_DISK");
						break;
				}
			}
			else
			{
				// if there is additional information specified besides ID then
				switch($module_id)
				{
					case "iblock":
						if(isset($arIBlockTypes[$part_id]))
							$arrDropdown[$code] = $arIBlockTypes[$part_id];
						break;
				}
			}
		}
	}
	$obCache->EndDataCache($arrDropdown);
}
else
{
	$arrDropdown = $obCache->GetVars();
}

$arResult["DROPDOWN"] = htmlspecialcharsex($arrDropdown);
$arResult["REQUEST"]["HOW"] = htmlspecialcharsbx($how);
$arResult["REQUEST"]["~FROM"] = $from;
$arResult["REQUEST"]["FROM"] = htmlspecialcharsbx($from);
$arResult["REQUEST"]["~TO"] = $to;
$arResult["REQUEST"]["TO"] = htmlspecialcharsbx($to);

if($q != '')
{
	$arResult["REQUEST"]["~QUERY"] = $q;
	$arResult["REQUEST"]["QUERY"] = htmlspecialcharsex($q);
	
	$q = CArturgolubevSmartsearch::checkReplaceRules($q);
	$q = CArturgolubevSmartsearch::prepareQuery($q);
	$q = CArturgolubevSmartsearch::clearExceptionsWords($q);
}
else
{
	$arResult["REQUEST"]["~QUERY"] = false;
	$arResult["REQUEST"]["QUERY"] = false;
}

if($tags!==false)
{
	$arResult["REQUEST"]["~TAGS_ARRAY"] = array();
	$arTags = explode(",", $tags);
	foreach($arTags as $tag)
	{
		$tag = trim($tag);
		if(strlen($tag) > 0)
			$arResult["REQUEST"]["~TAGS_ARRAY"][$tag] = $tag;
	}
	$arResult["REQUEST"]["TAGS_ARRAY"] = htmlspecialcharsex($arResult["REQUEST"]["~TAGS_ARRAY"]);
	$arResult["REQUEST"]["~TAGS"] = implode(",", $arResult["REQUEST"]["~TAGS_ARRAY"]);
	$arResult["REQUEST"]["TAGS"] = htmlspecialcharsex($arResult["REQUEST"]["~TAGS"]);
}
else
{
	$arResult["REQUEST"]["~TAGS_ARRAY"] = array();
	$arResult["REQUEST"]["TAGS_ARRAY"] = array();
	$arResult["REQUEST"]["~TAGS"] = false;
	$arResult["REQUEST"]["TAGS"] = false;
}
$arResult["REQUEST"]["WHERE"] = htmlspecialcharsbx($where);

$arResult["URL"] = $APPLICATION->GetCurPage()
	."?q=".urlencode($q)
	.(isset($_REQUEST["spell"])? "&amp;spell=1": "")
	."&amp;where=".urlencode($where)
	.($tags!==false? "&amp;tags=".urlencode($tags): "")
;

$arParams["RESTART"] = "N";
$arParams["NO_WORD_LOGIC"] = "N";

$templatePage = "";
$arReturn = false;
if($this->InitComponentTemplate($templatePage))
{
	$template = &$this->GetTemplate();
	$arResult["FOLDER_PATH"] = $folderPath = $template->GetFolder();
	
	if(strlen($folderPath) > 0)
	{
		$cntElements = 0;
		$arResult["SEARCH"] = array();
		$arReturn = array();
		
		$obSearch = new CSearchExt();
		$obSearch->SetOptions(array(
			"ERROR_ON_EMPTY_STEM" => $arParams["RESTART"] != "Y",
			"NO_WORD_LOGIC" => $arParams["NO_WORD_LOGIC"] == "Y",
		));
		
		$arFilter = array(
			"SITE_ID" => SITE_ID,
			"QUERY" => $tmp,
			"TAGS" => $arResult["REQUEST"]["~TAGS"],
		);
		
		$arFilter = array_merge($arFILTERCustom, $arFilter);
		if(strlen($where)>0)
		{
			list($module_id, $part_id) = explode("_",$where,2);
			$arFilter["MODULE_ID"] = $module_id;
			if(strlen($part_id)>0) $arFilter["PARAM1"] = $part_id;
		}
		if($arParams["CHECK_DATES"])
			$arFilter["CHECK_DATES"]="Y";
		if($from)
			$arFilter[">=DATE_CHANGE"] = $from;
		if($to)
			$arFilter["<=DATE_CHANGE"] = $to;
		
		
		// base-1
		if($q)
			$arFilter["QUERY"] = $q;
		else
			$arFilter["QUERY"] = false;
		
		$start = microtime(true);
		
		if((COption::GetOptionString("search", 'use_stemming') == 'Y' || UTools::getSetting("mode_spage") == 'standart') || !$arFilter["QUERY"])
		{
			$obSearch->Search($arFilter, $aSort, $exFILTER);
			$arResult["ERROR_CODE"] = $obSearch->errorno;
			$arResult["ERROR_TEXT"] = $obSearch->error;
			$arResult["DEBUG"]["Q"][] = $arFilter["QUERY"];
			if($obSearch->errorno==0)
			{
				$obSearch->NavStart($arParams["PAGE_RESULT_COUNT"], false);
				$ar = $obSearch->GetNext();
				
				while($ar)
				{
					$arReturn[$ar["ID"]] = $ar["ITEM_ID"];
					$cntElements++;
					
					$ar["CHAIN_PATH"] = $APPLICATION->GetNavChain($ar["URL"], 0, $folderPath."/chain_template.php", true, false);
					$ar["URL"] = htmlspecialcharsbx($ar["URL"]);
					$ar["TAGS"] = array();
					if (!empty($ar["~TAGS_FORMATED"]))
					{
						foreach ($ar["~TAGS_FORMATED"] as $name => $tag)
						{
							if($arParams["TAGS_INHERIT"] == "Y")
							{
								$arTags = $arResult["REQUEST"]["~TAGS_ARRAY"];
								$arTags[$tag] = $tag;
								$tags = implode("," , $arTags);
							}
							else
							{
								$tags = $tag;
							}
							$ar["TAGS"][] = array(
								"URL" => $APPLICATION->GetCurPageParam("tags=".urlencode($tags), array("tags")),
								"TAG_NAME" => htmlspecialcharsex($name),
							);
						}
					}
					$arResult["SEARCH"][]=$ar;
					$ar = $obSearch->GetNext();
				}

				// $navComponentObject = null;
				// $arResult["NAV_STRING"] = $obSearch->GetPageNavStringEx($navComponentObject,  $arParams["PAGER_TITLE"], $arParams["PAGER_TEMPLATE"], $arParams["PAGER_SHOW_ALWAYS"]);
				// $arResult["NAV_CACHED_DATA"] = $navComponentObject->GetTemplateCachedData();
				// $arResult["NAV_RESULT"] = $obSearch;
				
				// echo '<pre>'; print_r($obSearch); echo '</pre>';
			}
		}
		// end base-1
		
		// base-2
		if($q && UTools::getSetting("mode_spage") != 'standart' && $arParams["MAX_SEARCH_COUNT"] > $cntElements)
		{
			$arFilter["QUERY"] = '"'.str_replace(' ', '" "', $q).'"';
			if(!empty($arReturn)) $arFilter["!ITEM_ID"] = array_values($arReturn);
			$obSearch->Search($arFilter, $aSort, $exFILTER);

			$arResult["ERROR_CODE"] = $obSearch->errorno;
			$arResult["ERROR_TEXT"] = $obSearch->error;
			
			$arResult["DEBUG"]["Q"][] = $arFilter["QUERY"];
			if($obSearch->errorno==0)
			{
				$obSearch->NavStart($arParams["PAGE_RESULT_COUNT"], false);
				$ar = $obSearch->GetNext();
				
				while($ar)
				{
					if($arParams["MAX_SEARCH_COUNT"] <= $cntElements) break;
					
					$arReturn[$ar["ID"]] = $ar["ITEM_ID"];
					$cntElements++;
					
					$ar["CHAIN_PATH"] = $APPLICATION->GetNavChain($ar["URL"], 0, $folderPath."/chain_template.php", true, false);
					$ar["URL"] = htmlspecialcharsbx($ar["URL"]);
					$ar["TAGS"] = array();
					if (!empty($ar["~TAGS_FORMATED"]))
					{
						foreach ($ar["~TAGS_FORMATED"] as $name => $tag)
						{
							if($arParams["TAGS_INHERIT"] == "Y")
							{
								$arTags = $arResult["REQUEST"]["~TAGS_ARRAY"];
								$arTags[$tag] = $tag;
								$tags = implode("," , $arTags);
							}
							else
							{
								$tags = $tag;
							}
							$ar["TAGS"][] = array(
								"URL" => $APPLICATION->GetCurPageParam("tags=".urlencode($tags), array("tags")),
								"TAG_NAME" => htmlspecialcharsex($name),
							);
						}
					}
					$arResult["SEARCH"][]=$ar;
					$ar = $obSearch->GetNext();
				}

				// $navComponentObject = null;
				// $arResult["NAV_STRING"] = $obSearch->GetPageNavStringEx($navComponentObject,  $arParams["PAGER_TITLE"], $arParams["PAGER_TEMPLATE"], $arParams["PAGER_SHOW_ALWAYS"]);
				// $arResult["NAV_CACHED_DATA"] = $navComponentObject->GetTemplateCachedData();
				// $arResult["NAV_RESULT"] = $obSearch;
			}
		}
		// end base-2
		
		if(empty($arReturn) && $arParams["USE_LANGUAGE_GUESS"] == "Y" && !isset($_REQUEST["spell"]) && $arParams["MAX_SEARCH_COUNT"] > $cntElements)
		{
			// keylang-1
			$arLang = CSearchLanguage::GuessLanguage($arResult["REQUEST"]["~QUERY"]);
			if(is_array($arLang) && $arLang["from"] != $arLang["to"])
			{
				$arResult["REQUEST"]["~ORIGINAL_QUERY"] = $arResult["REQUEST"]["~QUERY"];
				$arResult["REQUEST"]["ORIGINAL_QUERY"] = htmlspecialcharsex($arResult["REQUEST"]["~QUERY"]);

				$arResult["REQUEST"]["~QUERY"] = CSearchLanguage::ConvertKeyboardLayout($arResult["REQUEST"]["~ORIGINAL_QUERY"], $arLang["from"], $arLang["to"]);
				$arResult["REQUEST"]["QUERY"] = htmlspecialcharsex($arResult["REQUEST"]["~QUERY"]);
				
				if($arResult["REQUEST"]["~QUERY"] != $arResult["REQUEST"]["~ORIGINAL_QUERY"])
				{
					$arFilter["QUERY"] = $arResult["REQUEST"]["~QUERY"];
					if(!empty($arReturn)) $arFilter["!ITEM_ID"] = array_values($arReturn);
							
					$obSearchSuggest = new CSearchExt();
					$obSearchSuggest->SetOptions(array(
						"ERROR_ON_EMPTY_STEM" => $arParams["RESTART"] != "Y",
						"NO_WORD_LOGIC" => $arParams["NO_WORD_LOGIC"] == "Y",
					));
					$obSearchSuggest->Search($arFilter, $aSort, $exFILTER);
					$arResult["DEBUG"]["Q"][] = $arFilter["QUERY"];
					
					if($obSearchSuggest->errorno==0)
					{
						$obSearchSuggest->NavStart($arParams["PAGE_RESULT_COUNT"], false);
						$ar = $obSearchSuggest->GetNext();

						while($ar)
						{
							if($arParams["MAX_SEARCH_COUNT"] <= $cntElements) break;
					
							$arReturn[$ar["ID"]] = $ar["ITEM_ID"];
							$cntElements++;
							
							$ar["CHAIN_PATH"] = $APPLICATION->GetNavChain($ar["URL"], 0, $folderPath."/chain_template.php", true, false);
							$ar["URL"] = htmlspecialcharsbx($ar["URL"]);
							$ar["TAGS"] = array();
							if (!empty($ar["~TAGS_FORMATED"]))
							{
								foreach ($ar["~TAGS_FORMATED"] as $name => $tag)
								{
									if($arParams["TAGS_INHERIT"] == "Y")
									{
										$arTags = $arResult["REQUEST"]["~TAGS_ARRAY"];
										$arTags[$tag] = $tag;
										$tags = implode("," , $arTags);
									}
									else
									{
										$tags = $tag;
									}
									$ar["TAGS"][] = array(
										"URL" => $APPLICATION->GetCurPageParam("tags=".urlencode($tags), array("tags")),
										"TAG_NAME" => htmlspecialcharsex($name),
									);
								}
							}
							$arResult["SEARCH"][]=$ar;
							$ar = $obSearchSuggest->GetNext();
						}

						// $navComponentObject = null;
						// $arResult["NAV_STRING"] = $obSearchSuggest->GetPageNavStringEx($navComponentObject,  $arParams["PAGER_TITLE"], $arParams["PAGER_TEMPLATE"], $arParams["PAGER_SHOW_ALWAYS"]);
						// $arResult["NAV_CACHED_DATA"] = $navComponentObject->GetTemplateCachedData();
						// $arResult["NAV_RESULT"] = $obSearchSuggest;
					}
				}
			
				if(count($arResult["SEARCH"]) <= 0)
				{
					$arResult["REQUEST"]["~QUERY"] = $q;
					$arResult["REQUEST"]["QUERY"] = htmlspecialcharsex($q);
					
					unset($arResult["REQUEST"]["~ORIGINAL_QUERY"]);
					unset($arResult["REQUEST"]["ORIGINAL_QUERY"]);
				}
			}
			// end keylang-1
		}
		
		// $arResult["MODULE_SETTING"]["ALWAYS_EXTEND_SEARCH"] = 1; // TODO
		
		if ($q && (empty($arReturn) || $arResult["MODULE_SETTING"]["ALWAYS_EXTEND_SEARCH"]))
		{
			$arResult["DEBUG"]["TYPE"] = "smart";
			
			$arSmartParams = array();
			$arSmartParams["SETTINGS"]["WORDS"] = CArturgolubevSmartsearch::prepareQueryWords($q);
			
			if(!empty($arSmartParams["SETTINGS"]["WORDS"]))
			{
				$arLavelsWords = CArturgolubevSmartsearch::getSimilarWordsList($arSmartParams["SETTINGS"]["WORDS"], 'full');
				
				$arResult["DEBUG"]["RESULT_WORDS"] = $arLavelsWords;
				
				if(!empty($arLavelsWords))
				{
					// echo '<pre>'; print_r($arLavelsWords); echo '</pre>';

					foreach($arLavelsWords as $level=>$searchArray)
					{
						$searchIterations = array(); $cnt = 0; $ind = 0;
						// $ql = ($level > 1) ? 1 : 10;
						$ql = 1;
						foreach($searchArray as $k=>$v){
							$exp = explode(' ', $v);
							
							if(($cnt+count($exp)) > $ql){
								$cnt = 0; $ind++;
							}
							
							$cnt = $cnt + count($exp);
							$searchIterations[$ind][] = $v;
						}
						
						// echo '<pre>'; print_r($searchIterations); echo '</pre>';
						
						foreach($searchIterations as $searchIteration){
							$arFilter["QUERY"] = '';
							foreach($searchIteration as $k=>$v){
								if($arFilter["QUERY"]) $arFilter["QUERY"] .= '|';
								// $arFilter["QUERY"] .= '('.$v.')';
								$arFilter["QUERY"] .= $v;
							}
							
							// echo '<pre>'; print_r($arFilter["QUERY"]); echo '</pre>';
							if(!empty($arReturn)) $arFilter["!ITEM_ID"] = array_values($arReturn);
							
							$obSearch->Search($arFilter, $aSort, $exFILTER);
							$arResult["DEBUG"]["Q"][] = $arFilter["QUERY"];

							if($obSearch->errorno==0)
							{
								$obSearch->NavStart($arParams["PAGE_RESULT_COUNT"], false);
								$ar = $obSearch->GetNext();

								while($ar)
								{
									if($arParams["MAX_SEARCH_COUNT"] <= $cntElements) break;
							
									$arReturn[$ar["ID"]] = $ar["ITEM_ID"];
									$cntElements++;
									
									$ar["CHAIN_PATH"] = $APPLICATION->GetNavChain($ar["URL"], 0, $folderPath."/chain_template.php", true, false);
									$ar["URL"] = htmlspecialcharsbx($ar["URL"]);
									$ar["TAGS"] = array();
									if (!empty($ar["~TAGS_FORMATED"]))
									{
										foreach ($ar["~TAGS_FORMATED"] as $name => $tag)
										{
											if($arParams["TAGS_INHERIT"] == "Y")
											{
												$arTags = $arResult["REQUEST"]["~TAGS_ARRAY"];
												$arTags[$tag] = $tag;
												$tags = implode("," , $arTags);
											}
											else
											{
												$tags = $tag;
											}
											$ar["TAGS"][] = array(
												"URL" => $APPLICATION->GetCurPageParam("tags=".urlencode($tags), array("tags")),
												"TAG_NAME" => htmlspecialcharsex($name),
											);
										}
									}
									$arResult["SEARCH"][]=$ar;
									$ar = $obSearch->GetNext();
								}

								// $navComponentObject = null;
								// $arResult["NAV_STRING"] = $obSearch->GetPageNavStringEx($navComponentObject,  $arParams["PAGER_TITLE"], $arParams["PAGER_TEMPLATE"], $arParams["PAGER_SHOW_ALWAYS"]);
								// $arResult["NAV_CACHED_DATA"] = $navComponentObject->GetTemplateCachedData();
								// $arResult["NAV_RESULT"] = $obSearch;
							}
						}

						if (!empty($arReturn)) {
							break;
						}
					}
				}
			}
		}
		
		$arResult["DEBUG"]["COUNT"] = $cntElements;
		
		$finish = microtime(true);
		$arResult["DEBUG"]["TIMES"]["FULL"] = $finish - $start;
		
		if(isset($arResult["REQUEST"]["~ORIGINAL_QUERY"]))
		{
			$arResult["ORIGINAL_QUERY_URL"] = $APPLICATION->GetCurPage()
				."?q=".urlencode($arResult["REQUEST"]["~ORIGINAL_QUERY"])
				."&amp;spell=1"
				."&amp;where=".urlencode($arResult["REQUEST"]["WHERE"])
				.($arResult["REQUEST"]["HOW"]=="d"? "&amp;how=d": "")
				.($arResult["REQUEST"]["FROM"]? '&amp;from='.urlencode($arResult["REQUEST"]["~FROM"]): "")
				.($arResult["REQUEST"]["TO"]? '&amp;to='.urlencode($arResult["REQUEST"]["~TO"]): "")
				.($tags!==false? "&amp;tags=".urlencode($tags): "")
			;
		}
		
		/* get dop information */
		if(CModule::IncludeModule("iblock") && $arResult["VISUAL_PARAMS"]["CLARIFY_SECTION"] && count($arReturn) > 1){
			$arResult["CLARIFY_SECTION"] = array();
			
			$alreadyFindedSections = array();
			$res = CIBlockElement::GetList(Array(), Array("ID"=>array_values($arReturn)), array("IBLOCK_SECTION_ID"), false, Array("ID", "IBLOCK_SECTION_ID"));
			while($arFields = $res->Fetch())
			{
				$alreadyFindedSections[$arFields["IBLOCK_SECTION_ID"]] = $arFields["CNT"];
			}
			
			if(count($alreadyFindedSections)>0){
				$db_list = CIBlockSection::GetList(Array($by=>$order), array("ID" => array_keys($alreadyFindedSections)), false, array("ID", "NAME"));
				while($ar_result = $db_list->GetNext())
				{
					$ar_result["CNT"] = $alreadyFindedSections[$ar_result["ID"]];
					$arResult["CLARIFY_SECTION"][] = $ar_result;
				}
			}
			
			$arResult["SELECTED_SECTION"] = IntVal($_REQUEST["section"]);
			
			if($arResult["SELECTED_SECTION"]){
				$newFindedIds = array();
				$res = CIBlockElement::GetList(Array(), Array("ID"=>array_values($arReturn), "IBLOCK_SECTION_ID"=>$arResult["SELECTED_SECTION"]), false, false, Array("ID"));
				while($arFields = $res->Fetch())
				{
					$newFindedIds[] = $arFields["ID"];
				}
				
				if(count($newFindedIds)>0){
					$arReturn = $newFindedIds;
				}
				unset($newFindedIds);
			}
		}
		
		/* end get dop information */

		/* get dop information */
		if(count($arReturn)>0)
		{
			$arResult["INFORMATION"] = CArturgolubevSmartsearch::getRealElementsName($arReturn);
			
			if(!empty($arResult["INFORMATION"])){
				foreach($arResult["SEARCH"] as $key => $searchinfo)
				{
					$newTitle = $arResult["INFORMATION"][$searchinfo["ITEM_ID"]]["NAME"];
					if($newTitle)
					{
						$arResult["SEARCH"][$key]["TITLE_S"] = $arResult["SEARCH"][$key]["TITLE"];
						$arResult["SEARCH"][$key]["TITLE_SF"] = $arResult["SEARCH"][$key]["TITLE_FORMATED"];
						
						$arResult["SEARCH"][$key]["TITLE"] = $newTitle;
						$arResult["SEARCH"][$key]["TITLE_FORMATED"] = CArturgolubevSmartsearch::formatElementName($arResult["SEARCH"][$key]["TITLE_FORMATED"], $newTitle);
					}
				}
			}
			
			unset($arResult["INFORMATION"]);
		}

		/* statistic */
		if ($arResult["REQUEST"]["QUERY"] && COption::GetOptionString("search", "stat_phrase") == "Y")
		{
			$statistic = new CSearchStatistic($arResult["REQUEST"]["QUERY"]);
			$statistic->PhraseStat(count($arReturn));
		}

		/* rework pagenavigation */
		if($arResult["NEED_PAGER"])
		{
			$rs_ObjectList = new CDBResult;
			$rs_ObjectList->InitFromArray($arResult["SEARCH"]);
			$rs_ObjectList->NavStart($arParams["PAGE_RESULT_COUNT_REAL"], false);
			$arResult["NAV_STRING"] = $rs_ObjectList->GetPageNavStringEx($navComponentObject,  $arParams["PAGER_TITLE"], $arParams["PAGER_TEMPLATE"], $arParams["PAGER_SHOW_ALWAYS"]);
			$arResult["PAGE_START"] = $rs_ObjectList->SelectedRowsCount() - ($rs_ObjectList->NavPageNomer - 1) * $rs_ObjectList->NavPageSize;
			
			$arResult["SEARCH"] = array();
			while($ar_Field = $rs_ObjectList->Fetch())
			{
				$arResult["SEARCH"][] = $ar_Field;
			}
		}

		$arResult["TAGS_CHAIN"] = array();
		$url = array();
		foreach ($arResult["REQUEST"]["~TAGS_ARRAY"] as $key => $tag)
		{
			$url_without = $arResult["REQUEST"]["~TAGS_ARRAY"];
			unset($url_without[$key]);
			$url[$tag] = $tag;
			$result = array(
				"TAG_NAME" => $tag,
				"TAG_PATH" => $APPLICATION->GetCurPageParam("tags=".urlencode(implode(",", $url)), array("tags")),
				"TAG_WITHOUT" => $APPLICATION->GetCurPageParam("tags=".urlencode(implode(",", $url_without)), array("tags")),
			);
			$arResult["TAGS_CHAIN"][] = $result;
		}

		$this->ShowComponentTemplate();
	}
}
else
{
	$this->__ShowError(str_replace("#PAGE#", $templatePage, str_replace("#NAME#", $this->__templateName, "Can not find '#NAME#' template with page '#PAGE#'")));
}
return $arReturn;
?>
