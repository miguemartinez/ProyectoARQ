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



$comercio->setNombre($_POST["signup-username"]);
$comercio->setDireccion($_POST["signup-adress"]);
$comercio->setCorreo($_POST["signup-email"]);
$comercio->setFoto($target_file);

// aca iria el constructor con los parametros del post atroden






try {
	$stmt = $conn->prepare("INSERT INTO Comercios (nombre, direccion, correo , foto, fechains) VALUES (?,?,?,?,NOW())");
	$stmt->bind_param("ssss",$_POST["signup-username"] ,$_POST["signup-adress"],$_POST["signup-email"],$target_file);//comercio get los datos
	$stmt->execute();
	if (!$stmt)  {
		throw new Exception("Error Processing Request", 1);
	}
	if (!$conn->commit()) {
		$respuesta = array( 'statusCode' => '400');
		exit();
	} else {
		$respuesta = array( 'statusCode' => '200');
	}
	
	header('Content-Type: application/json');
	echo json_encode($respuesta);
} catch (Exception $e) {
	$conn->rollback();
	var_dump($e);
}
$conn->close();

?>