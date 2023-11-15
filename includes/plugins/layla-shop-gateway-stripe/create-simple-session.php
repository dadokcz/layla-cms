<?php
session_start();

require_once 'vendor/autoload.php';

require_once "../../../functions.php";

\Stripe\Stripe::setApiKey(get_settings('stripe-secret'));

header('Content-Type: application/json');

$YOUR_DOMAIN = 'https://www.'.$_SERVER['HTTP_HOST'];

// DEMO 5555555555554444 Mastercard
$checkout_session = \Stripe\Checkout\Session::create([
  'submit_type' => 'pay',
  'billing_address_collection' => 'required',
  'shipping_address_collection' => [
    'allowed_countries' => ['US', 'CA', 'CZ', 'SK', 'PL', 'DE'],
  ],
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'czk',
      'unit_amount' => $_GET['price'].'00',
      'product_data' => [
        'name' => 'Vítejte v Programování Objective-C - Tištěná kniha',
        'images' => array(get_settings('stripe-image')),
      ],
    ],
    'quantity' => $_GET['sku'],
  ]],
  'mode' => 'payment',
  'success_url' => 'https://'.$_SERVER['HTTP_HOST'].'/?callback-stripe=1&time='.time(),
  'cancel_url' => 'https://'.$_SERVER['HTTP_HOST'],
]);

unset($_SESSION['orderid']);
unset($_SESSION['stripe-product']);
unset($_SESSION['stripe-product-sku']);
echo json_encode(['id' => $checkout_session->id]);

$_SESSION['orderid'] = $checkout_session->id;
$_SESSION['stripe-product'] = $_GET['product'];
$_SESSION['stripe-product-sku'] = $_GET['sku'];