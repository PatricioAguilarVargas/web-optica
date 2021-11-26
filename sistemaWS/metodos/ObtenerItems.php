<?php
function ObtenerItems() {
	$db = new db();
	$db->setConection($_SESSION["host"],$_SESSION["usuario"],$_SESSION["pass"],$_SESSION["base"],$_SESSION["gestor"]);
	$db->conectar();
	$DELETE ="SELECT Id,Codigo,Nombre,Descripcion,Imagen,Precio,Existencia,ExistenciaMin FROM producto";
	$db->query($DELETE);
	$productos=$db->datos();
	return new soapval('return', 'tns:Respuesta', $productos);
}
?>