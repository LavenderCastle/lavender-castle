<? define("NO_KEEP_STATISTIC", true);?>
<? define("NOT_CHECK_PERMISSIONS", true); ?>
<? define("NEED_AUTH", true); ?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

  global $USER;

  if ($_POST['email']!=''){
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

  } elseif ($_POST['phone']!=''){
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

  } else {

    echo '<div class="header__popup-error">Введите E-mail или номер телефона.</div>';
    exit;
  }

  if ($userLogin != ''){

    if(!$USER->IsAuthorized()){
		$res = $USER->Login($userLogin, strip_tags($_POST['password']), 'Y');
        if(empty($res['MESSAGE'])){
            echo 'ok';
		    }
        else {
          echo '<a class="header__popup-error auth__link" href="#forgot">Неверный пароль, восстановите его, если забыли.</a>';
        }
    }

  } else {
    echo '<a class="header__popup-error auth__link" href="#register">Пользователь не найден, зарегистрируйтесь.</a>';
  }

}
?>
