<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Лавандовое Братство");
$APPLICATION->SetPageProperty("description",  "✿ Сухоцветы оптом, м.Ботанический сад. 2 мин, БЕЗ выходных. ☎ +7 (926) 6491619 ☛ Звоните!");
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
                <h1>Сухоцветы оптом</h1>
                <h2>С 2017 года мы выращиваем для вас сухоцветы на нашей ферме в Крыму.</h2>
            </div>
        </section>
				<div class="contact">
            <div class="container">
                <section class="section section--nopt contact-top">
                    <div class="contact-top__text">
                        <p>Работая в сухоцветной флористике уже более 7 лет, мы успели поработать со многими поставщиками и убедились, что только сами сможем вырастить сухоцветы необходимого нам качества и стойкости.</p>
                        <p>На ферме мы контролируем все этапы заготовки лаванды и сухоцветов: от посадки и ухода до сбора, сушки и транспортировки.</p>
                        <p>В июле 2020 года Лавандовый Замок открыл оптовый раздел.</p>
                        <p>Заполните форму ниже, чтобы стать частью нашего лавандово-сухоцветного братства и первыми получать от нас секретные скидки и узнавать о новых поступлениях сухоцветов.</p>
                    </div>
                    <div class="contact-top__slider">
											<img src="bratstvo1.jpg" />
											<img src="bratstvo2.jpg" />
										</div>
                </section>
                <section class="section section--nopt contact-form">
                    <div class="contact-form__items">
                        <div class="contact-form__item">
                            <h3>Адрес:</h3>
                            <p>Москва, м. Ботанический сад, Лазоревый проезд, 1</p>
                        </div>
                        <div class="contact-form__item">
                            <h3>Время работы:</h3>
                            <p>10.00-20.00, без выходных</p>
                        </div>
                        <div class="contact-form__item">
                            <h3>Контакты:</h3>
                            <p>+7 (926) 649-16-19 <br><br> hello@lavendercastle.ru</p>
                        </div>
                    </div>
                    <div class="contact-form__form">
                        <form id="b2b-form">
													<input type="text" name="name" placeholder="Ваше имя" />
													<input type="text" name="email" placeholder="Ваш email *" />
													<input class="phoneinput" type="text" name="phone" placeholder="Ваш телефон *" />
													<input type="text" name="city" placeholder="Ваш город *" />
													<textarea name="message" placeholder="Какие сухоцветы интересуют? *"></textarea>
													<button class="btn">Отправить</button>
													<div class="form__agree">Нажимая на кнопку "Отправить", вы соглашаетесь на обработку персональных данных на условиях, определенных <a href="/politika-konfidentsialnosti">Политикой Конфиденциальности</a></div>
													<div class="contact-form__answer"></div>
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
								    "PROPERTY_CODE" => array("avatar","date","src","author","type"),
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
            </div>
        </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
