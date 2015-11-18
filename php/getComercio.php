<?php

include_once("db.php");
include_once("class.Comercio.php");
error_reporting(0);
	//if (is_ajax()) {
	$comercios = array(4);
	$cont=1;
	$sql = "SELECT top 4 * from comercios";
	$rs = $conn->query($sql);
	$numrows = $rs->num_rows;
	if ( $numrows > 0) {
		while($row = $rs->fetch_assoc()) {
			$comercios[$cont]= new Comercio();
			$comercios[$cont].setIdcomercio($row["idcomercio"]);
			$comercios[$cont].setNombre($row["Nombre"]);
			$comercios[$cont].setDireccion($row["Direccion"]);
			$comercios[$cont].setCorreo($row["Correo"]);
			$cont=$cont+1;
			}
	$respuesta=$comercios;
	} else {
	$respuesta = array( 'idcomercio' => '215');
		
	}
	//serialize($respuesta);
	header('Content-Type: application/json');
	echo json_encode($respuesta);
	//var_dump($respuesta);
	
	
	
	



function is_ajax() {
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

?>