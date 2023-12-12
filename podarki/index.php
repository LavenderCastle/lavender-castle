<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Купить букет и подарок из лаванды и сухоцветов в подарок - Лавандовый Замок");
$APPLICATION->SetPageProperty("description",  "Интернет-магазин Лаванды с собственной Фермы!☆ Лаванды для декора, для спокойного сна ♥ и наслаждения вкусом.☺ 10 минут м.Пушкинская ✉  БЕЗ выходных! Бесплатный самовывоз. ✈ Заходи!");
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
                <h1>Подарки к 8 марта</h1>
								<h2>Отправьте цветы и оригинальный подарок любимым женщинам на 8 марта.<br />Мы собрали все самые нежные подарки в одном месте.</h2>
            </div>
</section>
<section class="section section--nopt">
	<div class="container">
		<div class="lavanda-grid">
			<a href="/shop/bukety-iz-suhotsvetov/">
				<h2>Букеты с сухоцветами</h2>
				<img src="podarki1.jpg" alt="Фотография большого, необычного букета розы, пионы, пушистики, сухоцветы - J'aime Ma Maison"/>
				<p>Всех цветов и размеров</p>
			</a>
			<a href="/shop/bukety-s-zhivymi-tsvetami-i-suhotsvetami/">
				<h2>Букеты с живыми цветами</h2>
				<img src="podarki2.jpg" alt="Фотография большого, необычного букета розы, пионы, пушистики, сухоцветы - J'aime Ma Maison"/>
				<p>Тюльпаны, лаванда, пушистики</p>
			</a>
			<a href="/shop/sashe-dlja-belja/">
				<h2>Саше с цветами лаванды</h2>
				<img src="podarki3.jpg" alt="Фотография большого, необычного букета розы, пионы, пушистики, сухоцветы - J'aime Ma Maison"/>
				<p>Ароматное дополнение к любому подарку</p>
			</a>
			<a href="/shop/lavandovye-podarki/">
				<h2>Подарочные наборы</h2>
				<img src="podarki4.jpg" alt="Фотография большого, необычного букета розы, пионы, пушистики, сухоцветы - J'aime Ma Maison"/>
				<p>Можно собрать любой из лавандовых товаров</p>
			</a>
			<a href="/shop/mylo-ruchnoj-raboty/">
				<h2>Мыло лавандовое</h2>
				<img src="podarki5.jpg" alt="Фотография большого, необычного букета розы, пионы, пушистики, сухоцветы - J'aime Ma Maison"/>
				<p>Самый нежный лавандовый аромат</p>
			</a>
			<a href="/shop/kompozitsii-dlja-interera/">
				<h2>Композиции из сухих цветов</h2>
				<img src="podarki6.jpg" alt="Фотография большого, необычного букета розы, пионы, пушистики, сухоцветы - J'aime Ma Maison"/>
				<p>Если хочется дарить необычный букет :)</p>
			</a>
			<a href="/shop/avtorskie-bukety/">
				<h2>В шляпных коробках</h2>
				<img src="podarki7.jpg" alt="Фотография большого, необычного букета розы, пионы, пушистики, сухоцветы - J'aime Ma Maison"/>
				<p>Украшение интерьера на много лет</p>
			</a>
			<a href="/shop/bukety-iz-suhotsvetov/">
				<h2>Эко-букеты</h2>
				<img src="podarki8.jpg" alt="Фотография большого, необычного букета розы, пионы, пушистики, сухоцветы - J'aime Ma Maison"/>
				<p>Только натуральные цвета трав</p>
			</a>
			<a href="/shop/kloshi/">
				<h2>Сухоцветы в колбе</h2>
				<img src="podarki9.jpg" alt="Фотография большого, необычного букета розы, пионы, пушистики, сухоцветы - J'aime Ma Maison"/>
				<p>Стиль, не боящийся влажной уборки :)</p>
			</a>
			<a href="/shop/bukety-iz-suhocvetov-optom/konvert_ruchnoy_raboty_s_vetochkami_lavandy/">
				<h2>Когда послание звучит лавандой</h2>
				<img src="podarki10.jpg" alt="Фотография большого, необычного букета розы, пионы, пушистики, сухоцветы - J'aime Ma Maison"/>
				<p>Лаванда в конверте</p>
			</a>
		</div>
		<br />
		<p>У нас вы можете найти отличный подарок, который понравится абсолютно любой женщине! Ароматные саше с лавандой можно подарить коллеге, подруге, маме или жене. Саше с лавандой не только красивый и оригинальный подарок, а еще очень и очень полезный. Лаванда издавна славилась своими лечебными и успокаивающими свойствами.</p>
	</div>
</section>

<style>
.lavanda-grid {
	display: grid;
	grid-template-columns: 1fr 1fr 1fr 1fr;
	grid-gap: 30px;l
}
.lavanda-grid a {
	color: inherit;
	text-decoration: none;
	cursor: pointer;
	transition: .5s;
}
.lavanda-grid a:nth-child(1),
.lavanda-grid a:nth-child(2) {
	grid-column: span 2;
}
.lavanda-grid a:hover {
	opacity: .7;
}
.lavanda-grid p {
	font-weight: 300;
	text-align: center;
	font-size: 16px;
}
.lavanda-grid img {
	width: 100%;
	height: auto;
	display: block;
}
.lavanda-grid h2 {
	font-weight: 400;
	text-align: center;
	color: var(--accent);
	min-height: 50px;
}
.lavanda-info {
	font-size: 32px;
	text-align: center;
	color: var(--accent);
	font-weight: 500;
}

@media (max-width: 1199px){
	.lavanda-grid {
		grid-template-columns: 1fr;
		grid-gap: 20px;
	}
	.lavanda-grid a {
		grid-column: 1 !important;
	}
}
</style>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
