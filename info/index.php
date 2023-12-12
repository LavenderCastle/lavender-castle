<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Разумное потребление - Лавандовый Замок");
$APPLICATION->SetPageProperty("description",  "Мы за разумное потребление! Если есть возможность минимизировать вред окружающей среде мы это делаем! ☛ Читай, чем сухоцветы отличаются от живых цветов!");
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
                <h1>Разумное потребление</h1>
								<h2>Живые цветы vs сухоцветы</h2>
            </div>
</section>
<div class="container">
				<section class="section section--nopt razum">
						<img src="razumnoe-potreblenie.jpg" alt="Картинка живые цветы vs сухоцветы" />
						<a class="btn btn--show-all" href="/shop/bukety-iz-suhotsvetov/">Выбрать букеты</a>
				</section>
</div>

<style>
.razum img {
	display: block;
	width: 100%;
	height: auto;
}
</style>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
