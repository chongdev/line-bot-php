<?php
$access_token = 'Cg5ODfaoolXn/2qKtY81USq6NRCtbt/CmjNAAddhYQdeBRw/DMXVrmu8u09fL1ZeVeLkVt4sGtGwA738UW0D/rMyHxDQSYobxf0IcpHgAP8qzpDLZLD0hMl6yI1U0lCFO0mGH93gvBeDEK9dtf38HwdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;