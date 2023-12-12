<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

$name = $_POST['name'];
$phone = $_POST['phone'];
$nomer = $_POST['nomer'];
$sendto = 'hello@lavendercastle.ru';

  $content = '
  <p>Имя: '.$name.'</p>
  <p>Телефон: '.$phone.'</p>
  <p>Номер автомобиля: '.$nomer.'</p>';

  $altcontent = 'Имя - '.$name.', Телефон - '.$phone.' , Номер автомобиля - '.$nomer;

if (($phone!='')&&($name!='')&&($nomer!='')){

  $token = '1624880439:AAGDgOb-dqC1dnRThf1BbTq62H28yOZD70U';
  $chat_id = '-542975461';
  //Передаем данные боту
  $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$content}","r");

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

  //Password to use for SMTP authentication
  $mail->Password = "4HJ-sbq-C2c-MXZ";

  //Set who the message is to be sent from
  $mail->setFrom("noreply@lavendercastle.ru", 'Лавандовый Замок');
  $mail->AddReplyTo("noreply@lavendercastle.ru", 'Лавандовый Замок');
  //Set who the message is to be sent to
  $mail->addAddress($sendto, 'Лавандовый Замок');
  $mail->addAddress('korotychm@hotmail.com', 'Михаил Коротыч');

  //Set the subject line
  $mail->Subject = 'Заказ пропуска. Лавандовый Замок.';

  //convert HTML into a basic plain-text alternative body
  $mail->msgHTML($content);

  //Replace the plain text body with one created manually
  $mail->AltBody = $altcontent;

  //send the message, check for errors
  if (!$mail->send()) {

  } else {
    echo '<div class="header__popup-success">Спасибо! Мы получили вашу заявку и свяжемся с вами в самое ближайшее время.</div>';
  }

} else {
  echo '<div class="header__popup-error">Пожалуйста, заполните необходимые поля (*).</div>';
}
?>
