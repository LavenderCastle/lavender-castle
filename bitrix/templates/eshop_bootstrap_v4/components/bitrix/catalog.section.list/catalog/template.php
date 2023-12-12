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
if (count($arResult['SECTIONS'])>10):?>
	<div class="subcategories--large">
		<div>
			<h2 class="subcategories__title">По цене<label for="sub1" class="mob">Цена</label></h2>
			<input type="checkbox" id="sub1" style="display:none;"/>
			<div class="subcategories">
					<a class="subcategories__item" href="/shop/do_1000/">до 1000 ₽</a>
					<a class="subcategories__item" href="/shop/ot_1000_do_2500/">от 1000 до 2500 ₽</a>
					<a class="subcategories__item" href="/shop/ot_2500_do_4000/">от 2500 до 4000 ₽</a>
					<a class="subcategories__item" href="/shop/svyshe_4000/">свыше 4000 ₽</a>
			</div>
		</div>
		<div>
			<h2 class="subcategories__title">По оформлению<label for="sub2" class="mob">Оформление</label></h2>
			<input type="checkbox" id="sub2" style="display:none;"/>
			<div class="subcategories">
				<a class="subcategories__item" href="/shop/bukety-iz-suhotsvetov/">Букеты из сухоцветов</a>
				<a class="subcategories__item" href="/shop/lavande/">Букеты из лаванды</a>
				<a class="subcategories__item" href="/shop/bukety-v-vederke/">В ведёрке</a>
				<a class="subcategories__item" href="/shop/flowers/">В кашпо</a>
				<a class="subcategories__item" href="/shop/kloshi/">В клоше</a>
				<a class="subcategories__item" href="/shop/lavandovye-bukety/">В корзине</a>
				<a class="subcategories__item" href="/shop/avtorskie-bukety/">В шляпной коробке</a>
				<a class="subcategories__item" href="/shop/venok-iz-suhocvetov/">Венки</a>
			</div>
		</div>
		<div>
				<h2 class="subcategories__title">По типу<label for="sub3" class="mob">Тип</label></h2>
				<input type="checkbox" id="sub3" style="display:none;"/>
				<div class="subcategories">
					<a class="subcategories__item" href="/shop/zimnie/">Зимние</a>
					<a class="subcategories__item" href="/shop/osennie/">Осенние</a>
					<a class="subcategories__item" href="/shop/vesennie/">Весенние</a>
					<a class="subcategories__item" href="/shop/letnie/">Летние</a>
					<a class="subcategories__item" href="/shop/bukety-s-zhivymi-tsvetami-i-suhotsvetami/">Живые</a>
					<a class="subcategories__item" href="/shop/bolshie-bukety/">Большие</a>
					<a class="subcategories__item" href="/shop/polevye/">Полевые</a>
					<a class="subcategories__item" href="/shop/stilnye/">Стильные</a>
					<a class="subcategories__item" href="/shop/svadebnye/">Свадебные</a>
				</div>
		</div>
	</div>
	<style>
	.subcategories::-webkit-scrollbar {
	  width: 2px;
		height: 2px;
	}
	.subcategories::-webkit-scrollbar-track {
	  background: #eee;
	}
	.subcategories::-webkit-scrollbar-thumb {
	  background-color: var(--accent);
	}
	</style>
	<script>
		document.addEventListener("DOMContentLoaded", function(event) {
	    $('.subcategories__item').each(function(){
				if ($(this).attr('href')=='<?=$_SERVER[REQUEST_URI]?>'){
					$(this).addClass('active');
				}
				//console.log($(this).attr('href'),'')
			});
	  });
	</script>
	<style>
		.subcategories__item {
			margin-right: 8px;
			padding: 10px 15px;
		}
		.subcategories--large > div {
			display: flex;
			align-items center;
		}
		.subcategories--large {
			display: grid;
			grid-template-columns: minmax(0,1fr);
			grid-gap: 10px;
		}
		.subcategories--large input,
		.subcategories--large label {
			display: none;
		}
		.subcategories--large h2 {
			flex-shrink: 0;
			margin-right: 30px;
			color: var(--accent);
			font-size: 16px;
		}
		@media (max-width: 767px){
			.subcategories--large {
				position: relative;
				display: flex;
			}
			.subcategories--large h2 {
				font-size: 0;
				margin-right: 0;
			}
			.subcategories--large label {
				display: block;
				font-size: 14px;
				padding: 10px 15px;
				border: 2px solid var(--accent);
				position: relative;
				padding-right: 30px;
			}
			.subcategories--large label::after {
				content: '';
				display: block;
				width: 8px;
				height: 8px;
				border-right: 2px solid var(--accent);
				border-bottom: 2px solid var(--accent);
				transform: rotate(45deg);
				position: absolute;
				top: 10px;
				right: 10px;
			}
			.subcategories {
				margin: 0;
				position: absolute;
				display: block;
				width: 100vw;
				opacity: 0;
				pointer-events: none;
				left: -20px;
				top: 40px;
		    background: #fff;
		    z-index: 100;
				padding: 20px 0 0;
			}
			.subcategories__item {
				display: block;
				width: 100%;
				text-align: center;
			}
			.catalog-top ~ .triggers {
				margin-bottom: 30px;
			}
			.subcategories--large input:checked + .subcategories {
				opacity: 1;
				pointer-events: auto;
			}
			.subcategories__item {
				margin: 0;
				border-radius: 0;
				border-left: none;
				border-right: none;
				padding: 15px;
				font-size: 14px;
			}
		}
	</style>
<?else:?>
	<div class="subcategories">
	<? foreach ($arResult['SECTIONS'] as $arSection):
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
			$activeClass = '';
			if ($arSection['ID']==$GLOBALS['currentSection']){
				$activeClass = 'active';
			}
			$db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter = Array("IBLOCK_ID"=>2, "ID"=>$arSection['ID']), true,$arSelect=Array("UF_HIDE"));
			?>
			<?if ($arSection["NAME"]!='Букеты с отгрузкой в течение 1-2 часов'):?>
				<a href="<?=$arSection[SECTION_PAGE_URL]?>" class="subcategories__item <?=$activeClass?>"><?=$arSection['NAME']?></a>
			<?endif;?>
			<?
		endforeach;?>
	</div>
<? endif;?>
