<?php
	// error_reporting(-1); // reporting turned OFF

	$line = $_SERVER['REQUEST_URI'];

	if( empty( $_GET['id'] ) ){  
        header("HTTP/1.1 200 Internal Server Error");
	}

    if( $gopay_option == 'yes' ){
        $gopay_url = 'https://gw.sandbox.gopay.com/';
    }else{
	     $gopay_url = 'https://gate.gopay.cz/';
    }

    $client_id      = '1852295819';
    $client_secret  = '64yvYMBy';
    $goid           = '8736259829';
    $auth_url      = $gopay_url.'api/oauth2/token';
    $data = array(
                'grant_type' => 'client_credentials',
                'scope'      => 'payment-create'
    );


    $curl = curl_init($auth_url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, 'grant_type=client_credentials&scope=payment-create');
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, $client_id.':'.$client_secret);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

    $json_response = curl_exec($curl);
    curl_close($curl);

    $response = json_decode($json_response);


    $client_credentials = $response->access_token;

	$returnedPaymentId = $_GET['id'];

    $payment_url = $gopay_url.'api/payments/payment/'.$returnedPaymentId;

    $curl = curl_init();
      
    curl_setopt($curl, CURLOPT_URL, $payment_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $client_credentials));
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_HTTPGET, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      
    $json_response = curl_exec($curl);
    curl_close($curl);
    // gopay_inline_save_log('Response json response: '.$json_response);

    $status = json_decode( $json_response );

  	// echo 'x'.$json_response;

    if( !empty( $status->state ) ){
    
        // gopay_inline_save_log('Response state: '.$status->state);
    	// echo $status->state;
        if( $status->state == 'CREATED' ){


          
        }
        elseif($status->state == 'PAID'){
        	// header("HTTP/1.1 200"); OK
		edit_content_attribute('orders', str_replace('/', '', $_GET['page']), 'payment_state', 'paid');
                       
        }
        elseif($status->state == 'CANCELED'){

 		edit_content_attribute('orders', str_replace('/', '', $_GET['page']), 'payment_state', 'canceled');

        }
        elseif($status->state == 'TIMEOUTED'){
                 
        }
        elseif($status->state == 'REFUNDED'){
                 
        }elseif( $status->state == 'PAYMENT_METHOD_CHOSEN' ){
                 
        }
        elseif( $status->state == 'AUTHORIZED' ){
            //Todo
        } else {
                // $order->update_status('failed',$returnedPaymentId);
                // gopay_inline_save_log('Selhalo ověření stavu');
                // header("HTTP/1.1 200 Internal Server Error");
                // exit(0);
        }

    }else{
        // die('Chyba v autorizaci');
        // gopay_inline_save_log('Selhalo ověření stavu');
        // header("HTTP/1.1 200 Internal Server Error");
        // exit(0);
        
    }
    if( !empty( $url_args ) ){
        // $location = add_query_arg( $url_args, $location );         
        // header( "Location: " . $location );
        // die();
    }
    header('location:?ok='.$status->state.'');
    die();
    // gopay_inline_save_log( 'Redirect location: '.$location );

    // exit;
        






