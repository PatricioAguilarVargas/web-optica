<?php
function InsertarItem($codigo,$descripcion,$vigencia,$valor,$marca,$modelo,$material,$color,$forma,$foto1,$foto2,$tipo) {
	
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
	
	return $respuesta;

}
?>