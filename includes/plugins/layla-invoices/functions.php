<?php

// CUSTOMIZE MENU

// $tomenu = array();
$tomenu['name'] = '{{Invoices}}';
$tomenu['page'] = 'layla-invoices';
$tomenu['post_type'] = 'invoices';
$tomenu['url'] = '?page=layla-invoices&post_type=invoices';
$tomenu['icon'] = 'monetization_on';
$tomenu['show-editor'] = false;
$tomenu['show-media'] = false;

$tomenu[0]['name'] = '{{Clients}}';
$tomenu[0]['page'] = 'clients';
$tomenu[0]['post_type'] = 'clients';
$tomenu[0]['url'] = '?page=layla-invoices&post_type=clients';
$tomenu[0]['icon'] = 'face';
$tomenu[0]['show-editor'] = true;
$tomenu[0]['show-media'] = false;

// $addtomenu[] = array($tomenu);
array_push($addtomenu, $tomenu);
$addtomenu_admin[] = $tomenu;
unset($tomenu);
// echo '<pre>';
// print_r(array($tomenu));
// echo '</pre>';

// CUSTOMIZE EDIT POST AREA

$postarea['invoices'][0]['title'] = '{{Clients}}';
$postarea['invoices'][0]['name'] 	= 'invoices-clients';
$postarea['invoices'][0]['type'] 	= 'input-select';
$postarea['invoices'][0]['show-menu'] = false;
$postarea['invoices'][0]['prefix'] = '';
$postarea['invoices'][0]['suffix'] = '';
$postarea['invoices'][0]['col'] = '4';

$post = layla_get_posts('clients', 'DESC', 100);

$postarea['invoices'][0]['values'][] = array('title'=>'', 	'name'=>'', 'description'=>'');
$i=-1; foreach ($post as $key => $value) { $i++;

$data = $post[$i];

$postarea['invoices'][0]['values'][] = array('title'=>$data['name'], 	'name'=>$data['slug'], 'description'=>'');

}


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


$postarea['invoices'][1]['title'] = '{{Price}}';
$postarea['invoices'][1]['name'] 	= 'price';
$postarea['invoices'][1]['type'] 	= 'input-text';
$postarea['invoices'][1]['show-menu'] = true;
$postarea['invoices'][1]['prefix'] = '';
$postarea['invoices'][1]['suffix'] = ' '.$currency_symbol[get_settings('invoices-currency')];
$postarea['invoices'][1]['col'] = '2';



$postarea['invoices'][2]['title'] = '{{State}}';
$postarea['invoices'][2]['name'] 	= 'invoices-state';
$postarea['invoices'][2]['type'] 	= 'input-select';
$postarea['invoices'][2]['show-menu'] = true;
$postarea['invoices'][2]['prefix'] = '';
$postarea['invoices'][2]['suffix'] = '';
$postarea['invoices'][2]['col'] = '3';


$postarea['invoices'][2]['values'][] = array('title'=>'{{Not paid}}', 	'name'=>'notpaid', 'description'=>'');
$postarea['invoices'][2]['values'][] = array('title'=>'{{Paid}}', 	'name'=>'paid', 'description'=>'');


$htmlvalue = '<input type="text" name="invoices-items" value="'.$value['value'].'" />';

$postarea['invoices'][3]['title'] 		= '{{Invoice ID}}';
$postarea['invoices'][3]['name'] 		= 'invoice-id';
$postarea['invoices'][3]['type'] 		= 'input-text';
$postarea['invoices'][3]['show-menu'] 	= true;
$postarea['invoices'][3]['prefix'] 		= '';
$postarea['invoices'][3]['suffix']	 	= '';
$postarea['invoices'][3]['col'] 		= '2';


$postarea['invoices'][4]['title'] = '{{Invoice Items}}';
$postarea['invoices'][4]['name'] 	= 'invoices-items';
$postarea['invoices'][4]['type'] 	= 'function';
$postarea['invoices'][4]['value'] 	= 'invoices_items';
$postarea['invoices'][4]['show-menu'] = false;
$postarea['invoices'][4]['prefix'] = '';
$postarea['invoices'][4]['suffix'] = '';
$postarea['invoices'][4]['col'] = '12';




$postarea['invoices'][5]['title'] = '{{Due date}}';
$postarea['invoices'][5]['name'] 	= 'invoices-duedate';
$postarea['invoices'][5]['type'] 	= 'input-select';
$postarea['invoices'][5]['show-menu'] = true;
$postarea['invoices'][5]['prefix'] = '';
$postarea['invoices'][5]['suffix'] = '';
$postarea['invoices'][5]['col'] = '2';


$postarea['invoices'][5]['values'][] = array('title'=>'{{14 days}}', 	'name'=>'14', 'description'=>'');
$postarea['invoices'][5]['values'][] = array('title'=>'{{7 days}}', 	'name'=>'7', 'description'=>'');
$postarea['invoices'][5]['values'][] = array('title'=>'{{1 day}}', 	'name'=>'1', 'description'=>'');
$postarea['invoices'][5]['values'][] = array('title'=>'{{2 days}}', 	'name'=>'2', 'description'=>'');
$postarea['invoices'][5]['values'][] = array('title'=>'{{5 days}}', 	'name'=>'5', 'description'=>'');
$postarea['invoices'][5]['values'][] = array('title'=>'{{1 month}}', 	'name'=>'30', 'description'=>'');



$postarea['clients'][0]['title'] = '{{E-mail}}';
$postarea['clients'][0]['name'] 	= 'email';
$postarea['clients'][0]['type'] 	= 'input-text';
$postarea['clients'][0]['show-menu'] = true;
$postarea['clients'][0]['prefix'] = '';
$postarea['clients'][0]['suffix'] = '';
$postarea['clients'][0]['col'] = '2';

$postarea['clients'][1]['title'] = '{{Phone}}';
$postarea['clients'][1]['name'] 	= 'phone';
$postarea['clients'][1]['type'] 	= 'input-text';
$postarea['clients'][1]['show-menu'] = true;
$postarea['clients'][1]['prefix'] = '';
$postarea['clients'][1]['suffix'] = '';
$postarea['clients'][1]['col'] = '2';

$addtopostarea = $postarea;

$settings['layla-invoices']['plugin-title'] = '{{Invoices}}';
$settings['layla-invoices'][0]['title'] = '{{Invoices From details}}';
$settings['layla-invoices'][0]['name'] = 'invoices-from-details';
$settings['layla-invoices'][0]['type'] = 'input-text';
$settings['layla-invoices'][0]['selected'] = get_settings('invoices-from-details');

$settings['layla-invoices'][1]['title'] = '{{Invoices start number}}';
$settings['layla-invoices'][1]['name'] = 'invoices-start-number';
$settings['layla-invoices'][1]['type'] = 'input-text';
$settings['layla-invoices'][1]['selected'] = get_settings('invoices-start-number');


$settings['layla-invoices'][2]['title'] = '{{Invoices currency}}';
$settings['layla-invoices'][2]['name'] = 'invoices-currency';
$settings['layla-invoices'][2]['type'] = 'input-select';
$settings['layla-invoices'][2]['values'] = $currencies;
$settings['layla-invoices'][2]['selected'] = get_settings('invoices-currency');

$addtosettings = $settings;



if(!function_exists('invoices_items')){
	function invoices_items($post, $value){
		$decode = json_decode(base64_decode($value), true);

		$actions_trash = '<a href="#" class="btn btn-xs btn-danger confirmation" swal-title="Jste si jisti?" swal-text="Opravdu smazat?" swal-confirm="Ano, smazat" swal-cancel="Storno">-</a>';

		$actions_plus = '<a href="#" class="btn btn-xs btn-success confirmation">+</a>';

		$itemCount = count($decode);
		echo '<table width="100%" class="invoice-table">';
		echo '<tr class="">';
		echo '<th class="item-name">{{Item}}</th>';
		echo '<th class="item-sku">{{SKU}}</th>';
		echo '<th class="item-price">{{Price}}</th>';
		echo '<th class="item-actions">{{Actions}}</th>';
		echo '</tr>';
		if($itemCount == 0){
			echo '<tr class="invoice-item-row">';
			echo '<td class="item-name"><input type="text" name="invoices-items[1][name]" value="'.$value['name'].'" /></td>';
			echo '<td class="item-sku"><input type="text" name="invoices-items[1][sku]" value="'.$value['sku'].'" /></td>';
			echo '<td class="item-price"><input onKeyUp="recalc_sum();" type="text" name="invoices-items[1][price]" value="'.$value['price'].'" /></td>';
			echo '<td class="item-actions">'.$actions_plus.'</td>';
			echo '</tr>';
		}else{
		foreach ($decode as $key => $value_item) {
			$num++;
			echo '<tr class="invoice-item-row">';
			echo '<td class="item-name"><input type="text" name="invoices-items['.$num.'][name]" value="'.$value_item['name'].'" /></td>';
			echo '<td class="item-sku"><input type="text" name="invoices-items['.$num.'][sku]" value="'.$value_item['sku'].'" /></td>';
			echo '<td class="item-price"><input onKeyUp="recalc_sum();" type="text" name="invoices-items['.$num.'][price]" value="'.$value_item['price'].'" /></td>';
			echo '<td class="item-actions">'.$actions_trash.''.$actions_plus.'</td>';
			echo '</tr>';

		}
		}
		echo '</table>';

		if(empty($post[1]) || $_GET['addpage'] == 1){
			echo '<input name="url" type="hidden" class="post-slug slug form-control" value="'.md5(rand(1,9999999999)).'">';
		}

		echo '<style>
		.invoice-item-row input{border-radius: 0; padding: 7px; margin: 7px 7px 0 0;width: 100% !important;}
		.invoice-item-row {margin: 0 0 7px 0;}
		.item-name{width: 70% !important;}
		.item-sku{width: 10% !important}
		.item-price{width: 10% !important}
		.item-actions{width: 10% !important}

		</style>
		<script>



        function recalc_sum(){
        	var sumprice = 0;
	        var value = 0;
	        jQuery( ".item-price input" ).each(function( index, element ) {
	        	value = jQuery(element).val();
	        	sumprice = parseInt(value)+parseInt(sumprice);
			});

			jQuery("input[name=price]").val(sumprice);
        }



		jQuery(".btn-danger").click(function (){
			jQuery(this).parent().parent().remove();
	        recalc_sum();
        });

		jQuery(".btn-success").click(function (){
			var cloneHTML = jQuery(this).parent().parent().html();

			var count_rows = jQuery(".invoice-item-row").length;
			var count_rows_new = count_rows+1;

			
			cloneHTML = cloneHTML.replace("invoices-items["+count_rows+"]", "invoices-items["+count_rows_new+"]");
			// cloneHTML = cloneHTML.replace("invoices-items["+count_rows+"]", "invoices-items["+count_rows_new+"]");
			// cloneHTML = cloneHTML.replace("invoices-items["+count_rows+"]", "invoices-items["+count_rows_new+"]");


			jQuery("tr.invoice-item-row").last().parent().append("<tr class=invoice-item-row>"+cloneHTML+"</tr>");
	        recalc_sum();

        });


		</script>';
	}
}


if(!function_exists('get_plugin_invoice')){
	function get_plugin_invoice(){
		global $currency_symbol;
		include "invoice.php";
	}
}