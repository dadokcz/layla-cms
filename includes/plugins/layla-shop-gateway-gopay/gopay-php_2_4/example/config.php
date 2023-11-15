<?php
// define('GOID', 8736259829);
// define('SECURE_KEY', "64yvYMBy");

define('GOID', 8382969309);
define('SECURE_KEY', "pS7Rc6w7vM24RWmndakftHL5");
/*
 * defaultni jazykova mutace platebni brany GoPay
 */

define('LANG', 'CS');

define('HTTP_SERVER', 'http://'.$_SERVER['HTTP_HOST'].'/');
define('SUCCESS_URL', 'http://'.$_SERVER['HTTP_HOST'].'/dekujeme/');
define('FAILED_URL', 'http://'.$_SERVER['HTTP_HOST'].'/dekujeme/');

/*
 * URL eshopu - pro urceni absolutnich cest 
 */

/*
 * URL skriptu volaneho pri navratu z platebni brany
 */
define('CALLBACK_URL', HTTP_SERVER . '/includes/plugins/layla-shop-gateway-gopay/gopay-php_2_4/example/soap/callback.php');


/*
 * URL skriptu vytvarejiciho platbu na GoPay
 */
define('ACTION_URL', HTTP_SERVER . '/includes/plugins/layla-shop-gateway-gopay/gopay-php_2_4/example/soap/payment.php');

/**
 *  Volba Testovaciho ci Provozniho prostredi
 *  Testovaci prostredi - GopayConfig::TEST
 *  Provozni prostredi  - GopayConfig::PROD
 */
require_once(dirname(__FILE__) . "/../api/gopay_config.php");
GopayConfig::init(GopayConfig::PROD);
?>