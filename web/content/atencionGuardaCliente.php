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
            
			//calcular los 7 min 
			//insert
			$INSERT = "INSERT INTO brc_operativos_detalle(DIA, HORA, HORA_PACIENTE, RUT_DOCTOR, RUT_CLIENTE, CERCA_OJO_D_E, CERCA_OJO_D_C, CERCA_OJO_D_G, CERCA_OJO_I_E, CERCA_OJO_I_C, CERCA_OJO_I_G, DPC, LEJOS_OJO_D_E, LEJOS_OJO_D_C, LEJOS_OJO_D_G, LEJOS_OJO_I_E, LEJOS_OJO_I_C, LEJOS_OJO_I_G, DPL, DESCRIPCION_RECETA, DESCUENTO_RECETA, ASISTENCIA)";
			$INSERT = $INSERT . "VALUES ('".$diaP."','".$horP."','',".$docP.",".$rutVar[0].",'00,00','00,00','0°','00,00','00,00','0°','000','00,00','00,00','0°','00,00','00,00','0°','000','SIN DESCRIPCION',0,'N')";
			$db->query($INSERT);
			//confirmar si ingreso
			$SELECT = "SELECT DISTINCT NOMBRE,CONCAT(SUBSTRING(HORA_PACIENTE,1,2),':',SUBSTRING(HORA_PACIENTE,3,2)) as HORA_FORMAT ";
			$SELECT = $SELECT . "FROM brc_operativos_detalle INNER JOIN brc_persona ON 	RUT_CLIENTE = RUT ";  
			$SELECT = $SELECT .  "WHERE DIA = '" . $diaP . "' AND 	RUT_CLIENTE = ".$rutVar[0]." AND HORA='".$horP."'  AND CAT_PERSONA = 'P00001'";     
			$db->query($SELECT);
			$paciente = $db->datos();
			if(count($paciente) > 0){
				echo "con";
			}else{
				echo "exi";
			}
        }
        
    }else{
        //echo "nue";
		$nombreP = "";
		if (ISSET($_POST["nombre"])) {
			$nombreP = trim($_POST["nombre"]);
		}
		$direccionP = "";
		if (ISSET($_POST["direccion"])) {
			$direccionP = trim($_POST["direccion"]);
		}
		$fonoP = "0";
		if (ISSET($_POST["fono"])) {
			$fonoP = trim($_POST["fono"]);
		}
		$mailP = "";
		if (ISSET($_POST["mail"])) {
			$mailP = trim($_POST["mail"]);
		}
		
		//echo "nue";
		//calcular los 7 min 
        //insert persona
        $INSERT = "INSERT INTO brc_persona(RUT, DV, CAT_PERSONA, NOMBRE, DIRECCION, TELEFONO, EMAIL) ";
		$INSERT = $INSERT . "VALUES (".$rutVar[0].",'".$rutVar[1]."','P00001','".$nombreP."','".$direccionP."','".$fonoP."','".$mailP."')";
		$db->query($INSERT);
        
        //insert operativo
        $INSERT = "INSERT INTO brc_operativos_detalle(DIA, HORA, HORA_PACIENTE, RUT_DOCTOR, RUT_CLIENTE, CERCA_OJO_D_E, CERCA_OJO_D_C, CERCA_OJO_D_G, CERCA_OJO_I_E, CERCA_OJO_I_C, CERCA_OJO_I_G, DPC, LEJOS_OJO_D_E, LEJOS_OJO_D_C, LEJOS_OJO_D_G, LEJOS_OJO_I_E, LEJOS_OJO_I_C, LEJOS_OJO_I_G, DPL, DESCRIPCION_RECETA, DESCUENTO_RECETA, ASISTENCIA)";
		$INSERT = $INSERT . "VALUES ('".$diaP."','".$horP."','',".$docP.",".$rutVar[0].",'00,00','00,00','0°','00,00','00,00','0°','000','00,00','00,00','0°','00,00','00,00','0°','000','SIN DESCRIPCION',0,'N')";
		$db->query($INSERT);
		//confirmar si ingreso
		$SELECT = "SELECT DISTINCT NOMBRE,CONCAT(SUBSTRING(HORA_PACIENTE,1,2),':',SUBSTRING(HORA_PACIENTE,3,2)) as HORA_FORMAT ";
		$SELECT = $SELECT . "FROM brc_operativos_detalle INNER JOIN brc_persona ON 	RUT_CLIENTE = RUT ";  
		$SELECT = $SELECT .  "WHERE DIA = '" . $diaP . "' AND 	RUT_CLIENTE = ".$rutVar[0]." AND HORA='".$horP."'  AND CAT_PERSONA = 'P00001'";     
		$db->query($SELECT);
		$paciente = $db->datos();
		if(count($paciente) > 0){
			echo "con";
		}else{
			echo "nue";
		}
    }
?>