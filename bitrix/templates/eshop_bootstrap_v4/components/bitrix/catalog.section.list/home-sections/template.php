<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
	'LIST' => array(
		'CONT' => 'bx_sitemap',
		'TITLE' => 'bx_sitemap_title',
		'LIST' => 'catalog-section-list-list',
	),
	'LINE' => array(
		'TITLE' => 'catalog-section-list-item-title',
		'LIST' =>  'catalog-section-list-line-list mb-4',
		'EMPTY_IMG' => $this->GetFolder().'/images/line-empty.png'
	),
	'TEXT' => array(
		'TITLE' => 'catalog-section-list-item-title',
		'LIST' =>  'catalog-section-list-text-list row mb-4'
	),
	'TILE' => array(
		'TITLE' => 'catalog-section-list-item-title',
		'LIST' =>  'catalog-section-list-tile-list row mb-4',
		'EMPTY_IMG' => $this->GetFolder().'/images/tile-empty.png'
	)
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>

<?
$real = false;
if ($real):
?>

                <div class="categories__grid">
									<?
									foreach ($arResult['SECTIONS'] as $arSection)
										{
											$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
											$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
											$db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter = Array("IBLOCK_ID"=>2, "ID"=>$arSection['ID']), true,$arSelect=Array("UF_ICON","UF_HIDE"));
											while($ar_result = $db_list->GetNext()):?>
												<?if ($ar_result["UF_HIDE"]!='1'):?>
													<a class="categories__item" href="<?=$arSection[SECTION_PAGE_URL]?>">
															<div class="categories__img">
																<?
																$img_src = CFile::ResizeImageGet($ar_result["UF_ICON"], array('width'=>231, 'height'=>247), BX_RESIZE_IMAGE_PROPORTIONAL, true);
																?>
																<img src="<?=$img_src['src']?>" alt="Картинка <?=$arSection['NAME']?> - Лавандовый Замок"/>
															</div>
			                        <h3><?=$arSection['NAME']?></h3>
			                    </a>
												<?endif;?>
											<?endwhile?>
											<?
										}
									?>
                </div>
<?else:?>
<div class="categories__grid">
																																		<a class="categories__item" href="/shop/bukety-iz-suhotsvetov/">
															<div class="categories__img">
																																<img src="/upload/uf/81f/81fb23d2bc30a3df96d32588bc76651d.png" loading="lazy" alt="Картинка Букеты - Лавандовый Замок"/>
															</div>
															<h3>Букеты</h3>
													</a>
																																																											<a class="categories__item" href="/shop/kompozitsii-dlja-interera/">
															<div class="categories__img">
																																<img src="/upload/uf/f2f/f2f4a68e7dfe2f7cc0a4c80145d06076.png" loading="lazy" alt="Картинка Композиции - Лавандовый Замок"/>
															</div>
															<h3>Композиции</h3>
													</a>
																																																											<a class="categories__item" href="/shop/lavandovye-tovary/">
															<div class="categories__img">
																																<img src="/upload/uf/cab/cabd71ab8e3be58f82ba52e9403298ab.png" loading="lazy" alt="Картинка Лавандовые товары - Лавандовый Замок"/>
															</div>
															<h3>Лавандовые товары</h3>
													</a>
																																																											<a class="categories__item" href="/shop/bukety-iz-suhocvetov-optom/">
															<div class="categories__img">
																																<img src="/upload/uf/8a6/8a6f9be6678b4b19fd186d23b87af2a3.png" loading="lazy" alt="Картинка Букеты оптом - Лавандовый Замок"/>
															</div>
															<h3>Букеты оптом</h3>
													</a>
																																																											<a class="categories__item" href="/shop/price-opt-suhotsvety/">
															<div class="categories__img">
																																<img src="/upload/uf/5e5/5e55d041af0f496f810310a932ab11e4.png" loading="lazy" alt="Картинка Сухоцветы оптом - Лавандовый Замок"/>
															</div>
															<h3>Сухоцветы оптом</h3>
													</a>
																																																											<a class="categories__item" href="/shop/master-klass/">
															<div class="categories__img">
																																<img src="/upload/uf/dfa/dfab5140f658194bd7f76c21041dda99.png" loading="lazy" alt="Картинка События и мастер-классы - Лавандовый Замок"/>
															</div>
															<h3>События и мастер-классы</h3>
													</a>
																																																																												</div>
<?endif;?>
