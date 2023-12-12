<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main,
	Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs("/bitrix/components/bitrix/sale.order.payment.change/templates/bootstrap_v4/script.js");
Asset::getInstance()->addCss("/bitrix/components/bitrix/sale.order.payment.change/templates/bootstrap_v4/style.css");
CJSCore::Init(array('clipboard', 'fx'));

Loc::loadMessages(__FILE__);

if (!empty($arResult['ERRORS']['FATAL']))
{
	foreach($arResult['ERRORS']['FATAL'] as $code => $error)
	{
		if ($code !== $component::E_NOT_AUTHORIZED)
			ShowError($error);
	}
	$component = $this->__component;
	if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED]))
	{
		?>
		<div class="row">
			<div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
				<div class="alert alert-danger"><?=$arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED]?></div>
			</div>
			<? $authListGetParams = array(); ?>
			<div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
				<?$APPLICATION->AuthForm('', false, false, 'N', false);?>
			</div>
		</div>
		<?
	}

}
else
{
	if (!empty($arResult['ERRORS']['NONFATAL']))
	{
		foreach($arResult['ERRORS']['NONFATAL'] as $error)
		{
			ShowError($error);
		}
	}
	if (!count($arResult['ORDERS']))
	{
		echo '<p class="empty-orders">Пока не сделано ни одного заказа</p>';
	}
	?>

	<div class="orders-list">

	<?
		$paymentChangeData = array();
		$orderHeaderStatus = null;

		foreach ($arResult['ORDERS'] as $key => $order)
		{
			if (!in_array($order['ORDER']['ID'],[571,219])):?>

			<div class="orders-list__item">
				<div class="orders-list__item-top">
					<div class="orders-list__date">
						<?=$order['ORDER']['DATE_INSERT_FORMATED']?>
					</div>
					<div class="orders-list__order">
						<span>Заказ</span> <?=Loc::getMessage('SPOL_TPL_NUMBER_SIGN').$order['ORDER']['ACCOUNT_NUMBER']?>
					</div>
					<div class="orders-list__items">
						<?=count($order['BASKET_ITEMS']);?>
						<?
						$count = count($order['BASKET_ITEMS']) % 10;
						if ($count == '1')
						{
							echo Loc::getMessage('SPOL_TPL_GOOD');
						}
						elseif ($count >= '2' && $count <= '4')
						{
							echo Loc::getMessage('SPOL_TPL_TWO_GOODS');
						}
						else
						{
							echo Loc::getMessage('SPOL_TPL_GOODS');
						}
						?>
					</div>
					<div class="orders-list__sum">
						<?=$order['ORDER']['FORMATED_PRICE']?>
					</div>
					<?
						foreach ($order['PAYMENT'] as $payment)
						{
							if ($payment['PAID'] === 'Y') {
								$class = 'done';
								$text = 'Оплачен';
							} else {
								$class = 'await';
								$text = 'Не оплачен';
							}
						?>
							<div class="orders-list__icon <?=$class?> orders-list__icon--payment" >
								<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M11 22C8.0618 22 5.29942 20.8558 3.2218 18.7782C1.14417 16.7006 0 13.9382 0 11C0 8.0618 1.14421 5.29947 3.2218 3.2218C5.29938 1.14413 8.0618 0 11 0C13.9382 0 16.7006 1.14417 18.7782 3.2218C20.8558 5.29942 22 8.0618 22 11C22 13.9382 20.8558 16.7005 18.7782 18.7782C16.7006 20.8559 13.9382 22 11 22V22ZM11 1.375C5.69276 1.375 1.375 5.69276 1.375 11C1.375 16.3072 5.69276 20.625 11 20.625C16.3072 20.625 20.625 16.3072 20.625 11C20.625 5.69276 16.3072 1.375 11 1.375Z" fill="currentColor"/>
									<path d="M11 10.3125C10.0523 10.3125 9.28125 9.54147 9.28125 8.59375C9.28125 7.64603 10.0523 6.875 11 6.875C11.9477 6.875 12.7188 7.64603 12.7188 8.59375C12.7188 8.97342 13.0265 9.28125 13.4062 9.28125C13.786 9.28125 14.0938 8.97342 14.0938 8.59375C14.0938 7.12418 13.0634 5.89153 11.6875 5.57795V4.8125C11.6875 4.43283 11.3797 4.125 11 4.125C10.6203 4.125 10.3125 4.43283 10.3125 4.8125V5.57795C8.93655 5.89153 7.90625 7.12418 7.90625 8.59375C7.90625 10.2997 9.2941 11.6875 11 11.6875C11.9477 11.6875 12.7188 12.4585 12.7188 13.4062C12.7188 14.354 11.9477 15.125 11 15.125C10.0523 15.125 9.28125 14.354 9.28125 13.4062C9.28125 13.0266 8.97346 12.7188 8.59375 12.7188C8.21404 12.7188 7.90625 13.0266 7.90625 13.4062C7.90625 14.8758 8.93655 16.1085 10.3125 16.4221V17.1875C10.3125 17.5672 10.6203 17.875 11 17.875C11.3797 17.875 11.6875 17.5672 11.6875 17.1875V16.4221C13.0634 16.1085 14.0938 14.8758 14.0938 13.4062C14.0938 11.7003 12.7059 10.3125 11 10.3125Z" fill="currentColor"/>
								</svg>
								<span><?=$text?></span>
							</div>
							<?
						}

						foreach ($order['SHIPMENT'] as $shipment)
						{
							if ($shipment['DEDUCTED'] == 'Y') {
								$class = 'done';
								$text = 'Доставлен';
							} else {
								$class = 'await';
								$text = 'Не доставлен';
							}
						?>

							<div class="orders-list__icon <?=$class?> orders-list__icon--delivery" >
								<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g clip-path="url(#clip0)">
									<path d="M16.6155 13.0798C15.0864 13.0798 13.8424 14.3238 13.8424 15.8529C13.8424 17.382 15.0864 18.626 16.6155 18.626C18.1449 18.626 19.3886 17.382 19.3886 15.8529C19.3886 14.3238 18.1447 13.0798 16.6155 13.0798ZM16.6155 17.2395C15.8509 17.2395 15.229 16.6176 15.229 15.8529C15.229 15.0882 15.8509 14.4664 16.6155 14.4664C17.3802 14.4664 18.0021 15.0882 18.0021 15.8529C18.0021 16.6176 17.3802 17.2395 16.6155 17.2395Z" fill="currentColor"/>
									<path d="M7.14079 13.0798C5.61166 13.0798 4.36768 14.3238 4.36768 15.8529C4.36768 17.382 5.61166 18.626 7.14079 18.626C8.66992 18.626 9.91391 17.382 9.91391 15.8529C9.91391 14.3238 8.66992 13.0798 7.14079 13.0798ZM7.14079 17.2395C6.37612 17.2395 5.75423 16.6176 5.75423 15.8529C5.75423 15.0882 6.37612 14.4664 7.14079 14.4664C7.90525 14.4664 8.52735 15.0882 8.52735 15.8529C8.52735 16.6176 7.90546 17.2395 7.14079 17.2395Z" fill="currentColor"/>
									<path d="M18.4831 5.14231C18.3652 4.90821 18.1256 4.76053 17.8635 4.76053H14.2122V6.14709H17.4359L19.3237 9.90188L20.5629 9.27883L18.4831 5.14231Z" fill="currentColor"/>
									<path d="M14.5357 15.1828H9.28992V16.5694H14.5357V15.1828Z" fill="currentColor"/>
									<path d="M5.06088 15.1828H2.65755C2.27461 15.1828 1.96429 15.4932 1.96429 15.8761C1.96429 16.259 2.27466 16.5693 2.65755 16.5693H5.06092C5.44386 16.5693 5.75418 16.259 5.75418 15.8761C5.75418 15.4932 5.44382 15.1828 5.06088 15.1828Z" fill="currentColor"/>
									<path d="M21.8544 10.9445L20.4908 9.18824C20.3598 9.01907 20.1575 8.92015 19.9433 8.92015H14.9055V4.06722C14.9055 3.68428 14.5951 3.37396 14.2122 3.37396H2.65755C2.27462 3.37396 1.96429 3.68433 1.96429 4.06722C1.96429 4.45011 2.27466 4.76048 2.65755 4.76048H13.5189V9.61341C13.5189 9.99635 13.8293 10.3067 14.2122 10.3067H19.6038L20.6134 11.6072V15.1827H18.6954C18.3124 15.1827 18.0021 15.4931 18.0021 15.876C18.0021 16.2589 18.3125 16.5692 18.6954 16.5692H21.3067C21.6896 16.5692 22 16.2589 22 15.876V11.3698C22 11.2158 21.9487 11.0661 21.8544 10.9445Z" fill="currentColor"/>
									<path d="M5.01468 11.6702H1.82558C1.44264 11.6702 1.13232 11.9806 1.13232 12.3635C1.13232 12.7464 1.44269 13.0567 1.82558 13.0567H5.01464C5.39757 13.0567 5.70789 12.7463 5.70789 12.3635C5.70794 11.9806 5.39757 11.6702 5.01468 11.6702Z" fill="currentColor"/>
									<path d="M6.60924 8.94324H0.693258C0.310363 8.94324 0 9.2536 0 9.63654C0 10.0195 0.310363 10.3298 0.693258 10.3298H6.60924C6.99218 10.3298 7.3025 10.0194 7.3025 9.63654C7.3025 9.25364 6.99218 8.94324 6.60924 8.94324Z" fill="currentColor"/>
									<path d="M7.74156 6.21637H1.82558C1.44264 6.21637 1.13232 6.52673 1.13232 6.90963C1.13232 7.29257 1.44269 7.60289 1.82558 7.60289H7.74156C8.1245 7.60289 8.43482 7.29252 8.43482 6.90963C8.43486 6.52673 8.1245 6.21637 7.74156 6.21637Z" fill="currentColor"/>
									</g>
									<defs>
									<clipPath id="clip0">
									<rect width="22" height="22" fill="white"/>
									</clipPath>
									</defs>
								</svg>
								<span><?=$text?></span>
							</div>
							<div class="orders-list__delivery-price">
								Доставка <?=$shipment['FORMATED_DELIVERY_PRICE']?>
							</div>
					<?
						}
					?>
					<div class="orders-list__more">Подробнee</div>
				</div>
				<div class="orders-list__item-bottom">
					<div class="orders-list__detail-top">
						<?
						foreach ($order['SHIPMENT'] as $shipment)
						{
						?>
								<div class="orders-list__detail-payment">
									<div>
										<h2>Способ доставки</h2>
										<p><?=$shipment['DELIVERY_NAME']?></p>
									</div>
								</div>
						<?
						}
						?>
						<?
						foreach ($order['PAYMENT'] as $payment)
						{
						?>
								<div class="orders-list__detail-payment">
									<div>
										<h2>Способ оплаты</h2>
										<p><?=$payment['PAY_SYSTEM_NAME']?></p>
									</div>
									<div>
										<?
										if ($payment['PAID'] === 'N' && $payment['IS_CASH'] !== 'Y' && $payment['ACTION_FILE'] !== 'cash')
										{
										?>
											<a class="btn" href="<?=htmlspecialcharsbx($payment['PSA_ACTION_FILE'])?>" target="_blank"><?=Loc::getMessage('SPOL_TPL_PAY')?></a>
										<?
										}
										?>
									</div>
								</div>
						<?
						}
						?>
						<div class="orders-list__detail-copy">
							<div>
								<h2>Повторить заказ</h2>
								<p>Все товары из заказа появятся у вас в корзине, если они доступны к покупке.</p>
								<a class="btn" href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"])?>">Повторить заказ</a>
							</div>
						</div>
					</div>

					<div class="order-list__items-cart">
						<div class="basket-thead">
							<div>Название</div>
							<div>Цена</div>
							<div>Скидка</div>
							<div>Количество</div>
							<div>Сумма</div>
						</div>
						<?
							foreach ($order['BASKET_ITEMS'] as $item){
								?>
								<div class="basket-item">
										<div class="basket-item__name">
											<a href="<?=$item['DETAIL_PAGE_URL']?>" target="_blank"><?=$item['NAME']?></a>
										</div>
										<div class="basket-item__price">
											<span>Цена</span>
											<?=round($item['BASE_PRICE']) ?> ₽
										</div>
										<div class="basket-item__discount">
											<?if ($item['DISCOUNT_PRICE']>0):?>
												<span>Скидка</span>
												-<?=round($item['DISCOUNT_PRICE'])?> ₽
											<?endif;?>
										</div>
										<div class="basket-item__quantity">
											<span>Кол-во</span>
											<?=$item['QUANTITY']?> шт
										</div>
										<div class="basket-item__sum">
											<span>Сумма</span>
											<?=round($item['PRICE'] * $item['QUANTITY'])?> ₽
										</div>
								</div>
								<?
							}
						?>
					</div>

				</div>
			</div>

			<?
			endif; // Костыль с доставкой
		}
		?>
		</div>
		<?
		echo $arResult["NAV_STRING"];
}
?>
