<? define("NO_KEEP_STATISTIC", true);?>
<? define("NOT_CHECK_PERMISSIONS", true); ?>
<? define("NEED_AUTH", true); ?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?

if ($_POST['phone']!='' && $_POST['code']!='') {

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

			$rsUser = CUser::GetByLogin($userLogin);

			$arUser = $rsUser->Fetch();
			if ($arUser['UF_SMS']==$_POST['code']){
				global $USER ;
				$USER -> Authorize($arUser['ID']);
        echo 'ok';
			} else {
        echo '<div class="header__popup-error">Введен неверный код</div>';
      }

} else {
  echo '<div class="header__popup-error">Введите код из SMS</div>';
}
?>
