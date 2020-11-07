<?php

$mail_host = "info@oblicuo.mx";
$mail_title = "Nuevo mensaje de mi sitio web | Oblicuo";

define("MAIL_HOST", $mail_host);
define("MAIL_TITLE", $mail_title);

$name = "nombre";
$email_from = "email";
$message = "mensaje";
$phone = "celular";
$mail_body = "";

if (isset($_POST['nombre'])) {
    $name = $_POST['nombre'];
    $mail_body = "Nombre: " . $name ;
}


if (isset($_POST['email'])) {
    $email_from = $_POST['email'];
    $mail_body .= "\nEmail: " . $email_from ;
}

if (isset($_POST['celular'])) {
    $phone = $_POST['celular'];
    $mail_body .= "\nTelefono: " . $phone ;
}

if (isset($_POST['mensaje'])) {
    $message = nl2br($_POST['mensaje']);
    $mail_body .= "\nMensaje: " . $message  ;
}


if( isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['mensaje']) ){
    $headers = "De parte de: " . $email_from  ;
    if( mail($mail_host, $mail_title, $mail_body, $headers) ) {
        $serialized_data = '{"type":1, "message":"¡Mensaje enviado con éxito!, en breve nos pondremos en contacto."}';
        echo $serialized_data;
    } else {
        $serialized_data = '{"type":0, "message":"Error en el envío de mensaje, favor de intentar más tarde."}';
        echo $serialized_data;
    }
};

?>