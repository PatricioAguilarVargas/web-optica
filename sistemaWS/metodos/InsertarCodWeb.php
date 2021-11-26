<?php
function InsertarCodWeb($tipo,$codigo,$descripcion,$img) {
	
    $db = new db();
	$db->setConection($_SESSION["host"],$_SESSION["usuario"],$_SESSION["pass"],$_SESSION["base"],$_SESSION["gestor"]);
	$db->conectar();
	
	$DELETE ="DELETE FROM brc_codigos_web WHERE TIPO='".$tipo."' AND CODIGO='".$codigo."'";
	$db->query($DELETE);
	$campos=$db->datos();
	if (empty($db->error)) {
		$respuesta = "Producto Eliminado con exito.";
	} else {
		$respuesta =$db->error;
	}
	
	$INSERT ="INSERT INTO brc_codigos_web (TIPO,CODIGO,DESCRIPCION,IMG) VALUES ";
	$INSERT = $INSERT."('".$tipo."','".$codigo."','".$descripcion."','".$img."')";
	
	$db->query($INSERT);
	$campos=$db->datos();
	if (empty($db->error)) {
		$respuesta = "Código guardado con éxito.";
	} else {
		$respuesta = "ERROR: ".$db->error;
	}
	
	return $respuesta;

}
?>
