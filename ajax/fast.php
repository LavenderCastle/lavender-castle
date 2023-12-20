<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?>


<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
$name       = $_POST['name'];
$phone      = $_POST['phone'];
$subject    = $_POST['subject'];
$item       = $_POST['item'];
$sendto     = 'hello@lavendercastle.ru';
$product_id = $_POST['product_id'];
$delimiter  = "%0A";

$request_uri = explode('/', $item);

$slug = null;

if (isset($request_uri[array_key_last($request_uri) - 1])) {
  $slug = $request_uri[array_key_last($request_uri) - 1];
}

if ($item != '') {
  $content = '
  <p>Имя: ' . $name . '</p>
  <p>Телефон: ' . $phone . '</p>
  <p>Ссылка на товар: <a href="' . $item . '">' . $item . '</a></p>';

  $altcontent = 'Имя - ' . $name . ', Телефон - ' . $phone . ' ,Ссылка на товар - ' . $item;

  $bitrix24Webhook = "https://bitrix24.lavendercastle.ru/rest/1493/xx93e430cx494n78/";



  if ($slug) {
    $products   = getProducts([
      "order"  => ['SORT' => 'DESC'],
      'filter' => [
        "CODE" => $slug,
      ],
      'select' => ['ID', 'NAME', 'PRICE', 'CURRENCY_ID']
    ], $bitrix24Webhook);

    $product_id = $products[0]['ID'];
     
    $lead_id    = sendLead([
      "fields" => [
        "TITLE" => $subject . $lead_id,
        "NAME"  => $name,
        "PHONE" => [["VALUE" => $phone, "VALUE_TYPE" => "WORK"]],
      ]
    ], $bitrix24Webhook);
    $contact_id = getContact([
      "ORDER"  => ["ID" => 'DESC'],
      "FILTER" => ['PHONE' => $phone],
      "SELECT" => ['ID'],
    ], $bitrix24Webhook);

    $deal_id = getDeal([
      "ORDER"  => ["ID" => 'DESC'],
      "FILTER" => ['CONTACT_ID' => $contact_id[0]],
      "SELECT" => ['ID', 'OPPORTUNITY'],
    ], $bitrix24Webhook);


    $update_deal = updateDeal([
      "id"     => $deal_id[0]['ID'],
      "fields" => [
        "TITLE" => $subject . '№' . $deal_id[0]['ID'],
      ]
    ], $bitrix24Webhook);

    $set_product = setProductsToLead([
      'id'   => $deal_id[0]['ID'],
      'rows' => [
        [
          'PRODUCT_ID' => $product_id,
        ]
      ]
    ], $bitrix24Webhook);


  }
} else {
  $content = '
  <p>Имя: ' . $name . '</p>
  <p>Телефон: ' . $phone . '</p>';

  $altcontent = 'Имя - ' . $name . ', Телефон - ' . $phone;
}

if ($phone != '') {


  date_default_timezone_set('Etc/UTC');

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

  $mail->Host        = 'smtp.yandex.ru';
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
  $mail->Subject = $subject;

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
  echo '<div class="header__popup-error">Пожалуйста, укажите свой номер телефона.</div>';


}


$prop_common = CIBlockElement::GetByID($product_id);
$prop        = null;
  
if ($ob = $prop_common->GetNextElement()) {
  $prop = $ob->GetProperties();
}
$param_string = '';
$sku = '';
  if (!is_null($prop)) {
    $sku = $prop['CML2_ARTICLE']['VALUE'];
  }
if(isset($prop['CONTAIN']['VALUE'])){
  $parameters = $prop['CONTAIN']['VALUE'];
  foreach($parameters as $parameter){
      $param_string .=  getParameterId($parameter)." / ";
  }
}

$width                           = $prop['WIDTH']['NAME'] . ': ' . $prop['WIDTH']['VALUE'];
$height                          = $prop['HEIGHT']['NAME'] . ': ' . $prop['HEIGHT']['VALUE'];
$tgcontent_content_item_name     = $products[0]['NAME'];
$tgcontent_content_item_price    = $products[0]['PRICE'];
$tgcontent_content_item_currency = $products[0]['CURRENCY_ID'];
$order                           = 'Новый заказ' . " " . "№" . $deal_id[0]['ID'];
$tgcontent                       = $order . $delimiter . $item . $delimiter;
$tgcontent .= "Пользователь:" . $name . $delimiter . 'Номер телефона:' . $phone . $delimiter . $tgcontent_content_item_name . ' ' . '-' . " " . $tgcontent_content_item_price . " " . $tgcontent_content_item_currency . $delimiter;
$tgcontent .= $delimiter . $width;
$tgcontent .= $delimiter . $height;
$tgcontent .= $delimiter . "Цветы в составе:" ." ". $param_string;
urlencode($tgcontent);
$token   = '1624880439:AAGDgOb-dqC1dnRThf1BbTq62H28yOZD70U';
$chat_id = '-542975461';
//Передаем данные боту
try {
  $sendToTelegram = file_get_contents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$tgcontent}");
} catch(Exception $e) {
  //
}
return null;

function sendLead($params, $bitrix24Webhook)
{
  $queryURL  = $bitrix24Webhook . "crm.lead.add.json";
  $queryData = http_build_query($params);

  $curl = curl_init();
  curl_setopt_array(
    $curl,
    array(
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_POST           => 1,
      CURLOPT_HEADER         => 0,
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL            => $queryURL,
      CURLOPT_POSTFIELDS     => $queryData,
    )
  );
  $result = curl_exec($curl);
  curl_close($curl);
  $result = json_decode($result, 1);

  if (empty($result["error"])) {
    return $result["result"];
  } else {
    return "Ошибка при создании лида " . $result["error"] . ": " . $result["error_description"];
  }
}

function setProductsToLead($params, $bitrix24Webhook)
{
  $queryURL  = $bitrix24Webhook . "crm.deal.productrows.set.json";
  $queryData = http_build_query($params);

  $curl = curl_init();
  curl_setopt_array(
    $curl,
    array(
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_POST           => 1,
      CURLOPT_HEADER         => 0,
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL            => $queryURL,
      CURLOPT_POSTFIELDS     => $queryData,
    )
  );
  $result = curl_exec($curl);
  curl_close($curl);
  $result = json_decode($result, 1);

  if (empty($result["error"]) && isset($result["result"])) {
    return $result["result"];
  } else {
    return "Ошибка при привязке товара к лида: " . $result["error"] . ": " . $result["error_description"];
  }
}
function getDeal($params, $bitrix24Webhook)
{
  $queryURL  = $bitrix24Webhook . "crm.deal.list";
  $queryData = http_build_query($params);

  $curl = curl_init();
  curl_setopt_array(
    $curl,
    array(
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_POST           => 1,
      CURLOPT_HEADER         => 0,
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL            => $queryURL,
      CURLOPT_POSTFIELDS     => $queryData,
    )
  );
  $result = curl_exec($curl);
  curl_close($curl);
  $result = json_decode($result, 1);

  if (empty($result["error"])) {
    return ($result['result']);
  } else {
    return "Ошибка при привязке товара к лида: " . $result["error"] . ": " . $result["error_description"];
  }
}


function getLead($params, $bitrix24Webhook)
{
  $queryURL  = $bitrix24Webhook . "crm.lead.get";
  $queryData = http_build_query($params);

  $curl = curl_init();
  curl_setopt_array(
    $curl,
    array(
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_POST           => 1,
      CURLOPT_HEADER         => 0,
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL            => $queryURL,
      CURLOPT_POSTFIELDS     => $queryData,
    )
  );
  $result = curl_exec($curl);
  curl_close($curl);
  $result = json_decode($result, 1);

  if (empty($result["error"])) {
    return end($result["result"]);
  } else {
    return "Ошибка при привязке товара к лида: " . $result["error"] . ": " . $result["error_description"];
  }
}
function getContact($params, $bitrix24Webhook)
{
  $queryURL  = $bitrix24Webhook . "crm.contact.list.json";
  $queryData = http_build_query($params);

  $curl = curl_init();
  curl_setopt_array(
    $curl,
    array(
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_POST           => 1,
      CURLOPT_HEADER         => 0,
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL            => $queryURL,
      CURLOPT_POSTFIELDS     => $queryData,
    )
  );
  $result = curl_exec($curl);
  curl_close($curl);
  $result = json_decode($result, 1);

  if (empty($result["error"])) {
    return $result["result"];
  } else {
    return "Ошибка при привязке товара к лида: " . $result["error"] . ": " . $result["error_description"];
  }
}



function getProducts($params, $bitrix24Webhook)
{
  $queryURL  = $bitrix24Webhook . "crm.product.list";
  $queryData = http_build_query($params);

  $curl = curl_init();
  curl_setopt_array(
    $curl,
    array(
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_POST           => 1,
      CURLOPT_HEADER         => 0,
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL            => $queryURL,
      CURLOPT_POSTFIELDS     => $queryData,
    )
  );
  $result = curl_exec($curl);
  curl_close($curl);
  $result = json_decode($result, 1);

  if (empty($result["error"])) {
    return $result["result"];
  } else {
    return "Ошибка при привязке товара к лида: " . $result["error"] . ": " . $result["error_description"];
  }
}
function updateDeal($params, $bitrix24Webhook)
{
  $queryURL  = $bitrix24Webhook . "crm.deal.update";
  $queryData = http_build_query($params);

  $curl = curl_init();
  curl_setopt_array(
    $curl,
    array(
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_POST           => 1,
      CURLOPT_HEADER         => 0,
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL            => $queryURL,
      CURLOPT_POSTFIELDS     => $queryData,
    )
  );
  $result = curl_exec($curl);
  curl_close($curl);
  $result = json_decode($result, 1);

  if (empty($result["error"])) {
    return $result["result"];
  } else {
    return "Ошибка при создании лида " . $result["error"] . ": " . $result["error_description"];
  }
}
function getParameterId($id){
        global $DB;
        $results = $DB->Query("SELECT * FROM b_iblock_element WHERE ID = $id");
        if ($row = $results->Fetch())
        {
          return($row['NAME']);
        } 
}
?>