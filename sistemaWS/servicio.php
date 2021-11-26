<?php
	include("includes/phpdbc.min.php");
	require_once("lib/nusoap.php");
	require_once("config/vars.php");
    /* Asignación de Usuario,Password, Base de datos */
	@session_start();
	$config = new Vars($dt);
	$_SESSION["host"]=$config->host;
	$_SESSION["usuario"]=$config->usuario;
	$_SESSION["pass"]= $config->contraseña;
	$_SESSION["base"]=$config->bd;
	$_SESSION["gestor"]="MySQL";
	/* OBTENEMOS LA URL DEL SITIO */
	$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
	$protocol = substr(strtolower($_SERVER["SERVER_PROTOCOL"]),0, strpos($_SERVER["SERVER_PROTOCOL"], "/")) . $s;
	$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
	$URL = $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
	
	/*Archivos con metodos del WebService */
	include("metodos/InsertarItem.php");
	include("metodos/InsertarCodWeb.php");
	include("metodos/ModificarItem.php");
	include("metodos/BorrarItem.php");
	include("metodos/ObtenerItem.php");
	include("metodos/ObtenerItems.php");
	
	/* Definicion del WebService*/
        $server = new soap_server();
	
	
	$ns = "urn:OpticaBeracaWS";
	$server->configureWSDL('OpticaBeracaServicio', $ns);
	$server->wsdl->schematargetnamespace=$URL;
        $server->soap_defencoding = "UTF-8";
	include("metodos/tipos.php");


	/* Registro de los metodos del WebService*/
	$server->register(
	'InsertarItem'
	,array(
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
		"foto2" => "xsd:string",
		"tipo" => "xsd:string"
	)
	,array('return' => 'xsd:string')
        ,$ns
	,$ns . '#InsertarItem'
	,'rpc'
    ,'encoded'
    ,'Inserta un Item en la base de Datos.'
	);
	
	$server->register(
	'InsertarCodWeb'
	,array(
		"tipo" => "xsd:string",
		"codigo" => "xsd:string",
		"descripcion" => "xsd:string",
		"img" => "xsd:string"
	)
	,array('return' => 'xsd:string')
        ,$ns
	,$ns . '#InsertarCodWeb'
	,'rpc'
    ,'encoded'
    ,'Inserta un código en la base de Datos.'
	);
	
	$server->register(
	'ModificarItem'
	,array('producto' => 'tns:Producto')
	,array('return' => 'tns:Respuesta')
	,$ns
	,$ns . '#ModificarItem'
	,'rpc'
    ,'encoded'
    ,'Modifica un Item en la base de Datos.'
	);
	
	$server->register(
	'BorrarItem'
	,array('producto' => 'tns:Producto')
	,array('return' => 'tns:Respuesta')
	,$ns
	,$ns . '#BorrarItem'
	,'rpc'
    ,'encoded'
    ,'Borra un Item en la base de Datos.'
	);

	$server->register(
	'ObtenerItem'
	,array('id' => 'xsd:int')
	,array('return' => 'tns:Producto')
	,$ns
	,$ns . '#ObtenerItem'
	,'rpc'
    ,'encoded'
    ,'Obtiene un Item en la base de Datos.'
	);
	
	$server->register(
	'ObtenerItems'
	,array()
	,array('return' => 'tns:Productos')
	,$ns
	,$ns . '#ObtenerItems'
	,'rpc'
    ,'encoded'
    ,'Obtiene una Lista Items en la base de Datos.'
	);
	
	$server->service(file_get_contents("php://input"));
	exit();
	
	
?>