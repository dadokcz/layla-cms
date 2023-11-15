<?php

include '../../functions.php';	

if(!function_exists('check_isic')){
function check_isic($number = '', $name = ''){


// S421000342300Q
// Hana Hanusková

	// https://online.syts.sk/overenie/?jscp=S421000342300Q&thisSubmit=Vyhľadať

if($number){
$url = 'https://www.mundo.cz/slevy/overeni-karty';
$myvars = 'card_id=' . $number . '&card_name=' . $name.'&protect=205';

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );


// echo $response;

include  '../../includes/plugins/layla-shop-isic/simple_html_dom.php';
// include "./includes/plugins/layla-shop-gateway-stripe/index.php";	
$html = str_get_html($response);
$results['error'] = $html->find('div[class=messages error]', 0)->innertext;

$results['card_id'] = $html->find('table td', 0)->innertext;
$results['majitel'] = $html->find('table td', 1)->innertext;
$results['typ_karta'] = $html->find('table td', 2)->innertext;
$results['created'] = $html->find('table td', 3)->innertext;
$results['expire'] = $html->find('table td', 4)->innertext;

return $results;
}



}}


	$data = explode(',', $_GET['data']);
	$card = $data[0];
	$name = $data[1];
	// $card = 'S421000342300Q';
	// $name = 'Hana Hanusková';

	$check = check_isic($card, $name);
	// echo $check['error'];
	// print_r($check);

	if(empty($check['error']) && strlen($check['majitel']) > 3 ){

	@mail('info@dadok.cz', 'Validní ISIC', 'Dobrý den, Poslane udaje
		'.$card.'
		'.$check['majitel'].'');
echo 'ok';

}else{
	echo 'nic';
}