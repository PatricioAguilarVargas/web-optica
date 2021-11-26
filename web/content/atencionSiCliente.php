<?php
    $dt = parse_ini_file("../../data.ini");
    include_once("../../sistemaWS/includes/phpdbc.min.php");
    require_once("../../sistemaWS/config/vars.php");

    $diaP = "";
    if (ISSET($_POST["dia"])) {
        $diaP = trim($_POST["dia"]);
    }
    $docP = "0";
    if (ISSET($_POST["doc"])) {
        $docP =  trim($_POST["doc"]);
    }
    $horP =  "0";
    if (ISSET($_POST["hor"])) {
        $horP = trim($_POST["hor"]);
    }
    $rutP = "0-0";
    if (ISSET($_POST["rut"])) {
        $rutP = trim($_POST["rut"]);
    }
    if($rutP == ""){
        $rutP = "0-0"; 
    }
    $rutVar = explode('-',$rutP);

    $config = new Vars($dt);
    $db = new db();
    $db->setConection($config->host, $config->usuario, $config->contrasenia, $config->bd, "PDO");
    $db->conectar();

    $SELECT = "SELECT RUT,DV,CAT_PERSONA,NOMBRE,DIRECCION,TELEFONO,EMAIL ";
    $SELECT = $SELECT . "FROM brc_persona WHERE CAT_PERSONA = 'P00001' AND RUT = ".$rutVar[0] ;  
    $db->query($SELECT);
    $paciente = $db->datos();
    //var_dump($SELECT);
    if (count($paciente) > 0){
        $SELECT = "SELECT DISTINCT NOMBRE,CONCAT(SUBSTRING(HORA_PACIENTE,1,2),':',SUBSTRING(HORA_PACIENTE,3,2)) as HORA_FORMAT ";
        $SELECT = $SELECT . "FROM brc_operativos_detalle INNER JOIN brc_persona ON 	RUT_CLIENTE = RUT ";  
        $SELECT = $SELECT .  "WHERE DIA = '" . $diaP . "' AND 	RUT_CLIENTE = ".$rutVar[0]." AND HORA='".$horP."'  AND CAT_PERSONA = 'P00001'";     
        $db->query($SELECT);
        $paciente = $db->datos();
        //var_dump($SELECT);
        if(count($paciente) > 0){
            echo "con";
        }else{
            echo "exi";
        }
        
    }else{
        echo "nue";
    }
    //169043310
?>