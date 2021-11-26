<div class="remove-pantalla" >
	<div class="row" style="margin-top:90px; ">
        <div class="col-md-12" style="text-align: center;">
			<h1 class="texto-cabezera-der" style="position: static;"><?=$dt["gen.title"]?></h1>
		</div>
	</div>
    <div class="row" style="margin-top:10px;">
        <div class="col-lg-12">
            <img style="width:100%;" src="img/web/banner-2-.jpg">
		</div>
	</div>
	<br><br>
</div>
<div id="myCarousel" class="carousel slide remove-mobile" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <a href="optica<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>" style="text-decoration:none;">
                <img class="first-slide" src="<?=$dt["car.first.slide"]?>" class="img-responsive" alt="First slide">
                <div class="container">
                    <div class="carousel-caption">
                        <div class="teaser-circle teaser-circle-green remove-mobile" > 
                            <div class="teaser-circle-font">
                                <br>
                                <h4><?=$dt["gen.title"]?></h4>
                                <hr class="hr">
                                <h2>Preocupada Por Su Visión</h2>
                                <hr class="hr">
                                <h4>Lo Esperamos</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="item">
            <a href="catalogo<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>?tipo=000002" style="text-decoration:none;">
                <img class="second-slide" src="<?=$dt["car.second.slide"]?>" class="ing-responsive" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                        <div class="teaser-circle teaser-circle-blue remove-mobile" > 
                            <div class="teaser-circle-font">
                                <br>
                                <h4>Lentes de Sol</h4>
                                <hr class="hr">
                                <h2>Siempre Nuevos Modelos</h2>
                                <hr class="hr">
                                <h4>Ver Màs &raquo;</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="item">
            <a href="catalogo<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>?tipo=000001" style="text-decoration:none;">
                <img class="third-slide" src="<?=$dt["car.third.slide"]?>" class="ing-responsive" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption">
                        <div class="teaser-circle teaser-circle-green remove-mobile" > 
                            <div class="teaser-circle-font">
                                <br>
                                <h4>Lentes Ópticos</h4>
                                <hr class="hr">
                                <h2>La Mejor Calidad en Marcos</h2>
                                <hr class="hr">
                                <h4>Ver Màs &raquo;</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="item">
            <a href="atencion<?= ($dt["gen.siExtencion"] == "S" ? ".php" : "" )?>" style="text-decoration:none;">
                <img class="forth-slide" src="<?=$dt["car.forth.slide"]?>" class="ing-responsive" alt="Forth slide">
                <div class="container">
                    <div class="carousel-caption">
                        <div class="teaser-circle teaser-circle-green remove-mobile" > 
                            <div class="teaser-circle-font">
                                <h4>Atención Oftamológica</h4>
                                <hr class="hr">
                                <h2>Médicos Especializados en Oftalmología</h2>
                                <hr class="hr">
                                <h4>Ver Màs &raquo;</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>