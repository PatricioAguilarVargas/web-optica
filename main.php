<?php 
	if(isset($_COOKIE['current']))
	{ 
		setcookie('current', $_COOKIE['current'] + 1, time() + 60); 
		$current = 'SI'; 
	} 
	else 
	{ 
		setcookie('current', 1, time() + 60); 
		$current = 'NO';  
	} 
	$dt = parse_ini_file("data.ini");
    include_once("sistemaWS/includes/phpdbc.min.php");
    require_once("sistemaWS/config/vars.php");

    $config1 = new Vars($dt);
    $db1 = new db();
    $db1->setConection($config1->host, $config1->usuario, $config1->contrasenia, $config1->bd, "PDO");
    $db1->conectar();

    $SELECT = "SELECT ID, FOTO, VALIDEZ FROM brc_promociones_web WHERE VIGENCIA = 'S' AND PRINCIPAL = 'S'";  
    $db1->query($SELECT);
    $promo = $db1->datos();
	$num_total_registros_promo = count($promo);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="<?=$dt["gen.Content-Type"]?>">
        <meta http-equiv="X-UA-Compatible" content="<?=$dt["gen.X-UA-Compatible"]?>">
        <meta name="viewport" content="<?=$dt["gen.viewport"]?>">
        <meta name="description" content="<?=$dt["gen.title"]?>">
        <meta name="author" content="<?=$dt["gen.author"]?>">
        <meta name="keywords" content="<?=$dt["gen.keywords"]?>" />
		<meta http-equiv="Expires" content="0">
		<meta http-equiv="Last-Modified" content="0">
		<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
		<meta http-equiv="Pragma" content="no-cache">
        <link rel="icon" href="<?=$dt["gen.icon"]?>">

        <title><?=$dt["gen.title"]?></title>
        <link href="css/bootstrap.css?v=<?php echo time();?>" rel="stylesheet">
        <link href="css/ie10-viewport-bug-workaround.css?v=<?php echo time();?>" rel="stylesheet">       
        <link href="css/font-awesome.min.css?v=<?php echo time();?>" rel="stylesheet">
        <link href="css/carousel.css?v=<?php echo time();?>" rel="stylesheet">
        <link href="css/bootstrap-select.min.css?v=<?php echo time();?>" rel="stylesheet">
        <link href="css/animate.css?v=<?php echo time();?>" rel="stylesheet">
        <link href="<?=$dt["gen.estilos"]?>?v=<?php echo time();?>" rel="stylesheet">
       
    </head>
    <body>
        <div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v5.0"></script>
         <div id="loader-wrapper">
            <div id="loader"></div>
        
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        
        </div>
        <?php include_once("web/navbar.php");?>
        <?php include_once("web/cabezera.php");?>
        <div  class="container-fluid">
            <?php include_once("web/container.php");?>
        </div>
        <?php include_once("web/footer.php");?>
        <div class="modal modal-danger fade" id="myModal" >
            <div class="modal-dialog">
                <div class="modal-content  text-center">
                    <div id="modColHeader" class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 id="modTitulo" class="modal-title"></h4>
                    </div>
                    <div id="modColBody"  style="background-color: white !important; color: black !important">
                        <div align="center" id="modBody"></div>
                    </div>
                </div> 
            </div>
        <div>
		
		
        <script src="js/ie-emulation-modes-warning.js?v=<?php echo time();?>"></script>
        <script src="js/jquery.min.js?v=<?php echo time();?>"></script>
        <script src="js/slick.js?v=<?php echo time();?>"></script>
        <script src="js/bootstrap.js?v=<?php echo time();?>"></script>
        <script src="js/holder.min.js?v=<?php echo time();?>"></script>
        <script src="js/velocity.js?v=<?php echo time();?>"></script>
        <script src="js/ie10-viewport-bug-workaround.js?v=<?php echo time();?>"></script>
        <script src="js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script src="js/jquery.mask.js?v=<?php echo time();?>"></script>
        <script src="js/jquery.waypoints.min.js?v=<?php echo time();?>"></script>
        <script>
            var counter = function() {
		        $('#section-counter').waypoint( function( direction ) {
                    if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
                        var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
                        $('.number').each(function(){
                            var $this = $(this),
                                num = $this.data('number');
                                console.log(num);
                                $this.animateNumber(
                                {
                                    number: num,
                                    numberStep: comma_separator_number_step
                                }, 7000
                            );
                        });
                    }
                } , { offset: '95%' } );
            }

            var contentWayPoint = function() {
                var i = 0;
                $('.ftco-animate').waypoint( function( direction ) {

                    if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
                        
                        i++;

                        $(this.element).addClass('item-animate');
                        setTimeout(function(){

                            $('body .ftco-animate.item-animate').each(function(k){
                                var el = $(this);
                                setTimeout( function () {
                                    var effect = el.data('animate-effect');
                                    if ( effect === 'fadeIn') {
                                        el.addClass('fadeIn ftco-animated');
                                    } else if ( effect === 'fadeInLeft') {
                                        el.addClass('fadeInLeft ftco-animated');
                                    } else if ( effect === 'fadeInRight') {
                                        el.addClass('fadeInRight ftco-animated');
                                    } else {
                                        el.addClass('fadeInUp ftco-animated');
                                    }
                                    el.removeClass('item-animate');
                                },  k * 50, 'easeInOutExpo' );
                            });
                            
                        }, 400);
                        
                    }

                } , { offset: '95%' } );
            };
            
            var modalPromocion = function() {
				if(<?= $num_total_registros_promo?> > 0){
					if ('<?= $current?>' == 'NO') {
						var id = '<?=$promo[0]["ID"]?>';
						var titulo = '<?=ucfirst($promo[0]["VALIDEZ"])?>';
						$("#modTitulo").html(titulo);
						var body = '<img src="comun/muestraImagenPromocion.php?cod=' + id + '" class="img-responsive">';
						$("#modBody").html(body);
						$("#myModal").modal("toggle");
					}
				}
				
			};

            $(document).ready(function() {
                setTimeout(function(){
                    $('body').addClass('loaded');
                }, 1500);
                counter();
                contentWayPoint();
                modalPromocion();

            });
			
		
        </script>
    </body>
</html>
