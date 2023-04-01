<?php
require 'functions.php';

// Check is Install file ran before?
if (file_exists('.env')) {
    die("Application installed already!");
}

$default_env_content = file_get_contents('.env.example');

// make an randmon access key
$access_key = generateRandomString(20);

// replace the default environment
$env_content = str_replace('YOUR_ACCESS_KEY', $access_key, $default_env_content);

// make new .env
$f_handler = fopen('.env', 'w');
fwrite($f_handler, $env_content);
fclose($f_handler);
?>

<div style="text-align: center;">
<table border="1">
    <tr>
        <th>Your Access Key</th>
        <td><?=$access_key ?></td>
    </tr>
</table>
</div>
<h5>Keep Access Key safe, it shows only this time!</h5>