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
?>
<div class="breadcrumbs" id="navigation">
	<div class="container">
		 <?$APPLICATION->IncludeComponent(
				"bitrix:breadcrumb",
				"lavender",
				Array(
					"PATH" => "",
					"SITE_ID" => "-",
					"START_FROM" => "0"
				),
			false,
			Array(
				'HIDE_ICONS' => 'Y'
			)
			);?>
	</div>
</div>
<section class="page-top">
	<div class="container">
		<h1><?=$arResult["NAME"]?></h1>
		<h2><?=$arResult["DISPLAY_ACTIVE_FROM"]?></h2>
	</div>
</section>
<section class="section section--nopt">
	<div class="container">
		<div class="blog-detail">
			<?if ($arResult["PROPERTIES"]['type']['VALUE']!='Анонс события'):?>
			<div class="blog-detail__top">
				<div class="blog-detail__img">
					<div class="blog-detail__previewimg" style="background-image: url(<?=$arResult['DETAIL_PICTURE']['SRC']?>)"></div>
				</div>
				<div class="blog-detail__preview">
					<p><?=$arResult["PREVIEW_TEXT"]?></p>
				</div>
			</div>
			<?endif;?>
			<div class="blog-detail__content">
				<?if ($arResult["PROPERTIES"]['type']['VALUE']!='Анонс события'):?>
					<?if($arResult["NAV_RESULT"]):?>
						<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
						<?echo $arResult["NAV_TEXT"];?>
						<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
					<?elseif($arResult["DETAIL_TEXT"] <> ''):?>
						<?echo $arResult["DETAIL_TEXT"];?>
					<?endif?>
				<?endif?>
				<div style="clear:both"></div>
				<br />
				<?foreach($arResult["FIELDS"] as $code=>$value):
					if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
					{
						?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?
						if (!empty($value) && is_array($value))
						{
							?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>" height="<?=$value["HEIGHT"]?>"><?
						}
					}
					else
					{
						?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?><?
					}
					?><br />
				<?endforeach;

				if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
				{
					?>
					<div class="news-detail-share">
						<noindex>
						<?
						$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
								"HANDLERS" => $arParams["SHARE_HANDLERS"],
								"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
								"PAGE_TITLE" => $arResult["~NAME"],
								"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
								"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
								"HIDE" => $arParams["SHARE_HIDE"],
							),
							$component,
							array("HIDE_ICONS" => "Y")
						);
						?>
						</noindex>
					</div>
					<?
				}
				?>

				<?
				if ($arResult["PROPERTIES"]['type']['VALUE']=='Галерея фотографий'):
				?>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous"></script>
					<script>
					document.addEventListener("DOMContentLoaded", function(event) {
					  $(".fancybox").fancybox();
					});
					</script>
					<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" />
					<?
					$galleryclass = 'news-detail__gallery--small';
					if (count($arResult["PROPERTIES"]['photo']['VALUE'])>22){
						$galleryclass="news-detail__gallery--big";
					}
					?>
					<div class="news-detail__gallery <?=$galleryclass?>">
						<?foreach ($arResult["PROPERTIES"]['photo']['VALUE'] as $photo):?>
							<div class="news-detail__gallery-item">
								<a data-fancybox="gallery" class="fancybox" rel="group" href="<?=CFile::GetPath($photo)?>"><img src="<?=CFile::GetPath($photo)?>" alt="" /></a>
							</div>
						<?endforeach;?>
					</div>
				<?
				elseif ($arResult["PROPERTIES"]['type']['VALUE']=='Анонс события'):?>
					<div class="news-detail__event">
						<div class="news-detail__event-img">
							<img src="<?=CFile::GetPath($arResult["PROPERTIES"]['photo']['VALUE'][0])?>"/>
						</div>
						<div class="news-detail__event-text">
							<?echo $arResult["DETAIL_TEXT"];?>
						</div>
					</div>
				<?endif;
				?>
			</div>
		</div>
		<a class="btn btn--show-all" href="/blog">Все статьи</a>
	</div>
</section>

<style>
.news-detail__gallery {
	display: grid;
	grid-template-columns: minmax(0,1fr) minmax(0,1fr);
	grid-gap: 30px;
}
.news-detail__gallery--big {
	grid-template-columns: minmax(0,1fr) minmax(0,1fr) minmax(0,1fr) minmax(0,1fr);
}
.news-detail__gallery-item {
	width: 100%;
}
.news-detail__gallery--small .news-detail__gallery-item:nth-child(1),
.news-detail__gallery--small .news-detail__gallery-item:nth-child(8) {
	grid-column: span 2;
}
.news-detail__gallery--big .news-detail__gallery-item:nth-child(1),
.news-detail__gallery--big .news-detail__gallery-item:nth-child(2),
.news-detail__gallery--big .news-detail__gallery-item:nth-child(11),
.news-detail__gallery--big .news-detail__gallery-item:nth-child(12),
.news-detail__gallery--big .news-detail__gallery-item:nth-child(21),
.news-detail__gallery--big .news-detail__gallery-item:nth-child(22) {
	grid-column: span 2;
}
.news-detail__gallery-item img {
	display: block;
	width: 100%;
	height: auto;
}
.blog-detail {
	max-width: 900px;
	margin: auto;
	border: 2px solid var(--accent);
	padding: 30px;
}
.blog-detail a {
	color: var(--accent) !important;
	text-decoration: none !important;
}
.blog-detail a:hover {
	text-decoration: underline !important;
}
.blog-detail__top {
	display: grid;
	grid-template-columns: minmax(0,1fr) minmax(0,2fr);
	grid-gap: 50px;
	align-items: center;
}
.blog-detail__previewimg {
	width: 100%;
	padding-top: 100%;
	background-size: cover;
	border-radius: 50%;
}
.blog-detail__preview {
	margin: 20px 0;
	font-size: 18px;
	line-height: 1.4;
}
.blog-detail__content {
	margin-top: 30px;
	line-height: 1.4;
}
.blog-detail img.img25 {
	display: inline-block;
	width: 25%;
	height: auto;
}
.blog-detail img.img20 {
	display: inline-block;
	width: 20%;
	height: auto;
}
.blog-detail img.img33 {
	display: inline-block;
	width: 33.33%;
	height: auto;
}
.blog-detail img.img50 {
	display: inline-block;
	width: 50%;
	height: auto;
}
.blog-detail img.imgcenter {
	margin: auto;
	display: block;
}
.blog-detail img.img100 {
	display: block;
	width: 100%;
	height: auto;
}
.blog-detail iframe {
	display: block;
	width: 100% !important;
	height: 500px !important;
}
.news-detail__event {
	display: grid;
	grid-template-columns: minmax(0,1fr) minmax(0,1fr);
	grid-gap: 50px;
	margin-top: -40px;
}
.news-detail__event img {
	width: 100%;
	height: auto;
}

@media (max-width: 767px){
	.blog-detail {
		padding: 0;
		border: 0;
	}
	.blog-detail__top {
		display: block;
	}
	.blog-detail__preview {
		margin-top: 30px;
		font-size: 16px;
	}
	.blog-detail img.img25 {
		width: 100%;
	}
	.blog-detail img.img20 {
		width: 100%;
	}
	.blog-detail img.img33 {
		width: 100%;
	}
	.blog-detail img.img50 {
		width: 100%;
	}
	.blog-detail iframe {
		display: block;
		width: 100% !important;
		height: 50vw !important;
	}
	.news-detail__gallery {
		grid-template-columns: 1fr;
		grid-gap: 20px;
	}
	.news-detail__gallery-item {
		grid-column: 1 !important;
	}
	.news-detail__event {
		display: grid;
		grid-template-columns: 1fr;
		grid-gap: 30px;
		margin-top: -20px;
	}
}

</style>
