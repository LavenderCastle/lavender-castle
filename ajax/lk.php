<?
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
global $USER;
if ($_POST["login"]!=''){
       $dbResult = CUser::GetByLogin($_POST['login']);
       if($arUser = $dbResult->Fetch()) {
          $user_update = new CUser;
          $fields = Array();
          if ($_POST["newemail"]!=''){
            $fields += ["EMAIL" => $_POST["newemail"]];
            $fields += ["LOGIN" => $_POST["newemail"]];
          }
          if ($_POST["phone"]!=''){
            $fields += ["PERSONAL_PHONE" => $_POST["phone"]];
          }
          if ($_POST["name"]!=''){
            $fields += ["NAME" => $_POST["name"]];
          }
          if ($_POST["lastname"]!=''){
            $fields += ["LAST_NAME" => $_POST["lastname"]];
          }
          if ($_POST["password"]!=''){
            $fields += ["PASSWORD" => $_POST["password"]];
          }
          if(!$user_update->Update($arUser['ID'], $fields)) {
             echo $user_update->LAST_ERROR;
          } else {
            echo 'ok';
          }
       }
}
?>
