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
<div class="blog__grid">
  <?foreach($arResult["ITEMS"] as $arItem):
    ?>
    <a class="blog__item" style="background: none;" href="<?=$arItem["PROPERTIES"]['link']['VALUE']?>" target="_blank">
        <div class="blog__img" style="background-position: top center; background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>)"></div>
        <div class="blog__text">
        <h3><?=$arItem['NAME']?></h3>
        </div>
    </a>
  <?endforeach;?>
</div>
