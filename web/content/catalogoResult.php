<?php
    $TAMANO_PAGINACION = 12;

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
    $indice = 0;
    $pagina = 1;
    if (ISSET($_POST["pagina"])) {
        $pagina = trim($_POST["pagina"]);
        $indice = ($pagina - 1) * $TAMANO_PAGINACION;
    }

    $dt = parse_ini_file("../../data.ini");
    include_once("../../sistemaWS/includes/phpdbc.min.php");
    require_once("../../sistemaWS/config/vars.php");

    $config = new Vars($dt);
    $db = new db();
    $db->setConection($config->host, $config->usuario, $config->contrasenia, $config->bd, "PDO");
    $db->conectar();

    $SELECT = "SELECT PRO.CODIGO,PRO.DESCRIPCION AS DES_PRO,PRO.VALOR,MAR.DESCRIPCION DES_MAR,PRO.MODELO,PRO.FOTO1,PRO.FOTO2, PRO.COD_FORMA, PRO.COD_COLOR, PRO.COD_MATERIAL, PRO.COD_MARCA, PRO.COD_TIPO ";
    $SELECT = $SELECT . "FROM brc_producto_web PRO ";
    $SELECT = $SELECT . "INNER JOIN brc_codigos_web MAR ON MAR.TIPO = 'MARCA' AND MAR.CODIGO = PRO.COD_MARCA ";
    $SELECT = $SELECT . "WHERE COD_TIPO='".$tipoP."' AND PRO.VIGENCIA = 'S'";
  
    if($MarcasP != "ALL"){
        $SELECT = $SELECT . " AND COD_MARCA = '".$MarcasP."'";
    }

    if($MaterialP != "ALL"){
        $SELECT = $SELECT . " AND COD_MATERIAL = '".$MaterialP."'";
    }

    if($FormasP != "ALL"){
        $SELECT = $SELECT . " AND COD_FORMA = '".$FormasP."'";
    }

    if($ColoresP != "ALL"){
        $SELECT = $SELECT . " AND COD_COLOR = '".$ColoresP."'";
    }

    //var_dump($SELECT);
    $db->query($SELECT);
    $data = $db->datos();
    $num_total_registros = count($data);
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINACION);

    $SELECT = $SELECT ." ORDER BY PRO.DESCRIPCION DESC LIMIT ".$indice."," . $TAMANO_PAGINACION;
    $db->query($SELECT);
    $campos = $db->datos();
    $num_total_registros = count($campos);

    $limInf = 1;
    $limSup = $total_paginas;
    if(($pagina + 5) < $total_paginas){
        $limSup = ($pagina + 5);
    }
?>
<?php if($num_total_registros > 0 ){ 
    //paginacion
    if ($total_paginas > 1) {
        echo '<div class=" text-left col-md-12" style=""> <ul class="pagination ">';
        
        //retrocede 5 paginas
        if(($pagina - 5) > 0){
            $limInf = ($pagina - 5);
            $var = "'".$tipoP."','".$MarcasP."','".$MaterialP."','".$FormasP."','".$ColoresP."','".($pagina - 5)."'";
            echo '<li><a class="btn-sistema" onclick="javascript:MoverPaginacion('.$var.');return false;" href="#"><span class="glyphicon glyphicon-chevron-left"></span><span class="glyphicon glyphicon-chevron-left"></span></a></li>';
        }

        //retroceder a la pagina anterior
        if($pagina > 1){
            $var = "'".$tipoP."','".$MarcasP."','".$MaterialP."','".$FormasP."','".$ColoresP."','".($pagina - 1)."'";
            echo '<li><a onclick="javascript:MoverPaginacion('.$var.');return false;" href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>';
        }
        //muestra paginas
		for ($i=$limInf;$i<=$limSup;$i++) {

			if ($pagina == $i){
				echo '<li class="disable active"><a href="#">'.$pagina.'</a></li>';
            }else{
                $var = "'".$tipoP."','".$MarcasP."','".$MaterialP."','".$FormasP."','".$ColoresP."','".($i)."'";
                echo '<li><a onclick="javascript:MoverPaginacion('.$var.');return false;" href="#" style="text-decoration:none;">'.$i.'</a></li>';
            }
        }
       
        //avanzar a la pagina siguiente
        if ($pagina != $total_paginas){
            $var = "'".$tipoP."','".$MarcasP."','".$MaterialP."','".$FormasP."','".$ColoresP."','".($pagina + 1)."'";
                echo '<li><a onclick="javascript:MoverPaginacion('.$var.');return false;" href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>';
        }
         //avanza 5 paginas de la pagina actual
         if(($pagina + 5) < $total_paginas){
            $var = "'".$tipoP."','".$MarcasP."','".$MaterialP."','".$FormasP."','".$ColoresP."','".($pagina + 5)."'";
            echo '<li><a onclick="javascript:MoverPaginacion('.$var.');return false;" href="#"><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span></a></li>';
        }
        echo '</ul></div>';
	}    
?>
<br>
    <?php 
         echo '';
            //resultados
            for($i = 0; $i < $num_total_registros; $i++) { ?>   
				
                <div class="col-md-3 product-item ">
                    <div class="link-product">
                        <img class="image-results img-responsive" src="comun/muestraImagenProducto.php?cod=<?= $campos[$i]["CODIGO"] ?>&mod=<?= $campos[$i]["MODELO"] ?>&img=1" />
                        <img class="image-results img-responsive" src="comun/muestraImagenProducto.php?cod=<?= $campos[$i]["CODIGO"] ?>&mod=<?= $campos[$i]["MODELO"] ?>&img=2" />
                    </div>
                    <p class="product-name-results"><?= $campos[$i]["DES_MAR"] ?><p>
					<p class="product-model-results"><?= $campos[$i]["MODELO"] ?><p>
                    <!--p class="product-price-results">CLP$ <?= $campos[$i]["VALOR"] ?>.-<p-->
					<!--p class="product-code-results"><?= $campos[$i]["CODIGO"] ?><p-->
                    <a  href="#" 
                        class="link-detalle" 
                        onclick="javascript:CargaDetalle(
						'<?= $campos[$i]["CODIGO"] ?>',
						'<?= $tipoP ?>','<?= $MarcasP ?>',
						'<?= $MaterialP ?>',
						'<?= $FormasP ?>',
						'<?= $ColoresP ?>',
						'<?= $campos[$i]["COD_MARCA"] ?>',
						'<?= $campos[$i]["COD_MATERIAL"] ?>',
						'<?= $campos[$i]["COD_FORMA"] ?>',
						'<?= $campos[$i]["COD_COLOR"] ?>',
                        '<?= $pagina ?>');return false;">Detalle >></a>
                        
                </div>
                <?php if($num_total_registros == 1) { ?>
                    <div class="col-md-9"></div>
                <?php } ?>
                <?php if($num_total_registros == 2 && $i == 1) { ?>
                    <div class="col-md-6"></div>
                <?php } 
     
            } 
        echo '';
        //paginacion
        if ($total_paginas > 1) {
            echo '<div class=" text-left col-md-12" style=""> <ul class="pagination ">';
            
            //retrocede 5 paginas
            if(($pagina - 5) > 0){
                $limInf = ($pagina - 5);
                $var = "'".$tipoP."','".$MarcasP."','".$MaterialP."','".$FormasP."','".$ColoresP."','".($pagina - 5)."'";
                echo '<li><a class="btn-sistema" onclick="javascript:MoverPaginacion('.$var.');return false;" href="#"><span class="glyphicon glyphicon-chevron-left"></span><span class="glyphicon glyphicon-chevron-left"></span></a></li>';
            }
    
            //retroceder a la pagina anterior
            if($pagina > 1){
                $var = "'".$tipoP."','".$MarcasP."','".$MaterialP."','".$FormasP."','".$ColoresP."','".($pagina - 1)."'";
                echo '<li><a onclick="javascript:MoverPaginacion('.$var.');return false;" href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>';
            }
            //muestra paginas
            for ($i=$limInf;$i<=$limSup;$i++) {
    
                if ($pagina == $i){
                    echo '<li class="disable active"><a href="#">'.$pagina.'</a></li>';
                }else{
                    $var = "'".$tipoP."','".$MarcasP."','".$MaterialP."','".$FormasP."','".$ColoresP."','".($i)."'";
                    echo '<li><a onclick="javascript:MoverPaginacion('.$var.');return false;" href="#" style="text-decoration:none;">'.$i.'</a></li>';
                }
            }
           
            //avanzar a la pagina siguiente
            if ($pagina != $total_paginas){
                $var = "'".$tipoP."','".$MarcasP."','".$MaterialP."','".$FormasP."','".$ColoresP."','".($pagina + 1)."'";
                    echo '<li><a onclick="javascript:MoverPaginacion('.$var.');return false;" href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>';
            }
             //avanza 5 paginas de la pagina actual
             if(($pagina + 5) < $total_paginas){
                $var = "'".$tipoP."','".$MarcasP."','".$MaterialP."','".$FormasP."','".$ColoresP."','".($pagina + 5)."'";
                echo '<li><a onclick="javascript:MoverPaginacion('.$var.');return false;" href="#"><span class="glyphicon glyphicon-chevron-right"></span><span class="glyphicon glyphicon-chevron-right"></span></a></li>';
            }
            echo '</ul></div>';
        }    
?>
<?php }else{ ?>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Validación</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">No existen registros en la base de datos.</div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
<?php } ?>


