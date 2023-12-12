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
<?foreach($arResult["ITEMS"] as $arItem):?>
  <input type="checkbox" value="<?=$arItem['ID']?>" id="cont<?=$arItem['ID']?>"/>
  <label for="cont<?=$arItem['ID']?>" class="add-wrap__check"><?=$arItem['NAME']?></label>
<?endforeach;?>
