<?php
/**
 * Vytvoreni platby na strane GoPay a nasledne presmerovani na platebni branu
 */

require_once('../config.php');
require_once('../order.php');

require_once('../../api/gopay_helper.php');
require_once('../../api/gopay_soap.php');

/*
 * Pole kodu platebnich metod, ktere se zobrazi na brane. 
 * Hodnoty viz vzorovy e-shop, zalozka "Prehled aktivnich platebnich metod"
 * Zde nastaveno zobrazovani platebnich metod GoPay penezenka, platebni karty VISA, MasterCard, ePlatby a SuperCASH
 * Pro zobrazovani vsech platebnich metod ponechte pole prazdne
 */
//$paymentChannels = array("eu_pr_sms", "eu_bank");
$paymentChannels = array();

/*
 * Platebni metoda, ktere je prvotne vybrana na brane. 
 * Zde nastaveno prvotni vybrani platebni metody platebni karty VISA, MasterCard
 */
$defaultPaymentChannel = ""; 

$p1 = null;
$p2 = null;
$p3 = null;
$p4 = null;

/*
 * Nacist data objednavky, zde z testovacich duvodu vse napevno primo v testovaci tride Order
 * Upravte dle ulozeni vasich objednavek 
 */


$orderNumber = $_POST['orderNumber'];
$totalPrice = $_POST['totalPrice'];
$currency = $_POST['currency'];
$productName = $_POST['productName'];

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$city = $_POST['city'];
$street = $_POST['street'];
$postalCode = $_POST['postalCode'];
$email = $_POST['email'];




$order = new Order();
$order->load($orderNumber, $totalPrice, $currency, $productName, $firstName, $lastName, $city, $street, $postalCode, $email); // ! UPRAVTE !

/*
 * Vytvoreni platby na strane GoPay prostrednictvim API funkce
 * Pokud vytvoreni probehne korektne, je navracen identifikator $paymentSessionId
 * Pokud nastane chyba, je vyhozena vyjimka
 */

try {
	$paymentSessionId = GopaySoap::createPayment((float)GOID,
												$order->getProductName(),
										 		(int)$order->getTotalPrice(),
												$order->getCurrency(),
												$order->getOrderNumber(),
												CALLBACK_URL,
												CALLBACK_URL,
												$paymentChannels,
												$defaultPaymentChannel,
												SECURE_KEY,
												$order->firstName,
												$order->lastName,
												$order->city,
												$order->street,
												$order->postalCode,
												$order->countryCode,
												$order->email,
												$order->phoneNumber,
												$p1,
												$p2,
												$p3,
												$p4,
												LANG);

} catch (Exception $e) {
	/*
	 *  Osetreni chyby v pripade chybneho zalozeni platby
	 */
	// print_r($e);
	// die();
	header('Location: ' . FAILED_URL . "?sessionState=" . GopayHelper::FAILED . "&id=" .$orderNumber. "");
	
	exit;
}

/*
 * Platba na strane GoPay uspesne vytvorena
 * Ulozeni paymentSessionId k objednavce. Slouzi pro komunikaci s GoPay
 */
$order->setPaymentSessionId($paymentSessionId);
$order->save(); // ! UPRAVTE !

$encryptedSignature = GopayHelper::encrypt(
				GopayHelper::hash(
					GopayHelper::concatPaymentSession((float)GOID,
													(float)$paymentSessionId, 
													SECURE_KEY)
					), SECURE_KEY);			

/*
 * Presmerovani na platebni branu GoPay s predvybranou platebni metodou GoPay penezenka ($defaultPaymentChannel)
 */
header('Location: ' . GopayConfig::fullIntegrationURL() . "?sessionInfo.targetGoId=" . GOID . "&sessionInfo.paymentSessionId=" . $paymentSessionId . "&sessionInfo.encryptedSignature=" . $encryptedSignature);
exit;
?>
