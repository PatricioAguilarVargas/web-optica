<?php
    if (!ISSET($_GET["tipo"])) {
        $_GET["tipo"] = "000001";
    }
    $dt = parse_ini_file("data.ini");
    include_once("sistemaWS/includes/phpdbc.min.php");
    require_once("sistemaWS/config/vars.php");

    $config = new Vars($dt);
    $db = new db();
    $db->setConection($config->host, $config->usuario, $config->contrasenia, $config->bd, "PDO");
    $db->conectar();

    $SELECT = "SELECT CODIGO,IMG ";
    $SELECT = $SELECT . "FROM brc_codigos_web WHERE TIPO = 'MARCA' ";  
    $db->query($SELECT);
    $result = $db->datos();
	
	$SELECT ="SELECT ID,TITULO,FOTO,VIGENCIA FROM brc_destacados_web WHERE VIGENCIA = 'S' ";
    $db->query($SELECT);
    $data = $db->datos();
    $num_total_registros = count($data);
?>

<div class="fila no-gutters justify-content-center mb-5 pb-5">
    <div class="col-md-7 text-center heading-section ftco-animate">
        <hr class="linea">
        <span class="subheading">Armazones & Cristales</span>
    </div>
</div>
<div class="row block-3 d-md-flex ftco-animate" >
    <a href="catalogo<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>?tipo=000001" class="image" style="background-image: url('img/web/inicio1.jpg'); "> </a>
    <div class="text">
        <h4 class="subheading">Armazones Ópticos</h4>
        <h2 class="heading"><a href="catalogo<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>?tipo=000001">Podrás ver los últimos marcos de lentes ópticos</a></h2>
        <p>En esta sección puedes encontrar una gran variedad de lentes ópticos que puedes necesitar para solucionar tu problema de visión. Contamos con armazones provenientes desde diferentes partes del mundo para ti.</p>
    </div>
</div>

<div class="row block-3 d-md-flex ftco-animate">
    <a href="catalogo<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>?tipo=000002" class="image order-2" style="background-image: url('img/web/inicio2.jpg'); "></a>
    <div class="text order-1">
        <h4 class="subheading">Lentes De Sol</h4>
        <h2 class="heading"><a href="catalogo<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>?tipo=000002">Podrás ver los últimos lentes de sol</a></h2>
        <p>En esta sección puedes encontrar una gran variedad de lentes de sol que puedes necesitar al momento de conducir o simplemente para salir en un dia soleado. Contamos con lentes de sol provenientes desde diferentes partes del mundo para ti.</p>
    </div>
</div>
<br>
<div class="fila no-gutters justify-content-center mb-5 pb-5">
    <div class="col-md-7 text-center heading-section ftco-animate">
        <hr class="linea">
        <span class="subheading">Destacados</span>
    </div>
</div>
<div class="fila justify-content-center ">
	<?php 
    if($num_total_registros > 0){
    
        for($i = 0; $i < $num_total_registros; $i++) { ?>   
            <div class="ftco-animate zoom">
				<a href="#"> <img 
					src="comun/muestraImagenDestacados.php?cod=<?=$data[$i]["ID"]?>" 
					alt="<?=$data[$i]["TITULO"]?>" 
					
					class="img-responsive"/></a>
			</div>
        <?php } ?>
    <?php } else { ?> 
        <div class="col-md-10">
            <div class="panel panel-default text-center">
                <div class="panel-heading">Destacados</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">No existen productos destacados registrados en este momento.</div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    <?php  }?> 
   
    
</div>  
<br>
<div class="row fila no-gutters justify-content-center mb-5 pb-5">
    <div class="col-md-7 text-center heading-section ftco-animate">
        <hr class="linea">
        <span class="subheading">Atención Oftalmológica</span>
    </div>
</div>
<div class="row block-3 d-md-flex ftco-animate" >
    <a href="atencion<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>" class="image" style="background-image: url('img/web/inicio3.jpg'); "> </a>
    <div class="text">
        <h4 class="subheading">API Oftalmología</h4>
        <h2 class="heading"><a href="atencion<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>">Podrás reservar tu hora oftalmológica</a></h2>
        <p>En esta sección puedes reservar tu hora oftalmológica sin ningún tipo de problemas como esperar o llamar por teléfono. Contamos con un API que se conecta directamente con los oftalmólogos con los que <?=$dt["gen.title"]?> tiene convenios.</p>
    </div>
</div>

<div class="row block-3 d-md-flex ftco-animate">
    <a href="optica<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>" class="image order-2" style="background-image: url('img/web/inicio4.jpg'); "></a>
    <div class="text order-1">
        <h4 class="subheading">Óptica</h4>
        <h2 class="heading"><a href="optica<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>">Puedes contactarnos y conocernos</a></h2>
        <p>Si tu deseo es saber cómo llegar a nuestra <?=$dt["gen.title"]?> o contactarnos en esta sección puedes encontrar como hacerlo. Además de saber nuestra misión y visión.</p>
    </div>
</div>
<br>
<div class="fila no-gutters justify-content-center mb-5 pb-5">
    <div class="col-md-7 text-center heading-section ftco-animate">
        <hr class="linea">
        <span class="subheading">Marcas</span>
    </div>
</div>
<div class="row">
    <div class="col-md-12 ftco-animate">
        <div class="customer-logos">
        <?php foreach($result as $row){ ?>
            <div class="slide"><a href="catalogo<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>?tipo=000001&marca=<?=$row["CODIGO"]?>"><img src="<?=$dt['gen.sistema'].$row["IMG"]?>"></a></div>
        <?php } ?>
        </div>
    </div>
</div>
<br>
<div class="fila no-gutters justify-content-center mb-5 pb-5">
    <div class="col-md-7 text-center heading-section ftco-animate">
        <hr class="linea">
        <span class="subheading">Ubicación & Contáctenos</span>
    </div>
</div>
<div class="container-fluid">
    <div class="row ftco-animate">
        <div class="col-md-12">
            <div class="responsiveContent">  
                <iframe  src="<?=$dt["ub.map"]?>" frameborder="0" style="border:0; min-height: 300px;display:block" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row d-md-flex ftco-animate">
        <div class="col-lg-3">
            <div class="contact_info">
                <div class="info_item">
                        <i class="glyphicon glyphicon-home"></i>
                        <h6><?=$dt["ub.ciudad"]?></h6>
                        <p><?=$dt["ub.direccion"]?></p>
                </div>
                <div class="info_item">
                        <i class="glyphicon glyphicon-earphone"></i>
                        <h6><a href="#"><?=$dt["ub.telefono"]?></a></h6>
                        <p><?=$dt["gen.horario"]?><br>
                        <?=$dt["gen.horarioFDS"]?></p>
                </div>
                <div class="info_item">
                        <i class="glyphicon glyphicon-envelope"></i>
                        <h6><a href="#"><?=$dt["em.mailAdmin1"]?></a></h6>
                        <p>Envíenos sus consultas en cualquier momento!</p>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                <div class="col-md-6">
                    <div class="form-group">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Su Nombre">
                    </div>
                    <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese Su Correo Electrónico">
                    </div>
                    <div class="form-group">
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese Su Teléfono">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="comments" id="comments"  class="form-control" placeholder="En que puedo ayudarle?"></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                <button type="button" class="btn btn-sistema btn-block" name="enviar" id="enviar" value="Enviar">Enviar</button> 
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<br>