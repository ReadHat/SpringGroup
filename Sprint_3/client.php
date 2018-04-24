<?php

$data = array("usrname" => $_POST['usr'], "usrpasswd" => $_POST['passwd']);
$dataJson = json_encode($data);

$postString = "data=" . urlencode($dataJson); #??? what is this for?
$contentLength = strlen($postString);

$header = array(
	'Content-Type: application/x-www-form-urlencoded',
	'Content-Length: ' . $contentLength
);

$url = "http://cnmtsrv2.uwsp.edu/~ychen799/Sprint_3/authentication.php";

$ch = curl_init();

curl_setopt($ch,
    CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch,
    CURLOPT_POSTFIELDS, $postString);
curl_setopt($ch,
    CURLOPT_HTTPHEADER, $header);
	
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_URL, $url);

$return = curl_exec($ch);
$sumObject = json_decode($return);
//print $return;
#var_dump($sumObject->result);
var_dump($return);
curl_close($ch);

?>