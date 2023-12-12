<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("История заказов - Лавандовый Замок");
$APPLICATION->SetPageProperty("description",  "История заказов покупателя Лавандового Замка");

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
    <h1>История заказов</h1>
  </div>
</section>
<section class="section section--nopt">
	<div class="container">
		<div class="orders">
				<?
				$APPLICATION->IncludeComponent("bitrix:sale.personal.order", "full", array(
						 "ACTIVE_DATE_FORMAT" => "d.m.Y",
						 "SEF_MODE" => "Y",
						 "SEF_FOLDER" => "/personal/orders/",
						 "CACHE_TYPE" => "A",
						 "CACHE_TIME" => "3600",
						 "CACHE_GROUPS" => "Y",
						 "ORDERS_PER_PAGE" => "10",
						 "PATH_TO_PAYMENT" => "/shop/order/payment/",
						 "PATH_TO_BASKET" => "/shop/cart/",
						 "SET_TITLE" => "N",
						 "SAVE_IN_SESSION" => "N",
						 "NAV_TEMPLATE" => "round",
						 "FILTER_HISTORY"=> "Y",
						 "CUSTOM_SELECT_PROPS" => array(
						 ),
						 "HISTORIC_STATUSES" => Array(''),
						 "SEF_URL_TEMPLATES" => array(
								"list" => "index.php",
								"detail" => "detail/#ID#/",
								"cancel" => "cancel/#ID#/",
						 )
						 ),
						 false
					 );
				?>
		</div>
	</div>
</section>

<style>

.orders {
	margin-top: 50px;
}
.orders-list {
	margin-bottom: 30px;
}
.orders-list__item {
	border-bottom: 1px solid #000;
}
.orders-list__item:first-child {
	border-top: 1px solid #000;
}
.orders-list__item-top {
	display: grid;
	grid-template-columns: 2fr 3fr 2fr 3fr 3fr 3fr 3fr 2fr;
	align-items: center;
	padding: 20px;
	font-size: 17px;
	background: var(--throse)
}
.orders-list__item:nth-child(odd) .orders-list__item-top {
	background: var(--thgray)
}
.orders-list__icon {
	display: flex;
	align-items: center;
	color: red;
}
.orders-list__icon svg {
	margin-right: 10px;
}
.orders-list__icon span {
	font-size: 14px;
}
.orders-list__icon.done {
	color: green;
}
.orders-list__more {
	position: relative;
	cursor: pointer;
	transition: color .5s;
	user-select: none;
}
.orders-list__more:hover {
	color: var(--accent);
}
.orders-list__more::after {
	content: '';
	width: 5px;
	height: 5px;
	display: block;
	position: absolute;
	right: -5px;
	top: 6px;
	border-right: 1px solid #000;
	border-bottom: 1px solid #000;
	transform: rotate(45deg);
}
.orders-list__item-bottom {
	padding: 50px 20px;
	border-top: 1px solid  #000;
	display: none;
}
.orders-list__item.active .orders-list__item-bottom {
	display: block;
}
.orders-list__detail-top {
	display: grid;
	grid-template-columns: 1fr 1fr 1fr;
	grid-gap: 50px;
}
.orders-list__detail-top h2 {
	font-size: 16px;
	margin: 0 0 10px;
}
.orders-list__detail-top p {
	font-size: 14px;
	margin: 0;
	min-height: 32px;
}
.orders-list__detail-top .btn {
	margin-top: 20px;
	width: 150px;
	height: 30px;
}

.basket-item,
.basket-thead {
	display: grid;
	grid-template-columns: 3fr 1fr 1fr 1fr 1fr;
	grid-gap: 20px;
	align-items: center;
}
.basket-thead {
	padding: 10px 0;
	font-weight: bold;
	font-size: 14px;
	margin-top: 70px;
	border-top: 1px solid #ccc;
}
.basket-item {
	padding: 20px 0;
	border-top: 1px solid #ccc;
	font-size: 16px;
}
.basket-item span {
	display: none;
}
.basket-item a {
	color: inherit;
	transition: color .5s;
}
.basket-item a:hover {
	color: var(--accent);
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
