<?
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if ($_POST['act']=='add'){
  array_push($_SESSION['wishlist'], $_POST['elid']);
} elseif ($_POST['act']=='del'){
  $key = array_search($_POST['elid'], $_SESSION['wishlist']);
  if (false !== $key) {
    unset($_SESSION['wishlist'][$key]);
  }
}
echo count($_SESSION['wishlist']);
?>
