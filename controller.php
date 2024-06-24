<?php
require_once 'Data.php';


function apiSafacilPay($orderId,$amount) {
    $manage = new Data;
    require_once 'config.php';
 $generateToken = $manage->generateToken($mode,$client_id,$client_secret);
 $createPaymentPage = $manage->createPayment($generateToken,$orderId,$amount,$mode);
header('Location:'. $createPaymentPage);
}



function returnUrl($txid) {
$manage = new Data;
require_once 'config.php';
 $generateToken = $manage->generateToken($mode,$client_id,$client_secret);
$getPaymentHistory = $manage->getPaymentHistory($txid,$mode,$generateToken);
// ==================== YOUR FUNCTION HERE

// ===================
}

function alertUrl($txid) {
$manage = new Data;
require_once 'config.php';
 $generateToken = $manage->generateToken($mode,$client_id,$client_secret);
$getPaymentHistory = $manage->getPaymentHistory($txid,$mode,$generateToken);
print_r($getPaymentHistory);
// ==================== YOUR FUNCTION HERE

// ===================
}

?>