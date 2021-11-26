<?php

    $dt = parse_ini_file("./data.ini");
    include_once("./sistemaWS/includes/phpdbc.min.php");
    require_once("./sistemaWS/config/vars.php");

    $config = new Vars($dt);
    $db = new db();
    $db->setConection($config->host, $config->usuario, $config->contrasenia, $config->bd, "PDO");
    $db->conectar();

    $SELECT = "SELECT ID,TITULO,DESCRIPCION,FOTO,VIGENCIA FROM brc_convenio_web WHERE VIGENCIA = 'S'";
  
    $db->query($SELECT);
    $data = $db->datos();
    $num_total_registros = count($data);

?>

<div class="fila no-gutters justify-content-center mb-5 pb-5">
    <div class="col-md-7 text-center heading-section ftco-animate">
        <hr class="linea">
        <span class="subheading">Convenios Actuales</span>
    </div>
</div>
<div class="fila no-gutters justify-content-center mb-5 pb-5">

    <?php 
    if($num_total_registros > 0){
    
        for($i = 0; $i < $num_total_registros; $i++) { ?>   
                    
            <div class="col-md-4 d-flex align-self-stretch ftco-animate ">
                <div class="media block-6 services d-block text-center">
                    <div class="d-flex justify-content-center">
                        <img src="comun/muestraImagenConvenio.php?cod=<?=$data[$i]["ID"]?>" class="img-responsive img-thumbnail"/>
                    </div>
                    <div class="media-body p-2">
                        <h3 class="heading"><?=ucfirst($data[$i]["TITULO"])?></h3>
                        <p><?=ucfirst(mb_strtolower($data[$i]["DESCRIPCION"],'UTF-8'))?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?> 
        <div class="col-md-10">
            <div class="panel panel-default text-center">
                <div class="panel-heading">Convenios</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">No existen convenios registrados en este momento. Si desea realizar un convenio con <?=$dt["gen.title"]?> comuníquese con nuestro personal especificado en la sección de contacto más abajo.</div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    <?php  }?> 
   
</div>
<div class="fila no-gutters justify-content-center mb-5 pb-5">
    <div class="col-md-7 text-center heading-section ftco-animate">
        <hr class="linea">
        <span class="subheading">Contacto</span>
    </div>
</div>

<div class="container-fluid">
 
    <div class="row d-md-flex ftco-animate">
        <div class="col-lg-3">
            <div class="contact_info">
                <div class="info_item text-right">
                    <img src="<?=$dt["em.mailAdminImg1"]?>" style="width:250px; height:348px; "/>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="contact_info">
                    <div class="info_item text-left">
                        <h4 class="subheading"><?=$dt["em.mailAdminName1"]?></h4>
                        <h6><?=$dt["em.titulo1"]?></h6>
                        <p><?=$dt["em.texto1"]?></p>
                        <a href="mailto: <?=$dt["em.mailAdmin1"]?>"><?=$dt["em.mailAdmin1"]?></a>
                    </div>
            </div>
        </div>
    </div>
</div>
<BR>
<BR>