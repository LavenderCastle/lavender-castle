<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личные данные - Лавандовый Замок");
$APPLICATION->SetPageProperty("description",  "Личные данные покупателя Лавандового Замка");

	global $USER;
	if (!$USER->IsAuthorized()){
		header('Location: /');
		exit;
	}
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
    <h1>Личные данные</h1>
  </div>
</section>
<section class="section section--nopt">
	<div class="container">
		<div class="userdata">
			<div class="userdata__form">
				<form id="userdata">
					<?
						global $USER;
						$rsUser = CUser::GetByLogin($USER->GetLogin());
						$arUser = $rsUser->Fetch();
					?>
					<input type="hidden" name="login" value="<?=$USER->GetLogin()?>" />
					<div class="input">
						<label>Имя</label>
						<input type="text" name="name" value="<?=$arUser['NAME']?>" />
					</div>
					<div class="input">
						<label>Фамилия</label>
						<input type="text" name="name" value="<?=$arUser['LAST_NAME']?>" />
					</div>
					<div class="input">
						<label>Телефон</label>
						<input type="text" name="phone" value="<?=$arUser['PERSONAL_PHONE']?>" class="phoneinput" />
					</div>
					<div class="input">
						<label>E-mail</label>
						<input type="text" name="email" value="<?=$arUser['EMAIL']?>" />
					</div>
					<div class="input double">
						<label>Адрес</label>
						<input type="text" name="address" value="Химки, ул. Юннатов, 17" />
					</div>
					<button class="btn">Изменить</button>
				</form>
			</div>
			<div class="userdata__password">
				<form id="password">
					<input type="hidden" name="login" value="<?=$USER->GetLogin()?>" />
					<div class="input">
						<label>Новый пароль</label>
						<input type="password" name="password" />
					</div>
					<div class="input">
						<label>Подтвердите пароль</label>
						<input type="password" name="confirm" />
					</div>
					<button class="btn">Изменить</button>
				</form>
			</div>
		</div>
	</div>
</section>

<style>

.userdata {
	margin-top: 50px;
	display: grid;
	grid-template-columns: 2fr 1fr;
	grid-gap: 100px;
}
.userdata .input {
	position: relative;
}
.userdata .btn {
	margin-top: 26px;
	height: 60px;
}
.userdata .input label {
	display: block;
	margin-bottom: 10px;
}
.userdata .input input {
	display: block;
	width: 100%;
	height: 60px;
	padding: 19px 15px 21px;
	border: 1px solid #c4c4c4;
	font-family: Manrope;
	font-size: 14px;
}
.userdata .input input:focus {
	outline: none;
	border: 1px solid var(--accent);
}

#userdata {
	display: grid;
	grid-template-columns: 1fr 1fr;
	grid-gap: 20px;
}

#password {
	display: grid;
	grid-template-columns: 1fr;
	grid-gap: 20px;
}


</style>

<script>

document.addEventListener("DOMContentLoaded", function(event) {

	$('.orders-list__more').click(function(){
		$(this).parent().parent().toggleClass('active');
	});

});
</script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
