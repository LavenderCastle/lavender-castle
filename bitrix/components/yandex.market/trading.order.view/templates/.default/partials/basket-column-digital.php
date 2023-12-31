<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) { die(); }

use Yandex\Market;
use Bitrix\Main\Web\Json;
use Bitrix\Main\Localization\Loc;

?>
<td
	class="tal for--<?= Market\Data\TextString::toLower($column); ?> js-yamarket-basket-item__field"
	data-plugin="OrderView.BasketItemDigitalSummary"
	data-name="DIGITAL"
	data-count="<?= (int)$item['COUNT'] ?>"
	data-lang='<?= Json::encode([
		'MODAL_TITLE' => $item['NAME'],
	]) ?>'
>
	<a class="yamarket-digital-summary js-yamarket-basket-item-digital__summary" href="#" data-status="WAIT"><?php
		echo Loc::getMessage('YANDEX_MARKET_T_TRADING_ORDER_VIEW_BASKET_ITEM_DIGITAL_SUMMARY_WAIT');
	?></a>
	<div class="is--hidden js-yamarket-basket-item-digital__modal">
		<table class="js-yamarket-basket-item-digital__field" data-plugin="OrderView.BasketItemDigital" width="100%">
			<?php
			// items

			for ($digitalIndex = 0; $digitalIndex < $item['COUNT']; ++$digitalIndex)
			{
				$digitalInputName = sprintf($itemInputName . '[DIGITAL][ITEM][%s]', $digitalIndex);

				if ($item['COUNT'] > 1)
				{
					?>
					<tr class="heading">
						<td colspan="2"><?= Loc::getMessage('YANDEX_MARKET_T_TRADING_ORDER_VIEW_BASKET_ITEM_DIGITAL_GROUP', [ '#NUMBER#' => $digitalIndex + 1 ]) ?></td>
					</tr>
					<?php
				}
				?>
				<tr>
					<td class="adm-detail-content-cell-l" width="40%"><?= Loc::getMessage('YANDEX_MARKET_T_TRADING_ORDER_VIEW_BASKET_ITEM_DIGITAL_CODE') ?></td>
					<td class="adm-detail-content-cell-r" width="60%">
						<input
							class="yamarket-digital-table__input js-yamarket-basket-item-digital__input"
							type="text"
							name="<?= $digitalInputName . '[CODE]' ?>"
							size="30"
							data-name="<?= sprintf('[ITEM][%s][CODE]', $digitalIndex) ?>"
						/>
					</td>
				</tr>
				<tr>
					<td class="adm-detail-content-cell-l" width="40%"><?= Loc::getMessage('YANDEX_MARKET_T_TRADING_ORDER_VIEW_BASKET_ITEM_DIGITAL_ACTIVATE_TILL') ?></td>
					<td class="adm-detail-content-cell-r" width="60%">
						<?php
						$input = CAdminCalendar::CalendarDate($digitalInputName . '[ACTIVATE_TILL]', null, 20, true);
						$input = Market\Ui\UserField\Helper\Attributes::insert($input, [
							'class' => 'yamarket-digital-table__input js-yamarket-basket-item-digital__input',
							'data-name' => sprintf('[ITEM][%s][ACTIVATE_TILL]', $digitalIndex),
						]);
						$input = Market\Ui\UserField\Helper\Attributes::insert($input, [
							'onclick' => 'BX.calendar({node:this, field: this.previousElementSibling, bTime: true, bHideTime: false});',
						], null, [ 'span' ]);

						echo $input;
						?>
					</td>
				</tr>
				<?php
			}

			// additional

			if ($item['COUNT'] > 1)
			{
				?>
				<tr class="heading">
					<td colspan="2"><?= Loc::getMessage('YANDEX_MARKET_T_TRADING_ORDER_VIEW_BASKET_ITEM_DIGITAL_ADDITIONAL') ?></td>
				</tr>
				<?php
			}
			?>
			<tr>
				<td class="adm-detail-content-cell-l" width="40%" valign="top"><?= Loc::getMessage('YANDEX_MARKET_T_TRADING_ORDER_VIEW_BASKET_ITEM_DIGITAL_SLIP') ?></td>
				<td class="adm-detail-content-cell-r" width="60%">
					<textarea
						class="yamarket-digital-digital__input js-yamarket-basket-item-digital__input"
						name="<?= $itemInputName . '[DIGITAL][SLIP]' ?>"
						rows="5"
						cols="40"
						data-name="SLIP"
					></textarea>
				</td>
			</tr>
		</table>
	</div>
</td>
