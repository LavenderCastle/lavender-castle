<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
* @global CMain $APPLICATION
* @var array $arParams
* @var array $arResult
* @var CatalogSectionComponent $component
* @var CBitrixComponentTemplate $this
* @var string $templateName
* @var string $componentPath
* @var string $templateFolder
*/

$this->setFrameMode(true);

$APPLICATION->AddHeadString('<link href="'.$arResult["CANONICAL_PAGE_URL"].'" rel="canonical" />',true);

$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList,
	'ITEM' => array(
		'ID' => $arResult['ID'],
		'IBLOCK_ID' => $arResult['IBLOCK_ID'],
		'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
		'JS_OFFERS' => $arResult['JS_OFFERS']
	)
);
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
	'ID' => $mainId,
	'DISCOUNT_PERCENT_ID' => $mainId.'_dsc_pict',
	'STICKER_ID' => $mainId.'_sticker',
	'BIG_SLIDER_ID' => $mainId.'_big_slider',
	'BIG_IMG_CONT_ID' => $mainId.'_bigimg_cont',
	'SLIDER_CONT_ID' => $mainId.'_slider_cont',
	'OLD_PRICE_ID' => $mainId.'_old_price',
	'PRICE_ID' => $mainId.'_price',
	'DISCOUNT_PRICE_ID' => $mainId.'_price_discount',
	'PRICE_TOTAL' => $mainId.'_price_total',
	'SLIDER_CONT_OF_ID' => $mainId.'_slider_cont_',
	'QUANTITY_ID' => $mainId.'_quantity',
	'QUANTITY_DOWN_ID' => $mainId.'_quant_down',
	'QUANTITY_UP_ID' => $mainId.'_quant_up',
	'QUANTITY_MEASURE' => $mainId.'_quant_measure',
	'QUANTITY_LIMIT' => $mainId.'_quant_limit',
	'BUY_LINK' => $mainId.'_buy_link',
	'ADD_BASKET_LINK' => $mainId.'_add_basket_link',
	'BASKET_ACTIONS_ID' => $mainId.'_basket_actions',
	'NOT_AVAILABLE_MESS' => $mainId.'_not_avail',
	'COMPARE_LINK' => $mainId.'_compare_link',
	'TREE_ID' => $mainId.'_skudiv',
	'DISPLAY_PROP_DIV' => $mainId.'_sku_prop',
	'DISPLAY_MAIN_PROP_DIV' => $mainId.'_main_sku_prop',
	'OFFER_GROUP' => $mainId.'_set_group_',
	'BASKET_PROP_DIV' => $mainId.'_basket_prop',
	'SUBSCRIBE_LINK' => $mainId.'_subscribe',
	'TABS_ID' => $mainId.'_tabs',
	'TAB_CONTAINERS_ID' => $mainId.'_tab_containers',
	'SMALL_CARD_PANEL_ID' => $mainId.'_small_card_panel',
	'TABS_PANEL_ID' => $mainId.'_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
	: $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
	: $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
	: $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers)
{
	$actualItem = isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']])
		? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]
		: reset($arResult['OFFERS']);
	$showSliderControls = false;

	foreach ($arResult['OFFERS'] as $offer)
	{
		if ($offer['MORE_PHOTO_COUNT'] > 1)
		{
			$showSliderControls = true;
			break;
		}
	}
}
else
{
	$actualItem = $arResult;
	$showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$iduniq=$actualItem['ID'];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

$showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-primary' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-primary' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['PRODUCT']['SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
);

$discountPositionClass = 'product-item-label-big';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-'.$arParams['TEMPLATE_THEME'] : '';

$inwishlist = '';
if (in_array($arResult['ID'],$_SESSION['wishlist'])){
 $inwishlist = 'active';
}

// Подрубить вверху страницы
use Bitrix\Iblock\InheritedProperty;


// Используем, после обновления элемента.
//ООП  ElementValues или SectionValues или IblockValues ))
// На вход ID инфоблока, ID элемента
$ipropValues = new InheritedProperty\ElementValues($actualItem['ID'], 2);
//Сбросить кеш SEO
$ipropValues->clearValues();

//Получить данные по способам доставки и оплаты
	//Получить категории товара
	$arSelectGroup = ["ID","NAME", "CODE"];
	$res = CIBlockElement::GetElementGroups($arResult['ID'], true , $arSelectGroup);
	$groupIds = [];
	while($ob = $res->Fetch())
	 {
	   $groupIds[] = $ob['ID'];     
	 }

$sklad = "MSK";
$showBadges = true;
if (in_array("63", $groupIds)) {
	$sklad = "BHCH1";
	$showBadges = false;
} else if (in_array("64", $groupIds)) {
	$sklad = "BHCH2";
	$showBadges = false;
}

if ($actualItem['ID']==936):
?>
<script>
	document.addEventListener("DOMContentLoaded", function(event) {
		setTimeout(function(){
		  VK.Goal('page_view');
		}, 300);
	});
</script>
<?
endif;
?>

<style>
	#form, .subscribe {
		display: none;
	}
	footer {
		margin-top: 100px;
	}
</style>

<section class="element" id="<?=$itemIds['ID']?>">
            <div class="container">
                <div class="element__photos">
                    <div class="element__photos-for">
											<?
											$i = 0;
											foreach ($actualItem['MORE_PHOTO'] as $key => $photo):
												$i++;
												if ($i=='1'){
													$alt = $actualItem['PREVIEW_PICTURE']['ALT'];
												} elseif ($i=='2') {
													$alt = $actualItem['DETAIL_PICTURE']['ALT'];
												} else {
													$alt = '';
												}
										    $img_width = 520;
										    $img_propor = $photo['WIDTH'] / $img_width;
										    $img_height = $img_propor * $photo['HEIGHT'];
										    $img_src = CFile::ResizeImageGet($photo["ID"], array('width'=>$img_width, 'height'=>$img_height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
											?>
												<div class="photo-container">
													<img src="<?=$img_src['src']?>" alt="<?=$alt?>"/>
												</div>
											<?
											endforeach;
											?>
										</div>
                    <div class="element__photos-nav">
											<?
											$i = 0;
											foreach ($actualItem['MORE_PHOTO'] as $key => $photo):
												$i++;
												$img_width = 520;
											 	$img_propor = $photo['WIDTH'] / $img_width;
											 	$img_height = $img_propor * $photo['HEIGHT'];
											 	$img_src = CFile::ResizeImageGet($photo["ID"], array('width'=>$img_width, 'height'=>$img_height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
											?>
												<div class="photo-container" style="background-image: url(<?=$img_src['src']?>)"></div>
											<?
											endforeach;
											?>
										</div>
                </div>

								<style>
									.photo-container {
										position: relative;
									}
									.element__photos-for .photo-container img {
										object-fit: cover;
										height: 700px;
										width: 100%;
									}
									.element__photos-for .photo-container::before {
										display: none;
									}
									@media (max-width: 1279px){
										.element__photos-for .photo-container img {
											height: 500px;
										}
									}
									.element__description a {
										text-decoration: none;
										color: var(--accent);
									}
									.element__bonus-info {
										padding: 10px 15px;
										display: flex;
										align-items: center;
										font-size: 14px;
										background: #efefef;
										border-radius: 20px;
										color: #666;
									}
									.element__bonus-info svg {
										width: 15px;
										height: auto;
										margin-right: 5px;
									}
								</style>

								<div class="element__info">
                    <h1 class="element__name"><?=$name?></h1>
										<span class="element__name" style="font-size: 10px;">ID <?=$iduniq?></span>
										<?if ($actualItem['ACTIVE']!='N'):?>
										<div class="element__panel">
												<div class="element__price">
														<div class="element__price-new" id="<?=$itemIds['PRICE_ID']?>"><?=$price['PRINT_RATIO_PRICE']?></div>
												</div>
												<div class="element__bonus-info">
													<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M14.4375 0.6875C10.7718 0.6875 6.875 1.892 6.875 4.125V6.875C6.875 7.2545 7.183 7.5625 7.5625 7.5625C7.942 7.5625 8.25 7.2545 8.25 6.875V6.15863C9.70887 7.0785 12.1179 7.5625 14.4375 7.5625C16.7571 7.5625 19.1661 7.0785 20.625 6.15863V6.875C20.625 7.54738 18.9338 8.61987 15.7548 8.88525C15.378 8.9155 15.0961 9.24963 15.1277 9.62775C15.1566 9.98662 15.4577 10.2575 15.8111 10.2575C15.8317 10.2575 15.8496 10.2561 15.8702 10.2548C17.6605 10.1049 19.4439 9.6415 20.625 8.88938V9.625C20.625 10.2121 19.3793 11.0564 17.0679 11.4648C16.6953 11.5308 16.445 11.8882 16.511 12.2609C16.5701 12.5936 16.8602 12.8287 17.1861 12.8287C17.226 12.8287 17.2673 12.826 17.3071 12.8177C18.7055 12.5716 19.8247 12.1687 20.625 11.6572V12.375C20.625 12.9621 19.3793 13.8064 17.0679 14.2148C16.6953 14.2808 16.445 14.6382 16.511 15.0109C16.5701 15.3436 16.8602 15.5787 17.1861 15.5787C17.226 15.5787 17.2673 15.576 17.3071 15.5677C18.7055 15.3216 19.8247 14.9174 20.625 14.4072V15.125C20.625 15.7121 19.3793 16.5564 17.0679 16.9648C16.6953 17.0308 16.445 17.3883 16.511 17.7609C16.5701 18.0936 16.8602 18.3288 17.1861 18.3288C17.226 18.3288 17.2673 18.326 17.3071 18.3177C18.7055 18.0716 19.8247 17.6674 20.625 17.1572V17.875C20.625 18.5474 18.9338 19.6199 15.7548 19.8853C15.378 19.9155 15.0961 20.2496 15.1277 20.6278C15.1566 20.9866 15.4577 21.2575 15.8111 21.2575C15.8317 21.2575 15.8496 21.2561 15.8702 21.2547C18.9214 20.999 22 19.8564 22 17.875V4.125C22 1.892 18.1032 0.6875 14.4375 0.6875ZM14.4375 6.1875C10.6604 6.1875 8.25 4.96513 8.25 4.125C8.25 3.28487 10.6604 2.0625 14.4375 2.0625C18.2146 2.0625 20.625 3.28487 20.625 4.125C20.625 4.96513 18.2146 6.1875 14.4375 6.1875Z" fill="#C79B6B"/>
													<path d="M7.5625 8.9375C3.89675 8.9375 0 10.142 0 12.375V17.875C0 20.108 3.89675 21.3125 7.5625 21.3125C11.2282 21.3125 15.125 20.108 15.125 17.875V12.375C15.125 10.142 11.2282 8.9375 7.5625 8.9375ZM13.75 17.875C13.75 18.7151 11.3396 19.9375 7.5625 19.9375C3.78538 19.9375 1.375 18.7151 1.375 17.875V17.1586C2.83387 18.0785 5.24288 18.5625 7.5625 18.5625C9.88212 18.5625 12.2911 18.0785 13.75 17.1586V17.875ZM13.75 15.125C13.75 15.9651 11.3396 17.1875 7.5625 17.1875C3.78538 17.1875 1.375 15.9651 1.375 15.125V14.4086C2.83387 15.3285 5.24288 15.8125 7.5625 15.8125C9.88212 15.8125 12.2911 15.3285 13.75 14.4086V15.125ZM7.5625 14.4375C3.78538 14.4375 1.375 13.2151 1.375 12.375C1.375 11.5349 3.78538 10.3125 7.5625 10.3125C11.3396 10.3125 13.75 11.5349 13.75 12.375C13.75 13.2151 11.3396 14.4375 7.5625 14.4375Z" fill="#C79B6B"/>
													</svg>
													<span>+ <?=($price['BASE_PRICE'] / 10)?></span>
												</div>
                        <div class="element__icon">
														<div style="display:block;" class="icon icon--heart <?=$inwishlist?>" data-id="<?=$arResult['ID']?>">
															<svg width="24px" height="22px" viewBox="0 0 24 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																	<title>heart</title>
																	<g stroke="none" stroke-width="1.5" fill="#fff" fill-rule="evenodd">
																			<g id="heart" fill="none" fill-rule="nonzero" stroke="currentColor">
																					<path d="M3.89992273,1.20786181 C5.00718005,0.786213476 6.33601293,0.682385678 7.76049583,1.09706761 C9.23761411,1.52373851 10.5263405,2.43872989 11.4162622,3.69256573 C11.5648722,3.90194652 11.7008923,4.11870729 11.8240802,4.34167299 C11.9471568,4.11868734 12.0831585,3.90192525 12.2317521,3.69254558 C13.1215759,2.43871645 14.4103452,1.52373582 15.8867684,1.09726516 C17.3106574,0.688170623 18.642401,0.793879955 19.7522044,1.21649998 C21.006857,1.69427946 21.9795919,2.57462837 22.4614031,3.56343067 C23.1089014,4.8894626 23.2971089,6.29820753 23.0301859,7.77898788 C22.7553233,9.30381397 22.0039611,10.899829 20.7922115,12.561619 C18.8784984,15.1821181 16.1597687,17.8346566 12.2458163,20.8990234 C7.49074687,17.8326387 4.76913873,15.1817553 2.85595641,12.5619038 C1.64396075,10.8998255 0.892578382,9.30381277 0.617708757,7.7789885 C0.350778889,6.2982096 0.538992654,4.88946615 1.186692,3.56305947 C1.66925083,2.57273846 2.64251392,1.68668847 3.89992273,1.20786181 Z" id="Shape"></path>
																			</g>
																	</g>
															</svg>
                            </div>
													</div>
                        <div class="element__social">
														<span>Поделиться</span>
														<a class="icon" href="https://www.facebook.com/sharer/sharer.php?u=http://<?=$_SERVER['SERVER_NAME'].$APPLICATION->GetCurPage();?>" target="_blank"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.9316 15.6667V10.3536H12.724L12.9905 8.27338H10.9316V6.94835C10.9316 6.34807 11.0989 5.93708 11.9604 5.93708H13.0521V4.08244C12.5209 4.02552 11.987 3.99803 11.4528 4.00011C9.86851 4.00011 8.78074 4.9673 8.78074 6.74286V8.26949H7V10.3497H8.78463V15.6667H10.9316Z" fill="currentColor" />
                                    <circle cx="10" cy="10" r="9.5" stroke="currentColor" />
                                </svg>
                            </a>
														<a class="icon" href="http://vk.com/share.php?url=http://<?=$_SERVER['SERVER_NAME'].$APPLICATION->GetCurPage();?>&title=<?=$name?>&description=<?//$arResult['DETAIL_TEXT']?>&image=http://<?=$_SERVER['SERVER_NAME'].$actualItem['MORE_PHOTO'][0]['SRC']?>&noparse=true" target="_blank">
															<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.3992 7.46926C15.4807 7.19854 15.3992 7 15.0137 7H13.737C13.4121 7 13.2636 7.17175 13.1821 7.36039C13.1821 7.36039 12.5329 8.94343 11.613 9.96987C11.3161 10.2685 11.1804 10.3629 11.0186 10.3629C10.9377 10.3629 10.8201 10.2686 10.8201 9.99782V7.46926C10.8201 7.14439 10.7263 7 10.4556 7H8.44928C8.24667 7 8.12441 7.15021 8.12441 7.29344C8.12441 7.60085 8.58435 7.67188 8.63151 8.53821V10.4176C8.63151 10.8292 8.55757 10.9043 8.39455 10.9043C7.96197 10.9043 6.90932 9.31547 6.28461 7.49663C6.16293 7.14322 6.04008 7.00058 5.71404 7.00058H4.43783C4.07278 7.00058 4 7.17234 4 7.36097C4 7.69982 4.43259 9.3766 6.01504 11.5943C7.07002 13.1086 8.55524 13.9295 9.90831 13.9295C10.7193 13.9295 10.8195 13.7473 10.8195 13.4329V12.2883C10.8195 11.9238 10.8969 11.8504 11.1537 11.8504C11.3423 11.8504 11.6672 11.9459 12.4246 12.6754C13.2898 13.5406 13.433 13.9289 13.9192 13.9289H15.1954C15.5599 13.9289 15.7421 13.7467 15.6373 13.3869C15.5226 13.0288 15.1092 12.5077 14.5608 11.8912C14.2627 11.5395 13.8173 11.1611 13.6816 10.9719C13.4924 10.7279 13.5471 10.6202 13.6816 10.4036C13.6822 10.4042 15.2373 8.21392 15.3992 7.46926Z" fill="currentColor" />
                                    <circle cx="10" cy="10" r="9.5" stroke="currentColor" />
                              </svg>
                            </a>
														<a class="icon" href="http://pinterest.com/pin/create/button/?url=http://<?=$_SERVER['SERVER_NAME'].$APPLICATION->GetCurPage();?>&media=http://<?=$_SERVER['SERVER_NAME'].$actualItem['MORE_PHOTO'][0]['SRC']?>&description=<?//$arResult['DETAIL_TEXT']?>" target="_blank">
															<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.00004 8.18496C6.00004 7.68056 6.08821 7.20404 6.26197 6.75929C6.42797 6.32731 6.67461 5.93084 6.98874 5.591C7.30223 5.25563 7.66097 4.96562 8.05459 4.72937C8.45845 4.48505 8.89567 4.30073 9.35255 4.18218C9.81494 4.06076 10.2911 3.99953 10.7691 4C11.5076 4 12.1948 4.15625 12.8321 4.46745C13.4611 4.77297 13.9965 5.24184 14.3823 5.82505C14.7803 6.41827 14.9781 7.08929 14.9781 7.83746C14.9781 8.2861 14.934 8.72502 14.8439 9.15421C14.7554 9.58317 14.6147 9.99968 14.4251 10.3945C14.2443 10.7766 14.0079 11.1299 13.7236 11.4428C13.4378 11.7507 13.0918 11.9966 12.707 12.165C12.2892 12.3481 11.8373 12.4403 11.3812 12.4354C11.0641 12.4354 10.7477 12.3608 10.4353 12.2111C10.1228 12.062 9.89844 11.8571 9.76359 11.5945C9.71626 11.7767 9.65143 12.0399 9.5652 12.3842C9.48221 12.7278 9.42646 12.9495 9.40182 13.05C9.37589 13.1499 9.32791 13.3165 9.25789 13.5473C9.2104 13.718 9.14949 13.8847 9.07571 14.0458L8.85268 14.4828C8.75623 14.6703 8.64841 14.8518 8.52982 15.0261C8.41247 15.196 8.26724 15.3989 8.09414 15.6323L7.99754 15.6667L7.93336 15.5966C7.86398 14.8621 7.82833 14.4225 7.82833 14.2773C7.82833 13.8475 7.87954 13.3651 7.98068 12.8296C8.07988 12.2947 8.23677 11.6224 8.44748 10.8139C8.65819 10.0061 8.77878 9.53089 8.81119 9.3902C8.66272 9.08743 8.58752 8.69195 8.58752 8.20571C8.58752 7.81736 8.70876 7.45365 8.95188 7.11133C9.19565 6.77031 9.50361 6.5998 9.87704 6.5998C10.163 6.5998 10.3847 6.69445 10.5435 6.88441C10.703 7.07373 10.7808 7.31231 10.7808 7.60341C10.7808 7.91201 10.6784 8.35871 10.4722 8.94286C10.266 9.52765 10.1636 9.96397 10.1636 10.2538C10.1636 10.5475 10.2686 10.7932 10.4787 10.9857C10.686 11.1784 10.9601 11.2828 11.2431 11.2768C11.4998 11.2768 11.7377 11.2185 11.9588 11.1011C12.1764 10.9872 12.3648 10.8246 12.5093 10.6259C12.8238 10.1943 13.0481 9.70369 13.1686 9.18339C13.2308 8.90979 13.2788 8.64981 13.3086 8.40539C13.3404 8.15968 13.354 7.92757 13.354 7.70714C13.354 6.89868 13.0973 6.2685 12.5871 5.81727C12.0742 5.36603 11.4064 5.14171 10.585 5.14171C9.65078 5.14171 8.86954 5.44383 8.2439 6.05002C7.61762 6.65426 7.30253 7.42253 7.30253 8.35417C7.30253 8.55969 7.33365 8.75808 7.39265 8.94999C7.45035 9.14124 7.51324 9.2936 7.58131 9.40641C7.64874 9.51727 7.71228 9.62555 7.76998 9.72539C7.82833 9.82523 7.8588 9.89655 7.8588 9.93934C7.8588 10.0703 7.82444 10.2408 7.75507 10.4515C7.6831 10.6622 7.59817 10.7673 7.49573 10.7673C7.48601 10.7673 7.44581 10.7601 7.37579 10.7452C7.13329 10.6728 6.9143 10.5375 6.74108 10.353C6.55724 10.1617 6.41215 9.93675 6.31383 9.69038C6.21579 9.44489 6.13943 9.19129 6.08562 8.93248C6.02749 8.6876 5.99876 8.43665 6.00004 8.18496Z" fill="currentColor" />
                                    <circle cx="10" cy="10" r="9.5" stroke="currentColor" />
                              </svg>
                            </a>
													</div>
                    </div>
                    <div class="element__ammount" data-entity="quantity-block">
                        <h2>Количество</h2>
                        <div class="element__btn-group">
													<button id="<?=$itemIds['QUANTITY_DOWN_ID']?>" class="element__ammount-btn element__ammount-btn--minus">–</button>
													<input id="<?=$itemIds['QUANTITY_ID']?>" class="element__ammount-input" type="number" value="<?=$price['MIN_QUANTITY']?>" />
													<button id="<?=$itemIds['QUANTITY_UP_ID']?>" class="element__ammount-btn element__ammount-btn--plus">+</button></div>
                        <div class="element__total" id="<?=$itemIds['PRICE_TOTAL']?>"></div>
                    </div>
										<?endif;?>
										<div data-entity="main-button-container">
											<div class="element__btns"  id="<?=$itemIds['BASKET_ACTIONS_ID']?>">
												<?if ($actualItem['ACTIVE']!='N'):?>
													<?if ($actualItem['PROPERTIES']['ZAKAZ']['VALUE'] > 0):
														if ($actualItem['PROPERTIES']['ZAKAZ']['VALUE'] == 1){
															$zakaz_text = $actualItem['PROPERTIES']['ZAKAZ']['VALUE'].' день';
														} elseif ($actualItem['PROPERTIES']['ZAKAZ']['VALUE'] < 5){
															$zakaz_text = $actualItem['PROPERTIES']['ZAKAZ']['VALUE'].' дня';
														} else {
															$zakaz_text = $actualItem['PROPERTIES']['ZAKAZ']['VALUE'].' дней';
														}
													?>
													<button class="btn element__zakaz" data-link="<?echo 'http://'.$_SERVER['HTTP_HOST'].$actualItem['DETAIL_PAGE_URL']?>">Под заказ</button>
													<?else:?>
														<?if ($actualItem['PRODUCT']['AVAILABLE']!='N'):?>
															<a id="<?=$itemIds['ADD_BASKET_LINK']?>" href="javascript:void(0);" class="btn">Купить</a>
															<button class="element__one-click" data-link="<?echo 'http://'.$_SERVER['HTTP_HOST'].$actualItem['DETAIL_PAGE_URL']?>">Купить в один клик</button>
															<div class="element__status element__status--green">
																В наличии
															</div>
														<?else:?>
															<a data-link="<?echo 'http://'.$_SERVER['HTTP_HOST'].$actualItem['DETAIL_PAGE_URL']?>" href="javascript:void(0);" class="btn element__zakaz">Заказать</a>
															<div class="element__status element__status--red">
																Под заказ
															</div>
														<?endif?>
													<?endif?>
												<?else:?>
													<div class="element__status element__status--red">
														Нет в наличии
													</div>
												<?endif;?>
											</div>
										</div>

										<?if (count($arResult['SKU_PROPS']['DATE']['VALUES'])>0):?>
										<div id="<?=$itemIds['TREE_ID']?>">
											<?
											foreach ($arResult['SKU_PROPS'] as $skuProperty)
											{
												if (!isset($arResult['OFFERS_PROP'][$skuProperty['CODE']]))
													continue;

												$propertyId = $skuProperty['ID'];
												$skuProps[] = array(
													'ID' => $propertyId,
													'SHOW_MODE' => $skuProperty['SHOW_MODE'],
													'VALUES' => $skuProperty['VALUES'],
													'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
												);
												?>
												<div data-entity="sku-line-block" class="element__offers">
		                        <h2><?=htmlspecialcharsEx($skuProperty['NAME'])?></h2>
														<div class="element__offers-select">
															<input id="select-check" type="checkbox" class="select-check" />
															<label for="select-check" class="element__offers-list__selected">
																<?
																	$selectedProp = reset($skuProperty['VALUES']);
																	echo $selectedProp['NAME'];
																?>
															</label>
															<label for="select-check" class="element__offers-list__dropdown">
																<ul class="element__offers-list">
																	<?
																	$i=0;
																	foreach ($skuProperty['VALUES'] as &$value)
																	{
																			?>
																			<li data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>" title="<?=$value['NAME']?>" class="size-btn product-item-scu-item-text-container">
																				<?=$value['NAME']?>
																			</li>
																			<?
																			$i++;
																	}
																	?>
																</ul>
															</label>
														</div>
		                    </div>
												<?
											}
											?>
										</div>
										<?
										endif;
											?>
										<?if (count($arResult['SKU_PROPS']['YEAR']['VALUES'])>0):?>
										<div id="<?=$itemIds['TREE_ID']?>">
											<?
											foreach ($arResult['SKU_PROPS'] as $skuProperty)
											{
												if (!isset($arResult['OFFERS_PROP'][$skuProperty['CODE']]))
													continue;

												$propertyId = $skuProperty['ID'];
												$skuProps[] = array(
													'ID' => $propertyId,
													'SHOW_MODE' => $skuProperty['SHOW_MODE'],
													'VALUES' => $skuProperty['VALUES'],
													'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
												);
												?>

												<div data-entity="sku-line-block" class="element__offers">
		                        <h2><?=htmlspecialcharsEx($skuProperty['NAME'])?></h2>
														<div class="element__offers-select">
															<input id="select-check2" type="checkbox" class="select-check" />
															<label for="select-check2" class="element__offers-list__selected">
																<?
																	$selectedProp = reset($skuProperty['VALUES']);
																	echo $selectedProp['NAME'];
																?>
															</label>
															<label for="select-check2" class="element__offers-list__dropdown">
																<ul class="element__offers-list">
																	<?
																	$i=0;
																	foreach ($skuProperty['VALUES'] as &$value)
																	{
																			?>
																			<li data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>" title="<?=$value['NAME']?>" class="size-btn product-item-scu-item-text-container">
																				<?=$value['NAME']?>
																			</li>
																			<?
																			$i++;
																	}
																	?>
																</ul>
															</label>
														</div>
		                    </div>
												<?
											}
											?>
										</div>
										<?
										endif;
											?>
										<?if (count($arResult['SKU_PROPS']['UPAK']['VALUES'])>0):?>
										<div id="<?=$itemIds['TREE_ID']?>">
											<?
											foreach ($arResult['SKU_PROPS'] as $skuProperty)
											{
												if (!isset($arResult['OFFERS_PROP'][$skuProperty['CODE']]))
													continue;

												$propertyId = $skuProperty['ID'];
												$skuProps[] = array(
													'ID' => $propertyId,
													'SHOW_MODE' => $skuProperty['SHOW_MODE'],
													'VALUES' => $skuProperty['VALUES'],
													'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
												);
												?>

												<div data-entity="sku-line-block" class="element__offers">
		                        <h2><?=htmlspecialcharsEx($skuProperty['NAME'])?></h2>
														<div class="element__offers-select">
															<input id="select-check3" type="checkbox" class="select-check" />
															<label for="select-check3" class="element__offers-list__selected">
																<?
																	$selectedProp = reset($skuProperty['VALUES']);
																	echo $selectedProp['NAME'];
																?>
															</label>
															<label for="select-check3" class="element__offers-list__dropdown">
																<ul class="element__offers-list">
																	<?
																	$i=0;
																	foreach ($skuProperty['VALUES'] as &$value)
																	{
																			?>
																			<li data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>" title="<?=$value['NAME']?>" class="size-btn product-item-scu-item-text-container">
																				<?=$value['NAME']?>
																			</li>
																			<?
																			$i++;
																	}
																	?>
																</ul>
															</label>
														</div>
		                    </div>
												<?
											}
											?>
										</div>
										<?
										endif;

										if ($arParams['USE_PRICE_COUNT'])
										{
											$showRanges = !$haveOffers && count($actualItem['ITEM_QUANTITY_RANGES']) > 1;
											$useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';
											?>
											<div class="element__special"
												<?=$showRanges ? '' : 'style="display: none;"'?>
												data-entity="price-ranges-block">
												<h2>Цена при покупке:</h2>
												<div data-entity="price-ranges-body">
													<?
														foreach ($actualItem['ITEM_QUANTITY_RANGES'] as $range)
														{
															if ($range['HASH'] !== 'ZERO-INF')
															{
																$itemPrice = false;

																foreach ($arResult['ITEM_PRICES'] as $itemPrice)
																{
																	if ($itemPrice['QUANTITY_HASH'] === $range['HASH'])
																	{
																		break;
																	}
																}

																if ($itemPrice)
																{
																	?>
																	<li class="element__special-item">
																	<p>
																		<?
																		$tmptext = Loc::getMessage(
																				'CT_BCE_CATALOG_RANGE_FROM',
																				array('#FROM#' => $range['SORT_FROM'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
																			);
																		if ($tmptext != 'от 0 шт'){
																			echo Loc::getMessage(
																					'CT_BCE_CATALOG_RANGE_FROM',
																					array('#FROM#' => $range['SORT_FROM'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
																				).' ';
																		}

																		if (is_infinite($range['SORT_TO']))
																		{
																			echo Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
																		}
																		else
																		{
																			echo Loc::getMessage(
																				'CT_BCE_CATALOG_RANGE_TO',
																				array('#TO#' => $range['SORT_TO'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
																			);
																		}
																		?>
																	</p>
																		<p><?=($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE'])?></p>
																	</li>
																	<?
																}

															}
														}
													}
													?>
												</div>
												<div class="price-promo-notice">
													Обратите внимание! Скидки за оптовый заказ (от 5 шт. и более) и промокоды не суммируются.
												</div>
												<style>
													.price-promo-notice {
														margin-top: 30px;
														padding: 20px;
														border: 2px solid var(--accent);
														font-size: 18px;
														border-radius: 5px;
													}
													@media (max-width: 1199px){
														.price-promo-notice {
															font-size: 14px;
														}
													}
												</style>
											</div>
											<?
											unset($showRanges, $useRatio, $itemPrice, $range);
										?>

                    <div class="element__description">
                        <?=htmlspecialcharsback($arResult['DETAIL_TEXT'])?>
                    </div>
										<style>
										.element__panel {
											margin-top: 30px;
										}
										.element__name {
											margin-bottom: 0;
										}
										.element__btn-group {
											width: auto !important;
										}
										.element__description {
											margin-top: 30px;
										}
										.element__total {
									    color: var(--accent);
										}
										.element__total strong {
											font-weight: 700;
											font-size: 25px;
										}
										.element__special-item p:last-child {
											font-weight: 600;
											color: var(--accent);
										}
										.element__price-new {
											font-size: 28px;
											font-weight: 700;
									    color: var(--accent);
										}
										.element__description br
												{   content: "" !important;
												    display: block !important;
												    margin-bottom: 1.1em !important;
												}
										@media (max-width: 1200px){
											.element__total {
												font-size: 12px;
											}
											.element__total strong {
												font-size: 18px;
												display: block;
											}
										}
										</style>

										<?if (count($arResult['SKU_PROPS']['SIZE']['VALUES'])>0):?>
										<div id="<?=$itemIds['TREE_ID']?>">
											<?
											foreach ($arResult['SKU_PROPS'] as $skuProperty)
											{
												if (!isset($arResult['OFFERS_PROP'][$skuProperty['CODE']]))
													continue;

												$propertyId = $skuProperty['ID'];
												$skuProps[] = array(
													'ID' => $propertyId,
													'SHOW_MODE' => $skuProperty['SHOW_MODE'],
													'VALUES' => $skuProperty['VALUES'],
													'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
												);
												?>

												<div data-entity="sku-line-block" class="element__size">
		                        <h2><?=htmlspecialcharsEx($skuProperty['NAME'])?></h2>
														<?
														$i=0;
														foreach ($skuProperty['VALUES'] as &$value)
														{
																?>
																<li data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>" title="<?=$value['NAME']?>" class="size-btn product-item-scu-item-text-container">
																	<?=$value['NAME']?>
																</li>
																<div class="element__size-val">
																	<? if ($arResult['PROPERTIES']['HEIGHT2']['VALUE'][$i]!=''):?>
																		<span>Высота (см): <?=$arResult['PROPERTIES']['HEIGHT2']['VALUE'][$i]?></span>
																	<?endif;?>
																	<? if ($arResult['PROPERTIES']['WIDTH2']['VALUE'][$i]!=''):?>
																		<span>Ширина / диаметр (см): <?=$arResult['PROPERTIES']['WIDTH2']['VALUE'][$i]?></span>
																	<?endif;?>
																</div>
																<?
																$i++;
														}
														?>
		                    </div>
												<?
											}
											?>
										</div>
										<?
										else:
											?>
											<div class="element__size element__size--nooffers">
												<div class="element__size-val">
													<? if ($arResult['PROPERTIES']['HEIGHT']['VALUE']!=''):?>
														<span>Высота (см): <?=$arResult['PROPERTIES']['HEIGHT']['VALUE']?></span>
													<?endif;?>
													<? if ($arResult['PROPERTIES']['WIDTH']['VALUE']!=''):?>
														<span>Ширина / диаметр (см): <?=$arResult['PROPERTIES']['WIDTH']['VALUE']?></span>
													<?endif;?>
												</div>
											</div>
											<style>
											.element__size--nooffers {
												display: block;
											}
											</style>
											<?
										endif;
										?>
										<? if (($arResult['PROPERTIES']['SETAMMOUNT']['VALUE']!='')||($arResult['PROPERTIES']['BRAND']['VALUE']!='')):?>
											<div class="element__size element__size--nooffers">
												<div class="element__size-val">
													<? if ($arResult['PROPERTIES']['SETAMMOUNT']['VALUE']!=''):?>
														<span>Кол-во в наборе: <?=$arResult['PROPERTIES']['SETAMMOUNT']['VALUE']?></span>
													<?endif;?>
													<? if ($arResult['PROPERTIES']['BRAND']['VALUE']!=''):?>
														<span>Производитель: <?=$arResult['PROPERTIES']['BRAND']['VALUE']?></span>
													<?endif;?>
												</div>
											</div>
										<?endif;?>
										<? if (($arResult['PROPERTIES']['FILLER']['VALUE']!='')||($arResult['PROPERTIES']['SACK']['VALUE']!='')):?>
											<div class="element__size element__size--nooffers">
												<div class="element__size-val">
													<? if ($arResult['PROPERTIES']['FILLER']['VALUE']!=''):?>
														<span>Наполнение: <?=$arResult['PROPERTIES']['FILLER']['VALUE']?></span>
													<?endif;?>
													<? if ($arResult['PROPERTIES']['SACK']['VALUE']!=''):?>
														<span>Материал мешочка: <?=$arResult['PROPERTIES']['SACK']['VALUE']?></span>
													<?endif;?>
												</div>
											</div>
										<?endif;?>
										<? if ($arResult['PROPERTIES']['PUCHAMMOUNT']['VALUE']!=''):?>
											<div class="element__size element__size--nooffers">
												<div class="element__size-val">
														<span>Количество пучков: <?$i=0; foreach ($arResult['PROPERTIES']['PUCHAMMOUNT']['VALUE'] as $propval){$i++; if ($i!=1){echo ' / ';} echo $propval;} ?></span>
												</div>
											</div>
										<?endif;?>
										<? if ($arResult['PROPERTIES']['PUCHLENGTH']['VALUE']!=''):?>
											<div class="element__size element__size--nooffers">
												<div class="element__size-val">
														<span>Длина пучков: <?$i=0; foreach ($arResult['PROPERTIES']['PUCHLENGTH']['VALUE'] as $propval){$i++; if ($i!=1){echo ' / ';} echo $propval;} ?></span>
												</div>
											</div>
										<?endif;?>
										<? if ($arResult['PROPERTIES']['PUCHWEIGHT']['VALUE']!=''):?>
											<div class="element__size element__size--nooffers">
												<div class="element__size-val">
														<span>Вес пучков: <?$i=0; foreach ($arResult['PROPERTIES']['PUCHWEIGHT']['VALUE'] as $propval){$i++; if ($i!=1){echo ' / ';} echo $propval;} ?></span>
												</div>
											</div>
										<?endif;?>
										<? if (($arResult['PROPERTIES']['YEAR']['VALUE']!='')||($arResult['PROPERTIES']['SORN']['VALUE']!='')):?>
											<div class="element__size element__size--nooffers">
												<div class="element__size-val">
													<? if ($arResult['PROPERTIES']['YEAR']['VALUE']!=''):?>
														<span>Год сбора: <?=$arResult['PROPERTIES']['YEAR']['VALUE']?></span>
													<?endif;?>
													<? if ($arResult['PROPERTIES']['SORN']['VALUE']!=''):?>
														<span>Сорность: <?=$arResult['PROPERTIES']['SORN']['VALUE']?></span>
													<?endif;?>
												</div>
											</div>
										<?endif;?>
										<? if ($arResult['PROPERTIES']['SETSIZE']['VALUE']!=''):?>
											<div class="element__size element__size--nooffers">
												<div class="element__size-val">
														<span>Размер набора (Д/Ш/В), см: <?=$arResult['PROPERTIES']['SETSIZE']['VALUE']?></span>
												</div>
											</div>
										<?endif;?>
										<? if ($arResult['PROPERTIES']['SETWEIGHT']['VALUE']!=''):?>
											<div class="element__size element__size--nooffers">
												<div class="element__size-val">
														<span>Вес набора, г: <?=$arResult['PROPERTIES']['SETWEIGHT']['VALUE']?></span>
												</div>
											</div>
										<?endif;?>


                    <div class="element__props">

												<? if ($arResult['PROPERTIES']['CONTAIN']['VALUE']!=''):?>
													<div class="element__prop"><input type="checkbox" id="prop1" /><label for="prop1">Состав</label>
															<div class="element__prop-content">
																<?foreach ($arResult['DISPLAY_PROPERTIES']['CONTAIN']['LINK_ELEMENT_VALUE'] as $containItem):?>
																	<p><?=$containItem['NAME']?></p>
																<?endforeach;?>
															</div>
													</div>
												<?endif;?>
												<? if ($arResult['PROPERTIES']['SETCONTAIN']['VALUE']!=''):?>
													<div class="element__prop"><input type="checkbox" id="prop1-1" /><label for="prop1-1">Состав</label>
															<div class="element__prop-content">
																<?foreach ($arResult['PROPERTIES']['SETCONTAIN']['VALUE'] as $containItem):?>
																	<p><?=$containItem?></p>
																<?endforeach;?>
															</div>
													</div>
												<?endif;?>
												<? if ($arResult['PROPERTIES']['USAGE']['VALUE']!=''):?>
													<div class="element__prop"><input type="checkbox" id="prop1-2" /><label for="prop1-2">Применение</label>
															<div class="element__prop-content">
																<?=htmlspecialcharsback($arResult['PROPERTIES']['USAGE']['VALUE']['TEXT'])?>
															</div>
													</div>
													<style>
														.element__prop-content ul {
															margin: 0;
															padding: 0;
															list-style: none;
														}
														.element__prop-content li {
															margin-bottom: 10px;
															list-style: none;
														}
														.element__prop-content ul li:marker {
															color: #fff;
															opacity: 0;
															display: none;
														}
													</style>
												<?endif;?>
												<style>
													.payment-icons {
														display: flex;
														margin-left: 20px;
														align-items: center;
													}
													.payment-icons svg {
														margin-right: 10px;
													}
												</style>
												<div class="element__prop"><input type="checkbox" id="prop3" /><label style="display: flex; align-items: center;" for="prop3">Оплата <div class="payment-icons"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
    <g fill="none" fill-rule="nonzero">
        <path fill="#FFF" fill-opacity=".01" d="M0 0h32v32H0z"></path>
        <path fill="#CBCFD3" d="M11.257 21.302l1.618-9.143h2.587l-1.619 9.143h-2.586zm11.969-8.918A6.909 6.909 0 0 0 20.907 12c-2.556 0-4.357 1.24-4.372 3.017-.014 1.314 1.286 2.047 2.267 2.485 1.007.448 1.346.734 1.34 1.134-.006.613-.803.893-1.547.893-1.036 0-1.586-.139-2.435-.48l-.334-.146-.363 2.047c.605.255 1.722.477 2.882.488 2.72 0 4.485-1.226 4.505-3.124.01-1.04-.68-1.832-2.172-2.484-.904-.423-1.458-.705-1.452-1.134 0-.38.469-.786 1.481-.786a4.93 4.93 0 0 1 1.937.35l.231.106.351-1.982zm6.634-.216h-1.999c-.62 0-1.083.162-1.355.758l-3.842 8.38h2.717s.444-1.127.545-1.375l3.313.004c.077.32.315 1.37.315 1.37h2.4l-2.094-9.137zm-3.19 5.893c.214-.527 1.03-2.556 1.03-2.556-.014.024.213-.53.344-.873l.175.789.599 2.64H26.67zM9.087 12.166L6.554 18.4l-.27-1.267c-.471-1.461-1.94-3.044-3.582-3.836l2.316 7.996 2.737-.003 4.073-9.125h-2.74l-.001.001z"></path>
        <path fill="#CBCFD3" d="M4.205 12.16H.033L0 12.35c3.246.757 5.393 2.586 6.285 4.784l-.908-4.202c-.156-.58-.61-.752-1.172-.772"></path>
    </g>
</svg><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
    <g fill="none" fill-rule="evenodd">
        <path fill="none" d="M0 0h32v32H0z"></path>
        <circle cx="15.72" cy="16.79" r="6.12" fill="#CBCFD3"></circle>
        <path fill="#E7E8EA" d="M15.686 10.671a7.789 7.789 0 0 0-2.97 6.114c0 2.485 1.17 4.71 2.97 6.114a7.774 7.774 0 0 1-4.813 1.664c-4.314 0-7.805-3.478-7.805-7.778 0-4.3 3.49-7.778 7.805-7.778 1.821 0 3.49.627 4.813 1.664zm12.732 6.114c0 4.3-3.49 7.778-7.804 7.778a7.774 7.774 0 0 1-4.813-1.664 7.724 7.724 0 0 0 2.97-6.114 7.789 7.789 0 0 0-2.97-6.114 7.774 7.774 0 0 1 4.813-1.664c4.314 0 7.804 3.5 7.804 7.778z"></path>
    </g>
</svg><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
    <g fill="none" fill-rule="nonzero">
        <path fill="#FFF" fill-opacity=".01" d="M0 0h32v32H0z"></path>
        <path fill="#CBCFD3" d="M28.408 12h-6.073c.326 2.024 2.285 3.918 4.44 3.918h4.833c.065-.196.065-.457.065-.653A3.234 3.234 0 0 0 28.408 12zM22.857 16.245v4.898h2.939V18.53h2.612c1.437 0 2.678-.98 3.07-2.286h-8.62l-.001.001zM12.408 12v9.143h2.612s.653 0 .98-.653l2.286-4.572h.326v5.225h2.939V12h-2.612s-.653.065-.98.653l-2.286 4.571h-.326V12h-2.939zM0 21.143V12h2.939s.849 0 1.306 1.306c1.175 3.461 1.306 3.918 1.306 3.918s.261-.848 1.306-3.918C7.314 12 8.163 12 8.163 12h2.939v9.143H8.163v-4.898h-.326l-1.633 4.898H4.898l-1.633-4.898H2.94v4.898H0z"></path>
    </g>
</svg><svg style="width: 20px; margin-left: 5px; margin-right: 15px;" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<path fill="#CBCFD3" d="M374.154,182.154H512v-64c0-40.719-33.127-73.846-73.846-73.846H73.846C33.127,44.308,0,77.435,0,118.154v275.692
			c0,40.719,33.127,73.846,73.846,73.846h364.308c40.719,0,73.846-33.127,73.846-73.846v-64H374.154
			c-40.719,0-73.846-33.127-73.846-73.846S333.435,182.154,374.154,182.154z"/>
	</g>
</g>
<g>
	<g>
		<path fill="#CBCFD3" d="M374.154,211.692c-24.431,0-44.308,19.876-44.308,44.308s19.876,44.308,44.308,44.308H512v-88.615H374.154z
			 M393.846,270.769h-19.692c-8.157,0-14.769-6.613-14.769-14.769s6.613-14.769,14.769-14.769h19.692
			c8.157,0,14.769,6.613,14.769,14.769S402.003,270.769,393.846,270.769z"/>
	</g>
</g>
</svg>
<svg style="width: 20px; margin-right: 15px;" viewBox="0 0 512 512.00025" width="512pt" xmlns="http://www.w3.org/2000/svg" fill="#CBCFD3"><path d="m396.425781 268.34375h59.996094v143.65625h-59.996094zm0 0"/><path d="m282.808594 268.34375h60v143.65625h-60zm0 0"/><path d="m169.191406 268.34375h60v143.65625h-60zm0 0"/><path d="m55.578125 268.34375h59.996094v143.65625h-59.996094zm0 0"/><path d="m476.425781 223.34375v-15h-440.847656v15c0 8.285156 6.714844 15 15 15h410.847656c8.28125 0 15-6.714844 15-15zm0 0"/><path d="m496.992188 442h-481.976563c-8.285156 0-15 6.714844-15 15v40c0 8.285156 6.714844 15 15 15h481.976563c8.285156 0 15-6.714844 15-15v-40c0-8.285156-6.714844-15-15-15zm0 0"/><path d="m15 178.34375h482c6.710938 0 12.605469-4.457031 14.433594-10.914062 1.824218-6.457032-.855469-13.34375-6.570313-16.859376l-241-148.34375c-4.820312-2.96875-10.902343-2.96875-15.726562 0l-241 148.34375c-5.714844 3.519532-8.394531 10.402344-6.566407 16.859376 1.828126 6.457031 7.722657 10.914062 14.429688 10.914062zm230.804688-90.117188h20.394531c8.285156 0 15 6.714844 15 15 0 8.285157-6.714844 15-15 15h-20.394531c-8.285157 0-15-6.714843-15-15 0-8.285156 6.714843-15 15-15zm0 0"/></svg>
</div></label>
								<?php if ($sklad == "BHCH1") {?>
									<div class="element__prop-content">
										<h3>Банковской картой</h3>
											<p>на сайте: VISA / Mastercard / МИР</p>
											<p>при самовывозе: American Express (AmEx) / UnionPay/ VISA / Mastercard / МИР/</p>
										<h3>Наличными при получении</h3>
											<p>Самовывоз в Крыму (с. Ароматное Бахчисарайский р/н)</p>
										<h3>Безналичным рассчетом для юр.лиц</h3>
											<p>Присылайте реквизиты, мы выставим вам счет с НДС или без НДС.</p>
											<a href="/dostavka-i-oplata/">Подробнее об оплате</a><br /><br />
									</div>
								<?php } else if ($sklad == "BHCH2") { ?>
									<div class="element__prop-content">
										<h3>Банковской картой</h3>
											<p>на сайте: VISA / Mastercard / МИР</p>
											<p>в студии: American Express (AmEx) / UnionPay/ VISA / Mastercard / МИР/</p>
										<h3>Наличными при получении</h3>
											<p>Самовывоз в Крыму (с. Ароматное Бахчисарайский р/н)</p>
										<h3>Безналичным рассчетом для юр.лиц</h3>
											<p>Присылайте реквизиты, мы выставим вам счет с НДС или без НДС.</p>
											<a href="/dostavka-i-oplata/">Подробнее об оплате</a><br /><br />
									</div>
								<?php } else { ?>
									<div class="element__prop-content">
										<h3>Банковской картой</h3>
											<p>на сайте: VISA / Mastercard / МИР</p>
											<p>в студии: American Express (AmEx) / UnionPay/ VISA / Mastercard / МИР/</p>
										<h3>Наличными при получении</h3>
											<p>только для Москвы</p>
										<h3>Безналичным рассчетом для юр.лиц</h3>
											<p>Присылайте реквизиты, мы выставим вам счет с НДС или без НДС.</p>
											<a href="/dostavka-i-oplata/">Подробнее об оплате</a><br /><br />
									</div>
								<?php } ?>
							</div>
						<?if ($sklad == 'BHCH1'):?>
							<div class="element__prop"><input type="checkbox" id="prop2" /><label for="prop2">Доставка</label>
	                            <div class="element__prop-content">
	                                <h3>Самовывоз в Крыму (с. Ароматное Бахчисарайский р/н)</h3>
	                                	<p>0 руб</p>
	                                <h3>Доставка в любой город РФ Почтой России</h3>
	                                	<p>Стоимость рассчитывается менеджером индивидуально.</p>
	                                <h3>Доставка в РФ, KAZ, BLR Транспортной Компанией (СДЭК, КИТ, EMS и др.)</h3>
	                                	<p>Цена - 0 руб до терминала в г. Бахчисарай. От терминала до получателя - в соответствии с тарифами ТК.</p>
									<a href="/dostavka-i-oplata/">Подробнее о доставке</a>
	                            </div>
	                        </div>
						<?elseif ($sklad == 'BHCH2'):?>
	                        <div class="element__prop"><input type="checkbox" id="prop2" /><label for="prop2">Доставка</label>
	                            <div class="element__prop-content">
	                                <h3>Самовывоз в Крыму (с. Ароматное Бахчисарайский р/н)</h3>
	                                	<p>0 руб</p>
	                                <h3>Доставка в РФ, KAZ, BLR Транспортной Компанией (СДЭК, КИТ, EMS и др.)</h3>
	                                	<p>Цена - рассчитывается менеджером дополнительно.</p>
									<a href="/dostavka-i-oplata/">Подробнее о доставке</a>
	                            </div>
	                        </div>
						<?else:?>
	                        <div class="element__prop"><input type="checkbox" id="prop2" /><label for="prop2">Доставка</label>
	                            <div class="element__prop-content">
	                                <h3>Доставка по Москве</h3>
	                                <p>500 руб, бесплатно при заказе от 8000 руб.</p>
	                                <h3>Срочная доставка по Москве </h3>
	                                <p>600 руб</p>
	                                <h3>Доставка за МКАД</h3>
	                                <p>от 500 руб (рассчитывается менеджером дополнительно)</p>
	                                <h3>Самовывоз</h3>
	                                <p>Бесплатно</p>
	                                <h3>Доставка по России</h3>
	                                <p>500 руб, бесплатно при заказе от 10000 руб.</p><a href="/dostavka-i-oplata/">Подробнее о доставке</a>
	                            </div>
	                        </div>
						<?endif;
							if ($showBadges) {
						?>
									<div class="triggers__wrapper">
										<div class="triggers__item">
	                        				<div class="triggers__img">
	                          					<img width="60" height="60" src="/images/warranty.svg" alt="">
	                        				</div>
											<div class="triggers__text">
												<h2>100% гарантия качества</h2>
												<p>С букетом что-то не так? Вернём деньги!</p>
											</div>
	                    				</div>
										<div class="triggers__item">
	                        				<div class="triggers__img">
	                          					<img width="60" height="60" src="/images/camera.svg" alt="">
	                        				</div>
	                        				<div class="triggers__text">
	                          					<h2>Фотоконтроль букета</h2>
	                          					<p>Отправим фото букета перед доставкой</p>
	                        				</div>
	                    				</div>
									</div>
								<?php } ?>
                    </div>
                </div>
            </div>
<div id="<?=$itemIds['BIG_SLIDER_ID']?>" style="display: none;">
	<div data-entity="images-container"></div>
</div>
</section>


	<?
	if ($haveOffers)
	{
		if ($arResult['OFFER_GROUP'])
		{
			?>
			<div class="row">
				<div class="col">
					<?
					foreach ($arResult['OFFER_GROUP_VALUES'] as $offerId)
					{
						?>
						<span id="<?=$itemIds['OFFER_GROUP'].$offerId?>" style="display: none;">
							<?
							$APPLICATION->IncludeComponent(
								'bitrix:catalog.set.constructor',
								'bootstrap_v4',
								array(
									'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
									'IBLOCK_ID' => $arResult['OFFERS_IBLOCK'],
									'ELEMENT_ID' => $offerId,
									'PRICE_CODE' => $arParams['PRICE_CODE'],
									'BASKET_URL' => $arParams['BASKET_URL'],
									'OFFERS_CART_PROPERTIES' => $arParams['OFFERS_CART_PROPERTIES'],
									'CACHE_TYPE' => $arParams['CACHE_TYPE'],
									'CACHE_TIME' => $arParams['CACHE_TIME'],
									'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
									'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME'],
									'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
									'CURRENCY_ID' => $arParams['CURRENCY_ID'],
									'DETAIL_URL' => $arParams['~DETAIL_URL']
								),
								$component,
								array('HIDE_ICONS' => 'Y')
							);
							?>
						</span>
						<?
					}
					?>
				</div>
			</div>
			<?
		}
	}
	else
	{
		if ($arResult['MODULES']['catalog'] && $arResult['OFFER_GROUP'])
		{
			?>
			<div class="row">
				<div class="col">
					<? $APPLICATION->IncludeComponent(
						'bitrix:catalog.set.constructor',
						'bootstrap_v4',
						array(
							'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
							'IBLOCK_ID' => $arParams['IBLOCK_ID'],
							'ELEMENT_ID' => $arResult['ID'],
							'PRICE_CODE' => $arParams['PRICE_CODE'],
							'BASKET_URL' => $arParams['BASKET_URL'],
							'CACHE_TYPE' => $arParams['CACHE_TYPE'],
							'CACHE_TIME' => $arParams['CACHE_TIME'],
							'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
							'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME'],
							'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
							'CURRENCY_ID' => $arParams['CURRENCY_ID']
						),
						$component,
						array('HIDE_ICONS' => 'Y')
					);
					?>
				</div>
			</div>
			<?
		}
	}
	?>


	<meta itemprop="name" content="<?=$name?>" />
	<meta itemprop="category" content="<?=$arResult['CATEGORY_PATH']?>" />
	<?
	if ($haveOffers)
	{
		foreach ($arResult['JS_OFFERS'] as $offer)
		{
			$currentOffersList = array();

			if (!empty($offer['TREE']) && is_array($offer['TREE']))
			{
				foreach ($offer['TREE'] as $propName => $skuId)
				{
					$propId = (int)substr($propName, 5);

					foreach ($skuProps as $prop)
					{
						if ($prop['ID'] == $propId)
						{
							foreach ($prop['VALUES'] as $propId => $propValue)
							{
								if ($propId == $skuId)
								{
									$currentOffersList[] = $propValue['NAME'];
									break;
								}
							}
						}
					}
				}
			}

			$offerPrice = $offer['ITEM_PRICES'][$offer['ITEM_PRICE_SELECTED']];
			?>
			<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<meta itemprop="sku" content="<?=htmlspecialcharsbx(implode('/', $currentOffersList))?>" />
			<meta itemprop="price" content="<?=$offerPrice['RATIO_PRICE']?>" />
			<meta itemprop="priceCurrency" content="<?=$offerPrice['CURRENCY']?>" />
			<link itemprop="availability" href="http://schema.org/<?=($offer['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
		</span>
			<?
		}

		unset($offerPrice, $currentOffersList);
	}
	else
	{
		?>
		<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
		<meta itemprop="price" content="<?=$price['RATIO_PRICE']?>" />
		<meta itemprop="priceCurrency" content="<?=$price['CURRENCY']?>" />
		<link itemprop="availability" href="http://schema.org/<?=($actualItem['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
	</span>
		<?
	}
	?>
	<?
	if ($haveOffers)
	{
		$offerIds = array();
		$offerCodes = array();

		$useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';

		foreach ($arResult['JS_OFFERS'] as $ind => &$jsOffer)
		{
			$offerIds[] = (int)$jsOffer['ID'];
			$offerCodes[] = $jsOffer['CODE'];

			$fullOffer = $arResult['OFFERS'][$ind];
			$measureName = $fullOffer['ITEM_MEASURE']['TITLE'];

			$strAllProps = '';
			$strMainProps = '';
			$strPriceRangesRatio = '';
			$strPriceRanges = '';

			if ($arResult['SHOW_OFFERS_PROPS'])
			{
				if (!empty($jsOffer['DISPLAY_PROPERTIES']))
				{
					foreach ($jsOffer['DISPLAY_PROPERTIES'] as $property)
					{
						$current = '<li class="product-item-detail-properties-item">
					<span class="product-item-detail-properties-name">'.$property['NAME'].'</span>
					<span class="product-item-detail-properties-dots"></span>
					<span class="product-item-detail-properties-value">'.(
							is_array($property['VALUE'])
								? implode(' / ', $property['VALUE'])
								: $property['VALUE']
							).'</span></li>';
						$strAllProps .= $current;

						if (isset($arParams['MAIN_BLOCK_OFFERS_PROPERTY_CODE'][$property['CODE']]))
						{
							$strMainProps .= $current;
						}
					}

					unset($current);
				}
			}

			if ($arParams['USE_PRICE_COUNT'] && count($jsOffer['ITEM_QUANTITY_RANGES']) > 1)
			{
				$strPriceRangesRatio = '('.Loc::getMessage(
						'CT_BCE_CATALOG_RATIO_PRICE',
						array('#RATIO#' => ($useRatio
								? $fullOffer['ITEM_MEASURE_RATIOS'][$fullOffer['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']
								: '1'
							).' '.$measureName)
					).')';

				foreach ($jsOffer['ITEM_QUANTITY_RANGES'] as $range)
				{
					if ($range['HASH'] !== 'ZERO-INF')
					{
						$itemPrice = false;

						foreach ($jsOffer['ITEM_PRICES'] as $itemPrice)
						{
							if ($itemPrice['QUANTITY_HASH'] === $range['HASH'])
							{
								break;
							}
						}

						if ($itemPrice)
						{
							$strPriceRanges .= '<div class="element__special-item">';
							$tmptext = Loc::getMessage('CT_BCE_CATALOG_RANGE_FROM',array('#FROM#' => $range['SORT_FROM'].' '.$measureName));
							if ($tmptext != 'от 0 шт'){
								$strPriceRanges .= '<p>'.Loc::getMessage(
										'CT_BCE_CATALOG_RANGE_FROM',
										array('#FROM#' => $range['SORT_FROM'].' '.$measureName)
									).' ';
							} else {
								$strPriceRanges .= '<p>';
							}
							if (is_infinite($range['SORT_TO']))
							{
								$strPriceRanges .= Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
							}
							else
							{
								$strPriceRanges .= Loc::getMessage(
									'CT_BCE_CATALOG_RANGE_TO',
									array('#TO#' => $range['SORT_TO'].' '.$measureName)
								);
							}

							$strPriceRanges .= '</p><p>'.($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE']).'</p>';
							$strPriceRanges .= '</div>';
						}
					}
				}

				unset($range, $itemPrice);
			}

			$jsOffer['DISPLAY_PROPERTIES'] = $strAllProps;
			$jsOffer['DISPLAY_PROPERTIES_MAIN_BLOCK'] = $strMainProps;
			$jsOffer['PRICE_RANGES_RATIO_HTML'] = $strPriceRangesRatio;
			$jsOffer['PRICE_RANGES_HTML'] = $strPriceRanges;
		}

		$templateData['OFFER_IDS'] = $offerIds;
		$templateData['OFFER_CODES'] = $offerCodes;
		unset($jsOffer, $strAllProps, $strMainProps, $strPriceRanges, $strPriceRangesRatio, $useRatio);

		$jsParams = array(
			'CONFIG' => array(
				'USE_CATALOG' => $arResult['CATALOG'],
				'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
				'SHOW_PRICE' => true,
				'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
				'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
				'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
				'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
				'SHOW_SKU_PROPS' => 'Y',
				'OFFER_GROUP' => $arResult['OFFER_GROUP'],
				'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
				'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
				'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
				'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
				'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
				'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
				'USE_STICKERS' => true,
				'USE_SUBSCRIBE' => $showSubscribe,
				'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
				'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
				'ALT' => $alt,
				'TITLE' => $title,
				'MAGNIFIER_ZOOM_PERCENT' => 200,
				'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
				'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
				'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
					? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
					: null
			),
			'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
			'VISUAL' => $itemIds,
			'DEFAULT_PICTURE' => array(
				'PREVIEW_PICTURE' => $arResult['DEFAULT_PICTURE'],
				'DETAIL_PICTURE' => $arResult['DEFAULT_PICTURE']
			),
			'PRODUCT' => array(
				'ID' => $arResult['ID'],
				'ACTIVE' => $arResult['ACTIVE'],
				'NAME' => $arResult['~NAME'],
				'CATEGORY' => $arResult['CATEGORY_PATH']
			),
			'BASKET' => array(
				'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
				'BASKET_URL' => $arParams['BASKET_URL'],
				'SKU_PROPS' => $arResult['OFFERS_PROP_CODES'],
				'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
				'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
			),
			'OFFERS' => $arResult['JS_OFFERS'],
			'OFFER_SELECTED' => $arResult['OFFERS_SELECTED'],
			'TREE_PROPS' => $skuProps
		);
	}
	else
	{
		$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
		if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !$emptyProductProperties)
		{
			?>
			<div id="<?=$itemIds['BASKET_PROP_DIV']?>" style="display: none;">
				<?
				if (!empty($arResult['PRODUCT_PROPERTIES_FILL']))
				{
					foreach ($arResult['PRODUCT_PROPERTIES_FILL'] as $propId => $propInfo)
					{
						?>
						<input type="hidden" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]" value="<?=htmlspecialcharsbx($propInfo['ID'])?>">
						<?
						unset($arResult['PRODUCT_PROPERTIES'][$propId]);
					}
				}

				$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
				if (!$emptyProductProperties)
				{
					?>
					<table>
						<?
						foreach ($arResult['PRODUCT_PROPERTIES'] as $propId => $propInfo)
						{
							?>
							<tr>
								<td><?=$arResult['PROPERTIES'][$propId]['NAME']?></td>
								<td>
									<?
									if (
										$arResult['PROPERTIES'][$propId]['PROPERTY_TYPE'] === 'L'
										&& $arResult['PROPERTIES'][$propId]['LIST_TYPE'] === 'C'
									)
									{
										foreach ($propInfo['VALUES'] as $valueId => $value)
										{
											?>
											<label>
												<input type="radio" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]"
													value="<?=$valueId?>" <?=($valueId == $propInfo['SELECTED'] ? '"checked"' : '')?>>
												<?=$value?>
											</label>
											<br>
											<?
										}
									}
									else
									{
										?>
										<select name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]">
											<?
											foreach ($propInfo['VALUES'] as $valueId => $value)
											{
												?>
												<option value="<?=$valueId?>" <?=($valueId == $propInfo['SELECTED'] ? '"selected"' : '')?>>
													<?=$value?>
												</option>
												<?
											}
											?>
										</select>
										<?
									}
									?>
								</td>
							</tr>
							<?
						}
						?>
					</table>
					<?
				}
				?>
			</div>
			<?
		}

		$jsParams = array(
			'CONFIG' => array(
				'USE_CATALOG' => $arResult['CATALOG'],
				'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
				'SHOW_PRICE' => !empty($arResult['ITEM_PRICES']),
				'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
				'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
				'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
				'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
				'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
				'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
				'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
				'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
				'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
				'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
				'USE_STICKERS' => true,
				'USE_SUBSCRIBE' => $showSubscribe,
				'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
				'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
				'ALT' => $alt,
				'TITLE' => $title,
				'MAGNIFIER_ZOOM_PERCENT' => 200,
				'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
				'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
				'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
					? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
					: null
			),
			'VISUAL' => $itemIds,
			'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
			'PRODUCT' => array(
				'ID' => $arResult['ID'],
				'ACTIVE' => $arResult['ACTIVE'],
				'PICT' => reset($arResult['MORE_PHOTO']),
				'NAME' => $arResult['~NAME'],
				'SUBSCRIPTION' => true,
				'ITEM_PRICE_MODE' => $arResult['ITEM_PRICE_MODE'],
				'ITEM_PRICES' => $arResult['ITEM_PRICES'],
				'ITEM_PRICE_SELECTED' => $arResult['ITEM_PRICE_SELECTED'],
				'ITEM_QUANTITY_RANGES' => $arResult['ITEM_QUANTITY_RANGES'],
				'ITEM_QUANTITY_RANGE_SELECTED' => $arResult['ITEM_QUANTITY_RANGE_SELECTED'],
				'ITEM_MEASURE_RATIOS' => $arResult['ITEM_MEASURE_RATIOS'],
				'ITEM_MEASURE_RATIO_SELECTED' => $arResult['ITEM_MEASURE_RATIO_SELECTED'],
				'SLIDER_COUNT' => $arResult['MORE_PHOTO_COUNT'],
				'SLIDER' => $arResult['MORE_PHOTO'],
				'CAN_BUY' => $arResult['CAN_BUY'],
				'CHECK_QUANTITY' => $arResult['CHECK_QUANTITY'],
				'QUANTITY_FLOAT' => is_float($arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']),
				'MAX_QUANTITY' => $arResult['PRODUCT']['QUANTITY'],
				'STEP_QUANTITY' => $arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'],
				'CATEGORY' => $arResult['CATEGORY_PATH']
			),
			'BASKET' => array(
				'ADD_PROPS' => $arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y',
				'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
				'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
				'EMPTY_PROPS' => $emptyProductProperties,
				'BASKET_URL' => $arParams['BASKET_URL'],
				'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
				'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
			)
		);
		unset($emptyProductProperties);
	}

	if ($arParams['DISPLAY_COMPARE'])
	{
		$jsParams['COMPARE'] = array(
			'COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
			'COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
			'COMPARE_PATH' => $arParams['COMPARE_PATH']
		);
	}
	?>
</div>
<script>
	BX.message({
		ECONOMY_INFO_MESSAGE: '<?=GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO2')?>',
		TITLE_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR')?>',
		TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS')?>',
		BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR')?>',
		BTN_SEND_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS')?>',
		BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
		BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE')?>',
		BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
		TITLE_SUCCESSFUL: '<?=GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK')?>',
		COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK')?>',
		COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
		COMPARE_TITLE: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE')?>',
		BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
		PRODUCT_GIFT_LABEL: '<?=GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL')?>',
		PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_PRICE_TOTAL_PREFIX')?>',
		RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
		RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
		SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
	});

	var <?=$obName?> = new JCCatalogElement(<?=CUtil::PhpToJSObject($jsParams, false, true)?>);
</script>
<?
unset($actualItem, $itemIds, $jsParams);
