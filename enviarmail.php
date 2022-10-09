<?php
include_once 'PHPMailer/PHPMailerAutoload.php';
$inputsdata = file_get_contents("php://input");
$arr = json_decode($inputsdata, true);
$m = new PHPMailer();
$m->IsSMTP();
$m->SMTPDebug = 0;
$m->SMTPAuth = true;
$m->Username = 'soportegescob@gmail.com';
$m->Password = 'sgmyovajshoawkqw';
$m->FromName = $arr['nombre'];
$m->Host = "smtp.gmail.com";
$m->SMTPSecure = "tsl"; //tls o ssl
$m->Port = 587;
$m->AddAddress('jrgonzalez3@gmail.com');
$m->addReplyTo($arr['email']);
$m->Subject = $arr['asunto'];
$m->MsgHTML(nl2br($arr['mensaje']));
if ($m->Send()) {
    $result = 'Tu mensaje ha sido enviado. Gracias, Si deseas una respuesta mas rapida, tambien puedes escribirnos al  <a class="btn btn-transparent" href="https://wa.link/p70m70" target="_blank">WhatsApp Directo</a>';
} else {
    $result = "Error, no se pudo enviar: {$m->ErrorInfo}, como alternativa puede escribirnos al <a class='btn btn-transparent' href='https://wa.link/p70m70' target='_blank'>WhatsApp Directo</a>";
}
echo $result;