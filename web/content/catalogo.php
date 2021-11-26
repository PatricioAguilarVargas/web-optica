<?php
    if (!ISSET($_GET["tipo"])) {
        $_GET["tipo"] = "000001";
    }

    if (!ISSET($_GET["marca"])) {
        $_GET["marca"] = "ALL";
    }
    include_once("sistemaWS/includes/phpdbc.min.php");
    require_once("sistemaWS/config/vars.php");

    $config = new Vars($dt);
    $db = new db();
    $db->setConection($config->host, $config->usuario, $config->contrasenia, $config->bd, "PDO");
    $db->conectar();


    $SELECT = "SELECT CODIGO,DESCRIPCION ";
    $SELECT = $SELECT . "FROM brc_codigos_web WHERE TIPO = 'MARCA' ";
    $db->query($SELECT);
    $Marcas = $db->datos();

    $SELECT = "SELECT CODIGO,DESCRIPCION ";
    $SELECT = $SELECT . "FROM brc_codigos_web WHERE TIPO = 'MATERIAL' "; 
    $db->query($SELECT);
    $Material = $db->datos();

    $SELECT = "SELECT CODIGO,DESCRIPCION ";
    $SELECT = $SELECT . "FROM brc_codigos_web WHERE TIPO = 'FORMA' ";  
    $db->query($SELECT);
    $Formas = $db->datos();

    $SELECT = "SELECT CODIGO,DESCRIPCION ";
    $SELECT = $SELECT . "FROM brc_codigos_web WHERE TIPO = 'COLOR' ";  
    $db->query($SELECT);
    $Colores = $db->datos();
?>

<div class="fila no-gutters justify-content-center pb-5">
    <div class="col-md-7 text-center heading-section ftco-animate">
        <hr class="linea">
        <span class="subheading">Marcos</span>
    </div>
</div>
<div class="text-center heading-section ftco-animate">
    <div class="row">
        <div class="col-md-3 text-center">
                <form>
                    <div class="form-group">
                        <label for="marca">Marcas</label><br>
                        <select name="marca" id="marca" class="selectpicker" data-size="5" data-live-search="true" data-style="btn-sistema">
                            <option <?= ($_GET["marca"] == "ALL")? "selected='selected'": "" ?> value="ALL">TODAS</option> 
                            <?php foreach ($Marcas as $clave) { ?>
                                <option <?= ($_GET["marca"] == $clave["CODIGO"])? "selected='selected'": "" ?> value="<?= $clave["CODIGO"] ?>"><?= $clave["DESCRIPCION"] ?></option>    
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="material">Material</label><br>
                        <select name="material" id="material" class="selectpicker" data-size="5" data-live-search="true" data-style="btn-sistema">
                            <option value="ALL">TODOS</option> 
                            <?php foreach ($Material as $clave) { ?>
                                <option value="<?= $clave["CODIGO"] ?>"><?= $clave["DESCRIPCION"] ?></option>    
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="forma">Formas</label><br>
                        <select name="forma" id="forma" class="selectpicker" data-size="5" data-live-search="true" data-style="btn-sistema">
                            <option value="ALL">TODAS</option> 
                            <?php foreach ($Formas as $clave) { ?>
                                <option value="<?= $clave["CODIGO"] ?>"><?= $clave["DESCRIPCION"] ?></option>    
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="color">Colores</label><br>
                        <select name="color" id="color" class="selectpicker" data-size="5" data-live-search="true" data-style="btn-sistema">
                            <option value="ALL">TODOS</option> 
                            <?php foreach ($Colores as $clave) { ?>
                                <option value="<?= $clave["CODIGO"] ?>"><?= $clave["DESCRIPCION"] ?></option>    
                            <?php } ?>
                        </select>
                    </div>
                </form>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <span id="catalogoResult"></span>     
                </div>
                
            </div>

        </div>
        
    </div>
</div>
<br>
<br>

<div class="modal fade" id="detalleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content panel-default ">
            <div class="modal-header panel-heading text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><span id="detTitulo"></span></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img id="detImg" class="img-responsive" src="" />
                    </div>
                    <div class="col-md-4">
                        <label for="">Código:</label>
                        <p><span id="detCodigo"></span></p>
                        <label for="">Modelo:</label>
                        <p><span id="detModelo"></span></p>
                        <label for="">Color:</label>
                        <p><span id="detColor"></span></p>
                        <label for="">Forma:</label>
                        <p><span id="detForma"></span></p>
                    </div>
                    <div class="col-md-4">
                        <label for="">Descripción:</label>
                        <p><span id="detDescripcion"></span></p>
                        <label for="">Marca:</label>
                        <p><span id="detMarca"></span></p>
                        <label for="">Material:</label>
                        <p><span id="detMaterial"></span></p>
                        <?php /*<a onclick="javascript:VolverResult('<?= $tipoP ?>','<?= $MarcasP ?>','<?= $MaterialP ?>','<?= $FormasP ?>','<?= $ColoresP ?>','<?= $pagina ?>');return false;" href="#" class="btn btn-sistema" >volver</a> */ ?>
                    </div>
                </div>
				<hr class="linea">
				<div class="row text-center">
					<div id="fb-comments" class="fb-comments" data-href="<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" data-width="100%" data-numposts="3"></div>
				</div>
            </div>
        </div>
    </div>
</div>
