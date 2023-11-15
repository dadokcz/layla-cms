<?php
/* Template name: Cart */
    // print_r($_SESSION['cart_items']);   
?>



<header class="page-header">
<h1 class="page-title">Obchod<a href="/nakupni-kosik/" style="float: right; font-size: 60%; margin-top: 8px;"><span class="cb-title" data-icon="." style="font-size: 100%; float: right; margin: -12px 0 0 20px;"></span><?=count($_SESSION['cart_items']);?> Položky v košíku</a></h1>
</header>


<div class="site-content clearfix" role="main">





<?php
// echo '<pre>';
// print_r($_SESSION['cart_items']); 
// echo '</pre>';
?>
<div class="woocommerce">


                                <?php
                                $currency = get_settings('currency');
                                $checkout = find_content('data/pages.csv', 'checkout.php');

                                if(count($_SESSION['cart_items']) == 0){
?>

 <p> {{No products in cart.}}</p>

                                <?php }else{?>
<p>{{You have}} <?=cart_items_count();?> {{products in your cart}}.</p>


                                <?php } ?>


<?php //get_cart_contents($_SESSION['cart_items']);?>

    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
        <thead>
            <tr>
                <th class="product-remove">&nbsp;</th>
                <th class="product-thumbnail">&nbsp;</th>
                <th class="product-name">Produkt</th>
                <th class="product-price">Cena</th>
                <th class="product-quantity">Množství</th>
                <th class="product-subtotal">Cena celkem</th>
            </tr>
        </thead>
        <tbody>
            

                                <?php


                                foreach ($_SESSION['cart_items'] as $key => $value) { 
                                
                                if( !isset($value['product']) ){continue;}
                                $post = find_content('data/products.csv', $value['product']);
                                if(empty($post['title']) || !isset($post['title']) ){continue;}
                                $price_sum = $post['attributes']['price']+$price_sum;
                                
                                ?>






                                <tr class="woocommerce-cart-form__cart-item cart_item">

                        <td class="product-remove">
                            <a href="?remove-from-cart=<?=$post['slug'];?>" class="remove" aria-label="{{Delete product}}" data-product_id="16" data-product_sku="">×</a>                        </td>

                        <td class="product-thumbnail">
                        <a href="/<?=$post['slug'];?>"><img style="height:60px;width:auto;" src="/files/thumbs/<?=$post['thumb'];?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt=""></a>                      </td>

                        <td class="product-name" data-title="Produkt">
                        <a href="/<?=$post['slug'];?>"><?=$post['title'];?></a>                     </td>

                        <td class="product-price" data-title="Cena">
                            <span class="woocommerce-Price-amount amount"><?=$post['attributes']['price'];?> <?=$currency_symbol[get_settings('currency')];?></span></span>                      </td>

                        <td class="product-quantity" data-title="Množství">
                            <div class="quantity"><form method="get" action="/nakupni-kosik/" class="myForm">
        <label class="screen-reader-text" for="quantity_5c917b58a81ac">Množství</label><input type="hidden" name="set-product-sku-cart" value="<?=$value['product'];?>">
        <input type="number" class="quantityInput input-text qty text" step="1" min="0" max="16" name="sku" value="<?=$value['sku'];?>" title="Množství" size="4" pattern="[0-9]*" inputmode="numeric"><input type="submit" value=">"></form>
    </div>
                            </td>

                        <td class="product-subtotal" data-title="Cena celkem">
                            <span class="woocommerce-Price-amount amount"><?=$post['attributes']['price']*$value['sku'];?>&nbsp;<span class="woocommerce-Price-currencySymbol"><?=$currency_symbol[get_settings('currency')];?></span></span>                      </td>
                    </tr>



                                <?php } ?>


                                <script type="text/javascript">
                               // var timestamps = document.getElementsByClassName("quantityInput");



                              //for (var i = 0; i < timestamps.length; i++) {
                                //    timestamps[i].addEventListener("change", function (evt) {
                                //        myEventHandler(evt);
                                //    }, false);
                                //}


                                //function myEventHandler(event) {
                                 //   document.getElementsByClassName("myForm")[0].submit();
                                //}



                                </script>



                    
            
            <tr>
                <td colspan="6" class="actions" style="padding-top:16px;">

                            <form method="get" action="/nakupni-kosik/" class="">
                            <div class="coupon" style="display: ;">
                            <label for="coupon_code">{{Coupon Discount}}:</label>
                            <?php if(!isset($_SESSION['cart_items']['discount']['code'])){ ?>
                            <input type="text" name="discount-coupon" class="input-text" id="coupon_code" value="" placeholder="Kód kupónu" style="padding: 6px; border-radius: 6px;"> <input type="submit" class="button" value="{{Apply Code}}">
                            <?php }else{ echo $_SESSION['cart_items']['discount']['code'].' / - '.$_SESSION['cart_items']['discount']['value'].' '.$currency_symbol[get_settings('currency')]; echo ' <a href="?discount-remove=1">[{{Remove}}]</a>'; } ?>

                            </div>
                            </form>
                    
                    <a class="button" href="?remove-cart=1">Vyprázdnit košík</a>

                    
                    <input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce" value="3313f245e5"><input type="hidden" name="_wp_http_referer" value="/kosik/">             </td>
            </tr>

                    </tbody>
    </table>


<div class="cart-collaterals">
    <div class="cart_totals ">

    
    <div class="wc-proceed-to-checkout" style="float:right;">
        
        <?php if(count($_SESSION['cart_items']) > 0){ ?>
<a href="/objednavka/" class="checkout-button button alt wc-forward">
    {{Proceed to Checkout}}</a>
<?php } ?>
    </div>

    
</div>
</div>

</div>



</div>



