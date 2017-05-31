<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/catchai/include/log.php');
/**
* 
*/
class AdministradorModel
{
	private $idAdministrador;
	private $nombre;
	private $usuario;
	private $clave;

	function __construct($idAdministrador,$nombre,$usuario,$clave)
	{
		logPHP(basename(__FILE__, '.php'),__FUNCTION__);
		$this->idAdministrador = $idAdministrador;
		$this->nombre = $nombre;
		$this->usuario = $usuario;
		$this->clave = $clave;
	}

	public function setIdAdministrador($idAdministrador){
		$this->idAdministrador = $idAdministrador;
	}
	
	public function getIdAdministrador(){
		return $this->idAdministrador;
	}
	
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function setClave($clave){
		$this->clave = $clave;
	}

	public function getClave(){
		return $this->clave;
	}

}
?>