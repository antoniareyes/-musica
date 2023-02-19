<?php
// multiple recipients
$to  = 'ant.reyes@duocuc.cl';
$from = 'ant.reyes@duocuc.cl';
$subject = "Mensaje desde sitio web +Música";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

if($email == '' or $message == '' or $name == ''){
  echo "Uno de los campos requeridos falta, por favor vuelve a ingresar los datos.";
  exit;
}

// message
$message = "
<html>
<head>
  <title>Formulario de contacto de +Música</title>
</head>
<body>
  <p><i>$subject</i></p>
  <p>{$message}</p>
  <ul style='list-style:none; margin:20px; color:#666'>
    <li><span style='color:#999'>-Name:</span>$name</li>
    <li><span style='color:#999'>-email:</span>$email</li>
    <li><span style='color:#999'>-email:</span>$phone</li>
  </ul>
</body>
</html>
";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "Reply-to: {$email}". "\r\n";

// Additional headers
//$headers .= "To: <{$to}>" . "\r\n";
$headers .= "From: $name({$subject}) <$from>" . "\r\n";
$headers .= "Cc: {$to}". "\r\n";
$headers .= "Bcc: {$to}" . "\r\n";
// Mail it
$mail_sent = @mail($to, $subject, $message, $headers);

if($mail_sent){
  echo "<span class='notice'>El mensaje ha sido correctamente enviado, pronto nos contactaremos contigo.</span>";
  exit;
}else{
  echo "<span class='error'>El mensaje no ha sido enviado, por favor intentalo de nuevo.</span>";
  exit;
}

?>
