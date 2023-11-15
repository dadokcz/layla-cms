<?php
/**
 * Trida pouzita pouze v tomto testu pro uchovani ukazkove objednavky
 * Metody pro nacitani dat objednavky, jejich ulozeni a zpracovani objednavky upravte podle vasich potreb a ulozeni objednavek v DB 
 */
require_once(dirname(__FILE__) . "/../api/country_code.php");
require_once(dirname(__FILE__) . "/../api/gopay_helper.php");



/**
 * Vytvoreni platby pomoci WS z eshopu
 * 
 * @param string $variableSymbol - Identifikator objednavky na vasem e-shopu - slouzi k identifikaci objednavky ve vasem e-shopu pri zaslani notifikace
 * @param int $totalPrice       - Celkova cena objednavky, cena je uvedena v halerich
 * @param string $currency - identifikator meny platby
 * @param long $paymentSessionId - Identifikator platby na GoPay - ziskan pri vytvareni platby funkci GopaySoap::createCustomerEshopPayment
 * @param string $productName    - Popis objednavky, ktery se zobrazi na brane
 * 
 * @param boolean $preAuthorization - jedna-li se o predautorizovanou platbu
 * @param boolean $recurrentPayment - jedna-li se o opakovanou platbu
 * @param date $recurrenceDateTo - do kdy se ma opakovana platba provadet
 * @param string $recurrenceCycle - frekvence opakovresultane platby - mesic/tyden/den
 * @param int $recurrencePeriod - pocet plateb v cyklu $recurrenceCycle - kolikrat v mesici/... se opakovana platba provede 
 * 
 * Informace o zakaznikovi - nepovinne
 * @param string $firstName      - Jmeno zakaznika
 * @param string $lastName       - Prijmeni
 * 
 * Adresa
 * @param string $city           - Mesto
 * @param string $street         - Ulice
 * @param string $postalCode     - PSC
 * @param string $countryCode    - Kod zeme. Validni kody jsou uvedeny ve tride CountryCode
 * @param string $email          - Email zakaznika
 * @param string $phoneNumber    - Tel. cislo
 * 
 * @param string $state - Stav platby - viz GopayHelper
 */
class Order {
	var $orderNumber = null;
	var $totalPrice = null;
	var $currency = null;
	var $paymentSessionId = null;
	var $productName = null;

	var $preAuthorization = null;
	var $recurrentPayment = null;
	var $recurrenceDateTo = null;
	var $recurrenceCycle = null;
	var $recurrencePeriod = null;
	
	var $firstName = null;
	var $lastName = null;
	var $city = null;
	var $street = null;
	var $postalCode = null;
	var $countryCode = null;
	var $email = null;
	var $phoneNumber = null;
	
	var $state = GopayHelper::CREATED;
	
	var $paidRecurrentPaymentList = array();

	function getOrderNumber() {
		return $this->orderNumber;
	}
	function getTotalPrice() {
		return $this->totalPrice;
	}
	function getCurrency() {
		return $this->currency;
	}
	function getProductName() {
		return $this->productName;
	}
	function getPaymentSessionId() {
		return $this->paymentSessionId;
	}
	function setPaymentSessionId($paymentSessionId) {
		$this->paymentSessionId = $paymentSessionId;
	}
	function getPreAuthorization() {
		return $this->preAuthorization;
	}
	function getRecurrentPayment() {
		return $this->recurrentPayment;
	}
	function getRecurrenceDateTo() {
		return $this->recurrenceDateTo;
	}
	function getRecurrenceCycle() {
		return $this->recurrenceCycle;
	}
	function getRecurrencePeriod() {
		return $this->recurrencePeriod;
	}
	function getFirstName() {
		return $this->firstName;
	}
	function getLastName() {
		return $this->lastName;
	}
	function getCity() {
		return $this->city;
	}
	function getStreet() {
		return $this->street;
	}
	function getPostalCode() {
		return $this->postalCode;
	}
	function getCountryCode() {
		return $this->countryCode;
	}
	function getEmail() {
		return $this->email;
	}
	function getPhoneNumber() {
		return $this->phoneNumber;
	}
	function getState() {
		return $this->state;
	}
	function setState($state) {
		$this->state = $state;
	}
	function getPaidRecurrentPaymentList() {
		return $this->paidRecurrentPaymentList;
	}
	function setPaidRecurrentPaymentList($paidRecurrentPaymentList) {
		$this->paidRecurrentPaymentList = $paidRecurrentPaymentList;
	}

	
	/*
	 *  Funkce simulujici nacteni dat objednavky. 
	 *  Ve vasem e-shopu nacitejte data dle jejich ulozeni v DB
	 */
	function load($orderNumber, $totalPrice, $currency, $productName, $firstName, $lastName, $city, $street, $postalCode, $email) {
		$nextmonth = date("Y-m-d", mktime(0, 0, 0, date("m") + 1, date("d"), date("Y"))); 

		$this->orderNumber = $orderNumber;
		$this->totalPrice = $totalPrice;
		$this->currency = $currency;
		$this->productName = $productName;

		$this->preAuthorization = false;
		$this->recurrentPayment = true;
		$this->recurrenceDateTo = $nextmonth;
		$this->recurrenceCycle = GopayHelper::RECURRENCE_CYCLE_ON_DEMAND;
		$this->recurrencePeriod = 1;
		
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->city = $city;
		$this->street = $street;
		$this->postalCode = $postalCode;
		$this->countryCode = CountryCode::CZE;
		$this->email = $email;
		//$this->phoneNumber = "00420724123457";
	}
	
	/*
	 * Funkce simulujici nacteni dat objednavky dle paymentSessionId. 
	 * Ve vasem e-shopu nacitejte data dle jejich ulozeni v DB
	 */
	function loadByPaymentSessionId($paymentSessionId) {

		global $post;
		$post = get_post( $_GET['orderNumber'] );

        $language = get_post_meta( $post->ID, 'language', true );
        $phone = get_post_meta( $post->ID, 'phone', true );
        $email = get_post_meta( $post->ID, 'email', true );
      
		$nextmonth = date("Y-m-d", mktime(0, 0, 0, date("m") + 1, date("d"), date("Y"))); 
		
		$this->orderNumber = $post->ID;
		$this->totalPrice = get_the_invoice_total()*100;
		$this->currency = 'CZK';
		$this->productName = __('DADOK - FAKTURA #'.$post->ID.'','dadok');

		$this->preAuthorization = false;
		$this->recurrentPayment = true;
		$this->recurrenceDateTo = $nextmonth;
		$this->recurrenceCycle = GopayHelper::RECURRENCE_CYCLE_ON_DEMAND;
		$this->recurrencePeriod = 1;

		$this->firstName = "unknown";
		$this->lastName = "unknown";
		$this->city = "unknown";
		$this->street = "unknown";
		$this->postalCode = "unknown";
		$this->countryCode = CountryCode::CZE;
		$this->email = $email;
		//$this->phoneNumber = "00420724123457";
	}
	
	/*
	 * Funkce simulujici ulozeni dat objednavky do DB
	 * V prikladu slouzi pro simulovani ulozeni ziskaneho $paymentSessionId
	 */
	function save() {

	}

	/*
	 * Funkce simulujici zpracovani objednavky - zmena stavu na "zaplaceno", zaslani emailu zakaznikovi, atd.
	 */
	function processPayment() {
		self::setState(GopayHelper::PAID);		
	}

	/*
	 * Funkce simulujici zruseni objednavky - zmena stavu na "zrusena", zaslani emailu zakaznikovi, atd.
	 */
	function cancelPayment() {
		self::setState(GopayHelper::CANCELED);
		
	}

	/*
	 * Funkce simulujici vyprseni doby platnosti objednavky - zmena stavu na "vyprsela", zaslani emailu zakaznikovi, atd.
	 */
	function timeoutPayment() {
		self::setState(GopayHelper::TIMEOUTED);
		
	}

	/*
	 * Funkce simulujici autorizaci objednavky - zmena stavu na "autorizovana", zaslani emailu zakaznikovi, atd.
	 */
	function autorizePayment() {
		self::setState(GopayHelper::AUTHORIZED);
		
	}

	/*
	 * Funkce simulujici vraceni platby - zmena stavu na "vracena", zaslani emailu zakaznikovi, atd.
	 */
	function refundPayment() {
		self::setState(GopayHelper::REFUNDED);
		
	}
	
	function isPaidRecurrentPayment($paymentSessionId) {
		$paidRecurrentPaymentList = self::getPaidRecurrentPaymentList();

		if (in_array($paymentSessionId, $paidRecurrentPaymentList)) {
			return true;
		}
		
		return false;
	}
	
	function addPaidRecurrentPayment($paymentSessionId) {
		$paidRecurrentPaymentList = self::getPaidRecurrentPaymentList();
		
		$paidRecurrentPaymentList[] = $paymentSessionId;
		
		self::setPaidRecurrentPaymentList($paidRecurrentPaymentList);
	}
}
?>