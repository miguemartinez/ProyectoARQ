<?php
include_once("db.php");
include_once("Class.comercio.php");

$comercio =new Comercio();
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
$target_file="img/".$_FILES["foto"]["name"];



$comercio->setNombre($_POST["nombre"]);
$comercio->setDireccion($_POST["direccion"]);
$comercio->setCorreo($_POST["correo"]);
$comercio->setFoto($target_file);

// aca iria el constructor con los parametros del post atroden






try {
	$stmt = $conn->prepare("INSERT INTO Comercios (nombre, direccion, correo , foto, fechains) VALUES (?,?,?,?,NOW())");
	$stmt->bind_param("ssss",$_POST["nombre"] ,$_POST["direccion"],$_POST["correo"],$target_file);//comercio get los datos
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