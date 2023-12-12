<?
define("HIDE_SIDEBAR", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Редактирование SEO каталога");
global $USER;
if ($USER->IsAuthorized()):
?>
<?
$APPLICATION->IncludeComponent(
	"bitrix:catalog",
	"seo",
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "2",
		"TEMPLATE_THEME" => "site",
		"HIDE_NOT_AVAILABLE" => "N",
		"BASKET_URL" => "/shop/cart/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/cat/seo/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "Y",
		"ADD_SECTION_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "Y",
		"SET_STATUS_404" => "Y",
		"DETAIL_DISPLAY_NAME" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "",
		"FILTER_VIEW_MODE" => "VERTICAL",
		"USE_COMPARE" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"USE_PRICE_COUNT" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"USE_PRODUCT_QUANTITY" => "Y",
		"CONVERT_CURRENCY" => "N",
		"QUANTITY_FLOAT" => "N",
		"OFFERS_CART_PROPERTIES" => array(
			0 => "YEAR",
			1 => "SIZE",
			2 => "UPAK",
		),
		"SHOW_TOP_ELEMENTS" => "N",
		"SECTION_COUNT_ELEMENTS" => "N",
		"SECTION_TOP_DEPTH" => "1",
		"SECTIONS_VIEW_MODE" => "TILE",
		"SECTIONS_SHOW_PARENT_NAME" => "N",
		"PAGE_ELEMENT_COUNT" => "15",
		"LINE_ELEMENT_COUNT" => "12",
		"ELEMENT_SORT_FIELD" => "desc",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"LIST_PROPERTY_CODE" => array(
			0 => "ZAKAZ",
			1 => "",
		),
		"INCLUDE_SUBSECTIONS" => "Y",
		"LIST_META_KEYWORDS" => "UF_KEYWORDS",
		"LIST_META_DESCRIPTION" => "UF_META_DESCRIPTION",
		"LIST_BROWSER_TITLE" => "UF_BROWSER_TITLE",
		"LIST_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_PICTURE",
			3 => "",
		),
		"LIST_OFFERS_PROPERTY_CODE" => array(
			0 => "YEAR",
			1 => "SIZE",
			2 => "UPAK",
			3 => "MORE_PHOTO",
			4 => "ZAKAZ",
			5 => "",
		),
		"LIST_OFFERS_LIMIT" => "10",
		"SECTION_BACKGROUND_IMAGE" => "UF_BACKGROUND_IMAGE",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "NEWPRODUCT",
			1 => "HEIGHT",
			2 => "CONTAIN",
			3 => "FLOWERS",
			4 => "DIAMETR",
			5 => "MANUFACTURER",
			6 => "MATERIAL",
			7 => "",
		),
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "",
		),
		"DETAIL_OFFERS_PROPERTY_CODE" => array(
			0 => "YEAR",
			1 => "SIZE",
			2 => "UPAK",
			3 => "",
		),
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_IBLOCK_ID" => "",
		"LINK_PROPERTY_SID" => "",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"USE_ALSO_BUY" => "Y",
		"ALSO_BUY_ELEMENT_COUNT" => "4",
		"ALSO_BUY_MIN_BUYES" => "1",
		"OFFERS_SORT_FIELD" => "SCALED_PRICE_1",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "sort",
		"OFFERS_SORT_ORDER2" => "asc",
		"PAGER_TEMPLATE" => "round",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
		"PAGER_SHOW_ALL" => "N",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"LABEL_PROP" => array(
			0 => "NEWPRODUCT",
		),
		"PRODUCT_DISPLAY_MODE" => "Y",
		"OFFER_ADD_PICT_PROP" => "-",
		"OFFER_TREE_PROPS" => array(
			0 => "UPAK",
			1 => "SIZE",
			2 => "YEAR",
		),
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "Y",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"DETAIL_USE_VOTE_RATING" => "Y",
		"DETAIL_VOTE_DISPLAY_AS_RATING" => "rating",
		"DETAIL_USE_COMMENTS" => "Y",
		"DETAIL_BLOG_USE" => "Y",
		"DETAIL_VK_USE" => "N",
		"DETAIL_FB_USE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"USE_STORE" => "Y",
		"BIG_DATA_RCM_TYPE" => "personal",
		"FIELDS" => array(
			0 => "SCHEDULE",
			1 => "STORE",
			2 => "",
		),
		"USE_MIN_AMOUNT" => "N",
		"STORE_PATH" => "/store/#store_id#",
		"MAIN_TITLE" => "Наличие на складах",
		"MIN_AMOUNT" => "10",
		"DETAIL_BRAND_USE" => "Y",
		"DETAIL_BRAND_PROP_CODE" => array(
			0 => "",
			1 => "BRAND_REF",
			2 => "",
		),
		"COMPATIBLE_MODE" => "N",
		"SIDEBAR_SECTION_SHOW" => "N",
		"SIDEBAR_DETAIL_SHOW" => "N",
		"SIDEBAR_PATH" => "/catalog/sidebar.php",
		"COMPONENT_TEMPLATE" => "lavender",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"LABEL_PROP_MOBILE" => array(
		),
		"LABEL_PROP_POSITION" => "top-left",
		"COMMON_SHOW_CLOSE_POPUP" => "Y",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"DISCOUNT_PERCENT_POSITION" => "bottom-right",
		"SHOW_MAX_QUANTITY" => "N",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"SIDEBAR_SECTION_POSITION" => "right",
		"SIDEBAR_DETAIL_POSITION" => "right",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"SET_LAST_MODIFIED" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"USE_SALE_BESTSELLERS" => "Y",
		"FILTER_HIDE_ON_MOBILE" => "N",
		"INSTANT_RELOAD" => "Y",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
		"COMMON_ADD_TO_BASKET_ACTION" => "ADD",
		"TOP_ADD_TO_BASKET_ACTION" => "ADD",
		"SECTION_ADD_TO_BASKET_ACTION" => "ADD",
		"DETAIL_ADD_TO_BASKET_ACTION" => array(
			0 => "ADD",
		),
		"DETAIL_ADD_TO_BASKET_ACTION_PRIMARY" => array(
		),
		"SEARCH_PAGE_RESULT_COUNT" => "50",
		"SEARCH_RESTART" => "N",
		"SEARCH_NO_WORD_LOGIC" => "Y",
		"SEARCH_USE_LANGUAGE_GUESS" => "Y",
		"SEARCH_CHECK_DATES" => "Y",
		"SECTIONS_HIDE_SECTION_NAME" => "N",
		"LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"LIST_ENLARGE_PRODUCT" => "STRICT",
		"LIST_SHOW_SLIDER" => "N",
		"LIST_SLIDER_INTERVAL" => "3000",
		"LIST_SLIDER_PROGRESS" => "N",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"SHOW_DEACTIVATED" => "Y",
		"DETAIL_MAIN_BLOCK_PROPERTY_CODE" => array(
		),
		"DETAIL_BLOG_URL" => "catalog_comments",
		"DETAIL_BLOG_EMAIL_NOTIFY" => "N",
		"DETAIL_FB_APP_ID" => "",
		"DETAIL_IMAGE_RESOLUTION" => "16by9",
		"DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
		"DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
		"DETAIL_SHOW_SLIDER" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => array(
			0 => "POPUP",
			1 => "MAGNIFIER",
		),
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"MESS_PRICE_RANGES_TITLE" => "Цены",
		"MESS_DESCRIPTION_TAB" => "Описание",
		"MESS_PROPERTIES_TAB" => "Характеристики",
		"MESS_COMMENTS_TAB" => "Комментарии",
		"DETAIL_SHOW_POPULAR" => "Y",
		"DETAIL_SHOW_VIEWED" => "Y",
		"USE_GIFTS_DETAIL" => "Y",
		"USE_GIFTS_SECTION" => "Y",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
		"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"STORES" => array(
			0 => "",
			1 => "",
		),
		"USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SHOW_EMPTY_STORE" => "Y",
		"SHOW_GENERAL_STORE_INFORMATION" => "N",
		"USE_BIG_DATA" => "Y",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"LAZY_LOAD" => "Y",
		"LOAD_ON_SCROLL" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",
		"LIST_PROPERTY_CODE_MOBILE" => array(
		),
		"DETAIL_MAIN_BLOCK_OFFERS_PROPERTY_CODE" => array(
			0 => "YEAR",
			1 => "SIZE",
			2 => "UPAK",
		),
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE#/",
			"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
			"compare" => "compare/",
			"smart_filter" => "#SECTION_CODE#/filter/#SMART_FILTER_PATH#/apply/",
		)
	),
	false
);?>
<div class="popup-answer">
	<div class="popup-answer__inner">
		<div class="popup-answer__close"></div>
		<div class="popup-answer__answer">
		</div>
	</div>
</div>
<style>
	.popup-answer {
		position: fixed;
		top: 0;
		left: 0;
		width: 100vw;
		height: 100vh;
		background: rgba(0,0,0,.5);
		z-index: 999;
		display: none;
	}
	.popup-answer__inner {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
	}
	.popup-answer__close {
		position: absolute;
		top: 20px;
		right: 10px;
		width: 20px;
		height: 20px;
		cursor: pointer;
	}
	.popup-answer__close::before,
	.popup-answer__close::after {
		content: '';
		width: 20px;
		height: 2px;
		background: #fff;
		display: block;
		position: absolute;
		left: 0
		top: 9px;
		transform: rotate(45deg);
	}
	.popup-answer__close::after {
		transform: rotate(-45deg);
	}
	.popup-answer .reds {
		padding: 30px;
		background: red;
		color: #fff;
		text-align: center;
		font-size: 18px;
	}
	.popup-answer .greens {
		padding: 50px;
		background: green;
		color: #fff;
		text-align: center;
		font-size: 18px;
	}
	.seo-item {
		border: 2px solid var(--accent);
		border-radius: 5px;
		padding: 20px;
	}
	.seo-item__grid {
		display: grid;
		grid-template-columns: 1fr 4fr;
		grid-gap: 20px;
		align-items: flex-start;
	}
	.seo-item__img {
		border-radius: 5px;
		height: 220px;
		overflow: hidden;
		position: relative;
	}
	.seo-item__img img {
		object-fit: cover;
		display: block;
		height: 100%;
		width: auto;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		transition: opacity .5s;
	}
	.seo-item__img .seo-item__img-2 {
		opacity: 0;
	}
	.seo-item__img:hover .seo-item__img-1 {
		opacity: 0;
	}
	.seo-item__img:hover .seo-item__img-2 {
		opacity: 1;
	}
	.add-wrap__input-col {
		display: grid;
		grid-template-columns: 1fr;
		grid-gap: 20px;
	}
	.add-wrap__input {
		position: relative;
	}
	.add-wrap__input span {
		position: absolute;
		left: 10px;
		background: #fff;
		padding: 1px 5px;
		top: 11px;
		transition: .2s;
		color: #999;
		pointer-events: none;
	}
	.add-wrap__input input,
	.add-wrap__input textarea  {
		width: 100%;
		height: 40px;
		display: block;
		border: 1px solid #aaa;
		border-radius: 5px;
		padding: 0 10px;
		font-family: inherit;
	}
	.add-wrap__input textarea {
		padding: 15px 10px;
	}
	.add-wrap__input textarea {
		height: 100px;
	}
	.add-wrap__input .error {
		border-color: red;
	}
	.add-wrap__input input:focus,
	.add-wrap__input textarea:focus {
		border: 1px solid var(--accent) !important;
	}
	.add-wrap__input input:focus + span,
	.add-wrap__input textarea:focus + span,
	.add-wrap__input .filled + span {
		transform: translateY(-20px);
	}
	.seo-item__left .btn {
		margin: 20px 0 0 !important;
		height: 40px;
		width: 100%;
	}
	.edit-status {
		display: flex;
		margin-top: 33px;
		align-items: center;
		color: #aaa;
	}
	.edit-status.changed {
		color: red;
	}
	.edit-status.saved {
		color: green;
	}
	.edit-status span {
		display: block;
		width: 10px;
		height: 10px;
		border-radius: 50%;
		background: #aaa;
		margin-right: 10px;
	}
	.edit-status.changed span {
		background: red;
	}
	.edit-status.saved span {
		background: green;
	}
	.btn--return.disabled {
		opacity: .5;
		pointer-events: none;
	}
	.seo-item__count {
		position: absolute;
		background: #eee;
		border-radius: 50%;
		width: 20px;
		height: 20px;
		display: flex;
		bottom: -5px;
		right: -5px;
		font-size: 11px;
		align-items: center;
		justify-content: center;
	}
</style>
<script>

	$('.popup-answer__close').click(function(){
		$('.popup-answer').fadeOut();
	});

	var inputChanged;

	$('.add-wrap__input input, .add-wrap__input textarea').keyup(function(){
		$(this).parent().find('.seo-item__count').text($(this).val().length);
	});

	$(document).on('change',".add-wrap__input input, .add-wrap__input textarea", function () {

		$(this).removeClass('error');

		if ($(this).val()!=''){
			$(this).addClass('filled');
		} else {
			$(this).removeClass('filled');
		}

		inputChanged = false;

		$(this).parent().parent().find('input[type="text"], textarea').each(function(){
			if ($(this).val() != $(this).attr('data-old')){
				inputChanged = true;
				return;
			}
		});

		$(this).parent().parent().parent().parent().find('.edit-status').removeClass('saved');

		if (inputChanged){
			$(this).parent().parent().parent().parent().find('.edit-status').addClass('changed');
			$(this).parent().parent().parent().parent().find('.edit-status').html('<span></span> Изменено');
			$('.btn--return').removeClass('disabled');
		} else {
			$(this).parent().parent().parent().parent().find('.edit-status').removeClass('changed');
			$(this).parent().parent().parent().parent().find('.edit-status').html('<span></span> Не изменялось');
			$('.btn--return').addClass('disabled');
		}

	});

	$('.btn--return').click(function(){
		$(this).parent().parent().find('input, textarea').each(function(){
			$(this).val($(this).data('old'));
			$(this).addClass('filled');
			$(this).parent().parent().parent().parent().find('.edit-status').removeClass('changed');
			$(this).parent().parent().parent().parent().find('.edit-status').html('<span></span> Не изменялось');
			$('.btn--return').addClass('disabled');
			$(this).removeClass('error');
			$(this).removeClass('saved');
		});
	});

	$('.seo-item').submit(function(e){
		e.preventDefault();
		var send = true;
		if ($(this).find('.input-code').val()==''){
			send = false;
			$(this).find('.input-code').addClass('error');
		}
		if ($(this).find('.input-name').val()==''){
			send = false;
			$(this).find('.input-name').addClass('error');
		}
		if (send){
			var seoItem = $(this).parent();
			if (seoItem.find('.edit-status').hasClass('changed')){
				var formData = $(this).serialize();
				$.ajax({
					url: "/ajax/edit-seo.php",
					data: formData,
					type: "POST",
					dataType: 'text',
					success: function(msg) {
						if (msg=='ok'){
							seoItem.find('.edit-status').addClass('changed');
							seoItem.find('.edit-status').addClass('saved');
							seoItem.find('.edit-status').html('<span></span> Сохранено');
							seoItem.find('input, textarea').each(function(){
								$(this).data('old',$(this).val());
							});
							$('.btn--return').addClass('disabled');
						}
					}
				});
			}
		}
	});
</script>
<?endif;?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
