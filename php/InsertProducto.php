<?php
include_once("db.php");
include_once("Class.Producto.php");

$producto =new Producto;
$comercio.setNombre($_POST["nombre"]);
$comercio.setdireccion($_POST["direccion"]);
// aca iria el constructor con los parametros del post atroden


try {
	$stmt = $conn->prepare("INSERT INTO Comercio (nombre, direccion, correo) VALUES (?,?,?)");
	$stmt->bind_param("sss", );//comercio get los datos
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