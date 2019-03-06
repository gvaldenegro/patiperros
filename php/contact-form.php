<?php
if(isset($_POST["action"])) {
  $name = $_POST['name'];                 // Sender's name
  $email = $_POST['email'];     // Sender's email address
  $phone  = $_POST['phone'];     // Sender's email address
  $message = $_POST['message'];    // Sender's message
  $from = 'contacto@patiperrosurbanfood.cl';    
  $to = 'patiperros8903@gmail.com';     // Recipient's email address
  $subject = 'Contacto desde el sitio web ';

 $body = " De: $name \n E-Mail: $email \n Telefono : $phone \n Mensaje : $message"  ;
	
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
			$result='<div class="alert alert-success">Gracias por contactarnos. Su mensaje ha sido enviado con éxito. Nos pondremos en contacto con usted muy pronto!</div>'; 
		} 
		else {
		  $result='<div class="alert alert-danger">Lo siento, hubo un error al enviar tu mensaje. Por favor, inténtelo de nuevo más tarde.</div>';
		}
	}
	else{
		$result='<div class="alert alert-danger">'.$errmsg.'</div>';
	}
	echo $result;
 }
?>
