<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(method_exists($this, 'setFrameMode')) 
	$this->setFrameMode(true);
	
if(count($arResult['ELEMENTS']) > 1 && $arResult["ITEMS_COUNT_SHOW"]):
$arParams['MESSAGE_ALIGN'] = isset($arParams['MESSAGE_ALIGN']) ? $arParams['MESSAGE_ALIGN'] : 'LEFT';
$arParams['MESSAGE_TIME'] = intval($arParams['MESSAGE_TIME']) >= 0 ? intval($arParams['MESSAGE_TIME']) : 5;

CJSCore::Init(array("ajax", "popup"));

$APPLICATION->AddHeadScript("/bitrix/js/kombox/filter/jquery.filter.js");
$APPLICATION->AddHeadScript("/bitrix/js/kombox/filter/ion.rangeSlider.js");
$APPLICATION->AddHeadScript("/bitrix/js/kombox/filter/jquery.cookie.js");

$cntClosedProperty = 0;
?>
<div class="kombox-filter" id="kombox-filter">
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
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<?if($arItem["CLOSED"])$cntClosedProperty++;?>
		<?if($arItem["PROPERTY_TYPE"] == "N" || isset($arItem["PRICE"])):?>
			<?if(isset($arItem["VALUES"]["MIN"]["VALUE"]) && isset($arItem["VALUES"]["MAX"]["VALUE"]) && $arItem["VALUES"]["MAX"]["VALUE"] > $arItem["VALUES"]["MIN"]["VALUE"]):?>
			<li class="lvl1<?if($arItem["CLOSED"]):?> kombox-closed<?endif;?>" data-id="<?echo $arItem["CODE_ALT"].'-'.$arItem["ID"]?>">
				<div class="kombox-filter-property-head kombox-middle">
					<?if(strlen($arItem['HINT'])):?>
					<span class="kombox-filter-property-hint"></span>
					<div class="kombox-filter-property-hint-text"><?echo $arItem['HINT']?></div>
					<?endif;?>
					<span class="kombox-filter-property-name"><?echo $arItem["NAME"]?></span>
					<span class="for_modef"></span>	
				</div>
				<div class="kombox-num kombox-filter-property-body" data-name="<?=$arItem["CODE_ALT"]?>">
					<table>
						<tr>
							<?
							$minValue = !empty($arItem["VALUES"]["MIN"]["HTML_VALUE"]) ? $arItem["VALUES"]["MIN"]["HTML_VALUE"] : $arItem["VALUES"]["MIN"]["VALUE"];
							$maxValue = !empty($arItem["VALUES"]["MAX"]["HTML_VALUE"]) ? $arItem["VALUES"]["MAX"]["HTML_VALUE"] : $arItem["VALUES"]["MAX"]["VALUE"];
							?>
							<td class="kombox-from">
								<span><?echo GetMessage("KOMBOX_CMP_FILTER_FROM")?></span>
								<input 
									class="kombox-input kombox-num-from" 
									type="text" 
									name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>" 
									id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>" 
									value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>" 
									size="5" 
									placeholder="<?echo floatval($arItem["VALUES"]["MIN"]["VALUE"])?>" 
								/>
							</td>
							<td class="kombox-range"> 
								<div  
									data-value="<?echo $minValue?>;<?=$maxValue?>" 
									data-min="<?echo $arItem["VALUES"]["MIN"]["VALUE"]?>" 
									data-max="<?echo $arItem["VALUES"]["MAX"]["VALUE"]?>" 
									data-range-from="<?echo $arItem["VALUES"]["MIN"]["RANGE_VALUE"]?>" 
									data-range-to="<?echo $arItem["VALUES"]["MAX"]["RANGE_VALUE"]?>" 
									<?if($arItem["CODE"] == "QUANTITY"):?> data-step="1" <?endif?>
								>
								</div>
							</td>
							<td class="kombox-to">
								<?echo GetMessage("KOMBOX_CMP_FILTER_TO")?>  
								<input 
									class="kombox-input kombox-num-to" 
									type="text" 
									name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>" 
									id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>" 
									value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>" 
									size="5" 
									placeholder="<?echo floatval($arItem["VALUES"]["MAX"]["VALUE"])?>" 
								/>
								 <?=$arItem['UNITS']?>
							</td>
						</tr>
					</table>
				</div>
				<div class="kombox-clear"></div>
			</li>
			<?endif;?>	
		<?elseif(!empty($arItem["VALUES"]) && !isset($arItem["PRICE"])):?>
			<li class="lvl1<?if($arItem["CLOSED"]):?> kombox-closed<?endif;?>" data-id="<?echo $arItem["CODE_ALT"].'-'.$arItem["ID"]?>"<?if($arItem["CLOSED"]):?> style="display:none;"<?endif;?>>
				<div class="kombox-filter-property-head">
					<?if(strlen($arItem['HINT'])):?>
					<span class="kombox-filter-property-hint"></span>
					<div class="kombox-filter-property-hint-text"><?echo $arItem['HINT']?></div>
					<?endif;?>
					<span class="kombox-filter-property-name"><?echo $arItem["NAME"]?></span>
					<span class="for_modef"></span>
				</div>
				<div class="kombox-combo kombox-filter-property-body" data-name="<?=$arItem["CODE_ALT"]?>">
					<ul>
						<?foreach($arItem["VALUES"] as $val => $ar):?>
						<li class="lvl2<?echo $ar["DISABLED"]? ' kombox-disabled': ''?><?echo $ar["CHECKED"]? ' kombox-checked': ''?>">
							<input
								type="checkbox"
								value="<?echo $ar["HTML_VALUE"]?>"
								name="<?echo $ar["CONTROL_NAME"]?>"
								id="<?echo $ar["CONTROL_ID"]?>"
								<?echo $ar["CHECKED"]? 'checked="checked"': ''?>
								data-value="<?echo $ar["CONTROL_NAME_ALT"]?>"
							/>
							<label for="<?echo $ar["CONTROL_ID"]?>"><?echo $ar["VALUE"];?> <span class="kombox-cnt">(<?echo $ar["CNT"];?>)</span></label>
						</li>
						<?endforeach;?>
					</ul>
				</div>
				<div class="kombox-clear">&nbsp;</div>
			</li>
		<?endif;?>
		<?endforeach;?>
			<li>
				<div class="kombox-filter-show-properties kombox-show">
					<?if($cntClosedProperty):?>
					<a href=""><span class="kombox-show"><?=GetMessage("KOMBOX_CMP_FILTER_SHOW_FILTER")?></span><span class="kombox-hide"><?=GetMessage("KOMBOX_CMP_FILTER_HIDE_FILTER")?></span></a>
					<?endif;?>
				</div>
				<div class="kombox-filter-submit">
					<input type="submit" id="set_filter" name="set_filter" value="<?=GetMessage("KOMBOX_CMP_FILTER_SET_FILTER")?>" />
					<?if($arResult['SET_FILTER']):?>
					<a href="<?=$arResult["DELETE_URL"]?>" class="kombox-del-filter"><?=GetMessage("KOMBOX_CMP_FILTER_DEL_FILTER")?></a>
					<?endif;?>
				</div>
				<div class="kombox-clear">&nbsp;</div>
			</li>
		</ul>
		<div class="modef" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?>>
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
		$('#kombox-filter').komboxHorizontalSmartFilter({
			ajaxURL: '<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>',
			urlDelete: '<?echo CUtil::JSEscape($arResult["DELETE_URL"])?>',
			align: '<?echo $arParams['MESSAGE_ALIGN']?>',
			modeftimeout: <?echo $arParams['MESSAGE_TIME']?>
		});
	});
</script>
<?endif;?>