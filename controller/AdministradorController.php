<?php
/*
Revisar las carpetas
Se necesita ocupar las rutas completas para que al hacer un require desde otro archivo
no se pierda
 */
require_once($_SERVER['DOCUMENT_ROOT'].'/catchai/include/log.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/catchai/dao/AdministradorDAO.php');
/**
* 
*/
class AdministradorController
{
	
	function __construct()
	{
		logPHP(basename(__FILE__, '.php'),__FUNCTION__);
	}

	public function iniciarSesion($model){
		//Debugeo
		logPHP(basename(__FILE__, '.php'),__FUNCTION__);
		//Debugeo
		logPHP(basename(__FILE__, '.php'),$model->getUsuario());
		logPHP(basename(__FILE__, '.php'),$model->getClave());
		// Validar una vez más
		// ...
		// Si todo está bien pasar al DAO
		$dao = new AdministradorDAO();
		$respuesta = $dao->iniciarSesion($model);
		logPHP(basename(__FILE__, '.php'),$respuesta['result']);
		logPHP(basename(__FILE__, '.php'),$respuesta['mensaje']);
		logPHP(basename(__FILE__, '.php'),$respuesta['admin']);

		// Aca retornamos true, un mensaje y el objeto admin con los datos del administrador
		if ($respuesta['result']== true) {
			return array('result' => $respuesta['result'], 'mensaje' => $respuesta['mensaje'], 'admin' => $respuesta['admin']);
		} else {
			return array('result' => $respuesta['result'], 'mensaje' => $respuesta['mensaje']);
		}
	}

}

