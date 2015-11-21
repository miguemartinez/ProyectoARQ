<?php
include_once("db.php");
include_once("Class.comercio.php");

$comercio =new Comercio();
$comercio->setNombre($_POST["nombre"]);
$comercio->setPrecio($_POST["direccion"]);
$comercio->setCorreo($_POST["correo"]);
$comercio->setFoto("/img/nikey.jpg");
// aca iria el constructor con los parametros del post atroden


try {
	$stmt = $conn->prepare("INSERT INTO Comercio (nombre, direccion, correo , foto) VALUES (?,?,?,?)");
	$stmt->bind_param("ssss", $comercio->getNombre(),$comercio->getDireccion(),$comercio->getCorreo(), $comercio->getFoto());//comercio get los datos
	$stmt->execute();
	if (!$stmt)  {
		throw new Exception("Error Processing Request", 1);
	}
	if (!$conn->commit()) {
		$respuesta = array( 'resp' => 'bad');
		exit();
	} else {
		$respuesta = array( 'resp' => 'good');
	}
	
	header('Content-Type: application/json');
	echo json_encode($respuesta);
} catch (Exception $e) {
	$conn->rollback();
	var_dump($e);
}
$conn->close();

?>