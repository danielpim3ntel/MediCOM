<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require './PHPMailer/Exception.php';
    require './PHPMailer/SMTP.php';
    require './PHPMailer/PHPMailer.php';
    $mail = new PHPMailer(true);
    $correo = $_POST["correoRecuperar"];
    $respAX = array();
    
    try {
        //Server settings
        //$mail->SMTPDebug  = SMTP::DEBUG_SERVER;             //Send using SMTP
        $mail->isSMTP();                                    //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';               //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                           //Enable SMTP authentication
        $mail->Username   = 'maildelproyectoescolar@gmail.com';         //SMTP username
        $mail->Password   = 'L4C0ntr4s3naM4sD1f1c1lD3lMund0';             //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable implicit TLS encryption
        $mail->Port       = 587;                            //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

        //Recipients
        $mail->setFrom('maildelproyectoescolar@gmail.com', 'Paqueteria SQUID');
        $mail->addAddress($correo);     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Paquetería SQUID - Comprobante de Envío.';
        $mail->Body    = "<h1>Muchas gracias por su preferencia. </h1><br><h3>A continuación podrá consultar un PDF con los detalles de su envió.
        </h3>";

        $mail->send();//Se envia el mail

    } catch (Exception $e) {
        $respAX["codigo"] = 3; //Codigo de estado que se devuevle para determinar el estado del login 1=exito, 0=error
	    $respAX["msj"] = "Error al enviar correo: {$mail->ErrorInfo}";//Mensaje que se desplegara en el alert
    }
    $respAX["codigo"] = 1;
    $respAX["msj"] = "<h3> Se envio el correo de solicitud a tu bandeja de entrada</h3>";
    echo json_encode($respAX);
?>