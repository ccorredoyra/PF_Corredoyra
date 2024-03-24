<?php
if (isset($_POST['enviar'])){
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $asunto = 'Información sobre Molfetta.';
    $msg  = 'Sr/a. ';
    $msg .= $nombre. "\r\n";
    $msg .= $apellido;
    $msg .= ', enviamos información para que pueda disfrutar este hermoso lugar.';
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $header = "From: noreply@example.com" . "\r\n";
        $header.= "Reply-to: noreply@example.com" . "\r\n";
        $header.= "X-Mailer: PHP/". phpversion();
        $mail = mail($email, $asunto, $msg, $header);
        if ($mail){
            echo "<h4> Mail enviado exitosamente !!!</h4>";
        }
        else {
            echo "<h4> Mail NO pudo ser enviado.</h4>"; 
            echo $nombre. "\r\n";
            echo $apellido. "\r\n";
            echo $email. "\r\n" ;
            echo $asunto. "\r\n";
            echo $msg. "\r\n";
            echo $header. "\r\n";
            var_dump($mail);
            
        }
    }
    else {
        echo "<h4> La dirección del eMail es inválida.</h4>"; 
        echo $nombre. "\r\n";
        echo $apellido. "\r\n";
        echo $email. "\r\n" ;
        echo $asunto. "\r\n";
        echo $msg. "\r\n";
    }
    header("Location: informacion.html");      
}
?>