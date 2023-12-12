<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Follow Us");
$APPLICATION->SetPageProperty("description",  "FOLLOW US");
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
                <h1>Follow us</h1>
                <h2>Подпишитесь на наш оптовый инстаграм и оставьте отзыв в <a href="https://www.instagram.com/p/CDTtW1eJsHe/">этом посте</a>.</h2>
                <div class="one-btns">
                	<a href="https://www.instagram.com/p/CDTtW1eJsHe/" class="btn">Оставить отзыв</a>
                	<a href="https://www.instagram.com/dryflowers.ru" class="btn btn--show-all">Подписаться</a>
                </div>
            </div>
</section>
<div class="container">
				<section class="section section--nopt">
						<div class="contact-top__slider">
							<img src="img1.jpeg" alt=""/>
							<img src="img2.jpeg" alt=""/>
						</div>
				</section>
</div>
				

<style>
	.one-btns {
		display: flex;
		justify-content: center;
	}
	.one-btns .btn {
		margin: 0 10px !important;
	}
	.contact-top__slider {
		padding: 0 !important;
		width: 50%;
		margin: auto;
	}
	@media (max-width: 1199px) {
		.contact-top__slider {
			width: 80%;
		}
	}
	@media (max-width: 767px) {
		.contact-top__slider {
			width: 100%;
		}
	}
		

</style>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
