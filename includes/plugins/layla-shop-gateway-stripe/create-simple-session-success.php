<?php
session_start();

// header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");


require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey(get_settings('stripe-secret'));

// print_r($_SESSION['orderid']);
$id = $_SESSION['orderid'];
$checkout_session = \Stripe\Checkout\Session::retrieve($id);

// echo '<pre>';
// echo json_encode($checkout_session);
// echo '</pre>';

// echo $checkout_session->customer;


$stripe = new \Stripe\StripeClient(
  get_settings('stripe-secret')
);



$paymentIntents = $stripe->paymentIntents->retrieve(
  $checkout_session->payment_intent,
  []
);



// echo '<pre>';
// print_r($checkout_session->customer);
// echo '</pre>';


$klient = $stripe->customers->retrieve(
  $checkout_session->customer,
  []
);

// die();

if(!isset($paymentIntents['charges']['data'][0]['billing_details']['address']['line1']) ){
	
// echo $checkout_session['billing']['name'];
// echo $checkout_session['billing']['address']['city'];
// echo $checkout_session['billing']['address']['line1'];
// echo $checkout_session['billing']['address']['line2'];
// echo $checkout_session['billing']['address']['postal_code'];
// echo $checkout_session['billing']['address']['state'];

$custom_order_array['orders']['billing-first-name'] =  explode(' ',trim($checkout_session['billing']['name']))[0];
$custom_order_array['orders']['billing-last-name'] =  explode(' ',trim($checkout_session['billing']['name']))[1];
$custom_order_array['orders']['billing-company'] = $paymentIntents['charges']['data'][0]['name'];
$custom_order_array['orders']['billing-company-id'] = '';
$custom_order_array['orders']['billing-address'] = $checkout_session['billing']['address']['line1'].''.$checkout_session['billing']['address']['line2'];
$custom_order_array['orders']['billing-city'] = $checkout_session['billing']['address']['city'];
$custom_order_array['orders']['billing-state'] = $checkout_session['billing']['address']['state'];
$custom_order_array['orders']['billing-zip'] = $checkout_session['billing']['address']['postal_code'];
$custom_order_array['orders']['billing']['shipping-email'] = $paymentIntents['charges']['data'][0]['email'];
$custom_order_array['orders']['billing-phone'] = '';
$custom_order_array['orders']['billing-order-note'] = '';


$custom_order_array['orders']['shipping-first-name'] = explode(' ',trim($paymentIntents['charges']['data'][0]['billing_details']['name']))[0];
$custom_order_array['orders']['shipping-last-name'] = explode(' ',trim($paymentIntents['charges']['data'][0]['billing_details']['name']))[1];
$custom_order_array['orders']['shipping-company'] = $paymentIntents['charges']['data'][0]['billing_details']['name'];
$custom_order_array['orders']['shipping-company-id'] = '';
$custom_order_array['orders']['shipping-address'] = $paymentIntents['charges']['data'][0]['billing_details']['address']['line1'].''.$paymentIntents['charges']['data'][0]['billing_details']['address']['line2'];
$custom_order_array['orders']['shipping-city'] = $paymentIntents['charges']['data'][0]['billing_details']['address']['city'];
$custom_order_array['orders']['shipping-state'] = $paymentIntents['charges']['data'][0]['billing_details']['address']['country'];
$custom_order_array['orders']['shipping-zip'] = $paymentIntents['charges']['data'][0]['billing_details']['postal_code'];
$custom_order_array['orders']['shipping-email'] = $paymentIntents['charges']['data'][0]['billing_details']['email'];
$custom_order_array['orders']['shipping-phone'] = '';
$custom_order_array['orders']['shipping-order-note'] = '';


}else{
$custom_order_array['orders']['shipping-first-name'] =  explode(' ',trim($checkout_session['shipping']['name']))[0];
$custom_order_array['orders']['shipping-last-name'] =  explode(' ',trim($checkout_session['shipping']['name']))[1];
$custom_order_array['orders']['shipping-company'] = $paymentIntents['charges']['data'][0]['name'];
$custom_order_array['orders']['shipping-company-id'] = '';
$custom_order_array['orders']['shipping-address'] = $checkout_session['shipping']['address']['line1'].''.$checkout_session['shipping']['address']['line2'];
$custom_order_array['orders']['shipping-city'] = $checkout_session['shipping']['address']['city'];
$custom_order_array['orders']['shipping-state'] = $checkout_session['shipping']['address']['state'];
$custom_order_array['orders']['shipping-zip'] = $checkout_session['shipping']['address']['postal_code'];
$custom_order_array['orders']['shipping']['shipping-email'] = $paymentIntents['charges']['data'][0]['email'];
$custom_order_array['orders']['shipping-phone'] = '';
$custom_order_array['orders']['shipping-order-note'] = '';



$custom_order_array['orders']['billing-first-name'] = explode(' ',trim($paymentIntents['charges']['data'][0]['billing_details']['name']))[0];
$custom_order_array['orders']['billing-last-name'] = explode(' ',trim($paymentIntents['charges']['data'][0]['billing_details']['name']))[1];
$custom_order_array['orders']['billing-company'] = $paymentIntents['charges']['data'][0]['billing_details']['name'];
$custom_order_array['orders']['billing-company-id'] = '';
$custom_order_array['orders']['billing-address'] = $paymentIntents['charges']['data'][0]['billing_details']['address']['line1'].''.$paymentIntents['charges']['data'][0]['billing_details']['address']['line2'];
$custom_order_array['orders']['billing-city'] = $paymentIntents['charges']['data'][0]['billing_details']['address']['city'];
$custom_order_array['orders']['billing-state'] = $paymentIntents['charges']['data'][0]['billing_details']['address']['country'];
$custom_order_array['orders']['billing-zip'] = $paymentIntents['charges']['data'][0]['billing_details']['postal_code'];
$custom_order_array['orders']['billing-email'] = $paymentIntents['charges']['data'][0]['billing_details']['email'];
$custom_order_array['orders']['billing-phone'] = '';
$custom_order_array['orders']['billing-order-note'] = '';

}




$id 			= get_last_row_file("data/orders.csv")+1;
$productName 	= '{{Order}} #'.get_settings('invoice-prefix').''.$id.'';
$orderid 		= get_settings('invoice-prefix').''.$id.'';




$custom_order_array['orders']['id'] = $orderid;
$custom_order_array['orders']['payment_method'] = 'stripe';
$custom_order_array['orders']['price'] = $paymentIntents['charges']['data'][0]['amount']/100;
$custom_order_array['orders']['payment_state'] = 'paid';
$custom_order_array['orders']['state'] = 'processing';



$cart['cart_items'][0]['product'] = $_SESSION['stripe-product'];
$cart['cart_items'][0]['sku'] 	  = $_SESSION['stripe-product-sku'];

$custom_order_array['orders']['cart'] = base64_encode( json_encode($cart['cart_items']) );




// // DEMO 5555555555554444 Mastercard

// // $custom_order_array = array();
// echo '<pre>';
// print_r($custom_order_array);
// echo '</pre>';


external_order($custom_order_array);
// die();


// unset($_SESSION['orderid']);

// try {
//     $event = \Stripe\Event::constructFrom(
//         json_decode($payload, true)
//     );
// } catch(\UnexpectedValueException $e) {
//     // Invalid payload
//     http_response_code(400);
//     exit();
// }

// // Handle the event
// switch ($event->type) {
//     case 'payment_intent.succeeded':
//         $paymentIntent = $event->data->object; // contains a StripePaymentIntent
//         handlePaymentIntentSucceeded($paymentIntent);
//         break;
//     case 'payment_method.attached':
//         $paymentMethod = $event->data->object; // contains a StripePaymentMethod
//         handlePaymentMethodAttached($paymentMethod);
//         break;
//     // ... handle other event types
//     default:
//         echo 'Received unknown event type ' . $event->type;
// }

// http_response_code(200);







