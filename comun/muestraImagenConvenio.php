<?php
	$dt = parse_ini_file("../data.ini");
	include("../sistemaWS/includes/phpdbc.min.php");
	require_once("../sistemaWS/config/vars.php");
	$SELECT ="";
	if(ISSET($_GET["cod"])){
		$SELECT ="SELECT ID,TITULO,DESCRIPCION,FOTO,VIGENCIA FROM brc_convenio_web WHERE ID=".$_GET["cod"]."";
	}else{
		$SELECT ="SELECT TOP(1) ID,TITULO,DESCRIPCION,FOTO,VIGENCIA FROM brc_convenio_web ";
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
                header("Content-type: image/jpg");
		imagejpeg($foto1);
                imagedestroy($foto1);
	}else{
                header("Content-type: image/jpg");
                $foto1 = imagecreatefromjpeg("imagennoencontrada.jpg");
		imagejpeg($foto1);
                imagedestroy($foto1);
	}
	//VAR_DUMP($campos[0]["FOTO1"]);
	
/*
        $data = $campos[0]["FOTO2"];
        $data = base64_decode($data);

$im = imagecreatefromstring($data);
if ($im !== false) {
    header('Content-Type: image/jpg');
    imagejpeg($im);
    imagedestroy($im);
}
else {
    echo 'Ocurrió un error.';
}
 */
