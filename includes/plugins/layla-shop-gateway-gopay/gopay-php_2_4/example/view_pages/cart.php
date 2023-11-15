<?php
/**
 * Stranka simulujici nakupni kosik. 
 * Pro testovaci ucely je jiz "objednavka" prednastavena
 */

require_once("../config.php");
require_once('../order.php');

$order = new Order();
$order->load();
?>

<form method="post" action="<?php echo ACTION_URL?>">
<input type="submit" name="buy" value="Koupit" class="button">
</form>

						