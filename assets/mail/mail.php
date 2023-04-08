<?php
parse_str($_POST['form_data'], $form);

define('TO_EMAIL', 'info@isosgroup.pe');
define('SUBJECT', 'Consulta Isos Web');
define('FROM_EMAIL', $form['con_email']);

$MESSAGE = 'Hola Admin, <br/><br/>';
$MESSAGE .= 'Tienes una consulta de usuario de Isos Web. Los detalles del usuario y el mensaje se indican a continuación: <br/><br/>';
$MESSAGE .= 'Nombres y Apellidos : '.$form['con_name'].'<br/>';
$MESSAGE .= 'Email : '.$form['con_email'].'<br/>';
if(isset($form['con_subject']) && $form['con_subject'] != ''):
    $MESSAGE .= 'Categoría : '.$form['con_subject'].'<br/>';
endif;
if(isset($form['con_location']) && $form['con_location'] != ''):
    $MESSAGE .= 'Ubicación : '.$form['con_location'].'<br/>';
endif;
if(isset($form['subscribe']) && !empty($form['subscribe'])):
    $MESSAGE .= 'De acuerdo : Sí<br/>';
endif;
$MESSAGE .= 'Mensaje : <br/>'.$form['con_message'].'<br/><br/>';
$MESSAGE .= 'Saludos';

$HEADERS = "MIME-Version: 1.0" . "\r\n";
$HEADERS .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$HEADERS .= 'From: <'.FROM_EMAIL.'>' . "\r\n";

mail(TO_EMAIL, SUBJECT, $MESSAGE, $HEADERS);
echo 1;
exit();