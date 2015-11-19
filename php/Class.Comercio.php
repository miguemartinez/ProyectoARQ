<?php

class Comercio {

	private $idcomercio;
	private $nombre;
	private $direccion;
	private $correo;
	private $foto;
   public function show() {
   		header('Content-Type: application/json');

       echo json_encode( (get_object_vars($this)));
    }
	public function getIdcomercio() {
		return $this->idcomercio;
	}
	public function setIdcomercio($idcomercio) {
		$this->idcomercio = $idcomercio;
		return $this;
	}
	public function getNombre() {
		return $this->nombre;
	}
	public function setNombre($nombre) {
		$this->nombre = $nombre;
		return $this;
	}
	public function getDireccion() {
		return $this->direccion;
	}
	public function setDireccion($direccion) {
		$this->direccion = $direccion;
		return $this;
	}
	public function getCorreo() {
		return $this->correo;
	}
	public function setCorreo($correo) {
		$this->correo = $correo;
		return $this;
	}
	public function getFoto() {
		return $this->foto;
	}
	public function setFoto($foto) {
		$this->foto = $foto;
		return $this;
	}
	
	
	
}
?>