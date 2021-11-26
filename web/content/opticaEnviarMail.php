<?php
header('Content-Type: text/html; charset=utf-8');
//Librerías para el envío de mail
$dt = parse_ini_file("../../data.ini");
include_once('../../comun/class.smtp.php');
include_once('../../comun/class.phpmailer.php');
require_once('../../sistemaWS/config/vars.php');
$config = new Vars($dt);
//Recibir todos los parámetros del formulario
//telefono - nombre - email - comments

$telefono = trim($_POST['telefono']);
if (!ISSET($_POST["telefono"])) {
    $telefono = "";
}

$nombre = trim($_POST['nombre']);
if (!ISSET($_POST["nombre"])) {
    $nombre = "";
}
$email = trim($_POST['email']);
if (!ISSET($_POST["email"])) {
    $email = "";
}
$comments = trim($_POST['comments']);
if (!ISSET($_POST["comments"])) {
    $comments = "";
}

$asunto = "Contacto a ".$config->fromName;
$body = ' 
<html> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body> 
<p> 
El cliente <b>'.$nombre.' </b> '.(($telefono == "") ? "" : "con el número de teléfono <b>".$telefono."</b>" ).' y Correo electrónico <b>'.$email.'</b> nos consulta lo siguiente: <br>  
</p> 
<p> 
'.$comments.'
</p> 
</body> 
</html> 
'; 
//$archivo = $_FILES['hugo'];

//Este bloque es importante
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = $config->smtpAuth;
$mail->SMTPSecure = $config->smtpSecure;
$mail->Host = $config->hostMail;
$mail->Port = $config->puertoMail;

//Nuestra cuenta
$mail->Username =$config->cuenta;
$mail->Password = $config->pass;

//Agregar destinatario
$mail->From = $config->from;	
$mail->FromName = $config->fromName;
$mail->AddAddress($config->mailAdmin1,$config->mailAdminName1);
$mail->Subject = $asunto;
$mail->Body = $body;
//Para adjuntar archivo
//$mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
//$mail->MsgHTML($body);
$mail->IsHTML(true);
 
// Activo condificacción utf-8
$mail->CharSet = 'UTF-8';
//Avisar si fue enviado o no y dirigir al index
if($mail->Send())
{
    $mail->ClearAllRecipients();
    $body = ' 
        <html> 
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        </head>
        <body> 
        <p> 
        Estimad@ <b>'.$nombre.' </b>, su consulta/comentario fue enviado con éxito. Nuestro equipo trabajará en una respuesta para usted.
        </p> 
        <p> '.$dt["gen.title"].'</p> 
        </body> 
        </html> 
        '; 
    $mail->AddAddress($email,"Cliente");
    $mail->Body = $body;
    if($mail->Send()){
        echo trim("ready");
    }else{
        echo $mail->ErrorInfo;
    }
}
else{
	echo $mail->ErrorInfo;
}
?>

