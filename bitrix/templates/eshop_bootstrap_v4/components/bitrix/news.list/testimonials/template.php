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

<section class="testimonials section section--nopt">
            <div class="container">
                <h2 class="section-caption">Отзывы покупателей</h2>
                <div class="testimonials__carousel">
                    <?foreach($arResult["ITEMS"] as $arItem):
                      $useavatar = false;
                      if ($arItem['PROPERTIES']['avatar']['VALUE']!=''){
                        $useavatar = true;
                      }
                      $icon_ar = $arItem['PROPERTIES']['avatar']['VALUE'];
                      $icon = CFile::GetFileArray($icon_ar);
                      if ($arItem['PROPERTIES']['src']['VALUE']=='Яндекс Карты'){
                        $srclink = 'https://yandex.ru/maps/org/lavandovy_zamok/63450211560/reviews/?ll=37.638817%2C55.848643&z=17';
                      } elseif ($arItem['PROPERTIES']['src']['VALUE']=='Instagram'){
                        $srclink = 'https://www.instagram.com/lavendercastle.ru/';
                      }

                      ?>
                      <div class="testimonials__item">
                          <div class="testimonials__author">
                              <div class="testimonials__avatar" <?if ($useavatar):?>style="background-image: url(<?=$icon['SRC']?>)"<?endif;?>></div>
                              <div class="testimonials__name">
                                  <h3><?=$arItem['PROPERTIES']['author']['VALUE']?></h3>
                                  <h4><?=$arItem['PROPERTIES']['date']['VALUE']?></h4>
                              </div>
                          </div>
                          <div class="testimonials__text"><?=$arItem['PREVIEW_TEXT']?></div>
                          <div class="testimonials__src">
                            <div class="testimonials__more">Читать полностью</div>
                            <a href="<?=$srclink?>" target="_blank" rel="nofollow noopener noreferrer">Смотреть все</a>
                          </div>
                      </div>
                    <?endforeach;?>
                </div>
          </div>
          <div class="testimonials__popup">
            <div class="testimonials__popup-inner testimonials__item">
              <div class="testimonials__popup-close"></div>
              <div class="testimonials__popup-content"></div>
            </div>
          </div>
</section>
