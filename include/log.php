<?php
function logPHP($titulo,$texto)
{
	//http://php.net/manual/en/language.constants.predefined.php
	$ddf = fopen($_SERVER["DOCUMENT_ROOT"].'/logs/catchai.log','a'); 
	//fwrite($ddf,"[".date("r")."] Error $numero: $texto\r\n"); 
	//fwrite($ddf,"[".date("r")."] $titulo: $texto\r\n"); 
	fwrite($ddf,"[".date("j/m/o H:i:s")."] $titulo: $texto\r\n"); 
	fclose($ddf); 
}
?>