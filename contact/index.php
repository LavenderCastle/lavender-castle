<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Как добраться до студии сухоцветной флористики - Лавандовый Замок");
$APPLICATION->SetPageProperty("description",  "✿ Создаем уникальные букеты, которые не вянут м.Ботанический сад. 2 мин, БЕЗ выходных. ☎ +7 (926) 6491619 ☛ Звоните!");
?><div class="breadcrumbs" id="navigation">
	<div class="container">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"lavender",
	Array(
		"PATH" => "",
		"SITE_ID" => "-",
		"START_FROM" => "0"
	),
false,
Array(
	'HIDE_ICONS' => 'Y'
)
);?>
	</div>
</div>
 <section class="page-top">
<div class="container">
	<h1>Контакты</h1>
	<h2>Флагманский магазин Лавандового Замка.</h2>
</div>
 </section>
<div class="contact">
	<div class="container">
 <section class="section section--nopt contact-top">
		<div class="contact-top__text">
			<p>
				 В двух минутах пешком от метро Ботанический сад находится наша уютная флористическая студия, полная красивых цветов и ароматных сухоцветов.
			</p>
			<p>
				 Здесь вы можете познакомиться с полным ассортиментом наших букетов и лавандовых подарков, а также угоститься вкусным лавандовым чаем и обсудить любые индивидуальные заказы.
			</p>
			<p>
				 Приходите насладиться лавандовым ароматом, наша команда ждет вас каждый день.
			</p>
			<p>
				 И мы всегда готовы приехать пораньше или дождаться вас вечером.
			</p>
		</div>
 </section> <section class="section section--nopt contact-form">
		<div class="contact-form__items">
			<div class="contact-form__item">
				<h3>Адрес:</h3>
				<p>
					 Москва, м. Ботанический сад, Лазоревый проезд, 1
				</p>
			</div>
			<div class="contact-form__item">
				<h3>Время работы:</h3>
				<p>
					 10.00-20.00, без выходных
				</p>
			</div>
			<div class="contact-form__item">
				<h3>Контакты:</h3>
				<p>
					 +7 (495) 532-73-57 <br>
 <br>
					 8 (800) 550-37-15 <br>
 <br>
 <a href="mailto:hello@lavendercastle.ru">hello@lavendercastle.ru</a>
				</p>
			</div>
		</div>
		<div class="contact-form__form">
			<form id="contact-form">
 <input type="text" name="name" placeholder="Ваше имя"> <input type="text" name="email" placeholder="Ваш email *"> <input class="phoneinput" type="text" name="phone" placeholder="Ваш телефон"> <textarea name="message" placeholder="Сообщение *"></textarea> <button class="btn">Отправить</button>
				<div class="form__agree">
					 Нажимая на кнопку "Отправить", вы соглашаетесь на обработку персональных данных на условиях, определенных <a href="/politika-konfidentsialnosti">Политикой Конфиденциальности</a>
				</div>
				<div class="contact-form__answer">
				</div>
			</form>
		</div>
 </section> <section class="section section--nopt">
		<h2 class="section-caption">Как добраться</h2>
		<div class="contact-scheme">
			<div class="contact-scheme__item">
 <a data-fancybox="gallery" href="/upload/medialibrary/89a/7v46zo1inogc1pg93v312ps85iyqi8pl/IMG_9552.JPG" title="IMG_9552.JPG" class="contact-scheme__img"> <img alt="IMG_9552.JPG" src="/upload/medialibrary/89a/7v46zo1inogc1pg93v312ps85iyqi8pl/IMG_9552.JPG" title="IMG_9552.JPG"> </a>
				<p>
					 Маршрут пешком от м.Ботанический сад
				</p>
			</div>
			<div class="contact-scheme__item">
				<div class="contact-scheme__img">
 <a data-fancybox="gallery" href="/upload/medialibrary/ef9/lalnudyhsj4nn86vz6211x1mil776dl6/IMG_2280.JPG" title="IMG_2280.JPG" class="contact-scheme__img"> <img alt="IMG_2280.JPG" src="/upload/medialibrary/ef9/lalnudyhsj4nn86vz6211x1mil776dl6/IMG_2280.JPG" title="IMG_2280.JPG"> </a>
				</div>
				<p>
					 Въезд на автомобиле с ул. Снежная <br>
					 * Напишите нам номер своего автомобиля, и мы закажем вам пропуск.
				</p>
 <button class="btn btn--show-all" id="show-propusk-form">Заказать пропуск</button>
			</div>
			<div class="contact-scheme__popup">
				<div class="contact-scheme__popup-inner">
					<div class="contact-scheme__popup-close">
					</div>
					<form id="propusk-form">
 <input type="text" name="name" placeholder="Ваше имя *"> <input type="text" name="nomer" placeholder="Номер машины *"> <input class="phoneinput" type="text" name="phone" placeholder="Телефон *"> <button class="btn">Заказать</button>
						<div class="contact-scheme__popup-answer">
						</div>
					</form>
				</div>
			</div>
		</div>
 </section>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous"></script> <script>

								</script> <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script> <section class="section section--nopt">
		<h2 class="section-caption">Адреса на карте</h2>
		<div class="contact-map">
			<div class="contact-map__tabs">
				 <a class="active" >Главный штаб</a> <a >Флороматы в Москве</a> <a >Флороматы в СПб</a> <a >Наши франчайзи</a>
			</div>
			<div class="contact-map__content active">
				<div class="contact-map__map" id="map1">
				</div>
			</div>
			<div class="contact-map__content">
				<div class="contact-map__map" id="map2">
				</div>
			</div>
			 <?
												$GLOBALS['map'] = 2;
												$mapFilter = Array('PROPERTY_city_VALUE'=>'мск');
												$APPLICATION->IncludeComponent(
												  "bitrix:news.list",
												  "map",
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
												    "FILTER_NAME" => "mapFilter",
												    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
												    "IBLOCK_ID" => "9",
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
												    "PROPERTY_CODE" => array("address","long","lat","time","phone","type"),
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
			<div class="contact-map__content">
				<div class="contact-map__map" id="map3">
				</div>
			</div>
			 <?
												$GLOBALS['map'] = 3;
												$mapFilter = Array('PROPERTY_city_VALUE'=>'спб');
												$APPLICATION->IncludeComponent(
												  "bitrix:news.list",
												  "map",
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
												    "FILTER_NAME" => "mapFilter",
												    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
												    "IBLOCK_ID" => "9",
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
												    "PROPERTY_CODE" => array("address","long","lat","time","phone","type"),
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
			<div class="contact-map__content">
				<div class="contact-map__map" id="map4">
				</div>
			</div>
			 <?
												$GLOBALS['map'] = 4;
												$mapFilter = Array('PROPERTY_city_VALUE'=>'франчайзи');
												$APPLICATION->IncludeComponent(
												  "bitrix:news.list",
												  "map",
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
												    "FILTER_NAME" => "mapFilter",
												    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
												    "IBLOCK_ID" => "9",
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
												    "PROPERTY_CODE" => array("address","long","lat","time","phone","type"),
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
 </section> <section>
		<div class="contact-social">
 <a href="https://www.facebook.com/lavendercastle.ru" target="_blank">Facebook</a><a href="https://www.instagram.com/lavendercastle.ru/" target="_blank">Instagram</a><a href="https://vk.com/lavendercastle_ru" target="_blank">Вконтакте</a>
		</div>
 </section>
	</div>
	<div class="insta">
		<div class="insta__carousel">
 <a class="insta__img" href="https://www.instagram.com/lavendercastle.ru/" target="_blank"></a> <a class="insta__img" href="https://www.instagram.com/lavendercastle.ru/" target="_blank"></a> <a class="insta__img" href="https://www.instagram.com/lavendercastle.ru/" target="_blank"></a> <a class="insta__img" href="https://www.instagram.com/lavendercastle.ru/" target="_blank"></a> <a class="insta__img" href="https://www.instagram.com/lavendercastle.ru/" target="_blank"></a> <a class="insta__img" href="https://www.instagram.com/lavendercastle.ru/" target="_blank"></a> <a class="insta__img" href="https://www.instagram.com/lavendercastle.ru/" target="_blank"></a> <a class="insta__img" href="https://www.instagram.com/lavendercastle.ru/" target="_blank"></a>
		</div>
		<div class="insta__btn">
 <a class="btn btn--show-all" href="https://www.instagram.com/lavendercastle.ru/" target="_blank">Подпишиcь</a>
		</div>
	</div>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>