<?php
/**
 * Stranka zobrazujici aktivni platebni metody GoPay 
 */

require_once("../config.php");
require_once("../../api/gopay_http.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

	<head> 
		<title>Vzorová implementace</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="../../default.css">
	</head>

	<body>
		<div class="head">
			<br /><br />
			<h1 class="head_nadpis">E-shop</h1>
			<h2 class="head_nadpis2">Výpis platebních metod</h2>
		</div>
		<div class="content">

			<a href="../../index.php" class="link">&gt;&gt; E-shop</a> |
			<a href="../../example/view_pages/available_payment_methods.php" class="link"> Přehled aktivních platebních metod</a> |
			<a href="../../example/view_pages/account_statement.php" class="link"> Výpis plateb</a> |

			<hr />

			<?
			$dateFrom = "2013-07-20";
			$dateTo = "2013-07-31";
			$currency = "CZK";
			$contentType = "TYPE_CSV";

			$contents = GopayHTTP::getAccountStatement($dateFrom, $dateTo, GOID, $currency, SECURE_KEY, $contentType);

			/*
			 * Vypis je ukazkovy, proto z duvodu zkraceni doby vypisu do prohlizece 
			 * je vypsano pouze prvnich 10.000 znaku 
			 */
			echo substr($contents,0,10000);
			?>
		</div>

		<div class="foot">
			<br>
			© 2013 GOPAY s.r.o.
		</div>

	</body>

</html>
