<?php
include("user.php");

if(isset($_POST['user_name'])){

$Name=$_POST['user_name'];
$username=$_POST['user_usrname'];
$password=$_POST['user_password'];

$user = [
    'user_id' => '',
    'user_name' => '',
    'user_usrname' => '',
    'user_password' => '',
    'user_email' => '',
    'user_phone' => '',
    'user_address' => '',
    'user_sta' => '',
];

$errors = [
    'user_id' => '',
    'user_name' => '',
    'user_usrname' => '',
    'user_password' => '',
    'user_email' => '',
    'user_phone' => '',
    'user_address' => '',
    'user_sta' => '',
];

$url="https://dbugtech.000webhostapp.com/api/signup.php?Name=".$Name."&Username=".$username."&Password=".$password."&Signup";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);
curl_close($ch);


$user = array_merge($user, $_POST);
$user = createUser($_POST,$result);


echo $result;

}

?>