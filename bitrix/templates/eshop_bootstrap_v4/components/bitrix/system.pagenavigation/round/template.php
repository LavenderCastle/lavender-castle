<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

$colorSchemes = array(
	"green" => "bx-green",
	"yellow" => "bx-yellow",
	"red" => "bx-red",
	"blue" => "bx-blue",
);
if(isset($colorSchemes[$arParams["TEMPLATE_THEME"]]))
{
	$colorScheme = $colorSchemes[$arParams["TEMPLATE_THEME"]];
}
else
{
	$colorScheme = "";
}
?>
<div class="bx-pagination <?=$colorScheme?>">
	<div class="bx-pagination-container">
		<ul>
<?if($arResult["bDescPageNumbering"] === true):?>

	<?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<?if($arResult["bSavePage"]):?>
			<li class="bx-pag-prev"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M7.05367 9.5866C6.82586 9.8144 6.82586 10.1837 7.05367 10.4116L7.05464 10.4125L7.05561 10.4135L12.1232 15.4811C12.351 15.7089 12.7204 15.7089 12.9482 15.4811C13.176 15.2533 13.176 14.8839 12.9482 14.6561L8.2911 9.99908L12.9462 5.34396C13.174 5.11615 13.174 4.74681 12.9462 4.519C12.7184 4.29119 12.3491 4.29119 12.1213 4.519L7.05367 9.5866Z" fill="currentColor"/>
</svg></span></a></li>
			<li class=""><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span>1</span></a></li>
		<?else:?>
			<?if (($arResult["NavPageNomer"]+1) == $arResult["NavPageCount"]):?>
				<li class="bx-pag-prev"><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M7.05367 9.5866C6.82586 9.8144 6.82586 10.1837 7.05367 10.4116L7.05464 10.4125L7.05561 10.4135L12.1232 15.4811C12.351 15.7089 12.7204 15.7089 12.9482 15.4811C13.176 15.2533 13.176 14.8839 12.9482 14.6561L8.2911 9.99908L12.9462 5.34396C13.174 5.11615 13.174 4.74681 12.9462 4.519C12.7184 4.29119 12.3491 4.29119 12.1213 4.519L7.05367 9.5866Z" fill="currentColor"/>
</svg></span></a></li>
			<?else:?>
				<li class="bx-pag-prev"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M7.05367 9.5866C6.82586 9.8144 6.82586 10.1837 7.05367 10.4116L7.05464 10.4125L7.05561 10.4135L12.1232 15.4811C12.351 15.7089 12.7204 15.7089 12.9482 15.4811C13.176 15.2533 13.176 14.8839 12.9482 14.6561L8.2911 9.99908L12.9462 5.34396C13.174 5.11615 13.174 4.74681 12.9462 4.519C12.7184 4.29119 12.3491 4.29119 12.1213 4.519L7.05367 9.5866Z" fill="currentColor"/>
</svg></span></a></li>
			<?endif?>
			<li class=""><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span>1</span></a></li>
		<?endif?>
	<?else:?>
			<li class="bx-pag-prev"><span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M7.05367 9.5866C6.82586 9.8144 6.82586 10.1837 7.05367 10.4116L7.05464 10.4125L7.05561 10.4135L12.1232 15.4811C12.351 15.7089 12.7204 15.7089 12.9482 15.4811C13.176 15.2533 13.176 14.8839 12.9482 14.6561L8.2911 9.99908L12.9462 5.34396C13.174 5.11615 13.174 4.74681 12.9462 4.519C12.7184 4.29119 12.3491 4.29119 12.1213 4.519L7.05367 9.5866Z" fill="currentColor"/>
</svg></span></li>
			<li class="bx-active"><span>1</span></li>
	<?endif?>

	<?
	$arResult["nStartPage"]--;
	while($arResult["nStartPage"] >= $arResult["nEndPage"]+1):
	?>
		<?$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;?>

		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<li class="bx-active"><span><?=$NavRecordGroupPrint?></span></li>
		<?else:?>
			<li class=""><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><span><?=$NavRecordGroupPrint?></span></a></li>
		<?endif?>

		<?$arResult["nStartPage"]--?>
	<?endwhile?>

	<?if ($arResult["NavPageNomer"] > 1):?>
		<?if($arResult["NavPageCount"] > 1):?>
			<li class=""><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><span><?=$arResult["NavPageCount"]?></span></a></li>
		<?endif?>
			<li class="bx-pag-next"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">
					<span>
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12.9463 9.5866C13.1741 9.8144 13.1741 10.1837 12.9463 10.4116L12.9454 10.4125L12.9444 10.4135L7.87679 15.4811C7.64898 15.7089 7.27964 15.7089 7.05183 15.4811C6.82403 15.2533 6.82403 14.8839 7.05183 14.6561L11.7089 9.99908L7.05378 5.34396C6.82597 5.11615 6.82597 4.74681 7.05378 4.519C7.28158 4.29119 7.65093 4.29119 7.87874 4.519L12.9463 9.5866Z" fill="currentColor"/>
						</svg>
					</span>
				</a>
			</li>
	<?else:?>
		<?if($arResult["NavPageCount"] > 1):?>
			<li class="bx-active"><span><?=$arResult["NavPageCount"]?></span></li>
		<?endif?>
			<li class="bx-pag-next"><span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M12.9463 9.5866C13.1741 9.8144 13.1741 10.1837 12.9463 10.4116L12.9454 10.4125L12.9444 10.4135L7.87679 15.4811C7.64898 15.7089 7.27964 15.7089 7.05183 15.4811C6.82403 15.2533 6.82403 14.8839 7.05183 14.6561L11.7089 9.99908L7.05378 5.34396C6.82597 5.11615 6.82597 4.74681 7.05378 4.519C7.28158 4.29119 7.65093 4.29119 7.87874 4.519L12.9463 9.5866Z" fill="currentColor"/>
</svg></span></li>
	<?endif?>

<?else:?>

	<?if ($arResult["NavPageNomer"] > 1):?>
		<?if($arResult["bSavePage"]):?>
			<li class="bx-pag-prev">
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">
					<span>
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M7.05367 9.5866C6.82586 9.8144 6.82586 10.1837 7.05367 10.4116L7.05464 10.4125L7.05561 10.4135L12.1232 15.4811C12.351 15.7089 12.7204 15.7089 12.9482 15.4811C13.176 15.2533 13.176 14.8839 12.9482 14.6561L8.2911 9.99908L12.9462 5.34396C13.174 5.11615 13.174 4.74681 12.9462 4.519C12.7184 4.29119 12.3491 4.29119 12.1213 4.519L7.05367 9.5866Z" fill="currentColor"/>
						</svg>
					</span>
				</a>
			</li>
			<li class=""><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><span>1</span></a></li>
		<?else:?>
			<?if ($arResult["NavPageNomer"] > 2):?>
				<li class="bx-pag-prev">
					<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M7.05367 9.5866C6.82586 9.8144 6.82586 10.1837 7.05367 10.4116L7.05464 10.4125L7.05561 10.4135L12.1232 15.4811C12.351 15.7089 12.7204 15.7089 12.9482 15.4811C13.176 15.2533 13.176 14.8839 12.9482 14.6561L8.2911 9.99908L12.9462 5.34396C13.174 5.11615 13.174 4.74681 12.9462 4.519C12.7184 4.29119 12.3491 4.29119 12.1213 4.519L7.05367 9.5866Z" fill="currentColor"/>
</svg></span></a></li>
			<?else:?>
				<li class="bx-pag-prev"><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M7.05367 9.5866C6.82586 9.8144 6.82586 10.1837 7.05367 10.4116L7.05464 10.4125L7.05561 10.4135L12.1232 15.4811C12.351 15.7089 12.7204 15.7089 12.9482 15.4811C13.176 15.2533 13.176 14.8839 12.9482 14.6561L8.2911 9.99908L12.9462 5.34396C13.174 5.11615 13.174 4.74681 12.9462 4.519C12.7184 4.29119 12.3491 4.29119 12.1213 4.519L7.05367 9.5866Z" fill="currentColor"/>
</svg></span></a></li>
			<?endif?>
			<li class=""><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span>1</span></a></li>
		<?endif?>
	<?else:?>
			<li class="bx-pag-prev"><span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M7.05367 9.5866C6.82586 9.8144 6.82586 10.1837 7.05367 10.4116L7.05464 10.4125L7.05561 10.4135L12.1232 15.4811C12.351 15.7089 12.7204 15.7089 12.9482 15.4811C13.176 15.2533 13.176 14.8839 12.9482 14.6561L8.2911 9.99908L12.9462 5.34396C13.174 5.11615 13.174 4.74681 12.9462 4.519C12.7184 4.29119 12.3491 4.29119 12.1213 4.519L7.05367 9.5866Z" fill="currentColor"/>
</svg></span></li>
			<li class="bx-active"><span>1</span></li>
	<?endif?>

	<?
	$arResult["nStartPage"]++;
	while($arResult["nStartPage"] <= $arResult["nEndPage"]-1):
	?>
		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<li class="bx-active"><span><?=$arResult["nStartPage"]?></span></li>
		<?else:?>
			<li class=""><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><span><?=$arResult["nStartPage"]?></span></a></li>
		<?endif?>
		<?$arResult["nStartPage"]++?>
	<?endwhile?>

	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<?if($arResult["NavPageCount"] > 1):?>
			<li class=""><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><span><?=$arResult["NavPageCount"]?></span></a></li>
		<?endif?>
			<li class="bx-pag-next"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M12.9463 9.5866C13.1741 9.8144 13.1741 10.1837 12.9463 10.4116L12.9454 10.4125L12.9444 10.4135L7.87679 15.4811C7.64898 15.7089 7.27964 15.7089 7.05183 15.4811C6.82403 15.2533 6.82403 14.8839 7.05183 14.6561L11.7089 9.99908L7.05378 5.34396C6.82597 5.11615 6.82597 4.74681 7.05378 4.519C7.28158 4.29119 7.65093 4.29119 7.87874 4.519L12.9463 9.5866Z" fill="currentColor"/>
</svg></span></a></li>
	<?else:?>
		<?if($arResult["NavPageCount"] > 1):?>
			<li class="bx-active"><span><?=$arResult["NavPageCount"]?></span></li>
		<?endif?>
			<li class="bx-pag-next"><span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M12.9463 9.5866C13.1741 9.8144 13.1741 10.1837 12.9463 10.4116L12.9454 10.4125L12.9444 10.4135L7.87679 15.4811C7.64898 15.7089 7.27964 15.7089 7.05183 15.4811C6.82403 15.2533 6.82403 14.8839 7.05183 14.6561L11.7089 9.99908L7.05378 5.34396C6.82597 5.11615 6.82597 4.74681 7.05378 4.519C7.28158 4.29119 7.65093 4.29119 7.87874 4.519L12.9463 9.5866Z" fill="currentColor"/>
</svg></span></li>
	<?endif?>
<?endif?>

<?if ($arResult["bShowAll"]):?>
	<?if ($arResult["NavShowAll"]):?>
			<li class="bx-pag-all"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0" rel="nofollow"><span><?echo GetMessage("round_nav_pages")?></span></a></li>
	<?else:?>
			<li class="bx-pag-all"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1" rel="nofollow"><span><?echo GetMessage("round_nav_all")?></span></a></li>
	<?endif?>
<?endif?>
		</ul>
		<div style="clear:both"></div>
	</div>
</div>
