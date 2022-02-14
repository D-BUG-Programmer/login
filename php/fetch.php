<?php
include("connection.inc.php");

if(isset($_POST['data'])){

$uId=$_POST['uId']	;


$url="https://dbugtech.000webhostapp.com/api/fetch.php?uId=".$uId."&Fetch";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);
curl_close($ch);
echo $result;

}

?>