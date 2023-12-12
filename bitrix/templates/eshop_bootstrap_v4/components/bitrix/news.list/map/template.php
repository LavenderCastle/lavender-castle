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
<script>
document.addEventListener("DOMContentLoaded", function(event) {
  ymaps.ready(init);
  function init() {
    if ($('#map<?=$GLOBALS['map']?>').length) {
    var myMap = new ymaps.Map("map<?=$GLOBALS['map']?>", {
            <?if ($GLOBALS['map']=='2'):?>
            center: [55.7520263, 37.6153107],
            zoom: 10,
            <?elseif ($GLOBALS['map']=='3'):?>
            center: [59.899865,30.352690],
            zoom: 10,
            <?else:?>
            center: [54.4670942,69.3077907],
            zoom: 4,
            <?endif;?>
            controls: ['zoomControl']
        });
    myMap.behaviors.disable('scrollZoom');
    <?foreach($arResult["ITEMS"] as $arItem):
      $i++;
    ?>
          var myPlacemark<?=$i?> = new ymaps.Placemark([<?=$arItem['PROPERTIES']['lat']['VALUE']?>, <?=$arItem['PROPERTIES']['long']['VALUE']?>], {
                  hintContent: '<?=$arItem['NAME']?>',
                  balloonContent: '<b><?=$arItem['NAME']?></b><br><?=$arItem['PROPERTIES']['address']['VALUE']?><br /><?=$arItem['PROPERTIES']['time']['VALUE']?><br /><?=$arItem['PROPERTIES']['phone']['VALUE']?>'
         }, {
              // Опции.
              // Необходимо указать данный тип макета.
              iconLayout: 'default#image',
              // Своё изображение иконки метки.
              <?if ($GLOBALS['map']=='4'):?>
              iconImageHref: '<?=SITE_TEMPLATE_PATH?>/img/icons/marker1.svg?v=2',
              <?else:?>
              iconImageHref: '<?=SITE_TEMPLATE_PATH?>/img/icons/marker3.svg?v=2',
              <?endif;?>
              // Размеры метки.
              iconImageSize: [100, 110],
              iconImageOffset: [-50, -50]
        });
    myMap.geoObjects.add(myPlacemark<?=$i?> );
    <?endforeach;?>
    }
  }
});
</script>
