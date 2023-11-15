<?php
// error_reporting(-1);
// CUSTOMIZE MENU




$tomenu['name'] = '{{Newsletter}}';
$tomenu['page'] = 'layla-newsletter';
$tomenu['url'] = '?page=layla-newsletter&post_type=newsletter';
$tomenu['icon'] = 'mail';


// $tomenu_count = count($tomenu);

$tomenu[0]['name'] = '{{Subscribers}}';
$tomenu[0]['page'] = 'subscribers';
$tomenu[0]['url'] = '?page=layla-newsletter&post_type=newsletter-subscribers';
$tomenu[0]['icon'] = 'mail';

array_push($addtomenu, $tomenu);
$addtomenu_admin[] = $tomenu;
unset($tomenu);

$postarea['newsletter-subscribers'][0]['title'] = '{{Name & Surname}}';
$postarea['newsletter-subscribers'][0]['name'] = 'name';
$postarea['newsletter-subscribers'][0]['type'] = 'input-text';
$postarea['newsletter-subscribers'][0]['show-menu'] = true;
$postarea['newsletter-subscribers'][0]['prefix'] = '';
$postarea['newsletter-subscribers'][0]['suffix'] = '';
$postarea['newsletter-subscribers'][0]['col'] = '2';


$postarea['newsletter-subscribers'][1]['title'] = '{{IP address}}';
$postarea['newsletter-subscribers'][1]['name'] = 'ip';
$postarea['newsletter-subscribers'][1]['type'] = 'input-text';
$postarea['newsletter-subscribers'][1]['show-menu'] = true;
$postarea['newsletter-subscribers'][1]['prefix'] = '';
$postarea['newsletter-subscribers'][1]['suffix'] = '';
$postarea['newsletter-subscribers'][1]['col'] = '2';

$postarea['newsletter-subscribers'][2]['title'] = '{{City}}';
$postarea['newsletter-subscribers'][2]['name'] = 'city';
$postarea['newsletter-subscribers'][2]['type'] = 'input-text';
$postarea['newsletter-subscribers'][2]['show-menu'] = true;
$postarea['newsletter-subscribers'][2]['prefix'] = '';
$postarea['newsletter-subscribers'][2]['suffix'] = '';
$postarea['newsletter-subscribers'][2]['col'] = '2';

$postarea['newsletter-subscribers'][3]['title'] = '{{Country}}';
$postarea['newsletter-subscribers'][3]['name'] = 'country';
$postarea['newsletter-subscribers'][3]['type'] = 'input-text';
$postarea['newsletter-subscribers'][3]['show-menu'] = true;
$postarea['newsletter-subscribers'][3]['prefix'] = '';
$postarea['newsletter-subscribers'][3]['suffix'] = '';
$postarea['newsletter-subscribers'][3]['col'] = '2';

$postarea['newsletter-subscribers'][4]['title'] = '{{Country code}}';
$postarea['newsletter-subscribers'][4]['name'] = 'country_code';
$postarea['newsletter-subscribers'][4]['type'] = 'input-text';
$postarea['newsletter-subscribers'][4]['show-menu'] = true;
$postarea['newsletter-subscribers'][4]['prefix'] = '';
$postarea['newsletter-subscribers'][4]['suffix'] = '';
$postarea['newsletter-subscribers'][4]['col'] = '2';

$postarea['newsletter-subscribers'][5]['title'] = '{{ZIP code}}';
$postarea['newsletter-subscribers'][5]['name'] = 'zip_code';
$postarea['newsletter-subscribers'][5]['type'] = 'input-text';
$postarea['newsletter-subscribers'][5]['show-menu'] = false;
$postarea['newsletter-subscribers'][5]['prefix'] = '';
$postarea['newsletter-subscribers'][5]['suffix'] = '';
$postarea['newsletter-subscribers'][5]['col'] = '2';

$postarea['newsletter-subscribers'][5]['title'] = '{{Send test to e-mail?}}';
$postarea['newsletter-subscribers'][5]['name'] = 'send_test';
$postarea['newsletter-subscribers'][5]['type'] = 'input-text';
$postarea['newsletter-subscribers'][5]['show-menu'] = false;
$postarea['newsletter-subscribers'][5]['prefix'] = '';
$postarea['newsletter-subscribers'][5]['suffix'] = '';
$postarea['newsletter-subscribers'][5]['col'] = '2';


$addtopostarea = $postarea;



$addtosettings = $settings;


if(!function_exists('add_subscriber')){
function add_subscriber($email, $lang = '', $name = ''){
if(!empty($email)){
	$file = './data/newsletter-subscribers.csv';
	if(!file_exists($file)){$fh = fopen($file, 'w');}
	$details = json_decode(file_get_contents("https://freegeoip.app/json/".$_SERVER['REMOTE_ADDR']));

	$attributes = "".$name.",".$_SERVER['REMOTE_ADDR'].",".$details->city.",".$details->country.",".$details->country_code.",".$details->zip_code."";

	$attributes = base64_encode($attributes);

	$ip = $_SERVER['REMOTE_ADDR'];



	$puttofile="".$email.";".slugify($email).";".time().";".$lang.";".$attributes.";\n";

	file_put_contents($file, $puttofile, FILE_APPEND | LOCK_EX);



	if($puttofile){
		return true;
	}else{
		return false;
	}

}}
}



if(!function_exists('send_newsletter')){
function send_newsletter(){

	$row = 0;
	$page=array();
	if (($handle = fopen("../data/newsletter-subscribers.csv", "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 500000, ";")) !== FALSE) {
	        $num = count($data);
	        $row++;
	        // for ($c=0; $c < 5; $c++) {
	        	// echo $data[$row][4];
	        	// check if its subscriber from right localization

	        	// if(str_replace(':', '', $_POST['post_language']) == $data[3] || $_POST['post_language'] == get_settings('default_language')){
			    if(explode(':',  $_POST['post_language'])[0] == $data[3] || explode(':', $_POST['post_language'])[0] == get_settings('default_language')){
			            $subscribers_to[$row] = $data[0];
	        	// 	if($data[3] == ''){
					     // $subscribers_to[$row] = get_settings('default_language');
	        	// 	}else{
			       //      $subscribers_to[$row] = $data[0];
	        	// 	}
	            }
	        // }
	    }
	    fclose($handle);
	}

	$subscribers_to = array_filter($subscribers_to);
	
	if(isset($_POST['send_test'])){
		$subscribers_to = $_POST['send_text'];
	}else{
		$subscribers_to = $subscribers_to;
	}
	send_newsletter($subscribers_to, $_POST['title'], $_POST['content']);

}
}

if( ($_POST['title'] && $_GET['post_type'] == 'newsletter' && !empty($_GET['addpage'])) || (!empty($_GET['edit']) && $_GET['post_type'] == 'newsletter') ){
	send_newsletter();
}
