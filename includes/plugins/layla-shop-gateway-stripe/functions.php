<?php

// if(isset($_GET['payment_state']) && $_GET['payment_state'] == 1){
	 // include_once "./includes/plugins/layla-shop-gateway-stripe/index.php";	
// }

if(isset($_GET['callback-stripe'])){
	// ob_start();
	include_once "./includes/plugins/layla-shop-gateway-stripe/create-simple-session-success.php";	
	// ob_end_clean();
	die();
}


if(isset($_POST['sitename']) && strpos($_SERVER['REQUEST_URI'], 'admin')){
	$fname = "../data/settings.csv";
	file_put_contents($fname, "stripe-id;".$_POST['stripe-id'].";\n", FILE_APPEND | LOCK_EX);
	file_put_contents($fname, "stripe-client;".$_POST['stripe-client'].";\n", FILE_APPEND | LOCK_EX);
	file_put_contents($fname, "stripe-secret;".$_POST['stripe-secret'].";\n", FILE_APPEND | LOCK_EX);
}

// $settings['gateway-stripe']['layla-shop-gateway-stripe']['title'] = 'Stripe ID';
// $settings['gateway-stripe']['layla-shop-gateway-stripe']['name'] = 'stripe-id';
// $settings['gateway-stripe']['layla-shop-gateway-stripe']['type'] = 'input-text';
// $settings['gateway-stripe']['layla-shop-gateway-stripe']['selected'] = get_settings('stripe-id');

$settings['gateway-stripe']['plugin-title'] = '{{Gateway plugin Stripe}}';
$settings['gateway-stripe']['layla-shop-gateway-stripe-client']['title'] = 'Stripe client';
$settings['gateway-stripe']['layla-shop-gateway-stripe-client']['name'] = 'stripe-client';
$settings['gateway-stripe']['layla-shop-gateway-stripe-client']['type'] = 'input-text';
$settings['gateway-stripe']['layla-shop-gateway-stripe-client']['selected'] = get_settings('stripe-client');

$settings['gateway-stripe']['layla-shop-gateway-stripe-secret']['title'] = 'Stripe secret';
$settings['gateway-stripe']['layla-shop-gateway-stripe-secret']['name'] = 'stripe-secret';
$settings['gateway-stripe']['layla-shop-gateway-stripe-secret']['type'] = 'input-text';
$settings['gateway-stripe']['layla-shop-gateway-stripe-secret']['selected'] = get_settings('stripe-secret');

$settings['gateway-stripe']['layla-shop-gateway-stripe-payment-image']['title'] = 'Stripe úvodní obrázek';
$settings['gateway-stripe']['layla-shop-gateway-stripe-payment-image']['name'] = 'stripe-image';
$settings['gateway-stripe']['layla-shop-gateway-stripe-payment-image']['type'] = 'input-text';
$settings['gateway-stripe']['layla-shop-gateway-stripe-payment-image']['selected'] = get_settings('stripe-image');

$addtosettings = $settings;

unset($add_settings_number);


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
include "includes/plugins/layla-shop-gateway-stripe/page-payment-state.php";
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





if(!function_exists('get_stripe_simple_button')){
function get_stripe_simple_button($product = '', $price = '950', $sku = '1'){

?>
    <script src="https://js.stripe.com/v3/"></script>




<a class="checkout-button" onclick="stripe_click();" class="gradient animated pulse" title="Koupit Knihu" style="cursor: pointer;"><span class="button_price">950 Kč</span> <span class="button_text">Objednat knihu</span></a> <img src="/templates/objective-c/images/knihasleva.png?121" style="float: right; position: absolute; margin: -29px 0 0 20px; cursor: pointer;" onclick="get_isic();" />

<script type="text/javascript">
// Create an instance of the Stripe object with your publishable API key
var stripe = Stripe('<?=get_settings('stripe-client');?>');


function stripe_click(){
fetch("/includes/plugins/layla-shop-gateway-stripe/create-simple-session.php?product=<?=$product;?>&price=<?=$price;?>&sku=<?=$sku;?>&time=<?=time();?>", {
method: "POST",
})
.then(function (response) {
  return response.json();
})
.then(function (session) {
  return stripe.redirectToCheckout({ sessionId: session.id });
})
.then(function (result) {
  // If redirectToCheckout fails due to a browser or network
  // error, you should display the localized error message to your
  // customer using error.message.
  if (result.error) {
    alert(result.error.message);
  }
})
.catch(function (error) {
  console.error("Error:", error);
});
}




</script>



<?php
}}
