<!DOCTYPE html>
<html>
<head>
</head>

<body>
<?php

$url = 'https://api.parse.com/1/files/store.json';

$appId = 'EFq6N0jK41xfrBvicaWbWJVpn43XMA96krvIRWVa';
$restKey = '2PJDd2O5YEIiRH5ydvr2hiV3saIrOgKRtmXLPqVA';
$clientKey = 'TMtuPRriFD51FScRkac7Ar5zahQQ5lE2QrFX6NkE';

$url = 'https://api.parse.com/1/classes/Test';
$fields_string = file_get_contents('/var/www/html/liakada/tipsy/lcbov1/store.json');
//echo $fields_string;

//open connection
$ch = curl_init();

//set the url, POST data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($rest,CURLOPT_HTTPHEADER,
        array("X-Parse-Application-Id: " . $appId,
                "X-Parse-REST-API-Key: " . $restKey,
                "X-Parse-Client-Key: " . $clientKey,
                "Content-Type: application/json"));
//execute post
$result = curl_exec($ch);
echo $result;

//close connection
curl_close($ch);

/*
$rest = curl_init();
curl_setopt($rest,CURLOPT_URL,$url);
//curl_setopt($rest,CURLOPT_PORT,443);
//curl_setopt($rest,CURLOPT_POST,1);
//curl_setopt($rest,CURLOPT_POSTFIELDS,$push_payload);

curl_setopt($rest,CURLOPT_HTTPHEADER,
        array("X-Parse-Application-Id: " . $appId,
                "X-Parse-REST-API-Key: " . $restKey,
                "Content-Type: application/json"));

$response = curl_exec($rest);
echo $response;
*/
?>


