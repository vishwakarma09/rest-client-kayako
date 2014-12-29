<?php

include "handler.php";

ob_start();
   $url="http://sandzvps.tk/latest/api/index.php?";
   $apiKey = "384a2088-6db3-8c44-adc3-60cc37ee7c35";
   $secretKey = "NjVkZTk3ZjUtYjM5MC03MDI0LTNkMDMtZDg1NjQ2YTA4YTkxYTZiOGJkZGYtOTg2OC1iNDU0LTVkYzMtMGM5MWQ3MWIwZmZh";
 
   // Generates a random string of ten digits
   $salt = mt_rand();
   // Computes the signature by hashing the salt with the secret key as the key
   $signature = hash_hmac('sha256', $salt, $secretKey, true);
 
   // base64 encode...
   $encodedSignature = base64_encode($signature);
   // urlencode...
   $encodedSignature = urlencode($encodedSignature);

if(isset($_GET['q'])) {
    $handler = $$_GET['q'];
} else {
    $handler = $get_staff_list;
}
$str = $url.$handler;
$str .= "&apikey=".$apiKey;
$str .= "&salt=".$salt;
$str .= "&signature=".$encodedSignature;
//echo $str;
$response = file_get_contents($str);
echo $response;
ob_end_flush();
?>
