<div class="navbar-wrapper" style="z-index:900">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">     
            <div class="navbar-header">
                <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Desplegar navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand" style="padding-top: 15px; padding-left:20px; padding-right:20px;">
                    <img src="<?=$dt["gen.logo"]?>" height="18px" />
                </span>
            </div>
            <div id="navbar" class="navbar-collapse collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>">INICIO</a></li>
                    <li><a href="catalogo<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>?tipo=000001">LENTES ÓPTICOS</a></li>
                    <li><a href="catalogo<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>?tipo=000002">LENTES DE SOL</a></li>
                    <li><a href="atencion<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>">ATENCIÓN OFTALMOLÓGICA</a></li>
                    <li><a href="convenio<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>">CONVENIOS</a></li>
                    <li><a href="promocion<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>">PROMOCIONES</a></li>
                    <li><a href="historias<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>">HISTORIAS</a></li>
                    <li><a href="optica<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>">ÓPTICA</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>
</div>