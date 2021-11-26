<?php
function ObtenerItem($id) {
$db = new db();
$db->setConection($_SESSION["host"],$_SESSION["usuario"],$_SESSION["pass"],$_SESSION["base"],$_SESSION["gestor"]);
$db->conectar();

$DELETE ="SELECT * FROM producto WHERE Id=".$id;
$db->query($DELETE);
$producto=$db->datos();
return new soapval('return', 'tns:Respuesta', $producto[0]);
}
?>