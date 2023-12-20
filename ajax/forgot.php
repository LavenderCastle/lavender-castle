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




    $sendto = $_POST['email'];
    $content = $authLink;
  
    require 'mailer/PHPMailerAutoload.php';
    //Create a new PHPMailer instance
    $mail          = new PHPMailer;
    $mail->CharSet = 'utf-8';

    //Tell PHPMailer to use SMTP
    $mail->isSMTP();

    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;

    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';

    $mail->Host        = 'smtp.mail.ru';
    $mail->Port        = 465;
    $mail->SMTPAuth    = true;
    $mail->SMTPSecure  = 'ssl';
    $mail->SMTPOptions = array(
      'ssl' => array(
        'verify_peer'       => false,
        'verify_peer_name'  => false,
        'allow_self_signed' => true
      )
    );

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "nfs2025@mail.ru";

    //Password to use for SMTP authentication
    $mail->Password = "W1s9LGQUERwFS0fXpz66";

    //Set who the message is to be sent from
    $mail->setFrom("nfs2025@mail.ru", 'Лавандовый Замок');
    $mail->AddReplyTo("nfs2025@mail.ru", 'Лавандовый Замок');
    //Set who the message is to be sent to
    $mail->addAddress($sendto, 'Лавандовый Замок');
    // $mail->addAddress('korotychm@hotmail.com', 'Михаил Коротыч');

    //Set the subject line
    $mail->Subject = $subject;

    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML($content);

    //Replace the plain text body with one created manually
    $mail->AltBody = $altcontent;


    //send the message, check for errors
    if (!$mail->send()) {
      print_r('Произошла ошибка!');
      die();
    } else {
      // echo '<div class="header__popup-success">Спасибо! Мы получили вашу заявку и свяжемся с вами в самое ближайшее время.</div>';
    }
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
