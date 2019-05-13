<?php



require "vendor/autoload.php";

$access_token = 'Cg5ODfaoolXn/2qKtY81USq6NRCtbt/CmjNAAddhYQdeBRw/DMXVrmu8u09fL1ZeVeLkVt4sGtGwA738UW0D/rMyHxDQSYobxf0IcpHgAP8qzpDLZLD0hMl6yI1U0lCFO0mGH93gvBeDEK9dtf38HwdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'f436a2bbf4723459c3400b1fc30b2a9a';

$pushID = 'U13d72a202b537a08c4db39fdce4db90f';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







