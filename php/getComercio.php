<?php

include_once("db.php");
include_once("Class.Comercio.php");
error_reporting(0);
	//if (is_ajax()) {
	$respuesta= array();
	$cont=1;
	$sql = "select * from comercios limit 4;";
	$rs = $conn->query($sql);
	$numrows = $rs->num_rows;
	header('Content-Type: application/json');
	if ( $numrows > 0) {
	echo "[";
		while($row = $rs->fetch_assoc()) {
			if ($cont==256){
				echo ",";
			}

			$comercio= new Comercio();
			$comercio->setIdcomercio($row["idcomercio"]);
			$comercio->setNombre($row["nombre"]);
			$comercio->setDireccion($row["direccion"]);
			$comercio->setCorreo($row["correo"]);
			$comercio->setFoto($row["foto"]);
			//array_push($respuesta, $comercio);
			$cont=256;
			$comercio->show();
			}
		echo "]";
	//$respuesta = array( 'idcomercio' => 'tuvieja');
	//var_dump(array_values($respuesta));
	} else {
	$respuesta = array( 'idcomercio' => '0');

	echo json_encode($respuesta);
		
	}
	//serialize($respuesta);
//	header('Content-Type: application/json');
	//echo json_encode(array_values($respuesta));
//	var_dump($rs);
	
	
	
	



function is_ajax() {
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

?>