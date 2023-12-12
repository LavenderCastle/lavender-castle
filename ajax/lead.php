<?php
if (($_POST['name']!='')&&($_POST['phone']!='')&&($_POST['email']!='')&&($_POST['category']!='')&&($_POST['company']!='')){
  $content = '<b>Имя:</b> '.$_POST['name'].'<br><b>Телефон:</b> '.$_POST['phone'].'<br><b>Email:</b> '.$_POST['email'].'<br><b>Компания:</b> '.$_POST['company'].'<br><b>Вебсайт:</b> '.$_POST['website'].'<br><b>Город:</b> '.$_POST['city'].'<br><b>Категория:</b> '.$_POST['category'].'<br><b>Кол-во точек:</b> '.$_POST['stores'];
  $altcontent = 'Имя: '.$_POST['name'].', Телефон: '.$_POST['phone'];


  if(isset($_FILES['file'])){
      echo 'file';
      $file_name = $_FILES['file']['name'];
      $file_tmp = $_FILES['file']['tmp_name'];
      $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));

      $expensions= array("pdf","doc","xls","jpg","png","docx","xlsx","jpeg");

      if(in_array($file_ext,$expensions)){
        move_uploaded_file($file_tmp,"uploads/".$file_name);
      }
   }

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

  $mail->Host = 'smtp.yandex.com';
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
  $mail->Username = "mvkorotych@yandex.ru";

  //Password to use for SMTP authentication
  $mail->Password = "226466987Mm";

  //Set who the message is to be sent from
  $mail->setFrom("mvkorotych@yandex.ru", 'Say:Час');
  $mail->AddReplyTo($_POST['email'], $_POST['name']);
  //Set who the message is to be sent to
  $mail->addAddress('korotychm@hotmail.com');
  $mail->addAddress('promo@saychas.ru');
  //Set the subject line
  $mail->Subject = 'Заявка с промо-страницы от '.$_POST['name'].' из '.$_POST['company'];
  //convert HTML into a basic plain-text alternative body
  $mail->msgHTML($content);
  //Replace the plain text body with one created manually
  $mail->AltBody = $altcontent;
  //Files
  if ($_FILES['file']){
    $mail->addAttachment("uploads/".$file_name);
  }
  //send the message, check for errors
  if (!$mail->send()) {
    echo 'Mailer Error: '. $mail->ErrorInfo;
  } else {
    echo '<div class="form-answer__inner form-answer__inner--success">Спасибо! Ваша заявка отправлена! Мы свяжемся с вами как можно скорее.</div>';
  }
} else {
  echo '<div class="form-answer__inner form-answer__inner--error">Пожалуйста, заполните все необходимые поля формы для отправки заявки.</div>';
}


?>
