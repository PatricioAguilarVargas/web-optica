<?php $page="atencion"; ?>
<?php include_once("main.php");?>
<?php
/*
    * searchdata busca los datos segun la opcion y la carga un html (atencionResult.php) en un div atencionResult
            opciones:   dia = busca los dias mayores al actual, se ejecuta al cargar la pagina
                    doc = busca los doctores segun el dia seleccionado, se ejecta en el change de el dia
                    hora = busca las horas segun el dia y el doctor, se ejecuta en el change del doc
                    res = muestra la opcion buscar por rut, se ejecuta en el change de la hora
                    con = se muestra cuando el rut tiene una consulta, se ejejuta con el resultado de AtencionSiCliente.php
                    exi = se muestra cuando el rut existe en la base de datos, se ejejuta con el resultado de AtencionSiCliente.php
                    nue = se muestra cuando el rut no existe en la base de datos, se ejejuta con el resultado de AtencionSiCliente.php
        donde se decide que opcion cargar es en la funcion includeEvents
    * initComplement carga configuraciones al iniciar la pagina
    * includeEvents agrega los eventos por cada carga de la pagina  
    * showCombox muestra u oculta los controles de la pagina segun la opcion 
    * checkRut valida rut    
*/?>
<script>
    $(document).ready(function(){
        searchData("dia");
	});
    function initComplement(){
        $('select[id=dia]').selectpicker();
        $('select[id=hor]').selectpicker();
        $('select[id=doc]').selectpicker();
    }
    function includeEvents(){
        //al cambiar select dia
        $('#dia').on("change",function(){
            $("#rut").val("0-0")
            searchData("doc");
        });
         //al cambiar select doc
        $("#doc").on("change",function(e){
            $("#rut").val("0-0")
            searchData("hor");
        });
         //al cambiar select hora
        $("#hor").on("change",function(e){
            $("#rut").val("0-0")
            searchData("res");
        });
        $('.fono').mask('+(56)-0-00-00-0000');
         //al presionar el boton buscar rut
        $("#buscar-button").on("click",function(e){
            dia = $("#dia").val();
            doc = $("#doc").val();
            hor = $("#hor").val();
            rut = $("#rut").val();
            if(typeof rut == 'undefined' || rut == ""){
                $("#modTitulo").html("Validaci??n");
                $("#modBody").html("Debe ingresar un Rut");
                $("#myModal").removeClass();
                $("#myModal").addClass("modal modal-danger fade");
                $("#myModal").modal();
            }else if(checkRut(rut) == true){
                $.ajax({
                    data:  {
                        "dia" : dia,
                        "doc" : doc,
                        "hor" : hor,
                        "rut" : rut
                    },
                    url:   'web/content/atencionSiCliente.php',
                    type:  'post',
                    success:  function (response) {
                        searchData(response); 
                    },
                    error(xhr,status,error){
                        alert("cago");
                    }
                });
            }
        });
         //al presionar el boton guardar 
        $("#guardar-button").on("click",function(e){ 
			dia = $("#dia").val();
            doc = $("#doc").val();
            hor = $("#hor").val();
            rut = $("#rutS").val();
			nombre = $("#nombre").val();
			direccion = $("#direccion").val();
			fono = $("#fono").val();
			mail = $("#mail").val();
            if(typeof rut == 'undefined' || rut == ""){
                $("#modTitulo").html("Validaci??n");
                $("#modBody").html("Debe ingresar un Rut");
                $("#myModal").removeClass();
                $("#myModal").addClass("modal modal-danger fade");
                $("#myModal").modal();
            }else if(typeof nombre == 'undefined' || nombre == ""){
                $("#modTitulo").html("Validaci??n");
                $("#modBody").html("Debe ingresar el nombre");
                $("#myModal").removeClass();
                $("#myModal").addClass("modal modal-danger fade");
                $("#myModal").modal();
            }else if(typeof direccion == 'undefined' || direccion == ""){
                $("#modTitulo").html("Validaci??n");
                $("#modBody").html("Debe ingresar una direcci??n");
                $("#myModal").removeClass();
                $("#myModal").addClass("modal modal-danger fade");
                $("#myModal").modal();
            }else if(typeof fono == 'undefined' || fono == ""){
                $("#modTitulo").html("Validaci??n");
                $("#modBody").html("Debe ingresar un tel??fono");
                $("#myModal").removeClass();
                $("#myModal").addClass("modal modal-danger fade");
                $("#myModal").modal();
            }else if(typeof mail == 'undefined' || mail == ""){
                $("#modTitulo").html("Validaci??n");
                $("#modBody").html("Debe ingresar un correo electr??nico");
                $("#myModal").removeClass();
                $("#myModal").addClass("modal modal-danger fade");
                $("#myModal").modal();
            }else if(checkRut(rut) == true){
                $.ajax({
                    data:  {
                        "dia" : dia,
                        "doc" : doc,
                        "hor" : hor,
                        "rut" : rut,
						"nombre" : nombre,
						"direccion" : direccion,
						"fono" : fono,
						"mail" : mail
                    },
                    url:   'web/content/atencionGuardaCliente.php',
                    type:  'post',
                    success:  function (response) {
                        searchData(response); 
                    },
                    error(xhr,status,error){
                        alert("cago");
                    }
                });
            }
        });
        $("#confirmar-button").on("click",function(e){ 
			dia = $("#dia").val();
            doc = $("#doc").val();
            hor = $("#hor").val();
            rut = $("#rutS").val();
            if(typeof rut == 'undefined' || rut == ""){
                $("#modTitulo").html("Validaci??n");
                $("#modBody").html("Debe ingresar un Rut");
                $("#myModal").removeClass();
                $("#myModal").addClass("modal modal-danger fade");
                $("#myModal").modal();
            }else if(checkRut(rut) == true){
                $.ajax({
                    data:  {
                        "dia" : dia,
                        "doc" : doc,
                        "hor" : hor,
                        "rut" : rut
                    },
                    url:   'web/content/atencionGuardaCliente.php',
                    type:  'post',
                    success:  function (response) {
						console.log(response);
                        searchData(response); 
                    },
                    error(xhr,status,error){
                        alert("cago");
                    }
                });
            }
        });        
		
		$('#rut').keyup(function (e) {
                var valor = $(this).val();
                var valorFinal = "";
                valor = valor.replace(/-/gi, "");
                var valorMax = valor.length;
                if (valorMax == 1) {
                    valorFinal = "-" + valor.substring(valorMax - 1);
                } else {
                    valorFinal = valor.substr(0, valorMax - 1) + "-" + valor.substring(valorMax - 1);
                }
                $(this).val(valorFinal);
            });
    }
   
    function showCombox(opt,dia,doc,hor){
        if(opt == "dia"){
            $("#docBox").hide();
            $("#horBox").hide();
            $("#busCliBox").hide(); 
            $("#exiCliBox").hide(); 
            $("#nueCliBox").hide(); 
            $("#conCliBox").hide();
        }
        if(opt == "doc"){
            if(dia == ""){
                $("#docBox").hide();
            }else{
                $("#docBox").fadeIn("slow");;
            }   
            $("#horBox").hide();
            $("#busCliBox").hide(); 
            $("#exiCliBox").hide(); 
            $("#nueCliBox").hide(); 
            $("#conCliBox").hide();
        }
        if(opt == "hor"){
            if(doc == "0"){
                $("#horBox").hide();
            }else{
                $("#horBox").fadeIn("slow");
            }  
            $("#docBox").fadeIn("slow");
            $("#busCliBox").hide(); 
            $("#exiCliBox").hide(); 
            $("#nueCliBox").hide(); 
            $("#conCliBox").hide();
        }
        if(opt == "res"){
            $("#docBox").fadeIn("slow");
            $("#horBox").fadeIn("slow");
            if(hor == "0"){
                $("#busCliBox").hide();
            }else{
                $("#busCliBox").fadeIn("slow");
            }  
            $("#exiCliBox").hide(); 
            $("#nueCliBox").hide(); 
            $("#conCliBox").hide();
        }
        if(opt == "exi"){
            $("#docBox").fadeIn("slow");
            $("#horBox").fadeIn("slow");
            if(hor == "0"){
                $("#busCliBox").hide();
            }else{
                $("#busCliBox").fadeIn("slow");
            }  
            $("#exiCliBox").fadeIn("slow"); 
            $("#nueCliBox").hide(); 
            $("#conCliBox").hide();
        }
        if(opt == "nue"){
            $("#docBox").fadeIn("slow");
            $("#horBox").fadeIn("slow");
            if(hor == "0"){
                $("#busCliBox").hide();
            }else{
                $("#busCliBox").fadeIn("slow");
            }  
            $("#exiCliBox").hide(); 
            $("#nueCliBox").fadeIn("slow");
            $("#conCliBox").hide();
        }
        if(opt == "con"){
            $("#docBox").fadeIn("slow");
            $("#horBox").fadeIn("slow");
            if(hor == "0"){
                $("#busCliBox").hide();
            }else{
                $("#busCliBox").fadeIn("slow");
            }  
            $("#exiCliBox").hide(); 
            $("#nueCliBox").hide();
            $("#conCliBox").fadeIn("slow");
        }
    }
    function searchData(opt){
        dia = $("#dia").val();
        doc = $("#doc").val();
        hor = $("#hor").val();
        rut = $("#rut").val();
        $.ajax({
                data:  {
                    "dia" : dia,
                    "doc" : doc,
                    "hor" : hor,
                    "rut" : rut
                },
                url:   'web/content/atencionResult.php',
                type:  'post',
                beforeSend: function () {
                    $("#atencionResult").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                    $("#atencionResult").html(response);
                    initComplement();
                    includeEvents();
                    showCombox(opt,dia,doc,hor);          
                },
                error(xhr,status,error){
                    alert("cago");
                }
        });
    }
    function checkRut(rut) {
        // Despejar Puntos
        var valor = rut.replace('.','');
        // Despejar Gui??n
        valor = valor.replace('-','');
        
        // Aislar Cuerpo y D??gito Verificador
        cuerpo = valor.slice(0,-1);
        dv = valor.slice(-1).toUpperCase();
        
        // Formatear RUN
        $("#rut").val(cuerpo + '-'+ dv);
        
        // Si no cumple con el m??nimo ej. (n.nnn.nnn)
        if(cuerpo.length < 7) { 
            $("#modTitulo").html("Validaci??n");
            $("#modBody").html("Rut incompleto.");
            $("#myModal").removeClass();
            $("#myModal").addClass("modal modal-danger fade");
            $("#myModal").modal();
            return false;
        }
        
        // Calcular D??gito Verificador
        suma = 0;
        multiplo = 2;
        
        // Para cada d??gito del Cuerpo
        for(i=1;i<=cuerpo.length;i++) {
        
            // Obtener su Producto con el M??ltiplo Correspondiente
            index = multiplo * valor.charAt(cuerpo.length - i);
            
            // Sumar al Contador General
            suma = suma + index;
            
            // Consolidar M??ltiplo dentro del rango [2,7]
            if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
    
        }
        
        // Calcular D??gito Verificador en base al M??dulo 11
        dvEsperado = 11 - (suma % 11);
        
        // Casos Especiales (0 y K)
        dv = (dv == 'K')?10:dv;
        dv = (dv == 0)?11:dv;
        
        // Validar que el Cuerpo coincide con su D??gito Verificador
        if(dvEsperado != dv) { 
            $("#modTitulo").html("Validaci??n");
            $("#modBody").html("Rut inv??lido.");
            $("#myModal").removeClass();
            $("#myModal").addClass("modal modal-danger fade");
            $("#myModal").modal();
            return false; 
        }
        
        // Si todo sale bien, eliminar errores (decretar que es v??lido)
        return true;
    }
</script>