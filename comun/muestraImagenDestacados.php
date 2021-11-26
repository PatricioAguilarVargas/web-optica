<?php
	$dt = parse_ini_file("../data.ini");
	include("../sistemaWS/includes/phpdbc.min.php");
	require_once("../sistemaWS/config/vars.php");
	$SELECT ="";	
	if(ISSET($_GET["cod"])){
		$SELECT ="SELECT ID,TITULO,FOTO,VIGENCIA FROM brc_destacados_web WHERE ID=".$_GET["cod"]."";
	}else{
		$SELECT ="SELECT TOP(1) ID,TITULO,FOTO,VIGENCIA FROM brc_destacados_web ";
	}
	$config = new Vars($dt);
	$db = new db();
	$db->setConection($config->host,$config->usuario,$config->contrasenia,$config->bd,"PDO");
	$db->conectar();
	$db->query($SELECT);
	
	$campos=$db->datos();
	//var_dump($campos[0]["FOTO"]);die();
	if(ISSET($_GET["cod"])){ 
                $foto1 = base64_decode($campos[0]["FOTO"]);
                $foto1 = imagecreatefromstring($foto1);
                header("Content-type: image/jpeg");
				imagejpeg($foto1);
                //imagedestroy($foto1);
	}else{
                header("Content-type: image/jpeg");
                $foto1 = imagecreatefromjpeg("imagennoencontrada.jpeg");
				imagejpeg($foto1);
                imagedestroy($foto1);
	}

