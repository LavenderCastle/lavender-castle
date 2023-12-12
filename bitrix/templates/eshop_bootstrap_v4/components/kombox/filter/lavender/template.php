<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(method_exists($this, 'setFrameMode'))
	$this->setFrameMode(true);

if(count($arResult['ELEMENTS']) > 1 && $arResult["ITEMS_COUNT_SHOW"]):
$arParams['MESSAGE_ALIGN'] = isset($arParams['MESSAGE_ALIGN']) ? $arParams['MESSAGE_ALIGN'] : 'LEFT';
$arParams['MESSAGE_TIME'] = intval($arParams['MESSAGE_TIME']) >= 0 ? intval($arParams['MESSAGE_TIME']) : 5;

include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/functions.php");
include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/choice.php");

CJSCore::Init(array("ajax", "popup"));
$APPLICATION->AddHeadScript("/bitrix/js/kombox/filter/jquery.filter.js");
$APPLICATION->AddHeadScript("/bitrix/js/kombox/filter/ion.rangeSlider.js");
$APPLICATION->AddHeadScript("/bitrix/js/kombox/filter/jquery.cookie.js");
?>
<label class="catalog__filter-trigger" for="filter-trigger">
                        <!--?xml version="1.0" encoding="UTF-8"?-->
                        <svg width="512px" height="512px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>filter</title>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="filter" fill="currentColor" fill-rule="nonzero">
                                    <path d="M420.404,0 L91.596,0 C41.09,0 0,41.09 0,91.596 L0,420.405 C0,470.91 41.09,512 91.596,512 L420.405,512 C470.91,512 512,470.91 512,420.404 L512,91.596 C512,41.09 470.91,0 420.404,0 Z M482,420.404 C482,454.368 454.368,482 420.404,482 L91.596,482 C57.632,482 30,454.368 30,420.404 L30,91.596 C30,57.632 57.632,30 91.596,30 L420.405,30 C454.368,30 482,57.632 482,91.596 L482,420.404 Z" id="Shape"></path>
                                    <path d="M432.733,112.467 L204.272,112.467 C197.991,93.812 180.346,80.334 159.6,80.334 C138.854,80.334 121.209,93.812 114.928,112.467 L79.267,112.467 C70.983,112.467 64.267,119.183 64.267,127.467 C64.267,135.751 70.983,142.467 79.267,142.467 L114.929,142.467 C121.21,161.122 138.855,174.6 159.601,174.6 C180.347,174.6 197.992,161.122 204.273,142.467 L432.734,142.467 C441.018,142.467 447.734,135.751 447.734,127.467 C447.734,119.183 441.018,112.467 432.733,112.467 Z M159.6,144.6 C150.153,144.6 142.467,136.914 142.467,127.467 C142.467,118.02 150.153,110.334 159.6,110.334 C169.047,110.334 176.733,118.02 176.733,127.467 C176.733,136.914 169.047,144.6 159.6,144.6 Z" id="Shape"></path>
                                    <path d="M432.733,241 L397.071,241 C390.79,222.345 373.144,208.867 352.399,208.867 C331.654,208.867 314.009,222.345 307.728,241 L79.267,241 C70.983,241 64.267,247.716 64.267,256 C64.267,264.284 70.983,271 79.267,271 L307.728,271 C314.009,289.655 331.655,303.133 352.4,303.133 C373.145,303.133 390.791,289.655 397.072,271 L432.734,271 C441.018,271 447.734,264.284 447.734,256 C447.734,247.716 441.018,241 432.733,241 Z M352.4,273.133 C342.953,273.133 335.267,265.447 335.267,256 C335.267,246.553 342.953,238.867 352.4,238.867 C361.847,238.867 369.533,246.553 369.533,256 C369.533,265.447 361.847,273.133 352.4,273.133 Z" id="Shape"></path>
                                    <path d="M432.733,369.533 L268.539,369.533 C262.258,350.878 244.613,337.4 223.867,337.4 C203.121,337.4 185.476,350.878 179.195,369.533 L79.267,369.533 C70.983,369.533 64.267,376.249 64.267,384.533 C64.267,392.817 70.983,399.533 79.267,399.533 L179.195,399.533 C185.476,418.188 203.121,431.666 223.867,431.666 C244.613,431.666 262.258,418.188 268.539,399.533 L432.734,399.533 C441.018,399.533 447.734,392.817 447.734,384.533 C447.734,376.249 441.018,369.533 432.733,369.533 Z M223.867,401.667 C214.42,401.667 206.734,393.981 206.734,384.534 C206.734,375.087 214.42,367.401 223.867,367.401 C233.314,367.401 241,375.086 241,384.533 C241,393.98 233.314,401.667 223.867,401.667 L223.867,401.667 Z" id="Shape"></path>
                                </g>
                            </g>
                        </svg>
                        <span>Показать фильтр</span>
</label>
<div class="filter__wrap">
	<div class="kombox-filter" id="kombox-filter">
		<h2>Фильтр</h2>
		<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get"<?if($arResult['IS_SEF']):?> data-sef="yes"<?endif;?>>
			<?foreach($arResult["HIDDEN"] as $arItem):?>
				<input
					type="hidden"
					name="<?echo $arItem["CONTROL_NAME"]?>"
					id="<?echo $arItem["CONTROL_ID"]?>"
					value="<?echo $arItem["HTML_VALUE"]?>"
				/>
			<?endforeach;?>
			<ul>
			<?
			foreach($arResult["ITEMS"] as $arItem):
				$showProperty = false;
				if($arItem["SETTINGS"]["VIEW"] == "SLIDER")
				{
					if(isset($arItem["VALUES"]["MIN"]["VALUE"]) && isset($arItem["VALUES"]["MAX"]["VALUE"]) && $arItem["VALUES"]["MAX"]["VALUE"] > $arItem["VALUES"]["MIN"]["VALUE"])
						$showProperty = true;
				}
				elseif(!empty($arItem["VALUES"]) && !isset($arItem["PRICE"]))
				{
					$showProperty = true;
				}
				?>
				<?if($showProperty):?>
				<li class="lvl1<?if($arItem["CLOSED"]):?> kombox-closed<?endif;?>" data-id="<?echo $arItem["CODE_ALT"].'-'.$arItem["ID"]?>">
					<div class="kombox-filter-property-head">
						<span class="kombox-filter-property-name"><?if ($arItem["NAME"]=='Розничная цена') {echo 'Цена (руб.)';} else {echo $arItem["NAME"];}?></span>
						<?if(strlen($arItem['HINT'])):?>
						<span class="kombox-filter-property-hint"></span>
						<div class="kombox-filter-property-hint-text"><?echo $arItem['HINT']?></div>
						<?endif;?>
						<i class="kombox-filter-property-i"></i>
					</div>
					<span class="for_modef"></span>
					<?komboxShowField($arItem);?>
				</li>
				<?endif;?>
			<?endforeach;?>
			</ul>
			<input type="submit" class="btn btn--show-all" id="set_filter" value="<?=GetMessage("KOMBOX_CMP_FILTER_SET_FILTER")?>" />
			<?if($arResult['SET_FILTER']):?>
			<a href="<?=$arResult["DELETE_URL"]?>" class="kombox-del-filter"><?=GetMessage("KOMBOX_CMP_FILTER_DEL_FILTER")?></a>
			<?endif;?>
			<div class="modef" id="modef" style="display:none">
				<div class="modef-wrap">
					<?echo GetMessage("KOMBOX_CMP_FILTER_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
					<a href="<?echo $arResult["FILTER_URL"]?>"><?echo GetMessage("KOMBOX_CMP_FILTER_FILTER_SHOW")?></a>
					<span class="ecke"></span>
				</div>
			</div>
		</form>
		<div class="kombox-loading"></div>
	</div>
	<script>
		$(function(){
			komboxFilterJsInit();
			$('#kombox-filter').komboxSmartFilter({
				ajaxURL: '<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>',
				urlDelete: '<?echo CUtil::JSEscape($arResult["DELETE_URL"])?>',
				align: '<?echo $arParams['MESSAGE_ALIGN']?>',
				modeftimeout: <?echo $arParams['MESSAGE_TIME']?>
			});
		});
	</script>
</div>
<?endif;?>
