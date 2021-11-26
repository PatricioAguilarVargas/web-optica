<?php
function ModificarItem($producto) {
	$db = new db();
	$db->setConection($_SESSION["host"],$_SESSION["usuario"],$_SESSION["pass"],$_SESSION["base"],$_SESSION["gestor"]);
	$db->conectar();
	$UPDATE ="UPDATE producto SET Nombre='".$producto["Nombre"]."',Descripcion='".$producto["Descripcion"]."',Imagen='".$producto["Imagen"]."',Precio=".$producto["Precio"].",Existencia=".$producto["Existencia"]." WHERE Id=".$producto["Id"];
	$db->query($UPDATE);
	$campos=$db->datos();
	if (empty($db->error)) {
	$respuesta["Ok"] = true;
	$respuesta["Mensaje"] = "Producto Actualizado con exito.";
	} else {
	$respuesta["Ok"] = false;
	$respuesta["Mensaje"] = $db->error;
	}
	return new soapval('return', 'tns:Respuesta', $respuesta);
}
?>