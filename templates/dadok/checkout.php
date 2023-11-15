<?php
/* Template name: Checkout */
?>


<?php   
$page = str_replace('/', '', $_GET['page']);
// TRY  TO FIND PAGE
$post = find_content('data/pages.csv', $page);
?>
<!--Start of Main Content-->




<header class="page-header">
<h1 class="page-title"><?=$post['title']; ?></h1>
</header>


<div class="site-content site-woocommerce clearfix" role="main">





<section>
<div class="row">


<form class="woocommerce-form woocommerce-form-login login" method="post" style="display:none;">

    <p>Pokud jste u nás nakupovali dříve, zadejte své údaje do polí níže. Pokud jste nový zákazník přejděte prosím do sekce Fakturace &amp; Doprava.</p>

    <p class="form-row form-row-first">
        <label for="username">Uživatelské jméno nebo email&nbsp;<span class="required">*</span></label>
        <input type="text" class="input-text" name="username" id="username" autocomplete="username">
    </p>
    <p class="form-row form-row-last">
        <label for="password">Heslo&nbsp;<span class="required">*</span></label>
        <input class="input-text" type="password" name="password" id="password" autocomplete="current-password">
    </p>
    <div class="clear"></div>

    <p class="form-row">
        <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="35a00acbae"><input type="hidden" name="_wp_http_referer" value="/pokladna/">        <button type="submit" class="button" name="login" value="Přihlášení">Přihlášení</button>
        <input type="hidden" name="redirect" value="/pokladna/">
        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Zapamatujte si mě</span>
        </label>
    </p>
    <p class="lost_password">
        <a href="/muj-ucet/lost-password/">Zapomněli jste své heslo?</a>
    </p>

    <div class="clear"></div>
    
</form>

<form class="checkout_coupon woocommerce-form-coupon" method="post" style="display:none">

    <p>Pokud máte slevový kupón, použijte ho níže.</p>

    <p class="form-row form-row-first">
        <input type="text" name="coupon_code" class="input-text" placeholder="Kód kupónu" id="coupon_code" value="">
    </p>

    <p class="form-row form-row-last">
        <button type="submit" class="button" name="apply_coupon" value="Použít kupón">Použít kupón</button>
    </p>

    <div class="clear"></div>
</form>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="" enctype="multipart/form-data" novalidate="novalidate">

    <input type="hidden" name="shop-order-submit" value="1">
    
        <div class="col2-set" id="customer_details">
            <div class="col-1">
                <div class="woocommerce-shipping-fields">
    

    <div class="woocommerce-billing-fields__field-wrapper">

                                                
    <?php checkout_forms('shipping'); ?>    
    <div id="billing-alt" style="<?php if(isset($_POST['billing-checkbox']) || empty($_POST)){echo 'display:none;';}else{echo 'display:block;';} ?>">
    <?php checkout_forms('billing'); ?>
    </div>
    </div>
    </div>  <div class="col-2">
    <div class="woocommerce-billing-fields">
    

    <div class="woocommerce-billing-fields__field-wrapper">

        <?php payment_methods(); ?>
    
    </div>
    </div>


            </div>
        </div>

    <div id="order_review" class="woocommerce-checkout-review-order">
     

    
        </div>
        </div>

    </div>




    
</form>
</div>

</section>




<style type="text/css">
    


.woocommerce .col2-set .col-1, .woocommerce-page .col2-set .col-1 {
    float: left;
    width: auto;
}

#billing-alt {

    width: 100%;
}
.checkout .woocommerce-shipping-fields{
width: 40% !important;
}
.woocommerce-billing-fields{
    /*float: right;*/
    /*position: absolute;*/
}

.checkout .woocommerce-billing-fields, .checkout .woocommerce-shipping-fields{
    float: left;
width: 50% !important;
}


.col-2 *{
    width: 500px;
}
 .col-1 input,
 .col-1 select,
 .col-1 textarea{
    /*display: block;*/
    float: left;
    width: 100% !important;
    margin-bottom: 10px;
    font-size: 130%;
 }

 .col-1 input[type="checkbox"],
 .col-1 input[type="radio"]{
    /*display: inline;*/
    width: auto !important;

 }
.site-woocommerce{
    padding-top: 0 !important;
}

.site-woocommerce .col-2{
    margin-top: 45px;
}
</style>

