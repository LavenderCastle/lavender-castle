<?

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use \Bitrix\Sale;

CModule::IncludeModule("sale");
$ORDER_ID=intval($_GET["ORDER_ID"]);

$orderObj  = Sale\Order::load( $ORDER_ID );
$paymentCollection  =  $orderObj ->getPaymentCollection();
$payment  =  $paymentCollection [0];
$service  = Sale\PaySystem\Manager::getObjectById( $payment ->getPaymentSystemId());
$context  = \Bitrix\Main\Application::getInstance()->getContext();
$service ->initiatePay( $payment ,  $context ->getRequest());

$initResult = $service->initiatePay($payment, $context->getRequest(), \Bitrix\Sale\PaySystem\BaseServiceHandler::STRING);
$buffered_output = $initResult->getTemplate();

?>
