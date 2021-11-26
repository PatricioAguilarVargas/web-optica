<?php

    $dt = parse_ini_file("./data.ini");
    include_once("./sistemaWS/includes/phpdbc.min.php");
    require_once("./sistemaWS/config/vars.php");

    $config = new Vars($dt);
    $db = new db();
    $db->setConection($config->host, $config->usuario, $config->contrasenia, $config->bd, "PDO");
    $db->conectar();

    $SELECT = "SELECT ID,VALIDEZ,VIGENCIA,PRINCIPAL,FOTO FROM brc_promociones_web WHERE VIGENCIA = 'S'";
  
    $db->query($SELECT);
    $data = $db->datos();
    $num_total_registros = count($data);
	


?>

<div class="fila no-gutters justify-content-center mb-5 pb-5">
    <div class="col-md-7 text-center heading-section ftco-animate">
        <hr class="linea">
        <span class="subheading">Promociones de nuestra óptica</span>
    </div>
</div>
<div class="fila no-gutters justify-content-center mb-5 pb-5">

    <?php 
    if($num_total_registros > 0){
    
        for($i = 0; $i < $num_total_registros; $i++) { ?>   
                    
            <div class="col-md-4 d-flex align-self-stretch ftco-animate ">
                <div class="media block-6 services d-block text-center">
                    <div class="d-flex justify-content-center">
                        <img src="comun/muestraImagenPromocion.php?cod=<?=$data[$i]["ID"]?>" class="img-responsive img-thumbnail"/>
                    </div>
                    <div class="media-body p-2">
                        <h3 class="heading"><?=ucfirst($data[$i]["VALIDEZ"])?></h3>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?> 
        <div class="col-md-10">
            <div class="panel panel-default text-center">
                <div class="panel-heading">Promociones</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">No existen promociones registrados en este momento.</div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    <?php  }?> 
   
</div>
<br>
<br>
<br>

   
   