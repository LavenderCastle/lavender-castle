<?
define("HIDE_SIDEBAR", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Добавление товаров");
global $USER;
if ($USER->IsAuthorized()):
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
        <h1>Редактирование характеристик товаров</h1>
        <h2>Какие товары редактируем?</h2>
    </div>
</section>
<div class="container">
	<div class="edit-grid">
		<a href="/cat/edit/bukety">
			<span>
				Букеты и композиции
			</span>
		</a>
		<a href="/cat/edit/opt">
			<span>
				Сухоцветы оптом
			</span>
		</a>
		<a href="/cat/edit/nabory">
			<span>
				Подарочные наборы
			</span>
		</a>
		<a href="/cat/edit/mylo">
			<span>
				Мыло
			</span>
		</a>
		<a href="/cat/edit/sashe">
			<span>
				Саше
			</span>
		</a>
		<a href="/cat/edit/lavanda">
			<span>
				Живая лаванда
			</span>
		</a>
		<a href="/cat/edit/maslo">
			<span>
				Масло эфирное
			</span>
		</a>
		<a href="/cat/edit/med">
			<span>
				Мёд лавандовый
			</span>
		</a>
		<a href="/cat/edit/chai">
			<span>
				Чай травяной
			</span>
		</a>
		<a href="/cat/edit/events">
			<span>
				События и мастер-классы
			</span>
		</a>
	</div>
</div>

<style>
.edit-grid {
	display: grid;
	grid-template-columns: 1fr 1fr;
	grid-gap: 30px;
	width: 700px;
	margin: 50px auto 100px;
}
.edit-grid a {
	width: 100%;
	padding: 20px;
	border: 2px solid var(--accent);
	text-decoration: none;
	color: #000;
	font-weight: 600;
	border-radius: 5px;
	font-size: 18px;
	transition: .5s;
	text-align: center;
	display: block;
}
.edit-grid a:hover {
	background: var(--accent);
	color: #fff;
}
</style>
<?endif;?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
