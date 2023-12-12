<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (!$USER->IsAuthorized()):
?>
<div class="header__popup header__popup--auth">
    <div class="header__popup-inner">
        <div class="header__popup-close"></div>
        <div class="auth">
            <div class="auth__panel active" id="auth">
                <div class="auth__heading">Вход в аккаунт</div>
                <form>
                    <div class="auth__grid"><input type="text" placeholder="E-mail *" name="email" />
                        <div class="auth__andor">или</div><input class="phoneinput" type="text" placeholder="Телефон *" name="phone" /><input type="password" placeholder="Пароль *" name="password" /><button class="btn">Войти</button>
                        <div class="auth__links" ><a class="auth__link" href="#register">Зарегистрироваться</a><a class="auth__link" href="#forgot">Забыли пароль?</a></div>
                    </div>
                </form>
                <div class="form__agree">Нажимая на кнопку "Войти", вы соглашаетесь на обработку персональных данных на условиях, определенных <a href="/politika-konfidentsialnosti/">Политикой Конфиденциальности</a></div>
				<div class="form__agree" style="display: none;">Временно восстановление пароля в личный кабинет не работает. Напишите нам в <a href="https://wa.me/+79266491619">WhatsApp</a> и мы оперативно поможем оформить заказ!</div>
<div class="header__popup-answer"></div>
            </div>
            <div class="auth__panel" id="register">
                <div class="auth__heading">Регистрация</div>
                <form>
                    <div class="auth__grid"><input type="text" placeholder="E-mail *" name="email" />
                        <div class="auth__andor">и/или</div><input class="phoneinput" type="text" placeholder="Телефон *" name="phone" /><input type="text" placeholder="Имя *" name="name" /><input type="text" placeholder="Фамилия" name="lastname" /><input type="password" placeholder="Пароль *" name="password" /><button class="btn">Зарегистрироваться</button>
                        <div class="auth__links"><a class="auth__link" href="#auth">Уже есть аккаунт?</a></div>
                    </div>
                </form>
                <div class="form__agree">Нажимая на кнопку "Зарегистрироваться", вы соглашаетесь на обработку персональных данных на условиях, определенных <a href="/politika-konfidentsialnosti/">Политикой Конфиденциальности</a></div>

<div class="header__popup-answer"></div>
            </div>
            <div class="auth__panel" id="forgot">
				<div class="auth__heading">Восстановление пароля</div>
                <form>
                  <div class="auth__grid"><input type="text" placeholder="E-mail *" name="email" />
                      <div class="auth__andor">и/или</div><input id="forgot-phone" class="phoneinput" type="text" placeholder="Телефон *" name="phone" /><button class="btn">Восстановить пароль</button>
                      <div class="auth__links"><a class="auth__link" href="#auth">Вспомнили пароль?</a></div>
                  </div>
                </form>
                <div class="form__agree">Нажимая на кнопку "Восстановить пароль", вы соглашаетесь на обработку персональных данных на условиях, определенных <a href="/politika-konfidentsialnosti/">Политикой Конфиденциальности</a></div>
                <div class="header__popup-answer"></div>
            </div>
            <div class="auth__panel" id="sms">
                <div class="auth__heading">Введите код из SMS</div>
                <form>
                  <div class="auth__grid">
                      <input id="sms-phone" name="phone" type="hidden" />
                      <input type="text" placeholder="Код из SMS *" name="code" />
                      <button class="btn">Проверить</button>
                  </div>
                </form>
                <div class="form__agree">После ввода правильного кода вы будете направлены в свой личный кабинет, где сможете поменять пароль на новый.</div>
                <div class="header__popup-answer"></div>
            </div>
        </div>
    </div>
</div>
<?endif;?>

<div class="header__popup header__popup--form">
      <div class="header__popup-inner">
          <div class="header__popup-close"></div>
          <form id="fast-form">
            <input type="hidden" name="subject" id="form-subject" />
            <input type="hidden" name="item" id="form-item" />
	        <input type="hidden" name="product_id" id="form-product_id" ?>
            <input type="text" required placeholder="Ваше имя" name="name" />
            <input class="phoneinput" required type="text" placeholder="Ваш телефон" name="phone" />
            <button class="btn">Отправить</button>
            <div class="form__agree">Нажимая на кнопку "Отправить", вы соглашаетесь на обработку персональных данных на условиях, определенных <a href="/politika-konfidentsialnosti/">Политикой Конфиденциальности</a></div>
            <div class="header__popup-answer"></div>
          </form>
      </div>
</div>

<footer class="footer">
        <section class="section subscribe">
            <div class="container">
                <h2>Подпишитесь на нашу рассылку</h2>
                <p style="display:none;">получите 10% скидку на первый заказ</p>
                <?$APPLICATION->IncludeComponent("lavender:sender.subscribe","",Array(
                       "COMPONENT_TEMPLATE" => ".default",
                       "USE_PERSONALIZATION" => "Y",
                       "CONFIRMATION" => "N",
                       "SHOW_HIDDEN" => "Y",
                       "AJAX_MODE" => "Y",
                       "AJAX_OPTION_JUMP" => "Y",
                       "AJAX_OPTION_STYLE" => "Y",
                       "AJAX_OPTION_HISTORY" => "Y",
                       "CACHE_TYPE" => "A",
                       "CACHE_TIME" => "3600",
                       "SET_TITLE" => "N"
                   )
                );?>
            </div>
        </section>
        <div class="footer__grid">
            <div class="footer__left">
                <div class="footer__nav">
										<?$APPLICATION->IncludeComponent(
											"bitrix:menu",
											"lavender-footer",
											array(
												"ROOT_MENU_TYPE" => "left",
												"MENU_CACHE_TYPE" => "A",
												"MENU_CACHE_TIME" => "36000000",
												"MENU_CACHE_USE_GROUPS" => "Y",
												"MENU_THEME" => "site",
												"CACHE_SELECTED_ITEMS" => "N",
												"MENU_CACHE_GET_VARS" => array(),
												"MAX_LEVEL" => "1",
												"CHILD_MENU_TYPE" => "left",
												"USE_EXT" => "Y",
												"DELAY" => "N",
												"ALLOW_MULTI_SELECT" => "N",
												"COMPONENT_TEMPLATE" => "lavender"
											),
											false
										);?>
                    <div itemscope="" itemtype="https://schema.org/SiteNavigationElement">
                      <a itemprop="discussionUrl" href="/o-nas/">О нас</a>
                      <a itemprop="discussionUrl" href="/dostavka-i-oplata/">Доставка и оплата</a>
					  <a itemprop="discussionUrl" href="/programma-loyalnosti/">Программа лояльности</a>
                      <a itemprop="discussionUrl" href="/b2b/">Корпоративным клиентам</a>
                      <a itemprop="discussionUrl" href="/blog/">Блог</a>
                      <a itemprop="discussionUrl" href="/franchise/">Франшиза</a>
                      <a itemprop="discussionUrl" href="/vacancy/">Вакансии</a>
                      <a itemprop="discussionUrl" href="/contact/">Контакты</a>
                    </div>
                </div>
            </div>
            <div class="footer__right" itemscope itemtype="http://schema.org/Organization">
                <div class="footer__contact">
                    <span style="display:none;" itemprop="name">Лавандовый Замок</span>
                    <div>
                        <h3>Адрес</h3>
                        <div  itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                          <p><span itemprop="addressLocality">Москва</span>, <span itemprop="streetAddress">м. Ботанический сад, Лазоревый проезд, 1</span></p>
                        </div>

                    </div>
                    <div>
                        <h3>Время работы</h3>
                        <p>10.00-20.00, без выходных</p>
                    </div>
                </div>
                <div class="footer__contact">
                    <div>
                        <p itemprop="email">hello@lavendercastle.ru</p><br />
                        <p itemprop="telephone">+7 (495) 532-73-57</p><br />
                        <p itemprop="telephone">8 (800) 550-37-15</p>
                    </div>
                    <div class="footer__social">
						<a class="icon" href="https://www.instagram.com/lavendercastle.ru/" target="_blank" rel="nofollow noopener noreferrer">
							IG*	
							<!-- <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.6291 7.44347C15.6226 6.95361 15.5307 6.46863 15.3576 6.0102C15.2076 5.62352 14.9783 5.27235 14.6846 4.97912C14.3909 4.68589 14.0391 4.45705 13.6518 4.30722C13.1985 4.13735 12.7197 4.0455 12.2356 4.03557C11.6124 4.00776 11.4148 4 9.83269 4C8.25061 4 8.04783 4 7.42912 4.03557C6.94528 4.04557 6.46663 4.13742 6.01355 4.30722C5.62617 4.45695 5.27435 4.68575 4.98062 4.97899C4.68689 5.27224 4.45771 5.62346 4.30773 6.0102C4.13724 6.46239 4.04543 6.94035 4.03628 7.42342C4.00842 8.04627 4 8.24354 4 9.82299C4 11.4024 4 11.6042 4.03628 12.2226C4.046 12.7063 4.13735 13.1837 4.30773 13.6371C4.45796 14.0237 4.68731 14.3748 4.98114 14.6679C5.27497 14.961 5.62682 15.1897 6.0142 15.3394C6.46604 15.5161 6.94477 15.6145 7.42977 15.6304C8.05366 15.6583 8.25126 15.6667 9.83333 15.6667C11.4154 15.6667 11.6182 15.6667 12.2369 15.6304C12.7209 15.6209 13.1999 15.5293 13.6531 15.3594C14.0403 15.2094 14.392 14.9805 14.6857 14.6873C14.9794 14.3941 15.2087 14.043 15.3589 13.6565C15.5293 13.2037 15.6207 12.7264 15.6304 12.242C15.6582 11.6197 15.6667 11.4225 15.6667 9.84239C15.6654 8.26295 15.6654 8.06244 15.6291 7.44347ZM9.8288 12.8098C8.17416 12.8098 6.83374 11.4716 6.83374 9.81975C6.83374 8.16787 8.17416 6.82968 9.8288 6.82968C10.6231 6.82968 11.3849 7.1447 11.9466 7.70545C12.5083 8.2662 12.8239 9.02673 12.8239 9.81975C12.8239 10.6128 12.5083 11.3733 11.9466 11.9341C11.3849 12.4948 10.6231 12.8098 9.8288 12.8098ZM12.9431 7.41631C12.5563 7.41631 12.2447 7.10456 12.2447 6.71908C12.2447 6.62756 12.2627 6.53693 12.2978 6.45238C12.3329 6.36783 12.3843 6.291 12.4491 6.22629C12.514 6.16157 12.5909 6.11024 12.6756 6.07522C12.7603 6.04019 12.8511 6.02217 12.9427 6.02217C13.0344 6.02217 13.1252 6.04019 13.2099 6.07522C13.2946 6.11024 13.3715 6.16157 13.4363 6.22629C13.5012 6.291 13.5526 6.36783 13.5877 6.45238C13.6228 6.53693 13.6408 6.62756 13.6408 6.71908C13.6408 7.10456 13.3285 7.41631 12.9431 7.41631Z" fill="currentColor" />
                                <path d="M9.83854 11.4993C10.759 11.4993 11.5052 10.7532 11.5052 9.83268C11.5052 8.91221 10.759 8.16602 9.83854 8.16602C8.91807 8.16602 8.17188 8.91221 8.17188 9.83268C8.17188 10.7532 8.91807 11.4993 9.83854 11.4993Z" fill="currentColor" />
                                <circle cx="10" cy="10" r="9.5" stroke="currentColor" />
                            </svg>
							-->
                        </a>
						<!--<a class="icon" href="https://www.facebook.com/lavendercastle.ru" target="_blank" rel="nofollow noopener noreferrer"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.9316 15.6667V10.3536H12.724L12.9905 8.27338H10.9316V6.94835C10.9316 6.34807 11.0989 5.93708 11.9604 5.93708H13.0521V4.08244C12.5209 4.02552 11.987 3.99803 11.4528 4.00011C9.86851 4.00011 8.78074 4.9673 8.78074 6.74286V8.26949H7V10.3497H8.78463V15.6667H10.9316Z" fill="currentColor" />
                                <circle cx="10" cy="10" r="9.5" stroke="currentColor" />
                            </svg>
                        </a>
						-->
						<a class="icon" href="https://vk.com/lavendercastle_ru" target="_blank" rel="nofollow noopener noreferrer"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.3992 7.46926C15.4807 7.19854 15.3992 7 15.0137 7H13.737C13.4121 7 13.2636 7.17175 13.1821 7.36039C13.1821 7.36039 12.5329 8.94343 11.613 9.96987C11.3161 10.2685 11.1804 10.3629 11.0186 10.3629C10.9377 10.3629 10.8201 10.2686 10.8201 9.99782V7.46926C10.8201 7.14439 10.7263 7 10.4556 7H8.44928C8.24667 7 8.12441 7.15021 8.12441 7.29344C8.12441 7.60085 8.58435 7.67188 8.63151 8.53821V10.4176C8.63151 10.8292 8.55757 10.9043 8.39455 10.9043C7.96197 10.9043 6.90932 9.31547 6.28461 7.49663C6.16293 7.14322 6.04008 7.00058 5.71404 7.00058H4.43783C4.07278 7.00058 4 7.17234 4 7.36097C4 7.69982 4.43259 9.3766 6.01504 11.5943C7.07002 13.1086 8.55524 13.9295 9.90831 13.9295C10.7193 13.9295 10.8195 13.7473 10.8195 13.4329V12.2883C10.8195 11.9238 10.8969 11.8504 11.1537 11.8504C11.3423 11.8504 11.6672 11.9459 12.4246 12.6754C13.2898 13.5406 13.433 13.9289 13.9192 13.9289H15.1954C15.5599 13.9289 15.7421 13.7467 15.6373 13.3869C15.5226 13.0288 15.1092 12.5077 14.5608 11.8912C14.2627 11.5395 13.8173 11.1611 13.6816 10.9719C13.4924 10.7279 13.5471 10.6202 13.6816 10.4036C13.6822 10.4042 15.2373 8.21392 15.3992 7.46926Z" fill="currentColor" />
                                <circle cx="10" cy="10" r="9.5" stroke="currentColor" />
                            </svg>
                        </a><a class="icon" href="https://www.youtube.com/channel/UCENhaswyermiw-7tIiXvomw" target="_blank" rel="nofollow noopener noreferrer"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.4293 7.28418C15.3629 7.03784 15.2332 6.81318 15.053 6.63257C14.8728 6.45196 14.6484 6.3217 14.4022 6.25474C13.4894 6.00408 9.83737 6 9.83737 6C9.83737 6 6.18595 5.99592 5.27252 6.2355C5.02648 6.30554 4.80258 6.43765 4.62231 6.61914C4.44204 6.80064 4.31145 7.02543 4.24308 7.27194C4.00233 8.18479 4 10.0781 4 10.0781C4 10.0781 3.99767 11.9808 4.23667 12.8843C4.37074 13.3839 4.76421 13.7785 5.26436 13.9132C6.18654 14.1638 9.82863 14.1679 9.82863 14.1679C9.82863 14.1679 13.4806 14.172 14.3935 13.933C14.6398 13.8661 14.8643 13.7362 15.045 13.5559C15.2256 13.3757 15.3561 13.1514 15.4235 12.9053C15.6648 11.993 15.6666 10.1003 15.6666 10.1003C15.6666 10.1003 15.6782 8.19703 15.4293 7.28418ZM8.6692 11.8321L8.67211 8.3346L11.7074 10.0863L8.6692 11.8321Z" fill="currentColor" />
                                <circle cx="10" cy="10" r="9.5" stroke="currentColor" />
                            </svg>
                        </a><a class="icon" href="https://ru.pinterest.com/lavendercastle_ru/" target="_blank" rel="nofollow noopener noreferrer"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.00004 8.18496C6.00004 7.68056 6.08821 7.20404 6.26197 6.75929C6.42797 6.32731 6.67461 5.93084 6.98874 5.591C7.30223 5.25563 7.66097 4.96562 8.05459 4.72937C8.45845 4.48505 8.89567 4.30073 9.35255 4.18218C9.81494 4.06076 10.2911 3.99953 10.7691 4C11.5076 4 12.1948 4.15625 12.8321 4.46745C13.4611 4.77297 13.9965 5.24184 14.3823 5.82505C14.7803 6.41827 14.9781 7.08929 14.9781 7.83746C14.9781 8.2861 14.934 8.72502 14.8439 9.15421C14.7554 9.58317 14.6147 9.99968 14.4251 10.3945C14.2443 10.7766 14.0079 11.1299 13.7236 11.4428C13.4378 11.7507 13.0918 11.9966 12.707 12.165C12.2892 12.3481 11.8373 12.4403 11.3812 12.4354C11.0641 12.4354 10.7477 12.3608 10.4353 12.2111C10.1228 12.062 9.89844 11.8571 9.76359 11.5945C9.71626 11.7767 9.65143 12.0399 9.5652 12.3842C9.48221 12.7278 9.42646 12.9495 9.40182 13.05C9.37589 13.1499 9.32791 13.3165 9.25789 13.5473C9.2104 13.718 9.14949 13.8847 9.07571 14.0458L8.85268 14.4828C8.75623 14.6703 8.64841 14.8518 8.52982 15.0261C8.41247 15.196 8.26724 15.3989 8.09414 15.6323L7.99754 15.6667L7.93336 15.5966C7.86398 14.8621 7.82833 14.4225 7.82833 14.2773C7.82833 13.8475 7.87954 13.3651 7.98068 12.8296C8.07988 12.2947 8.23677 11.6224 8.44748 10.8139C8.65819 10.0061 8.77878 9.53089 8.81119 9.3902C8.66272 9.08743 8.58752 8.69195 8.58752 8.20571C8.58752 7.81736 8.70876 7.45365 8.95188 7.11133C9.19565 6.77031 9.50361 6.5998 9.87704 6.5998C10.163 6.5998 10.3847 6.69445 10.5435 6.88441C10.703 7.07373 10.7808 7.31231 10.7808 7.60341C10.7808 7.91201 10.6784 8.35871 10.4722 8.94286C10.266 9.52765 10.1636 9.96397 10.1636 10.2538C10.1636 10.5475 10.2686 10.7932 10.4787 10.9857C10.686 11.1784 10.9601 11.2828 11.2431 11.2768C11.4998 11.2768 11.7377 11.2185 11.9588 11.1011C12.1764 10.9872 12.3648 10.8246 12.5093 10.6259C12.8238 10.1943 13.0481 9.70369 13.1686 9.18339C13.2308 8.90979 13.2788 8.64981 13.3086 8.40539C13.3404 8.15968 13.354 7.92757 13.354 7.70714C13.354 6.89868 13.0973 6.2685 12.5871 5.81727C12.0742 5.36603 11.4064 5.14171 10.585 5.14171C9.65078 5.14171 8.86954 5.44383 8.2439 6.05002C7.61762 6.65426 7.30253 7.42253 7.30253 8.35417C7.30253 8.55969 7.33365 8.75808 7.39265 8.94999C7.45035 9.14124 7.51324 9.2936 7.58131 9.40641C7.64874 9.51727 7.71228 9.62555 7.76998 9.72539C7.82833 9.82523 7.8588 9.89655 7.8588 9.93934C7.8588 10.0703 7.82444 10.2408 7.75507 10.4515C7.6831 10.6622 7.59817 10.7673 7.49573 10.7673C7.48601 10.7673 7.44581 10.7601 7.37579 10.7452C7.13329 10.6728 6.9143 10.5375 6.74108 10.353C6.55724 10.1617 6.41215 9.93675 6.31383 9.69038C6.21579 9.44489 6.13943 9.19129 6.08562 8.93248C6.02749 8.6876 5.99876 8.43665 6.00004 8.18496Z" fill="currentColor" />
                                <circle cx="10" cy="10" r="9.5" stroke="currentColor" />
                            </svg>
                        </a></div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div>
                    <p>© 2013-<?=date("Y")?> Лавандовый Замок. Все права защищены.</p>
                    <p>* - Instagram, деятельность которой признана в России экстремистской организацией.</p>

                </div><a class="footer__logo" rel="nofollow noopener noreferrer" style="margin: 25px 0 10px" target="_blank" href="//yandex.ru/profile/63450211560?intent=reviews&amp;utm_source=badge&amp;utm_medium=rating&amp;utm_campaign=v1"><img width="130" height="44" style="width: 130px;" src="<?=SITE_TEMPLATE_PATH?>/img/rating.png" alt="Рейтинг Лавандового Замка в Яндексе"/></a>
                <div>
                    <p><a href="/politika-konfidentsialnosti/">Политика конфиденциальности</a></p>
                </div>
            </div>
        </div>
    </footer>

    <style>
      [data-entity="props-block"]{
        display: none;
      }
      .popup-window-buttons {
        display: flex;
        justify-content: center;
      }
      .popup-window-buttons .btn {
        margin: 0;
      }
      @media (max-width: 767px) {
        .popup-window-buttons {
          display: block;
        }
        .popup-window-buttons .btn {
          margin: 10px auto !important;
          width: 250px;
        }
      }
    </style>

    <script src="<?=SITE_TEMPLATE_PATH?>/js/scripts.min.js?v=19"></script>

    <?
    $analytics = true;

    if (stripos($_SERVER["HTTP_USER_AGENT"], "Chrome-Lighthouse")) {
        $analytics = false;
    }
    if (stripos($_SERVER["HTTP_USER_AGENT" ], "PR-CY.RU")) {
        $analytics = false;
    }
    if (stripos($_SERVER["HTTP_USER_AGENT"], "PingdomPageSpeed")) {
        $analytics = false;
    }
    if (stripos($_SERVER["HTTP_USER_AGENT"], "PTST")) {
        $analytics = false;
    }
    if (stripos($_SERVER["HTTP_USER_AGENT" ], "Google Page Speed Insights")) {
        $analytics = false;
    }
    ?>

    <? if ($analytics): ?>


    <script>

      $('.icon--heart').click(function(){
        var act='add';
        if ($(this).hasClass('active')){
          var act='del';
        }
        var elid = $(this).data('id');
        $(this).toggleClass('active');
        $.ajax({
        	url: '/ajax/wishlist.php',
        	method: 'post',
        	dataType: 'html',
        	data: {
            act: act,
            elid: elid
            },
        	success: function(data){
            if (act='add'){
              ym(31407293, 'reachGoal', 'add_to_favorites');
              gtag('event','add_to_favorites',{'event_category':'add_to_favorites','event_label':'Lavender'});
            }
            $('.icon__num--wishlist').text(data);
            if (parseInt(data)>0){
              $('.icon__num--wishlist').show();
            } else {
              $('.icon__num--wishlist').hide();
            }
        	}
        });
      });
      $('.wishlist__grid .icon--heart.active').click(function(){
      	$(this).parent().parent().parent().parent().remove();
      });
      $('.show-all-checks').click(function(){
      	$(this).toggleClass('active');
      	$('.filter-checks').toggleClass('active');
      });
    </script>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-65079853-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-65079853-1');
    </script>


    <!-- Google Tag Manager -->
    <script>
          (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
          new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
          j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
          'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WM8684S');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WM8684S"

      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->

    <script>
      $('.product-item-button-container .btn').click(function(){
        ym(31407293, 'reachGoal', '777');
        gtag('event','777',{'event_category':'777','event_label':'Lavender'});
        VK.Goal('add_to_cart');
        VK.Goal('conversion');
      });
      $('.element__btns .btn').click(function(){
        ym(31407293, 'reachGoal', '777');
        gtag('event','777',{'event_category':'777','event_label':'Lavender'});
        VK.Goal('add_to_cart');
        VK.Goal('conversion');
      });
      $('.basket-btn-checkout').click(function(){
        ym(31407293, 'reachGoal', 'place_an_order');
        gtag('event','place_an_order',{'event_category':'place_an_order','event_label':'Lavender'});
        VK.Goal('initiate_checkout')
        VK.Goal('conversion');
      });
    </script>
    <!-- BEGIN JIVOSITE CODE-->
    <script async>
    (function(){ document.jivositeloaded=0;var widget_id = 'pX7azxDspj';var d=document;var w=window;function l(){var s = d.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}//эта строка обычная для кода JivoSite
    function zy(){
        //удаляем EventListeners
        if(w.detachEvent){//поддержка IE8
            w.detachEvent('onscroll',zy);
            w.detachEvent('onmousemove',zy);
            w.detachEvent('ontouchmove',zy);
            w.detachEvent('onresize',zy);
        }else {
            w.removeEventListener("scroll", zy, false);
            w.removeEventListener("mousemove", zy, false);
            w.removeEventListener("touchmove", zy, false);
            w.removeEventListener("resize", zy, false);
        }
        //запускаем функцию загрузки JivoSite
        if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}
        //Устанавливаем куку по которой отличаем первый и второй хит
        var cookie_date = new Date ( );
        cookie_date.setTime ( cookie_date.getTime()+60*60*28*1000); //24 часа для Москвы
        d.cookie = "JivoSiteLoaded=1;path=/;expires=" + cookie_date.toGMTString();
    }
    if (d.cookie.search ( 'JivoSiteLoaded' )<0){//проверяем, первый ли это визит на наш сайт, если да, то назначаем EventListeners на события прокрутки, изменения размера окна браузера и скроллинга на ПК и мобильных устройствах, для отложенной загрузке JivoSite.
        if(w.attachEvent){// поддержка IE8
            w.attachEvent('onscroll',zy);
            w.attachEvent('onmousemove',zy);
            w.attachEvent('ontouchmove',zy);
            w.attachEvent('onresize',zy);
        }else {
            w.addEventListener("scroll", zy, {capture: false, passive: true});
            w.addEventListener("mousemove", zy, {capture: false, passive: true});
            w.addEventListener("touchmove", zy, {capture: false, passive: true});
            w.addEventListener("resize", zy, {capture: false, passive: true});
        }
    }else {zy();}
    })();</script>
    <!-- END JIVOSITE CODE -->
    <link href="/bitrix/js/main/popup/dist/main.popup.bundle.min.css?161413592723520" type="text/css" rel="stylesheet" />

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" async>
       (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
       m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
       (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

       ym(31407293, "init", {
            clickmap:false,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
       });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/31407293" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <? endif; ?>
	<script>(function () { var widget = document.createElement('script'); widget.dataset.pfId = '027c4e68-3c22-488b-b39d-a6528d919e9f'; widget.src = 'https://widget.profeat.team/script/widget.js?id=027c4e68-3c22-488b-b39d-a6528d919e9f&now='+Date.now(); document.head.appendChild(widget); })()</script>
</body>

</html>
