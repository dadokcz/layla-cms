<?php

if($_SERVER['REMOTE_ADDR'] == '109.81.215.15'){
error_reporting(0); // reporting turned OFF
// error_reporting(-1); // reporting turned ON
}else{
error_reporting(0); // reporting turned OFF
}

session_start();

define('CURRENT_VERSION', '1.4.1');

if(strpos($_SERVER['REQUEST_URI'], 'admin')){
	define('ROOT_ABSOLUTE_PATH', '../');
}else{
	define('ROOT_ABSOLUTE_PATH', './');	
}


make_admins_htaccess();
if(isset($_GET['login'])){
include('includes/login/index.php');
die();
}

function make_admins_htaccess(){

	if(strpos($_SERVER['HTTP_HOST'], 'localhost') !== false){
		define('DOCUMENT_ROOT_ADMIN_PATH', $_SERVER["DOCUMENT_ROOT"].'/admin/.htpasswd');
	}else{
		define('DOCUMENT_ROOT_ADMIN_PATH', $_SERVER["DOCUMENT_ROOT"].'/admin/.htpasswd');
	}

	// INIT CREDENTIALS HTACCESS
	$path_htaccess = getcwd().'/admin/.htaccess';
	$path_htpasswd = getcwd().'/admin/.htpasswd';

	if(!file_exists($path_htaccess)){
		file_put_contents($path_htaccess, 'AuthUserFile '.$path_htpasswd.'
	AuthName "Authorized personnel only."
	AuthType Basic
	Require valid-user');
	}


	// INIT CREDENTIALS HTPASSWD
	if(!file_exists($path_htpasswd)){
		$hash = crypt('layla');
		$user = 'layla';

		file_put_contents($path_htpasswd, $user.':'.$hash.'');
	}





// 	file_put_contents('admin/.htaccess', 'AuthUserFile '.DOCUMENT_ROOT_ADMIN_PATH.'
// AuthName "Authorized personnel only."
// AuthType Basic
// Require valid-user');

}

if(!strpos($_SERVER['REQUEST_URI'], 'admin')){
	// LOOP PLUGINS TO HEADER
	// $plugins = get_settings('plugins');
	// if(is_array(explode(',',$plugins)) || get_settings('plugins') != ''){

	// if(is_array(explode(',',$plugins))){

	// 	foreach (explode(',', $plugins) as $key => $value) {
	// 		if(file_exists(ROOT_ABSOLUTE_PATH.'includes/plugins/'.$value.'/index.php'))
	// 		include ROOT_ABSOLUTE_PATH."includes/plugins/".$value."/functions.php";
	// 	}
	// }
// }
}

function remove_empty($array) { return array_filter($array, function($value){return !empty($value) || $value === 0;}); }

if(!function_exists('get_header')){
function get_header(){
	ob_start();
	include "templates/".get_settings('default_template')."/header.php";
	$data = ob_get_contents();
	ob_end_clean();

	// $data = str_replace('{{', '', $data);
	// $data = str_replace('}}', '', $data);
	// $data = apply_shortcodes($data);

	return $data;
}
}

if(!function_exists('get_footer')){
function get_footer(){

	ob_start();
	include "templates/".get_settings('default_template')."/footer.php";
	$data = ob_get_contents();
	ob_end_clean ();

	// $data = str_replace('{{', '', $data);
	// $data = str_replace('}}', '', $data);
	// $data = apply_shortcodes($data);
	
	// file_get_contents(''.get_settings('default_url').'/includes/reports.php?type=view&ip='.$_SERVER['REMOTE_ADDR'].'');
	return $data;
}}

function get_title(){
	global $find_string;
	global $page;
	global $page_title;

	if($page_title && !empty($_GET['page'])){
		echo $page_title.' - ';
	}

	if($page_title && !empty($_GET['page'])){
		return get_settings('sitename');
	}else{
		return get_settings('sitename').' - '.get_settings('sitedescription');
	}
}

function get_js_reports(){

echo '<script type="text/javascript">
function callAjax(url, callback){
    var xmlhttp;
    // compatible with IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            // callback(xmlhttp.responseText);
        }
    }
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

callAjax("'.get_settings('default_url').'/includes/reports.php?type=view");</script>';

}

function apply_shortcodes($content){

	// $content = str_replace('[slider]', slider(), $content);
	// $content = str_replace('[contactform]', contactform(), $content);
	// $content = str_replace('[map]', map(), $content);

	$content = str_replace('{{', '', $content);
	$content = str_replace('}}', '', $content);
	
	return $content;
}

function _remove_empty_internal($value) {
  return !empty($value) || $value === 0;
}

function localize_content($content){

	if(strpos($_SERVER['REQUEST_URI'], 'admin')){
		$path = '../';
	}else{
		$path = './';
	}
	
	// LOOP PLUGINS TO HEADER
	$plugins = get_settings('plugins');
	if(is_array(explode(',',$plugins)) || get_settings('plugins') != ''){

	if(is_array(explode(',',$plugins))){

		// foreach (explode(',', $plugins) as $key => $value) {
		// 	if(file_exists($path.'/includes/plugins/'.$value.'/index.php'))
		// 	include $path."/includes/plugins/".$value."/functions.php";
		// }
	}
	}


	// Apply localization strings
	
	$current_language = (isset($_GET['language']))?$_GET['language'].'':''.get_settings('default_language');

	$lines = file($path.'/templates/'.get_settings('default_template').'/languages/'.$current_language.'.po');
	$camp = array();
	$camp_unique = array();
	$next2 = -1;



	// Get all the directories
	
	$dirname = $path.'/includes/plugins/';
	$findme  = "*index.php";
	$dirs    = glob($dirname.'*', GLOB_ONLYDIR);
	$files   = array();

	for ($i = 0; $i < count($dirs); $i++) {
		$handle.= file_get_contents($dirs[$i].'/languages/'.$current_language.'.po');
    }

    $sources_plugins = str_getcsv($handle,"\n");


	$sources = array_merge(file($path.'/templates/'.get_settings('default_template').'/languages/'.$current_language.'.po'), $sources_plugins);


	$lines = array_filter(array_map("trim", $sources), "strlen");

	if(count($lines) % 2){
		array_unshift($lines, "apple");
	}


	foreach($lines as $line) {
		// REMOVE HEADERS
		if(strpos($line, 'ontent-')){continue;}
		preg_match_all("/\"([^\]]*)\"/", $line, $line);
		$stringslines[]=$line[1][0];
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
		// preg_match_all("/\"([^\]]*)\"/", $line, $lineq);

	    // $array[] = $lineq;
	}
;
	$content = str_replace(array_keys($array_string), array_values($array_string), $content);
	// $content = str_replace("Layla","xx", $content);

	return apply_shortcodes($content);
}



/* 


// AUTOMATIC REDIRECT TO BROWSER LANGUAGE
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
$lang='it';
$languages = explode(',', get_settings('languages'));

if(!isset($_GET['language']) && $lang != strtolower(get_settings('default_language'))){

if( is_numeric(array_search(strtolower($lang), $languages)) ){
	header('location:/'.$lang.'/');
}

}

*/




if(isset($_GET['page']) && $_GET['page'] == '/admin'){
	header('location:/admin/index.php');
	die();
}


if(isset($_GET['preview']) && $_GET['preview'] == 1){

	$_SESSION['LAST'] = time();
	$_SESSION['preview'] = 1;

}

$expiry = 1800; //session expiry required after 30 mins

if (isset($_SESSION['LAST']) && (time() - $_SESSION['LAST'] > $expiry)) {
	    session_unset();
	    session_destroy();
	    unset($_SESSION['preview']);
}elseif(isset($_SESSION['preview'])  ){
	echo '<div style="position: fixed; bottom:20; z-index:999; background: red; padding: 10px; color: #fff;"><span class="icon-info"></span> Preview webu expiruje za '.($expiry/60).' minut.</div>';
}


// if($_SERVER['REMOTE_ADDR'] != '109.239.70.119' && !isset($_SESSION['preview'])){
// 	header('location: /_comingsoon/');
// 	die();
// }	  



function searchForColumn($id, $array, $column) {
   foreach ($array as $key => $val) {
       if ($val[$column] === $id) {
           return $key;
       }
   }
   return null;
}

function get_search_page($keyword){

	$search_page = file_get_contents('search.php');
	return $search_page;
}


function get_theme_localization_string($string, $theme, $langcode){
// $filename = dirname(__FILE__).'/templates/'.$theme.'/languages/'.$langcode.'.po';

// $lines       = file($filename);
// $line_number = false;

// while (list($key, $line) = each($lines) and !$line_number) {
//    $strings++;
//    $line_number = (strpos($line, $string) !== FALSE) ? $key + 1 : $line_number;
//    $lines[] = $line;
// }
// preg_match_all("/\"([^\]]*)\"/", $lines[$line_number], $matches);
// return $matches[1][0];

	
	$current_language = ($_GET['language'])?$_GET['language'].'':''.get_settings('default_language');
	
	// if(file_exists('./languages/'.$langcode.'.po')){


	$lines = array_filter(array_map("trim", file('../templates/'.$theme.'/languages/'.$langcode.'.po')), "strlen");

	if(count($lines) % 2){
		array_unshift($lines, "apple");
	}


	foreach($lines as $line) {
		preg_match_all("/\"([^\]]*)\"/", $line, $line);
		$stringslines[]=$line[1][0];
	}

	foreach($lines as $line) {
		$lines_count++;

		if ($lines_count % 2 == 0) {
			preg_match_all("/\"([^\]]*)\"/", $line, $line);
			$array_string[$stringslines[$lines_count-2]] = $line[1][0];
		}

		// preg_match_all("/\"([^\]]*)\"/", $line, $lineq);

	    // $array[] = $lineq;
	}

	return $array_string[$string];
	// }
	// $content = str_replace(array_keys($array_string), array_values($array_string), $content);
	// return $content;
}


function get_plugin_localization_string($string, $theme, $langcode){
// $filename = dirname(__FILE__).'/templates/'.$theme.'/languages/'.$langcode.'.po';

// $lines       = file($filename);
// $line_number = false;

// while (list($key, $line) = each($lines) and !$line_number) {
//    $strings++;
//    $line_number = (strpos($line, $string) !== FALSE) ? $key + 1 : $line_number;
//    $lines[] = $line;
// }
// preg_match_all("/\"([^\]]*)\"/", $lines[$line_number], $matches);
// return $matches[1][0];

	
	$current_language = ($_GET['language'])?$_GET['language'].'':''.get_settings('default_language');
	
	// if(file_exists('./languages/'.$langcode.'.po')){


	$lines = array_filter(array_map("trim", file('../includes/plugins/'.$_GET['plugin-name'].'/languages/'.$langcode.'.po')), "strlen");

	if(count($lines) % 2){
		array_unshift($lines, "apple");
	}


	foreach($lines as $line) {
		preg_match_all("/\"([^\]]*)\"/", $line, $line);
		$stringslines[]=$line[1][0];
	}

	foreach($lines as $line) {
		$lines_count++;

		if ($lines_count % 2 == 0) {
			preg_match_all("/\"([^\]]*)\"/", $line, $line);
			$array_string[$stringslines[$lines_count-2]] = $line[1][0];
		}

		// preg_match_all("/\"([^\]]*)\"/", $line, $lineq);

	    // $array[] = $lineq;
	}

	return $array_string[$string];
	// }
	// $content = str_replace(array_keys($array_string), array_values($array_string), $content);
	// return $content;
}




function get_settings($column) {
	$filename = dirname(__FILE__).'/data/settings.csv';
	// $filename = '/data/settings.csv';

    $f = fopen($filename, "r");
    $result = false;

    // print_r($row);
    // echo $row[0];
    while ($row = fgetcsv($f, 500000, ";")) {
        if ($row[0] == $column) {

        	if($column == 'default_homepage'){
        		if($_GET['page'] != 'plugins'){
	            
	            	$string = $row[1];
		            $result = explode(',', $string);
		            $i=0;
		            foreach ($result as $value) {
		            	$i++;
		            	// $hp_languages[$i]['language'] = explode(':', $value)[0];
		            	if(isset(explode(':', $value)[1])){
		            	$hp_languages[explode(':', $value)[0]]['homepage'] = explode(':', $value)[1];
		            	}
		            }

		            if(isset($_GET['language'])){
			            $result = $hp_languages[$_GET['language']]['homepage']; 
			        }else{
			            $result = $hp_languages['default']['homepage']; 
			        }

		        }else{

			            $result = $row[1];
		        }

	        }else{
			            $result = $row[1];
	        }


            break;
        }
    }
    fclose($f);
    
    return $result;

}






function get_all_homepages($column) {
	$filename = dirname(__FILE__).'/data/settings.csv';

    $f = fopen($filename, "r");
    $result = false;

    $row = fgetcsv($f, 500000, ";");
    while ($row = fgetcsv($f, 500000, ";")) {
        if ($row[0] == $column) {

        	if($column == 'default_homepage'){

			            $result = $row[1];
	        }
            

            break;
        }
    }
    fclose($f);
    return $result;
}




function get_languages(){


	$row = 0;
	$languages=array();
	$languages2=array();
	if (($handle = fopen("data/settings.csv", "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 500000, ";")) !== FALSE) {
	        $num = count($data);
	        $row++;
	         for ($c=0; $c < 2; $c++) {

	        if($data[$c] == 'languages'){
	        	// $languages[$i]['url'] = (get_settings('default_language') == explode(',', $data[$c+1]))?'':explode(',', $data[$c+1]);
	        	$languages = explode(',', $data[$c+1]);
	        	foreach ($languages as $value) {
	        		$i++;
	        		if((get_settings('default_language') == $value)){

		        		$languages2[$i]['url'] = get_settings('default_url').'/';

	        		}else{
		        		$languages2[$i]['url'] = get_settings('default_url').'/'.$value.'/';
	        		}
		        		$languages2[$i]['code'] = $value;
	        	}
	        }

	        }


	    }
	    fclose($handle);
	}

			return $languages2;

}

function get_main_menu(){

			$row = 0;
			$pages = array();
			if (($handle = fopen("data/pages.csv", "r")) !== FALSE) {
			    while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
			        $num = count($data);
			        $row++;

			        for ($c=0; $c < 11; $c++) {
			            $pages[$row]['row'] = $row;
			            $pages[$row][$c] = $data[$c];
			        }

			    }
			    fclose($handle);
			}

			// $pages = array_reverse($pages);
			// $pages = array_unique($pages);
				
			// $pages = array_search('3','en');

			// print_r($pages);

			foreach ($pages as $key => $value) {
					

					if($value[10] != 1){continue;}

					if($_GET['language'] == explode(':',$value[3])[0]){

					$i++;
			        $menus[$i]['sort'] = explode(':',$value[0])[1];
			        $menus[$i]['name'] = explode(':',$value[0])[0];
		        	$menus[$i]['original_slug'] = $value[1];

			       
			        if($_GET['language'] == ''){
			        	$menus[$i]['slug'] = '/'.$value[1].'/';

					    if($value[1] == get_settings('default_homepage')){
					    	$menus[$i]['slug'] = '/';		
					    }

				    }else{
				    	$menus[$i]['slug'] = '/'.$_GET['language'].'/'.$value[1].'/';
			        	$menus[$i]['original_slug'] = $value[1];

					    if($value[1] == get_settings('default_homepage')){
					    	$menus[$i]['slug'] = '/'.$_GET['language'].'/';		
					    }

				    }
				    
			        }elseif($value[3] == '' && get_settings('default_language') == $value[3]){

					$i++;
			        $menus[$i]['sort'] = explode(':',$value[0])[1];
			        $menus[$i]['name'] = explode(':',$value[0])[0];
			        $menus[$i]['slug'] = '/'.$value[1].'/';

			        }
			    }

            usort($menus,"cmp");

			return $menus;
}





function cmp($a, $b) {
   return $a['sort'] - $b['sort'];
}

function cmp_date($a, $b) {
   return $a['time'] - $b['time'];
}


function edit_content_attribute($post_type, $input_page, $input_name, $input_value){

	$row = -1;
	$pages = array();
	

	if (($handle = fopen(ROOT_ABSOLUTE_PATH."data/".$post_type.".csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
        
        $row++;	

	    $check_slug = find_content(ROOT_ABSOLUTE_PATH.'data/'.$post_type.'.csv', $input_page);
        if($row == $check_slug['id']){

		$get_attributes = $check_slug['attributes'];

		if(!empty($get_attributes)){
			foreach ($get_attributes as $key => $value) {

					if($key == $input_name){
						$attributes.= $input_name.':'.$input_value.',';
					}else{
						$attributes.= $key.':'.$value.',';
					}

					// unset($value);
					// unset($key);
					// unset($input_name);
					// unset($input_value);
			}
	    }

	    // print_r($attributes);
	    // die();
		$attributes_new = base64_encode($attributes);

		// $seo = base64_encode($check_slug['seo-title'].','.$check_slug['seo-keywords'].','.$check_slug['seo-description']);

	    $qq.= "".$check_slug['title'].";".$check_slug['slug'].";".time().";".$check_slug['post_language'].";".base64_encode($check_slug['content']).";".base64_encode($check_slug['excerpt']).";".$gallery.";".$check_slug['template'].";".$seo.";".$attributes_new.";\n";
	    
        }else{
        	$num = count($data);
	        for ($c=0; $c < $num; $c++) {
	        	// if(!empty($check_slug['slug'])){
	        	// $data[$c] = str_replace($slug_original, $slug, $data[$c]);
		        // }
	            $qq.= $data[$c].";";
	        }
	        $qq.="\n";
        }
	}


        // echo $qq;
        // die();
		file_put_contents(ROOT_ABSOLUTE_PATH."data/".$post_type.".csv", $qq);
		$success = 'updated';
	    fclose($handle);

	// die();


}

}

function find_content($filename, $email, $raw = 0, $custom_post = 0) {

	// if($_GET['language']){echo $email = $_GET['language'].':'.$email.'';}
    $f = fopen($filename, "r");
    $result = false;
    while ($row = fgetcsv($f, 500000, ";")) {
		@$cycle++;
    	// echo strpos($row[4], $_GET['language']);
    	// IF SLUG OR LANGUAGE WITH TENPLATE
        if ( ($cycle == $email && $custom_post == 1 ) || $row[1] == $email || ($row[7] == $email && strpos($row[3], $_GET['language'])  !== false) || (!isset($_GET['language']) && $row[7] == $email) ) {


        	// CHECK IF IS SINGLE CUSTOM POST
        	$post_type_post = explode('/',str_replace('.csv','',$filename))[1];
        	if(!is_array($post_type_post) && isset($_GET['page'])){
    		$result['template'] = 'single-'.$post_type_post.'.php';
			}else{
			$result['template'] = '';	
			}

        	if(is_array(explode(':',$row[0]))){
        		$result['title'] = explode(':',$row[0])[0];
        	}else{
        		$result['title'] = $row[0];
        	}

            if($raw == 1){

    		$result['id'] = $cycle-1;
    		$result['title'] = $row[0];
			$result['language'] = $row[3];
            $result['content'] = $row[4];
            $result['excerpt'] = $row[5];
            $result['time'] = $row[2];
            $result['thumb'] = $row[6];
            $result['gallery'] = $row[6];
            $result['slug'] = $row[1];
            if(!empty($row[7])){
            $result['template'] = $row[7];
            }
            $result['seo'] = $row[8];
            $result['attributes'] = $row[9];
            $result['visibility'] = $row[10];

            }else{
    		$result['id'] = $cycle-1;
            $result['language'] = $row[3];
            $result['content'] = base64_decode($row[4]);
            $result['excerpt'] = base64_decode($row[5]);
            $result['time'] = $row[2];
            $result['thumb'] = explode(',',base64_decode($row[6]))[0];
            $result['gallery'] = explode(',',base64_decode($row[6]));
            $result['slug'] = $row[1];
            if(!empty($row[7])){
            $result['template'] = $row[7];
            }
            $result['seo'] = $row[8];
            $result['visibility'] = $row[10];
            // $result['attributes'] = $row[9];

            // FOREACH ATTRIBUTES
			$attributes_array = explode(',', base64_decode($row[9]));
			foreach ($attributes_array as $key => $ATTS) {
				if(isset(explode(':',$ATTS)[1])){
				$result['attributes'][explode(':',$ATTS)[0]] = explode(':',$ATTS)[1];
				}
			}
			}

            break;
        }
    }
    fclose($f);
    return $result;
}



function layla_get_posts($post_type = 'posts', $order = 'ASC', $limit = ''){

			$row = 0;
			$pages = array();

			if(strpos($_SERVER['REQUEST_URI'], 'admin/') !== false){
			$path_prefix='../';			
			}else{
			$path_prefix='./';
			}

			if (($handle = fopen($path_prefix."data/".$post_type.".csv", "r")) !== FALSE) {
			    while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
			        $num = count($data);
			        $row++;

			        for ($c=0; $c < 10; $c++) {
			            $pages[$row]['row'] = $row;
			            $pages[$row][$c] = $data[$c];
			        }

			    }
			    fclose($handle);
			}

			
			// $pages = array_unique($pages);
				
			// $pages = array_search('3','en');



			foreach ($pages as $key => $value) {

					if($_GET['language'] == explode(':',$value[3])[0]){
					$num_pages++;

					$i++;
			        $menus[$i]['id'] = $num_pages;
			        $menus[$i]['sort'] = explode(':',$value[0])[1];
			        $menus[$i]['name'] = explode(':',$value[0])[0];
		        	$menus[$i]['original_slug'] = $value[1];
		        	$menus[$i]['slug'] = $value[1];
		        	$menus[$i]['time'] = $value[2];
			        $menus[$i]['content'] = base64_decode($value[4]);
			        $menus[$i]['excerpt'] = base64_decode($value[5]);
			        $menus[$i]['gallery'] = base64_decode($value[6]);
		            $menus[$i]['thumb'] = explode(',',base64_decode($value[6]))[0];
		            $menus[$i]['seo'] = explode(',',base64_decode($value[7]))[0];
		            	
		            // FOREACH ATTRIBUTES
					$attributes_array = explode(',', base64_decode($value[9]));
						// print_r($attributes_array);
						// echo '<br/>';
					foreach ($attributes_array as $key => $ATTS) {
						$atts_num++;
						// explode(':',$ATTS)[0][1];
						// $attributes_array2[$atts_num] = 'x';
											// $attributes_array2[$key] = explode(':',$ATTS);
						$menus[$i]['attributes'][explode(':',$ATTS)[0]] = explode(':',$ATTS)[1];
					}


					// $attributes_array_key	 = array_search($value['name'], array_column($attributes_array2, 0));


					// $att_value = $attributes_array2[$attributes_array_key][1];												



			       
			        if($_GET['language'] == ''){
			        	$menus[$i]['slug'] = '/'.$value[1].'/';

					    if($value[1] == get_settings('default_homepage')){
					    	$menus[$i]['slug'] = '/';		
					    }

				    }else{
				    	$menus[$i]['slug'] = '/'.$_GET['language'].'/'.$value[1].'/';
			        	$menus[$i]['original_slug'] = $value[1];

					    if($value[1] == get_settings('default_homepage')){
					    	$menus[$i]['slug'] = '/'.$_GET['language'].'/';		
					    }


				    }
				    
			        }elseif($value[3] == '' || get_settings('default_language') == $value[3]){
					$num_pages++;

					$i++;

			        $menus[$i]['id'] = $num_pages;
			        $menus[$i]['sort'] = explode(':',$value[0])[1];
			        $menus[$i]['name'] = ''.explode(':',$value[0])[0];
			        $menus[$i]['slug'] = '/'.$value[1].'/';
			        $menus[$i]['content'] = base64_decode($value[4]);
			        $menus[$i]['time'] = $value[2];
			        $menus[$i]['excerpt'] = base64_decode($value[5]);
			        $menus[$i]['gallery'] = base64_decode($value[6]);
		            $menus[$i]['thumb'] = explode(',',base64_decode($value[7]))[0];

			        }
			        if($num_pages == $limit){break;}
			    }

            // usort($menus,"cmp");
            // print_r($menus);

			usort($menus,"cmp_date");
			if($order == 'DESC'){
				$menus = array_reverse($menus);
			}
			

			return $menus;
}






function get_countries(){

	return array(
		'AF' => 'Afghanistan',
		'AX' => '&#197;land Islands',
		'AL' => 'Albania',
		'DZ' => 'Algeria',
		'AD' => 'Andorra',
		'AO' => 'Angola',
		'AI' => 'Anguilla',
		'AQ' => 'Antarctica',
		'AG' => 'Antigua and Barbuda',
		'AR' => 'Argentina',
		'AM' => 'Armenia',
		'AW' => 'Aruba',
		'AU' => 'Australia',
		'AT' => 'Austria',
		'AZ' => 'Azerbaijan',
		'BS' => 'Bahamas',
		'BH' => 'Bahrain',
		'BD' => 'Bangladesh',
		'BB' => 'Barbados',
		'BY' => 'Belarus',
		'BE' => 'Belgium',
		'PW' => 'Belau',
		'BZ' => 'Belize',
		'BJ' => 'Benin',
		'BM' => 'Bermuda',
		'BT' => 'Bhutan',
		'BO' => 'Bolivia',
		'BQ' => 'Bonaire, Saint Eustatius and Saba',
		'BA' => 'Bosnia and Herzegovina',
		'BW' => 'Botswana',
		'BV' => 'Bouvet Island',
		'BR' => 'Brazil',
		'IO' => 'British Indian Ocean Territory',
		'VG' => 'British Virgin Islands',
		'BN' => 'Brunei',
		'BG' => 'Bulgaria',
		'BF' => 'Burkina Faso',
		'BI' => 'Burundi',
		'KH' => 'Cambodia',
		'CM' => 'Cameroon',
		'CA' => 'Canada',
		'CV' => 'Cape Verde',
		'KY' => 'Cayman Islands',
		'CF' => 'Central African Republic',
		'TD' => 'Chad',
		'CL' => 'Chile',
		'CN' => 'China',
		'CX' => 'Christmas Island',
		'CC' => 'Cocos (Keeling) Islands',
		'CO' => 'Colombia',
		'KM' => 'Comoros',
		'CG' => 'Congo (Brazzaville)',
		'CD' => 'Congo (Kinshasa)',
		'CK' => 'Cook Islands',
		'CR' => 'Costa Rica',
		'HR' => 'Croatia',
		'CU' => 'Cuba',
		'CW' => 'Cura&Ccedil;ao',
		'CY' => 'Cyprus',
		'CZ' => 'Czech Republic',
		'DK' => 'Denmark',
		'DJ' => 'Djibouti',
		'DM' => 'Dominica',
		'DO' => 'Dominican Republic',
		'EC' => 'Ecuador',
		'EG' => 'Egypt',
		'SV' => 'El Salvador',
		'GQ' => 'Equatorial Guinea',
		'ER' => 'Eritrea',
		'EE' => 'Estonia',
		'ET' => 'Ethiopia',
		'FK' => 'Falkland Islands',
		'FO' => 'Faroe Islands',
		'FJ' => 'Fiji',
		'FI' => 'Finland',
		'FR' => 'France',
		'GF' => 'French Guiana',
		'PF' => 'French Polynesia',
		'TF' => 'French Southern Territories',
		'GA' => 'Gabon',
		'GM' => 'Gambia',
		'GE' => 'Georgia',
		'DE' => 'Germany',
		'GH' => 'Ghana',
		'GI' => 'Gibraltar',
		'GR' => 'Greece',
		'GL' => 'Greenland',
		'GD' => 'Grenada',
		'GP' => 'Guadeloupe',
		'GT' => 'Guatemala',
		'GG' => 'Guernsey',
		'GN' => 'Guinea',
		'GW' => 'Guinea-Bissau',
		'GY' => 'Guyana',
		'HT' => 'Haiti',
		'HM' => 'Heard Island and McDonald Islands',
		'HN' => 'Honduras',
		'HK' => 'Hong Kong',
		'HU' => 'Hungary',
		'IS' => 'Iceland',
		'IN' => 'India',
		'ID' => 'Indonesia',
		'IR' => 'Iran',
		'IQ' => 'Iraq',
		'IE' => 'Republic of Ireland',
		'IM' => 'Isle of Man',
		'IL' => 'Israel',
		'IT' => 'Italy',
		'CI' => 'Ivory Coast',
		'JM' => 'Jamaica',
		'JP' => 'Japan',
		'JE' => 'Jersey',
		'JO' => 'Jordan',
		'KZ' => 'Kazakhstan',
		'KE' => 'Kenya',
		'KI' => 'Kiribati',
		'KW' => 'Kuwait',
		'KG' => 'Kyrgyzstan',
		'LA' => 'Laos',
		'LV' => 'Latvia',
		'LB' => 'Lebanon',
		'LS' => 'Lesotho',
		'LR' => 'Liberia',
		'LY' => 'Libya',
		'LI' => 'Liechtenstein',
		'LT' => 'Lithuania',
		'LU' => 'Luxembourg',
		'MO' => 'Macao S.A.R., China',
		'MK' => 'Macedonia',
		'MG' => 'Madagascar',
		'MW' => 'Malawi',
		'MY' => 'Malaysia',
		'MV' => 'Maldives',
		'ML' => 'Mali',
		'MT' => 'Malta',
		'MH' => 'Marshall Islands',
		'MQ' => 'Martinique',
		'MR' => 'Mauritania',
		'MU' => 'Mauritius',
		'YT' => 'Mayotte',
		'MX' => 'Mexico',
		'FM' => 'Micronesia',
		'MD' => 'Moldova',
		'MC' => 'Monaco',
		'MN' => 'Mongolia',
		'ME' => 'Montenegro',
		'MS' => 'Montserrat',
		'MA' => 'Morocco',
		'MZ' => 'Mozambique',
		'MM' => 'Myanmar',
		'NA' => 'Namibia',
		'NR' => 'Nauru',
		'NP' => 'Nepal',
		'NL' => 'Netherlands',
		'AN' => 'Netherlands Antilles',
		'NC' => 'New Caledonia',
		'NZ' => 'New Zealand',
		'NI' => 'Nicaragua',
		'NE' => 'Niger',
		'NG' => 'Nigeria',
		'NU' => 'Niue',
		'NF' => 'Norfolk Island',
		'KP' => 'North Korea',
		'NO' => 'Norway',
		'OM' => 'Oman',
		'PK' => 'Pakistan',
		'PS' => 'Palestinian Territory',
		'PA' => 'Panama',
		'PG' => 'Papua New Guinea',
		'PY' => 'Paraguay',
		'PE' => 'Peru',
		'PH' => 'Philippines',
		'PN' => 'Pitcairn',
		'PL' => 'Poland',
		'PT' => 'Portugal',
		'QA' => 'Qatar',
		'RE' => 'Reunion',
		'RO' => 'Romania',
		'RU' => 'Russia',
		'RW' => 'Rwanda',
		'BL' => 'Saint Barth&eacute;lemy',
		'SH' => 'Saint Helena',
		'KN' => 'Saint Kitts and Nevis',
		'LC' => 'Saint Lucia',
		'MF' => 'Saint Martin (French part)',
		'SX' => 'Saint Martin (Dutch part)',
		'PM' => 'Saint Pierre and Miquelon',
		'VC' => 'Saint Vincent and the Grenadines',
		'SM' => 'San Marino',
		'ST' => 'S&atilde;o Tom&eacute; and Pr&iacute;ncipe',
		'SA' => 'Saudi Arabia',
		'SN' => 'Senegal',
		'RS' => 'Serbia',
		'SC' => 'Seychelles',
		'SL' => 'Sierra Leone',
		'SG' => 'Singapore',
		'SK' => 'Slovakia',
		'SI' => 'Slovenia',
		'SB' => 'Solomon Islands',
		'SO' => 'Somalia',
		'ZA' => 'South Africa',
		'GS' => 'South Georgia/Sandwich Islands',
		'KR' => 'South Korea',
		'SS' => 'South Sudan',
		'ES' => 'Spain',
		'LK' => 'Sri Lanka',
		'SD' => 'Sudan',
		'SR' => 'Suriname',
		'SJ' => 'Svalbard and Jan Mayen',
		'SZ' => 'Swaziland',
		'SE' => 'Sweden',
		'CH' => 'Switzerland',
		'SY' => 'Syria',
		'TW' => 'Taiwan',
		'TJ' => 'Tajikistan',
		'TZ' => 'Tanzania',
		'TH' => 'Thailand',
		'TL' => 'Timor-Leste',
		'TG' => 'Togo',
		'TK' => 'Tokelau',
		'TO' => 'Tonga',
		'TT' => 'Trinidad and Tobago',
		'TN' => 'Tunisia',
		'TR' => 'Turkey',
		'TM' => 'Turkmenistan',
		'TC' => 'Turks and Caicos Islands',
		'TV' => 'Tuvalu',
		'UG' => 'Uganda',
		'UA' => 'Ukraine',
		'AE' => 'United Arab Emirates',
		'GB' => 'United Kingdom (UK)',
		'US' => 'United States (US)',
		'UY' => 'Uruguay',
		'UZ' => 'Uzbekistan',
		'VU' => 'Vanuatu',
		'VA' => 'Vatican',
		'VE' => 'Venezuela',
		'VN' => 'Vietnam',
		'WF' => 'Wallis and Futuna',
		'EH' => 'Western Sahara',
		'WS' => 'Western Samoa',
		'YE' => 'Yemen',
		'ZM' => 'Zambia',
		'ZW' => 'Zimbabwe'
	);

}
function get_monthname($monthNum){


 // $monthNum = 5;
 $monthName = date("M", mktime(0, 0, 0, $monthNum, 10));
 
// // if($_GET['lang'] == 'cz'){
//  $aj = array("January","February","March","April","May","June","July","August","September","October","November","December");
//  $cz = array("Leden","Únor","Březen","Duben","Květen","Červen","Červenec","Srpen","Září","Říjen","Listopad","Prosinec");
//  $monthName = str_replace($aj, $cz, $monthName);
// // }

 return $monthName; // Output: May
}


function add_notifications($message, $link = '', $log = 0){

	$file = realpath(dirname(__FILE__)).'/data/notifications.csv';
	if(!file_exists($file)){$fh = fopen($file, 'w');}

	$ip = $_SERVER['REMOTE_ADDR'];
	// $details = json_decode(file_get_contents("https://freegeoip.net/json/{$ip}"));

	$current .= time().";".$ip.";".$message.";unread;".$link.";".$log.";\n";

	// Write the contents back to the file
	file_put_contents($file, $current, FILE_APPEND | LOCK_EX);

}



function send_email($to, $subject, $messagehtml, $attachment = '', $host_url) {
	
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
	$footer_text = '© '.date('Y').' '.$host_url;
	// • Jakoukoli Vaši zpětnou vazbu rádi uvítáme na zakaznici@mumla.cz.';

	if(strpos($_SERVER['REQUEST_URI'], 'admin')){
	$body_html = file_get_contents('../includes/email-template.php');
	}else{
	$body_html = file_get_contents('./includes/email-template.php');
	}

	$body_email = str_replace('%host_url%', $host_url, $body_html);
	$body_email = str_replace('%logo_url%', $logo_url, $body_html);
	$body_email = str_replace('%icon_url%', $icon_url, $body_email);
	$body_email = str_replace('%bg_image_url%', $bg_image_url, $body_email);
	$body_email = str_replace('%footer_text%', $footer_text, $body_email);
	$body_email = str_replace('%BODY_CONTENT%', $messagehtml, $body_email);
	$body_email = str_replace('%sitephone%', get_settings('sitephone'), $body_email);
	$body_email = str_replace('%siteemail%', get_settings('siteemail'), $body_email);
	

if(empty($attachment)){

	$headers = "From: " . strip_tags(''.get_settings('siteemail')). "\r\n";
	$headers .= "Reply-To: ". strip_tags(''.get_settings('siteemail')). "\r\n";
	// $headers .= $headers_bcc;
	// $headers .= "CC: susan@example.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	
	mail($to, $subject, $body_email, $headers);

	}else{

	// Settings
	$email       = $to;
	$to          = $to;
	$from        = "info@".$_SERVER['HTTP_HOST'];
	$subject     = $subject;
	$mainMessage = $messagehtml;
	$fileatt     = $attachment;
	$fileatttype = "application/pdf";
	$fileattname = "faktura.pdf";

	$headers = "From: " . strip_tags(''.get_settings('siteemail')). "\r\n";
	$headers .= $headers_bcc;
	// $headers .= "CC: susan@example.com\r\n";
	// $headers .= "MIME-Version: 1.0\r\n";
	// $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

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
	mail($to, $subject, $message, $headers);

	}
}

function get_last_row_file($file){

	$linecount = 0;
	$handle = fopen(dirname(__FILE__)."/".$file."", "r");

	while(!feof($handle)){
	  $line = fgets($handle);
	  $linecount++;
	}

	fclose($handle);

	return $linecount-1;
}

if(!empty($_GET['read_notifications'])){

	$file = realpath(dirname(__FILE__)).'/data/notifications.csv';

	echo $notifications = file_get_contents($file);

	// Open the file to get existing content
	// Append a new person to the file
	$notifications = str_replace('unread', 'read', $notifications);

	// Write the contents back to the file
	file_put_contents($file, $notifications);
	die();

}


function slugify($string, $replace = array(), $delimiter = '-') {
  // https://github.com/phalcon/incubator/blob/master/Library/Phalcon/Utils/Slug.php
  if (!extension_loaded('iconv')) {
    throw new Exception('iconv module not loaded');
  }
  // Save the old locale and set the new locale to UTF-8
  $oldLocale = setlocale(LC_ALL, '0');
  setlocale(LC_ALL, 'en_US.UTF-8');
  $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
  if (!empty($replace)) {
    $clean = str_replace((array) $replace, ' ', $clean);
  }
  $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
  $clean = strtolower($clean);
  $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
  $clean = trim($clean, $delimiter);
  // Revert back to the old locale
  setlocale(LC_ALL, $oldLocale);
  return $clean;
}


function install_demo($theme){

	foreach(glob('../templates/'.$theme.'/data-example/data/*') as $dir) {
	// $dirname = basename($dir);
		// echo $dir;
	$source = '../templates/'.$theme.'/data-example/data/'.strtolower(basename($dir)).'';
	$destination = '../data/'.strtolower(basename($dir));
	chmod($source, 0777);
	chmod($destination, 0777);

	if(copy($source, $destination)){
		// echo 'ok';
	}else{
		// echo 'chyba';
	}

	}



	foreach(glob('../templates/'.$theme.'/data-example/files/*') as $dir) {
	// $dirname = basename($dir);
		// echo $dir;
	$source = '../templates/'.$theme.'/data-example/files/'.strtolower(basename($dir)).'';
	$destination = '../data/'.strtolower(basename($dir));
	chmod($source, 0777);
	chmod($destination, 0777);
	
	if(copy($source, $destination)){
		// echo 'ok';
	}else{
		// echo 'chyba';
	}

	}

	add_notifications('Theme '.$theme.' activated, demo content installed');

}

function recursive_array_replace($find, $replace, $array) {
    if (!is_array($array)) {
        return str_replace($find, $replace, $array);
    }

    $newArray = [];
    foreach ($array as $key => $value) {
        $newArray[$key] = recursive_array_replace($find, $replace, $value);
    }
    return $newArray;
}

