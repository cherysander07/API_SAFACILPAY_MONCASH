<?php

 class Data {
     
     public function generateToken($mode,$clientId,$clientSecret) {
         
         if($mode) { 
  $url = "https://safacilpay.com/rest/oauth/$clientId/$clientSecret";
  } else {
  $url = "https://safacilpay.com/sandbox/oauth/$clientId/$clientSecret";
          
}
         $getresponse = file_get_contents($url);
         
          $resp =  json_decode($getresponse, TRUE); 
          return  $resp['token'];
     }
     
     
     public function createPayment($generateToken,$orderId,$amount,$mode) {

   if($mode) { 
 $url = "https://safacilpay.com/rest/payment";
  } else {
  $url = "https://safacilpay.com/sandbox/payment";
          
}

$data = array("amount" => $amount, "orderId" => $orderId);
$ch = curl_init($url);

// Set options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

// Set the headers including the Bearer token
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/x-www-form-urlencoded',
     'Authorization: Bearer '. $generateToken
));

 $response = curl_exec($ch);

// Check for errors
if(curl_errno($ch)) {
echo 'Request Error:' . curl_error($ch);
}

// Close the cURL session
curl_close($ch);

// Decode the JSON response
$responseData = json_decode($response, true);
return $responseData['url'];

     }
     
     
     public function getPaymentHistory($txid,$mode,$generateToken) {
            if($mode) { 
$url = "https://safacilpay.com/rest/transaction";
  } else {
$url = "https://safacilpay.com/sandbox/transaction";
}


$data = array("txID" => $txid);

$ch = curl_init($url);

// Set options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

// Set the headers including the Bearer token
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/x-www-form-urlencoded',
     'Authorization: Bearer '. $generateToken
));

$response = curl_exec($ch);

// Check for errors
if(curl_errno($ch)) {
echo 'Request Error:' . curl_error($ch);
}

// Close the cURL session
curl_close($ch);

// Decode the JSON response
$responseData = json_decode($response, true);
return $responseData;

     }
     
     
     
     
 }


?>