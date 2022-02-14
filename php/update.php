<?php
include("connection.inc.php");
include("user.php");

if(isset($_POST['user_usrname'])){

$uId=$_SESSION['USERID'];
$username=$_POST['user_usrname'];
$name=$_POST['user_name'];
$phone=$_POST['user_phone'];
$email=$_POST['user_email'];
$address=$_POST['user_address'];


$url="https://dbugtech.000webhostapp.com/api/update.php?userId=".$uId."&username=".$username."&name=".$name."&phone=".$phone."&email=".$email."&address=".$address."&Updatedata";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);
curl_close($ch);
echo $result;

 $userId=base64_decode($uId);

 $user = getUserById($userId);
 $user = array_merge($user, $_POST);
 $user = updateUser($_POST, $userId);

}

?>