<?php
// require_once "./includes/plugins/layla-shop/functions.php";
// require_once "./functions.php";

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