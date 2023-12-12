<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/basket-handler.php");
CJSCore::Init(array("fx"));

$curPage = $APPLICATION->GetCurPage(true);

if (!isset($_SESSION['wishlist'])){
	$_SESSION['wishlist'] = Array();
}

?><!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
	<title><?$APPLICATION->ShowTitle()?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=5.0, width=device-width">
	<meta name="format-detection" content="telephone=no">
	<meta name="theme-color" content="#a2b0e0">
	<?$APPLICATION->ShowMeta("robots")?>
	<?$APPLICATION->ShowMeta("description");?>
	<?$APPLICATION->ShowCSS()?>
	<?$APPLICATION->ShowHeadStrings()?>
	<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico?v=2" />
	<?
	$analytics = true;
	$agents = ['Chrome-Lighthouse','PR-CY.RU','PingdomPageSpeed','PTST','Google Page Speed Insights'];
	foreach ($agent as $agents) {
		if (stripos($_SERVER["HTTP_USER_AGENT"], $agent)) {
				$analytics = false;
		}
	}
	?>
	<? if ($analytics): ?>
		<link rel="preconnect" href="https://fonts.gstatic.com" />
		<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;700&amp;display=swap" rel="stylesheet" />
		<script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?169",t.onload=function(){VK.Retargeting.Init("VK-RTRG-1012003-5UqoG"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-1012003-5UqoG" style="position:fixed; left:-999px;" alt=""/></noscript>
	<? endif; ?>

</head>
<body>
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<header class="header">
			<div class="container header__top">
					<div class="header__col">
							<input type="checkbox" id="burger" />
							<label class="header__burger" for="burger">
								<span></span>
								<span></span>
								<span></span>
							</label>
							<nav class="header__nav">
								<a href="/o-nas/">О нас</a>
								<a href="/dostavka-i-oplata/">Доставка и оплата</a>
								<a href="/programma-loyalnosti/">Программа лояльности</a>
								<a href="/b2b/">Корпоративным клиентам</a>
								<a href="/blog/">Блог</a>
								<a href="/contact/">Контакты</a>
							</nav>
							<div class="header__social">
										<!-- <a class="icon" href="https://www.instagram.com/lavendercastle.ru/" target="_blank" rel="nofollow noopener noreferrer"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M15.6291 7.44347C15.6226 6.95361 15.5307 6.46863 15.3576 6.0102C15.2076 5.62352 14.9783 5.27235 14.6846 4.97912C14.3909 4.68589 14.0391 4.45705 13.6518 4.30722C13.1985 4.13735 12.7197 4.0455 12.2356 4.03557C11.6124 4.00776 11.4148 4 9.83269 4C8.25061 4 8.04783 4 7.42912 4.03557C6.94528 4.04557 6.46663 4.13742 6.01355 4.30722C5.62617 4.45695 5.27435 4.68575 4.98062 4.97899C4.68689 5.27224 4.45771 5.62346 4.30773 6.0102C4.13724 6.46239 4.04543 6.94035 4.03628 7.42342C4.00842 8.04627 4 8.24354 4 9.82299C4 11.4024 4 11.6042 4.03628 12.2226C4.046 12.7063 4.13735 13.1837 4.30773 13.6371C4.45796 14.0237 4.68731 14.3748 4.98114 14.6679C5.27497 14.961 5.62682 15.1897 6.0142 15.3394C6.46604 15.5161 6.94477 15.6145 7.42977 15.6304C8.05366 15.6583 8.25126 15.6667 9.83333 15.6667C11.4154 15.6667 11.6182 15.6667 12.2369 15.6304C12.7209 15.6209 13.1999 15.5293 13.6531 15.3594C14.0403 15.2094 14.392 14.9805 14.6857 14.6873C14.9794 14.3941 15.2087 14.043 15.3589 13.6565C15.5293 13.2037 15.6207 12.7264 15.6304 12.242C15.6582 11.6197 15.6667 11.4225 15.6667 9.84239C15.6654 8.26295 15.6654 8.06244 15.6291 7.44347ZM9.8288 12.8098C8.17416 12.8098 6.83374 11.4716 6.83374 9.81975C6.83374 8.16787 8.17416 6.82968 9.8288 6.82968C10.6231 6.82968 11.3849 7.1447 11.9466 7.70545C12.5083 8.2662 12.8239 9.02673 12.8239 9.81975C12.8239 10.6128 12.5083 11.3733 11.9466 11.9341C11.3849 12.4948 10.6231 12.8098 9.8288 12.8098ZM12.9431 7.41631C12.5563 7.41631 12.2447 7.10456 12.2447 6.71908C12.2447 6.62756 12.2627 6.53693 12.2978 6.45238C12.3329 6.36783 12.3843 6.291 12.4491 6.22629C12.514 6.16157 12.5909 6.11024 12.6756 6.07522C12.7603 6.04019 12.8511 6.02217 12.9427 6.02217C13.0344 6.02217 13.1252 6.04019 13.2099 6.07522C13.2946 6.11024 13.3715 6.16157 13.4363 6.22629C13.5012 6.291 13.5526 6.36783 13.5877 6.45238C13.6228 6.53693 13.6408 6.62756 13.6408 6.71908C13.6408 7.10456 13.3285 7.41631 12.9431 7.41631Z" fill="currentColor" />
														<path d="M9.83854 11.4993C10.759 11.4993 11.5052 10.7532 11.5052 9.83268C11.5052 8.91221 10.759 8.16602 9.83854 8.16602C8.91807 8.16602 8.17188 8.91221 8.17188 9.83268C8.17188 10.7532 8.91807 11.4993 9.83854 11.4993Z" fill="currentColor" />
														<circle cx="10" cy="10" r="9.5" stroke="currentColor" />
												</svg>
										</a>
										<a class="icon" href="https://www.facebook.com/lavendercastle.ru" target="_blank" rel="nofollow noopener noreferrer"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M10.9316 15.6667V10.3536H12.724L12.9905 8.27338H10.9316V6.94835C10.9316 6.34807 11.0989 5.93708 11.9604 5.93708H13.0521V4.08244C12.5209 4.02552 11.987 3.99803 11.4528 4.00011C9.86851 4.00011 8.78074 4.9673 8.78074 6.74286V8.26949H7V10.3497H8.78463V15.6667H10.9316Z" fill="currentColor" />
														<circle cx="10" cy="10" r="9.5" stroke="currentColor" />
												</svg>
										</a>
										-->
										<a class="icon" href="https://vk.com/lavendercastle_ru" target="_blank" rel="nofollow noopener noreferrer"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M15.3992 7.46926C15.4807 7.19854 15.3992 7 15.0137 7H13.737C13.4121 7 13.2636 7.17175 13.1821 7.36039C13.1821 7.36039 12.5329 8.94343 11.613 9.96987C11.3161 10.2685 11.1804 10.3629 11.0186 10.3629C10.9377 10.3629 10.8201 10.2686 10.8201 9.99782V7.46926C10.8201 7.14439 10.7263 7 10.4556 7H8.44928C8.24667 7 8.12441 7.15021 8.12441 7.29344C8.12441 7.60085 8.58435 7.67188 8.63151 8.53821V10.4176C8.63151 10.8292 8.55757 10.9043 8.39455 10.9043C7.96197 10.9043 6.90932 9.31547 6.28461 7.49663C6.16293 7.14322 6.04008 7.00058 5.71404 7.00058H4.43783C4.07278 7.00058 4 7.17234 4 7.36097C4 7.69982 4.43259 9.3766 6.01504 11.5943C7.07002 13.1086 8.55524 13.9295 9.90831 13.9295C10.7193 13.9295 10.8195 13.7473 10.8195 13.4329V12.2883C10.8195 11.9238 10.8969 11.8504 11.1537 11.8504C11.3423 11.8504 11.6672 11.9459 12.4246 12.6754C13.2898 13.5406 13.433 13.9289 13.9192 13.9289H15.1954C15.5599 13.9289 15.7421 13.7467 15.6373 13.3869C15.5226 13.0288 15.1092 12.5077 14.5608 11.8912C14.2627 11.5395 13.8173 11.1611 13.6816 10.9719C13.4924 10.7279 13.5471 10.6202 13.6816 10.4036C13.6822 10.4042 15.2373 8.21392 15.3992 7.46926Z" fill="currentColor" />
														<circle cx="10" cy="10" r="9.5" stroke="currentColor" />
												</svg>
										</a>
										<a class="icon" href="https://www.youtube.com/channel/UCENhaswyermiw-7tIiXvomw" target="_blank" rel="nofollow noopener noreferrer"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M15.4293 7.28418C15.3629 7.03784 15.2332 6.81318 15.053 6.63257C14.8728 6.45196 14.6484 6.3217 14.4022 6.25474C13.4894 6.00408 9.83737 6 9.83737 6C9.83737 6 6.18595 5.99592 5.27252 6.2355C5.02648 6.30554 4.80258 6.43765 4.62231 6.61914C4.44204 6.80064 4.31145 7.02543 4.24308 7.27194C4.00233 8.18479 4 10.0781 4 10.0781C4 10.0781 3.99767 11.9808 4.23667 12.8843C4.37074 13.3839 4.76421 13.7785 5.26436 13.9132C6.18654 14.1638 9.82863 14.1679 9.82863 14.1679C9.82863 14.1679 13.4806 14.172 14.3935 13.933C14.6398 13.8661 14.8643 13.7362 15.045 13.5559C15.2256 13.3757 15.3561 13.1514 15.4235 12.9053C15.6648 11.993 15.6666 10.1003 15.6666 10.1003C15.6666 10.1003 15.6782 8.19703 15.4293 7.28418ZM8.6692 11.8321L8.67211 8.3346L11.7074 10.0863L8.6692 11.8321Z" fill="currentColor" />
														<circle cx="10" cy="10" r="9.5" stroke="currentColor" />
												</svg>
										</a>
										<a class="icon" href="https://ru.pinterest.com/lavendercastle_ru/" target="_blank" rel="nofollow noopener noreferrer"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M6.00004 8.18496C6.00004 7.68056 6.08821 7.20404 6.26197 6.75929C6.42797 6.32731 6.67461 5.93084 6.98874 5.591C7.30223 5.25563 7.66097 4.96562 8.05459 4.72937C8.45845 4.48505 8.89567 4.30073 9.35255 4.18218C9.81494 4.06076 10.2911 3.99953 10.7691 4C11.5076 4 12.1948 4.15625 12.8321 4.46745C13.4611 4.77297 13.9965 5.24184 14.3823 5.82505C14.7803 6.41827 14.9781 7.08929 14.9781 7.83746C14.9781 8.2861 14.934 8.72502 14.8439 9.15421C14.7554 9.58317 14.6147 9.99968 14.4251 10.3945C14.2443 10.7766 14.0079 11.1299 13.7236 11.4428C13.4378 11.7507 13.0918 11.9966 12.707 12.165C12.2892 12.3481 11.8373 12.4403 11.3812 12.4354C11.0641 12.4354 10.7477 12.3608 10.4353 12.2111C10.1228 12.062 9.89844 11.8571 9.76359 11.5945C9.71626 11.7767 9.65143 12.0399 9.5652 12.3842C9.48221 12.7278 9.42646 12.9495 9.40182 13.05C9.37589 13.1499 9.32791 13.3165 9.25789 13.5473C9.2104 13.718 9.14949 13.8847 9.07571 14.0458L8.85268 14.4828C8.75623 14.6703 8.64841 14.8518 8.52982 15.0261C8.41247 15.196 8.26724 15.3989 8.09414 15.6323L7.99754 15.6667L7.93336 15.5966C7.86398 14.8621 7.82833 14.4225 7.82833 14.2773C7.82833 13.8475 7.87954 13.3651 7.98068 12.8296C8.07988 12.2947 8.23677 11.6224 8.44748 10.8139C8.65819 10.0061 8.77878 9.53089 8.81119 9.3902C8.66272 9.08743 8.58752 8.69195 8.58752 8.20571C8.58752 7.81736 8.70876 7.45365 8.95188 7.11133C9.19565 6.77031 9.50361 6.5998 9.87704 6.5998C10.163 6.5998 10.3847 6.69445 10.5435 6.88441C10.703 7.07373 10.7808 7.31231 10.7808 7.60341C10.7808 7.91201 10.6784 8.35871 10.4722 8.94286C10.266 9.52765 10.1636 9.96397 10.1636 10.2538C10.1636 10.5475 10.2686 10.7932 10.4787 10.9857C10.686 11.1784 10.9601 11.2828 11.2431 11.2768C11.4998 11.2768 11.7377 11.2185 11.9588 11.1011C12.1764 10.9872 12.3648 10.8246 12.5093 10.6259C12.8238 10.1943 13.0481 9.70369 13.1686 9.18339C13.2308 8.90979 13.2788 8.64981 13.3086 8.40539C13.3404 8.15968 13.354 7.92757 13.354 7.70714C13.354 6.89868 13.0973 6.2685 12.5871 5.81727C12.0742 5.36603 11.4064 5.14171 10.585 5.14171C9.65078 5.14171 8.86954 5.44383 8.2439 6.05002C7.61762 6.65426 7.30253 7.42253 7.30253 8.35417C7.30253 8.55969 7.33365 8.75808 7.39265 8.94999C7.45035 9.14124 7.51324 9.2936 7.58131 9.40641C7.64874 9.51727 7.71228 9.62555 7.76998 9.72539C7.82833 9.82523 7.8588 9.89655 7.8588 9.93934C7.8588 10.0703 7.82444 10.2408 7.75507 10.4515C7.6831 10.6622 7.59817 10.7673 7.49573 10.7673C7.48601 10.7673 7.44581 10.7601 7.37579 10.7452C7.13329 10.6728 6.9143 10.5375 6.74108 10.353C6.55724 10.1617 6.41215 9.93675 6.31383 9.69038C6.21579 9.44489 6.13943 9.19129 6.08562 8.93248C6.02749 8.6876 5.99876 8.43665 6.00004 8.18496Z" fill="currentColor" />
														<circle cx="10" cy="10" r="9.5" stroke="currentColor" />
												</svg>
										</a>
										<a class="icon" href="https://wa.me/+79266491619" target="_blank" rel="nofollow noopener noreferrer">
											<svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
											    <title>Без названия</title>
											    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											        <g id="Без-названия">
											            <circle id="Oval" stroke="currentColor" cx="10" cy="10" r="9.5"></circle>
											            <g id="whatsapp" transform="translate(4.000000, 4.000000)" fill="currentColor" fill-rule="nonzero">
											                <path d="M5.8514625,0 L5.8485375,0 C2.62299375,0 0,2.623725 0,5.85 C0,7.1296875 0.412425,8.315775 1.11369375,9.27883125 L0.3846375,11.4521063 L2.63323125,10.7332875 C3.5582625,11.346075 4.66171875,11.7 5.8514625,11.7 C9.07700625,11.7 11.7,9.07554375 11.7,5.85 C11.7,2.62445625 9.07700625,0 5.8514625,0 Z M9.25543125,8.26093125 C9.1143,8.6594625 8.5541625,8.9899875 8.10736875,9.0865125 C7.80170625,9.15159375 7.40244375,9.2035125 6.05840625,8.6463 C4.3392375,7.9340625 3.232125,6.18710625 3.1458375,6.0737625 C3.06320625,5.96041875 2.45115,5.14873125 2.45115,4.30925625 C2.45115,3.46978125 2.87746875,3.0610125 3.0493125,2.8855125 C3.19044375,2.74145625 3.4237125,2.67564375 3.647475,2.67564375 C3.71986875,2.67564375 3.78495,2.6793 3.84345,2.682225 C4.01529375,2.6895375 4.10158125,2.699775 4.214925,2.97106875 C4.35605625,3.3111 4.69974375,4.150575 4.74069375,4.2368625 C4.782375,4.32315 4.82405625,4.44015 4.76555625,4.55349375 C4.7107125,4.67049375 4.66245,4.7224125 4.5761625,4.8218625 C4.489875,4.9213125 4.407975,4.9973625 4.3216875,5.104125 C4.2427125,5.19699375 4.1535,5.29644375 4.25295,5.4682875 C4.3524,5.636475 4.6960875,6.19734375 5.2021125,6.64779375 C5.85511875,7.2291375 6.38454375,7.414875 6.5739375,7.49385 C6.71506875,7.55235 6.88325625,7.53845625 6.9863625,7.42876875 C7.11725625,7.2876375 7.2788625,7.0536375 7.44339375,6.82329375 C7.56039375,6.65803125 7.70810625,6.63755625 7.86313125,6.69605625 C8.02108125,6.7509 8.8569,7.16405625 9.02874375,7.2496125 C9.2005875,7.3359 9.31393125,7.37685 9.3556125,7.44924375 C9.3965625,7.5216375 9.3965625,7.86166875 9.25543125,8.26093125 Z" id="Shape"></path>
											            </g>
											        </g>
											    </g>
											</svg>
										</a>
										<a class="icon" href="https://t.me/lavendercastle" target="_blank" rel="nofollow noopener noreferrer">
											<svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
											    <title>Без названия</title>
											    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											        <g id="Без-названия">
											            <circle id="Oval" stroke="currentColor" cx="10" cy="10" r="9.5"></circle>
											            <g id="telegram" transform="translate(3.000000, 5.000000)" fill="currentColor" fill-rule="nonzero">
											                <path d="M4.57901625,6.43205422 L4.385975,9.14727422 C4.662165,9.14727422 4.7817825,9.02862922 4.92522625,8.88615797 L6.22011,7.64865172 L8.9032375,9.61358797 C9.3953225,9.88783297 9.74201875,9.74341672 9.874765,9.16088922 L11.6359625,0.908254219 L11.6364488,0.907767969 C11.792535,0.180337969 11.3733875,-0.104118281 10.893945,0.0743354687 L0.5416825,4.03775922 C-0.16483875,4.31200422 -0.15414125,4.70586672 0.42157875,4.88432047 L3.0682375,5.70754172 L9.21589625,1.86081797 C9.505215,1.66923547 9.76827625,1.77523797 9.551895,1.96682047 L4.57901625,6.43205422 Z" id="Path"></path>
											            </g>
											        </g>
											    </g>
											</svg>
										</a>
							</div>
					</div>
					<div class="header__col">
	          <a class="header__mobile-phone" href="tel:+74955327357">
	            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
	                    <g clip-path="url(#clip0)">
	                        <path d="M5.90738 21C6.58526 21 7.25739 20.8802 7.91464 20.6414C10.8101 19.5895 13.4978 17.8764 15.6871 15.6871C17.8764 13.4978 19.5896 10.8101 20.6414 7.91462C20.9794 6.9841 21.0791 6.02355 20.9378 5.05956C20.8053 4.1566 20.4556 3.28001 19.9262 2.52453C19.3946 1.76573 18.6858 1.13461 17.8765 0.699411C17.0135 0.235338 16.0715 0 15.0767 0C14.7673 0 14.4998 0.216185 14.435 0.518703L13.405 5.3255C13.3583 5.54316 13.4252 5.76964 13.5826 5.92705L15.3426 7.68704C13.6823 10.9881 10.9882 13.6822 7.68714 15.3425L5.92715 13.5825C5.76974 13.4251 5.54322 13.3583 5.3256 13.4049L0.518803 14.4349C0.216243 14.4997 0.000101121 14.7672 0.000101121 15.0766C0.000101121 16.0714 0.235439 17.0134 0.699552 17.8764C1.13475 18.6857 1.76587 19.3945 2.52467 19.9262C3.28011 20.4555 4.1567 20.8053 5.0597 20.9377C5.34266 20.9792 5.62557 21 5.90738 21V21ZM15.601 1.34116C16.9132 1.48602 18.0779 2.17382 18.8514 3.27771C19.7211 4.519 19.9239 6.04574 19.4078 7.46655C17.3857 13.0332 13.0332 17.3856 7.46657 19.4078C6.0458 19.9239 4.51906 19.7211 3.27773 18.8514C2.17384 18.0779 1.48603 16.9132 1.34117 15.601L5.25148 14.7631L7.08957 16.6011C7.28516 16.7967 7.58235 16.8487 7.83261 16.7311C11.7367 14.8969 14.8969 11.7367 16.7311 7.8326C16.8487 7.58229 16.7967 7.2851 16.6011 7.08955L14.7631 5.25147L15.601 1.34116Z" fill="#C79B6B" />
	                    </g>
	                    <defs>
	                        <clipPath id="clip0">
	                            <rect width="21" height="21" fill="white" transform="matrix(-1 0 0 1 21 0)" />
	                        </clipPath>
	                    </defs>
	            </svg>
	          </a>
	          <div class="header__phone">+7 (495) 532-73-57<span class="header__callback">Заказать звонок</span></div>
	          <div class="header__phone">8 (800) 550-37-15<span>Звонок бесплатный</span></div>
	        </div>

					<div class="header__col">
						<input type="checkbox" id="search-trigger" />
						<label class="header__search-trigger" for="search-trigger">
							<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M6.56958 13.1392C2.93104 13.1392 0 10.2081 0 6.56958C0 2.93104 2.93104 0 6.56958 0C10.2081 0 13.1392 2.93104 13.1392 6.56958C13.1392 10.2081 10.2081 13.1392 6.56958 13.1392ZM6.56958 1.0107C3.48693 1.0107 1.0107 3.48693 1.0107 6.56958C1.0107 9.65223 3.48693 12.1285 6.56958 12.1285C9.65223 12.1285 12.1285 9.65223 12.1285 6.56958C12.1285 3.48693 9.65223 1.0107 6.56958 1.0107Z" fill="currentColor" />
									<path d="M11.4646 10.7473L16.0026 15.2854L15.2881 15.9999L10.75 11.4619L11.4646 10.7473Z" fill="currentColor" />
							</svg>
						</label>
						<form class="header__search" action="/search">
							<input type="text" name="q" value="<?=$_REQUEST['q']?>" placeholder="Поиск по сайту" autocomplete="off" />
							<button>
								<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M6.56958 13.1392C2.93104 13.1392 0 10.2081 0 6.56958C0 2.93104 2.93104 0 6.56958 0C10.2081 0 13.1392 2.93104 13.1392 6.56958C13.1392 10.2081 10.2081 13.1392 6.56958 13.1392ZM6.56958 1.0107C3.48693 1.0107 1.0107 3.48693 1.0107 6.56958C1.0107 9.65223 3.48693 12.1285 6.56958 12.1285C9.65223 12.1285 12.1285 9.65223 12.1285 6.56958C12.1285 3.48693 9.65223 1.0107 6.56958 1.0107Z" fill="currentColor" />
										<path d="M11.4646 10.7473L16.0026 15.2854L15.2881 15.9999L10.75 11.4619L11.4646 10.7473Z" fill="currentColor" />
								</svg>
							</button>
						</form>
					</div>

					<div class="header__col header__icons">

						<div class="header__personal">
							<?
							global $USER;
							if (!$USER->IsAuthorized()):
							?>
								<a class="login-trigger">Личный кабинет</a>
								<a class="login-trigger icon header__icon">
	                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
	                    <path d="M16.8564 10.6308C16.4799 11.0055 16.057 11.3514 15.5712 11.6636C18.3441 12.9206 20.2161 15.2839 20.2161 17.9863C20.2161 19.4464 16.1679 20.5903 10.9999 20.5903C5.83201 20.5903 1.78376 19.4464 1.78376 17.9863C1.78376 15.2839 3.65579 12.9206 6.42869 11.6636C5.94297 11.3514 5.52001 11.0055 5.14347 10.6308C2.05551 12.1719 0 14.8928 0 17.9863C0 18.9233 0.649262 20.2293 3.74253 21.1294C5.67201 21.6908 8.24942 22 11 22C13.7506 22 16.328 21.6908 18.2575 21.1294C21.3507 20.2293 22 18.9233 22 17.9863C21.9999 14.8928 19.9444 12.1719 16.8564 10.6308Z" fill="currentColor" />
	                    <path d="M10.9999 11.5597C14.4666 11.5597 17.1361 8.91144 17.1361 5.77989C17.1361 2.64689 14.4652 0 10.9999 0C7.53316 0 4.86365 2.64828 4.86365 5.77984C4.86365 8.91284 7.53456 11.5597 10.9999 11.5597ZM10.9999 1.40971C13.3998 1.40971 15.3523 3.37013 15.3523 5.77984C15.3523 8.18955 13.3998 10.15 10.9999 10.15C8.59995 10.15 6.64741 8.18955 6.64741 5.77984C6.64741 3.37013 8.59995 1.40971 10.9999 1.40971Z" fill="currentColor" />
	                </svg>
	              </a>
							<?else:?>
	              <a href="/personal/"><?=$USER->GetFullName()?></a>
	              <a class="icon header__icon" href="">
	                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
	                    <path d="M16.8564 10.6308C16.4799 11.0055 16.057 11.3514 15.5712 11.6636C18.3441 12.9206 20.2161 15.2839 20.2161 17.9863C20.2161 19.4464 16.1679 20.5903 10.9999 20.5903C5.83201 20.5903 1.78376 19.4464 1.78376 17.9863C1.78376 15.2839 3.65579 12.9206 6.42869 11.6636C5.94297 11.3514 5.52001 11.0055 5.14347 10.6308C2.05551 12.1719 0 14.8928 0 17.9863C0 18.9233 0.649262 20.2293 3.74253 21.1294C5.67201 21.6908 8.24942 22 11 22C13.7506 22 16.328 21.6908 18.2575 21.1294C21.3507 20.2293 22 18.9233 22 17.9863C21.9999 14.8928 19.9444 12.1719 16.8564 10.6308Z" fill="currentColor" />
	                    <path d="M10.9999 11.5597C14.4666 11.5597 17.1361 8.91144 17.1361 5.77989C17.1361 2.64689 14.4652 0 10.9999 0C7.53316 0 4.86365 2.64828 4.86365 5.77984C4.86365 8.91284 7.53456 11.5597 10.9999 11.5597ZM10.9999 1.40971C13.3998 1.40971 15.3523 3.37013 15.3523 5.77984C15.3523 8.18955 13.3998 10.15 10.9999 10.15C8.59995 10.15 6.64741 8.18955 6.64741 5.77984C6.64741 3.37013 8.59995 1.40971 10.9999 1.40971Z" fill="currentColor" />
	                </svg>
	              </a>
	              <div class="header__personal-drop">
	                    <div class="header__personal-drop__nav">
												<?
												CModule::IncludeModule("sale");
												$ar = CSaleUserAccount::GetByUserID($USER->GetID(),"RUB");
												?>
												<a href="/personal/">Бонусы: <span><?=SaleFormatCurrency($ar["CURRENT_BUDGET"], $ar["CURRENCY"])?></span></a>
	                      <a href="/personal/userdata/">Личные данные</a>
	                      <a href="/personal/orders/">История заказов</a>
												<a href="<?echo $APPLICATION->GetCurPageParam("logout=yes", array(
												"login",
												"logout",
												"register",
												"forgot_password",
												"change_password"));?>">Выйти</a>
	                    </div>
	              </div>
							<?endif;?>
            </div>

						<a class="icon header__icon" href="/shop/wishlist">
							<svg width="24px" height="22px" viewBox="0 0 24 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							    <title>heart</title>
							    <g id="Page-1" stroke="none" stroke-width="1.5" fill="none" fill-rule="evenodd">
							        <g id="Vector" fill="none" fill-rule="nonzero" stroke="currentColor">
							            <path d="M3.89992273,1.20786181 C5.00718005,0.786213476 6.33601293,0.682385678 7.76049583,1.09706761 C9.23761411,1.52373851 10.5263405,2.43872989 11.4162622,3.69256573 C11.5648722,3.90194652 11.7008923,4.11870729 11.8240802,4.34167299 C11.9471568,4.11868734 12.0831585,3.90192525 12.2317521,3.69254558 C13.1215759,2.43871645 14.4103452,1.52373582 15.8867684,1.09726516 C17.3106574,0.688170623 18.642401,0.793879955 19.7522044,1.21649998 C21.006857,1.69427946 21.9795919,2.57462837 22.4614031,3.56343067 C23.1089014,4.8894626 23.2971089,6.29820753 23.0301859,7.77898788 C22.7553233,9.30381397 22.0039611,10.899829 20.7922115,12.561619 C18.8784984,15.1821181 16.1597687,17.8346566 12.2458163,20.8990234 C7.49074687,17.8326387 4.76913873,15.1817553 2.85595641,12.5619038 C1.64396075,10.8998255 0.892578382,9.30381277 0.617708757,7.7789885 C0.350778889,6.2982096 0.538992654,4.88946615 1.186692,3.56305947 C1.66925083,2.57273846 2.64251392,1.68668847 3.89992273,1.20786181 Z" id="Shape"></path>
							        </g>
							    </g>
							</svg>
							<span class="icon__num icon__num--wishlist" style="<?=count($_SESSION['wishlist']) ? '' : 'display: none'?>">
								<?=$wishlist?>
							</span>
						</a>
						<?$APPLICATION->IncludeComponent(
							"bitrix:sale.basket.basket.line",
							"lz",
							array(
								"PATH_TO_BASKET" => "/shop/cart/",
								"PATH_TO_PERSONAL" => "/",
								"SHOW_PERSONAL_LINK" => "N",
								"SHOW_NUM_PRODUCTS" => "Y",
								"SHOW_TOTAL_PRICE" => "Y",
								"SHOW_PRODUCTS" => "N",
								"POSITION_FIXED" =>"N",
								"SHOW_AUTHOR" => "Y",
								"PATH_TO_REGISTER" => "/",
								"PATH_TO_PROFILE" => "/"
							),
							false,
							array()
						);?>
					</div>
					<?if ($curPage != SITE_DIR."index.php"):?>
						<a class="header__logo" href="/">
							<img width="100" height="92" src="<?=SITE_TEMPLATE_PATH?>/img/logo.svg" alt="Логотип Лавандового Замка"/>
						</a>
					<?else:?>
						<div class="header__logo">
							<img width="100" height="92" src="<?=SITE_TEMPLATE_PATH?>/img/logo.svg" alt="Логотип Лавандового Замка"/>
						</div>
					<?endif;?>
			</div>
			<?$APPLICATION->IncludeComponent(
				"bitrix:menu",
				"lavender",
				array(
					"ROOT_MENU_TYPE" => "left",
					"MENU_CACHE_TYPE" => "A",
					"MENU_CACHE_TIME" => "36000000",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"MENU_THEME" => "site",
					"CACHE_SELECTED_ITEMS" => "N",
					"MENU_CACHE_GET_VARS" => array(),
					"MAX_LEVEL" => "3",
					"CHILD_MENU_TYPE" => "left",
					"USE_EXT" => "Y",
					"DELAY" => "N",
					"ALLOW_MULTI_SELECT" => "N",
					"COMPONENT_TEMPLATE" => "lavender"
				),
				false
			);?>
	</header>

	<main class="main">
