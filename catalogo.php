<?php $page="catalogo"; ?>
<?php include_once("main.php");?>

<script>
    $(document).ready(function(){
        BuscarProductos();
		$("#marca").on("change",function(){
            BuscarProductos();
        });
        $("#material").on("change",function(){
            BuscarProductos();
        });
        $("#forma").on("change",function(){
            BuscarProductos();
        });
        $("#color").on("change",function(){
            BuscarProductos();
        });   
	});
    
    function BuscarProductos(){
        marca = $("#marca").val();
        material = $("#material").val();
        forma = $("#forma").val();
        color = $("#color").val();
        $.ajax({
                data:  {
                    "tipo": "<?= $_GET["tipo"] ?>",
                    "marca" : marca.trim(),
                    "material" : material.trim(),
                    "forma" : forma.trim(),
                    "color" : color.trim()
                },
                url:   'web/content/catalogoResult.php',
                type:  'post',
                beforeSend: function () {
                        $("#catalogoResult").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#catalogoResult").html(response);
                }
        });
    }

    function CargaDetalle(codigo,tipo,marca,material,forma,color,marcaB,materialB,formaB,colorB){
         $.ajax({
                data:  {
                    "det": codigo,
                    "tipo": tipo.trim(),
                    "marca" : marca.trim(),
                    "material" : material.trim(),
                    "forma" : forma.trim(),
                    "color" : color.trim(),
					"marcaB" : marcaB.trim(),
                    "materialB" : materialB.trim(),
                    "formaB" : formaB.trim(),
                    "colorB" : colorB.trim()
                },
                url:   'web/content/catalogoDetalle.php',
                type:  'post',
                beforeSend: function () {

                        //$("#catalogoResult").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        //$("#catalogoResult").html(response);
                        res = JSON.parse(response)
						var urlFacebook = "<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" + "?cod="+ res[0].CODIGO +"&mod=" + res[0].MODELO ;
						var urlAttr = "app_id=&container_width=0&height=100&href=" + urlFacebook + "&locale=es_LA&numposts=5&sdk=joey&version=v5.0";
                        var urlAttrFrame = "https://www.facebook.com/plugins/feedback.php?app_id&channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D44%23cb%3Df1dcc38d9ce967%26domain%3D<?=$_SERVER['HTTP_HOST']?>%26origin%3D<?=$_SERVER['HTTP_HOST']?>%252Ff2a9645f2fbdae8%26relation%3Dparent.parent&container_width=0&height=100&href=http%3A%2F%2F" + urlFacebook + "&locale=es_LA&numposts=5&sdk=joey&version=v5.0";
						$("#detImg").attr("src", "comun/muestraImagenProducto.php?cod="+ res[0].CODIGO +"&mod=" + res[0].MODELO + "&img=2")
                        $("#fb-comments").attr("data-href", urlFacebook);
						$("#fb-comments").attr("fb-iframe-plugin-query", urlAttr);
						document.getElementById("fb-comments").childNodes[0].setAttribute("style","vertical-align: bottom; width: 100%; height: 315px;");
						document.getElementById("fb-comments").childNodes[0].childNodes[0].setAttribute("style","border: none; visibility: visible; width: 100%; height: 315px;overflow: scroll;");
						document.getElementById("fb-comments").childNodes[0].childNodes[0].setAttribute("src",urlAttrFrame);
						document.getElementById("fb-comments").childNodes[0].childNodes[0].setAttribute("scrolling","yes");
                        
						$("#detTitulo").html(res[0].DES_MAR);
                        $("#detCodigo").html(res[0].CODIGO);
                        $("#detModelo").html(res[0].MODELO);
                        $("#detColor").html(res[0].DES_COL);
                        $("#detForma").html(res[0].DES_FOR);
                        $("#detDescripcion").html(res[0].DES_PRO);
                        $("#detMarca").html(res[0].DES_MAR);
                        $("#detMaterial").html(res[0].DES_MAT);
					
						
						$("#detalleModal").modal();
                }
        });
    }

    function MoverPaginacion(tipo,marca,material,forma,color,pagina){
         $.ajax({
                data:  {
                    "tipo": tipo.trim(),
                    "marca" : marca.trim(),
                    "material" : material.trim(),
                    "forma" : forma.trim(),
                    "color" : color.trim(),
                    "pagina" : pagina.trim()
                },
                url:   'web/content/catalogoResult.php',
                type:  'post',
                beforeSend: function () {
                        $("#catalogoResult").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#catalogoResult").html(response);
                }
        });
    }

    function VolverResult(tipo,marca,material,forma,color){
         $.ajax({
                data:  {
                    "tipo": tipo.trim(),
                    "marca" : marca.trim(),
                    "material" : material.trim(),
                    "forma" : forma.trim(),
                    "color" : color.trim()
                },
                url:   'web/content/catalogoResult.php',
                type:  'post',
                beforeSend: function () {
                        $("#catalogoResult").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#catalogoResult").html(response);
                }
        });
    }

   
</script>