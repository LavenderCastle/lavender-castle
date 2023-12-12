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
<div class="home-blog__grid">
  <?foreach($arResult["ITEMS"] as $arItem):
    ?>
    <a class="home-blog__item" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
        <div class="home-blog__img" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>)"></div>
        <div class="home-blog__date"><?if ($arItem["ACTIVE_FROM"]!=''){echo $arItem["ACTIVE_FROM"];} else {echo $arItem["TIMESTAMP_X"];}?></div>
        <h3><?=$arItem['NAME']?></h3>
        <p><?=$arItem['PREVIEW_TEXT']?></p>
    </a>
  <?endforeach;?>
</div>
