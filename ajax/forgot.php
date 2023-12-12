<?
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
global $USER;
if ($_POST['email']!='') {

  // Ищем пользователя по email

  $cUser = $USER::GetList(
    $by="ID",
    $order="desc",
    [
        'EMAIL' => $_POST['email']
    ],
    [
        'SELECT' => [
            'ID'
        ]
    ]
  )->fetch();

  $userLogin = $cUser['LOGIN'];

  if ($cUser['LOGIN']!=''){

    $rsUser = CUser::GetByLogin($userLogin);
    $arUser = $rsUser->Fetch();

    $authLink = 'https://lavendercastle.ru/personal/userdata/?email='.$_POST['email'].'&auth='.$arUser['UF_AUTH'];

    // отправляем e-mail
	global $USER;
    $arResult = $USER->SendPassword($cUser['LOGIN'], $_POST['email']);
    if($arResult["TYPE"] == "OK")  echo '<div class="header__popup-success">Перейдите по ссылке в письме и поменяйте пароль в личном кабинете.</div>';
    else echo '<div class="header__popup-error">Пользователь с таким E-mail не найден</div>';

  } else {
    echo '<div class="header__popup-error">Пользователь с таким E-mail не найден</div>';
  }

} elseif ($_POST['phone']!='') {

  // Ищем пользователя по телефону

  $userPhone = str_replace([' ','-','(',')','+'],'',$_POST["phone"]);

  $cUser = $USER::GetList(
    $by="ID",
    $order="desc",
    [
        'PERSONAL_PHONE' => $userPhone
    ],
    [
        'SELECT' => [
            'ID'
        ]
    ]
  )->fetch();

  $userLogin = $cUser['LOGIN'];

  if ($cUser['LOGIN']!=''){

    // отправляем смс
    $smsCode = substr(str_shuffle('0123456789'),0,6);

    $dbResult = CUser::GetByLogin($userLogin);
    $arUser = $dbResult->Fetch();
    $userid = intval($arUser['ID']);
    $user_update = new CUser;
    $fields = Array(
         "UF_SMS"   => $smsCode
    );
    if(!$user_update->Update($arUser['ID'], $fields)) {
        //вывод ошибки добавления данных пользователю
       echo $user_update->LAST_ERROR;
    } else {

      echo 'smscode'; // Откроет форму для ввода кода из смс

    }

  } else {
    echo '<div class="header__popup-error">Пользователь с таким номером телефона не найден</div>';
  }

}

?>
