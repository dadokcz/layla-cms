<?php
/* Template name: Shop */
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">


                        <?php
                        $page = str_replace('/', '', $_GET['page']);


                        // TRY  TO FIND PAGE
                        $post = find_content('data/pages.csv', $page);
                        // print_r($post);
            //          $featured_page = layla_get_posts('DESC', 0);
                        // $gallery_featured = explode(',', $featured_page[0]['gallery']); 
                        // $gallery_featured = array_filter($gallery_featured, function($a) { return ($a !== ''); });
                        // $gallery_featured = $gallery_featured[key($gallery_featured)];

                        ?>
                        <!-- Featured Post -->
            


                            <section class="post">

                                <p><?=$post['content']; ?></p>
                            </section>




            <div class="category-header">
                <h1><?=$post['title']; ?></h1>
                <ol class="breadcrumb">
                    <li><a href="#">Home &amp; Garden</a></li>
                    <li class="active">Home Decor</li>
                </ol>
            </div>

            <div class="shop-row">
                <div class="shop-container max-col-4" data-layout="fitRows">

                              <?php
                              $post = layla_get_posts('products', 'DESC', 100);
                              //echo '<pre>'; print_r($featured_page); echo '</pre>';
                              ?>

                                <?php $i=-1; foreach ($post as $key => $value) { $i++;
                                    // if($i == 0){continue;}
                                    $gallery_featured = explode(',', $post[$i]['gallery']); 
                                    $gallery_featured = array_filter($gallery_featured, function($a) { return ($a !== ''); });
                                    $gallery_featured = $gallery_featured[key($gallery_featured)];

                                    if(file_exists('./files/'.$gallery_featured.'')){
                                    $thumb = get_settings('siteurl').'/files/'.$gallery_featured;       
                                    }else{
                                    $thumb = '/templates/rosemary/images/pic02.jpg';
                                    }       

                                    $attributes_array = explode(',', $post[$i]['attributes']);
                                    foreach ($attributes_array as $key => $value) {
                                    $i++;
                                    
                                    if(count($value['shipping'])){
                                    $value = $value['shipping'];
                                    }}

                                    ?>




                    <div class="product-item">
                        <?php include "content-product.php"; ?>
                    </div><!-- End .product-item -->

                    <?php } ?>

                </div><!-- End .shop-container -->
            </div><!-- End .shop-row -->
<!-- 
            <nav aria-label="Page Navigation">
                <ul class="pagination">
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li class="dots"><span>...</span></li>
                    <li><a href="#">18</a></li>
                </ul>
            </nav> -->
        </div><!-- End .col-md-9 -->

    </div><!-- End .row -->
</div><!-- End .container -->
