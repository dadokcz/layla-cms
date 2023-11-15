<?php
header("Content-Type: application/json");

//--- get all the directories
$dirname = './plugins/';
$findme  = "*.zip";
$dirs    = glob($dirname.'*.zip');
$files   = array();

$send = array();
$send2 = array();
// foreach(glob('./archive/'.$_GET['sourcename'].'-*zip') as $dir) {
// 	$files[]  = basename($dir);
// }
// $files = array_reverse($files);
// $files[0] = str_replace($_GET['sourcename'].'-', '', $files[0]);
// echo $files[0] = str_replace('.zip', '', $files[0]);

foreach (array_reverse(glob("./plugins/*/*.zip")) as $filename) {
    // echo "$filename size " . filesize($filename) . "\n";


$zip = zip_open($filename);

if (is_resource($zip))
  {
  while ($zip_entry = zip_read($zip))
    {
    // echo "<p>";

    if (zip_entry_open($zip, $zip_entry) && strpos(zip_entry_name($zip_entry), 'index.php'))
      {
  	$i++;
      $contents = zip_entry_read($zip_entry);
      // echo "$contents<br />";


		$css_read = $contents;
		preg_match('/Plugin name: (.*) /', $css_read, $matches, PREG_OFFSET_CAPTURE, 0);
		preg_match('/Plugin description: (.*) /', $css_read, $matches_desc, PREG_OFFSET_CAPTURE, 0);
		preg_match('/Plugin version: (.*) /', $css_read, $version, PREG_OFFSET_CAPTURE, 0);
		preg_match('/Author: (.*) /', $css_read, $matches2, PREG_OFFSET_CAPTURE, 0);
		preg_match('/Plugin category: (.*) /', $css_read, $matches3, PREG_OFFSET_CAPTURE, 0);
		preg_match('/Plugin price: (.*) /', $css_read, $matches4, PREG_OFFSET_CAPTURE, 0);
		$plugin_name = $matches[1][0];
		$plugin_version = $version[1][0];
		$plugin_description = $matches_desc[1][0];
		$plugin_author = $matches2[1][0];
		$plugin_category = $matches3[1][0];
		$plugin_price = $matches4[1][0];
		$basename = basename($value);
		if($plugin_price>0){$paid = 'true'; $price =$plugin_price;}else{$paid = '';}
		$imgData = base64_encode(file_get_contents('plugins/'.dirname(zip_entry_name($zip_entry)).'/screenshot.png'));

		$send[$i]['paid'] = $paid;
		$send[$i]['price'] = $plugin_price;
		$send[$i]['screenshot'] = $imgData;
		$send[$i]['plugin_file'] = $filename;
		$send[$i]['plugin_dir'] = dirname(zip_entry_name($zip_entry));
		$send[$i]['plugin_name'] = $plugin_name;
		$send[$i]['plugin_version'] = $plugin_version;
		$send[$i]['plugin_description'] = $plugin_description;
		$send[$i]['plugin_author'] = $plugin_author;
		$send[$i]['plugin_category'] = $plugin_category;
		break;

      zip_entry_close($zip_entry);




      }
  }

zip_close($zip);
}

}

/*
			print_r($dirs);
foreach ($dirs as $key => $value) {
										// if(!file_exists($value.'/readme.txt')){continue;}
										$i++;
										$css_read = file_get_contents($value.'/index.php');
										preg_match('/Plugin name: (.*) /', $css_read, $matches, PREG_OFFSET_CAPTURE, 0);
										preg_match('/Plugin description: (.*) /', $css_read, $matches_desc, PREG_OFFSET_CAPTURE, 0);
										preg_match('/Plugin version: (.*) /', $css_read, $version, PREG_OFFSET_CAPTURE, 0);
										preg_match('/Author: (.*) /', $css_read, $matches2, PREG_OFFSET_CAPTURE, 0);
										preg_match('/Plugin category: (.*) /', $css_read, $matches3, PREG_OFFSET_CAPTURE, 0);
										$plugin_name = $matches[1][0];
										$plugin_version = $version[1][0];
										$plugin_description = $matches_desc[1][0];
										$plugin_author = $matches2[1][0];
										$plugin_category = $matches3[1][0];
										$basename = basename($value);

										$send[$i]['plugin_name'] = $plugin_name;
										$send[$i]['plugin_version'] = $plugin_version;
										$send[$i]['plugin_description'] = $plugin_description;
										$send[$i]['plugin_author'] = $plugin_author;
										$send[$i]['plugin_category'] = $plugin_category;

										/*
										
                                                    // if($_GET['doUpdate'] == $basename){
                                                    //echo get_updates($basename, $plugin_version, 0);
                                                    // }  /* if(strtolower($_SERVER['REMOTE_USER']) == 'layla-master' || strtolower($_SERVER['REMOTE_USER']) == 'dadok'){ 
                                                    <a href="?page=plugins&release_plugin=<?=$basename;?>" class="btn btn-xs btn-warning">{{Release version}}</a>


                                                    if($_GET['release_plugin'] == $basename){

                                                        archiveBackup($basename.'-'.$plugin_version.'.zip', '../includes/plugins/'.$basename.'/', '../updates/archive/');
                                                    }

	                                                }}(
	                                                }*/

	                                                 echo json_encode($send);

	                                                ?>