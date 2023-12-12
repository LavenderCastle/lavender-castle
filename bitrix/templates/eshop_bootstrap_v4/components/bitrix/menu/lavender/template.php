<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);

if (empty($arResult["ALL_ITEMS"]))
	return;

CUtil::InitJSCore();
?>
<div class="header__mobile-nav">
	<label class="header__catalog-trigger" for="catalog-trigger">
				<svg width="512px" height="512px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						<title>menu</title>
						<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<g id="menu" fill="#FFFFFF" fill-rule="nonzero">
										<path d="M106.666667,0 L21.3333333,0 C9.55733333,0 0,9.55733333 0,21.3333333 L0,106.666667 C0,118.442667 9.55733333,128 21.3333333,128 L106.666667,128 C118.442667,128 128,118.442667 128,106.666667 L128,21.3333333 C128,9.55733333 118.442667,0 106.666667,0 Z" id="Path"></path>
										<path d="M106.666667,192 L21.3333333,192 C9.55733333,192 0,201.557333 0,213.333333 L0,298.666667 C0,310.442667 9.55733333,320 21.3333333,320 L106.666667,320 C118.442667,320 128,310.442667 128,298.666667 L128,213.333333 C128,201.557333 118.442667,192 106.666667,192 Z" id="Path"></path>
										<path d="M106.666667,384 L21.3333333,384 C9.55733333,384 0,393.557333 0,405.333333 L0,490.666667 C0,502.442667 9.55733333,512 21.3333333,512 L106.666667,512 C118.442667,512 128,502.442667 128,490.666667 L128,405.333333 C128,393.557333 118.442667,384 106.666667,384 Z" id="Path"></path>
										<path d="M298.666667,0 L213.333333,0 C201.557333,0 192,9.55733333 192,21.3333333 L192,106.666667 C192,118.442667 201.557333,128 213.333333,128 L298.666667,128 C310.442667,128 320,118.442667 320,106.666667 L320,21.3333333 C320,9.55733333 310.442667,0 298.666667,0 Z" id="Path"></path>
										<path d="M298.666667,192 L213.333333,192 C201.557333,192 192,201.557333 192,213.333333 L192,298.666667 C192,310.442667 201.557333,320 213.333333,320 L298.666667,320 C310.442667,320 320,310.442667 320,298.666667 L320,213.333333 C320,201.557333 310.442667,192 298.666667,192 Z" id="Path"></path>
										<path d="M298.666667,384 L213.333333,384 C201.557333,384 192,393.557333 192,405.333333 L192,490.666667 C192,502.442667 201.557333,512 213.333333,512 L298.666667,512 C310.442667,512 320,502.442667 320,490.666667 L320,405.333333 C320,393.557333 310.442667,384 298.666667,384 Z" id="Path"></path>
										<path d="M490.666667,0 L405.333333,0 C393.557333,0 384,9.55733333 384,21.3333333 L384,106.666667 C384,118.442667 393.557333,128 405.333333,128 L490.666667,128 C502.442667,128 512,118.442667 512,106.666667 L512,21.3333333 C512,9.55733333 502.442667,0 490.666667,0 Z" id="Path"></path>
										<path d="M490.666667,192 L405.333333,192 C393.557333,192 384,201.557333 384,213.333333 L384,298.666667 C384,310.442667 393.557333,320 405.333333,320 L490.666667,320 C502.442667,320 512,310.442667 512,298.666667 L512,213.333333 C512,201.557333 502.442667,192 490.666667,192 Z" id="Path"></path>
										<path d="M490.666667,384 L405.333333,384 C393.557333,384 384,393.557333 384,405.333333 L384,490.666667 C384,502.442667 393.557333,512 405.333333,512 L490.666667,512 C502.442667,512 512,502.442667 512,490.666667 L512,405.333333 C512,393.557333 502.442667,384 490.666667,384 Z" id="Path"></path>
								</g>
						</g>
				</svg>
				<span>Каталог</span>
		</label>
</div>
<input type="checkbox" id="catalog-trigger" />

<nav class="header__catalog">
		<label class="header__catalog-close" for="catalog-trigger"></label>
		<div class="container" itemscope="" itemtype="https://schema.org/SiteNavigationElement">

			<div class="header__catalog-item"><a href="/shop/bukety-iz-suhotsvetov/">Букеты из сухоцветов</a>
					<div class="header__catalog-dropdown">
							<div class="mega">
									<div class="mega__item">
											<div class="mega__title">По цене</div><a href="/shop/do_1000/">до 1000 ₽</a><a href="/shop/ot_1000_do_2500/">от 1000 до 2500 ₽</a><a href="/shop/ot_2500_do_4000/">от 2500 до 4000 ₽</a><a href="/shop/svyshe_4000/">свыше 4000 ₽</a>
									</div>
									<div class="mega__item">
											<div class="mega__title">По оформлению</div><a href="/shop/bukety-iz-suhotsvetov/">Букеты из сухоцветов</a><a href="/shop/lavande/">Букеты из лаванды</a><a href="/shop/bukety-v-vederke/">В ведёрке</a><a href="/shop/flowers/">В кашпо</a><a href="/shop/kloshi/">В клоше</a><a href="/shop/lavandovye-bukety/">В корзине</a><a href="/shop/avtorskie-bukety/">В шляпной коробке</a><a href="/shop/venok-iz-suhocvetov/">Венки из сухоцветов</a>
									</div>
									<div class="mega__item">
											<div class="mega__title">По типу</div><a href="/shop/zimnie/">Зимние</a><a href="/shop/osennie/">Осенние</a><a href="/shop/vesennie/">Весенние</a><a href="/shop/letnie/">Летние</a><a href="/shop/bukety-s-zhivymi-tsvetami-i-suhotsvetami/">Живые</a><a href="/shop/bolshie-bukety/">Большие</a><a href="/shop/polevye/">Полевые</a><a href="/shop/stilnye/">Стильные</a><a href="/shop/svadebnye/">Свадебные</a>
									</div>
							</div>
					</div>
			</div>

		<?
		$i = 0;
		foreach($arResult["MENU_STRUCTURE"] as $itemID => $arColumns)
		{
			$i++;
		    //--first level--
		?>
		<?if ($arResult["ALL_ITEMS"][$itemID]["TEXT"]!='Букетекс' && $i!= 1):?>
			<div class="header__catalog-item">
					<a itemprop="discussionUrl" href="<?=$arResult["ALL_ITEMS"][$itemID]["LINK"]?>">
						<?=htmlspecialcharsbx($arResult["ALL_ITEMS"][$itemID]["TEXT"], ENT_COMPAT, false)?>
					</a>

				<?
				if (is_array($arColumns) && count($arColumns) > 0)
				{
				?>
					<div class="header__catalog-dropdown">
						<?
						foreach($arColumns as $key=>$arRow)
						{
						?>
							<?foreach($arRow as $itemIdLevel_2=>$arLevel_3):?>  <!-- second level-->
								<?if ($arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"]!='Букеты с отгрузкой в течение 1-2 часов'):?>
									<a itemprop="discussionUrl" href="<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"]?>"><?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"]?></a>
								<?endif;?>
							<?endforeach;?>
						<?
						}
						?>
					</div>
				<?
				}
				?>
			</div>
		<?endif;?>
		<?
		}
		?>
	</div>
</nav>
