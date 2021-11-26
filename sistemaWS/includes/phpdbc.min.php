<?php
/*
Nombre: 						Paquete phpdbc
Autor:							Francisco Cast�n Gutierrez
Version:						2.0.0 min
Descripcion: 					Los elementos necesarios, para crear WS con apoyo de NuSOAP, o directamente presentados con JSON o XML
Licencia:						GPL
Nombre del Archivo: 	phpdbc.php
 */
class db {
	private $host;
	private $usuario;
	private $pass;
	private $gbd;
	private $bd;
	private $connec;
	var $result;
	var $Error;
	var $Errno;
	private $Config;
    
	function __Construct() {
        $this->Config = parse_ini_file("web.ini");
        $this->host=$this->Config["db.host"];
        $this->usuario=$this->Config["db.user"];
        $this->pass=$this->Config["db.password"];
        $this->bd=$this->Config["db.dbname"];
		$this->gbd=$this->Config["db.gestor"];
	}
	
	function setConection($host,$usuario,$pass,$base,$gestor) {
        $this->Config = parse_ini_file("web.ini");
        $this->host=$host;
        $this->usuario=$usuario;
        $this->pass=$pass;
		$this->bd=$base;
        $this->gbd=$gestor;
	}
	
	function conectar() {
		//var_dump($this->host." ".$this->usuario." ".$this->pass." ".$this->bd." ".$this->gbd );
		switch ($this->gbd) {
			case "PDO": 
				try {
					$this->connec=new PDO("mysql:host=".$this->host.";dbname=".$this->bd, $this->usuario, $this->pass,array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
					//var_dump($this->connec);
				} catch (PDOException $e) {
					$this->Error = "Ha fallado la conexi�n.". $e->getMessage();
				}
                break;
            case "MySQL": 
                $this->connec=new mysqli($this->host,$this->usuario,$this->pass,$this->bd);
                if (empty($this->connec)) {
                    $this->Error = "Ha fallado la conexi�n." .mysqli_error($this->connec);
                    echo $this->Error;
                }
				mysqli_select_db($this->connec,$this->bd);
				if (empty($this->connec)) {
                    $this->Error = "Ha fallado la conexi�n." .mysqli_error($this->connec);
                    echo $this->Error;
                }
				
                break;
            case "SyBase": 
                $this->connec=sybase_connect($this->host,$this->usuario,$this->pass);
                if (empty($this->connec)) {
                    $this->Error = "Ha fallado la conexi�n.";
                }
                if (!@sybase_select_db($this->bd, $this->connec)) {
                    $this->Error = "Imposible abrir ".$this->bd ;
                }
                return $this->connec;
                break;
            case "Postgres": 
                $this->connec = pg_connect("host=".$this->host." port=5432 password=".$this->pass." user=".$this->usuario." dbname=".$this->bd);
                break;
            case "Oracle": 
                break;
            case "SqlServer": 
                break;
		}
		return $this->connec;
	}
	
	function query($sql = "") {
		
		if (empty($sql)) {
			$this->Error = "No ha especificado una consulta SQL";
			return 0;
		}
		else {
            $sql = utf8_decode($sql);
            if ($this->Config["web.debug"]) {
                echo $sql."\n";
            }
            if ($this->Config["web.log"]) {
                @$this->Log("INFO",$sql);
			}
			switch($this->gbd) {
				case "PDO":
				
					if (!empty($this->connec)) {
						try {
							$this->result=$this->connec->query($sql);
						} catch (PDOException $e) {
							$this->Error = "Ha fallado la conexi�n.". $e->getMessage();
						}
						if ($this->Config["web.debug"]) {
							echo "\nResult: ";
						}
						if ($this->Config["web.log"]) {
							@$this->Log("INFO","\nResult: ");
						}
                    }
                    else {
                        echo $this->Error;
                    }
                    break;
				case "MySQL":
					
					if (!empty($this->connec)) {
						
                        $this->result=$this->connec->query($sql);
						//var_dump($this->result);
						if (empty($this->result)) {
                            $this->Errno = mysqli_errno($this->connec);
                            $this->Error = mysqli_error($this->connec);
                        }
						if ($this->Config["web.debug"]) {
							echo "\nResult: ";
						}
						if ($this->Config["web.log"]) {
							@$this->Log("INFO","\nResult: ");
						}
                    }
                    else {
                        echo $this->Error;
                    }
                    break;
				case "SyBase":
                    $this->result = sybase_query($sql, $this->connec);
                    if (!$this->result) {
                        $this->Error = "No Se ha podido hacer la Consulta";
                    }
                    break;
				case "Postgres":
                    $this->result = pg_query($sql);
                    if (!$this->result) {
                        $this->Error = pg_last_error();		
                    }
                    break;
				default;
					echo $this->gbd;
					break;
			}
            if ($this->Config["web.log"] && !empty($this->Error)) {
                @$this->Log("ERROR","\nDescripci�n: ".$this->Error. "\nSQL: " .$sql. "\n");
            }
			if ($this->Config["web.log"]) {
                @$this->Log("ERROR",$this->Error);
            }
			return $this->result;
		}
	}

	private function numcampos() {
		switch($this->gbd){
			case "PDO":
				//var_dump($this->result->columnCount());
				return $this->result->columnCount();
				break;
            case "MySQL":
                return mysqli_num_fields($this->result);
                break;
            case "SyBase":
                return sybase_num_fields($this->result);
                break;
            case "Postgres":
                return pg_num_fields($this->result);
                break;
		}
	}
	
	private function numregistros(){
		switch($this->gbd){
            case "MySQL":
                return mysqli_num_rows($this->connec,$this->result);
                break;
            case "SyBase":
                return sybase_num_rows($this->result);
                break;
            case "Postgres":
                return pg_num_rows($this->result);
                break;
		}
	}
	
	private function nombrecampo($numcampo) {
		switch($this->gbd){
			case "PDO":
				$count = 0;
				$names = array();
				foreach(range(0, $this->result->columnCount() - 1) as $column_index)
				{	
					$names[$count] = $this->result->getColumnMeta($column_index)["name"];
					//var_dump($names[$count]); echo "<br>";
					$count++;
				}
				
				return $names;
			break;
            case "MySQL":
				$count = 0;
				$names = array();
				while ($field = @mysqli_fetch_field($this->result)) {
					$names[$count] = $field->name;
					//echo $field->name;
					$count++;
				}
				return $names;
                break;
            case "SyBase":
                return sybase_fetch_field($this->result,$numcampo);  
                break;
            case "Postgres":
                return pg_field_name($this->result, $numcampo);
                break;
		}
	}
	
	private function enviarcolumnas() {
		switch($this->gbd){
            case "MySQL":
				//echo "paso";
                return $this->connec->fetch_row($this->result);
                break;
            case "SyBase":
                return sybase_fetch_row($this->result);  
                break;
            case "Postgres":
                return pg_fetch_row($this->result);
                break;
		}
	}
	
	function insert_id() {
		return mysql_insert_id(); 
	}
	
	function libera() {
		switch ($this->gbd) {
			case "MySQL":
                mysqli_free_result($this->result);
                break;
			case "Sybase":
                sybase_free_result($this->result);
                break;
			case "Postgres":
                pg_free_result($this->result);
                break;
		}
	}
	
	function datos() {
		$mdatos = array();
		$i=0;
		switch ($this->gbd) {
			case "PDO":
				//echo "paso";
				$names = array();
				$names = $this->nombrecampo(0);
				while ($row = $this->result->fetch(PDO::FETCH_BOTH)) {
					for ($j=0; $j  < $this->numcampos(); $j++) {
						$mdatos[$i][$names[$j]]= utf8_encode($row[$j]);
						//var_dump($row[$j]);
					}
					$i++;
				}
			break;
			case "MySQL":
				//echo "paso";
				$names = array();
				$names = $this->nombrecampo(0);
				while ($row = @mysqli_fetch_row($this->result)) {

					for ($j=0; $j  < $this->numcampos(); $j++) {
						$mdatos[$i][$names[$j]]= utf8_encode($row[$j]);
						//var_dump($row[$j]);
					}
					$i++;
				}
			break;
			default:
			while ($row = $this->enviarcolumnas()) {
				for ($j=0; $j  < $this->numcampos(); $j++) {
					$mdatos[$i][$this->nombrecampo($j)]= utf8_encode($row[$j]);
				}
				$i++;
			} 
			break;
		}
		//echo "probando";
		//var_dump($mdatos);
		return $mdatos;
	}
    
	function desconectar() {
		switch($this->gbd){
            case "MySQL":
                //mysql_close($this->connec);
                break;
            case "SyBase":
                sybase_close($this->connec);
                break;
            case "Postgres":
                pg_close($this->connec);
                break;
		}
	}

	function toXML($nodopadre) {
		$xml = '<?xml version="1.0" encoding="UTF-8"?>';
		$xml = $xml . '<xmlphpdbc>';
		$i=0;
		while ($row = $this->enviarcolumnas()) {
			$xml = $xml .  "<".$nodopadre.">";
			for ($j=0; $j  < $this->numcampos(); $j++) {
				$xml = $xml . "<".$this->nombrecampo($j).">".$row[$j]."</".$this->nombrecampo($j).">";
			}
			$xml = $xml . "</".$nodopadre.">";
			$i++;
		} 
		$xml = $xml . '</xmlphpdbc>';
        return $xml;
	}

	function toJSON() {
		return json_encode($this->datos());
	}
    
    private function Log($type,$string) {
		if (!empty($string)) {
        $fp = fopen($this->Config["web.FileLog"], 'a+');
        fwrite($fp, "[ ". date("d-m-Y H:i:s") ." ] ".$type." : ".$string."\n");
        fclose($fp);
		}
    }
}
?>