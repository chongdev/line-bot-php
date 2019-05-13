<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'Cg5ODfaoolXn/2qKtY81USq6NRCtbt/CmjNAAddhYQdeBRw/DMXVrmu8u09fL1ZeVeLkVt4sGtGwA738UW0D/rMyHxDQSYobxf0IcpHgAP8qzpDLZLD0hMl6yI1U0lCFO0mGH93gvBeDEK9dtf38HwdB04t89/1O/w1cDnyilFU=';



// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);

$items = array();

$items[] = array(
	"type"=> "action",
    "action"=> array(
      "type"=> "cameraRoll",
      "label"=> "Camera Roll"
    )
);


/*$items[] = array(
	"type" => "action", // ③
    "imageUrl" => "https://example.com/sushi.png",
    "action" => array(
      "type" => "message",
      "label" => "Sushi",
      "text" => "Sushi"
    )
)

$items[] = array(
	"type"=> "action",
    "imageUrl"=> "https://example.com/tempura.png",
    "action"=> array(
      "type"=> "message",
      "label"=> "Tempura",
      "text"=> "Tempura"
    )
);*/

$items[] = array(
	"type"=> "action", // ④
    "action"=>  array(
      "type"=> "location",
      "label"=> "Send location"
    )
);


// Validate parsed JSON data
$data = array(
	"type" => "text", // ①
	"text" => "Hello Quick Reply!",
	"quickReply" => array( // ②
		"items" => $items,
	)
);

/*{
  "type": "text", // ①
  "text": "Select your favorite food category or send me your location!",
  "quickReply": { // ②
    "items": [
      {
        "type": "action", // ③
        "imageUrl": "https://example.com/sushi.png",
        "action": {
          "type": "message",
          "label": "Sushi",
          "text": "Sushi"
        }
      },
      {
        "type": "action",
        "imageUrl": "https://example.com/tempura.png",
        "action": {
          "type": "message",
          "label": "Tempura",
          "text": "Tempura"
        }
      },
      {
        "type": "action", // ④
        "action": {
          "type": "location",
          "label": "Send location"
        }
      }
    ]
  }
}*/


$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $events);
curl_setopt($ch, CURLOPT_HTTPHEADER, json_encode($data));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result . "\r\n";

echo "Succeeded!";