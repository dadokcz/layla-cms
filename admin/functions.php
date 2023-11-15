<?php
// error_reporting(-1); // reporting turned ON
// error_reporting(0); // reporting turned OFF
require_once "../functions.php";
require_once "../includes/imageresize.php";

if(!empty($_GET['install_plugin']) && $_GET['ajax'] == 1){
get_updates($_GET['install_plugin'], $_GET['version'], 0, 'forced');                                                  
header('location:index.php?page=plugins');
}


function get_admin_header($title){
	global $addtomenu;
	ob_start();
	
	// LOOP PLUGINS TO HEADER
	$plugins = get_settings('plugins');
	if(is_array(explode(',',$plugins)) || get_settings('plugins') != ''){
	
	if(is_array(explode(',',$plugins))){

		foreach (explode(',', $plugins) as $key => $value) {
			if(file_exists('../includes/plugins/'.$value.'/index.php'))
				
    global $addtosettings;
    global $settings;
			include "../includes/plugins/".$value."/functions.php";
		}
	}
	}

	include "header.php";
	$data = ob_get_contents();
	ob_end_clean();
	// echo '<pre>';
	// print_r($addtomenu);
	// echo '</pre>';
	$data = str_replace('{{title}}', $title, $data);
	$data = str_replace('[menu]', MainMenu($addtomenu), $data);
	// $data = str_replace('}}', '', $data);
	// $data = apply_shortcodes($data);
	return $data;
}

function get_admin_footer(){

	ob_start();
	include "footer.php";
	$data = ob_get_contents();
	ob_end_clean ();

	// $data = str_replace('{{', '', $data);
	// $data = str_replace('}}', '', $data);
	// $data = apply_shortcodes($data);

	return $data;
}

function localize_admin_content($content){

	
	// LOOP PLUGINS TO HEADER
	$plugins = get_settings('plugins');
	if(is_array(explode(',',$plugins)) || get_settings('plugins') != ''){
	
	if(is_array(explode(',',$plugins))){

		foreach (explode(',', $plugins) as $key => $value) {
			if(file_exists('../includes/plugins/'.$value.'/index.php'))
			require_once "../includes/plugins/".$value."/functions.php";
		}
	}
	}

	
	$current_language = ($_GET['language'])?$_GET['language'].'':''.get_settings('default_admin_language');
	// $lines = file('./languages/'.$current_language.'.po');

	$new = array();
	$camp = array();
	$camp_unique = array();
	$next2 = -1;

	//--- get all the directories
	$dirname = '../includes/plugins/';
	$findme  = "*index.php";
	$dirs    = glob($dirname.'*', GLOB_ONLYDIR);
	$files   = array();

	for ($i = 0; $i < count($dirs); $i++) {
		$handle.= file_get_contents($dirs[$i].'/languages/'.$current_language.'.po');
    }

    $sources_plugins = str_getcsv($handle,"\n");

	$sources = array_merge(file('./languages/'.$current_language.'.po'), $sources_plugins);
	
	$lines = array_filter(array_map("trim", $sources), "strlen");

	// if(count($lines) % 2){
	// 	array_unshift($lines, "apple");
	// }

	foreach($lines as $line) {
		if(strpos($line, 'ontent-')){continue;}
		preg_match_all("/\"([^\]]*)\"/", $line, $line);
		if(isset($line[1][0]))$stringslines[]=$line[1][0];
	}

	foreach($lines as $line) {
		if(strpos($line, 'ontent-')){continue;}
		$lines_count++;
		if ($lines_count % 2 == 0) {
			preg_match_all("/\"([^\]]*)\"/", $line, $line);
			if(!empty($line[1][0])){
				$array_string['{{'.$stringslines[$lines_count-2].'}}'] = $line[1][0];
			}
		}

	}
	// print_r($array_string);

	$content = str_replace(array_keys($array_string), array_values($array_string), $content);

	$content = str_replace('{{', '', $content);
	$content = str_replace('}}', '', $content);
	return $content;
}




function get_admin_localization_string($string, $theme, $langcode){
	
	$current_language = ($_GET['language'])?$_GET['language'].'':''.get_settings('default_language');
	
	if(file_exists('./languages/'.$langcode.'.po')){

	$lines = array_filter(array_map("trim", file('./languages/'.$langcode.'.po')), "strlen");

	if(count($lines) % 2){
		array_unshift($lines, "apple");
	}

	foreach($lines as $line) {
		if(strpos($line, 'ontent-')){continue;}
		preg_match_all("/\"([^\]]*)\"/", $line, $line);
		$stringslines[]=$line[1][0];
	}

	foreach($lines as $line) {
		if(strpos($line, 'ontent-')){continue;}
		$lines_count++;
		if ($lines_count % 2 == 0) {
			preg_match_all("/\"([^\]]*)\"/", $line, $line);
			$array_string[$stringslines[$lines_count-2]] = $line[1][0];
		}
	}


	return $array_string[$string];
	}

}


if(!empty($_GET['setlocale'])){

		if($_GET['setlocale'] == 'cs'){
			$lang = 'cz';
		}else{
			$lang = $_GET['setlocale'];
		}
		$fname = "../data/settings.csv";
		$fhandle = fopen($fname,"r");
		$content = fread($fhandle,filesize($fname));
		// echo 'default_language;'.$_POST['default_language_original'].';';
		$content = str_replace('default_admin_language;'.get_settings('default_admin_language').';', 'default_admin_language;'.$lang.';', $content);

		file_put_contents($fname, $content);

		fclose($fhandle);
		unset($content);

}



function send_newsletter($to, $subject, $messagehtml, $attachment = '', $host_url) {

	if(is_array($to)){
		$subs_count = count($to);
		foreach ($to as $key => $value) {
			
			$headers_bcc .= "Bcc: ".$value."".PHP_EOL;

		}
	}

	if(empty($host_url)){$host_url = 'http://'.$_SERVER['HTTP_HOST'];}

	$logo_url = $host_url.'/includes/images/email/logo.png';
	$icon_url = $host_url.'/includes/images/email/icon-welcome.png';
	$bg_image_url = $host_url.'/includes/images/email/email_bg.jpg';
	$footer_text = '© '.date('Y').' '.get_settings('sitename');
	// • Jakoukoli Vaši zpětnou vazbu rádi uvítáme na zakaznici@mumla.cz.';

	$body_html = file_get_contents('../includes/email-template.php');
	
	$body_email = str_replace('%host_url%', $host_url, $body_html);
	$body_email = str_replace('%logo_url%', $logo_url, $body_html);
	$body_email = str_replace('%icon_url%', $icon_url, $body_email);
	$body_email = str_replace('%bg_image_url%', $bg_image_url, $body_email);
	$body_email = str_replace('%footer_text%', $footer_text, $body_email);
	$body_email = str_replace('%BODY_CONTENT%', $messagehtml, $body_email);
	$body_email = str_replace('%sitephone%', get_settings('sitephone'), $body_email);
	$body_email = str_replace('%siteemail%', get_settings('siteemail'), $body_email);

if(empty($attachment)){

	// $headers .= "CC: sombodyelse@noplace.com".PHP_EOL;
	
	$headers = "From: " . strip_tags(''.get_settings('siteemail')). "\r\n";
	$headers .= $headers_bcc;
	// $headers .= "CC: susan@example.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	
	mail(get_settings('siteemail'), $subject, $body_email, $headers);

	}else{

	// Settings
	$email       = $to;
	$to          = $to;
	$from        = "info@".$_SERVER['HTTP_HOST'];
	$subject     = $subject;
	$mainMessage = $messagehtml;
	$fileatt     = $attachment;
	$fileatttype = "application/pdf";
	$fileattname = "newname.pdf";
	$headers = "From: $from";

	// File
	$file = fopen($fileatt, 'rb');
	$data = fread($file, filesize($fileatt));
	fclose($file);


	// This attaches the file
	$semi_rand     = md5(time());
	$mime_boundary = "==Multipart_Boundary_x{$semi_rand}";
	$headers      .= "\nMIME-Version: 1.0\n" .
	"Content-Type: multipart/mixed;\n" .
	" boundary=\"{$mime_boundary}\"";
	$headers .= $headers_bcc;

	$message = "This is a multi-part message in MIME format.\n\n" .
	"--{$mime_boundary}\n" .
	"Content-Type: text/html; charset=\"utf-8\n" .
	"Content-Transfer-Encoding: 7bit\n\n" .
	$body_email  . "\n\n";

	$data = chunk_split(base64_encode($data));
	$message .= "--{$mime_boundary}\n" .
	"Content-Type: {$fileatttype};\n" .
	" name=\"{$fileattname}\"\n" .
	"Content-Disposition: attachment;\n" .
	" filename=\"{$fileattname}\"\n" .
	"Content-Transfer-Encoding: base64\n\n" .
	$data . "\n\n" .
	"-{$mime_boundary}-\n ";

	// Send the email
	mail(get_settings('siteemail'), $subject, $message, $headers);


	}

	add_notifications('{{Newsletter "'.$subject.'" sent to}} '.count($to).' {{subscribers}}. ');

}

function MainMenu($addtomenu){


    // print_r($menus);
	ob_start();

	$menus = array();



	$menus[0]['name'] = '{{Dashboard}}';
	$menus[0]['page'] = 'home';
	$menus[0]['url'] = '?page=home';
	$menus[0]['icon'] = 'dashboard';

	$menus[0][0]['name'] = '{{Notifikace}}';
	$menus[0][0]['page'] = 'home-notifications';
	$menus[0][0]['url'] = '?page=home-notifications';
	$menus[0][0]['icon'] = 'notifications';

	$menus[0][1]['name'] = '{{Traffic}} table';
	$menus[0][1]['page'] = 'home-reports';
	$menus[0][1]['url'] = '?page=home-reports&camp=web';
	$menus[0][1]['icon'] = 'trending_up';

	$menu_count = count($menus);
	$menus[$menu_count]['name'] = '{{Pages}}';
	$menus[$menu_count]['page'] = 'pages';
	$menus[$menu_count]['url'] = '?page=pages&post_type=pages';
	$menus[$menu_count]['icon'] = 'view_column';

	$menu_count = count($menus);
	$menus[$menu_count]['name'] = '{{Posts}}';
	$menus[$menu_count]['page'] = 'posts';
	$menus[$menu_count]['url'] = '?page=posts&post_type=posts';
	$menus[$menu_count]['icon'] = 'view_headline';

	$menu_count = count($menus);
	$menus[$menu_count]['name'] = '{{Media}}';
	$menus[$menu_count]['page'] = 'media';
	$menus[$menu_count]['url'] = '?page=media';
	$menus[$menu_count]['icon'] = 'image';

	$menu_count = count($menus);
	$menus[$menu_count]['name'] = '{{Plugins}}';
	$menus[$menu_count]['page'] = 'plugins';
	$menus[$menu_count]['url'] = '?page=plugins';
	$menus[$menu_count]['icon'] = 'settings_input_svideo';

	$menu_count = count($menus);
	$menus[$menu_count]['name'] = '{{Settings}}';
	$menus[$menu_count]['page'] = 'settings';
	$menus[$menu_count]['url'] = '?page=settings';
	$menus[$menu_count]['icon'] = 'settings';

	$menus[$menu_count][0]['name'] = '{{Updates}}';
	$menus[$menu_count][0]['page'] = 'updates';
	$menus[$menu_count][0]['url'] = '?page=updates';
	$menus[$menu_count][0]['icon'] = 'update';


	$menus[$menu_count][1]['name'] = '{{Users}}';
	$menus[$menu_count][1]['page'] = 'users';
	$menus[$menu_count][1]['url'] = '?page=users';
	$menus[$menu_count][1]['icon'] = 'accessibility';

	$menus[$menu_count][2]['name'] = '{{Languages}}';
	$menus[$menu_count][2]['page'] = 'languages';
	$menus[$menu_count][2]['url'] = '?page=settings-localizations';
	$menus[$menu_count][2]['icon'] = 'language';



  	// $addtomenu = array();


	//ADD PLUGIN MENUS TO MAIN MENU
	if(!empty($addtomenu)){
	// foreach ($addtomenu as $key => $value) {
		// $i++;
		foreach ($addtomenu as $key => $value2) {
			array_push($menus, $value2);
		}
	// }
    }


    $menu_original = $menus; 

	//END ADD PLUGIN MENUS TO MAIN MENU
  
    // SORT IN MENUS
    $menu_sort = get_settings('menu_sort');
    $menu_sort = str_replace('undefined','',$menu_sort);
    $menu_sort = explode(',', $menu_sort);

	$menu_sort = array_filter($menu_sort, "strlen");

    	// $menu_sort = '2-0,6-4';
    if(is_array($menu_sort)){
	    foreach ($menu_sort as $key => $value) {
	    $ex = explode('-', $value);
	    // $menus = change_key($menus, $ex[1], $ex[0]);

	    $menus[$ex[0]]['sort'] = $ex[1];  
		}
	}

	usort($menus, function($a, $b) {
	    return $a['sort'] - $b['sort'];
	});


    $row=-1;
	foreach ($menus as $key => $value) {
		$row++;


    		if(mb_strlen($value['name']) < 2){continue;}
    		$actual_url = str_replace('/admin//admin/index.php', '', '/admin/'.$_SERVER['REQUEST_URI']);
		 ?>
	
		<li class=" <?php if($_GET['page'] == $value['page'] || @$actual_url == $value['url'] || (empty($_GET['page']) && $row == 0) ){echo 'ui-sortable-handle active';}?>" row-id="<?=array_search($value['name'], array_column($menu_original, 'name'));?>">
		    <a class="dropdown-toggle open" href="<?=$value['url'];?>" data-toggle="" aria-expanded="true" >
		        <i class="material-icons"><?=$value['icon'];?></i>
		        <p><?=$value['name'];?></p>
		    </a>


		    <?php if(count($value[0]) > 2){ ?><ul class="dropdown-menu" style=" <?php if($_GET['page'] == $value['page'] || @$actual_url == $value['url'] || (empty($_GET['page']) && $row == 0) ){echo 'display:block;';}?>"><?php } ?>
		    <?php

		    for ($subpages=0; $subpages < 10; $subpages++) { 


		    	if(mb_strlen($value[$subpages]['name']) < 2){continue;}
		    	

		    	?>
		    	   
	                    	<li class=" <?php if($actual_url == $value[$subpages]['url']){echo 'active';}?>"><a href="<?=$value[$subpages]['url'];?>"> <i class="material-icons"><?=$value[$subpages]['icon'];?></i> <p><?=$value[$subpages]['name'];?></p> <span class="active-dot"></span></a></li>

		    	<?php
		    }
		    ?>
		    <?php if(count($value[0]) > 0){ ?></ul><?php } ?>



		</li>
		<?php


		}


		$menu = ob_get_contents();
	    ob_end_clean();
	    return $menu;
}


function change_key( $array, $old_key, $new_key ) {

    if( ! array_key_exists( $old_key, $array ) )
        return $array;

    $keys = array_keys( $array );
    $keys[ array_search( $old_key, $keys ) ] = $new_key;

    return array_combine( $keys, $array );
}

if(isset($_GET['delete_photo'])){
	// unlink('../files/'.$_GET['delete_photo']);

	$post_type_csv = $_GET['post_type'].'.csv';

	$row = 0;
	$pages = array();
	if (($handle = fopen("../data/".$post_type_csv."", "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
	        $num = count($data);
	        $row++;
	        // echo $data;
	        if($row != $_GET['post']){
	        
		        for ($c=0; $c < $num; $c++) {
		            $qq.= $data[$c].";";
		        }
		       $qq.= $data[$c]."\n";
	        
	        }else{

	        	for ($c=0; $c < $num; $c++) {
	        		if($c == 6){
        			$qq.= base64_encode(str_replace($_GET['delete_photo'],"",base64_decode($data[$c]))).";";
		            }else{
		            $qq.= $data[$c].";";
		            }
		        }
		        $qq.= $data[$c]."\n";

	        }

	    }

		file_put_contents("../data/".$post_type_csv."", $qq);

	    fclose($handle);
	}



	die('ok');

}




function get_updates($sourcename = 'layla-cms', $version = CURRENT_VERSION, $minimalistic = 0, $forced = false){

// SETTING FILES PERMISSIONS
chmod_r('../includes');
chmod_r('../updates');
chmod_r('../admin');

if($sourcename == 'layla-cms'){
	$extractTo = '../';
	$UPDATES_DIR = '../updates/';
	$sitever = CURRENT_VERSION;
	$subject = 'archive';
	$subject_1 = 'archive';
}else{
	$extractTo = '../includes/plugins/';	
	$UPDATES_DIR = '../updates/';
	$sitever = $version;
	$subject = 'plugins/*';
	$subject_1 = 'plugins/'.$sourcename;
}

if(strpos($_SERVER['HTTP_HOST'], 'localhost') !== false){
// https://www.laylacms.com
	$updates_url = 'http://'.$_SERVER['HTTP_HOST'];
}else{
	$updates_url = 'https://www.laylacms.com';
}


$resultText.= '<p>{{CURRENT VERSION}}: '.$sitever.'</p>';

if( (isset($_GET['check_updates']) || isset($_GET['doUpdate'])) || $minimalistic == 0){
// echo $updates_url.'/updates/index.php?sourcename='.$sourcename.'&subject='.$subject.'&time='.time();
	$getVersions = file_get_contents($updates_url.'/updates/index.php?sourcename='.$sourcename.'&subject='.$subject.'&time='.time());
}

if ($aV > 1 && (isset($_GET['check_updates']) || isset($_GET['doUpdate']))  || $minimalistic == 0)
{

	$resultText.= '<p>{{Reading Current Releases List}}</p>';
	$versionList = explode("\n", $getVersions);	
	
	// $versionList = array($getVersions);	

	// foreach ($versionList as $aV)
	for ($i=0; $i < count($versionList); $i++) { 
		$aV = $versionList[$i]; 
		if (( $aV > 1 && $aV > $sitever && $aV != $sitever.'.0') || $forced == true) {
			$resultText.= '<p>{{New Update Found}}: v'.$aV.'</p>';
			$found = true;
			// unlink($UPDATES_DIR.'updates/'.$sourcename.'-'.$aV.'.zip' );
			// rrmdir('application');

			//Download The File If We Do Not Have It
			if ( !file_exists(  $UPDATES_DIR.''.$subject_1.'/'.$sourcename.'-'.$aV.'.zip' )) {
				$resultText.= '<p>{{Downloading New Update}}</p>';
				$newUpdate = file_get_contents($updates_url.'/updates/'.$subject_1.'/'.$sourcename.'-'.$aV.'.zip');
				if ( !is_dir( $UPDATES_DIR.'' ) ) mkdir ( $UPDATES_DIR.'' );
				if ( !is_dir( $UPDATES_DIR.'/'.$subject_1.'/' ) ) mkdir ( $UPDATES_DIR.'/'.$subject_1.'/' );

				
				$dlHandler = fopen($UPDATES_DIR.''.$subject_1.'/'.$sourcename.'-'.$aV.'.zip', 'w');
				if ( !fwrite($dlHandler, $newUpdate) ) { $resultText.= '<p>Could not save new update. Operation aborted.</p>';  }
				fclose($dlHandler);
				$resultText.= '<p>{{Update Downloaded And Saved.}}</p>';
			} else $resultText.= '<p>{{Update already downloaded.}}</p>';	
			
			if (isset($_GET['doUpdate'])  || $forced == true) {

				$zipArchive = new ZipArchive();
				$result = $zipArchive->open($UPDATES_DIR.'/'.$subject_1.'/'.$sourcename.'-'.$aV.'.zip');


				if ($result === TRUE) {
			    $zipArchive ->extractTo($extractTo);
			    $zipArchive ->close();
			
				} else {
				    // Do something on error
				    // echo 'error';
				}

				$updated = TRUE;
			}
			else{
				$resultText.= '<p>{{Update ready.}} <a href="?page=updates&doUpdate=true">&raquo; {{Install Now?}}</a></p>'; $update_ready = TRUE;
				if($sourcename != 'layla-cms'){	
				echo ' <a href="?page=plugins&doUpdate='.$basename.'" class="btn btn-xs btn-success"><i class="material-icons">refresh</i> Update to '.$aV.'</a>';
				}
			}
			break;
		}
	}
	
	if (@$updated == true)
	{


		$email_template  = '{{Sucessfully updated to version}} '.$aV.'.';
	    $email_template = str_replace('#firstname#', $_POST['shipping-first-name'], $email_template);
	    $email_template = str_replace('#lastname#', $_POST['shipping-last-name'], $email_template);
	    $email_template = str_replace('#orderlink#', 'http://'.$_SERVER['HTTP_HOST'].'/' .$slug, $email_template);
	    $email_template = str_replace('#orderdetails#', $orderdetails_cart, $email_template);

		add_notifications($sourcename.' {{updated to version}} '.$aV, '/admin/index.php?page=updates', 0);

		send_email(get_settings('siteemail'), '{{Updated to version}} '.$aV, $email_template, '', '');

		// set_setting('site','CMS',$aV);
		$resultText.= '<p class="success">&raquo; Updated to v '.$aV.'</p>';
		// echo "<script>window.location.href = '?page=updates';</script>";
	}
	else if ($found != true) $resultText.= '<p>&raquo; {{Your version is up to date.}}</p>';

	
}


if($minimalistic == 1){
	if($update_ready == TRUE && $aV > 0){
		echo '<a href="?page=plugins&&update_plugin='.$sourcename.'&plugin_name='.$sourcename.'&doUpdate=1" class="btn btn-xs btn-warning">{{Update to}} '.$aV.'</a>';
	}elseif($updated == true && $aV > 0){
		echo '<span class="btn btn-xs btn-success"><i class="material-icons">check</i></span>';
	}else{
		// echo '<span class="btn btn-xs btn-warning"><i class="material-icons">check</i></span>';
	}
}else{
	if($sourcename == 'layla-cms'){		
	echo $resultText;
	}
}

}

function rrmdir($dir) {
  if (is_dir($dir)) {
    $objects = scandir($dir);
    foreach ($objects as $object) {
      if ($object != "." && $object != "..") {
        if (filetype($dir."/".$object) == "dir") 
           rrmdir($dir."/".$object); 
        else unlink   ($dir."/".$object);
      }
    }
    reset($objects);
    rmdir($dir);
  }
 } 

 function chmod_r($Path) {
   $dp = opendir($Path);
   while($File = readdir($dp)) {
      if($File != "." AND $File != "..") {
         if(is_dir($File)){
            chmod($File, 0777);
         }else{
             chmod($Path."/".$File, 0777);
             if(is_dir($Path."/".$File)) {
                chmod_r($Path."/".$File);
             }
         }
      }
   }
   closedir($dp);
}


if(!function_exists('archiveBackup')){
function archiveBackup($name = '', $source = '', $destination = '') {


	$rootPath = realpath($source);

	// Initialize archive object
	$zip = new ZipArchive();
	$zip->open($destination.''.$name, ZipArchive::CREATE | ZipArchive::OVERWRITE);

	// Create recursive directory iterator
	/** @var SplFileInfo[] $files */
	$files = new RecursiveIteratorIterator(
	    new RecursiveDirectoryIterator($rootPath),
	    RecursiveIteratorIterator::LEAVES_ONLY
	);

	$exclude = array('/_LAYOUTS', '/_MATERIALY', 'composer', '/data', '/download', '/files', '/login', '/updates', '/sftp-config.json', '/admin/.htaccess', '/admin/.htpasswd', '/admin/.DS_Store');

	foreach ($files as $name => $file)
	{	

		if (
			strpos($source, 'includes/plugins') || (
			!in_array(str_replace($_SERVER['DOCUMENT_ROOT'], '', $name), $exclude) &&
			!strpos(str_replace($_SERVER['DOCUMENT_ROOT'], '', $name), 'htaccess') > 0 &&
			!strpos(str_replace($_SERVER['DOCUMENT_ROOT'], '', $name), 'plugins/') > 0 &&
			!strpos(str_replace($_SERVER['DOCUMENT_ROOT'], '', $name), 'data/') > 0 &&
			!strpos(str_replace($_SERVER['DOCUMENT_ROOT'], '', $name), 'files/') > 0 &&
			!strpos(str_replace($_SERVER['DOCUMENT_ROOT'], '', $name), 'updates/') > 0 &&
			!strpos(str_replace($_SERVER['DOCUMENT_ROOT'], '', $name), 'templates/') > 0
			)
		){

			// echo str_replace($_SERVER['DOCUMENT_ROOT'], '', $name).'<br/>';

	    // Skip directories (they would be added automatically)
	    if (!$file->isDir())
	    {
	        // Get real and relative path for current file
	        $filePath = $file->getRealPath();
	        $relativePath = substr($filePath, strlen($rootPath) + 1);

	        // Add current file to archive
	        $zip->addFile($filePath, $relativePath);
	    }

	    }
	}

	// Zip archive will be created only after closing object
	$zip->close();

	echo '{{OK}}';
}}




