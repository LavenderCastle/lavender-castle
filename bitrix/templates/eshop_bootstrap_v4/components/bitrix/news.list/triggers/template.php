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
<section class="section triggers">
            <div class="container">
                <div class="triggers__wrapper">
                    <?foreach($arResult["ITEMS"] as $arItem):
                      $icon_ar = $arItem['PROPERTIES']['icon']['VALUE'];
                      $icon = CFile::GetFileArray($icon_ar);
                      ?>
                    <div class="triggers__item">
                        <div class="triggers__img">
                          <img width="60" height="60" title="<?=$arItem['NAME']?>" src="<?=$icon['SRC']?>" alt="Иконка <?=$arItem['NAME']?>" />
                        </div>
                        <div class="triggers__text">
                          <h2><?=$arItem['NAME']?></h2>
                          <p><?=$arItem['PREVIEW_TEXT']?></p>
                        </div>
                    </div>
                    <?endforeach;?>
                </div>
            </div>
</section>
