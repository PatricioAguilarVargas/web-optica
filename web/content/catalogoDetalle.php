<?php
     $detP = trim($_POST["det"]);
     if (!ISSET($_POST["det"])) {
         $detP = "ALL";
     }

     $tipoP = trim($_POST["tipo"]);
     if (!ISSET($_POST["tipo"])) {
         $tipoP = "000001";
     }
 
     $MarcasP = trim($_POST["marca"]);
     if (!ISSET($_POST["marca"])) {
         $MarcasP = "ALL";
     }
 
     $MaterialP = trim($_POST["material"]);
     if (!ISSET($_POST["material"])) {
         $MaterialP = "ALL";
     }
     $FormasP = trim($_POST["forma"]);
     if (!ISSET($_POST["forma"])) {
         $FormasP = "ALL";
     }
 
     $ColoresP = trim($_POST["color"]);
     if (!ISSET($_POST["color"])) {
         $ColoresP = "ALL";
     }
 
	$MarcasB = trim($_POST["marcaB"]);
     if (!ISSET($_POST["marcaB"])) {
         $MarcasB = "ALL";
     }
 
     $MaterialB = trim($_POST["materialB"]);
     if (!ISSET($_POST["materialB"])) {
         $MaterialB = "ALL";
     }
     $FormasB = trim($_POST["formaB"]);
     if (!ISSET($_POST["formaB"])) {
         $FormasB = "ALL";
     }
 
     $ColoresB = trim($_POST["colorB"]);
     if (!ISSET($_POST["colorB"])) {
         $ColoresB = "ALL";
     }
     $pagina = 1;
     if (ISSET($_POST["pagina"])) {
        $pagina = trim($_POST["pagina"]);
     }
     $dt = parse_ini_file("../../data.ini");
    include_once("../../sistemaWS/includes/phpdbc.min.php");
    require_once("../../sistemaWS/config/vars.php");

    $config = new Vars($dt);
    $db = new db();
    $db->setConection($config->host, $config->usuario, $config->contrasenia, $config->bd, "PDO");
    $db->conectar();

    $SELECT = "SELECT PRO.CODIGO,PRO.DESCRIPCION AS DES_PRO,PRO.VALOR,MAR.DESCRIPCION AS DES_MAR,MAT.DESCRIPCION AS DES_MAT,COL.DESCRIPCION AS DES_COL,FORM.DESCRIPCION AS DES_FOR,PRO.MODELO,PRO.FOTO1,PRO.FOTO2 ";
    $SELECT = $SELECT . "FROM brc_producto_web PRO ";
    $SELECT = $SELECT . "INNER JOIN brc_codigos_web MAR ON MAR.TIPO = 'MARCA' AND MAR.CODIGO = PRO.COD_MARCA ";
    $SELECT = $SELECT . "INNER JOIN brc_codigos_web MAT ON MAT.TIPO = 'MATERIAL' AND MAT.CODIGO = PRO.COD_MATERIAL ";
    $SELECT = $SELECT . "INNER JOIN brc_codigos_web COL ON COL.TIPO = 'COLOR' AND COL.CODIGO = PRO.COD_COLOR ";
    $SELECT = $SELECT . "INNER JOIN brc_codigos_web FORM ON FORM.TIPO = 'FORMA' AND FORM.CODIGO = PRO.COD_FORMA ";
    $SELECT = $SELECT . "WHERE PRO.CODIGO='".$detP."' AND PRO.VIGENCIA = 'S' ";
	$SELECT = $SELECT . "AND PRO.COD_TIPO='".$tipoP."' ";
	$SELECT = $SELECT . "AND PRO.COD_MARCA='".$MarcasB."' ";
	$SELECT = $SELECT . "AND PRO.COD_MATERIAL='".$MaterialB."' ";
	$SELECT = $SELECT . "AND PRO.COD_COLOR='".$ColoresB."' ";
	$SELECT = $SELECT . "AND PRO.COD_FORMA='".$FormasB."' ";

    $db->query($SELECT);
    $result = $db->datos();
    //var_dump($SELECT);
    echo json_encode($result);
?>

