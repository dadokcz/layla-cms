<?php
// require_once "./includes/plugins/layla-shop/functions.php";
// require_once "./functions.php";


error_reporting(E_ALL);
require_once('vendor/autoload.php');
require_once('vendor/stripe/stripe-php/init.php');

// 4242424242424242    Visa    Any 3 digits    Any future date
// 4000056655665556    Visa (debit)    Any 3 digits    Any future date
// 5555555555554444    Mastercard  Any 3 digits    Any future date
// 2223003122003222    Mastercard (2-series)   Any 3 digits    Any future date
// 5200828282828210    Mastercard (debit)  Any 3 digits    Any future date
// 5105105105105100    Mastercard (prepaid)    Any 3 digits    Any future date
// 378282246310005 American Express    Any 4 digits    Any future date
// 371449635398431 American Express    Any 4 digits    Any future date
// 6011111111111117    Discover    Any 3 digits    Any future date
// 6011000990139424    Discover    Any 3 digits    Any future date
// 3056930009020004    Diners Club Any 3 digits    Any future date
// 36227206271667  Diners Club (14 digit card) Any 3 digits    Any future date
// 3566002020360505    JCB Any 3 digits    Any future date
// 6200000000000005    UnionPay


$itemName = "Demo Product"; 
$itemNumber = "PN12345"; 
$itemPrice = 25; 
$currency = "USD"; 
 
// Stripe API configuration  
define('STRIPE_API_KEY', 'sk_test_dtM8i9Yqwq1qkvldswKMYCxK00Gf9Yuk0O'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_2jTqe1i6hc7zBMx13Pe7tf4500hL3mL3dG'); 
  




$payment_id = $statusMsg = ''; 
$ordStatus = 'error'; 
 
// Check whether stripe token is not empty 
if(STRIPE_API_KEY){ 
     
    // Retrieve stripe token, card and user info from the submitted form data 
    $token  = STRIPE_API_KEY; 
    $name = 'Ondrej Dadok'; 
    $email = 'vaclav@havel.com'; 
     
    // Set API key 
    \Stripe\Stripe::setApiKey(STRIPE_API_KEY); 
     
    // Add customer to stripe 
    try {  


        $stripe = new \Stripe\StripeClient(
          'sk_test_dtM8i9Yqwq1qkvldswKMYCxK00Gf9Yuk0O'
        );
        $token = $stripe->tokens->create([
          'card' => [
            'number' => '424242424242424',
            'exp_month' => 10,
            'exp_year' => 2021,
            'cvc' => '314',
          ],
        ]);



        $customer = \Stripe\Customer::create(array( 
            'email' => $email, 
            'source'  => $token 
        )); 
    }catch(Exception $e) {  
        echo $api_error = $e->getMessage();  
    } 
     
    if(empty($api_error) && $customer){  
         
        // Convert price to cents 
        $itemPriceCents = ($itemPrice*100); 
         
        // Charge a credit or a debit card 
        try {  
            $charge = \Stripe\Charge::create(array( 
                'customer' => $customer->id, 
                'amount'   => $itemPriceCents, 
                'currency' => $currency, 
                'description' => $itemName 
            )); 
        }catch(Exception $e) {  
            $api_error = $e->getMessage();  
        } 
         
        if(empty($api_error) && $charge){ 
            // Retrieve charge details 
            $chargeJson = $charge->jsonSerialize(); 
         
            // Check whether the charge is successful 
            if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){ 
                // Transaction details  
                $transactionID = $chargeJson['balance_transaction']; 
                $paidAmount = $chargeJson['amount']; 
                $paidAmount = ($paidAmount/100); 
                $paidCurrency = $chargeJson['currency']; 
                $payment_status = $chargeJson['status']; 
                 
                // Include database connection file  
                // include_once 'dbConnect.php'; 
                 
                // Insert tansaction data into the database 
                // $sql = "INSERT INTO orders(name,email,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,created,modified) VALUES('".$name."','".$email."','".$itemName."','".$itemNumber."','".$itemPrice."','".$currency."','".$paidAmount."','".$paidCurrency."','".$transactionID."','".$payment_status."',NOW(),NOW())"; 
                // $insert = $db->query($sql); 
                // $payment_id = $db->insert_id; 

                // If the order is successful 
                if($payment_status == 'succeeded'){ 
                    $ordStatus = 'success'; 
                    $statusMsg = 'Your Payment has been Successful!'; 
                }else{ 
                    $statusMsg = "Your Payment has Failed!"; 
                } 
            }else{ 
                $statusMsg = "Transaction has been failed!"; 
            } 
        }else{ 
            $statusMsg = "Charge creation failed! $api_error";  
        } 
    }else{  
        $statusMsg = "Invalid card details! $api_error";  
    } 
}else{ 
    $statusMsg = "Error on form submission."; 
} 

echo $statusMsg;








die();

$stripe = new \Stripe\StripeClient('sk_test_dtM8i9Yqwq1qkvldswKMYCxK00Gf9Yuk0O');
$customer = $stripe->customers->create([
    'description' => 'Petr Novak',
    'email' => 'petr@dadok.cz',
    // 'payment_method' => 'pm_card_visa',
    'payment_method' => 'pm_card_visa',
]);
// echo $customer;




// $stripe->orders->create([
//   'currency' => 'czk',
//   'email' => 'jenny.rosen@dadok.cz',
//   'items' => [
//     [
//       'type' => 'sku',
//       'parent' => 'sku_IIg3EXxRXpj4h3',
//     ],
//   ],
//   'shipping' => [
//     'name' => 'Jenny Rosen',
//     'address' => [
//       'line1' => '1234 Main Street',
//       'city' => 'San Francisco',
//       'state' => 'CA',
//       'country' => 'US',
//       'postal_code' => '94111',
//     ],
//   ],
// ]);


$source = $stripe->customers->createSource(
  $customer->id,
  ['source' => 'pm_card_visa']
);

$payment = $stripe->paymentIntents->create([
  'amount' => 2000,
  'currency' => 'czk',
  'payment_method_types' => ['card'],
]);
echo $payment;


// $stripe = new \Stripe\StripeClient(
//   'sk_test_dtM8i9Yqwq1qkvldswKMYCxK00Gf9Yuk0O'
// );
// $stripe->checkout->sessions->create([
//   'success_url' => 'https://example.com/success',
//   'cancel_url' => 'https://example.com/cancel',
//   'payment_method_types' => ['card'],
//   'line_items' => [
//     [
//       'price' => 'price_H5ggYwtDq4fbrJ',
//       'quantity' => 2,
//     ],
//   ],
//   'mode' => 'payment',
// ]);





/*
include "./includes/plugins/layla-shop-gateway-gopay/gopay-rest-api/autoload.php";

$orderNumber = $id;
$totalPrice = $_POST['price'];
$currency = get_settings('currency');
$productName = "Objednávka #".$id;

$firstName = $_POST['shipping-first-name'];
$lastName = $_POST['shipping-last-name'];
$city = $_POST['shipping-city'];
$street = $_POST['shipping-address'];
$postalCode = $_POST['shipping-zip'];
$email = $_POST['shipping-email'];


// full configuration
$gopay = GoPay\Api::payments([
    'goid' => '8736259829',
    'clientId' => '1852295819',
    'clientSecret' => '64yvYMBy',
    'isProductionMode' => true,
    // 'scope' => GoPay\Definition\TokenScope::ALL,
    // 'language' => GoPay\Definition\Language::CZECH,
    // 'timeout' => 30
]);


$response = $gopay->createPayment([
    'payer' => [
        // 'default_payment_instrument' => PaymentInstrument::BANK_ACCOUNT,
        // 'allowed_payment_instruments' => [PaymentInstrument::BANK_ACCOUNT],
        // 'default_swift' => BankSwiftCode::FIO_BANKA,
        // 'allowed_swifts' => [BankSwiftCode::FIO_BANKA, BankSwiftCode::MBANK],
        'contact' => [
            'first_name' => $_POST['shipping-first-name'],
            'last_name' => $_POST['shipping-last-name'],
            'email' => $_POST['shipping-email'],
            'phone_number' => '00420774019903',
            'city' => $_POST['shipping-city'],
            'street' => $_POST['shipping-address'],
            'postal_code' => $_POST['shipping-zip'],
            // 'country_code' => 'CZE',
        ],
    ],
    'amount' => $_POST['price']*100,
    'currency' => get_settings('currency'),
    'order_number' => $orderNumber,
    // 'order_description' => $productName,
    // 'items' => [
    //     ['name' => 'item01', 'amount' => 50],
    //     ['name' => 'item02', 'amount' => 100],
    // ],
    // 'additional_params' => [
    //     array('name' => 'invoicenumber', 'value' => '2015001003')
    // ],
    'callback' => [
        'return_url' => 'http://'.$_SERVER['HTTP_HOST'].'/'.$slug.'/?payment_state=1',
        'notification_url' => 'http://'.$_SERVER['HTTP_HOST'].'/'.$slug.'/?payment_state=1&notify=1'
    ],
    'lang' => 'CZ', // if lang is not specified, then default lang is used
]);


if ($response->hasSucceed()) {
    // echo "hooray, API returned {$response}";
   $url = $response->json['gw_url']; // url for initiation of gateway
} else {
    // errors format: https://doc.gopay.com/en/?shell#http-result-codes
    // echo "oops, API returned {$response->statusCode}: {$response}";
    echo "Omlouváme se, ale nastala neočekávaná chyba při zpracování platby.<br/> Chyba byla reportována administrátorovi a budeme Vás brzy kontaktovat.";
    $url = '/';
    die();
}





ob_start();
?>

        

<?php

$injections = ob_get_contents();
ob_end_clean();

ob_start();
include "includes/plugins/layla-shop-gateway-gopay/page-modal.php";
$page_html = ob_get_contents();
ob_end_clean();


$page_html = str_replace('%INJECTIONS%', $injections, $page_html);
$page_html = str_replace('%URL%', $url, $page_html);

echo localize_content($page_html);

// echo localize_content($output);
die();
?>