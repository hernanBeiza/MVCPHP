<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/catchai/include/log.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/catchai/dao/DB.php');
/**
* 
*/
class AdministradorDAO extends DB
{
	
	function __construct()
	{
		parent::__construct();
		logPHP(basename(__FILE__, '.php'),__FUNCTION__);
	}

	public function iniciarSesion($adminModel) {
		//Inicio Debugeo
		logPHP(basename(__FILE__, '.php'),__FUNCTION__);
		logPHP(basename(__FILE__, '.php'),$adminModel->getUsuario());
		logPHP(basename(__FILE__, '.php'),$adminModel->getClave());
		// Fin Debugeo
		// 
		//Usar la superclase para consultar
		$mysqli = $this->mysqli;
		$sql = "SELECT * FROM admin WHERE usuario='".$adminModel->getUsuario()."'";
		logPHP(basename(__FILE__, '.php'),$sql);
		$datos = $mysqli->query($sql) or die($mysqli->error.__LINE__);
		if($datos->num_rows == 0) {
		   	logPHP(basename(__FILE__, '.php'),"No existe usuario");
			$mensajes.="No existe usuario.\n";
			$resultado = array(false,$mensajes,null);
		} else {
	   		logPHP(basename(__FILE__, '.php'),"Existe usuario");
	   		$infoUsuario = array();
   			//Obtener información del usuario
		   	while($fila = $datos->fetch_assoc()) {
				foreach ($fila as $clave => $valor) {
					logPHP(basename(__FILE__, '.php'),$clave." ".$valor);
					$infoUsuario[$clave] = $valor;
				}
			}
		}
		//Probar si funciona
		//llamar a la superclase para desconectanos
		//$this->desconectar();
		if($infoUsuario){
			return array('result' => true, 'mensaje' => 'Hola '.$infoUuario['nombre'], 'admin' => $infoUsuario);			
		} else {
			return array('result' => false, 'mensaje' => 'Datos incorrectos');
		}
	}

}
?>