<?php
/* Template name: Single product */
$page = str_replace('/', '', $_GET['page']);
// TRY  TO FIND PAGE
$post = find_content('data/products.csv', $page);
$gallery = $post['gallery'];
$gallery = array_filter($gallery);

?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="product-gallery-container">
                                    <div class="product-zoom-wrapper">
                                        <div class="product-zoom-container">

                                        <img class="xzoom" id="product-zoom" src="/files/<?=$post['thumb'];?>" data-xoriginal="/files/<?=$post['thumb'];?>" alt="Zoom image"/>
                                        </div><!-- End .product-zoom-container -->
                                    </div><!-- End .product-zoom-wrapper -->

                                    <div class="product-gallery-wrapper">
                                        <div class="owl-data-carousel owl-carousel product-gallery"
                                            data-owl-settings='{ "items":4, "margin":14, "nav": true, "dots":false }'
                                            data-owl-responsive='{"240": {"items": 2}, "360": {"items": 3}, "768": {"items": 4}, "992": {"items": 3}, "1200": {"items": 4} }'>

                                            <?php foreach ($gallery as $key => $value) {?>

                                            <a href="/files/<?=$value;?>" data-image="/files/<?=$value;?>" data-zoom-image="/files/<?=$value;?>" class="product-gallery-item">
                                                <img src="/files/<?=$value;?>" alt="product-small-1">
                                            </a>

                                            <?php } ?>

                                        </div><!-- End .product-gallery -->
                                    </div><!-- End .product-gallery-wrapper -->
                                </div><!-- End .product-gallery-container -->

                                <div class="product-details">
                                    <h2 class="product-title"><?=$post['title'];?></h2>
                                    
                                    <div class="product-meta-row">
                                        <div class="product-price-container">
                                            <span class="product-price"><?=$post['attributes']['price'];?> <?=$currency_symbol[get_settings('currency')];?></span>
                                        </div><!-- Endd .product-price-container -->

                                        <div class="product-ratings-wrapper">
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .ratings-container -->

                                        <?php /*
                                            <a class="ratings-link" href="#reviews" title="Reviews">30 Reviews</a>
                                            */?>
                                        </div><!-- End .product-ratings-wrapper -->




                                    </div><!-- End .product-meta-row -->
                                    <div class="product-content">
                                        <p><?=$post['content'];?></p>
                                    </div><!-- End .product-content -->

                                    <ul class="product-meta-list">
                                        <li><label>{{Availability}}:</label> <?=$post['attributes']['sku'];?> </li>
                                    </ul>
                                    
                                    <?php /* 
                                    <label>Color:</label>
                                    <ul class="filter-color-list">
                                        <li class="active">
                                            <span class="filter-color" style="background-color: #575057;"></span>
                                        </li>
                                        <li>
                                            <span class="filter-color" style="background-color: #d3b396;"></span>
                                        </li>
                                        <li>
                                            <span class="filter-color" style="background-color: #080808;"></span>
                                        </li>
                                        <li>
                                            <span class="filter-color" style="background-color: #e6e4e6;"></span>
                                        </li>
                                    </ul>

                                    <label>Size:</label>
                                    <ul class="filter-size-list">
                                        <li class="active">
                                            <span class="filter-size">S</span>
                                        </li>
                                        <li>
                                            <span class="filter-size">M</span>
                                        </li>
                                        <li>
                                            <span class="filter-size">L</span>
                                        </li>
                                        <li>
                                            <span class="filter-size">XL</span>
                                        </li>
                                    </ul>
                                    */
                                    ?>
                                    <div class="product-action">
                                        <div class="product-quantity">
                                            <label>{{Quantity}}:</label>
                                            <input class="single-product-quantity form-control" type="text">
                                        </div><!-- end .product-quantity -->
                                        
                                        <a href="?add-to-cart=<?=$post['slug']; ?>" class="btn btn-accent btn-addtobag">Add to Bag</a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product-details -->
                            </div><!-- End .row -->

<?php /*
                            <div class="product-details-tab">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
                                    <!-- <li role="presentation"><a href="#information" aria-controls="information" role="tab" data-toggle="tab">Information</a></li> -->
                                    <!-- <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Reviews</a></li> -->
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="description">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,</p>
                                        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                                    </div><!-- End .tab-pane -->
                                    <div role="tabpanel" class="tab-pane" id="information">
                                        <div class="table-responsive">
                                            <table class="table product-info-table">
                                                <tbody>
                                                    <tr>
                                                        <td>Weight:</td>
                                                        <td>50 KG</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dimensions:</td>
                                                        <td>120 x 120 x 120 cm</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Material:</td>
                                                        <td>Wood, Leather</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Colors:</td>
                                                        <td>Beige, Black</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Size:</td>
                                                        <td>SM, MD, LG</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other Info:</td>
                                                        <td>Comfort Couch Classic sigle Seater Soft is Relax in supreme comfort.</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><!-- End .table-responsive -->
                                    </div><!-- End .tab-pane -->
                                    <div role="tabpanel" class="tab-pane" id="reviews">
                                        <div class="product-reviews comments">
                                            <ul class="comments-list media-list">
                                                <li class="media">
                                                    <div class="comment">
                                                        <div class="media-left">
                                                            <img class="media-object" src="assets/images/blog/user.png" alt="User">
                                                        </div><!-- End .media-left -->
                                                        <div class="media-body">
                                                            <h4 class="media-heading">Mathew joseph</h4>
                                                            <div class="ratings-container">
                                                                <div class="product-ratings">
                                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                                </div><!-- End .product-ratings -->
                                                            </div><!-- End .ratings-container -->
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis laoreet cursus. Cras nec condimentum dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis laoreet cursus. Cras nec condimentum dolor.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer mollis laoreet cursus. Cras nec condimentum dolor.</p>
                                                        </div><!-- End .media-body -->
                                                    </div><!-- End .comment -->
                                                </li>
                                            </ul>
                                        </div><!-- End .comments -->
                                        <div class="review-form-container">
                                            <h3>LEAVE A REVIEW</h3>
                                            <form action="#" method="post">
                                                <label>Your Rating*</label>
                                                <div class="form-group clearfix">
                                                    <fieldset class="rate-field">
                                                        <input type="radio" id="star5" name="rating" value="5">
                                                        <label for="star5" title="5 stars"></label>

                                                        <input type="radio" id="star4" name="rating" value="4" checked>
                                                        <label for="star4" title="4 stars"></label>

                                                        <input type="radio" id="star3" name="rating" value="3">
                                                        <label for="star3" title="3 stars"></label>

                                                        <input type="radio" id="star2" name="rating" value="2">
                                                        <label for="star2" title="2 stars"></label>

                                                        <input type="radio" id="star1" name="rating" value="1">
                                                        <label for="star1" title="1 star"></label>
                                                    </fieldset>
                                                </div><!-- End .form-group -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Name*</label>
                                                            <input type="text" class="form-control" required>
                                                        </div><!-- End .form-group -->
                                                    </div><!-- End .col-sm-6 -->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>E-mail adddress</label>
                                                            <input type="email" class="form-control" required>
                                                        </div><!-- End .form-group -->
                                                    </div><!-- End .col-sm-6 -->
                                                </div><!-- End .row -->

                                                <div class="form-group mb20">
                                                    <label>Your Review*</label>
                                                    <textarea cols="30" rows="5" class="form-control"></textarea>
                                                </div>

                                                <div class="text-right">
                                                    <input type="submit" class="btn btn-accent min-width" value="Submit">
                                                </div><!-- End .text-right -->
                                            </form>
                                        </div><!-- End #respond -->
                                    </div><!-- End .tab-pane -->
                                </div>
                            </div><!-- End .product-details-tab -->
                            */ ?>
                            
                            <h3 class="carousel-title">{{Also Purchased}}</h3>
                            <div class="owl-data-carousel owl-carousel"
                            data-owl-settings='{ "items":4, "nav": true, "dots":false }'
                            data-owl-responsive='{ "480": {"items": 2}, "768": {"items": 3}, "992": {"items": 3}, "1200": {"items": 4} }'>


                                <?php $post = layla_get_posts('products', 'DESC', 6); //echo '<pre>'; print_r($featured_page); echo '</pre>';
                                shuffle($post);
                                ?>

                                <?php $i=-1; foreach ($post as $key => $value) { $i++;
                                    if($i == 0){continue;}
                                    $gallery_featured = explode(',', $post[$i]['gallery']); 
                                    $gallery_featured = array_filter($gallery_featured, function($a) { return ($a !== ''); });
                                    $gallery_featured = $gallery_featured[key($gallery_featured)];

                                    if(file_exists('./files/'.$gallery_featured.'')){
                                    $thumb = get_settings('siteurl').'/files/'.$gallery_featured;       
                                    }else{
                                    $thumb = '/templates/loco/images/pic02.jpg';
                                    }       
                                    ?>

                                    <?php $lazy = 1; include "content-product.php"; ?>
                                <?php } ?>


                            </div><!-- End .owl-data-carousel -->

                            <div class="mb50"></div><!-- margin -->
                        </div><!-- End .col-md-9 -->


                    </div><!-- End .row -->
                </div><!-- End .container -->
