
                                <div class="product">
                                    <figure class="product-image-container">
                                        <a href="<?=$post[$i]['slug']; ?>" title="Product Name" class="product-image-link">
                                        	<?php if($lazy == 1){ ?>
                                            <img src="<?=$thumb;?>" data-src="<?=$thumb;?>"  alt="Product Image">
                                        	<?php }else{ ?>
                                            <img src="<?=$thumb;?>" alt="Product Image">
                                        	<?php } ?>
                                        </a>
                                        <!-- <span class="product-label">-55%</span> -->
                                        <!-- <a href="#" class="btn-quick-view">Quick View</a> -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-wishlist" title="Add to Wishlist">
                                                <i class="icon-product icon-heart"></i>
                                            </a>
                                            <a href="?add-to-cart=<?=$post[$i]['original_slug']; ?>" class="btn-product btn-add-cart" title="Add to Bag">
                                                <i class="icon-product icon-bag"></i>
                                                <span>{{Add to Bag}}</span>
                                            </a>
                                            <!-- <a href="#" class="btn-product btn-compare" title="Add to Compare">
                                                <i class="icon-product icon-bar"></i>
                                            </a> -->
                                        </div><!-- End .product-action -->
                                    </figure>
                                    <h3 class="product-title">
                                        <a href="<?=$post[$i]['slug']; ?>"><?=$post[$i]['name']; ?></a>
                                    </h3>
                                    <div class="product-price-container">
                                        <span class="product-price"><?=$post[$i]['attributes']['price'];?> <?=$currency_symbol[get_settings('currency')];?></span>
                                    </div><!-- Endd .product-price-container -->
                                </div><!-- End .product -->
