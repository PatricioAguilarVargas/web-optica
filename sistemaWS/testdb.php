<?php

	require_once("config/vars.php");
	include("includes/phpdbc.min.php");
	/*
		$config = new Vars($dt);
		$myname = $config->host." ".$config->usuario." ".$config->contraseña." ".$config->bd;
		
		$bd = new OpticaBeracaConnBBDD($config->host, $config->usuario, $config->contraseña, $config->bd);
		$myname    =    $bd->host_info ;
		$bd->close();
		print_r($myname);
	*/	
	$config = new Vars($dt);
	$_SESSION["host"]=$config->host;
	$_SESSION["usuario"]=$config->usuario;
	$_SESSION["pass"]= $config->contraseña;
	$_SESSION["base"]=$config->bd;
	$_SESSION["gestor"]="MySQL";
	
	$codigo = "codigo" ;
	$descripcion =  "descripcion" ;
	$vigencia =  "v" ;
	$valor = "123";
	$marca =  "marca" ;
	$modelo =  "model" ;
	$material =  "mater" ;
	$color = "color" ;
	$forma = "forma";
	$foto1 = "foto1" ;
	$foto2 =  "foto2" ;
	$tipo = "tipo";
    $db = new db();
	$db->setConection($_SESSION["host"],$_SESSION["usuario"],$_SESSION["pass"],$_SESSION["base"],$_SESSION["gestor"]);
	$db->conectar();
	
	$DELETE ="DELETE FROM brc_producto_web WHERE CODIGO='".$codigo."'";
	$db->query($DELETE);
	$campos=$db->datos();
	if (empty($db->error)) {
		$respuesta = "Producto Eliminado con exito.";
	} else {
		$respuesta =$db->error;
	}
	
	$INSERT ="INSERT INTO brc_producto_web (CODIGO,DESCRIPCION,VIGENCIA,VALOR,COD_MARCA,MODELO,COD_MATERIAL,COD_COLOR,COD_FORMA,FOTO1,FOTO2,COD_TIPO) VALUES ";
	$INSERT = $INSERT."('".$codigo."','".$descripcion."','".$vigencia."',".$valor.",'".$marca."','".$modelo."','".$material."','".$color."','".$forma."','".$foto1."','".$foto2."','".$tipo."')";
	
	$db->query($INSERT);
	$campos=$db->datos();
	if (empty($db->error)) {
		$respuesta = "Producto guardado con exito.";
	} else {
		$respuesta = "ERROR: ".$db->error;
	}
	
	print_r($respuesta);
	
	//return $INSERT;

?>