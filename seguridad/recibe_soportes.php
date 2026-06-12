<?php
$soporte = $_FILES["file"]["type"];
if(isset($soporte)){
    echo $soporte;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //solo ingreso a este bloque de código si el método con el que solicita la página es POST
  
        $origenNombre = 'Notificaciones Delta a Salud'; //nombre que visualiza el receptor del email como "origen" del email (es quien envía el email)
        $origenEmail = 'notificacion_intranet@deltaasalud.com';//email que visualiza el receptor del email como "origen" del email (es quien envía el email)
        $destinatarioEmail = 'alejandro.moreno@deltaasalud.com,hernan.jimenez@deltaasalud.com,wilzon.rodriguez@deltaasalud.com'; //destinatario del email, o sea, a quien le estamos enviando el email
        $archivoNombre = $_FILES['file']['name']; //nombre del archivo a ser enviado (sin la ruta, solo el nombre con la extensión, por ejemplo: imagen.jpg)
        $archivo = $_FILES['file']['tmp_name']; //ruta temporal del archivo a ser adjuntado (ubicación fisica del archivo subido en el servidor)
        $archivo = file_get_contents($archivo); //leeo del origen temporal el archivo y lo guardo como un string en la misma variable (piso la variable $archivo que antes contenía la ruta con el string del archivo)
        $archivo = chunk_split(base64_encode($archivo)); //codifico el string leido del archivo en base64 y la fragmento segun RFC 2045
        $uid = md5(uniqid(time())); //frabrico un ID único que usaré para el "boundary"
        
        $asuntoEmail = 'SOPORTE ARL INGRESO'; //asunto del email
        
        //cuerpo del email:
        $cuerpoMensaje   = 'Cordial saludo,' ."\r\n\r\n". 'Adjunto certificado de afiliación de ARL, con el fin de  aprobar el ingreso para contratación.' ."\r\n\r\n". 'Gracias por su atención.';
        //fin cuerpo del email.
        
        //cabecera del email (forma correcta de codificarla)
        $header = "From: " . $origenNombre . " <" . $origenEmail . ">\r\n";
        $header .= "Reply-To: " . $origenEmail . "\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"\r\n\r\n";
        //armado del mensaje y attachment
        $mensaje = "--" . $uid . "\r\n";
        $mensaje .= "Content-type:text/plain; charset=utf-8\r\n";
        $mensaje .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $mensaje .= $cuerpoMensaje . "\r\n\r\n";
        $mensaje .= "--" . $uid . "\r\n";
        $mensaje .= "Content-Type: application/octet-stream; name=\"" . $archivoNombre . "\"\r\n";
        $mensaje .= "Content-Transfer-Encoding: base64\r\n";
        $mensaje .= "Content-Disposition: attachment; filename=\"" . $archivoNombre . "\"\r\n\r\n";
        $mensaje .= $archivo . "\r\n\r\n";
        $mensaje .= "--" . $uid . "--";
        
        //envio el email y verifico la respuesta de la función "email" (true o false)
        mail($destinatarioEmail, $asuntoEmail, $mensaje, $header);
    }
}
?>