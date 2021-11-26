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

    //var_dump($dt);die();
    $config = new Vars($dt);
    $db = new db();
    $db->setConection($config->host, $config->usuario, $config->contrasenia, $config->bd, "PDO");
    $db->conectar();
    // buscar dias con atencion
    $SELECT = "SELECT DISTINCT DIA, CONCAT( SUBSTRING(DIA,7, 2),'/',SUBSTRING(DIA,5, 2), '/' ,SUBSTRING(DIA,1, 4)) AS DIA_FORMAT ";
    $SELECT = $SELECT . "FROM brc_operativos WHERE DIA > SUBSTRING(REPLACE(CONVERT(NOW() USING latin1), '-', ''),1,8) AND TIPO_OPERATIVO = 'O00001'";  
    $db->query($SELECT);
    $Dias = $db->datos();
    
    // doctores segun el dia
    $SELECT = "SELECT DISTINCT RUT_DOCTOR, NOMBRE ";
    $SELECT = $SELECT . "FROM brc_operativos INNER JOIN brc_persona ON RUT_DOCTOR = RUT ";
    $SELECT = $SELECT .  "WHERE DIA = '" . $diaP . "'  AND CAT_PERSONA = 'P00002' AND TIPO_OPERATIVO = 'O00001'";
    $db->query($SELECT);
    $doctores = $db->datos();

    // horas de segun el dia y doctor
    $SELECT = "SELECT DISTINCT HORA, CONCAT(SUBSTRING(HORA,1,2),':',SUBSTRING(HORA,3,2)) as HORA_FORMAT ";
    $SELECT = $SELECT . "FROM brc_operativos INNER JOIN brc_persona ON RUT_DOCTOR = RUT ";  
    $SELECT = $SELECT .  "WHERE DIA = '" . $diaP . "' AND RUT_DOCTOR = ".$docP." AND CAT_PERSONA = 'P00002' AND TIPO_OPERATIVO = 'O00001'";
    $db->query($SELECT);
    $horas = $db->datos();

    //si existe la persona como cliente
    $SELECT = "SELECT RUT,DV,CAT_PERSONA,NOMBRE,DIRECCION,TELEFONO,EMAIL ";
    $SELECT = $SELECT . "FROM brc_persona WHERE CAT_PERSONA = 'P00001' AND RUT = ".$rutVar[0] ;  
    $db->query($SELECT);
    $paciente = $db->datos();
    
    //si el paciente tiene una hora asignada segun dia y hora
    $SELECT = "SELECT DISTINCT NOMBRE,CONCAT(SUBSTRING(HORA_PACIENTE,1,2),':',SUBSTRING(HORA_PACIENTE,3,2)) as HORA_FORMAT ";
    $SELECT = $SELECT . "FROM brc_operativos O1 INNER JOIN brc_operativos_detalle O2 ON O1.DIA = O2.DIA AND O1.HORA = O2.HORA AND O1.RUT_DOCTOR = O2.RUT_DOCTOR";  
    $SELECT = $SELECT . " INNER JOIN brc_persona ON RUT_CLIENTE = RUT ";  
    $SELECT = $SELECT .  "WHERE O1.DIA = '" . $diaP . "' AND 	RUT_CLIENTE = ".$rutVar[0]." AND O1.HORA='".$horP."'  AND CAT_PERSONA = 'P00001'  AND TIPO_OPERATIVO = 'O00001'";
    //var_dump($SELECT);die();
    $db->query($SELECT);
    $consulta = $db->datos();
    
    
?>
<?php
if(count($Dias) > 0){
?>
    <div class="row">
        <div class="col-md-3"  style="border-right: 1px solid #5a5a5a">

                <div class="form-group">
                    <label for="dia">DÍA:</label><br>
                    <select name="dia" id="dia" data-style="btn-sistema">
                        <option value="">Seleccione un día</option> 
                        <?php foreach ($Dias as $clave) { ?>
                            <option <?= ($clave["DIA"] == $diaP) ? 'selected' : '' ?> value="<?= $clave["DIA"] ?>"><?= $clave["DIA_FORMAT"] ?></option>    
                        <?php } ?>
                    </select>
                </div>
                <div id="docBox" class="form-group">
                    <label for="doc">DOCTOR:</label><br>
                    <select name="doc" id="doc" class="selectpicker" data-style="btn-sistema">
                        <option value="0">Seleccione un doctor</option> 
                        <?php foreach ($doctores as $clave) { ?>
                            <option <?= ($clave["RUT_DOCTOR"] == $docP) ? 'selected' : '' ?> value="<?= $clave["RUT_DOCTOR"] ?>"><?= $clave["NOMBRE"] ?></option>    
                        <?php } ?>
                    </select>
                </div>
                <div id="horBox" class="form-group">
                    <label for="hor">HORA:</label><br>
                    <select name="hor" id="hor" class="selectpicker" data-style="btn-sistema">
                        <option value="0">Seleccione una hora</option> 
                        <?php foreach ($horas as $clave) { ?>
                            <option <?= ($clave["HORA"] == $horP) ? 'selected' : '' ?> value="<?= $clave["HORA"] ?>"><?= $clave["HORA_FORMAT"] ?></option>    
                        <?php } ?>
                    </select>
                </div>

        </div>

        <div class="col-md-9">
            <!-- buscar -->
            <div id="busCliBox" class="row">
                <div class="col-md-4 text-left">
                    <label class="label label-default" for="rut">RUT:</label>
                    <input type="text" <?= ($rutP != "0-0") ? 'value="'.$rutP.'"' : '' ?> <?= ($rutP != "0-0") ? 'disabled="disabled"' : '' ?> id="rut" class="form-control" name="rut" size="12" maxlength="12" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="00000000-K">
                    <input type="hidden" name="rutS" id="rutS" value="<?= $rutP ?>">
                </div>
                <div class="col-md-2">
                    <br>
                <button type="submit" class="btn btn-sistema" id="buscar-button" name="buscar-button">BUSCAR</button>
                </div>
                <div class="col-md-6"></div>
            </div>
            <!-- existe -->
            <div id="exiCliBox" class="row">
                <br>
                <div class="col-md-12">
                    <p style="font-size: 16px">Estimad@ <?= $paciente[0]["NOMBRE"]?> sus datos se encuentran en nuestras bases de datos. Presione <strong>CONFIRMAR</strong> si desea confirmar su hora.</p>
                    <br>
                    <button type="button" class="btn btn-sistema" id="confirmar-button" name="confirmar-button">CONFIRMAR</button>
                </div>
            </div>
            <!-- nuevo -->
            <div id="nueCliBox" >
                <br>
                <div class="row">
                    <div class="col-md-6 text-left">
                        <label class="label label-default" for="nombre">NOMBRE:</label>
                        <input type="text" id="nombre" class="form-control" name="nombre" size="255" maxlength="255" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="ingrese nombre completo">
                    </div>
                    <div class="col-md-6 text-left">
                        <label class="label label-default" for="direccion">DIRECCIÓN:</label>
                        <input type="text" id="direccion" class="form-control" name="direccion" size="255" maxlength="255" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="ingrese su dirección">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6 text-left">
                        <label class="label label-default" for="fono">TELÉFONO:</label>
                        <input type="text" id="fono" class="form-control fono" name="fono" size="25" maxlength="25" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="ingrese un n° telefónico">
                    </div>
                    <div class="col-md-6 text-left">
                        <label class="label label-default" for="mail">E-MAIL:</label>
                        <input type="text" id="mail" class="form-control" name="mail" size="255" maxlength="255" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="ingrese un E-Mail">
                    </div>
                </div>
                <br>
                <p style="font-size: 16px">Estimad@ cliente necesitamos que ingrese sus datos para reservar su hora. Presione <strong>CONFIRMAR</strong> para guardar la reserva.</p>
                <br>
                <button type="button" class="btn btn-sistema" id="guardar-button" name="guardar-button">CONFIRMAR</button>
            </div>
            <!-- buscar -->
            <div id="conCliBox" class="row">
                <div class="col-md-12">
                    <br>
                    <p style="font-size: 16px">Estimad@ <?= $consulta[0]["NOMBRE"]?> usted tiene una reserva para el dia <?=$diaP?> a partir de las <?=$horP?>  </p>
                </div>
            </div>
        </div>
    </div>
    <br>
<?php
}else{
?>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Atención Oftalmológica</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">No existen horas registradas en la base de datos.</div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
<?php
}
?>