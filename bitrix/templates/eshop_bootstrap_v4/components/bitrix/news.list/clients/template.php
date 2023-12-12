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
<div class="clients-grid">
  <?foreach($arResult["ITEMS"] as $arItem):
    $icon_ar = $arItem['PROPERTIES']['logo']['VALUE'];
    $icon = CFile::GetFileArray($icon_ar);
  ?>
  <a class="clients-grid__item" <?if ($arItem['PROPERTIES']['link']['VALUE']!=''):?>href="<?=$arItem['PROPERTIES']['link']['VALUE']?>"<?endif;?> target="_blank">
    <img src="<?=$icon['SRC']?>" />
  </a>
  <?endforeach;?>
</div>
