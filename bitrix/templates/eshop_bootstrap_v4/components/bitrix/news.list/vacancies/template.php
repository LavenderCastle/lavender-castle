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
  <?foreach($arResult["ITEMS"] as $arItem):
    ?>
    <div class="vacancies__item">
      <h3><?=$arItem['NAME']?></h3>
      <p>
        <?=$arItem['PREVIEW_TEXT']?>
      </p>
      <a class="btn btn-anketa" data-vacancy="<?=$arItem['NAME']?>">Заполнить анкету</a>
    </div>
  <?endforeach;?>
