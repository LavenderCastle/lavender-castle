<?
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$externalAuth = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,20);

global $USER;

if (
  ($_POST["name"]!='')
  &&
  ($_POST["password"]!='')
  &&
  ($_POST["email"]!='' || $_POST["phone"]!='')
  ){

    // Проверяем на существование пользователя с таким email
    $userExists = false;

    if ($_POST["email"]!=''){
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

      if ($cUser['LOGIN']!=''){
        $userExists = true;
      };
    }

    if ($_POST["phone"]!=''){

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

      if ($cUser['LOGIN']!=''){
        $userExists = true;
      };
    }

    if (!$userExists) {

      if ($_POST["email"]!=''){
        $userLogin = $_POST["email"];
      } else {
        $userLogin = $userPhone;
      }

      $arResult = $GLOBALS['USER']->Register($userLogin, $_POST["name"], $_POST["lastname"], $_POST["password"], $_POST["password"], $_POST["email"]);

      if($arResult['TYPE'] == 'OK') {
          echo 'ok';
         // пользователь добавлен, добавляем ему данные
         $dbResult = CUser::GetByLogin($userLogin);
         $arUser = $dbResult->Fetch();
         $userid = intval($arUser['ID']);
         $user_update = new CUser;
         $fields = Array(
              "PERSONAL_PHONE"     => $_POST["phone"],
              "UF_AUTH"   => $externalAuth
         );
         if(!$user_update->Update($arUser['ID'], $fields)) {
             //вывод ошибки добавления данных пользователю
            echo $user_update->LAST_ERROR;
         }

         //Добавляем пользователю бонусный счет и начисляем на него 300 рублей
         // CModule::IncludeModule("sale");
         // $arFields = Array("USER_ID" => $arUser['ID'], "CURRENCY" => "RUB", "CURRENT_BUDGET" => 300);
         // $accountID = CSaleUserAccount::Add($arFields);

        // отправляем e-mail или смс


      } else {
        //вывод ошибки добавления пользователя
        echo '<div class="header__popup-error">';
        ShowMessage($arResult);
        echo '</div>';
      }

    } else {
      echo '<div class="header__popup-error">Пользователь с таким email или телефоном уже существует.</div>';
    }

} else {
  echo '<div class="header__popup-error">Заполните все необходимые поля (*).</div>';
}
?>
