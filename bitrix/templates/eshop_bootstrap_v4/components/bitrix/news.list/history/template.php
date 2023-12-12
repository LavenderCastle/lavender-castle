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
$i=0;
?>

  <?foreach($arResult["ITEMS"] as $arItem):
    $i++;
    if ($i<10){
      $number = '0'.$i;
    } else {
      $number = $i;
    }
    ?>
    <div class="history__item">
        <div class="history__top">
            <h3><?=$arItem["NAME"]?></h3>
            <h4><?=$number?></h4>
        </div>
        <div class="history__img" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>)"></div>
        <div class="history__text"><?=$arItem['PREVIEW_TEXT']?></div>
    </div>
  <?endforeach;?>
