<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */
?>
<div class="item">
		<a href="<?=$item['DETAIL_PAGE_URL']?>" id="<?=$itemIds['PICT_SLIDER']?>">
				<div class="item__img" style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>)"></div>
				<?if ($morePhoto[1]['SRC']!=''):?>
					<div class="item__img2" id="<?=$itemIds['SECOND_PICT']?>" style="background-image: url(<?=$morePhoto[1]['SRC']?>)"></div>
				<?endif;?>
		</a>
		<a href="<?=$item['DETAIL_PAGE_URL']?>">
				<h3 class="item__name"><?=$item['NAME']?></h3>
		</a>
		<?
		if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $haveOffers && !empty($item['OFFERS_PROP']))
		{
			?>
			<div class="product-item-info-container" id="<?=$itemIds['PROP_DIV']?>">
				<?
				foreach ($arParams['SKU_PROPS'] as $skuProperty)
				{
					$propertyId = $skuProperty['ID'];
					$skuProperty['NAME'] = htmlspecialcharsbx($skuProperty['NAME']);
					if (!isset($item['SKU_TREE_VALUES'][$propertyId]))
						continue;
					?>
					<div data-entity="sku-block">
						<div class="product-item-scu-container" data-entity="sku-line-block">
							<div class="product-item-scu-block-title text-muted"><?=$skuProperty['NAME']?></div>
							<div class="product-item-scu-block">
								<div class="product-item-scu-list">
									<ul class="product-item-scu-item-list">
										<?
										foreach ($skuProperty['VALUES'] as $value)
										{
											if (!isset($item['SKU_TREE_VALUES'][$propertyId][$value['ID']]))
												continue;

											$value['NAME'] = htmlspecialcharsbx($value['NAME']);

											if ($skuProperty['SHOW_MODE'] === 'PICT')
											{
												?>
												<li class="product-item-scu-item-color-container" title="<?=$value['NAME']?>" data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>">
													<div class="product-item-scu-item-color-block">
														<div class="product-item-scu-item-color" title="<?=$value['NAME']?>" style="background-image: url('<?=$value['PICT']['SRC']?>');"></div>
													</div>
												</li>
												<?
											}
											else
											{
												?>
												<li class="product-item-scu-item-text-container" title="<?=$value['NAME']?>"
													data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>">
													<div class="product-item-scu-item-text-block">
														<div class="product-item-scu-item-text"><?=$value['NAME']?></div>
													</div>
												</li>
												<?
											}
										}
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<?
				}
				?>
			</div>
			<?
			foreach ($arParams['SKU_PROPS'] as $skuProperty)
			{
				if (!isset($item['OFFERS_PROP'][$skuProperty['CODE']]))
					continue;

				$skuProps[] = array(
					'ID' => $skuProperty['ID'],
					'SHOW_MODE' => $skuProperty['SHOW_MODE'],
					'VALUES' => $skuProperty['VALUES'],
					'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
				);
			}

			unset($skuProperty, $value);

			if ($item['OFFERS_PROPS_DISPLAY'])
			{
				foreach ($item['JS_OFFERS'] as $keyOffer => $jsOffer)
				{
					$strProps = '';

					if (!empty($jsOffer['DISPLAY_PROPERTIES']))
					{
						foreach ($jsOffer['DISPLAY_PROPERTIES'] as $displayProperty)
						{
							$strProps .= '<dt>'.$displayProperty['NAME'].'</dt><dd>'
								.(is_array($displayProperty['VALUE'])
									? implode(' / ', $displayProperty['VALUE'])
									: $displayProperty['VALUE'])
								.'</dd>';
						}
					}

					$item['JS_OFFERS'][$keyOffer]['DISPLAY_PROPERTIES'] = $strProps;
				}
				unset($jsOffer, $strProps);
			}
		}
		?>
		<div class="item__price">
				<div class="item__newprice" id="<?=$itemIds['PRICE']?>"><?=$price['RATIO_PRICE']?> ₽</div>
				<div class="item__oldprice" <?=($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '')?>><?=$price['PRINT_RATIO_BASE_PRICE']?></div>
		</div>
		<div class="item__bottom" id="<?=$itemIds['BASKET_ACTIONS']?>">
			<a class="btn" id="<?=$itemIds['BUY_LINK']?>" href="javascript:void(0)" rel="nofollow">В корзину</a>
			<a class="icon icon--heart">
						<svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.824 21.6668C11.6607 21.6663 11.5021 21.6117 11.3731 21.5116C7.26361 18.3186 4.4328 15.5691 2.45196 12.8566C-0.0758142 9.39011 -0.652325 6.18973 0.737214 3.34414C1.72763 1.31157 4.57323 -0.351444 7.89925 0.616798C9.48505 1.07486 10.8686 2.05718 11.824 3.40327C12.7793 2.05718 14.1629 1.07486 15.7487 0.616798C19.0673 -0.336662 21.9203 1.31157 22.9107 3.34414C24.3002 6.18973 23.7237 9.39011 21.196 12.8566C19.2151 15.5691 16.3843 18.3186 12.2748 21.5116C12.1458 21.6117 11.9873 21.6663 11.824 21.6668ZM6.00711 1.82156C5.21571 1.79076 4.43085 1.97607 3.7368 2.3576C3.04275 2.73913 2.46571 3.30248 2.06762 3.98717C0.921993 6.33756 1.43937 8.95403 3.64933 11.977C5.99792 15.0063 8.74806 17.7018 11.824 19.989C14.8994 17.704 17.6495 15.0111 19.9986 11.9844C22.2159 8.95403 22.7259 6.33756 21.5803 3.99456C20.8412 2.51633 18.6238 1.34113 16.1552 2.0359C15.3636 2.26983 14.6298 2.6669 14.001 3.20154C13.3721 3.73619 12.8622 4.39657 12.5039 5.14019C12.4483 5.27575 12.3535 5.3917 12.2318 5.4733C12.1101 5.5549 11.9668 5.59847 11.8203 5.59847C11.6737 5.59847 11.5305 5.5549 11.4087 5.4733C11.287 5.3917 11.1923 5.27575 11.1366 5.14019C10.781 4.39471 10.272 3.73279 9.64274 3.19781C9.01351 2.66283 8.27831 2.26687 7.48535 2.0359C7.0049 1.89636 6.5074 1.82422 6.00711 1.82156Z" fill="currentColor" />
						</svg>
			</a>
		</div>
</div>
