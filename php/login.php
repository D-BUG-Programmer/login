<?php
include("connection.inc.php");

if(isset($_POST['Login'])){

$username=$_POST['Username'];
$password=$_POST['Password'];

$url="https://dbugtech.000webhostapp.com/api/login.php?Username=".$username."&Password=".$password."&Login";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);
curl_close($ch);

$_SESSION['USERID']=$result;

if($result!=='1'){

	$data=array();	    
   	$datas = array(   

	    "status" => true,
	  	"user_data" => $result
	  	);  	
	  	array_push($data,$datas);     		 	

	echo json_encode($datas);

}else{

	$response = array(
  	"status" => false  	
	);

	echo json_encode($response);

}

}

?>