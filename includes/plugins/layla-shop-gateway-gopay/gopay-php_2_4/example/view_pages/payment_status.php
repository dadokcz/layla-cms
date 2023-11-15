<?php
/**
 * Stranka, na kterou je zakaznik presmerovan pri chybne ci zrusene objednavce
 */
require_once('../../api/gopay_helper.php');
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
			<h2 class="head_nadpis2">Vzorová implementace E-shopu</h2>
		</div>
		<div class="content">

			<a href="../../index.php" class="link">&gt;&gt; E-shop</a> |
			<a href="../../example/view_pages/available_payment_methods.php" class="link"> Přehled aktivních platebních metod</a> |
			<a href="../../example/view_pages/account_statement.php" class="link"> Výpis plateb</a> |

			<hr />
			
			<table>
				<tr>
					<td><img src="../images/failure.png"></td>
					<td width="30">&nbsp;</td>
					<td>
						<p style="font-size:15pt;">
							<?php 
								if (! isset($_GET["sessionSubState"])) $_GET["sessionSubState"] = null;
								echo GopayHelper::getResultMessage($_GET["sessionState"], $_GET["sessionSubState"]);
							?>
						</p>
					</td>
				</tr>
			</table>

		</div>

		<div class="foot">
			<br>
			© 2013 GOPAY s.r.o.
		</div>

	</body>

</html>
