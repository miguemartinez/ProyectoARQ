<?php
//header('Content-Type: application/json');
//$user=array( 'username' => '0');
//if (isset($_SESSION["user"])) {

	$user =unserialize($_SESSION["user"]);
	
//}
	echo var_dump($_SESSION);
	
?>