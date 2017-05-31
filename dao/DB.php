<?php
/*
Clase para conectarse a la DB
 */
class DB {
	private $host="mysql.catchai.cl";
	private $user = '';
	private $password = '';
	private $db = '';
	public $mysqli;

	public function __construct() {
		//logPHP(basename(__FILE__, '.php'),__FUNCTION__);
		$this->conectar();
	}

	public function conectar() {
		//logPHP(basename(__FILE__, '.php'),__FUNCTION__);
		$this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->db);
		/* Cambiar el conjunto de caracteres a utf8 */
		if (!$this->mysqli->set_charset("utf8")) {
			//logPHP(basename(__FILE__, '.php'),"Error cargando el conjunto de caracteres utf8: ".$this->mysqli->error);
		} else {
			//logPHP(basename(__FILE__, '.php'),"Conjunto de caracteres actual: ". $this->mysqli->character_set_name());
		}
		/* Revisar conexión */
		if (mysqli_connect_errno()) {
			logPHP(basename(__FILE__, '.php'),"Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}
	}

	public function desconectar() {
		//logPHP(basename(__FILE__, '.php'),__FUNCTION__);
		if (mysqli_close($this->mysqli)) {
			logPHP(basename(__FILE__, '.php'),"Conexión cerrada");
			unset($host);
			unset($user);
			unset($password);
			unset($db);			
			unset($mysqli);
		} else {
			logPHP(basename(__FILE__, '.php'),"Conexión no cerrada");
		}
	}

	function __destruct() {
		//logPHP(basename(__FILE__, '.php'),__FUNCTION__);
	}

}
?>