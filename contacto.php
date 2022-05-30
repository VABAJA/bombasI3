<?php
/* if ($_POST['g-recaptcha-response'] == '') {
  echo "Captcha invalido";
} else {
  $obj = new stdClass();
  $obj->secret = "6LcUSrUeAAAAAHQslbfWl5HFKQZJMD8DfMKkfycn";
  $obj->response = $_POST['g-recaptcha-response'];
  $obj->remoteip = $_SERVER['REMOTE_ADDR'];
  $url = 'https://www.google.com/recaptcha/api/siteverify';

  $options = array(
    'http' => array(
      'header' => "Content-type: application/x-www-form-urlencoded\r\n",
      'method' => 'POST',
      'content' => http_build_query($obj)
    )
  );
  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);

  $validar = json_decode($result); */

  /* FIN DE CAPTCHA */

  /* if ($validar->success) { */


    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $header = 'From: ' . $mail . " \r\n";
    $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    $header .= "Mime-Version: 1.0 \r\n";
    $header .= "Content-Type: text/plain";

    $message = "Este mensaje fue enviado por: " . $name . " \r\n";
    $message .= "Su e-mail es: " . $mail . " \r\n";
    $message .= "Su ciudad es: " . $city . " \r\n";
    $message .= "Teléfono de contacto: " . $phone . " \r\n";
    $message .= "Mensaje: " . $_POST['message'] . " \r\n";
    $message .= "Enviado el: " . date('d/m/Y', time());

    $para = 'ljasso@bi3.com.mx';
    $asunto = 'Mensaje de Formulario Web';

    mail($para, $asunto, utf8_decode($message), $header);
    header("Location:./html/confirmacion.html");
  /* } else {
    echo "Captcha invalido";
  }
} */
?>