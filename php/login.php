<?php

include_once("db.php");
include_once("Class.User.php");

header('Content-Type: application/json');
$user= new User();
$user->setUsername($_POST["username"]);
$user->setPassword($_POST["password"]);
error_reporting(0);

$respuesta= array();
$cont=1;
$sql = "select * from users where username= '".$_POST["username"]."'";
$rs = $conn->query($sql);
$numrows = $rs->num_rows;

if ( $numrows > 0) {
	$row = $rs->fetch_assoc();
		if ($row["pass"]==$user->getPassword()){
			$respuesta = array( 'statusCode' => '200');
			$_SESSION["user"] = serialize($user);
	}else{
			$respuesta = array( 'statusCode' => '500');
		
	}
} else {
	$respuesta = array( 'statusCode' => '500');
	

}

echo json_encode($respuesta);

?>