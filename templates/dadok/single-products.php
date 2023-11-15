<?php
/* Template name: Single product */
$page = str_replace('/', '', $_GET['page']);
// TRY  TO FIND PAGE
$post = find_content('data/products.csv', $page);
$gallery = $post['gallery'];
$gallery = array_filter($gallery);
?>


<header class="page-header">

<header class="page-header">
<h1 class="page-title">Obchod<a href="/nakupni-kosik/" style="float: right; font-size: 60%; margin-top: 8px;"><span class="cb-title" data-icon="." style="font-size: 100%; float: right; margin: -12px 0 0 20px;"></span><?=count($_SESSION['cart_items']);?> Položky v košíku</a></h1>
</header>



<div class="site-content site-woocommerce clearfix" role="main" style="padding-top:0;">


    <div class="product type-product status-publish has-post-thumbnail product_cat-malby shipping-taxable purchasable product-type-simple product-cat-malby instock">
       
        <div class="images">

            <div class="images-inner owl-carousel owl-theme">

                        <?php for( $i=0; $i<=count($gallery); $i++ ) { if(!$gallery[$i]){continue;}  ?>

                                    <img width="538" height="538" src="/files/thumbs/<?php echo $gallery[$i]; ?>">

                        <?php } ?>


                        </div>
                        <div class="thumbnails owl-carousel owl-theme">

                        <?php for( $i=0; $i<=count($gallery); $i++ ) { if(!$gallery[$i]){continue;} ?>

                                    <img width="235" height="235" class="attachment-shop_thumbnail size-shop_thumbnail" src="/files/thumbs/<?php echo $gallery[$i]; ?>">

                        <?php } ?>

                        </div>


                                </div>
                                <div class="summary entry-summary">
                                    <h1 itemprop="name" class="product_title entry-title"><?=$post['title']; ?></h1>
                                    <div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                                        <p class="price">
                                            <span class="amount" style="color:green;"><?=$post['attributes']['price'];?> <?=$currency_symbol[get_settings('currency')];?></span>
                                        </p>
                                        <meta itemprop="price" content="19900">
                                            <meta itemprop="priceCurrency" content="CZK">
                                                <link itemprop="availability" href="http://schema.org/InStock">
                                                </div>
                                                <div itemprop="description">
                                                    <p><?php echo $post['content']; ?></p>
                                                </div>
                                                <form class="cart" method="post" enctype="multipart/form-data">
                                                    <div class="quantity">
                                                        <!-- <input type="number" step="1" min="1" name="quantity" value="1" title="Množství" class="input-text qty text" size="4"> -->
                                                        </div>
                                                        <!-- <input type="hidden" name="add-to-cart" value="5239"> -->




                                            <a class="single_add_to_cart_button button alt" style="font-size: 100%; padding:7px 17px 7px 17px ; background: green;" href="?add-to-cart=<?=$post['slug']; ?>" class="btn-product btn-add-cart" title="Add to Bag">
                                                <i class="icon-product icon-bag"></i>
                                                <span>{{Add to Bag}} &rsaquo;</span>
                                            </a>




                                                        </form>
                                                        
                                                        <div class="product_meta">
                                                            <!-- <span class="posted_in">Kategorie: 
                                                                <a href="/obchod/malby/" rel="tag">Malby</a>.
                                                            </span> -->
                                                        </div>

                                                    </div>
                                                    <!-- .summary -->
                                                    <div class="woocommerce-tabs" style="display: none">
                                                        <ul class="tabs">
                                                            <li class="description_tab active">
                                                                <a href="#tab-description">Popis</a>
                                                            </li><!-- 
                                                            <li class="reviews_tab">
                                                                <a href="#tab-reviews">Hodnocení (0)</a>
                                                            </li> -->
                                                        </ul>
                                                        <div class="panel entry-content" id="tab-description" style="display: block;">
                                                            <h2>Popis produktu</h2>
                                                            <p><?php if($data[$Array_row]['post_content'] != ''){echo embedYoutube($data[$Array_row]['post_content']);}else{echo $data[$Array_row]['post_excerpt'];} ?></p>
                                                        </div>
                                                        <div class="panel entry-content" id="tab-reviews" style="display: none;">
                                                            <div id="reviews">
                                                                <div id="comments">
                                                                    <h2>Recenze</h2>
                                                                    <p class="woocommerce-noreviews">Zatím zde nejsou žádné recenze.</p>
                                                                </div>
                                                                <div id="review_form_wrapper">
                                                                    <div id="review_form">
                                                                        <div id="respond" class="comment-respond">
                                                                            <h3 id="reply-title" class="comment-reply-title">Buďte první, kdo napíše recenzi “Malba Serenity” 
                                                                                <small>
                                                                                    <a rel="nofollow" id="cancel-comment-reply-link" href="/produkt/malba-serenity/#respond" style="display:none;">Zrušit odpověď na komentář</a>
                                                                                </small>
                                                                            </h3>
                                                                            <form action="/_cms/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate="">
                                                                                <p class="comment-form-rating">
                                                                                    <label for="rating">Vaše hodnocení</label>
                                                                                    <p class="stars">
                                                                                        <span>
                                                                                            <a class="star-1" href="#">1</a>
                                                                                            <a class="star-2" href="#">2</a>
                                                                                            <a class="star-3" href="#">3</a>
                                                                                            <a class="star-4" href="#">4</a>
                                                                                            <a class="star-5" href="#">5</a>
                                                                                        </span>
                                                                                    </p>
                                                                                    <select name="rating" id="rating" style="display: none;">
                                                                                        <option value="">Hodnotit…</option>
                                                                                        <option value="5">Skvělý</option>
                                                                                        <option value="4">Dobrý</option>
                                                                                        <option value="3">Průměrný</option>
                                                                                        <option value="2">Ne tak špatný</option>
                                                                                        <option value="1">Velmi slabý</option>
                                                                                    </select>
                                                                                </p>
                                                                                <p class="comment-form-comment">
                                                                                    <label for="comment">Vaše recenze</label>
                                                                                    <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                                                                </p>
                                                                                <p class="form-submit">
                                                                                    <input name="submit" type="submit" id="submit" class="submit" value="Odeslat">
                                                                                        <input type="hidden" name="comment_post_ID" value="5239" id="comment_post_ID">
                                                                                            <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                                                                            </p>
                                                                                            <input type="hidden" id="_wp_unfiltered_html_comment_disabled" name="_wp_unfiltered_html_comment" value="1c4f0365fe">
                                                                                                <script>(function(){if(window===window.parent){document.getElementById('_wp_unfiltered_html_comment_disabled').name='_wp_unfiltered_html_comment';}})();</script>
                                                                                            </form>
                                                                                        </div>
                                                                                        <!-- #respond -->
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clear"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="related products">
                                                                        <h2>Související produkty</h2>
                                                                        <ul class="products">




                              <?php
                              $post = layla_get_posts('products', 'DESC', 5);
                              //echo '<pre>'; print_r($featured_page); echo '</pre>';
                              ?>

                                <?php $i=-1; $paging=1; foreach ($post as $key => $value) { $i++; $paging++;
                                    // if($i == 0){continue;}
                                    $gallery_featured = explode(',', $value['gallery']); 
                                    $gallery_featured = array_filter($gallery_featured, function($a) { return ($a !== ''); });
                                    $gallery_featured = $gallery_featured[key($gallery_featured)];

                                    if(file_exists('./files/'.$gallery_featured.'')){
                                    $thumb = get_settings('siteurl').'/files/thumbs/'.$gallery_featured;       
                                    }else{
                                    $thumb = '/templates/dadok/images/pic02.jpg';
                                    }       

                                    // $attributes_array = explode(',', $post[$i]['attributes']);
                                    // foreach ($attributes_array as $key => $value) {
                                    // $i++;
                                    
                                    // if(count($value['shipping'])){
                                    // $value = $value['shipping'];
                                    // }}


                                $i2 = $paging-4;

                                  



                            		?>






                                                                            <li class="<?php if($i == 4 ){echo 'last';}elseif($paging % 6 == 1){echo 'first';} ?> post-4993 product type-product status-publish has-post-thumbnail product_cat-malby shipping-taxable purchasable product-type-simple product-cat-malby instock">
                                                                                 <a href="<?php echo $value['slug']; ?>">
                                                                                   
                                                                                   <?php if($thumb){ ?>
                                                                        
                                                                                       <div style="overflow: hidden;width:200px;height:200px;background:url('<?php echo $thumb; ?>') center center;background-size: cover;">
                      </div>
                                                                                        
                                                                                        <?php unset($data[$i]['thumbnail']); } ?>

                                                                                        <h3><?=$post[$i]['name']; ?></h3>
                                                                                        <span class="price">
                                                                                            <span class="amount"><?=$post[$i]['attributes']['price'];?> <?=$currency_symbol[get_settings('currency')];?></span>
                                                                                        </span>
                                                                                    </a>
                                                                                    <a href="/produkt/malba-serenity/?add-to-cart=4993" rel="nofollow" data-product_id="4993" data-product_sku="" data-quantity="1" class="button add_to_cart_button product_type_simple">Přidat do košíku</a>
                                                                            </li>
                                                                            







				                    <?php } ?>

                                                                            </ul>
                                                                        </div>
                                                                        <meta itemprop="url" content="/produkt/malba-serenity/">
                                                                        </div>
                                                                        <!-- #product-5239 -->
                                                                    </div>



