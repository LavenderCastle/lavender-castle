<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("СМИ о Лавандовом Замке");
$APPLICATION->SetPageProperty("description",  "BFM, РБК, Тинькофф и другие СМИ о нас и сухоцветной флористики");
?>
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
<section class="page-top">
            <div class="container">
                <h1>Сми о нас</h1>
            </div>
        </section>
        <section class="section section--nopt smi-anons">
            <div class="container">
								<?
								$APPLICATION->IncludeComponent(
								  "bitrix:news.list",
								  "smi-anons",
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
								    "IBLOCK_ID" => "11",
								    "IBLOCK_TYPE" => "content",
								    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
								    "INCLUDE_SUBSECTIONS" => "Y",
								    "MESSAGE_404" => "",
								    "NEWS_COUNT" => "100",
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
								    "PROPERTY_CODE" => array("logo","link"),
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
            </div>
        </section>
        <section class="section section--gray">
            <div class="container">
							<?
							$APPLICATION->IncludeComponent(
								"bitrix:news.list",
								"smi",
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
									"IBLOCK_ID" => "11",
									"IBLOCK_TYPE" => "content",
									"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
									"INCLUDE_SUBSECTIONS" => "Y",
									"MESSAGE_404" => "",
									"NEWS_COUNT" => "100",
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
									"PROPERTY_CODE" => array("logo","link"),
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
            </div>
        </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
