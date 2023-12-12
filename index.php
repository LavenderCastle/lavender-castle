<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Магазины необычных букетов и композиции в Москве и России - Лавандовый Замок");
$APPLICATION->SetPageProperty("description",  "❀ Флористическая студия необычных, долговечных букетов и подарков из цветов, высушенных ☀ - м.Ботанический Сад ☎ (495) 532-7357 Звони!");
?>
<?
$APPLICATION->IncludeComponent(
  "bitrix:news.list",
  "homeslider",
  Array(
  	"ACTIVE_DATE_FORMAT" => "d.m.Y",
  	"ADD_SECTIONS_CHAIN" => "N",
  	"AJAX_MODE" => "N",
  	"AJAX_OPTION_ADDITIONAL" => "",
  	"AJAX_OPTION_HISTORY" => "N",
  	"AJAX_OPTION_JUMP" => "N",
  	"AJAX_OPTION_STYLE" => "Y",
  	"CACHE_FILTER" => "N",
  	"CACHE_GROUPS" => "Y",
  	"CACHE_TIME" => "360000000",
    "CACHE_TYPE" => "A",
    "CHECK_DATES" => "Y",
    "SECTION_ID" => "",
    "SECTION_CODE" => "",
    "DETAIL_URL" => "",
    "DISPLAY_BOTTOM_PAGER" => "Y",
    "DISPLAY_DATE" => "Y",
    "DISPLAY_NAME" => "Y",
    "DISPLAY_PICTURE" => "Y",
    "DISPLAY_PREVIEW_TEXT" => "Y",
    "DISPLAY_TOP_PAGER" => "N",
    "FIELD_CODE" => array("",""),
    "FILTER_NAME" => "",
    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
    "IBLOCK_ID" => "4",
    "IBLOCK_TYPE" => "content",
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
    "INCLUDE_SUBSECTIONS" => "Y",
    "MESSAGE_404" => "",
    "NEWS_COUNT" => "10",
    "PAGER_BASE_LINK_ENABLE" => "N",
    "PAGER_DESC_NUMBERING" => "N",
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "1",
    "PAGER_SHOW_ALL" => "N",
    "PAGER_SHOW_ALWAYS" => "N",
    "PAGER_TEMPLATE" => ".default",
    "PAGER_TITLE" => "Новости",
    "PARENT_SECTION" => "",
    "PARENT_SECTION_CODE" => "",
    "PREVIEW_TRUNCATE_LEN" => "",
    "PROPERTY_CODE" => array("link","btn"),
    "SET_BROWSER_TITLE" => "N",
    "SET_LAST_MODIFIED" => "N",
    "SET_META_DESCRIPTION" => "N",
    "SET_META_KEYWORDS" => "N",
    "SET_STATUS_404" => "N",
    "SET_TITLE" => "N",
    "SHOW_404" => "N",
    "SORT_BY1" => "sort",
    "SORT_BY2" => "created",
    "SORT_ORDER1" => "ASC",
    "SORT_ORDER2" => "DESC",
    "STRICT_SECTION_CHECK" => "N"
));?>
<?
$APPLICATION->IncludeComponent(
  "bitrix:news.list",
  "triggers",
  Array(
  	"ACTIVE_DATE_FORMAT" => "d.m.Y",
  	"ADD_SECTIONS_CHAIN" => "N",
  	"AJAX_MODE" => "N",
  	"AJAX_OPTION_ADDITIONAL" => "",
  	"AJAX_OPTION_HISTORY" => "N",
  	"AJAX_OPTION_JUMP" => "N",
  	"AJAX_OPTION_STYLE" => "Y",
  	"CACHE_FILTER" => "N",
  	"CACHE_GROUPS" => "Y",
  	"CACHE_TIME" => "360000000",
    "CACHE_TYPE" => "A",
    "CHECK_DATES" => "Y",
    "SECTION_ID" => "",
    "SECTION_CODE" => "",
    "DETAIL_URL" => "",
    "DISPLAY_BOTTOM_PAGER" => "Y",
    "DISPLAY_DATE" => "Y",
    "DISPLAY_NAME" => "Y",
    "DISPLAY_PICTURE" => "Y",
    "DISPLAY_PREVIEW_TEXT" => "Y",
    "DISPLAY_TOP_PAGER" => "N",
    "FIELD_CODE" => array("",""),
    "FILTER_NAME" => "",
    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
    "IBLOCK_ID" => "5",
    "IBLOCK_TYPE" => "content",
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
    "INCLUDE_SUBSECTIONS" => "Y",
    "MESSAGE_404" => "",
    "NEWS_COUNT" => "4",
    "PAGER_BASE_LINK_ENABLE" => "N",
    "PAGER_DESC_NUMBERING" => "N",
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "1",
    "PAGER_SHOW_ALL" => "N",
    "PAGER_SHOW_ALWAYS" => "N",
    "PAGER_TEMPLATE" => ".default",
    "PAGER_TITLE" => "Новости",
    "PARENT_SECTION" => "",
    "PARENT_SECTION_CODE" => "",
    "PREVIEW_TRUNCATE_LEN" => "",
    "PROPERTY_CODE" => array("icon"),
    "SET_BROWSER_TITLE" => "N",
    "SET_LAST_MODIFIED" => "N",
    "SET_META_DESCRIPTION" => "N",
    "SET_META_KEYWORDS" => "N",
    "SET_STATUS_404" => "N",
    "SET_TITLE" => "N",
    "SHOW_404" => "N",
    "SORT_BY1" => "sort",
    "SORT_BY2" => "created",
    "SORT_ORDER1" => "ASC",
    "SORT_ORDER2" => "DESC",
    "STRICT_SECTION_CHECK" => "N"
));?>
<section class="section section--gray categories">
            <div class="container">
                <h1 class="section-caption">Необычные букеты из сухоцветов</h1>
                <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list","home-sections",
                  Array(
                          "VIEW_MODE" => "TEXT",
                          "SHOW_PARENT_NAME" => "Y",
                          "IBLOCK_TYPE" => "catalog",
                          "IBLOCK_ID" => "2",
                          "SECTION_ID" => "",
                          "SECTION_CODE" => "",
                          "SECTION_URL" => "",
                          "COUNT_ELEMENTS" => "Y",
                          "TOP_DEPTH" => "1",
                          "SECTION_FIELDS" => "",
                          "SECTION_USER_FIELDS" => "",
                          "ADD_SECTIONS_CHAIN" => "Y",
                          "CACHE_TYPE" => "A",
                          "CACHE_TIME" => "36000000",
                          "CACHE_NOTES" => "",
                          "CACHE_GROUPS" => "Y"
                      )
                  );?>
            </div>
</section>
<section class="section offers">
            <div class="container">
                <h2 class="section-caption">Лучшие предложения</h2>
                <div class="offers__top">
                    <div class="offers__tabs">
                      <a class="active">Хиты</a>
                      <a>Новинки</a>
                      <a>Рекомендуем</a>
                    </div>
                    <a class="offers__all" href="/shop">Весь каталог</a>
                </div>
                  <div class="offers__tab-content active">
                    <?
                    $tabFilter = Array('!PROPERTY_SALELEADER'=>false);
                    $APPLICATION->IncludeComponent(
    								"bitrix:catalog.section",
    								"offers",
    								array(
    									"IBLOCK_TYPE_ID" => "catalog",
    									"IBLOCK_ID" => "2",
    									"BASKET_URL" => "/shop/cart/",
    									"COMPONENT_TEMPLATE" => "",
    									"IBLOCK_TYPE" => "catalog",
    									"SECTION_ID" => "",
    									"SECTION_CODE" => "",
    									"SECTION_USER_FIELDS" => array(
    										0 => "",
    										1 => "",
    									),
    									"ELEMENT_SORT_FIELD" => "rand",
    									"ELEMENT_SORT_ORDER" => "desc",
    									"ELEMENT_SORT_FIELD2" => "property_sale_percent",
    									"ELEMENT_SORT_ORDER2" => "desc",
    									"FILTER_NAME" => "tabFilter",
    									"INCLUDE_SUBSECTIONS" => "Y",
    									"SHOW_ALL_WO_SECTION" => "Y",
    									"HIDE_NOT_AVAILABLE" => "Y",
    									"PAGE_ELEMENT_COUNT" => "12",
    									"LINE_ELEMENT_COUNT" => "4",
    									"PROPERTY_CODE" => array(
    									),
    									"OFFERS_FIELD_CODE" => array(
    										0 => "",
    										1 => "",
    									),
    									"OFFERS_PROPERTY_CODE" => array(
    										0 => "COLOR_REF",
    										1 => "SIZES_SHOES",
    										2 => "SIZES_CLOTHES",
    										3 => "",
    									),
    									"OFFERS_SORT_FIELD" => "sort",
    									"OFFERS_SORT_ORDER" => "desc",
    									"OFFERS_SORT_FIELD2" => "id",
    									"OFFERS_SORT_ORDER2" => "desc",
    									"TEMPLATE_THEME" => "site",
    									"PRODUCT_DISPLAY_MODE" => "Y",
    									"ADD_PICT_PROP" => "gallery",
    									"LABEL_PROP" => array(
    										0 => "NEWPRODUCT"
    									),
    									"OFFER_ADD_PICT_PROP" => "-",
    									"OFFER_TREE_PROPS" => array(
    										0 => "COLOR_REF",
    										1 => "SIZES_SHOES",
    										2 => "SIZES_CLOTHES",
    									),
    									"PRODUCT_SUBSCRIPTION" => "N",
    									"SHOW_DISCOUNT_PERCENT" => "N",
    									"SHOW_OLD_PRICE" => "Y",
    									"SHOW_CLOSE_POPUP" => "Y",
    									"MESS_BTN_BUY" => "Купить",
    									"MESS_BTN_ADD_TO_BASKET" => "В корзину",
    									"MESS_BTN_SUBSCRIBE" => "Подписаться",
    									"MESS_BTN_DETAIL" => "Подробнее",
    									"MESS_NOT_AVAILABLE" => "Нет в наличии",
    									"SECTION_URL" => "",
    									"DETAIL_URL" => "",
    									"SECTION_ID_VARIABLE" => "SECTION_ID",
    									"SEF_MODE" => "N",
    									"AJAX_MODE" => "N",
    									"AJAX_OPTION_JUMP" => "N",
    									"AJAX_OPTION_STYLE" => "Y",
    									"AJAX_OPTION_HISTORY" => "N",
    									"AJAX_OPTION_ADDITIONAL" => "",
    									"CACHE_TYPE" => "A",
    									"CACHE_TIME" => "0",
    									"CACHE_GROUPS" => "Y",
    									"SET_TITLE" => "N",
    									"SET_BROWSER_TITLE" => "N",
    									"BROWSER_TITLE" => "-",
    									"SET_META_KEYWORDS" => "Y",
    									"META_KEYWORDS" => "-",
    									"SET_META_DESCRIPTION" => "Y",
    									"META_DESCRIPTION" => "-",
    									"SET_LAST_MODIFIED" => "N",
    									"USE_MAIN_ELEMENT_SECTION" => "N",
    									"ADD_SECTIONS_CHAIN" => "N",
    									"CACHE_FILTER" => "N",
    									"ACTION_VARIABLE" => "action",
    									"PRODUCT_ID_VARIABLE" => "id",
    									"PRICE_CODE" => array(
    										0 => "BASE",
    									),
    									"USE_PRICE_COUNT" => "N",
    									"SHOW_PRICE_COUNT" => "1",
    									"PRICE_VAT_INCLUDE" => "Y",
    									"CONVERT_CURRENCY" => "N",
    									"USE_PRODUCT_QUANTITY" => "N",
    									"PRODUCT_QUANTITY_VARIABLE" => "",
    									"ADD_PROPERTIES_TO_BASKET" => "Y",
    									"PRODUCT_PROPS_VARIABLE" => "prop",
    									"PARTIAL_PRODUCT_PROPERTIES" => "N",
    									"PRODUCT_PROPERTIES" => array(
    									),
    									"OFFERS_CART_PROPERTIES" => array(
    										0 => "COLOR_REF",
    										1 => "SIZES_SHOES",
    										2 => "SIZES_CLOTHES",
    									),
    									"ADD_TO_BASKET_ACTION" => "ADD",
    									"PAGER_TEMPLATE" => "round",
    									"DISPLAY_TOP_PAGER" => "N",
    									"DISPLAY_BOTTOM_PAGER" => "N",
    									"PAGER_TITLE" => "Выгодные предложения",
    									"PAGER_SHOW_ALWAYS" => "N",
    									"PAGER_DESC_NUMBERING" => "N",
    									"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
    									"PAGER_SHOW_ALL" => "N",
    									"PAGER_BASE_LINK_ENABLE" => "N",
    									"SET_STATUS_404" => "N",
    									"SHOW_404" => "N",
    									"MESSAGE_404" => "",
    									"COMPATIBLE_MODE" => "N",
    								),
    								false
    							);?>
                  </div>
                  <div class="offers__tab-content">
                    <?
                    $tabFilter = Array('!PROPERTY_NEWPRODUCT'=>false);
                    $APPLICATION->IncludeComponent(
    								"bitrix:catalog.section",
    								"offers",
    								array(
    									"IBLOCK_TYPE_ID" => "catalog",
    									"IBLOCK_ID" => "2",
    									"BASKET_URL" => "/shop/cart/",
    									"COMPONENT_TEMPLATE" => "",
    									"IBLOCK_TYPE" => "catalog",
    									"SECTION_ID" => "",
    									"SECTION_CODE" => "",
    									"SECTION_USER_FIELDS" => array(
    										0 => "",
    										1 => "",
    									),
    									"ELEMENT_SORT_FIELD" => "rand",
    									"ELEMENT_SORT_ORDER" => "desc",
    									"ELEMENT_SORT_FIELD2" => "property_sale_percent",
    									"ELEMENT_SORT_ORDER2" => "desc",
    									"FILTER_NAME" => "tabFilter",
    									"INCLUDE_SUBSECTIONS" => "Y",
    									"SHOW_ALL_WO_SECTION" => "Y",
    									"HIDE_NOT_AVAILABLE" => "Y",
    									"PAGE_ELEMENT_COUNT" => "12",
    									"LINE_ELEMENT_COUNT" => "4",
    									"PROPERTY_CODE" => array(
    									),
    									"OFFERS_FIELD_CODE" => array(
    										0 => "",
    										1 => "",
    									),
    									"OFFERS_PROPERTY_CODE" => array(
    										0 => "COLOR_REF",
    										1 => "SIZES_SHOES",
    										2 => "SIZES_CLOTHES",
    										3 => "",
    									),
    									"OFFERS_SORT_FIELD" => "sort",
    									"OFFERS_SORT_ORDER" => "desc",
    									"OFFERS_SORT_FIELD2" => "id",
    									"OFFERS_SORT_ORDER2" => "desc",
    									"TEMPLATE_THEME" => "site",
    									"PRODUCT_DISPLAY_MODE" => "Y",
    									"ADD_PICT_PROP" => "gallery",
    									"LABEL_PROP" => array(
    										0 => "NEWPRODUCT"
    									),
    									"OFFER_ADD_PICT_PROP" => "-",
    									"OFFER_TREE_PROPS" => array(
    										0 => "COLOR_REF",
    										1 => "SIZES_SHOES",
    										2 => "SIZES_CLOTHES",
    									),
    									"PRODUCT_SUBSCRIPTION" => "N",
    									"SHOW_DISCOUNT_PERCENT" => "N",
    									"SHOW_OLD_PRICE" => "Y",
    									"SHOW_CLOSE_POPUP" => "Y",
    									"MESS_BTN_BUY" => "Купить",
    									"MESS_BTN_ADD_TO_BASKET" => "В корзину",
    									"MESS_BTN_SUBSCRIBE" => "Подписаться",
    									"MESS_BTN_DETAIL" => "Подробнее",
    									"MESS_NOT_AVAILABLE" => "Нет в наличии",
    									"SECTION_URL" => "",
    									"DETAIL_URL" => "",
    									"SECTION_ID_VARIABLE" => "SECTION_ID",
    									"SEF_MODE" => "N",
    									"AJAX_MODE" => "N",
    									"AJAX_OPTION_JUMP" => "N",
    									"AJAX_OPTION_STYLE" => "Y",
    									"AJAX_OPTION_HISTORY" => "N",
    									"AJAX_OPTION_ADDITIONAL" => "",
    									"CACHE_TYPE" => "A",
    									"CACHE_TIME" => "0",
    									"CACHE_GROUPS" => "Y",
    									"SET_TITLE" => "N",
    									"SET_BROWSER_TITLE" => "N",
    									"BROWSER_TITLE" => "-",
    									"SET_META_KEYWORDS" => "Y",
    									"META_KEYWORDS" => "-",
    									"SET_META_DESCRIPTION" => "Y",
    									"META_DESCRIPTION" => "-",
    									"SET_LAST_MODIFIED" => "N",
    									"USE_MAIN_ELEMENT_SECTION" => "N",
    									"ADD_SECTIONS_CHAIN" => "N",
    									"CACHE_FILTER" => "N",
    									"ACTION_VARIABLE" => "action",
    									"PRODUCT_ID_VARIABLE" => "id",
    									"PRICE_CODE" => array(
    										0 => "BASE",
    									),
    									"USE_PRICE_COUNT" => "N",
    									"SHOW_PRICE_COUNT" => "1",
    									"PRICE_VAT_INCLUDE" => "Y",
    									"CONVERT_CURRENCY" => "N",
    									"USE_PRODUCT_QUANTITY" => "N",
    									"PRODUCT_QUANTITY_VARIABLE" => "",
    									"ADD_PROPERTIES_TO_BASKET" => "Y",
    									"PRODUCT_PROPS_VARIABLE" => "prop",
    									"PARTIAL_PRODUCT_PROPERTIES" => "N",
    									"PRODUCT_PROPERTIES" => array(
    									),
    									"OFFERS_CART_PROPERTIES" => array(
    										0 => "COLOR_REF",
    										1 => "SIZES_SHOES",
    										2 => "SIZES_CLOTHES",
    									),
    									"ADD_TO_BASKET_ACTION" => "ADD",
    									"PAGER_TEMPLATE" => "round",
    									"DISPLAY_TOP_PAGER" => "N",
    									"DISPLAY_BOTTOM_PAGER" => "N",
    									"PAGER_TITLE" => "Выгодные предложения",
    									"PAGER_SHOW_ALWAYS" => "N",
    									"PAGER_DESC_NUMBERING" => "N",
    									"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
    									"PAGER_SHOW_ALL" => "N",
    									"PAGER_BASE_LINK_ENABLE" => "N",
    									"SET_STATUS_404" => "N",
    									"SHOW_404" => "N",
    									"MESSAGE_404" => "",
    									"COMPATIBLE_MODE" => "N",
    								),
    								false
    							);?>
                  </div>
                  <div class="offers__tab-content">
                    <?
                    $tabFilter = Array('!PROPERTY_FEATURED'=>false);
                    $APPLICATION->IncludeComponent(
    								"bitrix:catalog.section",
    								"offers",
    								array(
    									"IBLOCK_TYPE_ID" => "catalog",
    									"IBLOCK_ID" => "2",
    									"BASKET_URL" => "/shop/cart/",
    									"COMPONENT_TEMPLATE" => "",
    									"IBLOCK_TYPE" => "catalog",
    									"SECTION_ID" => "",
    									"SECTION_CODE" => "",
    									"SECTION_USER_FIELDS" => array(
    										0 => "",
    										1 => "",
    									),
    									"ELEMENT_SORT_FIELD" => "rand",
    									"ELEMENT_SORT_ORDER" => "desc",
    									"ELEMENT_SORT_FIELD2" => "property_sale_percent",
    									"ELEMENT_SORT_ORDER2" => "desc",
    									"FILTER_NAME" => "tabFilter",
    									"INCLUDE_SUBSECTIONS" => "Y",
    									"SHOW_ALL_WO_SECTION" => "Y",
    									"HIDE_NOT_AVAILABLE" => "Y",
    									"PAGE_ELEMENT_COUNT" => "12",
    									"LINE_ELEMENT_COUNT" => "4",
    									"PROPERTY_CODE" => array(
    									),
    									"OFFERS_FIELD_CODE" => array(
    										0 => "",
    										1 => "",
    									),
    									"OFFERS_PROPERTY_CODE" => array(
    										0 => "COLOR_REF",
    										1 => "SIZES_SHOES",
    										2 => "SIZES_CLOTHES",
    										3 => "",
    									),
    									"OFFERS_SORT_FIELD" => "sort",
    									"OFFERS_SORT_ORDER" => "desc",
    									"OFFERS_SORT_FIELD2" => "id",
    									"OFFERS_SORT_ORDER2" => "desc",
    									"TEMPLATE_THEME" => "site",
    									"PRODUCT_DISPLAY_MODE" => "Y",
    									"ADD_PICT_PROP" => "gallery",
    									"LABEL_PROP" => array(
    										0 => "NEWPRODUCT"
    									),
    									"OFFER_ADD_PICT_PROP" => "-",
    									"OFFER_TREE_PROPS" => array(
    										0 => "COLOR_REF",
    										1 => "SIZES_SHOES",
    										2 => "SIZES_CLOTHES",
    									),
    									"PRODUCT_SUBSCRIPTION" => "N",
    									"SHOW_DISCOUNT_PERCENT" => "N",
    									"SHOW_OLD_PRICE" => "Y",
    									"SHOW_CLOSE_POPUP" => "Y",
    									"MESS_BTN_BUY" => "Купить",
    									"MESS_BTN_ADD_TO_BASKET" => "В корзину",
    									"MESS_BTN_SUBSCRIBE" => "Подписаться",
    									"MESS_BTN_DETAIL" => "Подробнее",
    									"MESS_NOT_AVAILABLE" => "Нет в наличии",
    									"SECTION_URL" => "",
    									"DETAIL_URL" => "",
    									"SECTION_ID_VARIABLE" => "SECTION_ID",
    									"SEF_MODE" => "N",
    									"AJAX_MODE" => "N",
    									"AJAX_OPTION_JUMP" => "N",
    									"AJAX_OPTION_STYLE" => "Y",
    									"AJAX_OPTION_HISTORY" => "N",
    									"AJAX_OPTION_ADDITIONAL" => "",
    									"CACHE_TYPE" => "A",
    									"CACHE_TIME" => "0",
    									"CACHE_GROUPS" => "Y",
    									"SET_TITLE" => "N",
    									"SET_BROWSER_TITLE" => "N",
    									"BROWSER_TITLE" => "-",
    									"SET_META_KEYWORDS" => "Y",
    									"META_KEYWORDS" => "-",
    									"SET_META_DESCRIPTION" => "Y",
    									"META_DESCRIPTION" => "-",
    									"SET_LAST_MODIFIED" => "N",
    									"USE_MAIN_ELEMENT_SECTION" => "N",
    									"ADD_SECTIONS_CHAIN" => "N",
    									"CACHE_FILTER" => "N",
    									"ACTION_VARIABLE" => "action",
    									"PRODUCT_ID_VARIABLE" => "id",
    									"PRICE_CODE" => array(
    										0 => "BASE",
    									),
    									"USE_PRICE_COUNT" => "N",
    									"SHOW_PRICE_COUNT" => "1",
    									"PRICE_VAT_INCLUDE" => "Y",
    									"CONVERT_CURRENCY" => "N",
    									"USE_PRODUCT_QUANTITY" => "N",
    									"PRODUCT_QUANTITY_VARIABLE" => "",
    									"ADD_PROPERTIES_TO_BASKET" => "Y",
    									"PRODUCT_PROPS_VARIABLE" => "prop",
    									"PARTIAL_PRODUCT_PROPERTIES" => "N",
    									"PRODUCT_PROPERTIES" => array(
    									),
    									"OFFERS_CART_PROPERTIES" => array(
    										0 => "COLOR_REF",
    										1 => "SIZES_SHOES",
    										2 => "SIZES_CLOTHES",
    									),
    									"ADD_TO_BASKET_ACTION" => "ADD",
    									"PAGER_TEMPLATE" => "round",
    									"DISPLAY_TOP_PAGER" => "N",
    									"DISPLAY_BOTTOM_PAGER" => "N",
    									"PAGER_TITLE" => "Выгодные предложения",
    									"PAGER_SHOW_ALWAYS" => "N",
    									"PAGER_DESC_NUMBERING" => "N",
    									"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
    									"PAGER_SHOW_ALL" => "N",
    									"PAGER_BASE_LINK_ENABLE" => "N",
    									"SET_STATUS_404" => "N",
    									"SHOW_404" => "N",
    									"MESSAGE_404" => "",
    									"COMPATIBLE_MODE" => "N",
    								),
    								false
    							);?>
                  </div>
            </div>
</section>
<section class="section section--nopt" id="#form">
            <div class="container">
                <form id="fileform" class="form" method="post" enctype="multipart/form-data">
                    <div class="form__placeholder"></div>
                    <div class="form__right">
                        <div class="form__text">
                            <h2>Хотите индивидуальный букет?</h2>
                            <p>Просто пришлите нам фото или напишите пожелания, и мы с Вами свяжемся</p>
                        </div>
                        <div class="form__inputs">
                            <div>
                              <input id="form-name" type="text" name="name" placeholder="Ваше имя" />
                              <input id="form-phone" class="phoneinput" type="text" name="phone" placeholder="Ваш телефон" />
                            </div>
                            <div>
                              <textarea id="form-message" name="message" placeholder="Ваши пожелания"></textarea>
                            </div>
                        </div>
                        <div class="form__btns">
                          <input type="file" id="form-img" name="photo" />
                          <label class="btn btn--show-all" for="form-img">Загрузить фото</label>
                          <button class="btn">Отправить заявку</button>
                        </div>
                        <div class="form__agree">Нажимая на кнопку "Отправить заявку", вы соглашаетесь на обработку персональных данных на условиях, определенных <a href="/politika-konfidentsialnosti/">Политикой Конфиденциальности</a></div>
                        <div class="form__answer"></div>
                    </div>
                </form>
            </div>
</section>
<?
$APPLICATION->IncludeComponent(
  "bitrix:news.list",
  "testimonials",
  Array(
    "ACTIVE_DATE_FORMAT" => "d.m.Y",
    "ADD_SECTIONS_CHAIN" => "N",
    "AJAX_MODE" => "N",
    "AJAX_OPTION_ADDITIONAL" => "",
    "AJAX_OPTION_HISTORY" => "N",
    "AJAX_OPTION_JUMP" => "N",
    "AJAX_OPTION_STYLE" => "Y",
    "CACHE_FILTER" => "N",
    "CACHE_GROUPS" => "Y",
    "CACHE_TIME" => "360000000",
    "CACHE_TYPE" => "A",
    "CHECK_DATES" => "Y",
    "SECTION_ID" => "",
    "SECTION_CODE" => "",
    "DETAIL_URL" => "",
    "DISPLAY_BOTTOM_PAGER" => "Y",
    "DISPLAY_DATE" => "Y",
    "DISPLAY_NAME" => "Y",
    "DISPLAY_PICTURE" => "Y",
    "DISPLAY_PREVIEW_TEXT" => "Y",
    "DISPLAY_TOP_PAGER" => "N",
    "FIELD_CODE" => array("",""),
    "FILTER_NAME" => "",
    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
    "IBLOCK_ID" => "7",
    "IBLOCK_TYPE" => "content",
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
    "INCLUDE_SUBSECTIONS" => "Y",
    "MESSAGE_404" => "",
    "NEWS_COUNT" => "12",
    "PAGER_BASE_LINK_ENABLE" => "N",
    "PAGER_DESC_NUMBERING" => "N",
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "1",
    "PAGER_SHOW_ALL" => "N",
    "PAGER_SHOW_ALWAYS" => "N",
    "PAGER_TEMPLATE" => ".default",
    "PAGER_TITLE" => "Новости",
    "PARENT_SECTION" => "",
    "PARENT_SECTION_CODE" => "",
    "PREVIEW_TRUNCATE_LEN" => "",
    "PROPERTY_CODE" => array("avatar","date","src","author"),
    "SET_BROWSER_TITLE" => "N",
    "SET_LAST_MODIFIED" => "N",
    "SET_META_DESCRIPTION" => "N",
    "SET_META_KEYWORDS" => "N",
    "SET_STATUS_404" => "N",
    "SET_TITLE" => "N",
    "SHOW_404" => "N",
    "SORT_BY1" => "rand",
    "SORT_BY2" => "rand",
    "SORT_ORDER1" => "ASC",
    "SORT_ORDER2" => "DESC",
    "STRICT_SECTION_CHECK" => "N"
));?>
       
        <section class="section section--nopt home-about">
            <div class="container">
                <h2 class="section-caption">О Лавандовом Замке</h2>
                <div class="home-about__item">
                    <div class="home-about__img"><img width="325" height="466" src="<?=SITE_TEMPLATE_PATH?>/img/home-about1.jpg"  alt="Фотография Дарья и Сергей Русаковы Лавандовый Замок"/><img width="230" height="320" src="<?=SITE_TEMPLATE_PATH?>/img/home-about2.jpg" alt="Фотография лавандовое поле на ферме Лавандового Замка"/></div>
                    <div class="home-about__text">
                        <p>Лавандовый Замок - это семейное дело, созданное Дарьей и Сергеем Русаковыми. </p>
                        <p>Лавандовый Замок - это флористическая студия и интернет-магазин с особым видением эстетики цветов.</p>
                        <p>Лавандовый Замок - это семейная ферма по выращиванию <a style="margin-top: 0;" href="/lavanda/">лаванды</a> и сухоцветов.</p>
                        <a href="/o-nas">Узнайте о нас лучше</a>
                    </div>
                </div>
                <div class="home-about__item">
                    <div class="home-about__img"><img width="325" height="465" src="<?=SITE_TEMPLATE_PATH?>/img/home-about3.jpg" alt="Фотография тубуса для лавандовых подарков на фоне лавандового поля" /><img width="230" height="320" src="<?=SITE_TEMPLATE_PATH?>/img/home-about4.jpg" alt="Фотография цветущей лаванды на ферме Лавандового Замка" /></div>
                    <div class="home-about__text">
                        <p>В 2013 году мы собрали наш первый букет из лаванды и дали старт развитию новой ниши в цветочной и декоративной индустрии - сухоцветная флористика.</p>
                        <p>В 2017 году мы создали и активно развиваем первое в России производство материалов для сухоцветной флористики в Крыму, общей площадью 40 Га.</p>
                        <p>Преимущества букетов из сухоцветов – это и долговечность, и простота ухода, и уникальная энергетика каждой композиции, они легко вписываются в любой праздник и интерьер. </p><a href="/o-nas">Узнайте о нас лучше</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section--nopt home-blog">
            <div class="container">
                <h2 class="section-caption">Блог</h2>
                <?
                $APPLICATION->IncludeComponent(
                  "bitrix:news.list",
                  "homeblog",
                  Array(
                  	"ACTIVE_DATE_FORMAT" => "d.m.Y",
                  	"ADD_SECTIONS_CHAIN" => "N",
                  	"AJAX_MODE" => "N",
                  	"AJAX_OPTION_ADDITIONAL" => "",
                  	"AJAX_OPTION_HISTORY" => "N",
                  	"AJAX_OPTION_JUMP" => "N",
                  	"AJAX_OPTION_STYLE" => "Y",
                  	"CACHE_FILTER" => "N",
                  	"CACHE_GROUPS" => "Y",
                  	"CACHE_TIME" => "360000000",
                    "CACHE_TYPE" => "A",
                    "CHECK_DATES" => "Y",
                    "SECTION_ID" => "",
                    "SECTION_CODE" => "",
                    "DETAIL_URL" => "",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array("",""),
                    "FILTER_NAME" => "",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "8",
                    "IBLOCK_TYPE" => "content",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "MESSAGE_404" => "",
                    "NEWS_COUNT" => "3",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "1",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => ".default",
                    "PAGER_TITLE" => "Новости",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "PROPERTY_CODE" => array("link","btn"),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "date_active_from",
                    "SORT_BY2" => "created",
                    "SORT_ORDER1" => "ASC",
                    "SORT_ORDER2" => "DESC",
                    "STRICT_SECTION_CHECK" => "N"
                ));?>

            </div>
        </section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
