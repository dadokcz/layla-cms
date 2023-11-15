<?php
/* Template name: Obchod */
?>


<header class="page-header">
<h1 class="page-title">Obchod<a href="/nakupni-kosik/" style="float: right; font-size: 60%; margin-top: 8px;"><span class="cb-title" data-icon="." style="font-size: 100%; float: right; margin: -12px 0 0 20px;"></span><?=count($_SESSION['cart_items']);?> Položky v košíku</a></h1>
</header>

 <?php
                              $post = layla_get_posts('products', 'DESC', 50);
                              //echo '<pre>'; print_r($featured_page); echo '</pre>';
                              ?>
                              

<div class="site-content clearfix" role="main">
    <div class="flow-woocommerce-content">
        <p class="woocommerce-result-count">
	Zobrazení všech <?php echo count($post); ?> výsledků</p>
        <form class="woocommerce-ordering" method="get">
          <!--   <select name="orderby" class="orderby">
                <option value="menu_order" selected="selected">Výchozí třídění</option>
                <option value="popularity">Seřadit podle oblíbenosti</option>
                <option value="rating">Seřadit podle průměrného hodnocení</option>
                <option value="date">Seřadit od nejnovějšího</option>
                <option value="price">Seřadit podle ceny: od nejnižší k nejvyšší</option>
                <option value="price-desc">Seřadit podle ceny: od nejvyšší k nejnižší</option>
            </select> -->

            </form>
            <ul class="products">


                             

                                <?php
                                $i=-1; $paging=1; foreach ($post as $key => $value) { $i++; $paging++;
                                  $q++;
                                    // if($i == 0){continue;}
                                    $gallery_featured = explode(',', $value['gallery']); 
                                    $gallery_featured = array_filter($gallery_featured, function($a) { return ($a !== ''); });
                                    $gallery_featured = $gallery_featured[key($gallery_featured)];

                                    if(file_exists('./files/'.$gallery_featured.'')){
                                    $thumb = get_settings('siteurl').'/files/thumbs/'.$gallery_featured;  
                                    // $thumb = '/templates/dadok/images/bg.jpg';     
                                    }else{
                                    $thumb = '/templates/dadok/images/bg.jpg';
                                    }       

                                    // $attributes_array = explode(',', $value['attributes']);
                                    // foreach ($attributes_array as $key => $value) {
                                    // $i++;
                                    
                                    // if(count($value['shipping'])){
                                    // $value = $value['shipping'];
                                    // }}


                                $i2 = $paging-4;

                                  

                                // print_r($value);

                            		?>


                <li class="<?php if($i2 % 4 == 1 ){echo 'last';}elseif($paging % 4 == 1){echo 'first';} ?> product type-product status-publish has-post-thumbnail product_cat-aplikace product_cat-ostatni shipping-taxable purchasable product-type-simple product-cat-aplikace product-cat-ostatni instock" style="">


                    <a href="<?=$value['slug']; ?>">

                     <?php if($thumb){ ?>
                      <!-- <div style="overflow: hidden;width:270px;height:270px;background:url('<?php echo $thumb; ?>') center center ;background-size: cover;">
                      </div> -->
                      <img src="<?php echo $thumb; ?>" />
                     <?php unset($thumb); } ?>


                            <h3><?=$value['name']; ?></h3>
                              <center style="color:#000;">★★★★★</center>

                            <span class="price">
                                <span class="amount"><?=$value['attributes']['price'];?> <?=$currency_symbol[get_settings('currency')];?></span>
                            </span>
                          
                          </a>



		</li>







				                    <?php } ?>


                                    </ul>
                                </div>
                                <?php

      //                           <div id="sidebar" class="site-sidebar" role="complementary">
      //                               <div class="sidebar-shadow"></div>
      //                               <aside id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter">
      //                                   <h3 class="widget-title">Filtrovat podle ceny</h3>
      //                                   <form method="get" action="/obchod/">
      //                                       <div class="price_slider_wrapper">
      //                                           <div class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" style="">
      //                                               <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
      //                                               <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span>
      //                                               <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 100%;"></span>
      //                                           </div>
      //                                           <div class="price_slider_amount">
      //                                               <input type="text" id="min_price" name="min_price" value="" data-min="350" placeholder="Minimální cena" style="display: none;">
      //                                                   <input type="text" id="max_price" name="max_price" value="" data-max="39000" placeholder="Maximální cena" style="display: none;">
      //                                                       <button type="submit" class="button">Filtr</button>
      //                                                       <div class="price_label" style="">
						// Cena: 
      //                                                           <span class="from">350 Kč</span> — 
      //                                                           <span class="to">39000 Kč</span>
      //                                                       </div>
      //                                                       <div class="clear"></div>
      //                                                   </div>
      //                                               </div>
      //                                           </form>
      //                                       </aside>
      //                                       <aside id="woocommerce_widget_cart-2" class="widget woocommerce widget_shopping_cart">
      //                                           <h3 class="widget-title">Košík</h3>
      //                                           <div class="widget_shopping_cart_content">
      //                                               <ul class="cart_list product_list_widget ">
      //                                                   <li class="empty">Žádné produkty v košíku.</li>
      //                                               </ul>
      //                                               <!-- end product list -->
      //                                           </div>
      //                                       </aside>
      //                                       <aside id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
      //                                           <h3 class="widget-title">Kategorie produktů</h3>
      //                                           <ul class="product-categories">
      //                                               <li class="cat-item cat-item-142">
      //                                                   <a href="/obchod/aplikace/">Aplikace</a>
      //                                                   <span class="count">(1)</span>
      //                                               </li>
      //                                               <li class="cat-item cat-item-113">
      //                                                   <a href="/obchod/knihy/">Knihy</a>
      //                                                   <span class="count">(1)</span>
      //                                               </li>
      //                                               <li class="cat-item cat-item-145">
      //                                                   <a href="/obchod/malby/">Malby</a>
      //                                                   <span class="count">(2)</span>
      //                                               </li>
      //                                               <li class="cat-item cat-item-122">
      //                                                   <a href="/obchod/ostatni/">Ostatní</a>
      //                                                   <span class="count">(1)</span>
      //                                               </li>
      //                                               <li class="cat-item cat-item-143">
      //                                                   <a href="/obchod/propagacni-predmety/">Propagační předměty</a>
      //                                                   <span class="count">(2)</span>
      //                                               </li>
      //                                           </ul>
      //                                       </aside>
      //                                   </div>

                                        ?>
                                    </div>