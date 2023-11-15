<?php
include "autoload.php";

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
            'first_name' => $_POST['firstName'],
            'last_name' => $_POST['lastName'],
            'email' => $_POST['email'],
            // 'phone_number' => $_POST['firstName'],
            'city' => $_POST['city'],
            'street' => $_POST['street'],
            'postal_code' => $_POST['postalCode'],
            // 'country_code' => 'CZE',
        ],
    ],
    'amount' => $_POST['totalPrice'],
    'currency' => $_POST['currency'],
    'order_number' => $_POST['orderNumber'],
    'order_description' => $_POST['productName'],
    // 'items' => [
    //     ['name' => 'item01', 'amount' => 50],
    //     ['name' => 'item02', 'amount' => 100],
    // ],
    // 'additional_params' => [
    //     array('name' => 'invoicenumber', 'value' => '2015001003')
    // ],
    'callback' => [
        'return_url' => 'http://www.your-url.tld/return',
        'notification_url' => 'http://www.your-url.tld/notify'
    ],
    'lang' => 'CZ', // if lang is not specified, then default lang is used
]);


if ($response->hasSucceed()) {
    // echo "hooray, API returned {$response}";
    header('location:'.$response->json['gw_url']); // url for initiation of gateway
} else {
    // errors format: https://doc.gopay.com/en/?shell#http-result-codes
    echo "oops, API returned {$response->statusCode}: {$response}";
    die('x');
}

