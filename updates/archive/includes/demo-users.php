<?php
header('Access-Control-Allow-Origin: *');
if($_GET['type'] == 'demorun'){

$file = '../data/demo-users.csv';
if(!file_exists($file)){$fh = fopen($file, 'w');}
// Open the file to get existing content
// Append a new person to the file

$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("https://freegeoip.app/json/{$ip}"));

$current .= date("Y-m-d").";".$_GET['name'].";".$_GET['email'].";".$_GET['phone'].";".$_GET['url'].";".$ip.";".$details->city.";".$details->country_code.";".$details->zip_code.";\n";

// Write the contents back to the file
file_put_contents($file, $current, FILE_APPEND | LOCK_EX);
echo 'ok';
}