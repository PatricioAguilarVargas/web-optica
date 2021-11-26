<?php $page="historia"; ?>
<?php include_once("main.php");?>

<script>
    $(document).ready(function(){
       $("#enviar").on("click",function(){
           //telefono - nombre - email - comments 
            v4 = ValidaCampo("comments");
            v3 = ValidaCampo("email");
            v2 = ValidaCampo("nombre");
            v1 = ValidaCampo("telefono");
            if(v1===true && v2===true && v3===true && v4===true){
                EnviarMail();
            }
        });
    });

    function ValidaCampo(campo){
        //telefono - nombre - email - comments
        valor = document.getElementById(campo).value
        if (campo === 'telefono') {
            if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
                $("#modTitulo").html("Validación");
                $("#modBody").html("Debe ingresar un telefono");
                $("#myModal").removeClass();
                $("#myModal").addClass("modal modal-danger fade");
                $("#myModal").modal();
                return false;
            }else{
                if (isNaN(valor)) {
                    $("#modTitulo").html("Validación");
                    $("#modBody").html("El número de teléfono debe ser solo números");
                    $("#myModal").removeClass();
                    $("#myModal").addClass("modal modal-danger fade");
                    $("#myModal").modal();
                    return false;
                }else{
                    return true;
                }
            }
        }else if (campo === 'nombre') {
            if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
                $("#modTitulo").html("Validación");
                $("#modBody").html("Debe ingresar un nombre");
                $("#myModal").removeClass();
                $("#myModal").addClass("modal modal-danger fade");
                $("#myModal").modal();
                return false;
            }else{
                return true;
            }
        }else if (campo === 'email') {
            if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
                $("#modTitulo").html("Validación");
                $("#modBody").html("Debe ingresar un email");
                $("#myModal").removeClass();
                $("#myModal").addClass("modal modal-danger fade");
                $("#myModal").modal();
                return false;
            }else{
                if(!ValidarMail(valor)){
                    $("#modTitulo").html("Validación");
                    $("#modBody").html("El correo electrónico no es válido.");
                    $("#myModal").removeClass();
                    $("#myModal").addClass("modal modal-danger fade");
                    $("#myModal").modal();
                    return false;
                }else{
                    return true;
                }
                
            }
        }else if (campo === 'comments') {
            if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
                $("#modTitulo").html("Validación");
                $("#modBody").html("Debe ingresar un comentario");
                $("#myModal").removeClass();
                $("#myModal").addClass("modal modal-danger fade");
                $("#myModal").modal();
                return false;
            }else{
                return true;
            }
        }
    }
    function EnviarMail(){
        //telefono - nombre - email - comments
        $.ajax({
                data:  {
                    "telefono": $("#telefono").val(),
                    "nombre": $("#nombre").val(),
                    "email" : $("#email").val(),
                    "comments" : $("#comments").val()
                },
                url:   'web/content/opticaEnviarMail.php',
                type:  'post',
                beforeSend: function () {
                    
                },
                success:  function (response) {
                    if(response.trim() == "ready"){
                        $("#modTitulo").html("Validación");
                        $("#modBody").html("Su comentario ha sido enviado con éxito.");
                        $("#myModal").removeClass();
                        $("#myModal").addClass("modal modal-success fade");
                        $("#myModal").modal();
                    }else{
                        $("#modTitulo").html("Validación");
                        $("#modBody").html("Ha ocurrio un problema en el envío del correo. " + response);
                        $("#myModal").removeClass();
                        $("#myModal").addClass("modal modal-danger fade");
                        $("#myModal").modal();
                    }
                    
                }
            });
    }
    function ValidarMail(email){
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
</script>
