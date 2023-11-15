<?php
$campaign = 'web';

if(isset($_GET['ip'])){
$ip = $_GET['ip'];
}else{
$ip = $_SERVER['REMOTE_ADDR'];	
}


if($fileget = @file_get_contents("https://freegeoip.app/json/{$ip}")){
$details = json_decode($fileget);
}else{
$details = json_decode('');
}

if($_GET['type'] == 'click'){


$file = '../data/reports/daily/'.$campaign.'-'.date("Y-m-d").'-clickReport.txt';
if(!file_exists($file)){$fh = fopen($file, 'w+');}

// Open the file to get existing content
// Append a new person to the file


$current .= date("Y-m-d").";".date("Y-m-d H:i:s").";".$ip.";".$_GET['time'].";".$_GET['percent']."%;".$details->country_code.";".$details->city.";".$details->latitude." ".$details->longitude.";".$details->zip_code.";\n";

// Write the contents back to the file

file_put_contents($file, $current, FILE_APPEND | LOCK_EX);

}elseif($_GET['type'] == 'view'){

$file = '../data/reports/daily/'.$campaign.'-'.date("Y-m-d").'-viewReport.txt';
if(!file_exists($file)){$fh = fopen($file, 'w+');}
// Open the file to get existing content
// Append a new person to the file

$current .= date("Y-m-d").";".date("Y-m-d H:i:s").";".$ip.";".$details->city.";".$details->country_code.";".$details->zip_code.";\n";

// Write the contents back to the file
file_put_contents($file, $current, FILE_APPEND | LOCK_EX);

}