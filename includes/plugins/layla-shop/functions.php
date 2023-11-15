<?php

global $settings;

// CUSTOMIZE MENU

// $tomenu_count = count($tomenu);

// $tomenu = array();
$tomenu['name'] = '{{Shop}}';
$tomenu['page'] = 'layla-shop';
$tomenu['post_type'] = 'orders';
$tomenu['url'] = '?page=layla-shop&post_type=orders';
$tomenu['icon'] = 'shopping_basket';

$tomenu[0]['name'] = '{{Orders}}';
$tomenu[0]['page'] = 'orders';
$tomenu[0]['post_type'] = 'orders';
$tomenu[0]['url'] = '?page=layla-shop&post_type=orders';
$tomenu[0]['icon'] = 'event_note';


$tomenu[1]['name'] = '{{Products}}';
$tomenu[1]['page'] = 'products';
$tomenu[1]['post_type'] = 'products';
$tomenu[1]['url'] = '?page=layla-shop&post_type=products';
$tomenu[1]['icon'] = 'loyalty';

$tomenu[2]['name'] = '{{Discounts}}';
$tomenu[2]['page'] = 'discounts';
$tomenu[2]['post_type'] = 'discounts';
$tomenu[2]['url'] = '?page=layla-shop&post_type=discounts';
$tomenu[2]['icon'] = 'wallet_giftcard';

array_push($addtomenu, $tomenu);
$addtomenu_admin[] = $tomenu;
unset($tomenu);


$currencies = array(
			'AED' => 'United Arab Emirates dirham',
			'AFN' => 'Afghan afghani',
			'ALL' => 'Albanian lek',
			'AMD' => 'Armenian dram',
			'ANG' => 'Netherlands Antillean guilder',
			'AOA' => 'Angolan kwanza',
			'ARS' => 'Argentine peso',
			'AUD' => 'Australian dollar',
			'AWG' => 'Aruban florin',
			'AZN' => 'Azerbaijani manat',
			'BAM' => 'Bosnia and Herzegovina convertible mark',
			'BBD' => 'Barbadian dollar',
			'BDT' => 'Bangladeshi taka',
			'BGN' => 'Bulgarian lev',
			'BHD' => 'Bahraini dinar',
			'BIF' => 'Burundian franc',
			'BMD' => 'Bermudian dollar',
			'BND' => 'Brunei dollar',
			'BOB' => 'Bolivian boliviano',
			'BRL' => 'Brazilian real',
			'BSD' => 'Bahamian dollar',
			'BTC' => 'Bitcoin',
			'BTN' => 'Bhutanese ngultrum',
			'BWP' => 'Botswana pula',
			'BYR' => 'Belarusian ruble (old)',
			'BYN' => 'Belarusian ruble',
			'BZD' => 'Belize dollar',
			'CAD' => 'Canadian dollar',
			'CDF' => 'Congolese franc',
			'CHF' => 'Swiss franc',
			'CLP' => 'Chilean peso',
			'CNY' => 'Chinese yuan',
			'COP' => 'Colombian peso',
			'CRC' => 'Costa Rican col&oacute;n',
			'CUC' => 'Cuban convertible peso',
			'CUP' => 'Cuban peso',
			'CVE' => 'Cape Verdean escudo',
			'CZK' => 'Czech koruna',
			'DJF' => 'Djiboutian franc',
			'DKK' => 'Danish krone',
			'DOP' => 'Dominican peso',
			'DZD' => 'Algerian dinar',
			'EGP' => 'Egyptian pound',
			'ERN' => 'Eritrean nakfa',
			'ETB' => 'Ethiopian birr',
			'EUR' => 'Euro',
			'FJD' => 'Fijian dollar',
			'FKP' => 'Falkland Islands pound',
			'GBP' => 'Pound sterling',
			'GEL' => 'Georgian lari',
			'GGP' => 'Guernsey pound',
			'GHS' => 'Ghana cedi',
			'GIP' => 'Gibraltar pound',
			'GMD' => 'Gambian dalasi',
			'GNF' => 'Guinean franc',
			'GTQ' => 'Guatemalan quetzal',
			'GYD' => 'Guyanese dollar',
			'HKD' => 'Hong Kong dollar',
			'HNL' => 'Honduran lempira',
			'HRK' => 'Croatian kuna',
			'HTG' => 'Haitian gourde',
			'HUF' => 'Hungarian forint',
			'IDR' => 'Indonesian rupiah',
			'ILS' => 'Israeli new shekel',
			'IMP' => 'Manx pound',
			'INR' => 'Indian rupee',
			'IQD' => 'Iraqi dinar',
			'IRR' => 'Iranian rial',
			'IRT' => 'Iranian toman',
			'ISK' => 'Icelandic kr&oacute;na',
			'JEP' => 'Jersey pound',
			'JMD' => 'Jamaican dollar',
			'JOD' => 'Jordanian dinar',
			'JPY' => 'Japanese yen',
			'KES' => 'Kenyan shilling',
			'KGS' => 'Kyrgyzstani som',
			'KHR' => 'Cambodian riel',
			'KMF' => 'Comorian franc',
			'KPW' => 'North Korean won',
			'KRW' => 'South Korean won',
			'KWD' => 'Kuwaiti dinar',
			'KYD' => 'Cayman Islands dollar',
			'KZT' => 'Kazakhstani tenge',
			'LAK' => 'Lao kip',
			'LBP' => 'Lebanese pound',
			'LKR' => 'Sri Lankan rupee',
			'LRD' => 'Liberian dollar',
			'LSL' => 'Lesotho loti',
			'LYD' => 'Libyan dinar',
			'MAD' => 'Moroccan dirham',
			'MDL' => 'Moldovan leu',
			'MGA' => 'Malagasy ariary',
			'MKD' => 'Macedonian denar',
			'MMK' => 'Burmese kyat',
			'MNT' => 'Mongolian t&ouml;gr&ouml;g',
			'MOP' => 'Macanese pataca',
			'MRO' => 'Mauritanian ouguiya',
			'MUR' => 'Mauritian rupee',
			'MVR' => 'Maldivian rufiyaa',
			'MWK' => 'Malawian kwacha',
			'MXN' => 'Mexican peso',
			'MYR' => 'Malaysian ringgit',
			'MZN' => 'Mozambican metical',
			'NAD' => 'Namibian dollar',
			'NGN' => 'Nigerian naira',
			'NIO' => 'Nicaraguan c&oacute;rdoba',
			'NOK' => 'Norwegian krone',
			'NPR' => 'Nepalese rupee',
			'NZD' => 'New Zealand dollar',
			'OMR' => 'Omani rial',
			'PAB' => 'Panamanian balboa',
			'PEN' => 'Peruvian nuevo sol',
			'PGK' => 'Papua New Guinean kina',
			'PHP' => 'Philippine peso',
			'PKR' => 'Pakistani rupee',
			'PLN' => 'Polish z&#x142;oty',
			'PRB' => 'Transnistrian ruble',
			'PYG' => 'Paraguayan guaran&iacute;',
			'QAR' => 'Qatari riyal',
			'RON' => 'Romanian leu',
			'RSD' => 'Serbian dinar',
			'RUB' => 'Russian ruble',
			'RWF' => 'Rwandan franc',
			'SAR' => 'Saudi riyal',
			'SBD' => 'Solomon Islands dollar',
			'SCR' => 'Seychellois rupee',
			'SDG' => 'Sudanese pound',
			'SEK' => 'Swedish krona',
			'SGD' => 'Singapore dollar',
			'SHP' => 'Saint Helena pound',
			'SLL' => 'Sierra Leonean leone',
			'SOS' => 'Somali shilling',
			'SRD' => 'Surinamese dollar',
			'SSP' => 'South Sudanese pound',
			'STD' => 'S&atilde;o Tom&eacute; and Pr&iacute;ncipe dobra',
			'SYP' => 'Syrian pound',
			'SZL' => 'Swazi lilangeni',
			'THB' => 'Thai baht',
			'TJS' => 'Tajikistani somoni',
			'TMT' => 'Turkmenistan manat',
			'TND' => 'Tunisian dinar',
			'TOP' => 'Tongan pa&#x2bb;anga',
			'TRY' => 'Turkish lira',
			'TTD' => 'Trinidad and Tobago dollar',
			'TWD' => 'New Taiwan dollar',
			'TZS' => 'Tanzanian shilling',
			'UAH' => 'Ukrainian hryvnia',
			'UGX' => 'Ugandan shilling',
			'USD' => 'United States dollar',
			'UYU' => 'Uruguayan peso',
			'UZS' => 'Uzbekistani som',
			'VEF' => 'Venezuelan bol&iacute;var',
			'VND' => 'Vietnamese &#x111;&#x1ed3;ng',
			'VUV' => 'Vanuatu vatu',
			'WST' => 'Samoan t&#x101;l&#x101;',
			'XAF' => 'Central African CFA franc',
			'XCD' => 'East Caribbean dollar',
			'XOF' => 'West African CFA franc',
			'XPF' => 'CFP franc',
			'YER' => 'Yemeni rial',
			'ZAR' => 'South African rand',
			'ZMW' => 'Zambian kwacha'
		);



	$currency_symbol = array(
		'AED' => '&#x62f;.&#x625;',
		'AFN' => '&#x60b;',
		'ALL' => 'L',
		'AMD' => 'AMD',
		'ANG' => '&fnof;',
		'AOA' => 'Kz',
		'ARS' => '&#36;',
		'AUD' => '&#36;',
		'AWG' => 'Afl.',
		'AZN' => 'AZN',
		'BAM' => 'KM',
		'BBD' => '&#36;',
		'BDT' => '&#2547;&nbsp;',
		'BGN' => '&#1083;&#1074;.',
		'BHD' => '.&#x62f;.&#x628;',
		'BIF' => 'Fr',
		'BMD' => '&#36;',
		'BND' => '&#36;',
		'BOB' => 'Bs.',
		'BRL' => '&#82;&#36;',
		'BSD' => '&#36;',
		'BTC' => '&#3647;',
		'BTN' => 'Nu.',
		'BWP' => 'P',
		'BYR' => 'Br',
		'BYN' => 'Br',
		'BZD' => '&#36;',
		'CAD' => '&#36;',
		'CDF' => 'Fr',
		'CHF' => '&#67;&#72;&#70;',
		'CLP' => '&#36;',
		'CNY' => '&yen;',
		'COP' => '&#36;',
		'CRC' => '&#x20a1;',
		'CUC' => '&#36;',
		'CUP' => '&#36;',
		'CVE' => '&#36;',
		'CZK' => '&#75;&#269;',
		'DJF' => 'Fr',
		'DKK' => 'DKK',
		'DOP' => 'RD&#36;',
		'DZD' => '&#x62f;.&#x62c;',
		'EGP' => 'EGP',
		'ERN' => 'Nfk',
		'ETB' => 'Br',
		'EUR' => '&euro;',
		'FJD' => '&#36;',
		'FKP' => '&pound;',
		'GBP' => '&pound;',
		'GEL' => '&#x10da;',
		'GGP' => '&pound;',
		'GHS' => '&#x20b5;',
		'GIP' => '&pound;',
		'GMD' => 'D',
		'GNF' => 'Fr',
		'GTQ' => 'Q',
		'GYD' => '&#36;',
		'HKD' => '&#36;',
		'HNL' => 'L',
		'HRK' => 'Kn',
		'HTG' => 'G',
		'HUF' => '&#70;&#116;',
		'IDR' => 'Rp',
		'ILS' => '&#8362;',
		'IMP' => '&pound;',
		'INR' => '&#8377;',
		'IQD' => '&#x639;.&#x62f;',
		'IRR' => '&#xfdfc;',
		'IRT' => '&#x062A;&#x0648;&#x0645;&#x0627;&#x0646;',
		'ISK' => 'kr.',
		'JEP' => '&pound;',
		'JMD' => '&#36;',
		'JOD' => '&#x62f;.&#x627;',
		'JPY' => '&yen;',
		'KES' => 'KSh',
		'KGS' => '&#x441;&#x43e;&#x43c;',
		'KHR' => '&#x17db;',
		'KMF' => 'Fr',
		'KPW' => '&#x20a9;',
		'KRW' => '&#8361;',
		'KWD' => '&#x62f;.&#x643;',
		'KYD' => '&#36;',
		'KZT' => 'KZT',
		'LAK' => '&#8365;',
		'LBP' => '&#x644;.&#x644;',
		'LKR' => '&#xdbb;&#xdd4;',
		'LRD' => '&#36;',
		'LSL' => 'L',
		'LYD' => '&#x644;.&#x62f;',
		'MAD' => '&#x62f;.&#x645;.',
		'MDL' => 'MDL',
		'MGA' => 'Ar',
		'MKD' => '&#x434;&#x435;&#x43d;',
		'MMK' => 'Ks',
		'MNT' => '&#x20ae;',
		'MOP' => 'P',
		'MRO' => 'UM',
		'MUR' => '&#x20a8;',
		'MVR' => '.&#x783;',
		'MWK' => 'MK',
		'MXN' => '&#36;',
		'MYR' => '&#82;&#77;',
		'MZN' => 'MT',
		'NAD' => '&#36;',
		'NGN' => '&#8358;',
		'NIO' => 'C&#36;',
		'NOK' => '&#107;&#114;',
		'NPR' => '&#8360;',
		'NZD' => '&#36;',
		'OMR' => '&#x631;.&#x639;.',
		'PAB' => 'B/.',
		'PEN' => 'S/.',
		'PGK' => 'K',
		'PHP' => '&#8369;',
		'PKR' => '&#8360;',
		'PLN' => '&#122;&#322;',
		'PRB' => '&#x440;.',
		'PYG' => '&#8370;',
		'QAR' => '&#x631;.&#x642;',
		'RMB' => '&yen;',
		'RON' => 'lei',
		'RSD' => '&#x434;&#x438;&#x43d;.',
		'RUB' => '&#8381;',
		'RWF' => 'Fr',
		'SAR' => '&#x631;.&#x633;',
		'SBD' => '&#36;',
		'SCR' => '&#x20a8;',
		'SDG' => '&#x62c;.&#x633;.',
		'SEK' => '&#107;&#114;',
		'SGD' => '&#36;',
		'SHP' => '&pound;',
		'SLL' => 'Le',
		'SOS' => 'Sh',
		'SRD' => '&#36;',
		'SSP' => '&pound;',
		'STD' => 'Db',
		'SYP' => '&#x644;.&#x633;',
		'SZL' => 'L',
		'THB' => '&#3647;',
		'TJS' => '&#x405;&#x41c;',
		'TMT' => 'm',
		'TND' => '&#x62f;.&#x62a;',
		'TOP' => 'T&#36;',
		'TRY' => '&#8378;',
		'TTD' => '&#36;',
		'TWD' => '&#78;&#84;&#36;',
		'TZS' => 'Sh',
		'UAH' => '&#8372;',
		'UGX' => 'UGX',
		'USD' => '&#36;',
		'UYU' => '&#36;',
		'UZS' => 'UZS',
		'VEF' => 'Bs F',
		'VND' => '&#8363;',
		'VUV' => 'Vt',
		'WST' => 'T',
		'XAF' => 'CFA',
		'XCD' => '&#36;',
		'XOF' => 'CFA',
		'XPF' => 'Fr',
		'YER' => '&#xfdfc;',
		'ZAR' => '&#82;',
		'ZMW' => 'ZK',
	);



// CUSTOMIZE EDIT POST AREA

// PRODUCTS

$postarea['discounts'][0]['title'] = '{{Amount}}';
$postarea['discounts'][0]['name'] = 'discount-amount';
$postarea['discounts'][0]['type'] = 'input-text';
$postarea['discounts'][0]['show-menu'] = true;
$postarea['discounts'][0]['prefix'] = '';
$postarea['discounts'][0]['suffix'] = '';
$postarea['discounts'][0]['col'] = '2';

$postarea['discounts'][1]['title'] = '{{Expiry date}}';
$postarea['discounts'][1]['name'] = 'expiry-date';
$postarea['discounts'][1]['class'] = 'date';
$postarea['discounts'][1]['type'] = 'input-text';
$postarea['discounts'][1]['show-menu'] = true;
$postarea['discounts'][1]['prefix'] = '';
$postarea['discounts'][1]['suffix'] = '';
$postarea['discounts'][1]['col'] = '2';


$postarea['products'][0]['title'] = '{{Price}}';
$postarea['products'][0]['name'] = 'price';
$postarea['products'][0]['type'] = 'input-text';
$postarea['products'][0]['show-menu'] = true;
$postarea['products'][0]['prefix'] = '';
$postarea['products'][0]['suffix'] = ' '.$currency_symbol[get_settings('currency')];
$postarea['products'][0]['col'] = '2';

$postarea['products'][1]['title'] = '{{SKU}}';
$postarea['products'][1]['name'] = 'sku';
$postarea['products'][1]['type'] = 'input-text';
$postarea['products'][1]['show-menu'] = true;
$postarea['products'][1]['prefix'] = '';
$postarea['products'][1]['suffix'] = '';
$postarea['products'][1]['col'] = '2';


// ORDERS

$postarea['orders'][2]['title'] = '{{Order state}}';
$postarea['orders'][2]['name'] 	= 'state';
$postarea['orders'][2]['type'] 	= 'input-select';

$email_complete_subject 		= "{{Order ##orderid# is complete}}";
$email_complete 				= "{{Hello #firstname# #lastname#, your order was sucessfully completed.<br/><br/>#payment_type#<br/><br/> Check your order details:<br/><br/> #orderdetails#<br/><br/> You can check order status on your order online at this link:<br/> #orderlink# <br/><br/>Cheers, }}";

$email_processing_subject 		= "{{Order ##orderid# is processing}}";
$email_processing 				= "{{Hello #firstname# #lastname#, your order is processing.<br/><br/>#payment_type#<br/><br/> Check your order details:<br/><br/> #orderdetails#<br/><br/> You can check order status on your order online at this link:<br/> #orderlink# <br/><br/>Cheers, }}";

$email_canceled_subject 		= "{{Order ##orderid# is canceled}}";
$email_canceled 				= "{{Hello #firstname# #lastname#, your order was canceled.<br/><br/>#payment_type#<br/><br/> Check your order details:<br/><br/> #orderdetails#<br/><br/> You can check order status on your order online at this link:<br/> #orderlink# <br/><br/>Cheers, }}";

$postarea['orders'][2]['values'][] = array('title'=>'{{Completed}}', 	'name'=>'completed', 			'description'=>'{{Order complete}}', 			'email_template'=>$email_complete, 	'email_template_subject'=>$email_complete_subject);
$postarea['orders'][2]['values'][] = array('title'=>'{{Processing}}', 	'name'=>'processing', 			'description'=>'{{Order is in processing}}', 	'email_template'=>$email_processing, 	'email_template_subject'=>$email_processing_subject);
$postarea['orders'][2]['values'][] = array('title'=>'{{Canceled}}', 	'name'=>'canceled', 			'description'=>'{{Order was canceled}}', 		'email_template'=>$email_canceled, 	'email_template_subject'=>$email_canceled_subject);


$postarea['orders'][2]['show-menu'] = true;
$postarea['orders'][2]['prefix'] = '';
$postarea['orders'][2]['suffix'] = '';
$postarea['orders'][2]['col'] = '2';

$postarea['orders'][3]['title'] = '{{Payment type}}';
$postarea['orders'][3]['name'] = 'payment_type';
$postarea['orders'][3]['type'] = 'input-select';

$email_payment_type_cash = "{{You choosed payment method}}: {{Cash}}<br/><br/>{{You will pay cash on the market.}}";
$email_payment_type_cod  = "{{You choosed payment method}}: {{COD}}<br/><br/>{{You will pay on delivery.}}";
$email_payment_type_bacs = "{{You choosed payment method}}: {{Bank account}}<br/><br/>{{Please do payment through your bank account. There is a payment details:}} ".get_settings('bank-account')." {{ID number:}} #orderid#";



$postarea['orders'][3]['values'][] = array('title'=>'{{Cash}}', 		'name'=>'cash', 			'description'=>'{{Cash on the Market}}', 	'email_template'=>$email_payment_type_cash);
$postarea['orders'][3]['values'][] = array('title'=>'{{COD}}', 			'name'=>'cod', 				'description'=>'{{Pay on delivery}}', 		'email_template'=>$email_payment_type_cod);
$postarea['orders'][3]['values'][] = array('title'=>'{{Bank account}}', 'name'=>'bank-account', 	'description'=>'{{Pay on Bank account}}', 	'email_template'=>$email_payment_type_bacs);


// $postarea['orders'][4]['title'] = '{{Shipping type}}';
// $postarea['orders'][4]['name'] = 'shipping_type';
// $postarea['orders'][4]['type'] = 'input-select';

// $postarea['orders'][4]['values'][] = array('title'=>'{{Česká pošta}}', 		'name'=>'cpost', 		'description'=>'{{Česká pošta}}');
// $postarea['orders'][4]['values'][] = array('title'=>'{{DPD}}', 			'name'=>'dpd', 			'description'=>'{{DPD}}');




$camp = array();
$camp_unique = array();
$next2 = -1;
//--- get all the directories
$dirname = ROOT_ABSOLUTE_PATH.'/includes/plugins/layla-shop-gateway-*';
$findme  = "*index.php";
$dirs    = glob($dirname.'*', GLOB_ONLYDIR);
$files   = array();

foreach ($dirs as $key => $value) {

	$css_read = file_get_contents($value.'/index.php');
	preg_match('/Plugin name: (.*) /', $css_read, $matches, PREG_OFFSET_CAPTURE, 0);
	preg_match('/Plugin description: (.*) /', $css_read, $matches_desc, PREG_OFFSET_CAPTURE, 0);
	preg_match('/Payment description: (.*) /', $css_read, $matches_desc2, PREG_OFFSET_CAPTURE, 0);
	// preg_match('/Author: (.*) /', $css_read, $matches2, PREG_OFFSET_CAPTURE, 0);
	// preg_match('/Plugin category: (.*) /', $css_read, $matches3, PREG_OFFSET_CAPTURE, 0);



	$plugin_name = $matches[1][0];
	$plugin_description = $matches_desc[1][0];
	$payment_description = $matches_desc2[1][0];
	// $plugin_author = $matches2[1][0];
	// $plugin_category = $matches3[1][0];
	// $basename = basename($value);

	$email_payment_type_custom = "{{You choosed payment method}}: {{Bank account}}<br/><br/>{{Please do payment through your bank account. There is a payment details:}}";

	$postarea['orders'][3]['values'][] = array('title'=>$plugin_name, 'name'=>strtolower(slugify($plugin_name)), 'description'=> '{{Payment through}} '.slugify($plugin_name).'', 'email_template' => $payment_description);

}




$postarea['orders'][3]['show-menu'] = true;
$postarea['orders'][3]['prefix'] = '';
$postarea['orders'][3]['suffix'] = '';
$postarea['orders'][3]['col'] = '2';

$postarea['orders'][4]['title'] = '{{Payment state}}';
$postarea['orders'][4]['name'] = 'payment_state';
$postarea['orders'][4]['type'] = 'input-select';

$postarea['orders'][4]['values'][] = array('title'=>'{{Waiting for payment}}', 		'name'=>'waiting-for-payment');
$postarea['orders'][4]['values'][] = array('title'=>'{{Paid}}', 					'name'=>'paid');
$postarea['orders'][4]['values'][] = array('title'=>'{{Canceled}}', 				'name'=>'canceled');


$postarea['orders'][4]['show-menu'] = true;
$postarea['orders'][4]['prefix'] = '';
$postarea['orders'][4]['suffix'] = '';
$postarea['orders'][4]['col'] = '2';

$postarea['orders'][5]['shipping']['title'] = '{{First name}}';
$postarea['orders'][5]['shipping']['name'] = 'shipping-first-name';
$postarea['orders'][5]['shipping']['type'] = 'input-text';
$postarea['orders'][5]['shipping']['required'] = true;
$postarea['orders'][5]['shipping']['show-menu'] = true;
$postarea['orders'][5]['shipping']['prefix'] = '';
$postarea['orders'][5]['shipping']['suffix'] = '';
$postarea['orders'][5]['shipping']['col'] = '2';

$postarea['orders'][6]['shipping']['title'] = '{{Last name}}';
$postarea['orders'][6]['shipping']['name'] = 'shipping-last-name';
$postarea['orders'][6]['shipping']['type'] = 'input-text';
$postarea['orders'][6]['shipping']['required'] = true;
$postarea['orders'][6]['shipping']['show-menu'] = true;
$postarea['orders'][6]['shipping']['prefix'] = '';
$postarea['orders'][6]['shipping']['suffix'] = '';
$postarea['orders'][6]['shipping']['col'] = '2';

$postarea['orders'][7]['shipping']['title'] = '{{Company name}}';
$postarea['orders'][7]['shipping']['name'] = 'shipping-company';
$postarea['orders'][7]['shipping']['type'] = 'input-text';
$postarea['orders'][7]['shipping']['show-menu'] = true;
$postarea['orders'][7]['shipping']['prefix'] = '';
$postarea['orders'][7]['shipping']['suffix'] = '';
$postarea['orders'][7]['shipping']['col'] = '2';

$postarea['orders'][8]['shipping']['title'] = '{{Company ID}}';
$postarea['orders'][8]['shipping']['name'] = 'shipping-company-id';
$postarea['orders'][8]['shipping']['type'] = 'input-text';
$postarea['orders'][8]['shipping']['show-menu'] = true;
$postarea['orders'][8]['shipping']['prefix'] = '';
$postarea['orders'][8]['shipping']['suffix'] = '';
$postarea['orders'][8]['shipping']['col'] = '2';

$postarea['orders'][9]['shipping']['title'] = '{{Address}}';
$postarea['orders'][9]['shipping']['name'] = 'shipping-address';
$postarea['orders'][9]['shipping']['type'] = 'input-text';
$postarea['orders'][9]['shipping']['required'] = true;
$postarea['orders'][9]['shipping']['show-menu'] = true;
$postarea['orders'][9]['shipping']['prefix'] = '';
$postarea['orders'][9]['shipping']['suffix'] = '';
$postarea['orders'][9]['shipping']['col'] = '2';

$postarea['orders'][10]['shipping']['title'] = '{{City}}';
$postarea['orders'][10]['shipping']['name'] = 'shipping-city';
$postarea['orders'][10]['shipping']['type'] = 'input-text';
$postarea['orders'][10]['shipping']['required'] = true;
$postarea['orders'][10]['shipping']['show-menu'] = true;
$postarea['orders'][10]['shipping']['prefix'] = '';
$postarea['orders'][10]['shipping']['suffix'] = '';
$postarea['orders'][10]['shipping']['col'] = '2';

$postarea['orders'][11]['shipping']['title'] = '{{Country}}';
$postarea['orders'][11]['shipping']['name'] = 'shipping-state';
$postarea['orders'][11]['shipping']['type'] = 'input-select';

$postarea['orders'][11]['shipping']['values'][] = array('title'=>'Česká republika', 	'name'=>'CZ');
$postarea['orders'][11]['shipping']['values'][] = array('title'=>'Slovensko', 			'name'=>'SK');

$postarea['orders'][11]['shipping']['required'] = true;
$postarea['orders'][11]['shipping']['show-menu'] = true;
$postarea['orders'][11]['shipping']['prefix'] = '';
$postarea['orders'][11]['shipping']['suffix'] = '';
$postarea['orders'][11]['shipping']['col'] = '2';

$postarea['orders'][12]['shipping']['title'] = '{{Zip code}}';
$postarea['orders'][12]['shipping']['name'] = 'shipping-zip';
$postarea['orders'][12]['shipping']['type'] = 'input-text';
$postarea['orders'][12]['shipping']['required'] = true;
$postarea['orders'][12]['shipping']['show-menu'] = true;
$postarea['orders'][12]['shipping']['prefix'] = '';
$postarea['orders'][12]['shipping']['suffix'] = '';
$postarea['orders'][12]['shipping']['col'] = '2'; 

$postarea['orders'][13]['shipping']['title'] = '{{Email}}';
$postarea['orders'][13]['shipping']['name'] = 'shipping-email';
$postarea['orders'][13]['shipping']['type'] = 'input-text';
$postarea['orders'][13]['shipping']['required'] = true;
$postarea['orders'][13]['shipping']['show-menu'] = true;
$postarea['orders'][13]['shipping']['prefix'] = '';
$postarea['orders'][13]['shipping']['suffix'] = '';
$postarea['orders'][13]['shipping']['col'] = '2';

$postarea['orders'][14]['shipping']['title'] = '{{Phone}}';
$postarea['orders'][14]['shipping']['name'] = 'shipping-phone';
$postarea['orders'][14]['shipping']['type'] = 'input-text';
$postarea['orders'][14]['shipping']['required'] = true;
$postarea['orders'][14]['shipping']['show-menu'] = true;
$postarea['orders'][14]['shipping']['prefix'] = '';
$postarea['orders'][14]['shipping']['suffix'] = '';
$postarea['orders'][14]['shipping']['col'] = '2';


$postarea['orders'][15]['shipping']['title'] = '{{Note}}';
$postarea['orders'][15]['shipping']['name'] = 'shipping-order-note';
$postarea['orders'][15]['shipping']['type'] = 'input-textarea';
$postarea['orders'][15]['shipping']['required'] = false;
$postarea['orders'][15]['shipping']['show-menu'] = false;
$postarea['orders'][15]['shipping']['prefix'] = '';
$postarea['orders'][15]['shipping']['suffix'] = '';
$postarea['orders'][15]['shipping']['col'] = '2';






$postarea['orders'][16]['billing']['title'] = '{{First name}}';
$postarea['orders'][16]['billing']['name'] = 'billing-first-name';
$postarea['orders'][16]['billing']['type'] = 'input-text';
$postarea['orders'][16]['billing']['required'] = true;
$postarea['orders'][16]['billing']['show-menu'] = true;
$postarea['orders'][16]['billing']['prefix'] = '';
$postarea['orders'][16]['billing']['suffix'] = '';
$postarea['orders'][16]['billing']['col'] = '2';

$postarea['orders'][17]['billing']['title'] = '{{Last name}}';
$postarea['orders'][17]['billing']['name'] = 'billing-last-name';
$postarea['orders'][17]['billing']['type'] = 'input-text';
$postarea['orders'][17]['billing']['required'] = true;
$postarea['orders'][17]['billing']['show-menu'] = true;
$postarea['orders'][17]['billing']['prefix'] = '';
$postarea['orders'][17]['billing']['suffix'] = '';
$postarea['orders'][17]['billing']['col'] = '2';

$postarea['orders'][18]['billing']['title'] = '{{Company name}}';
$postarea['orders'][18]['billing']['name'] = 'billing-company';
$postarea['orders'][18]['billing']['type'] = 'input-text';
$postarea['orders'][18]['billing']['show-menu'] = true;
$postarea['orders'][18]['billing']['prefix'] = '';
$postarea['orders'][18]['billing']['suffix'] = '';
$postarea['orders'][18]['billing']['col'] = '2';

$postarea['orders'][19]['billing']['title'] = '{{Company ID}}';
$postarea['orders'][19]['billing']['name'] = 'billing-company-id';
$postarea['orders'][19]['billing']['type'] = 'input-text';
$postarea['orders'][19]['billing']['show-menu'] = true;
$postarea['orders'][19]['billing']['prefix'] = '';
$postarea['orders'][19]['billing']['suffix'] = '';
$postarea['orders'][19]['billing']['col'] = '2';

$postarea['orders'][20]['billing']['title'] = '{{Address}}';
$postarea['orders'][20]['billing']['name'] = 'billing-address';
$postarea['orders'][20]['billing']['type'] = 'input-text';
$postarea['orders'][20]['billing']['required'] = true;
$postarea['orders'][20]['billing']['show-menu'] = true;
$postarea['orders'][20]['billing']['prefix'] = '';
$postarea['orders'][20]['billing']['suffix'] = '';
$postarea['orders'][20]['billing']['col'] = '2';

$postarea['orders'][21]['billing']['title'] = '{{City}}';
$postarea['orders'][21]['billing']['name'] = 'billing-city';
$postarea['orders'][21]['billing']['type'] = 'input-text';
$postarea['orders'][21]['billing']['required'] = true;
$postarea['orders'][21]['billing']['show-menu'] = true;
$postarea['orders'][21]['billing']['prefix'] = '';
$postarea['orders'][21]['billing']['suffix'] = '';
$postarea['orders'][21]['billing']['col'] = '2';

$postarea['orders'][22]['billing']['title'] = '{{Country}}';
$postarea['orders'][22]['billing']['name'] = 'billing-state';
$postarea['orders'][22]['billing']['type'] = 'input-select';
$postarea['orders'][22]['billing']['values'][] = array('title'=>'Česká republika', 	'name'=>'CZ');
$postarea['orders'][22]['billing']['values'][] = array('title'=>'Slovensko', 			'name'=>'SK');


$postarea['orders'][22]['billing']['required'] = true;
$postarea['orders'][22]['billing']['show-menu'] = true;
$postarea['orders'][22]['billing']['prefix'] = '';
$postarea['orders'][22]['billing']['suffix'] = '';
$postarea['orders'][22]['billing']['col'] = '2';

$postarea['orders'][23]['billing']['title'] = '{{Zip code}}';
$postarea['orders'][23]['billing']['name'] = 'billing-zip';
$postarea['orders'][23]['billing']['type'] = 'input-text';
$postarea['orders'][23]['billing']['required'] = true;
$postarea['orders'][23]['billing']['show-menu'] = true;
$postarea['orders'][23]['billing']['prefix'] = '';
$postarea['orders'][23]['billing']['suffix'] = '';
$postarea['orders'][23]['billing']['col'] = '2'; 

$postarea['orders'][24]['billing']['title'] = '{{Email}}';
$postarea['orders'][24]['billing']['name'] = 'billing-email';
$postarea['orders'][24]['billing']['type'] = 'input-text';
$postarea['orders'][24]['billing']['required'] = true;
$postarea['orders'][24]['billing']['show-menu'] = true;
$postarea['orders'][24]['billing']['prefix'] = '';
$postarea['orders'][24]['billing']['suffix'] = '';
$postarea['orders'][24]['billing']['col'] = '2';

$postarea['orders'][25]['billing']['title'] = '{{Phone}}';
$postarea['orders'][25]['billing']['name'] = 'billing-phone';
$postarea['orders'][25]['billing']['type'] = 'input-text';
$postarea['orders'][25]['billing']['required'] = true;
$postarea['orders'][25]['billing']['show-menu'] = true;
$postarea['orders'][25]['billing']['prefix'] = '';
$postarea['orders'][25]['billing']['suffix'] = '';
$postarea['orders'][25]['billing']['col'] = '2';


$postarea['orders'][26]['billing']['title'] = '{{Note}}';
$postarea['orders'][26]['billing']['name'] = 'billing-order-note';
$postarea['orders'][26]['billing']['type'] = 'input-textarea';
$postarea['orders'][26]['billing']['required'] = false;
$postarea['orders'][26]['billing']['show-menu'] = false;
$postarea['orders'][26]['billing']['prefix'] = '';
$postarea['orders'][26]['billing']['suffix'] = '';
$postarea['orders'][26]['billing']['col'] = '2';


$postarea['orders'][27]['title'] = '{{Summary price}}';
$postarea['orders'][27]['name'] = 'price';
$postarea['orders'][27]['type'] = 'input-text';
$postarea['orders'][27]['required'] = true;
$postarea['orders'][27]['show-menu'] = true;
$postarea['orders'][27]['prefix'] = '';
$postarea['orders'][27]['suffix'] = '';
$postarea['orders'][27]['col'] = '2';

$postarea['orders'][28]['title'] = '{{Cart}}';
$postarea['orders'][28]['name'] = 'cart';
$postarea['orders'][28]['type'] = 'output-json-base64';
$postarea['orders'][28]['function'] = 'get_cart_contents';
$postarea['orders'][28]['required'] = false;
$postarea['orders'][28]['show-menu'] = false;
$postarea['orders'][28]['prefix'] = '';
$postarea['orders'][28]['suffix'] = '';
$postarea['orders'][28]['col'] = '6';

$postarea['orders'][29]['title'] = '{{ID}}';
$postarea['orders'][29]['name'] = 'id';
$postarea['orders'][29]['type'] = 'input-text';
$postarea['orders'][29]['required'] = false;
$postarea['orders'][29]['show-menu'] = false;
$postarea['orders'][29]['prefix'] = '';
$postarea['orders'][29]['suffix'] = '';
$postarea['orders'][29]['col'] = '2';

$postarea['orders'][30]['title'] = '{{Shipping Tracking ID}}';
$postarea['orders'][30]['name'] = 'tracking-id';
$postarea['orders'][30]['type'] = 'input-text';
$postarea['orders'][30]['required'] = false;
$postarea['orders'][30]['show-menu'] = false;
$postarea['orders'][30]['prefix'] = '';
$postarea['orders'][30]['suffix'] = '';
$postarea['orders'][30]['col'] = '2';

$postarea['orders'][31]['title'] = '{{Send e-mail}}';
$postarea['orders'][31]['name'] = 'send-email';
$postarea['orders'][31]['type'] = 'input-checkbox';
$postarea['orders'][31]['required'] = false;
$postarea['orders'][31]['show-menu'] = false;
$postarea['orders'][31]['prefix'] = '';
$postarea['orders'][31]['suffix'] = '';
$postarea['orders'][31]['col'] = '2';


$addtopostarea = $postarea;




if(isset($_GET['discount-remove'])){
	unset($_SESSION['cart_items']['discount']);
}

if(isset($_GET['discount-coupon'])){
		$discounts = find_content(ROOT_ABSOLUTE_PATH.'data/discounts.csv', strtolower($_GET['discount-coupon']));
		if(isset($discounts) && !empty($_GET['discount-coupon'])){
			if(is_numeric($discounts['attributes']['discount-amount']) || strpos($discounts['attributes']['discount-amount'], '%')){
				$_SESSION['cart_items']['discount']['code']		= strtoupper($_GET['discount-coupon']);
				$_SESSION['cart_items']['discount']['value']	= $discounts['attributes']['discount-amount'];
				$_SESSION['cart_items']['discount']['expiry'] 	= $discounts['attributes']['expiry-date'];
			}
		}
		// $totalprice = $post;
		// print_r($discounts);
		// print_r($_SESSION['cart_items']);
		// die();
}

if (!isset($_SESSION['cart_items'])) {
    $_SESSION['cart_items'] = array();
}

// UPDATE ORDER

if( isset($_GET['state']) && $_GET['state'] == 'PAID' && isset($_GET['order_number']) ){
// if( isset($_GET['state']) && $_GET['state'] == 'PAID' ){

	// edit_content_attribute('orders', str_replace('/', '', $_GET['page']), 'payment_type', 'gopay');
	// edit_content_attribute('orders', str_replace('/', '', $_GET['page']), 'state', 'completed');
	header('location:?ok');

}


if(isset($_GET['add-to-cart'])){
	// unset($_SESSION['cart_items']);
	// $_SESSION['cart_items'] = rand(1,100);
	// $_SESSION['cart_items'] = array_push($_SESSION['cart_items']);
	
	$check_product_exists = searchForColumn($_GET['add-to-cart'], $_SESSION['cart_items'], 'product');

	if(isset($check_product_exists)){
		$_SESSION['cart_items'][$check_product_exists]['sku'] = $_SESSION['cart_items'][$check_product_exists]['sku']+1;
	
	}else{

		$_SESSION['cart_items'][]['product'] = $_GET['add-to-cart'];
		$_SESSION['cart_items'][array_search( $_GET['add-to-cart'], $_SESSION['cart_items'])]['sku'] = 1;
	}
	
	// $_SESSION['cart_items'] = recursive_array_replace('/', '', $_SESSION['cart_items']);

	// $_SESSION['cart_items'] = array_unique($_SESSION['cart_items']);
	$_SESSION['cart_items'] = array_filter($_SESSION['cart_items'], function($value) { return $value !== ''; });
	header('location:/nakupni-kosik/');
	die();
}

if(isset($_GET['remove-from-cart'])){

	$search_in_cart = searchForColumn($_GET['remove-from-cart'], $_SESSION['cart_items'], 'product');
	unset($_SESSION['cart_items'][$search_in_cart]);
	$_SESSION['cart_items'] = array_unique($_SESSION['cart_items']);
	$_SESSION['cart_items'] = array_filter($_SESSION['cart_items'], function($value) { return $value !== ''; });
}



if(isset($_GET['set-product-sku-cart']) && isset($_GET['sku'])){

	$search_in_cart = searchForColumn($_GET['set-product-sku-cart'], $_SESSION['cart_items'], 'product');
	//$_SESSION['cart_items'][array_search( $_GET['set-product-sku-cart'],
	$_SESSION['cart_items'][$search_in_cart]['sku'] = $_GET['sku'];
	if($_SESSION['cart_items'][$search_in_cart]['sku'] == 0){unset($_SESSION['cart_items'][$search_in_cart]);}



}

if(isset($_GET['remove-cart'])){

	unset($_SESSION['cart_items']);

}	


if(isset($_POST['shop-order-pay'])){

	// echo $search_payment_method = array_search($_POST['payment_method'], array_column($postarea['orders'][3]['values'], 'name'));

	// if($search_payment_method){

	// 	$payment_title  		= $postarea['orders'][3]['values'][$search_payment_method]['title'];
	// 	$payment_name 			= $postarea['orders'][3]['values'][$search_payment_method]['name'];
	// 	$payment_description 	= $postarea['orders'][3]['values'][$search_payment_method]['description'];

	// }else{

		// if(file_exists('./includes/plugins/layla-shop-gateway-'.$_POST['payment_method'].'/process.php')){

		// $payment_title  		= $_POST['payment_method'];
		// $payment_name 			= $_POST['payment_method'];
		// $payment_description 	= $_POST['payment_method'];

		// $payment_url = './includes/plugins/layla-shop-gateway-'.$_POST['payment_method'].'/process.php';

		// if(isset($payment_url)){ include $payment_url; die(); }
		// // }

	// }

}


if(!function_exists('external_order')){

function external_order($order = ''){
	global $totalprice;
	global $addtopostarea;
	global $postarea;
	global $email_processing;
	global $email_complete_subject_paymenttype;

	// if(empty($order)){
	// 	$orderarr = $_POST;
	// }else{
	// 	$orderarr = $order;	
	// }
	$orderarr = $order['orders'];

	if(!empty($order)){


	$search_payment_method = array_search($orderarr['payment_method'], array_column($postarea['orders'][3]['values'], 'name'));

	if($search_payment_method && !file_exists(ROOT_ABSOLUTE_PATH.'/includes/plugins/layla-shop-gateway-'.$orderarr['payment_method'].'/process.php')){

		$payment_title  		= $postarea['orders'][3]['values'][$search_payment_method]['title'];
		$payment_name 			= $postarea['orders'][3]['values'][$search_payment_method]['name'];
		$payment_description 	= $postarea['orders'][3]['values'][$search_payment_method]['description'];

		$redirect_url = '?order_complete=1&payment_name='.$payment_name.'';

	}else{
		
		if(file_exists(ROOT_ABSOLUTE_PATH.'/includes/plugins/layla-shop-gateway-'.$orderarr['payment_method'].'/process.php')){

		$payment_title  		= $orderarr['payment_method'];
		$payment_name 			= $orderarr['payment_method'];
		$payment_description 	= $orderarr['payment_method'];

		$payment_url = './includes/plugins/layla-shop-gateway-'.$orderarr['payment_method'].'/process.php';

		}

	}
	


	$post_type_csv = ROOT_ABSOLUTE_PATH.'/data/orders.csv';
	// echo '<pre>';
	// print_r($addtopostarea['orders']);
	// print_r($_SESSION['cart_items']);
	// $_SESSION['cart_items'] = array_unique($_SESSION['cart_items']);

	foreach ($_SESSION['cart_items'] as $key => $value) {

        if( !isset($value['product']) ){continue;}

		$post = find_content(ROOT_ABSOLUTE_PATH.'/data/products.csv', $value['product']);
		if(isset($value['sku'])){$sku = $value['sku'];}else{$sku = 1;}
		$totalprice = ($post['attributes']['price']*$sku)+$totalprice;
	}
	// print_r($_SESSION['cart_items']);
	if(isset($_SESSION['cart_items']['discount']['code'])){ $totalprice = $totalprice-$_SESSION['cart_items']['discount']['value']; } 



	// SHIPPING PRICE	
	$total_shipping = get_settings($payment_name.'-price');
	// die($total_shipping);
	$totalprice = $totalprice+$total_shipping;
	// GET DISCOUNT
	// die($payment_name);

	$orderarr['state'] = 'processing';
	$orderarr['payment_type'] = $payment_name;
	$orderarr['payment_state'] = 'Waiting for payment';
	$orderarr['price'] = $totalprice;



	$id 			= get_last_row_file("data/orders.csv")+1;
	$productName 	= '{{Order}} #'.get_settings('invoice-prefix').''.$id.'';
	$orderid 		= get_settings('invoice-prefix').''.$id.'';

	// PLUGIN POST AREAS TO ATTRIBUTES
	$attributes = '';
	$addtopostarea = $order;
	if(!empty($addtopostarea['orders'])){
		foreach ($addtopostarea['orders'] as $key => $value) {

				
                if($key == 'cart'){$orderarr['cart'] = $orderarr['cart'];}


				$attributes.= $key.':'.$value.',';
				unset($value);
				unset($key);
				// unset($orderarr);
		}
    }


	$attributes = base64_encode($attributes);

	$time = time();
	if(empty($orderarr['url'])){
		$slug = md5($time);
	}else{
		$slug = md5($time);
	}
	if($orderarr['post_language']){
		$orderarr['post_language'] = $orderarr['post_language'];
	}else{
		$orderarr['post_language'] = '';
	}



    $check_slug = @find_content(ROOT_ABSOLUTE_PATH.'/data/orders.csv', $slug);
    
    if(!empty($check_slug['slug'])){
    	$slug = $slug.'1';
    }

	$ordercontent="".$productName.";".$slug.";".time().";".$orderarr['post_language'].";;;;single-orders.php;;".$attributes.";\n";

	file_put_contents(ROOT_ABSOLUTE_PATH."/data/orders.csv", $ordercontent, FILE_APPEND | LOCK_EX);

	add_notifications('Nová objednávka #'.get_settings('invoice-prefix').''.$id.' od '.$order['orders']['shipping-first-name'].' '.$order['orders']['shipping-last-name'].'', '/admin/index.php?edit='.$id.'&post_type=orders&page=layla-shop');

	ob_start();
    include ROOT_ABSOLUTE_PATH."templates/".get_settings('default_template')."/emails/new-order.php";
    $email_template = ob_get_contents();
    ob_end_clean();

	$search_order_state = array_search('processing', array_column($postarea['orders'][2]['values'], 'name'));
	
	$email_processing 	= $postarea['orders'][2]['values'][$search_order_state]['email_template'];

	$email_subject 		= $postarea['orders'][2]['values'][$search_order_state]['email_template_subject'];

	$search_payment_type = array_search($payment_name, array_column($postarea['orders'][3]['values'], 'name'));
	$email_paymenttype = $postarea['orders'][3]['values'][$search_payment_type]['email_template'];

    $email_paymenttype = $email_paymenttype;
    
    $email_subject = localize_content($email_subject);
    $email_processing = localize_content($email_processing);
  
	$email_paymenttype = localize_content($email_paymenttype);
	$orderdetails_cart = localize_content(get_cart_contents($order['orders']['cart'], $slug));

    $email_template = $email_processing;

    $email_subject 	= str_replace('#orderid#', $orderid, $email_subject);
    $email_template = str_replace('#orderid#', $orderid, $email_template);

    $email_paymenttype = str_replace('#orderid#', $orderid, $email_paymenttype);
    $email_template = str_replace('#payment_type#', $email_paymenttype, $email_template);

    $email_template = str_replace('#firstname#', $order['orders']['shipping-first-name'], $email_template);
    $email_template = str_replace('#lastname#', $order['orders']['shipping-last-name'], $email_template);
    $email_template = str_replace('#orderlink#', 'http://'.$_SERVER['HTTP_HOST'].'/' .$slug, $email_template);
    $email_template = str_replace('#orderdetails#', $orderdetails_cart, $email_template);

	// send_email($orderarr['shipping-email'], $email_subject, $email_template, '', '');
	send_email(get_settings('siteemail'), 'Upozornění / '.$email_subject, $email_template, '', '');
	// if(isset($payment_url)){ include $payment_url; die(); }
	// if(isset($redirect_url)){header('location:/'.$slug.'/'); die(); }


	}

	header('location:/'.$slug.'/');
	die();
	
}}





if(!function_exists('do_order')){

function do_order($order = ''){
	global $totalprice;
	global $addtopostarea;
	global $postarea;
	global $email_processing;
	global $email_complete_subject_paymenttype;

	if(empty($order)){
		$orderarr = $_POST;
	}else{
		$orderarr = $order;	
	}


	if(empty($order)){

	if($orderarr['payment_method']){

	$search_payment_method = array_search($orderarr['payment_method'], array_column($postarea['orders'][3]['values'], 'name'));

	if($search_payment_method && !file_exists(ROOT_ABSOLUTE_PATH.'/includes/plugins/layla-shop-gateway-'.$orderarr['payment_method'].'/process.php')){

		$payment_title  		= $postarea['orders'][3]['values'][$search_payment_method]['title'];
		$payment_name 			= $postarea['orders'][3]['values'][$search_payment_method]['name'];
		$payment_description 	= $postarea['orders'][3]['values'][$search_payment_method]['description'];

		$redirect_url = '?order_complete=1&payment_name='.$payment_name.'';

	}else{
		
		if(file_exists(ROOT_ABSOLUTE_PATH.'/includes/plugins/layla-shop-gateway-'.$orderarr['payment_method'].'/process.php')){

		$payment_title  		= $orderarr['payment_method'];
		$payment_name 			= $orderarr['payment_method'];
		$payment_description 	= $orderarr['payment_method'];

		$payment_url = './includes/plugins/layla-shop-gateway-'.$orderarr['payment_method'].'/process.php';

		}

	}
	
	}

	$post_type_csv = ROOT_ABSOLUTE_PATH.'/data/orders.csv';
	// echo '<pre>';
	// print_r($addtopostarea['orders']);
	// print_r($_SESSION['cart_items']);
	// $_SESSION['cart_items'] = array_unique($_SESSION['cart_items']);

	foreach ($_SESSION['cart_items'] as $key => $value) {

        if( !isset($value['product']) ){continue;}

		$post = find_content(ROOT_ABSOLUTE_PATH.'/data/products.csv', $value['product']);
		if(isset($value['sku'])){$sku = $value['sku'];}else{$sku = 1;}
		$totalprice = ($post['attributes']['price']*$sku)+$totalprice;
	}
	// print_r($_SESSION['cart_items']);
	if(isset($_SESSION['cart_items']['discount']['code'])){ $totalprice = $totalprice-$_SESSION['cart_items']['discount']['value']; } 



	// SHIPPING PRICE	
	$total_shipping = get_settings($payment_name.'-price');
	// die($total_shipping);
	$totalprice = $totalprice+$total_shipping;
	// GET DISCOUNT
	// die($payment_name);

	$orderarr['state'] = 'processing';
	$orderarr['payment_type'] = $payment_name;
	$orderarr['payment_state'] = 'Waiting for payment';
	$orderarr['price'] = $totalprice;



	$id 			= get_last_row_file("data/orders.csv")+1;
	$productName 	= '{{Order}} #'.get_settings('invoice-prefix').''.$id.'';
	$orderid 		= get_settings('invoice-prefix').''.$id.'';

	// PLUGIN POST AREAS TO ATTRIBUTES
	$attributes = '';
	if(!empty($addtopostarea['orders'])){
		foreach ($addtopostarea['orders'] as $key => $value) {

				if(isset($value['shipping'])){
					$value = $value['shipping'];
				}
				if(isset($value['billing'])){
					$value = $value['billing'];
				}

                if(isset($orderarr[$value['name']])){
                	@setcookie($value['name'], $orderarr[$value['name']], time()+43000000);
                }

                // if shipping is same as billing
                if($orderarr['billing-checkbox'] == 1){
                	$value_ = str_replace('billing', 'shipping', $value['name']);
                }else{
                	$value_ = $value['name'];	
                }            
                
                if($value['name'] == 'cart'){$orderarr['cart'] = base64_encode(json_encode($_SESSION['cart_items']));}

                if($value['name'] == 'id'){$orderarr['id'] = $orderid;}

                if($value['name'] == 'price'){$orderarr['price'] = $totalprice;}

                if($value['name'] == 'payment_type'){$orderarr['payment_type'] = $payment_name;}

				$attributes.= $value['name'].':'.$orderarr[$value_].',';
				unset($value);
				// unset($orderarr);
		}
    }


	$attributes = base64_encode($attributes);

	$time = time();
	if(empty($orderarr['url'])){
		$slug = md5($time);
	}else{
		$slug = md5($time);
	}
	if($orderarr['post_language']){
		$orderarr['post_language'] = $orderarr['post_language'];
	}else{
		$orderarr['post_language'] = '';
	}



    $check_slug = @find_content(ROOT_ABSOLUTE_PATH.'/data/orders.csv', $slug);
    
    if(!empty($check_slug['slug'])){
    	$slug = $slug.'1';
    }

	$ordercontent="".$productName.";".$slug.";".time().";".$orderarr['post_language'].";;;;single-orders.php;;".$attributes.";\n";

	file_put_contents(ROOT_ABSOLUTE_PATH."/data/orders.csv", $ordercontent, FILE_APPEND | LOCK_EX);

	add_notifications('Nová objednávka #'.get_settings('invoice-prefix').''.$id.' od '.$orderarr['shipping-first-name'].' '.$orderarr['shipping-last-name'].'', '/admin/index.php?edit='.$id.'&post_type=orders&page=layla-shop');

	ob_start();
    include ROOT_ABSOLUTE_PATH."/templates/".get_settings('default_template')."/emails/new-order.php";
    $email_template = ob_get_contents();
    ob_end_clean();

	$search_order_state = array_search('processing', array_column($postarea['orders'][2]['values'], 'name'));
	
	$email_processing 	= $postarea['orders'][2]['values'][$search_order_state]['email_template'];

	$email_subject 		= $postarea['orders'][2]['values'][$search_order_state]['email_template_subject'];

	$search_payment_type = array_search($payment_name, array_column($postarea['orders'][3]['values'], 'name'));
	$email_paymenttype = $postarea['orders'][3]['values'][$search_payment_type]['email_template'];

    $email_paymenttype = $email_paymenttype;
    
    $email_subject = localize_content($email_subject);
    $email_processing = localize_content($email_processing);
	$email_paymenttype = localize_content($email_paymenttype);
	$orderdetails_cart = localize_content(get_cart_contents($orderarr['cart'], $slug));

    $email_template = $email_processing;

    $email_subject 	= str_replace('#orderid#', $orderid, $email_subject);
    $email_template = str_replace('#orderid#', $orderid, $email_template);

    $email_paymenttype = str_replace('#orderid#', $orderid, $email_paymenttype);
    $email_template = str_replace('#payment_type#', $email_paymenttype, $email_template);

    $email_template = str_replace('#firstname#', $orderarr['shipping-first-name'], $email_template);
    $email_template = str_replace('#lastname#', $orderarr['shipping-last-name'], $email_template);
    $email_template = str_replace('#orderlink#', 'http://'.$_SERVER['HTTP_HOST'].'/' .$slug, $email_template);
    $email_template = str_replace('#orderdetails#', $orderdetails_cart, $email_template);
	
	send_email($orderarr['shipping-email'], $email_subject, $email_template, '', '');
	send_email(get_settings('siteemail'), 'Upozornění / '.$email_subject, $email_template, '', '');

	if(isset($payment_url)){ include $payment_url; unset($_SESSION['cart_items']); die(); }
	if(isset($redirect_url)){header('location:/'.$slug.'/'); unset($_SESSION['cart_items']); die(); }


	}

	// header('location:/'.$slug.'/');
	die();
	
}}



// GENERATE ORDER INVOICE
if(isset($_GET['get_order_invoice'])){

	$shipping = localize_content('{{Shipping}}');
	$price = localize_content('{{Price}}');
	$product = localize_content('{{Product}}');
	$summary = localize_content('{{Summary}}');
	$invoice_paid = localize_content('{{Invoice Paid}}');
	$discount = localize_content('{{Discount}}');

	$post = find_content(ROOT_ABSOLUTE_PATH.'data/orders.csv', $_GET['get_order_invoice']);

	$ordername = localize_content('{{Invoice}} #'.$post['attributes']['id']);


	include ROOT_ABSOLUTE_PATH."includes/plugins/layla-shop/lib/pdf-invoicr-master/phpinvoice.php";

	if(isset($_GET['get_order_invoice'])){
		$orderid = $_GET['get_order_invoice'];
	}else{
		die('Faktura neexistuje');
	}



	// print_r($post);
	// die();

	$attributes = $post['attributes'];

	if($attributes['billing-company'] != ''){

	  	foreach ($attributes as $key => $value) {
	  			if(strpos($key, 'billing-') !== false){
			  		$client[$key] = $value;
		  		}
		  		$address_type = 'billing';
	  	}

	  	$client = array($client[$address_type.'-company'], $client[$address_type.'-address'], $client[$address_type.'-zip'].' '.$client[$address_type.'-city'], $client[$address_type.'-state'], $client[$address_type.'-first-name'].' '.$client[$address_type.'-last-name'], $client[$address_type.'-email'], $client[$address_type.'-phone'] );

  	}else{

	  	foreach ($attributes as $key => $value) {
	  			if(strpos($key, 'shipping-') !== false){
			  		$client[$key] = $value;
		  		}
		  		$address_type = 'shipping';
	  	}


	  	$client = array($client[$address_type.'-first-name'].' '.$client[$address_type.'-last-name'], $client[$address_type.'-company'], $client[$address_type.'-address'], $client[$address_type.'-zip'].' '.$client[$address_type.'-city'], $client[$address_type.'-state'], $client[$address_type.'-email'], $client[$address_type.'-phone'] );

  	}

  	$client = remove_empty($client);

  	foreach ($client as $key => $value) {
  		$client2[] = $value;
  	}

  	$shop_detail = explode(',', get_settings('shop-invoice-from'));

	$invoice = new phpinvoice('A4', html_entity_decode($currency_symbol[get_settings('currency')]));
	  /* Header Settings */
	  $expire = $post['time']+604800;
	  $invoice->setLogo("templates/".get_settings('default_template')."/images/logo-faktura.png");
	  $invoice->setColor("#007fff");
	  $invoice->setType($ordername);
	  $invoice->setReference($post['attributes']['id']);
	  $invoice->setDate(date('d.m. Y',$post['time']));
	  // $invoice->setTime(date('h:i:s A',time()));
	  $invoice->setDue(date('d.m. Y', $expire));
	  $invoice->setFrom($shop_detail);
	  $invoice->setTo($client2);

	  /* Adding Items in table */

	  $cart = json_decode(base64_decode($attributes['cart']), true);
	  // print_r($cart);
	  foreach ($cart as $product) {

	  	if(empty($product['product'])){continue;}
	  	$pr = $product['attributes']['price']*$product['product'];
	  	// die('x'.$post['cart']);
  	  $pr = find_content(ROOT_ABSOLUTE_PATH.'data/products.csv', $product['product']);
  	  // print_r($pr);
	  // $invoice->addItem($pr['title'], strip_tags(html_entity_decode($pr['content'])),1,'',580,0,3480);
	  $invoice->addItem($pr['title'], strip_tags(html_entity_decode($pr['content'])),$product['sku'],'',$pr['attributes']['price']*$product['sku'], '','');
	  }

	 //  if(!isset($cart['discount']['code'])){ }else{
	 //  	// $sleva =  $cart_items['discount']['code'].' / - '.$cart['discount']['value'].' '.$currency_symbol[get_settings('currency')];  
		// $invoice->addItem("{{Discount}}", $cart['discount']['code'],'1','','-'.$cart['discount']['code'],'','-'.$cart['discount']['code']);

	 //  }

	  $invoice->addTotal($shipping,get_settings($attributes['payment_type'].'-price'));
	  	// $sleva =  $cart_items['discount']['code'].' / - '.$cart['discount']['value'].' '.$currency_symbol[get_settings('currency')];  
		// $invoice->addItem("{{Discount}}", $cart['discount']['code'],'1','','-'.$cart['discount']['code'],'','-'.$cart['discount']['code']);




	  if(!isset($cart['discount']['code'])){ }else{
	  	
	  $invoice->addTotal($discount,'-'.$cart['discount']['value']);
	  	// $sleva =  $cart_items['discount']['code'].' / - '.$cart['discount']['value'].' '.$currency_symbol[get_settings('currency')];  
		// $invoice->addItem("{{Discount}}", $cart['discount']['code'],'1','','-'.$cart['discount']['code'],'','-'.$cart['discount']['code']);

	  }



	  /* Add totals */
	  $invoice->addTotal($summary,$post['attributes']['price'], true);



	  /* Set badge */ 
	  if($attributes['payment_state'] == 'paid'){
	  $invoice->addBadge($invoice_paid);
	  }
	  /* Add title */
	  // $invoice->addTitle("DŮLEŽITÉ UPOZORNĚNÍ");
	  /* Add Paragraph */
	  // $invoice->addParagraph("Vrácení tištěné verze knihy je možné pouze po domluvě a posouzení stavu výtisku. Nejsme plátci DPH.");
	  /* Set footer note */
	  $invoice->setFooternote('Nejsme plátci DPH.');
	  /* Render */
	  $invoice->render('faktura.pdf','I'); /* I => Display on browser, D => Force Download, F => local path save, S => return document path */
	  	$get = ob_get_contents();
	ob_get_clean();
	echo $get;
}


if(!function_exists('check_checkout_forms')){
	function check_checkout_forms($type){
		if(!isset($_SESSION['cart_items'][0]['product'])) { 
		ob_end_clean();
		header('location:/');
		die();
		}
		if( $type == 'shipping' && isset($_POST['billing-checkbox'])  ||  $type == 'billing' && empty($_POST['billing-checkbox'])  ){
		if($_POST['shop-order-submit'] == 1){

		global $addtopostarea;
		if(!empty($addtopostarea['orders'])){
	                                $attributes_array = explode(',', $attributes);
	                                foreach ($addtopostarea['orders'] as $key => $value) {
	                                    $i++;
	                                    $value = $value[$type];
	                                    $shipping = array_filter($value);
	                                    // if($value['title'] == ''){continue;}
		                                
	                                        $attributes_array = explode(',', $attributes);
	                                        foreach ($attributes_array as $key => $ATTS) {
	                                            $attributes_array2[$key] = explode(':',$ATTS);
	                                        }

	                                        $attributes_array_key = array_search($value['name'], array_column($attributes_array2, 0));

	                                        $att_value = $attributes_array2[$attributes_array_key][1];           
	                                        
	                                        if(isset($_POST[$value['name']])){
	                                        	setcookie($value['name'], $_POST[$value['name']], time()+3600);
	                                        }
	                                    	
	                                    	if( ($_POST[$value['name']] == '' && $value['required']) || (strpos($value['name'], 'mail') && !filter_var($_POST[$value['name']], FILTER_VALIDATE_EMAIL))){
	                                        	$errors.= '<div class="error-fields"> 🔥 {{Please fill}} '.$value['title'].'</div>';
	                                        }elseif( empty($_POST['terms']) ){
	                                        	$errors = '<div class="error-fields"> 🔥 {{Please agree Terms & Conditions}}</div>';
	                                        }
		                                    

                                             }
                                         }


                                         if($errors){return $errors;}else{ ob_get_clean(); do_order();}
                                     }
}
}
}

if(!function_exists('checkout_forms')){
	function checkout_forms($type){
		global $addtopostarea;
		if(!empty($addtopostarea['orders'])){
	    echo check_checkout_forms($type);
	    if($type == 'billing'){
	    // if($_POST['billing-checkbox'] == 1){$checked = ' checked'; $style='display:block';}else{ $style='display:none';}
	    	//echo '<input type="checkbox" id="billing-checkbox" name="billing-checkbox" value="1" '.$checked.' /> {{Billing details are different then Shipping}}';
	}

	                                     
	    echo '<span id="'.$type.'-fields" style="'.$style.'">';

        if($type == 'billing'){echo'<h3>{{Billing address}}</h3>';}else{echo'<h3>{{Shipping address}}</h3>';}
		                            $attributes_array = explode(',', $attributes);
	                                foreach ($addtopostarea['orders'] as $key => $value) {
	                                    $i++;
	                                    $value = $value[$type];
	                                    $shipping = array_filter($value);
	                                    // $shipping = array_filter($value, function($value){return !empty($value) || $value === 0;});
	                                    if($value['title'] == ''){continue;}
	                                ?>

	                                      <div class="col-sm-4">
	                                        <div class="form-group">
	                                        <label class="control-label"><!-- <?=$value['title'];?> <?php if($value['required']){?>*<?php } ?> --></label>

	                                        <?php

	                                        $attributes_array = explode(',', $attributes);
	                                        foreach ($attributes_array as $key => $ATTS) {
	                                            $attributes_array2[$key] = explode(':',$ATTS);
	                                        }


	                                        $attributes_array_key = array_search($value['name'], array_column($attributes_array2, 0));

	                                        if($_POST){
											$att_value = $_POST[$value['name']];   
	                                        }elseif(isset($attributes_array2[$attributes_array_key][1])){
	                                        $att_value = $attributes_array2[$attributes_array_key][1];   
	                                        }else{
											$att_value = $_COOKIE[$value['name']];   
	                                        }
	                                        
	                                        switch ($value['type']) {
	                                        case 'input-text':
	                                        // print_r($attributes_array);
	                                        if($value['required']){$required='required'; $value['title'] = $value['title'].'*';}

	                                        echo '<input type="text" class="form-control" value="'.$att_value.'" placeholder="'.$value['title'].'" name="'.$value['name'].'" '.$required.'/>';

	                                        unset($att_value);
	                                        unset($required);
	                                        break;
	                                        case 'input-textarea':
	                                        // print_r($attributes_array);
	                                        if($value['required']){$required='required';}

	                                        echo '<textarea rows="4" class="form-control" name="'.$value['name'].'" placeholder="'.$value['title'].'">'.$att_value.'</textarea>';

	                                        unset($att_value);
	                                        unset($required);

	                                        break;
	                                        case 'input-select':
	                                        
	                                        // echo $value['prefix'];

										echo '<select class="form-control" name="'.$value['name'].'">';

										foreach ($value['values'] as $key => $values) {
											if(!isset($values['title'])){
												if($att_value == $values){$selected = ' selected';}
												echo '<option value="'.$values.'" '.$selected.'>'.$values.'</option>';
											}else{
												if($att_value == $values['name']){$selected = ' selected';}
												echo '<option value="'.$values['name'].'" '.$selected.'>'.$values['title'].'</option>';
											}
											unset($selected);
										}

	                                        break;
	                                    
	                                        default:
	                                            # code...
	                                        break;

	                                        // echo '</span>';

	                                        }
	                                        ?>
	                                        </div>
	                                    </div>



	                                    <?php
	                                   



	                                }
	                                 if($type == 'shipping'){
	    if(isset($_POST['billing-checkbox']) || empty($_POST)){$checked = ' checked'; $style='display:block';}else{ $style='display:none';}
	    	echo '<input type="checkbox" id="billing-checkbox" name="billing-checkbox" value="1" '.$checked.' /> {{Billing address is same as shipping address}}';
	}
	                                }
	}
}


// $postarea['orders'][3]['values'][]

if(!function_exists('payment_methods')){
function payment_methods(){
	global $html;
	global $postarea;
	global $currency_symbol;
	echo '


    <audio id="clicksound" controls preload="true" style="display:none;" >
        <source src="/includes/plugins/layla-shop/assets/bubble.mp3" type="audio/mp3" />
        <source src="/includes/plugins/layla-shop/assets/bubble.ogg" type="audio/ogg" />
    </audio>

	   <table class="shop_table woocommerce-checkout-review-order-table">
    <thead>
        <tr>
            <th class="product-name">{{Product}}</th>
            <th class="product-total">{{Total}}</th>
        </tr>
    </thead>
    <tbody>';






foreach ($_SESSION['cart_items'] as $key => $value) { 

	if( !isset($value['product']) ){continue;}
	$post = find_content('./data/products.csv', $value['product']);

                                if(empty($post['title'])){continue;}
                                if(!isset($price_sum)){$price_sum=0;}
                                	$price_sum = $post['attributes']['price']+$price_sum;
                                // product, price, pocet ks
                                $products_cart.=$post['slug'].':;'.$post['attributes']['price'].';';
                                ?>



                        <tr class="cart_item">
                        <td class="product-name">
                            <?=$post['title'];?>                          <strong class="product-quantity">× <?=$value['sku'];?></strong>                                                  </td>
                        <td class="product-total">
                            <span class="woocommerce-Price-amount amount prices"><?=$post['attributes']['price']*$value['sku'];?></span> <?=$currency_symbol[get_settings('currency')];?>                      </td>
                        </tr> 



                                <?php $subtotal = $post['attributes']['price']*$value['sku']+$subtotal; } ?>





                     <tr class="cart_item">
                        <td class="product-name">
                           {{Shipping}}                                                   </td>
                        <td class="product-total">
                            <span class="shipping-price">0</span> <?=$currency_symbol[get_settings('currency')];?>                      </td>
                    </tr>












                        </tbody>
    <tfoot>

<?php

if(isset($_SESSION['cart_items']['discount']['code'])){

$totalprice = $subtotal-$_SESSION['cart_items']['discount']['value'];

?>
            
     
    <?php }else{echo '<input type="hidden" name="discount-price-value" class="discount-price-value" value="0">';} ?>


        <tr class="cart-subtotal">
            <th>{{Subtotal}}</th>
            <td><span class="subtotal-price"><?=$subtotal;?></span>&nbsp;<span class="woocommerce-Price-currencySymbol"><?=$currency_symbol[get_settings('currency')];?></span></td>
        </tr>

<?php if(isset($_SESSION['cart_items']['discount']['code'])){ ?>
   <tr class="cart-subtotal" >
            <th>{{Coupon Discount}}: <span style="color:green;"><?=$_SESSION['cart_items']['discount']['code'];?></span></th>
            <td style="color:green;width:110px;"><input type="hidden" name="discount-price-value" class="discount-price-value" value="<?=$_SESSION['cart_items']['discount']['value'];?>" /><span class="discount-price"><?php echo '- '.$_SESSION['cart_items']['discount']['value'].' '.$currency_symbol[get_settings('currency')]; echo ' <a href="?discount-remove=1">[{{x}}]</a>';?></span>&nbsp;<span class="woocommerce-Price-currencySymbol"></span></td>
        </tr>
<?php } ?>
        <tr class="order-total">
            <th>{{Total}}</th>
            <td><strong><span class="total-price"><?=$totalprice;?></span>&nbsp;<span class="woocommerce-Price-currencySymbol"><?=$currency_symbol[get_settings('currency')];?></span></strong> </td>
        </tr>

        
    </tfoot>
</table>

        <input type="hidden" name="cart" value="<?=$products_cart;?>">


<div id="payment" class="woocommerce-checkout-payment">
            <ul class="wc_payment_methods payment_methods methods">
<?php
// print_r($postarea['orders'][3]['values']);
foreach ($postarea['orders'][3]['values'] as $key => $value) {

global $currency_symbol;
if( get_settings($value['name'].'-price') > 0){
	$price = ' - '.get_settings($value['name'].'-price').' '.$currency_symbol[get_settings('currency')];
	$price_format = get_settings($value['name'].'-price');
}elseif( get_settings($value['name'].'-price') == 0 && is_numeric(get_settings($value['name'].'-price'))){
	$price = '{{Free}}';
	$price_format = '0';
}else{
	$price = '';
	$price_format = '';

}


if($price != ''){
$num++;
// if($num == 1){$selected = ' checked';}
echo '
    <li class="shop_payment_method payment_method_'.slugify($value['title']).' metoda">
    <input id="payment_method_'.slugify($value['title']).'" num="'.$num.'" type="radio" '.$selected.' class="input-radio" name="payment_method" value="'.slugify($value['title']).'" price="'.$price_format.'">

    <label for="payment_method_'.slugify($value['title']).'">
        '.$value['title'].' '.$price.'  </label>
            <div class="payment_box payment_method_description" style="display: none;">
            <p>'.$value['description'].'</p>
        </div>
    </li>';
}
unset($selected);

}



// OHUL TO

// $camp = array();
// $camp_unique = array();
// $next2 = -1;
// //--- get all the directories
// $dirname = './includes/plugins/layla-shop-gateway-*';
// $findme  = "*index.php";
// $dirs    = glob($dirname.'*', GLOB_ONLYDIR);
// $files   = array();
// // print_r($dirs);
// foreach ($dirs as $key => $value) {

// $css_read = file_get_contents($value.'/index.php');
// preg_match('/Plugin name: (.*) /', $css_read, $matches, PREG_OFFSET_CAPTURE, 0);
// // preg_match('/Plugin description: (.*) /', $css_read, $matches_desc, PREG_OFFSET_CAPTURE, 0);
// // preg_match('/Author: (.*) /', $css_read, $matches2, PREG_OFFSET_CAPTURE, 0);
// // preg_match('/Plugin category: (.*) /', $css_read, $matches3, PREG_OFFSET_CAPTURE, 0);
// $plugin_name = $matches[1][0];
// // $plugin_description = $matches_desc[1][0];
// // $plugin_author = $matches2[1][0];
// // $plugin_category = $matches3[1][0];
// $basename = basename($value);

// global $currency_symbol;

// if(strpos(get_settings('plugins'), $basename) !== false){

// 	if( get_settings(slugify($plugin_name).'-price') > 0 ){
// 		$price = ' - '.get_settings(slugify($plugin_name).'-price').' '.$currency_symbol[get_settings('currency')];
// 		$price_format = get_settings(slugify($plugin_name).'-price');
// 	}elseif(get_settings(slugify($plugin_name).'-price') == 0 && is_numeric(get_settings(slugify($plugin_name).'-price'))){
// 		$price = '{{Free}}';
// 		$price_format = '0';
// 	}else{
// 		$price = '';
// 		$price_format = '';
// 	}

// 	if($price != ''){
// 		$num++;
// 	echo '
// 	    <li class="shop_payment_method payment_method_'.slugify($plugin_name).' metoda">
// 	    <input id="payment_method_'.slugify($plugin_name).'" num="'.$num.'" type="radio" class="input-radio" name="payment_method" value="'.slugify($plugin_name).'"  price="'.$price_format.'">

// 	    <label for="payment_method_'.slugify($plugin_name).'">
// 	        '.$plugin_name.'  '.$price.'</label>
// 	            <div class="payment_box payment_method_description" style="display: none;">
// 	            <p>{{Payment through}} '.$plugin_name.'</p>
// 	        </div>
// 	    </li>';
// }

// 	// }
// }

// }





       echo ' </ul>
        <div class="form-row place-order">
                    <p class="form-row validate-required">
                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                <input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="terms" id="terms">
                    <span class="woocommerce-terms-and-conditions-checkbox-text"> {{I Agree with}} <a href="https://'.$_SERVER['HTTP_HOST'].'/obchodni-podminky/" class="woocommerce-terms-and-conditions-link" target="_blank">{{Agreement}}</a>.</span>&nbsp;<span class="required">*</span>
                </label>
                <input type="hidden" name="terms-field" value="1">
            </p>
            </div></div>
        <button type="submit" class="button alt wc-proceed-to-checkout" name="woocommerce_checkout_place_order" id="place_order" value="Objednat" data-value="Objednat">{{Confirm order}}</button></div>


	';


	echo '
	<style>
	select{width: 99%; font-size: 110%; loat:left; background: #ebe9eb; border: 0 !important; margin: 0 0 10px 0; }
	.shop_table{margin: 32px 0 22px 0; border-radius: 5px}
	.error-fields{display: block; border: 0; background: #efefef; padding: 7px 4px 7px 4px; border-radius: 4px; margin: 6px 0 6px 0;}
	.form-group{padding-right: 10px;}
	.form-group input,.form-group textarea{font-size: 110%; width: 47%; float:left; background: #ebe9eb; border: 0 !important;}
	.form-group input::placeholder{color: #333;}
	.col-sm-4{width: 97%; float:left}
	textarea{width:100% !important;}
	.checkout .woocommerce-shipping-fields{width: 40%;}
	</style>
	

	<script type="text/javascript">
	

	var billingcheckbox = document.getElementById("billing-checkbox");
	billingcheckbox.addEventListener("change", function(event) {
		
		if(this.checked){
			document.querySelector("#billing-alt").style.display="none";
		}else{
			document.querySelector("#billing-alt").style.display="block";
		}

	document.getElementById("clicksound").play();		

	});


	var deleteLink = document.querySelectorAll(".metoda input");
	var deleteLinkDescription = document.querySelectorAll(".metoda  .payment_method_description");
	

	var totalsum;
	var soucet;
	var price;
	var q;
	var discount = document.querySelector(".discount-price-value").value;


	for (var i = 0; i < deleteLink.length; i++) {
	    deleteLink[i].addEventListener("change", function(q) {
	    	
	    	price = this.getAttribute("price");
	    	num = this.getAttribute("num");

			document.getElementById("clicksound").play();	

	        document.querySelector(".shipping-price").innerHTML = price;

	        selectMethod(num-1);

			var prices = document.querySelectorAll(".prices");

			soucet = 0;
			totalsum = 0;

			for (var q = 0; q < prices.length; q++) {

				totalsum 	= prices[q].innerHTML;
				soucet 		= parseInt(soucet) + parseInt(totalsum);

			}
			soucet 		= parseInt(soucet) + parseInt(price);
			
			subtotal = soucet;
			soucet = soucet-discount;

	        document.querySelector(".subtotal-price").innerText = subtotal;
	        document.querySelector(".total-price").innerText = soucet;
			document.querySelectorAll(".payment_method_description")[i].style.display="block";
	    });
	}
	 window.setTimeout("cus()", 100);
	 function selectMethod(method){
	 		for (var i = 0; i < deleteLinkDescription.length; i++) {
				deleteLinkDescription[i].style.display="none";
	 		}
			deleteLinkDescription[num-1].style.display="block";
	 }
	function cus(){
		deleteLink[0].click();
		deleteLinkDescription[0].style.display="block";
	}

	</script>';
	// shop_payment_method
}}



if(!function_exists('edit_order_state')){
function edit_order_state($id, $orderstate, $paymentstate){
	$post_type_csv = '../../../../../../data/orders.csv';
	$pageid = $id;

	$orderdata = get_order($id);
	// print_r($orderdata);
	$row = 0;
	$pages = array();
	if (($handle = fopen($post_type_csv, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
        $num = count($data);
        $row++;
        // echo $data;
        if($row == $pageid){

		$title = $orderdata['title'];
		$slug = $orderdata['slug'];
		$time = $orderdata['time'];
		$lang = $orderdata['lang'];
		$template = ''; 
		$seo = '';
		// $seo = base64_encode($_POST['seo-title'].','.$_POST['seo-keywords'].','.$_POST['seo-description']);

		foreach ($orderdata['attribute'] as $key => $value) {
			switch ($key) {
				case 'state':
					$value = $orderstate;
				break;
				case 'payment_state':
					$value = $paymentstate;
				break;
				default:
					$value = $value;
				break;
			}
				$attributes_updated.= $key.':'.$value.',';
		}


        $qq.= "".$title.";".$slug.";".$time.";".$lang.";;;;".$template.";".$seo.";".base64_encode($attributes_updated).";\n";

		file_put_contents($post_type_csv, $qq);
		return  'updated';
	    fclose($handle);

        }

}}}}





if(!function_exists('get_order')){
	function get_order($id){
	global $addtopostarea;

	$row = 0;
	$pages = array();
	if (($handle = fopen(ROOT_ABSOLUTE_PATH."data/orders.csv", "r")) !== FALSE) {
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

if(!function_exists('cart_items_count')){
function cart_items_count(){
    foreach ($_SESSION['cart_items'] as $key => $value) {                            
	    if( !isset($value['product']) ){continue;}
	    $i++;
    }
    return $i;
}
}

if(!function_exists('get_cart_contents')){
function get_cart_contents($cart, $orderid = ''){

global $currency_symbol;
global $page;
global $slug;
global $postarea;

$cart = json_decode(base64_decode($cart), true);



$table.= '
    <table class="order-table shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
        <thead>
            <tr>

                <th class="product-thumbnail">&nbsp;</th>
                <th class="product-name">{{Product}}</th>
                <th class="product-price">{{Price}}</th>
                <th class="product-quantity">{{Quantity}}</th>
                <th class="product-subtotal">{{Price}}</th>
            </tr>
        </thead>
        <tbody>';
            
                        foreach ($cart as $key => $value) { 

                        if( !isset($value['product']) ){continue;}
                        $post = find_content(ROOT_ABSOLUTE_PATH.'data/products.csv', $value['product']);
                        if(empty($post['title']) || !isset($post['title']) ){continue;}
                        $price_sum = $post['attributes']['price']+$price_sum;
                        //'.$post['attributes']['price']*$value['sku'].'
                        $pr = $post['attributes']['price']*$value['sku'];

						$table.= '


                                <tr class="woocommerce-cart-form__cart-item cart_item">


                        <td class="product-thumbnail">
                        <a href="http://'.$_SERVER['HTTP_HOST'].'/'.$post['slug'].'"><img style="height:60px;width:auto;" src="http://'.$_SERVER["HTTP_HOST"].'/files/thumbs/'.$post['thumb'].'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""></a>                      </td>

                        <td class="product-name" data-title="Produkt">
                        <a href="http://'.$_SERVER['HTTP_HOST'].'/'.$post['slug'].'">'.$post['title'].'</a>                     </td>

                        <td class="product-price" data-title="Cena">
                            <span class="woocommerce-Price-amount amount">'.$post['attributes']['price'].' '.$currency_symbol[get_settings('currency')].'</span></span>                      </td>

                        <td class="product-quantity" data-title="Množství">
                           '.$value['sku'].'
    </div>
                            </td>

                        <td class="product-subtotal" data-title="Cena celkem">
                            <span class="woocommerce-Price-amount amount">'.$pr.'&nbsp;<span class="woocommerce-Price-currencySymbol">Kč</span></span>                      </td>
                    </tr>
';



								} 


if(!strpos($_SERVER['REQUEST_URI'], 'admin')){
	if(isset($orderid)){$slug = $orderid;}else{$slug=$page;}
$order = find_content(ROOT_ABSOLUTE_PATH.'data/orders.csv', $slug);
}else{
$order = find_content(ROOT_ABSOLUTE_PATH.'data/orders.csv', $orderid, 0, 1);	
}

if(!isset($cart['discount']['code'])){ }else{ $sleva =   '- '.$cart['discount']['value'].' '.$currency_symbol[get_settings('currency')];  


	$table.= '
            
            <tr>
            <td colspan="3"></td>
                <td colspan="" class="actions" style="padding-top:16px;">
                            <label for="coupon_code"><strong>{{Coupon Discount}}:</strong></label>
  </td><td  class="actions" style="padding-top:16px;">

                          	'.$sleva.'


                    

                </td>
            </tr>';
        }

if(isset($order['attributes']['payment_type'])){



	$table.= '
            
            <tr>
            <td colspan="3"></td>
                <td colspan="" class="actions" style="padding-top:16px;">
                            <label for="coupon_code"><strong>{{Shipping}}:</strong></label>
  </td><td  class="actions" style="padding-top:16px;">

                          	'.get_settings($order['attributes']['payment_type'].'-price').' '.$currency_symbol[get_settings('currency')].'


                    

                </td>
            </tr>';
        }


$table.= '
            <tr>
            <td colspan="3"></td>
                <td colspan="" class="actions" style="padding-top:16px;">

                            <label for="coupon_code"><strong>{{Summary}}:</strong></label>

                    

                </td><td  class="actions" style="padding-top:16px;">


                          	'.$order['attributes']['price'].' '.$currency_symbol[get_settings('currency')].'

                    

                </td>
            </tr>';

 //if(!isset($_SESSION['cart_items']['discount']['code'])){}


// if(isset($orderid)){$page = str_replace('/', '', $orderid);}



	$search_payment_type = array_search($order['attributes']['payment_type'], array_column($postarea['orders'][3]['values'], 'name'));

	$attributes = $order['attributes'];

  	foreach ($attributes as $key => $value) {

  		if(strpos($key, 'shipping-') !== false){
  			if($value != '')
  		$shipping.= $value.', ';
  		}
  	}

  	$attributes = $order['attributes'];
  	foreach ($attributes as $key => $value) {
      if(strpos($key, 'billing-') !== false){
  			if($value != '')
          $billing.= $value.', ';
        }
  	}






if(isset($order['attributes']['tracking-id'])){

	$table.= '
            
            <tr>
                <td colspan="6" class="actions" style="padding-top:16px;">


                            <label for="coupon_code" style="font-weight:bold;">{{Tracking ID}}:</label>
                          	'.$order['attributes']['tracking-id'].'

                    

                </td>
            </tr>';
}


if($shipping != ''){

	$table.= '
            
            <tr>
                <td colspan="6" class="actions" style="padding-top:16px;">


                            <label for="coupon_code" style="font-weight:bold;">{{Shipping address}}:</label>
                          	'.$shipping.'

                    

                </td>
            </tr>';
}

if($shipping != $billing && $shipping != ''){

	$table.= '
            
            <tr>
                <td colspan="6" class="actions" style="padding-top:16px;">


                            <label for="coupon_code" style="font-weight:bold;">{{Billing address}}:</label>
                          	'.$billing.'


                    

                </td>
            </tr>';
        }



	if(isset($order['attributes']['payment_type'])){
		
	$search_payment_type = array_search($order['attributes']['payment_type'], array_column($postarea['orders'][3]['values'], 'name'));

	$payment_type  		 = $postarea['orders'][3]['values'][$search_payment_type]['title'];

	$table.= '
            
            <tr>
                <td colspan="6" class="actions" style="padding-top:16px;">

                            <label for="coupon_code" style="font-weight:bold;">{{Payment type}}:</label>
                          	'.$payment_type.'


                    

                </td>
            </tr>';
        }
	if(isset($order['attributes']['payment_state'])){


	$search_payment_method = array_search($order['attributes']['payment_state'], array_column($postarea['orders'][4]['values'], 'name'));

	$order_state  		= $postarea['orders'][4]['values'][$search_payment_method]['title'];
	$order_label 		= $postarea['orders'][4]['values'][$search_payment_method]['name'];
            $table.= '<tr>
                <td colspan="6" class="actions" style="padding-top:16px;">

                            <label for="coupon_code" style="font-weight:bold;">{{Payment state}}:</label>
                          	'.$order_state.'


                    

                </td>
            </tr>';
        }
	if(isset($order['attributes']['state'])){

			$order_state = array_search($order['attributes']['state'], array_column($postarea['orders'][2]['values'], 'name'));
			$orderstate = array_column($postarea['orders'][2]['values'], 'title')[$order_state];
			$orderstate_label = array_column($postarea['orders'][2]['values'], 'name')[$order_state];

            $table.= '<tr>
                <td colspan="6" class="actions" style="padding-top:16px;">

                            <form method="get" action="/nakupni-kosik/" class="">
                            <div class="coupon '.$orderstate_label.'" style="display: ;">
                            <label for="coupon_code" style="font-weight:bold;">{{Order state}}:</label>
                          	'.$orderstate.'

                            </div>
                            </form>
                    

                </td>
            </tr>';
}


$table.= '

                    </tbody>
    </table>';


$table.='
<style type="text/css">
.button_buy{ font-size: 80%; }
.gradient-gray{background: orange !important;}
.order-table {
  border-spacing: 1;
  border-collapse: collapse;
  background: white;
  border-radius: 6px;
  overflow: hidden;

  width: 100%;
  margin: 0 auto;
  position: relative;
}
.paid, .completed{
	color: green;
}
.order-table * {
  position: relative;
}
.order-table td, .order-table th {
  padding-left: 8px;
}
.order-table thead tr {
  height: 60px;
  background: #FFED86;
  font-size: 16px;
}
.order-table tbody tr {
  height: 48px;
  border-bottom: 1px solid #E3F1D5;
}
.order-table tbody tr:last-child {
  border: 0;
}
.order-table td, .order-table th {
  text-align: left;
}
.order-table td.l, .order-table th.l {
  text-align: right;
}
.order-table td.c, .order-table th.c {
  text-align: center;
}
.order-table td.r, .order-table th.r {
  text-align: center;
}

@media screen and (max-width: 35.5em) {
  .order-table {
    display: block;
  }
  .order-table > *, .order-table tr, .order-table td, .order-table th {
    display: block;
  }
  .order-table thead {
    display: none;
  }
  .order-table tbody tr {
    height: auto;
    padding: 8px 0;
  }
  .order-table tbody tr td {
    padding-left: 45%;
    margin-bottom: 12px;
  }
  .order-table tbody tr td:last-child {
    margin-bottom: 0;
  }
  .order-table tbody tr td:before {
    position: absolute;
    font-weight: 700;
    width: 40%;
    left: 10px;
    top: 0;
  }
  .order-table tbody tr td:nth-child(1):before {
    content: "";
  }
  .order-table tbody tr td:nth-child(2):before {
    content: "{{Products}}";
  }
  .order-table tbody tr td:nth-child(3):before {
    content: "{{Price}}";
  }
  .order-table tbody tr td:nth-child(4):before {
    content: "{{Quantity}}";
  }
  .order-table tbody tr td:nth-child(5):before {
    content: "{{Price}}";
  }
}


blockquote {
  color: white;
  text-align: center;
}





    </style>';
return $table;

}
}





if(isset($_POST['state']) && strpos($_SERVER['REQUEST_URI'], 'admin') && $_GET['post_type'] == 'orders' && !empty($_POST['send-email'])){


	$slug = $_POST['url'];
	$id = $_GET['edit'];
	$orderid = $_POST['id'];
	
	add_notifications('Změna objednávky #'.$orderid, '/admin/index.php?edit='.$id.'&post_type=orders&page=layla-shop', 0);

	ob_start();
    include "../templates/".get_settings('default_template')."/emails/new-order.php";
    $email_template = ob_get_contents();
    ob_end_clean();


	$search_order_state = array_search($_POST['state'], array_column($postarea['orders'][2]['values'], 'name'));
	
	$email_processing 	= $postarea['orders'][2]['values'][$search_order_state]['email_template'];

	$email_subject 		= $postarea['orders'][2]['values'][$search_order_state]['email_template_subject'];

	$search_payment_type = array_search($_POST['payment_type'], array_column($postarea['orders'][3]['values'], 'name'));
	$email_paymenttype = $postarea['orders'][3]['values'][$search_payment_type]['email_template'];

    $email_paymenttype = $email_paymenttype;
    
    $email_subject = localize_content($email_subject);
    $email_processing = localize_content($email_processing);
	$email_paymenttype = localize_content($email_paymenttype);
	$orderdetails_cart = localize_content(get_cart_contents($_POST['cart'], $slug));

    $email_template = $email_processing;

    $email_subject 	= str_replace('#orderid#', $orderid, $email_subject);
    $email_template = str_replace('#orderid#', $orderid, $email_template);

    $email_paymenttype = str_replace('#orderid#', $orderid, $email_paymenttype);
    $email_template = str_replace('#payment_type#', $email_paymenttype, $email_template);

    $email_template = str_replace('#firstname#', $_POST['shipping-first-name'], $email_template);
    $email_template = str_replace('#lastname#', $_POST['shipping-last-name'], $email_template);
    $email_template = str_replace('#orderlink#', 'http://'.$_SERVER['HTTP_HOST'].'/' .$slug, $email_template);
    $email_template = str_replace('#orderdetails#', $orderdetails_cart, $email_template);

	send_email($_POST['shipping-email'], $email_subject, $email_template, '', '');
	header('location:index.php?page=layla-shop&post_type=orders');
	die();


}











// START / CUSTOMIZE GENERAL OPTIONS OF PLUGIN

if(isset($_POST['sitename']) && strpos($_SERVER['REQUEST_URI'], 'admin')){
	// die('x');
	// die($_POST['currency']);
	// die($_POST['invoice-prefix']);

	$fname = ROOT_ABSOLUTE_PATH."data/settings.csv";
	file_put_contents($fname, "currency;".$_POST['currency'].";\n", FILE_APPEND | LOCK_EX);
	file_put_contents($fname, "bank-account;".$_POST['bank-account'].";\n", FILE_APPEND | LOCK_EX);
	file_put_contents($fname, "invoice-prefix;".$_POST['invoice-prefix'].";\n", FILE_APPEND | LOCK_EX);
	file_put_contents($fname, "shop-invoice-from;".$_POST['shop-invoice-from'].";\n", FILE_APPEND | LOCK_EX);
}



$settings['layla-shop']['plugin-title'] = '{{Shop}}';
$settings['layla-shop']['layla-shop-currency']['title'] = '{{Currency}}';
$settings['layla-shop']['layla-shop-currency']['name'] = 'currency';
$settings['layla-shop']['layla-shop-currency']['type'] = 'input-select';
$settings['layla-shop']['layla-shop-currency']['values'] = $currencies;
$settings['layla-shop']['layla-shop-currency']['selected'] = get_settings('currency');

$settings['layla-shop']['layla-shop-invoice-prefix']['title'] = '{{Invoice Prefix}}';
$settings['layla-shop']['layla-shop-invoice-prefix']['name'] = 'invoice-prefix';
$settings['layla-shop']['layla-shop-invoice-prefix']['type'] = 'input-text';
$settings['layla-shop']['layla-shop-invoice-prefix']['selected'] = get_settings('invoice-prefix');

$settings['layla-shop']['layla-shop-invoice-from-details']['title'] = '{{Invoice From details}}';
$settings['layla-shop']['layla-shop-invoice-from-details']['name'] = 'shop-invoice-from';
$settings['layla-shop']['layla-shop-invoice-from-details']['type'] = 'input-text';
$settings['layla-shop']['layla-shop-invoice-from-details']['selected'] = get_settings('shop-invoice-from');

$settings['layla-shop']['layla-shop-bank-account']['title'] = '{{Bank account}}';
$settings['layla-shop']['layla-shop-bank-account']['name'] = 'bank-account';
$settings['layla-shop']['layla-shop-bank-account']['type'] = 'input-text';
$settings['layla-shop']['layla-shop-bank-account']['selected'] = get_settings('bank-account');

$addtosettings = $settings;


// ADD PAYMENT METHOD CUSTOM PRICES

$pocitej = count($settings['layla-shop']);
foreach ($postarea['orders'][3]['values'] as $key => $value) {
	// global $postarea;
	$pocitej++;
	if(isset($_POST['sitename']) && strpos($_SERVER['REQUEST_URI'], 'admin')){
		$fname = ROOT_ABSOLUTE_PATH."/data/settings.csv";
		file_put_contents($fname, $value['name']."-price;".$_POST[$value['name']."-price"].";\n", FILE_APPEND | LOCK_EX);
	}

	$settings['layla-shop'][$value['name'].'-price']['title'] = ''.$value['title'].' - {{Price}}';
	$settings['layla-shop'][$value['name'].'-price']['name'] = $value['name'].'-price';
	$settings['layla-shop'][$value['name'].'-price']['type'] = 'input-text';
	$settings['layla-shop'][$value['name'].'-price']['selected'] = get_settings($value['name'].'-price');
	// $postarea['layla-shop'][$pocitej]['prefix'] = '';
	// $postarea['layla-shop'][$pocitej]['suffix'] = $currency_symbol[get_settings('currency')];

}


// echo '<pre>';
// print_r($settings);
// echo '</pre>';
// $addtosettings = $settings;
// unset($addtosettings);
// END / CUSTOMIZE GENERAL OPTIONS OF PLUGIN










