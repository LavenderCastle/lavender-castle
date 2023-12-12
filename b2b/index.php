<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Лавандовые подарки и букеты оптом с собственной фермы - Лавандовый Замок");
$APPLICATION->SetTitle("Лавандовые подарки и букеты оптом для корпоративных заказчиков. Цветочное сопровождение в Москве - Лавандовый Замок");
$APPLICATION->SetPageProperty("description",  "☆ Букеты из лаванды и других сухоцветов с собственной фермы с доставкой по всей стране. Создаем композиции и подарки ручной работы под ваш бюджет. Вышиваем логотипы. ☎ +7 (926) 6491619 ☛ Звони!");
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
                <h1>Корпоративным клиентам</h1>
                <h2>Бесплатная доставка по России / существенные скидки за объем и ранний заказ</h2>
            </div>
        </section>
				<div class="contact">
            <div class="container">
                <section class="section section--nopt contact-top">
                    <div class="contact-top__text">
                        <h3>Лавандовые подарки оптом</h3>
                        <p>Мы создаем корпоративные подарки ручной работы, чтобы вы могли поздравить с праздником своих сотрудников, коллег и партнеров.</p>
                        <p>Если вы хотите сделать необычный подарок, то оригинальный букет, композиция из сухоцветов или лавандовый набор станут отличным решением.</p>
												<a class="btn btn--show-all anchor" style="margin: 0; margin-top: 30px" href="#b2b-form">Связаться с нами</a>
                    </div>
                    <div class="contact-top__slider2">
											<img src="<?=SITE_TEMPLATE_PATH?>/img/demo/b2b3.jpg" />
											<img src="<?=SITE_TEMPLATE_PATH?>/img/demo/b2b4.jpeg" />
											<img src="<?=SITE_TEMPLATE_PATH?>/img/demo/b2b5.jpg" />
											<img src="<?=SITE_TEMPLATE_PATH?>/img/demo/b2b6.jpg" />
											<img src="<?=SITE_TEMPLATE_PATH?>/img/demo/b2b1.png" />
											<img src="<?=SITE_TEMPLATE_PATH?>/img/demo/b2b2.png" />
										</div>
                </section>
								<section class="section section--nopt">
									<div class="container">
										<h2 class="section-caption">Ваши новые возможности</h2>
										<div class="b2b-advantages">
											<div class="b2b-advantages__item">
												<h3>Естественный и узнаваемый аромат лаванды.</h3>
												<p>Позитивные впечатления у 90% людей</p>
											</div>
											<div class="b2b-advantages__item">
												<h3>Доставляйте букеты эффективно в удаленные места страны</h3>
												<p>Неограниченное время доставки, любая температура, отсутствие света и воды.</p>
											</div>
											<div class="b2b-advantages__item">
												<h3>Рекордно долгое время использования подарка</h3>
												<p>Букеты из сухоцветов стоят без воды, вазы и специального ухода</p>
											</div>
											<div class="b2b-advantages__item">
												<h3>Вам и адресату важно разумное потребление?</h3>
												<p>Букеты из сухоцветов принципиально экологичнее живых цветов</p>
											</div>
										</div>
									</div>
								</section>
								<style>
									.b2b-advantages {
										display: grid;
										grid-template-columns: 1fr 1fr;
										grid-gap: 60px;
										padding: 0 80px;
									}
									.b2b-advantages__item {
										background: #F1F5FE;
										padding: 40px 50px;
									}
									.b2b-advantages__item h3 {
										font-size: 18px;
										font-weight: 500;
										margin: 0;
										margin-bottom: 10px;
									}
									.b2b-advantages__item p {
										font-size: 16px;
										font-weight: 300;
										margin: 0;
									}
									@media (max-width: 1199px){
										.b2b-advantages {
											padding: 0;
											grid-gap: 30px;
										}
										.b2b-advantages__item {
											background: #F1F5FE;
											padding: 30px;
										}
										.b2b-advantages__item h3 {
											font-size: 16px;
										}
										.b2b-advantages__item p {
											font-size: 12px;
										}
									}
									@media (max-width: 767px){
										.b2b-advantages {
											grid-template-columns: 1fr;
										}
										.btn--show-all {
											margin: 30px auto 0 !important;
										}
									}
								</style>
								<section class="section section--nopt">
									<div class="container">
										<h2 class="section-caption">Примеры лавандовых подарков для корпоративных клиентов</h2>
										<div class="btb-info">
											<div class="btb-info__item">
												<img src="<?=SITE_TEMPLATE_PATH?>/img/demo/b2b1.png" />
												<div class="btb-info__text">
													<h3>Букеты из сухоцветов</h3>
													<p>Букеты и композиции из сухоцветов не вянут и не требуют дополнительного ухода.</p>
													<p>Мы можем собрать их в любой цветовой гамме по вашим пожеланиям. Также возможно собрать композиции в брендированные коробки, кашпо, клоши, корзины и ящики.</p>
													<a class="btn btn--show-all" href="/shop/bukety-iz-suhotsvetov">В каталог</a>
												</div>
											</div>
											<div class="btb-info__item">
												<img src="<?=SITE_TEMPLATE_PATH?>/img/demo/b2b2.png" />
												<div class="btb-info__text">
													<h3>Брендированные саше</h3>
													<p>Брендированные саше из натурального льна и хлопка с ароматными цветками лаванды - отличный презент ручной работы, который будет напоминать о вас на протяжении нескольких лет.</p>
													<a class="btn btn--show-all" href="/shop/lavender-sashet">В каталог</a>
												</div>
											</div>
											<div class="btb-info__item">
												<img src="<?=SITE_TEMPLATE_PATH?>/img/demo/b2b3.jpg" />
												<div class="btb-info__text">
													<h3>Подарочные наборы</h3>
													<p>Лавандовые подарочные наборы, собранные по вашим пожеланиям, станут отличным подарком сотрудникам и партнерам.</p>
													<p>У нас есть несколько вариантов подарочной упаковки, в которую можно собрать <a href="/shop/lavender-beauty">лавандовое мыло ручной работы</a>, <a href="/shop/efirnoe-maslo-lavandy">эфирное масло</a>, <a href="/shop/lavender-sashet">саше</a>, <a href="/shop/med-lavandoviy">лавандовый мед</a> и <a href="/shop/lavandovyj-chaj">чай</a>.</p>
													<a class="btn btn--show-all" href="/shop/lavandovye-podarki">В каталог</a>
												</div>
											</div>
										</div>
									</div>
								</section>
								<section class="section section--nopt">
									<div class="container">
										<div class="b2b-notice">
											<p>
												Некоторые компании заказывают подарки за полгода до праздника, а кто-то вспоминает о них на кануне.
											</p>
											<p>
												У нас есть, что предложить и тем, и другим.
											</p>
											<p>
												Мы сделали более 12 000 корпоративных подарков. <a href="#clients" class="anchor">Посмотреть, кто нам доверяет.</a>
											</p>
											<p>
												Позвоните нам, напишите на почту b2b@lavendercastle.ru или заполните <a href="#b2b-form" class="anchor">форму</a> ниже.
											</p>
										</div>
									</div>
								</section>
								<section class="section section--nopt">
									<div class="container">
										<h2 class="section-caption">Корпоративный лавандовый мастер-класс</h2>
										<div class="btb-info">
											<div class="btb-info__item">
												<img src="<?=SITE_TEMPLATE_PATH?>/img/demo/b2b4.jpeg" />
												<div class="btb-info__text">
													<h3>Корпоративный лавандовый мастер-класс</h3>
													<p>Если из года в год вы дарите своим сотрудникам корпоративные подарочные наборы или стандартные букеты из тюльпанов и роз, то пришло время подарка нового формата.</p>
													<p>Мы предлагаем проведение корпоративного мастер-класса по созданию букетов и композиций из сухоцветов, которые можно связать с любым праздником, будь то новогодний венок или нежный букет к 8 марта.</p>
													<p>Мы можем организовать мероприятие по вашему запросу на любое количество человек, договориться о проведении мастер-класса на вашей территории, пригласить фотографа, оформить зал и сделать так, чтобы этот день стал самым запоминающимся для ваших коллег. Ведь такие мероприятия укрепляют командный дух и оставляют много приятных эмоций и красивых композиций, которые будут радовать еще несколько лет.</p>
													<a class="btn btn--show-all" href="#b2b-form" class="anchor">Оставить заявку</a>
												</div>
											</div>
										</div>
									</div>
								</section>
								<section class="section section--nopt">
									<div class="container">
										<div class="b2b-notice">
											<p>
												Оплата за наличный и безналичный расчет, закрывающие документы, договор.
											</p>
											<p>
												Бесплатная доставка оптовых партий по Москве от 75 000 руб, по РФ от 150 000 руб.
											</p>
											<p>
												Индивидуальные подарки под ваши требования и бюджет.
											</p>
										</div>
									</div>
								</section>
								<style>
									.b2b-notice {
										padding: 30px 50px;
										border: 1px solid var(--accent);
										text-align: center;
										font-size: 16px;
									}
									@media (max-width: 1199px){
										.b2b-notice {
											font-size: 14px;
											padding: 30px;
										}
									}
									.b2b-notice a {
										color: var(--accent);
										text-decoration: none;
									}
									.btb-info {
										display: grid;
										grid-template-columns: 1fr;
										grid-gap: 30px;
									}
									.btb-info__item {
										display: grid;
										grid-template-columns: minmax(0,1fr) minmax(0,1fr);
										grid-gap: 30px;
									}
									.btb-info__item a {
										color: var(--accent);
										text-decoration: none;
									}
									.btb-info__item h3 {
										font-size: 24px;
										font-weight: 400;
										margin: 0;
										margin-bottom: 30px;
									}
									.btb-info__item p {
										font-size: 16px;
										font-weight: 300;
										line-height: 1.5;
									}
									.btb-info__item img {
										width: 100%;
										display: block;
									}
									.btb-info__item .btn.btn--show-all {
										margin-left: 0;
									}
									@media (max-width: 1199px){
										.btb-info__item h3 {
											font-size: 18px;
											margin-bottom: 15px;
										}
										.btb-info__item p {
											font-size: 12px;
											line-height: 1.3;
										}
									}
									@media (max-width: 767px){
										.btb-info__item {
											grid-template-columns: 1fr;
											grid-gap: 15px;
										}
										.b2b-notice {
											font-size: 12px;
											padding: 20px;
										}
									}
									.clients-grid {
										display: grid;
										grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
										grid-gap: 50px;
										align-items: center;
									}
									.clients-grid__item img {
										display: block;
										width: 100%;
										height: auto;
									}
									@media (max-width: 1199px){
										.clients-grid {
											grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
										}
									}
									@media (max-width: 767px){
										.clients-grid {
											grid-template-columns: 1fr 1fr 1fr;
											grid-gap: 40px;
										}
									}
								</style>
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
                            <p>+7 (926) 649-16-19 <br><br> b2b@lavendercastle.ru</p>
                        </div>
                    </div>
                    <div class="contact-form__form">
                        <form id="b2b-form">
													<input type="text" name="name" placeholder="Ваше имя" />
													<input type="text" name="email" placeholder="Ваш email *" />
													<input class="phoneinput" type="text" name="phone" placeholder="Ваш телефон" />
													<textarea name="message" placeholder="Сообщение *"></textarea>
													<button class="btn">Отправить</button>
													<div class="form__agree">Нажимая на кнопку "Отправить", вы соглашаетесь на обработку персональных данных на условиях, определенных <a href="/politika-konfidentsialnosti">Политикой Конфиденциальности</a></div>
													<div class="contact-form__answer"></div>
												</form>
                    </div>
                </section>
								<section id="clients">
				            <div class="container">
				                <h2 class="section-caption">Нам доверяют</h2>
												<?
												$APPLICATION->IncludeComponent(
												  "bitrix:news.list",
												  "clients",
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
												    "IBLOCK_ID" => "16",
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
            </div>
        </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
