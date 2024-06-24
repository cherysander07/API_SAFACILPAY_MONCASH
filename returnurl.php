<?php
 require_once 'controller.php';
 $transactionId = trim($_GET['transactionId']);
 returnUrl($transactionId);
 ?>