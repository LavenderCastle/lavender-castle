<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use \Arturgolubev\Smartsearch\Unitools as UTools;
use \Arturgolubev\Smartsearch\Encoding as Enc;

$ag_module = 'arturgolubev.smartsearch';

if(!CModule::IncludeModule($ag_module))
{
	global $USER; if($USER->IsAdmin()){
		echo '<div style="color:red;">'.GetMessage("ARTURGOLUBEV_SMARTSEARCH_MODULE_UNAVAILABLE").'</div>';
	}
	return;
}

CModule::IncludeModule("search");
$isSearchInstalled = true;//CModule::IncludeModule("search");

if(!isset($arParams["PAGE"]) || strlen($arParams["PAGE"])<=0)
	$arParams["PAGE"] = "#SITE_DIR#search/index.php";

if(strlen($arParams["FILTER_NAME"])<=0 || !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["FILTER_NAME"]))
	$arFILTERCustom = array();
else
{
	$arFILTERCustom = $GLOBALS[$arParams["FILTER_NAME"]];
	if(!is_array($arFILTERCustom))
		$arFILTERCustom = array();
}

$arResult["CATEGORIES"] = array();
$query = ltrim($_POST["q"]);

$arResult["MODULE_SETTING"] = array();
$arResult["MODULE_SETTING"]["ALWAYS_EXTEND_SEARCH"] = (UTools::getSetting("use_with_standart") == 'Y' || UTools::getSetting("use_with_standart_title") == 'Y');
$arResult["MODULE_SETTING"]["SHOW_PRELOADER"] = UTools::getSetting("show_preloader");

$arResult["VISUAL_PARAMS"] = array();
$arResult["VISUAL_PARAMS"]["THEME_CLASS"] = 'theme-'.UTools::getSetting('color_theme', 'blue');
$arResult["VISUAL_PARAMS"]["THEME_COLOR"] = UTools::getSetting('my_color_theme');
$arResult["VISUAL_PARAMS"]["PLACEHOLDER"] = UTools::getSetting('input_search_placeholder');
$arResult["VISUAL_PARAMS"]["SHOW_SECTION_PICTURE"] = (UTools::getSetting('show_section_picture') == 'Y');

$arResult["DEBUG"] = array();
$arResult["DEBUG"]["QUERY_COUNT"] = 0;

global $USER; if($USER->IsAdmin()){
	$arResult["DEBUG"]["SHOW"] = UTools::getSetting('debug');
}
$arResult["DEBUG"]["QUERY"] = $query;
// $arResult["DEBUG"]["OTHER"] = '';

if(
	!empty($query)
	&& $_REQUEST["ajax_call"] === "y"
	&& (
		!isset($_REQUEST["INPUT_ID"])
		|| $_REQUEST["INPUT_ID"] == $arParams["INPUT_ID"]
	)
)
{
	$arResult["DEBUG"]["TYPE"] = 'base'; 
	$arResult["DEBUG"]["SMARTMODE"] = UTools::getSetting("mode_stitle");
	
	
	CUtil::decodeURIComponent($query);
	if (!$isSearchInstalled)
	{
		require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/search/tools/language.php");
		require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/search/tools/stemming.php");
	}
	
	$arResult["query"] = $query;
	$arResult["phrase"] = stemming_split($query, LANGUAGE_ID);

	$arParams["NUM_CATEGORIES"] = intval($arParams["NUM_CATEGORIES"]);
	if($arParams["NUM_CATEGORIES"] <= 0)
		$arParams["NUM_CATEGORIES"] = 1;

	$arParams["TOP_COUNT"] = intval($arParams["TOP_COUNT"]);
	if($arParams["TOP_COUNT"] <= 0)
		$arParams["TOP_COUNT"] = 5;

	$arResult["DEBUG"]["TOP_COUNT"] = $arParams["TOP_COUNT"]; 

	$arOthersFilter = array("LOGIC"=>"OR");
	
	$alreadyFinded = array();
	for($i = 0; $i < $arParams["NUM_CATEGORIES"]; $i++)
	{
		$bCustom = true;
		if(is_array($arParams["CATEGORY_".$i]))
		{
			foreach($arParams["CATEGORY_".$i] as $categoryCode)
			{
				if ((strpos($categoryCode, 'custom_') !== 0))
				{
					$bCustom = false;
					break;
				}
			}
		}
		else
		{
			$bCustom = (strpos($arParams["CATEGORY_".$i], 'custom_') === 0);
		}

		if ($bCustom)
			continue;

		$category_title = trim($arParams["CATEGORY_".$i."_TITLE"]);
		if(empty($category_title))
		{
			if(is_array($arParams["CATEGORY_".$i]))
				$category_title = implode(", ", $arParams["CATEGORY_".$i]);
			else
				$category_title = trim($arParams["CATEGORY_".$i]);
		}
		if(empty($category_title))
			continue;

		$arResult["CATEGORIES"][$i] = array(
			"TITLE" => htmlspecialcharsbx($category_title),
			"ITEMS" => array()
		);

		if ($isSearchInstalled)
		{
			$exFILTER = array(
				0 => CSearchParameters::ConvertParamsToFilter($arParams, "CATEGORY_".$i),
			);
			$exFILTER[0]["LOGIC"] = "OR";

			if($arParams["CHECK_DATES"] === "Y")
				$exFILTER["CHECK_DATES"] = "Y";

			// echo '<pre>'; print_r($exFILTER); echo '</pre>';

			$arOthersFilter[] = $exFILTER;
			
			if(!empty($arFILTERCustom))
				$exFILTER = array_merge($exFILTER, $arFILTERCustom);
			
			$j = 0;
			$obTitle = new CSearchTitleExt;
			$obTitle->setMinWordLength($_REQUEST["l"]);
			
			$arResult["work_query"] = $arResult["query"];
			$arResult["work_query"] = CArturgolubevSmartsearch::checkReplaceRules($arResult["work_query"]);
			$arResult["work_query"] = CArturgolubevSmartsearch::prepareQuery($arResult["work_query"]);
			$arResult["work_query"] = CArturgolubevSmartsearch::clearExceptionsWords($arResult["work_query"]);
			
			$arResult["DEBUG"]["Q"][] = $arResult["work_query"];
			$arResult["DEBUG"]["QUERY_COUNT"]++;
			
			if($obTitle->Search(
				$arResult["work_query"]
				,$arParams["TOP_COUNT"]
				,$exFILTER
				,false
				,$arParams["ORDER"]
			))
			{
				while($ar = $obTitle->Fetch())
				{
					$j++;
					if($j > $arParams["TOP_COUNT"])
					{
						break;
					}
					else
					{
						$arResult["CATEGORIES"][$i]["ITEMS"][] = array(
							"NAME" => $ar["NAME"],
							"URL" => htmlspecialcharsbx($ar["URL"]),
							"MODULE_ID" => $ar["MODULE_ID"],
							"PARAM1" => $ar["PARAM1"],
							"PARAM2" => $ar["PARAM2"],
							"ITEM_ID" => $ar["ITEM_ID"],
						);
						
						$alreadyFinded[] = $ar["ITEM_ID"];
					}
				}
			}
	
			$arResult["alt_query"] = "";
			if(empty($alreadyFinded) && $arParams["USE_LANGUAGE_GUESS"] !== "N")
			{
				$arLang = CSearchLanguage::GuessLanguage($query);
				if(is_array($arLang) && $arLang["from"] != $arLang["to"])
					$arResult["alt_query"] = CSearchLanguage::ConvertKeyboardLayout($query, $arLang["from"], $arLang["to"]);
				
				if($arResult["alt_query"] && $arResult["alt_query"] != $arResult["query"])
				{
					$arResult["DEBUG"]["Q"][] = $arResult["alt_query"];
					$arResult["DEBUG"]["QUERY_COUNT"]++;
					
					if($obTitle->Search(
						$arResult["alt_query"]
						,$arParams["TOP_COUNT"]
						,$exFILTER
						,false
						,$arParams["ORDER"]
					))
					{
						while($ar = $obTitle->Fetch())
						{
							$j++;
							if($j > $arParams["TOP_COUNT"])
							{
								break;
							}
							else
							{
								$arResult["CATEGORIES"][$i]["ITEMS"][] = array(
									"NAME" => $ar["NAME"],
									"URL" => htmlspecialcharsbx($ar["URL"]),
									"MODULE_ID" => $ar["MODULE_ID"],
									"PARAM1" => $ar["PARAM1"],
									"PARAM2" => $ar["PARAM2"],
									"ITEM_ID" => $ar["ITEM_ID"],
								);
								
								$alreadyFinded[] = $ar["ITEM_ID"];
							}
						}
					}
				}
			}
			
			if (empty($alreadyFinded) || ($arResult["MODULE_SETTING"]["ALWAYS_EXTEND_SEARCH"] && $j < $arParams["TOP_COUNT"])){
			// if (false){
				$arResult["DEBUG"]["TYPE"] = 'smart'; 
				
				$time_start = microtime(true); 
				
				$arSmartParams = array();
				$arSmartParams["SETTINGS"]["WORDS"] = CArturgolubevSmartsearch::prepareQueryWords($arResult["work_query"]);
				
				if(!empty($arSmartParams["SETTINGS"]["WORDS"]))
				{
					$arLavelsWords = CArturgolubevSmartsearch::getSimilarWordsList($arSmartParams["SETTINGS"]["WORDS"], 'title');
					
					$arResult["DEBUG"]["RESULT_WORDS"] = $arLavelsWords;
					
					// $arResult["DEBUG"]["OTHER"]["WORDS"] = $arLavelsWords;
					
					if(!empty($arLavelsWords))
					{
						foreach($arLavelsWords as $level=>$searchArray)
						{
							foreach($searchArray as $sWord)
							{
								if(Enc::toLower($sWord) == Enc::toLower($arResult["work_query"]))
									continue;
								
								$arResult["DEBUG"]["QUERY_COUNT"]++;
								
								$exFILTER["!ITEM_ID"] = $alreadyFinded;
								$arResult["DEBUG"]["Q"][] = $sWord;
								
								if ($obTitle->Search(
									  $sWord
									  , $arParams["TOP_COUNT"]
									  , $exFILTER
									  , false
									  , $arParams["ORDER"]
								   )) {
									while ($ar = $obTitle->Fetch()) {
										$j++;
										if ($j > $arParams["TOP_COUNT"]){
											break;
										}
										else
										{
											$arResult["CATEGORIES"][$i]["ITEMS"][] = array(
												"NAME" => $ar["NAME"],
												"URL" => htmlspecialcharsbx($ar["URL"]),
												"MODULE_ID" => $ar["MODULE_ID"],
												"PARAM1" => $ar["PARAM1"],
												"PARAM2" => $ar["PARAM2"],
												"ITEM_ID" => $ar["ITEM_ID"],
											);
											
											$alreadyFinded[] = $ar["ITEM_ID"];
										}
									}
								}
								
								if ($j > $arParams["TOP_COUNT"]) {
									break(2);
								}
							}
							
							if(!empty($alreadyFinded)) break;
						}
					}
				}
				
				$arResult["DEBUG"]["TIMES"]["FULL"] = round((microtime(true) - $time_start), 2);
			}
			
			if(!$j)
			{
				unset($arResult["CATEGORIES"][$i]);
			}
		}
	}
	
	/* get dop information */
	if(count($alreadyFinded)>0)
	{
		$arResult["INFORMATION"] = CArturgolubevSmartsearch::getRealElementsName($alreadyFinded);
		if(!empty($arResult["INFORMATION"])){
			foreach($arResult["CATEGORIES"] as $category_id => $arCategory)
			{
				foreach($arCategory["ITEMS"] as $key => $arItem)
				{
					if(isset($arItem["ITEM_ID"]))
					{
						$newTitle = $arResult["INFORMATION"][$arItem["ITEM_ID"]]["NAME"];
						if($newTitle)
						{
							$arResult["CATEGORIES"][$category_id]["ITEMS"][$key]["NAME_S"] = $arResult["CATEGORIES"][$category_id]["ITEMS"][$key]["NAME"];
							$arResult["CATEGORIES"][$category_id]["ITEMS"][$key]["NAME"] = CArturgolubevSmartsearch::formatElementName($arResult["CATEGORIES"][$category_id]["ITEMS"][$key]["NAME"], $newTitle);
						}
					}
				}
			}
		}
	}
	/* end get dop information */

	if(!empty($arResult["CATEGORIES"]) && $isSearchInstalled)
	{
		$arResult["CATEGORIES"]["all"] = array(
			"TITLE" => "",
			"ITEMS" => array()
		);

		$params = array(
			"q" => $arResult["query"],
		);
		$url = CHTTP::urlAddParams(
			str_replace("#SITE_DIR#", SITE_DIR, $arParams["PAGE"])
			,$params
			,array("encode"=>true)
		);
		$arResult["CATEGORIES"]["all"]["ITEMS"][] = array(
			"NAME" => GetMessage("CC_BST_ALL_RESULTS"),
			"URL" => $url,
		);
	}
}

$arResult["FORM_ACTION"] = htmlspecialcharsbx(str_replace("#SITE_DIR#", SITE_DIR, $arParams["PAGE"]));

if (
	$_REQUEST["ajax_call"] === "y"
	&& (
		!isset($_REQUEST["INPUT_ID"])
		|| $_REQUEST["INPUT_ID"] == $arParams["INPUT_ID"]
	)
)
{
	$APPLICATION->RestartBuffer();

	if(!empty($query))
		$this->IncludeComponentTemplate('ajax');
	CMain::FinalActions();
	die();
}
else
{
	$APPLICATION->AddHeadScript($this->GetPath().'/script.js');
	CUtil::InitJSCore(array('ajax'));
	$this->IncludeComponentTemplate();
}
?>
