<?php
/* Template name: Order detail */
?>


<?php   
$page = str_replace('/', '', $_GET['page']);

if(isset($query['post_type'])){
	$source = $query['post_type'].'.csv';
}else{
	$source = 'orders.csv';	
}

// TRY  TO FIND PAGE
$post = find_content('./data/'.$source.'', $page);

?>



<header class="page-header">
<h1 class="page-title">Obchod<a href="/nakupni-kosik/" style="float: right; font-size: 60%; margin-top: 8px;"><span class="cb-title" data-icon="." style="font-size: 100%; float: right; margin: -12px 0 0 20px;"></span><?=count($_SESSION['cart_items']);?> Položky v košíku</a></h1>
</header>


<div class="site-content clearfix" role="main">







<section>
<div class="row">

<h1><?=$post['title']; ?></h1>
<?=$post['content']; ?>

<?php echo get_cart_contents($post['attributes']['cart'], $slug);?>





    <div class="button_buy">
    <a style="float:right; margin-left: 10px;" href="?get_order_invoice=<?=$page;?>&orderid=<?=$post['id'];?>" class="gradient gradient-gray" title="Koupit Knihu"> <span class="button_text">Faktura (PDF)</span></a>

    <?php

if($post['attributes']['payment_state'] != 'paid' && $post['attributes']['state'] != 'completed'){
/*
$camp = array();
$camp_unique = array();
$next2 = -1;
//--- get all the directories
$dirname = './includes/plugins/layla-shop-gateway-*';
$findme  = "*index.php";
$dirs    = glob($dirname.'*', GLOB_ONLYDIR);
$files   = array();
// print_r($dirs);
foreach ($dirs as $key => $value) {

$css_read = file_get_contents($value.'/index.php');
preg_match('/Plugin name: (.*) /', $css_read, $matches, PREG_OFFSET_CAPTURE, 0);
// preg_match('/Plugin description: (.*) /', $css_read, $matches_desc, PREG_OFFSET_CAPTURE, 0);
// preg_match('/Author: (.*) /', $css_read, $matches2, PREG_OFFSET_CAPTURE, 0);
// preg_match('/Plugin category: (.*) /', $css_read, $matches3, PREG_OFFSET_CAPTURE, 0);
$plugin_name = $matches[1][0];
// $plugin_description = $matches_desc[1][0];
// $plugin_author = $matches2[1][0];
// $plugin_category = $matches3[1][0];
$basename = basename($value);

global $currency_symbol;

if(strpos(get_settings('plugins'), $basename) !== false){

  if( get_settings(slugify($plugin_name).'-price') ){
    $price = ' - '.get_settings(slugify($plugin_name).'-price').' '.$currency_symbol[get_settings('currency')];
    $price_format = get_settings(slugify($plugin_name).'-price');
  }else{
    $price = '{{Free}}';
    $price_format = '0';
  }

  if(isset($_POST['payment_method'])){

    ob_get_clean();
    if(file_exists('./includes/plugins/layla-shop-gateway-'.$_POST['payment_method'].'/process.php')){

    $payment_title      = $_POST['payment_method'];
    $payment_name       = $_POST['payment_method'];
    $payment_description  = $_POST['payment_method'];

    include './includes/plugins/layla-shop-gateway-'.$_POST['payment_method'].'/process.php';
    die();
  }





  }
  
  ?>
  <form method="post" action="#">
  <input type="hidden" name="shop-order-pay" value="1" />
  <input type="hidden" name="orderNumber" value="<?php echo $post['id']; ?>" />
  <input type="hidden" name="totalPrice" value="<?php echo $post['attributes']['price']; ?>" />
  <input type="hidden" name="currency" value="<?php echo $currency; ?>" />
  <input type="hidden" name="productName" value="<?php echo $post['title'] ?>" />
  <input type="hidden" name="firstName" value="<?php echo $post['shipping-first-name'] ?>" />
  <input type="hidden" name="lastName" value="<?php echo $post['shipping-last-name'] ?>" />
  <input type="hidden" name="lang" value="<?php echo $lang; ?>" />

  <input type="hidden" name="city" value="<?php echo $city ?>" />
  <input type="hidden" name="street" value="<?php echo $street ?>" />
  <input type="hidden" name="postalCode" value="<?php echo $postalCode ?>" />
  <input type="hidden" name="email" value="<?php echo $email ?>" />

  <input type="hidden" name="payment_method" value="<?php echo slugify($plugin_name) ?>" />
  <?php

  echo '
    <button style="float:right;" type="submit" class="button alt wc-proceed-to-checkout gradient" name="woocommerce_checkout_place_order" id="place_order" value="Objednat" data-value="Objednat">{{Pay through}} '.$plugin_name.'</button>
    </form>';


  // }
}

}
*/
}

?>







</section>


</div>
