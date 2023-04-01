<?php 

if (!file_exists('.env')) {
    die("Your environment is not configured properly!, Follow install instructions");
}

$env = parse_ini_file('.env');

define('ACCESS_KEY', $env["ACCESS_KEY"] ?? '');
