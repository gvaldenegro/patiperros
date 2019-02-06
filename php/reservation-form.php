<?php
if(isset($_POST["action"])) {
  $name = $_POST['name'];                 // Sender's name
  $email = $_POST['email'];     // Sender's email address
  $phone  = $_POST['phone'];     // Sender's email address
  $date = $_POST['date'];
  $time = $_POST['time'];
  $persons = $_POST['persons'];
  $message = $_POST['message'];    // Sender's message
  $from = 'reservas@patiperrosurbanfood.cl';    
  $to = 'reservas@patiperrosurbanfood.cl';     // Recipient's email address
  $subject = 'Reserva desde el sitio web ';

 $body = " De: $name \n E-Mail: $email \n Telefono: $phone \n Fecha: $date \n Hora: $time \n Personas: $persons \n Mensaje: $message"  ;
	
	// init error message 
	$errmsg='';
  // Check if name has been entered
  if (!$_POST['name']) {
   $errmsg = 'Por favor ingrese su nombre';
  }

  
  // Check if email has been entered and is valid
  if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
   $errmsg = 'Por favor ingrese un correo electrónico valido';
  }
  
  //Check if message has been entered
  if (!$_POST['message']) {
   $errmsg = 'Por favor ingrese su mensaje';
  }
 
	$result='';
  // If there are no errors, send the email
  if (!$errmsg) {
		if (mail ($to, $subject, $body, $from)) {
			$result='<div class="alert alert-success">Gracias por contactarnos. Su reserva ha sido enviada con éxito. Nos pondremos en contacto con usted muy pronto!</div>'; 
		} 
		else {
		  $result='<div class="alert alert-danger">Lo siento, hubo un error al enviar tu reserva. Por favor, inténtelo de nuevo más tarde.</div>';
		}
	}
	else{
		$result='<div class="alert alert-danger">'.$errmsg.'</div>';
	}
	echo $result;
 }
?>
