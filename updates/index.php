<?php
// echo './'.$_GET['subject'].'/'.$_GET['sourcename'].'-*zip';

// foreach(glob('./'.$_GET['subject'].'/'.$_GET['sourcename'].'-*zip') as $dir) {
if(empty($_GET['subject'])){
	$subject = 'archive';
	$sourcename = $_GET['sourcename'];
}else{
	$subject = 'plugins';	
	$sourcename = $_GET['sourcename'].'/';
}

foreach(glob('./'.$subject.'/'.$sourcename.'*zip') as $dir) {
	$files[]  = basename($dir);
}
if(is_array($files)){
$files = array_reverse($files);
$files[0] = str_replace($_GET['sourcename'].'-', '', $files[0]);
echo $files[0] = str_replace('.zip', '', $files[0]);
}else{
	return false;
}