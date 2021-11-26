<?php
function BorrarItem($codigo) {
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
	return $respuesta;
}
?>