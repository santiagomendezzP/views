<?php
include_once ("../../vendor/autoload.php");
use PHPMailer\PHPMailer\PHPMailer;
class Mail 
{
    public function enviar_correo_adjunto($para, $titulo, $mensaje, $path){
        $mail = new PHPMailer();
        $mail->Subject = $titulo;
        $mail->IsHTML(true);
        $mail->Body = $mensaje;
        $mail->Mailer = "smtp";
        $mail->CharSet = 'UTF-8';
        $mail->Host = "smtp.office365.com";
        $mail->SMTPAuth = true;
        $mail->Username = "notificacion_intranet@deltaasalud.com";
        $mail->Password = "pvpryrwgjrcmjhky";
        $mail->From = "notificacion_intranet@deltaasalud.com";
        $mail->FromName = "prueba";
        $mail->Timeout=10;
        for($i=0;$i<count($para);$i++){

            $mail->AddAddress($para[$i],"$i");
        }
        $mail->AddAttachment($path);
        $mail->Send();
    }
    public function send_mail_pswd($para, $titulo, $nombre_persona, $contraseña){
        $mensaje   = '
        <html>
        <head>
        </head>
        <body>
        <p>Cordial saludo, </p>
        <p>'.$nombre_persona.' su contraseña ya fue cambiada, relacionamos a continuación la contraseña temporal con la que se le permite tener acceso a Intranet: <br><br>
        Contraseña temporal: <strong>' .$contraseña. '</strong></p>
        <p>Una vez ingrese a Intranet debera cambiar la contraseña temporal que se le asigno por una nueva, recuerde que esta información es de uso personal e intransferible</p>
        <p>Cordialmente, <br><br>
        <strong>Delta A Salud.</strong></p>
        </body>
        </html>';
      
            $mail = new PHPMailer();
            $mail->Subject = "$titulo";
            $mail->IsHTML(true);
            $mail->Body = $mensaje;
            $mail->Mailer = "smtp";
            $mail->CharSet = 'UTF-8';
            $mail->Host = "smtp.office365.com";
            $mail->SMTPAuth = true;
            $mail->Username = "notificacion_intranet@deltaasalud.com";
            $mail->Password = "pvpryrwgjrcmjhky";
            $mail->From = "notificacion_intranet@deltaasalud.com";
            $mail->FromName = "prueba";
            $mail->Timeout=10;
            // for($i=0;$i<count($para);$i++){
      
            //     $mail->AddAddress($para[$i],"$i");
            // }
        $mail->AddAddress($para);
      
            $mail->Send();
    }
}
