<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вакансии - Лавандовый Замок");
$APPLICATION->SetPageProperty("description",  "У нас идей хватит на всех. Если ты честный, надежный и целеустремленный - приходи к нам!");
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
                <h1>Вакансии</h1>
                <h2>Друзья, спасибо за интерес к работе в Лавандовом Замке.</h2>
            </div>
</section>
<div class="vac">
	<section class="section section--nopt">
		<div class="container">
			<div class="vacancies">
				<?
				$APPLICATION->IncludeComponent(
				  "bitrix:news.list",
				  "vacancies",
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
				    "IBLOCK_ID" => "13",
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
			</div>
		</div>
	</section>
	<div class="vacancies__popup">
		<div class="vacancies__popup-inner">
			<div class="vacancies__popup-close"></div>
			<div class="vacancies__popup-form">
				<h3>Вcе поля анкеты обязательны к заполнению</h3>
				<form id="vacancies-form">
					<input type="hidden" name="vacancy" id="vacancy-input"/>
					<input type="text" name="vacname" placeholder="Вакансия" />
					<input type="text" name="name" placeholder="Имя" />
					<input type="text" name="age" placeholder="Возраст" />
					<input type="text" name="phone" placeholder="Телефон" class="phoneinput" />
					<input type="text" name="graphic" placeholder="График работы" />
					<input type="text" name="email" placeholder="E-mail" />
					<input type="text" name="family" placeholder="Семейное положение" />
					<textarea name="exp" placeholder="Опишите свой опыт работы"></textarea>
					<textarea name="last" placeholder="Ваше последнее место работы. Почему вы ушли?"></textarea>
					<textarea name="why" placeholder="Почему вы хотите работать именно у нас?"></textarea>
					<textarea name="howlong" placeholder="Как давно вы знаете о студии Лавандовый Замок?"></textarea>
					<textarea name="useful" placeholder="Чем вы можете быть полезным Лавандовому Замку?"></textarea>
					<textarea name="useful2" placeholder="Чем Лавандовый Замок может быть полезен вам?"></textarea>
					<input type="text" name="dohod" placeholder="Ожидаемый доход" />
					<textarea name="about" placeholder="Расскажите о себе в 3-5 предложениях"></textarea>
					<textarea name="allergy" placeholder="Есть ли у вас аллергические реакции? Опишите какие"></textarea>
					<textarea name="superpower" placeholder="Ваша суперсила"></textarea>
					<textarea name="insta" placeholder="Ссылка на ваш инстаграм"></textarea>
					<textarea name="robot" placeholder="Докажите, что вы не робот :)"></textarea>
					<div>
						<button class="btn">Отправить</button>
						<div class="form__agree">Нажимая на кнопку "Отправить заявку", вы соглашаетесь на обработку персональных данных на условиях, определенных <a href="/politika-konfidentsialnosti">Политикой Конфиденциальности</a></div>
					</div>
					<div class="vacancies__popup-answer"></div>
				</form>
			</div>
		</div>
	</div>
	<section class="section section--nopt">
		<div class="container">
			<div class="vacancies__info">
				<div class="vacancies__text">
					<h3>Портрет личности сотрудника <br />Лавандового Замка</h3>
					<p>
						<span>1</span> Честность, порядочность.
					</p>
					<p>
						<span>2</span> Неконфликтность, отсутствие склонности обижаться.
					</p>
					<p>
						<span>3</span> Оптимизм, доброжелательность, позитивный настрой. <br />Любовь к миру, к себе, к людям, к Лавандовому Замку.
					</p>
					<p>
						<span>4</span> Ориентация на реальный результат.<br />
														Небезразличие. <br />
														Ответственность за свои действия.<br />
														Умение отличать процесс от результата<br />
					</p>
					<p>
						<span>5</span> Стремление к постоянному развитию, как внутри компании, так и собственной личности (культурно/духовно).
					</p>
					<p>
						<span>5</span> Самодисциплина.
					</p>
					<p>
						<span>6</span> Командность.
					</p>
				</div>
				<div class="vacancies__img">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/demo/vacancies.jpg"/>
				</div>
			</div>
		</div>
	</section>
</div>

<style>
.vacancies {
	display: grid;
	grid-template-columns: 1fr 1fr;
	grid-gap: 30px;
	margin-top: 50px;
}
.vacancies__item {
	border: 1px solid #C4C4C4;
	padding: 40px 80px;
}
.vac h3 {
	font-size: 24px;
	font-weight: 500;
	margin: 0;
	margin-bottom: 20px;
}
.vac p {
	font-size: 16px;
	line-height: 1.4;
	margin: 0;
	margin-bottom: 15px;
}
.vac .btn {
	margin-top: 30px;
}
.vacancies__info {
	display: grid;
	grid-template-columns: 1fr 1fr;
	grid-gap: 90px;
}
.vacancies__info img {
	width: 100%;
	height: auto;
}
.vacancies__info p {
	position: relative;
	padding-left: 30px;
}
.vacancies__info p span {
	top: 0;
	left: 0;
	position: absolute;
	font-weight: bold;
	font-size: 20px;
	color: var(--accent);
}
@media (max-width: 1199px){
	.vacancies__item {
		padding: 30px;
	}
	.vac h3 {
		font-size: 18px;
	}
	.vac p {
		font-size: 14px;
		line-height: 1.4;
		margin: 0;
		margin-bottom: 15px;
	}
	.vac .btn {
		width: 200px;
	}
	.vacancies__info {
		grid-gap: 30px;
	}
}
@media (max-width: 767px){
	.vacancies {
		grid-template-columns: 1fr;
	}
	.vacancies__info {
		grid-template-columns: 1fr;
	}
}
</style>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
