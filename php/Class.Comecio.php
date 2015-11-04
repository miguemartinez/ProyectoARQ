<?php

class Comercio {

	private $idcomercio;
	private $nombre;
	private $direccion;
	private $correo;
	
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
	
	
}
?>