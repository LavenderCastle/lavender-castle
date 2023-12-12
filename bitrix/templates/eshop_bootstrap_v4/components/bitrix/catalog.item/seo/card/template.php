<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */

?>

<form class="seo-item">

  <div class="seo-item__grid">

    <div class="seo-item__left">
      <div class="seo-item__img">
        <?
        $img_width = 150;
        $img_propor = $item['PREVIEW_PICTURE']['WIDTH'] / $img_width;
        $img_height = $img_propor * $item['PREVIEW_PICTURE']['HEIGHT'];
        $img_src = CFile::ResizeImageGet($item['PREVIEW_PICTURE']["ID"], array('width'=>$img_width, 'height'=>$img_height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        ?>
        <img src="<?=$img_src['src']?>" class="seo-item__img-1"/>
        <?
        $img_width = 150;
        $img_propor = $item['DETAIL_PICTURE']['WIDTH'] / $img_width;
        $img_height = $img_propor * $item['DETAIL_PICTURE']['HEIGHT'];
        $img_src = CFile::ResizeImageGet($item['DETAIL_PICTURE']["ID"], array('width'=>$img_width, 'height'=>$img_height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        ?>
        <img src="<?=$img_src['src']?>" class="seo-item__img-2"/>
      </div>
      <button class="btn">Сохранить</button>
      <div class="btn btn--show-all btn--return disabled">Вернуть как было</div>
      <div class="edit-status"><span></span>Не изменялось</div>
    </div>


    <div class="seo-item__tags">
      <div class="add-wrap__input-col">
        <input type="hidden" name="id" value="<?=$arResult['ITEM']['ID']?>"/>
        <div class="add-wrap__input">
          <input class="input-name filled" type="text" name="name" autocomplete="off" value="<?=$arResult['ITEM']['NAME']?>" data-old="<?=$arResult['ITEM']['NAME']?>"/>
          <span>Название (H1)</span>
          <div class="seo-item__count"><?=mb_strlen($arResult['ITEM']['NAME'])?></div>
        </div>
        <div class="add-wrap__input">
          <input class="input-code filled" type="text" name="code" autocomplete="off" value="<?=$arResult['ITEM']['CODE']?>" data-old="<?=$arResult['ITEM']['CODE']?>"/>
          <span>Символьный код</span>
          <div class="seo-item__count"><?=mb_strlen($arResult['ITEM']['CODE'])?></div>
        </div>
        <div class="add-wrap__input">
          <input class="input-title filled" type="text" name="title" autocomplete="off" value="<?=$arResult['ITEM']['IPROPERTY_VALUES']['ELEMENT_META_TITLE']?>" data-old="<?=$arResult['ITEM']['IPROPERTY_VALUES']['ELEMENT_META_TITLE']?>"/>
          <span>Title</span>
          <div class="seo-item__count"><?=mb_strlen($arResult['ITEM']['IPROPERTY_VALUES']['ELEMENT_META_TITLE'])?></div>
        </div>
        <div class="add-wrap__input">
          <textarea class="input-descr filled" type="text" name="description" autocomplete="off" data-old="<?=$arResult['ITEM']['IPROPERTY_VALUES']['ELEMENT_META_DESCRIPTION']?>"><?=$arResult['ITEM']['IPROPERTY_VALUES']['ELEMENT_META_DESCRIPTION']?></textarea>
          <span>Description</span>
          <div class="seo-item__count"><?=mb_strlen($arResult['ITEM']['IPROPERTY_VALUES']['ELEMENT_META_DESCRIPTION'])?></div>
        </div>
        <div class="add-wrap__input">
          <input class="input-alt1 filled" type="text" name="alt1" autocomplete="off" value="<?=$arResult['ITEM']['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_ALT']?>" data-old="<?=$arResult['ITEM']['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_ALT']?>"/>
          <span>Alt 1</span>
          <div class="seo-item__count"><?=mb_strlen($arResult['ITEM']['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_ALT'])?></div>
        </div>
        <div class="add-wrap__input">
          <input class="input-alt2 filled" type="text" name="alt2" autocomplete="off" value="<?=$arResult['ITEM']['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']?>" data-old="<?=$arResult['ITEM']['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']?>"/>
          <span>Alt 2</span>
          <div class="seo-item__count"><?=mb_strlen($arResult['ITEM']['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])?></div>
        </div>
      </div>
    </div>

  </div>
  <?//print_r($arResult['ITEM'])?>
</form>
