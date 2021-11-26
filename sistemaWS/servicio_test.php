<?php
	require_once("lib/nusoap.php");
	require_once("config/vars.php");
	//require_once("db/opticaSql.php");
	
	/* OBTENEMOS LA URL DEL SITIO */
	$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
	$protocol = substr(strtolower($_SERVER["SERVER_PROTOCOL"]),0, strpos($_SERVER["SERVER_PROTOCOL"], "/")) . $s;
	$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
	$URL = $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];

	//$namespace = $URL . '?wsdl';
	//using soap_server to create server object
	$server    = new soap_server;
	$server->configureWSDL('Optica Beraca Servicio', "urn:OpticaBeracaWS");
	 
	$server->register(
		"gethelloworld",
		array("name" => "xsd:string", "id" => "xsd:integer"),
		array("return" => "xsd:string"),
		"urn:OpticaBeracaWS",
		"urn:OpticaBeracaWS#gethelloworld",
		"rpc",
		"encoded",
		"comentario"
	);
	
	$server->register(
		"ingresaproducto",
		array(
			"codigo" => "xsd:string", 			
			"descripcion" => "xsd:string", 
			"vigencia" => "xsd:string",
			"valor" => "xsd:integer",
			"marca" => "xsd:string", 
			"modelo" => "xsd:string",
			"material" => "xsd:string", 
			"color" => "xsd:string",
			"forma" => "xsd:string", 
			"foto1" => "xsd:string",
			"foto2" => "xxsd:string"
		),
		array("return" => "xsd:string"),
		"urn:OpticaBeracaWS",
		"urn:OpticaBeracaWS#ingresaproducto",
		"rpc",
		"encoded",
		"Ingreso de productos a la pagina web de la optica"
	);
	
	function gethelloworld($name, $id) {

		return $myname;
	}
	
	function ingresaproducto($codigo, $descripcion, $vigencia, $valor, $marca, $modelo, $material, $color, $forma, $foto1, $foto2) {
		

		//$myname    =    "My Name Is <b>".$name . "</b> and my id is ".$id." ".$config->host." ".$config->usuario." ".$config->contraseña." ".$config->bd;
		$res    =  $codigo." ".$descripcion." ".$vigencia." ".$valor." ".$marca." ".$modelo." ".$material." ".$color." ".$forma." ".$foto1." ".$foto2;

		return $res;
	}
	$server->service(file_get_contents("php://input"));
?>