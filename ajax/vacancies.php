<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$sendto = 'hello@lavendercastle.ru';

$content = '
<p>Вакансия: '.$_POST['vacancy'].'</p>
<p>Название вакансии: '.$_POST['vacname'].'</p>
<p>Имя: '.$name.'</p>
<p>Возраст: '.$_POST['age'].'</p>
<p>E-mail: '.$email.'</p>
<p>Телефон: '.$phone.'</p>
<p>График работы: '.$_POST['graphic'].'</p>
<p>Семейное положение: '.$_POST['family'].'</p>
<p>Опишите свой опыт в продажах: <br />'.$_POST['exp'].'</p>
<p>Ваше последнее место работы. Почему вы ушли? <br />'.$_POST['last'].'</p>
<p>Почему вы хотите работать именно у нас? <br />'.$_POST['why'].'</p>
<p>Как давно вы знаете о студии Лавандовый Замок? <br />'.$_POST['howlong'].'</p>
<p>Чем вы можете быть полезным Лавандовому Замку? <br />'.$_POST['useful'].'</p>
<p>Чем Лавандовый Замок может быть полезен вам? <br />'.$_POST['useful2'].'</p>
<p>Ожидаемый доход <br />'.$_POST['dohod'].'</p>
<p>Расскажите о себе в 3-5 предложениях <br />'.$_POST['about'].'</p>
<p>Есть ли у вас аллергические реакции? Опишите какие <br />'.$_POST['allergy'].'</p>
<p>Ваша суперсила <br />'.$_POST['superpower'].'</p>
<p>Ссылка на ваш инстаграм <br />'.$_POST['insta'].'</p>
<p>Докажите, что вы не робот: <br />'.$_POST['robot'].'</p>';

$altcontent = 'Имя - '.$name.', Телефон - '.$phone.', E-mail - '.$email.' ,Вакансия - '.$_POST['vacancy'];


if (($email!='')&&($phone!='')&&($name!='')&&($_POST['age']!='')&&($_POST['graphic']!='')&&($_POST['family']!='')&&($_POST['exp']!='')&&($_POST['last']!='')&&($_POST['why']!='')&&($_POST['howlong']!='')&&($_POST['useful']!='')&&($_POST['useful2']!='')&&($_POST['about']!='')&&($_POST['robot']!='')&&($_POST['allergy']!='')&&($_POST['superpower']!='')&&($_POST['insta']!='')){

  date_default_timezone_set('Etc/UTC');

  require 'mailer/PHPMailerAutoload.php';

  //Create a new PHPMailer instance
  $mail = new PHPMailer;
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

  $mail->Host = 'smtp.yandex.ru';
  $mail->Port = 465;
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'ssl';
  $mail->SMTPOptions = array (
      'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true)
  );

  //Username to use for SMTP authentication - use full email address for gmail
  $mail->Username = "noreply@lavendercastle.ru";

  $token = '1624880439:AAGDgOb-dqC1dnRThf1BbTq62H28yOZD70U';
  $chat_id = '-542975461';
  //Передаем данные боту
  $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$content}","r");

  //Password to use for SMTP authentication
  $mail->Password = "4HJ-sbq-C2c-MXZ";

  //Set who the message is to be sent from
  $mail->setFrom("noreply@lavendercastle.ru", 'Лавандовый Замок');
  $mail->AddReplyTo($email, $name);
  //Set who the message is to be sent to
  $mail->addAddress($sendto, 'Лавандовый Замок');
  $mail->addAddress('korotychm@hotmail.com', 'Михаил Коротыч');

  //Set the subject line
  $mail->Subject = 'Отклик на вакансию. Лавандовый Замок.';

  //convert HTML into a basic plain-text alternative body
  $mail->msgHTML($content);

  //Replace the plain text body with one created manually
  $mail->AltBody = $altcontent;

  //send the message, check for errors
  if (!$mail->send()) {

  } else {
    echo '<div class="header__popup-success">Спасибо! Мы получили вашу анкету и ответим вам в самое ближайшее время.</div>';
  }

} else {
  echo '<div class="header__popup-error">Пожалуйста, заполните необходимые поля (*).</div>';
}
?>
