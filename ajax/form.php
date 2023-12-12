<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$sendto = 'hello@lavendercastle.ru';

$content = '
<p>Имя: '.$name.'</p>
<p>Телефон: '.$phone.'</p>
<p>Комментарий:</p><p>'.$message.'</p>';

$token = '1624880439:AAGDgOb-dqC1dnRThf1BbTq62H28yOZD70U';
$chat_id = '-542975461';
//Передаем данные боту
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$content}","r");

$altcontent = 'Имя - '.$name.', Телефон - '.$phone.' ,Сообщение - '.$message;

$bitrix24Webhook = "https://bitrix24.lavendercastle.ru/rest/1493/xx93e430cx494n78/";
$formData = [
  "title" => "Заявка с сайта lavendercastle.ru",
  "name" => $name,
  "phone" => $phone,
  "comments" => $message
];

$result = sendLead([
  "fields" => [
    "TITLE" => $formData["title"],
    "NAME" => $formData["name"],
    "PHONE" => [["VALUE" => $formData["phone"], "VALUE_TYPE" => "WORK"]],
    "COMMENTS" => $formData["comments"]
  ]
], $bitrix24Webhook);

if (($phone!='')&&($name!='')){

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
  $mail->Subject = 'Собрать свой букет. Лавандовый Замок.';

  $mail->AddAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);

  //convert HTML into a basic plain-text alternative body
  $mail->msgHTML($content);

  //Replace the plain text body with one created manually
  $mail->AltBody = $altcontent;

  //send the message, check for errors
  if (!$mail->send()) {

  } else {
    echo '<div class="form__answer-success">Спасибо! Мы получили вашу заявку и свяжемся с вами в самое ближайшее время</div>';
    exit;
  }
} else {
  echo '<div class="form__answer-error">Пожалуйста, заполните имя и телефон.</div>';
}

function sendLead($params, $bitrix24Webhook) {
  $queryURL = $bitrix24Webhook . "crm.lead.add.json";
  $queryData = http_build_query($params);

  $curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_POST => 1,
		CURLOPT_HEADER => 0,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => $queryURL,
		CURLOPT_POSTFIELDS => $queryData,
	));
	$result = curl_exec($curl);
	curl_close($curl);
	$result = json_decode($result,1);

  if (empty($result["error"])) {
    return "Создан лид с ID " . $result["result"];
  } else {
    return "Ошибка при создании лида " . $result["error"] . ": " . $result["error_description"];
  }
}
?>
