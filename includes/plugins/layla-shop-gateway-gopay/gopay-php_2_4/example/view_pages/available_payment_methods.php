<?php
/**
 * Stranka zobrazujici aktivni platebni metody GoPay 
 */

require_once("../config.php");
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
			<h2 class="head_nadpis2">Přehled aktivních platebních metod</h2>
		</div>
		<div class="content">

			<a href="../../index.php" class="link">&gt;&gt; E-shop</a> |
			<a href="../../example/view_pages/available_payment_methods.php" class="link"> Přehled aktivních platebních metod</a> |
			<a href="../../example/view_pages/account_statement.php" class="link"> Výpis plateb</a> |

			<hr />
			
			<?
			$style = 'style="background-color:lightgray"';
			?>
			
			<table cellspacing="0" cellpadding="3" style="border:1px solid lightgray">
				<tr>
					<td <?echo $style?>>Logo</td>
					<td <?echo $style?>>Název platební metody</td>
					<td <?echo $style?>>Kód </td>
					<td <?echo $style?>>Offline metoda</td>
					<td <?echo $style?>>Podporovaná měna</td>
					<td <?echo $style?>></td>
				</tr>
	
				<?
				require_once('../../api/gopay_soap.php');
				$paymentMethodList = GopaySoap::paymentMethodList();
				for ($i = 0; $i < count($paymentMethodList); $i++) {
					$lok_style = ($i % 2 == 0) ? "" : $style;

					$offline = ($paymentMethodList[$i]->offline == 1) ? "ano" : "ne";
					echo "<tr>";
						echo "<td " . $lok_style . "><img src='" . $paymentMethodList[$i]->logo . "'></td>";
						echo "<td " . $lok_style . ">" . $paymentMethodList[$i]->paymentMethod . "</td>";
						echo "<td " . $lok_style . ">" . $paymentMethodList[$i]->code . "</td>";
						echo "<td " . $lok_style . " align='center'>" . $offline . "</td>";
						echo "<td " . $lok_style . ">" . $paymentMethodList[$i]->supportedCurrency . "</td>";
						echo "<td " . $lok_style . ">" . $paymentMethodList[$i]->description . "</td>";
					echo "</tr>";
				}
				?>

			</table>
						
		</div>

		<div class="foot">
			<br>
			© 2013 GOPAY s.r.o.
		</div>

	</body>

</html>
