<?php

if(isset($_GET['payment_state']) && $_GET['payment_state'] == 1){
	include "./includes/plugins/layla-shop-gateway-gopay/response.php";	
}


if(isset($_POST['sitename']) && strpos($_SERVER['REQUEST_URI'], 'admin')){
	$fname = "../data/settings.csv";
	file_put_contents($fname, "gopay-id;".$_POST['gopay-id'].";\n", FILE_APPEND | LOCK_EX);
	file_put_contents($fname, "gopay-client;".$_POST['gopay-client'].";\n", FILE_APPEND | LOCK_EX);
	file_put_contents($fname, "gopay-secret;".$_POST['gopay-secret'].";\n", FILE_APPEND | LOCK_EX);
}


$settings['gateway-gopay']['plugin-title'] = '{{Gateway plugin Gopay}}';
$settings['gateway-gopay']['layla-shop-gateway-gopay-id']['title'] = 'GoPay ID';
$settings['gateway-gopay']['layla-shop-gateway-gopay-id']['name'] = 'gopay-id';
$settings['gateway-gopay']['layla-shop-gateway-gopay-id']['type'] = 'input-text';
$settings['gateway-gopay']['layla-shop-gateway-gopay-id']['selected'] = get_settings('gopay-id');


$settings['gateway-gopay']['layla-shop-gateway-gopay-client']['title'] = 'GoPay client';
$settings['gateway-gopay']['layla-shop-gateway-gopay-client']['name'] = 'gopay-client';
$settings['gateway-gopay']['layla-shop-gateway-gopay-client']['type'] = 'input-text';
$settings['gateway-gopay']['layla-shop-gateway-gopay-client']['selected'] = get_settings('gopay-client');

$settings['gateway-gopay']['layla-shop-gateway-gopay-secret']['title'] = 'GoPay secret';
$settings['gateway-gopay']['layla-shop-gateway-gopay-secret']['name'] = 'gopay-secret';
$settings['gateway-gopay']['layla-shop-gateway-gopay-secret']['type'] = 'input-text';
$settings['gateway-gopay']['layla-shop-gateway-gopay-secret']['selected'] = get_settings('gopay-secret');

$addtosettings = $settings;



if(isset($_GET['sessionState'])){

switch ($_GET['sessionState']) {
	case 'FAILED':

	$url = '/';
	$text = '{{Platba selhala, prosím kontaktujte dodavatele služeb.}}';

	break;
	
	case 'CANCELED':

	$url = '/';
	$text = '{{Platba byla zrušena. Prosím prověďte platbu za objednávku znovu.}}';

	break;

	case 'PAID':

	$url = '/';
	$text = '{Objednávka byla zaplacena. Děkujeme.}}';

	break;



	default:
	# code...
	break;
}

$order = get_order($_GET['id']);

$injections = ob_get_contents();
ob_end_clean();

ob_start();
include "includes/plugins/layla-shop-gateway-gopay/page-payment-state.php";
$page_html = ob_get_contents();
ob_end_clean();

$page_html = str_replace('%INJECTIONS%', $injections, $page_html);
$page_html = str_replace('%URL%', $url, $page_html);
$page_html = str_replace('%TEXT%', $text, $page_html);
$page_html = str_replace('%ORDER_URL%', '/'.$order['slug'].'/', $page_html);


$page_html = localize_content($page_html);

echo $page_html;

die();
}
