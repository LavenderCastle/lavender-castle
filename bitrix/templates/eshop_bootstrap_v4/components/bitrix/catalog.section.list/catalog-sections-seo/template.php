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

<section class="section section--nopt categories">
            <div class="container">
                <div class="categories__grid">
									<?
									foreach ($arResult['SECTIONS'] as $arSection)
										{
											$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
											$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
											$db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter = Array("IBLOCK_ID"=>2, "ID"=>$arSection['ID']), true,$arSelect=Array("UF_ICON","UF_HIDE"));
											while($ar_result = $db_list->GetNext()):?>
												<?if ($ar_result["UF_HIDE"]!='1'):?>
													<a class="categories__item" href="<?=str_replace('/shop/','/cat/seo/',$arSection[SECTION_PAGE_URL])?>">
															<div class="categories__img">
																<img src="<?=CFile::GetPath($ar_result["UF_ICON"])?>"/>
															</div>
			                        <h3><?=$arSection['NAME']?></h3>
			                    </a>
												<?endif;?>
											<?endwhile?>
											<?
										}
									?>
                </div>
            </div>
</section>
