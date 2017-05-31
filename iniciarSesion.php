<?php
require_once("./include/log.php");
require_once("./model/AdministradorModel.php");
require_once("./controller/AdministradorController.php");

//Vamos a responder en formato JSON en UTF-8
header("Content-Type: application/json; charset=UTF-8");

//En estos archivos, van las validaciones básicas, recepción de datos y archivos
//Con esto buscamos, llevar un registro de las llamadas de archivos, o log, a un archivo de texto. Se puede complementar de cierta forma con el log de Apache
$archivo = basename(__FILE__, '.php');
logPHP($archivo,$archivo);
foreach($_POST as $index=>$valor){
	logPHP($archivo,"$index=>$valor");
}

if($_POST['usuario']){
	$usuario = $_POST['usuario'];
}
if($_POST['contrasena']){
	$contrasena = $_POST['contrasena'];
}
//Falta validar bien xD
$enviar = true;
$errores= "Te faltó enviar:";
if(!isset($usuario)){
	$enviar = false;
	$errores.="\nusuario";
}

if(!isset($contrasena)){
	$enviar = false;
	$errores.="\ncontraseña";
}

if($enviar){
	logPHP($archivo,"entrando");
	//Instancio mi modelo
	$model = new AdministradorModel(null,null,$usuario,$contrasena);
	//Instancio mi Controller y le paso mi modelo
	$controller = new AdministradorController();
	$respuestaController = $controller->iniciarSesion($model);
	foreach($respuestaController as $index=>$valor){
		logPHP($archivo,$index." ".$valor);
	}
	//respuesta final a cliente
	/*
	$respuesta = array('result' => true, 'mensaje' => $mensaje);
	echo $respuestaJSON;
	*/
	$respuestaJSON = json_encode($respuestaController);
	echo $respuestaJSON;
} else {
	$respuesta = array('result' => false, 'mensaje' => $errores);
	$respuestaJSON = json_encode($respuesta);
	echo $respuestaJSON;
}

?>