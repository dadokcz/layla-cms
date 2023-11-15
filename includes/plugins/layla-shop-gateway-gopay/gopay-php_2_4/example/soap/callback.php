<?php

require_once "../../../../../../functions.php";


if(!function_exists('get_order')){
	function get_order($id){
	global $addtopostarea;

	$row = 0;
	$pages = array();
	if (($handle = fopen("../../../../../../data/orders.csv", "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
	        $num = count($data);
	        $row++;

	        for ($c=0; $c < 11; $c++) {
	            $att['row'] = $row;
	            $att['title'] = $data[0];
	            $att['slug'] = $data[1];
	            $att['time'] = $data[2];
	            $att['lang'] = $data[3];
	            $pages[$row][$c] = $data[$c];
		        $pages[$row]['sort'] = explode(':',$data[0])[1];
		        $pages[$row]['seo'] = base64_decode($data[8]);
		        $pages[$row]['attributes'] = base64_decode($data[9]);
	        }

	    }
	    fclose($handle);
	}
	if(!empty($addtopostarea['orders'])){
	$attributes = $pages[$row]['attributes'];
	$attributes_array = explode(',', $attributes);
	foreach ($addtopostarea['orders'] as $key => $value) {
		$i++;
		
		// if(isset($value['billing']['company'])){
		// 	if(count($value['billing'])){
		// 		$value = $value['billing'];
		// 	}
		// }else{
			if(count($value['billing'])){
				$value = $value['billing'];
			}
			if(count($value['shipping'])){
				$value = $value['shipping'];
			}
		// }

		$attributes_array = explode(',', $attributes);
		foreach ($attributes_array as $key => $ATTS) {
			$attributes_array2[$key] = explode(':',$ATTS);
		}

		$attributes_array_key	 = array_search($value['name'], array_column($attributes_array2, 0));

		$att_value = $attributes_array2[$attributes_array_key][1];

		$att['attribute'][$value['name']] = $att_value;

	}}

	return $att;

}}

$order = get_order($id);
$orderNumber = $order['row'];
$totalPrice = $order['price'];
$currency = get_settings('currency');
$productName = $order['title'];

if( function_exists( 'plugin_dir_path') ){
	$path = plugin_dir_path(__FILE__);
}else{
	$path = './';
}

require_once($path.'../config.php');

require_once($path.'../order.php');

require_once($path.'../../api/gopay_helper.php');
require_once($path.'../../api/gopay_soap.php');

/*
 * Parametry obsazene v redirectu po potvrzeni / zruseni platby, predavane od GoPay e-shopu
 */
$returnedPaymentSessionId = $_GET['paymentSessionId'];
$returnedGoId = $_GET['targetGoId'];
$returnedOrderNumber = $_GET['orderNumber'];
$returnedEncryptedSignature = $_GET['encryptedSignature'];

/*
 * Nacist data objednavky dle prichoziho paymentSessionId, zde z testovacich duvodu vse primo v testovaci tride Order
 * Upravte dle ulozeni vasich objednavek
 */


$order = new Order();
$order->loadByPaymentSessionId($returnedPaymentSessionId); // ! UPRAVTE !

/*
 * Kontrola validity parametru v redirectu, opatreni proti podvrzeni potvrzeni / zruseni platby
 */
try {
	GopayHelper::checkPaymentIdentity(
				(float)$returnedGoId,
				(float)$returnedPaymentSessionId,
				null,
				$returnedOrderNumber,
				$returnedEncryptedSignature,
				(float)GOID,
				$order->getOrderNumber(),
				SECURE_KEY);

	/*
	 * Kontrola zaplacenosti objednavky na serveru GoPay
	 */

	$result = GopaySoap::isPaymentDone(
				(float)$returnedPaymentSessionId,
				(float)GOID,
				$orderNumber,
				(int)$totalPrice,
				$currency,
				$productName,
				SECURE_KEY);

	if ($result["sessionState"] == GopayHelper::PAID ) {
		



		/*
		 * Zpracovat pouze objednavku, ktera jeste nebyla zaplacena 
		 */
		if ($order->getState() != GopayHelper::PAID) {
	
			/*
			 *  Zpracovani objednavky  ! UPRAVTE !
			 */


			// ZDE VYGENEROVAT KLIC PRO SOJKU 

			if(strpos(get_the_title($_GET['orderNumber']), 'Sojka') !== false){

				

			}

			$order->processPayment();


			edit_order_state($returnedOrderNumber, 'complete', 'paid');

			// $post = get_post( $_GET['orderNumber'] );

		 //    $time = time();

			// update_post_meta($post->ID, 'invoice_paid', date_i18n('Y-m-d'));
			
			// $invoice_number = get_post_meta($post->ID, 'invoice_number', true);
			// $licensetype = get_post_meta($post->ID, 'licensetype', true);
			// $qty = get_post_meta($post->ID, 'detail_duration', true);
			// update_post_meta($post->ID, 'invoice_paid', 'paid');
			// $post_title = $post->post_title;

			// $terms = get_the_terms($post->ID , 'client');
			// if($terms)
			// {	
			// $terms = array_values($terms);
			// $client_address = wpi_wpi_get_term_meta($terms[0]->term_id, 'client_address', true);
			// $client_email = wpi_wpi_get_term_meta($terms[0]->term_id, 'client_email', true);
			// }

			// $headers = 'From: FAKTURACE DADOK <info@dadok.cz>' . "\r\n";
		    // mail(get_bloginfo('admin_email'), 'Faktura #'.$invoice_number.' zaplacena', 'Faktura #'.$invoice_number.' - '.$post_title.' byla prave klientem zaplacena.', $headers, $attachments );

		    send_email('info@dadok.cz', 'Objednávku #'.$id.' dokončena', $email_template, '', '');

		}
	
		/*
		 * Presmerovani na prezentaci uspesne platby
		 */
		$location = SUCCESS_URL;

	} else if ( $result["sessionState"] == GopayHelper::PAYMENT_METHOD_CHOSEN) {
		/* Platba ceka na zaplaceni */
		$location = SUCCESS_URL;
	edit_order_state($returnedOrderNumber, 'waiting-for-payment', 'failed');
		
	
		
	} else if ( $result["sessionState"] == GopayHelper::CREATED) {
		/* Platba nebyla zaplacena */
		$location = FAILED_URL;
	edit_order_state($returnedOrderNumber, 'waiting-for-payment', 'failed');
	
	} else if ( $result["sessionState"] == GopayHelper::CANCELED) {
		/* Platba byla zrusena objednavajicim */
		$order->cancelPayment();
		$location = FAILED_URL;
	edit_order_state($returnedOrderNumber, 'waiting-for-payment', 'canceled');
		
	} else if ( $result["sessionState"] == GopayHelper::TIMEOUTED) {
		/* Platnost platby vyprsela  */
		$order->timeoutPayment();
		$location = FAILED_URL;
	edit_order_state($returnedOrderNumber, 'waiting-for-payment', 'failed');
		
	} else if ( $result["sessionState"] == GopayHelper::AUTHORIZED) {
		/* Platba byla autorizovana, ceka se na dokonceni  */
		$order->autorizePayment();
		$location = SUCCESS_URL;
	edit_order_state($returnedOrderNumber, 'waiting-for-payment', 'failed');
	
	} else if ( $result["sessionState"] == GopayHelper::REFUNDED) {
		/* Platba byla vracena - refundovana  */
		$order->refundPayment();
		$location = SUCCESS_URL;
	edit_order_state($returnedOrderNumber, 'waiting-for-payment', 'failed');
	
	} else {
		/* Chyba ve stavu platby */
		$location = FAILED_URL;
		$result["sessionState"] = GopayHelper::FAILED;
	edit_order_state($returnedOrderNumber, 'waiting-for-payment', 'failed');
		
	}

	header('Location: ' . $location . "?sessionState=" . $result["sessionState"] . "&sessionSubState=" . $result["sessionSubState"].'&p='.$post->ID.'&currency='.get_post_meta($post->ID, 'currency', true).'&hash='.$post->post_name.'');
	exit;

} catch (Exception $e) {
	/*
	 * Nevalidni informace z redirectu
	 */
	edit_order_state($returnedOrderNumber, 'waiting-for-payment', 'failed');
	header('Location: ' . FAILED_URL . "?sessionState=" . GopayHelper::FAILED . "&id=" . $returnedOrderNumber ."");

	exit;
	
}
?>