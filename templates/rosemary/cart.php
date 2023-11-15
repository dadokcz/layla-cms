<?php
/* Template name: Cart */
?>

<?php 
    // print_r($_SESSION['cart_items']);   
	$page = str_replace('/', '', $_GET['page']);
    $post = find_content('data/pages.csv', $page);
    ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header text-center">
                                <h1><?=$post['title']; ?></h1>
                                <p>{{You have}} <?=count($_SESSION['cart_items']);?> {{products in your cart}}.</p>



                            </div><!-- End .page-header -->

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>{{Product Name}}</th>
                                            <th>{{Price}}</th>
                                            <th>{{Quantity}}</th>
                                            <th>{{Total}}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>




                                <?php
                                $currency = get_settings('currency');
                                $checkout = find_content('data/pages.csv', 'checkout.php');

                                if(count($_SESSION['cart_items']) == 0){
                                	echo '<tr><td colspan="4" align="center">{{No products in cart.}}</td></tr>';
                                }
                                ?>



                                <?php foreach ($_SESSION['cart_items'] as $key => $value) { ?>
                                <?php $post = find_content('data/products.csv', $value);

                                if(empty($post['title'])){continue;}
                                $price_sum = $post['attributes']['price']+$price_sum;
                                ?>


                                        <tr>
                                            <td class="product-col">
                                                <div class="product">
                                                    <figure class="product-image-container">
                                                        <a href="/<?=$post['slug'];?>">
                                                            <img src="/files/thumbs/<?=$post['thumb'];?>" alt="<?=$post['title'];?>" style="width: auto; height: 60px;">
                                                        </a>
                                                    </figure>
                                                    <h3 class="product-title">
                                                        <a href="/<?=$post['slug'];?>"><?=$post['title'];?></a>
                                                    </h3>
                                                </div><!-- End .product -->
                                            </td>
                                            <td class="price-col"><?=$post['attributes']['price'];?> <?=$currency_symbol[get_settings('currency')];?></td>
                                            <td class="quantity-col">
                                                <input class="cart-product-quantity form-control" type="text">
                                            </td>
                                            <td class="total-col"><?=$post['attributes']['price'];?> <?=$currency_symbol[get_settings('currency')];?></td>
                                            <td class="delete-col"><a href="?remove-from-cart=<?=$post['slug'];?>" class="btn-delete" title="{{Delete product}}" role="button"></a></td>
                                        </tr>



                                <?php } ?>



                                    </tbody>
                                </table>
                            </div><!-- End .table-responsive -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="cart-discount">
                                        <h3>{{Coupon Discount}}</h3>
                                        <p>{{Enter your coupon code if you have one}}</p>

                                        <form action="#">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="{{Enter your coupon code}}">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn">{{Apply Code}}</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div><!-- End .cart-discount -->
                                </div><!-- End .col-sm-7 -->

                                <div class="col-sm-6 col-sm-offset-0">
                                    <div class="cart-proceed">
                                        <p class="cart-subtotal"><span>{{SUB TOTAL}}:</span> $405.00</p>
                                        <p class="cart-total"><span>{{Grand TOTAL}}:</span> <span class="text-accent">$405.00</span></p>
                                        
                                        <a href="?remove-cart=1" class="btn btn-accent">{{Empty cart}}</a> <a href="/<?=$checkout['slug'];?>" class="btn btn-accent">{{Proceed to Checkout}}</a>

                                    </div><!-- Endd .cart-proceed -->
                                </div><!-- End .col-sm-4 -->
                            </div><!-- End .row -->
                        </div><!-- End .col-md-9 -->

                    </div><!-- End .row -->
                </div><!-- End .container -->
         