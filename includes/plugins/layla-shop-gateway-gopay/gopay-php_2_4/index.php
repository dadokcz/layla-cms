<?php
require_once("example/config.php");
require_once('api/gopay_helper.php');

require_once('example/order.php');

/*
 * 
 * V souboru config.php nastavte udaje odpovidajici eshopu (GoId a secret pridelene eshopu od GoPay)
 * a URL umisteni tohoto vzoroveho eshopu - parametr HTTP_SERVER
 * 
 */
header('Location: ' . HTTP_SERVER . "example/view_pages/cart.php");
?>
