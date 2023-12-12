<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
define("HIDE_SIDEBAR", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");?>

	<section class="section">
		<div class="container">
			<div class="section404__img">
				<img src="<?=SITE_DIR?>images/404.png" alt="">
			</div>
			<div class="section404__text">Неправильно набран адрес, или такой страницы на сайте больше не существует.</div>
			<div class="section404__text">Вернитесь на <a href="<?=SITE_DIR?>">главную</a> или воспользуйтесь навигацией сайта.</div>
		</div>
	</section>
	<style>
	.section404__img {
		text-align: center;
	}
	.section404__text {
		margin-top: 30px;
		text-align: center;
	}
	.section404__text a {
		color: var(--accent);
	}
	</style>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
