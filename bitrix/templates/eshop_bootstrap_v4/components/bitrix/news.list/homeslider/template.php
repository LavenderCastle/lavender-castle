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
$bgArr = Array('#9bb0de','#9785b5','#c296e4','#a899bf','#dc9e9b','#e0c19a');
$i=0;
?>
<div class="container">
  <div class="homeslider">
    <?foreach($arResult["ITEMS"] as $arItem):?>
      <div class="homeslider__slide" style="background-color: <?=$bgArr[$i]?>">
          <div class="homeslider__text">
            <div>
              <div class="homeslider__title"><?=$arItem['NAME']?></div>
              <div class="homeslider__subtext"><?=$arItem['PREVIEW_TEXT']?></div>
              <? if ($arItem['PROPERTIES']['link']['VALUE']!=''):?>
                <a class="btn" href="<?=$arItem['PROPERTIES']['link']['VALUE']?>">
                  <? if ($arItem['PROPERTIES']['btn']['VALUE']!=''):?>
                    <?=$arItem['PROPERTIES']['btn']['VALUE']?>
                  <?else:?>
                    Подробнее
                  <?endif;?>
                </a>
              <?endif;?>
            </div>
          </div>
          <?
          $img_width = 600;
          $img_propor = $arItem['PREVIEW_PICTURE']['WIDTH'] / $img_width;
          $img_height = $img_propor * $arItem['PREVIEW_PICTURE']['HEIGHT'];
          $img_src = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']["ID"], array('width'=>$img_width, 'height'=>$img_height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
          ?>
          <div class="homeslider__img" style="background-image: url('<?=$img_src['src']?>')"></div>
      </div>
    <?
      $i++;
      endforeach;
    ?>
  </div>
</div>
