<?
define("HIDE_SIDEBAR", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Добавление букетов и композиций");
global $USER;
if ($USER->IsAuthorized()):
?>
<div class="breadcrumbs" id="navigation">
	<div class="container">
		<?$APPLICATION->IncludeComponent(
			"bitrix:breadcrumb",
			"lavender",
			array(
				"START_FROM" => "0",
				"PATH" => "",
				"SITE_ID" => "-"
			),
			false,
			Array('HIDE_ICONS' => 'Y')
		);?>
	</div>
</div>
<section class="page-top">
    <div class="container">
        <h1>Добавление букетов и композиций</h1>
    </div>
</section>
<div class="container">
	<div class="add-wrap">

		<div class="add-wrap__images">
			<label class="add-wrap__img-plus">
				<img src="photo.svg" />
				<input type="file" class="img-input" accept="image/*" />
			</label>
		</div>

		<div class="add-wrap__common">
			<div class="add-wrap__input-col">
				<div class="add-wrap__input">
					<input class="input-name" type="text" name="name" autocomplete="off"/>
					<span>Название товара *</span>
				</div>
				<div class="add-wrap__input-row-3">
					<div class="add-wrap__input">
						<input class="input-price" type="number" name="price" autocomplete="off" min="0"/>
						<span>Розничная цена *</span>
					</div>
					<div class="add-wrap__input">
						<input class="input-oprice" type="number" name="oprice" autocomplete="off" min="0"/>
						<span>Оптовая цена</span>
					</div>
					<div class="add-wrap__input">
						<input class="input-opt" type="number" name="opt" autocomplete="off" min="0"/>
						<span>Опт от (шт)</span>
					</div>
				</div>
				<div class="add-wrap__input-row-3">
					<div class="add-wrap__input">
						<input class="input-ammount" type="number" name="ammount" autocomplete="off" min="0"/>
						<span>Количество (шт)</span>
					</div>
					<div class="add-wrap__input">
						<input class="input-height" type="number" name="height" autocomplete="off" min="0"/>
						<span>Высота (см)</span>
					</div>
					<div class="add-wrap__input">
						<input class="input-diametr" type="number" name="diametr" autocomplete="off" min="0"/>
						<span>Диаметр (см)</span>
					</div>
				</div>
			</div>
		</div>

		<div class="add-wrap__cats">
			<h3>Категории *</h3>
			<div class="add-wrap__cats-wrap categories">
				<div>
					<input type="checkbox" value="5" id="cat5"/>
					<label for="cat5" class="add-wrap__check">Букеты оптом</label>
					<input type="checkbox" value="7" id="cat7"/>
					<label for="cat7" class="add-wrap__check">Популярные букеты</label>
					<input type="checkbox" value="8" id="cat8"/>
					<label for="cat8" class="add-wrap__check">Только из лаванды</label>
					<input type="checkbox" value="9" id="cat9"/>
					<label for="cat9" class="add-wrap__check">Недорогие букеты</label>
					<input type="checkbox" value="10" id="cat10"/>
					<label for="cat10" class="add-wrap__check">Большие букеты</label>
					<input type="checkbox" value="11" id="cat11"/>
					<label for="cat11" class="add-wrap__check">Живые цветы и сухоцветы</label>
				</div>
				<div>
					<input type="checkbox" value="12" id="cat12"/>
					<label for="cat12" class="add-wrap__check">В кашпо</label>
					<input type="checkbox" value="13" id="cat13"/>
					<label for="cat13" class="add-wrap__check">В шляпной коробке</label>
					<input type="checkbox" value="14" id="cat14"/>
					<label for="cat14" class="add-wrap__check">В ведерке</label>
					<input type="checkbox" value="15" id="cat15"/>
					<label for="cat15" class="add-wrap__check">В клоше</label>
					<input type="checkbox" value="16" id="cat16"/>
					<label for="cat16" class="add-wrap__check">В корзине</label>
					<input type="checkbox" value="17" id="cat17"/>
					<label for="cat17" class="add-wrap__check">Венки из сухоцветов</label>
				</div>
			</div>
		</div>

		<div class="add-wrap__desc">
			<h3>Описание *</h3>
			<textarea name="descr" class="input-descr"></textarea>
		</div>

		<div class="add-wrap__cats add-wrap__contains">
			<h3>Состав</h3>
			<div class="add-wrap__cats-wrap add-wrap__cats-wrap--contains contains">

				<?
				$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"add-contains",
					Array(
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"ADD_SECTIONS_CHAIN" => "N",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_ADDITIONAL" => "",
						"AJAX_OPTION_HISTORY" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"CACHE_FILTER" => "N",
						"CACHE_GROUPS" => "Y",
						"CACHE_TIME" => "360000000",
						"CACHE_TYPE" => "A",
						"CHECK_DATES" => "Y",
						"SECTION_ID" => "",
						"SECTION_CODE" => "",
						"DETAIL_URL" => "",
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"DISPLAY_TOP_PAGER" => "N",
						"FIELD_CODE" => array("",""),
						"FILTER_NAME" => "",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"IBLOCK_ID" => "6",
						"IBLOCK_TYPE" => "references",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"INCLUDE_SUBSECTIONS" => "Y",
						"MESSAGE_404" => "",
						"NEWS_COUNT" => "1000",
						"PAGER_BASE_LINK_ENABLE" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "1",
						"PAGER_SHOW_ALL" => "N",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_TEMPLATE" => ".default",
						"PAGER_TITLE" => "Новости",
						"PARENT_SECTION" => "",
						"PARENT_SECTION_CODE" => "",
						"PREVIEW_TRUNCATE_LEN" => "",
						"PROPERTY_CODE" => array("link","btn"),
						"SET_BROWSER_TITLE" => "N",
						"SET_LAST_MODIFIED" => "N",
						"SET_META_DESCRIPTION" => "N",
						"SET_META_KEYWORDS" => "N",
						"SET_STATUS_404" => "N",
						"SET_TITLE" => "N",
						"SHOW_404" => "N",
						"SORT_BY1" => "sort",
						"SORT_BY2" => "name",
						"SORT_ORDER1" => "ASC",
						"SORT_ORDER2" => "ASC",
						"STRICT_SECTION_CHECK" => "N"
				));?>

			</div>
		</div>

	</div>

	<div class="add-btns">
		<a href="/cat/add/bukety/" class="btn btn--show-all active">Cбросить все</a>
		<button class="btn btn--save active">Сохранить товар</button>
		<a href="/cat/add/bukety/" class="btn">Добавить новый</a>
	</div>
	<div class="add-answer">

	</div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function(){

	$('.btn--save').click(function(e){
		e.preventDefault();

		var send = true;

		if ($('.categories input:checked').length == 0){
			$('.add-answer').empty();
			$('.add-answer').append('<div class="red">Отметьте хотя бы одну категорию</div>');
			send = false;
		}

		if ($('.add-wrap__img').length == 0){
			$('.add-answer').empty();
			$('.add-answer').append('<div class="red">Добавьте хотя бы одну фотографию</div>');
			send = false;
		}

		if ($('.input-name').val()==''){
			$('.add-answer').empty();
			$('.add-answer').append('<div class="red">Укажите название товара</div>');
			send = false;
		}

		if ($('.input-price').val()==''){
			$('.add-answer').empty();
			$('.add-answer').append('<div class="red">Укажите цену товара</div>');
			send = false;
		}

		if ($('.input-descr').val()==''){
			$('.add-answer').empty();
			$('.add-answer').append('<div class="red">Заполните описание товара</div>');
			send = false;
		}

		if (send){

			console.log(1);

			var images = [];
			var cats = [];
			var contains = [];
			$('.add-wrap__img').each(function(){
				images.push($(this).find('img').attr('src'));
			});
			$('.categories input:checked').each(function(){
				cats.push($(this).val());
			});
			$('.contains input:checked').each(function(){
				contains.push($(this).val());
			});
			console.log(2);
			var name = $('.input-name').val();
			var price = $('.input-price').val();
			var oprice = $('.input-oprice').val();
			var opt = $('.input-opt').val();
			var ammount = $('.input-ammount').val();
			var height = $('.input-height').val();
			var diametr = $('.input-diametr').val();
			var descr = $('.input-descr').val();
			console.log(3);

			//Все проверки пройдены! Отправляем
										$.ajax({
									    url: "/ajax/add-item.php",
									    data: {
									      name,
									      price,
												oprice,
									      opt,
												ammount,
												height,
												diametr,
												descr,
												images,
												cats,
												contains
									    },
									    type: "POST",
									    dataType: 'text',
									    success: function(msg) {
									    	if (msg=='ok'){
													$('.add-answer').empty();
													$('.add-answer').append('<div class="green">Товар добавлен</div>');
													$('.add-btns .btn').toggleClass('active');
												} else if (msg=='Элемент с таким символьным кодом уже существует.') {
													$('.add-answer').append('<div class="red">Товар с таким названием уже существует</div>');
												} else {
													$('.add-answer').append('<div class="red">' + msg + '</div>');
												}
									    }
									  });

		}



	});

	$('.add-wrap__input input').focusout(function(){
		if ($(this).val()!=''){
			$(this).addClass('filled');
		} else {
			$(this).removeClass('filled');
		}
	});

	$( ".add-wrap" ).on( "click", ".add-wrap__img-del", function() {
		$(this).parent().remove();
	});

	$(".img-input").change(function(e){
		e.stopPropagation();
		e.preventDefault();
		files = this.files;
		if( typeof files == 'undefined' ) return;
		var data = new FormData();
		$.each( files, function( key, value ){
			data.append( key, value );
		});
		data.append( 'my_file_upload', 1 );
			$.ajax({
				url         : '/ajax/tmpupload.php',
				type        : 'POST',
				data        : data,
				cache       : false,
				dataType    : 'json',
				processData : false,contentType : false,
				success     : function( respond, status, jqXHR ){
					if( typeof respond.error === 'undefined' ){
							var files_path = respond.files;
							var html = '';
							$.each(files_path, function( key, val ){
								$('.add-wrap__images').prepend('<div class="add-wrap__img"><a class="add-wrap__img-link" data-fancybox="gallery" href="/tmp/' + val.split('/').pop() + '"><img src="/tmp/' + val.split('/').pop() + '"/></a><div class="add-wrap__img-del"></div></div>');
							});
						}
						else {
							console.log('ОШИБКА: ' + respond.error );
						}
					},
					error: function( jqXHR, status, errorThrown ){
						console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
					}
			});
	});

});

</script>

<style>
	.add-btns {
		margin-top: 50px;
		margin-bottom: 30px;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.add-answer {
		margin-bottom: 100px;
	}
	.add-answer .red {
		background: red;
		padding: 20px;
		color: #fff;
		text-align: center;
	}
	.add-answer .green {
		background: green;
		padding: 20px;
		color: #fff;
		text-align: center;
	}
	.add-btns .btn {
		margin: 0 10px !important;
		display: none;
	}
	.add-btns .btn.active {
		display: inline-flex;
	}
	.add-wrap__desc h3 {
		margin: 0 0 20px;
	}
	.add-wrap__desc textarea {
		width: 100%;
		height: 150px;
		display: block;
		border: 2px solid #aaa;
		border-radius: 5px;
		padding: 15px 10px;
		font-family: inherit;
	}
	.add-wrap__desc textarea:focus {
		border: 2px solid var(--accent) !important;
	}
	.add-wrap__contains {
		grid-column: span 2;
	}
	.add-wrap__cats h3 {
		margin: 0 0 20px;
	}
	.add-wrap__cats-wrap {
		display: grid;
		grid-template-columns: 1fr 1fr;
		grid-gap: 30px;
		grid-row-gap: 0;
	}
	.add-wrap__cats-wrap--contains {
		grid-template-columns: 1fr 1fr 1fr 1fr;
	}
	.add-wrap__check {
		position: relative;
		display: block;
		margin-bottom: 10px;
		padding-left: 30px;
		cursor: pointer;
		font-size: 14px;
		user-select: none;
		transition: color .5s;
	}
	.add-wrap__check:hover {
		color: var(--accent);
	}
	.add-wrap__check::before {
		content: '';
    display: block;
    width: 25px;
    height: 25px;
    position: absolute;
    left: -3px;
    top: 50%;
    transform: translateY(-50%);
    background: url(/bitrix/templates/eshop_bootstrap_v4/components/kombox/filter/lavender/images/check.svg) no-repeat center;
    background-size: contain;
	}
	.add-wrap__cats-wrap input {
		display: none;
		font-family: inherit;
	}
	.add-wrap__cats-wrap input:checked + .add-wrap__check::before {
		background: url(/bitrix/templates/eshop_bootstrap_v4/components/kombox/filter/lavender/images/check-checked.svg) no-repeat center;
	}
	.add-wrap__input-row-3 {
		display: grid;
		grid-template-columns: 1fr 1fr 1fr;
		grid-gap: 20px;
	}
	.add-wrap__input-col {
		display: grid;
		grid-template-columns: 1fr;
		grid-gap: 20px;
	}
	.add-wrap__input {
		position: relative;
	}
	.add-wrap__input span {
		position: absolute;
		left: 10px;
		background: #fff;
		padding: 1px 5px;
		top: 11px;
		transition: .2s;
		color: #999;
		pointer-events: none;
	}
	.add-wrap__input input {
		width: 100%;
		height: 40px;
		display: block;
		border: 2px solid #aaa;
		border-radius: 5px;
		padding: 0 10px;
	}
	.add-wrap__input input:focus {
		border: 2px solid var(--accent) !important;
	}
	.add-wrap__input input:focus + span,
	.add-wrap__input input.filled + span {
		transform: translateY(-20px);
	}

	.add-wrap {
		margin: 50px auto 30px;
		border: 2px solid var(--accent);
		padding: 20px;
		border-radius: 5px;
		display: grid;
		grid-template-columns: minmax(0,1fr) minmax(0,1fr);
		grid-gap: 30px;
	}
	.add-wrap__images {
		display: grid;
		grid-template-columns: minmax(0,1fr) minmax(0,1fr) minmax(0,1fr) minmax(0,1fr) minmax(0,1fr);
		border: 2px dashed var(--accent);
		padding: 25px 20px;
		grid-gap: 20px;
		border-radius: 5px;
	}
	.add-wrap__img {
		position: relative;
	}
	.add-wrap__img:nth-child(1) {
		order: 98;
	}
	.add-wrap__img:nth-child(2) {
		order: 97;
	}
	.add-wrap__img:nth-child(3) {
		order: 96;
	}
	.add-wrap__img:nth-child(4) {
		order: 95;
	}
	.add-wrap__img:nth-child(5) {
		order: 94;
	}
	.add-wrap__img:nth-child(6) {
		order: 93;
	}
	.add-wrap__img:nth-child(7) {
		order: 92;
	}
	.add-wrap__img:nth-child(8) {
		order: 91;
	}
	.add-wrap__img:nth-child(9) {
		order: 90;
	}
	.add-wrap__img:nth-child(10) {
		order: 89;
	}
	.add-wrap__img-link {
		display: flex;
		align-items: center;
		justify-content: center;
		object-fit: cover;
		height: 105px;
		border-radius: 5px;
		overflow: hidden;
	}
	.add-wrap__img img {
		display: block;
		object-fit: cover;
		max-width: 100%;
		cursor: pointer;
	}
	.add-wrap__img-plus {
		border-radius: 5px;
		width: 100%;
		height: 105px;
		display: flex;
		align-items: center;
		justify-content: center;
		background: linear-gradient(90deg,#a2b0e0 0,#cfa9eb 100%);
		cursor: pointer;
		order: 99;
	}
	.add-wrap__img-plus input {
		display: none;
	}
	.add-wrap__img-plus img {
		width: 40px;
		height: auto;
		display: block;
	}
	.add-wrap__img-plus:hover {
		animation: pulse 1s infinite;
	}
	.add-wrap__img-del {
		width: 20px;
		height: 20px;
		position: absolute;
		top: -10px;
		left: -10px;
		border-radius: 50%;
		background: red;
		transition: .5s;
		opacity: 0;
		cursor: pointer;
	}
	.add-wrap__img:hover .add-wrap__img-del {
		opacity: 1;
	}
	.add-wrap__img-del::before,
	.add-wrap__img-del::after {
		content: '';
		width: 10px;
		height: 2px;
		background: #fff;
		display: block;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%) rotate(45deg);
	}
	.add-wrap__img-del::after {
		transform: translate(-50%,-50%) rotate(-45deg);
	}

</style>
<?endif;?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
