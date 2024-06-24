<?php
require_once 'controller.php';

$buyerId = 123; //strip_tags($_GET['buyerId']);
$amount = 1;  //strip_tags($_GET['amount']);

$orderId = time() . $buyerId;

apiSafacilPay($orderId,$amount);

