<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=get_settings('sitename');?></title>

        <meta name="description" content="Premium eCommerce Template">

        <!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Google Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7COswald:300,400,500,600,700" rel="stylesheet">

        <link rel="stylesheet" href="/templates/rosemary/assets/css/plugins.min.css">
        <link rel="stylesheet" href="/templates/rosemary/assets/css/style.css">
        
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="/templates/rosemary/assets/images/icons/favicon.png">

        <!-- Modernizr -->
        <script src="/templates/rosemary/assets/js/modernizr.js"></script>
    </head>
    <body>
        <div id="wrapper" style="zoom: 0.7;">
            <header class="header sticky-header">
                <div class="container">
                    <a href="/" class="site-logo" title="Rosemary" style="background: #000; color: #fff; padding: 4px 20px 4px 20px; font-weight: bold; font-size: 200%;text-transform: 
                    uppercase">
                       Rosemary
                        <span class="sr-only">Rosemary - Layla eshop Template</span>
                    </a>

                    <div class="header-dropdowns">
                        <div class="dropdown header-dropdown">
                            <?php if( empty($_GET['language']) ){
                                $current_lang = get_settings('default_language');
                            }else{
                                $current_lang = $_GET['language'];
                            }
                            ?>

                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?=strtoupper($current_lang);?>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                  <?php
                                  $languages = get_languages();

                                    foreach ($languages as $value) {?>
                                    <li class=""><a href="<?=$value['url'];?>" target="" class="" style="opacity: <?=($value['code'] == $_GET['language'] || ((empty($_GET['language']) && $value['code'] == get_settings('default_language')) ))?'1':'0.5';?>"><?=strtoupper($value['code']);?></a></li><?php } ?>


                            </ul>


                        </div><!-- End .dropddown -->


                    </div><!-- End .header-dropdowns -->
                    <div class="search-form-container"></div>
                    <div class="search-form-container" style="display: none;">
                        <a href="#" class="search-form-toggle" title="Toggle Search"><i class="fa fa-search"></i></a>
                        <form action="#">
                            <div class="dropdown search-dropdown">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                                   All Category
                                    <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Electronics</a></li>
                                    <li><a href="#">Furniture</a></li>
                                    <li><a href="#">Equipments</a></li>
                                </ul>
                            </div><!-- End .dropddown -->
                            <input type="search" class="form-control" placeholder="Search" required>
                            <button type="submit" title="Search" class="btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div><!-- End .search-form-container -->

                    <ul class="top-links">

                                    <?php
                                    $menus = get_main_menu();

                                    foreach ($menus as $value) { $current_page = str_replace('/', '', $_GET['page']);
                                        ?>
                                        <li  class=" <?php if($current_page == $value['original_slug'] || 
                                        ($current_page == '' && $value['original_slug'] == get_settings('default_homepage'))
                                        ){echo 'active';}?>"><a href="<?=$value['slug'];?>"><?=$value['name'];?></a>
                                        </li>
                                        <?php
                                    }
                                        ?>


                    </ul>

                    <div class="dropdown cart-dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="cart-icon">
                                <img src="/templates/rosemary/assets/images/bag.png" alt="Cart">
                                <span class="cart-count"><?=count($_SESSION['cart_items']);?></span>
                            </span>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <p class="dropdown-cart-info">{{You have}} <?=count(array_unique($_SESSION['cart_items']));?> {{products in your cart}}.</p>
                            <div class="dropdown-menu-wrapper">


                                <?php
                                $currency = get_settings('currency');
                                $checkout = find_content('data/pages.csv', 'cart.php');
                                $cart = array_unique($_SESSION['cart_items']);
                                ?>


                                <?php foreach ($cart as $key => $value) {
                                $post = find_content('data/products.csv', $value);

                                if(empty($post['title'])){continue;}
                                $price_sum = $post['attributes']['price']+$price_sum;
                                ?>

                                <div class="product">
                                    <figure class="product-image-container">
                                        <a href="<?=$post['url'];?>" title="<?=$post['title'];?>">
                                            <img src="/files/thumbs/<?=$post['thumb'];?>" alt="<?=$post['title'];?>">
                                        </a>
                                    </figure>

                                    <div>
                                        <a href="?remove-from-cart=<?=$post['slug'];?>" class="btn-delete" title="Delete product" role="button"></a>
                                        <h4 class="product-title"><a href="<?=$post['url'];?>"><?=$post['title'];?></a></h4>
                                        <div class="product-price-container">
                                            <span class="product-price"><?=$post['attributes']['price'];?> <?=$currency_symbol[get_settings('currency')];?></span>
                                        </div><!-- End .product-price-container -->
                                        <div class="product-qty">x1</div><!-- End .product-qty -->
                                    </div><!-- End .product-image-container -->
                                </div><!-- End .product- -->

                                <?php } ?>


                            </div><!-- End .droopdowm-menu-wrapper -->
                            <?php if(count($_SESSION['cart_items']) > 0){ ?>
                            <div class="cart-dropdowm-action">
                                <div class="dropdowm-cart-total"><span>{{TOTAL}}:</span> <?=$price_sum?> <?=$currency;?></div>
                                <a href="/<?=$checkout['slug'];?>/" class="btn btn-primary">{{Checkout}}</a>
                            </div><!-- End .cart-dropdown-action -->
                            <?php } ?>


                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .cart-dropddown -->

                    <a href="#" class="sidemenu-btn" title="Menu Toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </div><!-- End .container-fluid -->
            </header><!-- End .header -->

            <aside class="sidemenu">
                <div class="sidemenu-wrapper">
                    <div class="sidemenu-header">

                            <a href="/" class="site-logo" title="Rosemary" style="background: #000; color: #fff; padding: 7px 20px 7px 20px; font-weight: bold; font-size: 200%;text-transform: 
                    uppercase">
                       Rosemary
                        <span class="sr-only">Rosemary - Layla eshop Template</span>

                        </a>
                    </div><!-- End .sidemenu-header -->

                    <ul class="metismenu">
                        <li><a href="index.html">Home</a></li>
                        <li>
                            <a href="#" aria-expanded="false">Pages <span class="sidemenu-icon"></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="404.html">404 Page</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" aria-expanded="false">Shop <span class="sidemenu-icon"></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="category.html">Category</a></li>
                                <li><a href="product.html">Product</a></li>
                                <li><a href="cart.html">Shopping Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="signin.html">Sign In</a></li>
                                <li><a href="signup.html">Sign Up</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" aria-expanded="false">Portfolio<span class="sidemenu-icon"></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="portfolio-2col.html">Portfolio 2 Col</a></li>
                                <li><a href="portfolio-3col.html">Portfolio 3 Col</a></li>
                                <li><a href="portfolio-4col.html">Portfolio 4 Col</a></li>
                                <li><a href="single-portfolio.html">Portfolio Post</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" aria-expanded="false">Blog<span class="sidemenu-icon"></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="single.html">blog Post</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div><!-- End .sidemenu-wrapper -->
            </aside><!-- End .sidemenu -->

            <div class="sidemenu-overlay"></div><!-- End .sidemenu-overlay -->
            
            <div class="main">