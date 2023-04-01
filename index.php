<?php

require_once 'config.php';

// check request method
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('{"error": "Invalid request method"}');
}

if (!isset($_POST['key'])) {
    die('{"error": "Missing access key"}');
}

// Validate the access key
if (ACCESS_KEY != $_POST['key']) {
    die('{"error": "Invalid access key"}');
}

// check parameters
if (!isset($_POST['token'])) {
    die('{"error": "Missing token parameter"}');
}

if(!isset($_POST['chat_id'])) {
    die('{"error": "Missing chat id parameter"}');
}

if(!isset($_POST['text'])) {
    die('{"error": "Missing text parameter"}');
}

$token = $_POST['token'];
// Send To Telegram
$url = "https://api.telegram.org/bot{$token}/sendMessage";
$data = array(
    'chat_id' => $_POST['chat_id'],
    'text' => $_POST['text']
);

// make curl
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_exec($ch);
curl_close($ch);
