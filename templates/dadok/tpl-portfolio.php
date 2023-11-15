<?php
/* Template name: Portfolio */

$data = $data['portfolio'];

$post = layla_get_posts('project-category', 'DESC', 100);

$i=-1; foreach ($post as $key => $value) { $i++;

$cats[]=$value['name'];

}

$categories = $cats;
// print_r($categories);

?>




	<nav class="compact-nav" role="navigation">
		<div class="inner">
			<a class="back" href="index.html">
			<div class="icon">
				<svg class="compact-header-arrow-back-svg" height="34.2px" version="1.1" viewbox="0 0 19.201 34.2" width="19.201px" x="0px" xmlns="http://www.w3.org/2000/svg" y="0px">
				<polyline fill="none" points="17.101,2.1 2.1,17.1 17.101,32.1"></polyline></svg>
			</div>
			<div class="label">
				Zpět
			</div></a>
			<!-- <div class="compact-search">
				<div class="label">
					Hledat
				</div>
			</div> -->
			<div class="compact-container">
				<ul class="nav-menu compact-menu" id="menu-main-menu-1">

					<li class="modernpicrograms-icon-23 menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-3433 current_page_item menu-item-4889">
						<a href="/portfolio/">Portfolio</a>
					</li>
					<!-- <li class="modernpicrograms-icon-44 menu-item menu-item-type-post_type menu-item-object-page menu-item-4887">
						<a href="/blog/">Blog</a>
					</li> -->
					<li class="<?php if($_GET['page'] == 'shop'){echo 'current_page_item';} ?> menu-item menu-item-type-post_type menu-item-object-page menu-item-4890" id="menu-item-4890">
						<a href="javascript:;" onclick="alert('Pardon! Náš obchod je momentálně v rekonstrukci.')">Obchod</a>
					</li>
					<li class="modernpicrograms-icon-77 menu-item menu-item-type-post_type menu-item-object-page menu-item-4890">
						<a href="/tym/">Náš tým</a>
					</li>
					<li class="modernpicrograms-icon-39 menu-item menu-item-type-post_type menu-item-object-page menu-item-4885">
						<a href="/kontakt/">Kontakt</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="header-search">
		
		<form action="/" class="search-form" method="get" role="search">
			<label><span class="screen-reader-text">Hledat:</span> <input class="search-field" name="s" placeholder="Search &hellip;" type="search" value=""></label> <input class="search-submit" type="submit" value="Search">
		</form>

		<div class="search-message">
			Press Enter to Search
		</div>
	</div>
	<div class="welcome-text">
		Umíme zprostředkovat pohlcující zážitek ve všech formátech reklamních médií cílený na Vaše klienty
	</div>
	<div class="portfolio_box">
		<div class="content-projectc">
			<div class="project-meta clearfix">
				<div class="project-meta-col-1">
					
					<!-- <div class="project-meta-data project-date clearfix" style="display: none;">
						<div class="project-meta-heading">
							DATE
						</div>
						<div class="project-meta-description project-exdate"></div>
					</div> -->

					<div class="project-meta-data project-client clearfix" style="display: none;">
						<div class="project-meta-heading">
							Klient
						</div>
						<div class="project-meta-description project-exclient"></div>
					</div>

					<div class="project-meta-data project-agency clearfix" style="display: none;">
						<div class="project-meta-heading">
							WWW
						</div>
						<div class="project-meta-description project-exagency"></div>
					</div>

				</div>
				<!-- 
				<div class="project-meta-col-2">
					<div class="project-meta-data project-ourrole clearfix" style="display: none;">
						<div class="project-meta-heading">
							Our Role
						</div>
						<div class="project-meta-description project-exourrole"></div>
					</div>
				</div> -->

			</div>
			<div class="sharing-icons">
				<a class="sharing-icons-twitter" href="https://twitter.com/share?url=http://themes.devatic.com/daisho&amp;text=Daisho" target="_blank"><span class="sharing-icons-icon">t</span> <span class="sharing-icons-tooltip" data-tooltip="Twitter"></span></a> <a class="sharing-icons-facebook" href="http://www.facebook.com/sharer.php?u=http://themes.devatic.com/daisho&amp;t=Daisho" target="_blank"><span class="sharing-icons-icon">f</span> <span class="sharing-icons-tooltip" data-tooltip="Facebook"></span></a> <a class="sharing-icons-googleplus" href="https://plus.google.com/share?url=http://themes.devatic.com/daisho" target="_blank"><span class="sharing-icons-icon">g</span> <span class="sharing-icons-tooltip" data-tooltip="Google+"></span></a>
			</div>
			<h2 class="project-title"></h2>
			<div class="project-description"></div>
			<div class="project-slides clearfix"></div>
		</div>
	</div>
	<nav class="project-navigation clearfix" role="navigation">
		<a class="portfolio-arrowleft portfolio-arrowleft-visible">Předchozí</a> <a class="portfolio-arrowright portfolio-arrowright-visible">Další</a>
	</nav>
	<div class="project-coverslide"></div>
	<div class="tn-grid-container clearfix">
		<section class="clearfix" id="options">
			<ul class="option-set clearfix" data-option-key="filter" id="filters">
	
				<li>
					<a class="selected" data-option-value="*" data-project-category-id="all" href="index.html#filter">Vše</a>
				</li>
				<?php

					foreach ($categories as $key => $val)
					{

					?>

					<li>
						<a class="" data-option-value=".<?php echo slugify($val); ?>" data-project-category-id="all" href="index.html#filter"><?php echo $val; ?></a>
					</li>

					<?php
					}

				?>

			</ul>
			<ul class="clearfix" id="etc">
				<li id="toggle-sizes">
					<a class="" href="index.html#toggle-sizes"><svg class="toggle-sizes-large-svg" height="18px" version="1.1" viewbox="0 0 28 18" width="28px" x="0px" xmlns="http://www.w3.org/2000/svg" y="0px">
					<g>
						<path clip-rule="evenodd" d="M2,0h14c1.105,0,2,0.895,2,2V16c0,1.104-0.895,2-2,2H2 c-1.105,0-2-0.895-2-2V2C0,0.895,0.895,0,2,0z" fill="none" fill-rule="evenodd"></path>
						<path clip-rule="evenodd" d="M22.001,0H26c1.105,0,2,0.895,2,2V6C28,7.104,27.105,8,26,8h-3.999 C20.895,8,20,7.104,20,6V2C20,0.895,20.895,0,22.001,0z" fill="none" fill-rule="evenodd"></path>
						<path clip-rule="evenodd" d="M22.001,10H26c1.105,0,2,0.895,2,1.999V16c0,1.104-0.895,2-2,2 h-3.999C20.895,18,20,17.105,20,16V12C20,10.896,20.895,10,22.001,10z" fill="none" fill-rule="evenodd"></path>
					</g></svg></a>

					<a href="index.html#toggle-sizes" class="toggle-selected"><svg class="toggle-sizes-small-svg" height="18px" version="1.1" viewbox="0 0 28 18" width="28px" x="0px" xmlns="http://www.w3.org/2000/svg" y="0px">
					<g>
						<path clip-rule="evenodd" d="M2.001,0h4C7.104,0,8,0.895,8,2V6c0,1.104-0.896,2-1.999,2h-4 C0.896,8,0,7.104,0,6V2C0,0.895,0.896,0,2.001,0z" fill="none" fill-rule="evenodd"></path>
						<path clip-rule="evenodd" d="M12,0h4.001C17.105,0,18,0.895,18,2V6c0,1.104-0.895,2-1.998,2H12 c-1.105,0-2-0.896-2-2V2C10,0.895,10.895,0,12,0z" fill="none" fill-rule="evenodd"></path>
						<path clip-rule="evenodd" d="M22.001,0h4C27.104,0,28,0.895,28,2V6c0,1.104-0.896,2-1.999,2h-4 C20.896,8,20,7.104,20,6V2C20,0.895,20.896,0,22.001,0z" fill="none" fill-rule="evenodd"></path>
						<path clip-rule="evenodd" d="M2.001,10h4C7.104,10,8,10.895,8,12V16c0,1.104-0.896,2-1.999,2h-4 C0.896,18,0,17.105,0,16V12C0,10.895,0.896,10,2.001,10z" fill="none" fill-rule="evenodd"></path>
						<path clip-rule="evenodd" d="M12,10h4.001C17.105,10,18,10.895,18,12V16c0,1.104-0.895,2-1.998,2 H12c-1.105,0-2-0.895-2-2V12C10,10.895,10.895,10,12,10z" fill="none" fill-rule="evenodd"></path>
						<path clip-rule="evenodd" d="M22.001,10h4C27.104,10,28,10.895,28,12V16c0,1.104-0.896,2-1.999,2 h-4C20.896,18,20,17.105,20,16V12C20,10.895,20.896,10,22.001,10z" fill="none" fill-rule="evenodd"></path>
					</g></svg></a>
				</li>
			</ul>
		</section>
		<div class=" clearfix" id="container">



		<?php

        $post = layla_get_posts('portfolio', 'DESC', 100);
        

		$i=-1; foreach ($post as $key => $value) { $i++;

		$data = $post[$i];



		$post_details = find_content('data/portfolio.csv', str_replace('/', '', $data['slug']));
		$gallery = $post_details['gallery'];
		// $gallery = array_filter($gallery);


// $colors = "#bada55 #7fe5f0 #ff0000 #ff80ed #696969 #133337 #065535 #c0c0c0 #5ac18e #666666 #dcedc1 #f7347a #000000 #ffffff #ffc0cb #420420 #ffe4e1 #008080 #ffd700 #e6e6fa #00ffff #ff7373 #40e0d0 #d3ffce #ffa500 #f0f8ff #b0e0e6 #0000ff #c6e2ff #faebd7 #7fffd4 #fa8072 #003366 #800000 #eeeeee #cccccc #ffb6c1 #ffff00 #800080 #00ff00 #f08080 #ffc3a0 #333333 #20b2aa #fff68f #4ca3dd #66cdaa #c39797 #f6546a #ff6666 #468499 #ffdab9 #ff00ff #ff7f50 #00ced1 #c0d6e4 #660066 #008000 #0e2f44 #8b0000 #101010 #088da5 #afeeee #f5f5f5 #990000 #808080 #b4eeb4 #cbbeb5 #daa520 #ffff66 #f5f5dc #dddddd #b6fcd5 #81d8d0 #00ff7f #6897bb #8a2be2 #000080 #a0db8e #ccff00 #ff4040 #66cccc #3399ff #794044";

// 		$colors = "#B245BD #AF2E1F #76B03D #2D77BC #B3567D #5DB3AD #F09FBC #EC74C9 #59BFBF #c38fc0 #cce7d4 #9bd3ae #7d92cb #fdbd76 #eced87 #f0dcbb #ea6ca9";
// $colors = explode(' ', $colors);
// $color = $colors[rand(0,count($colors)-1)];


        $colors = "#2D77BC #B3567D #5DB3AD #F09FBC #EC74C9 #59BFBF #c38fc0 #cce7d4 #9bd3ae #7d92cb #fdbd76 #eced87 #f0dcbb #ea6ca9";
        // $colors = "#f875aa #fbaccc #f1d1d0 #f4f9f9 #4ea8de #48bfe3 #56cfe1 #64dfdf #72efdd #80ffdb";
        $colors = explode(' ', $colors);
        $color = $colors[rand(0,count($colors)-1)];
        $color2 = $colors[rand(0,count($colors)-1)];

        $linears = 'linear-gradient';
        $linears = explode(' ', $linears);
        $linears = $linears[rand(0,count($linears)-1)];



		// $attributes_array = explode(',', $data['attributes']);
           $random_num = rand(1,15);

           if($random_num == 2){
	           $random_width = rand(1,3);
	           $random_height = rand(1,2);
           }
		?>

			<div class="element width<?=$random_width;?> height<?=$random_height;?> <?php echo slugify($data['attributes']['project-category']); ?> <?php echo slugify($data['attributes']['project-category2']); ?> <?php echo $data['thumbnail_size_classes']; ?> tn-display-meta portfolio-category-156 post-2578 portfolio type-portfolio status-publish hentry portfolio_category-<?php echo str_replace('/','',$data['attributes']['project-category']); ?>" data-id="<?php echo $i; ?>" id="post-2578">
				<a class="thumbnail-project-link" href="<?php echo $data['url']; ?>"><?php echo $data['name']; ?></a>
				<div class="thumbnail-meta-data-wrapper">
					<div class="symbol">
						<?php echo $data['name']; ?>
					</div>
				</div>
				<div class="name">
					<?php echo $data['name']; ?><?php echo $data['thumbnail_size']; ?>
				</div>
				<div class="categories">
					<?php echo str_replace('/','',$data['attributes']['project-category']); ?>
				</div>
				<div class="thumbnail-hover" style="background-color: <?=$color2;?>;"></div>
				<img alt="<?php echo $data['name']; ?>" class="project-img" src="<?php echo str_replace( "http:", "https:", $data['300-160-image'] ); ?>">
				<div class="project-thumbnail-background" style="background-color: <?php echo $color; ?>;"></div>
			</div>

		<?php
		unset($random_width);
		unset($random_height);
		}
		?>


		</div>
	</div>





                              <?php
                              //echo '<pre>'; print_r($featured_page); echo '</pre>';
                              ?>

                                <?php
                                //  $i=-1; foreach ($post as $key => $value) { $i++;
                                //     // if($i == 0){continue;}
                                //     $gallery_featured = explode(',', $post[$i]['gallery']); 
                                //     $gallery_featured = array_filter($gallery_featured, function($a) { return ($a !== ''); });
                                //     $gallery_featured = $gallery_featured[key($gallery_featured)];

                                //     if(file_exists('./files/'.$gallery_featured.'')){
                                //     $thumb = get_settings('siteurl').'/files/'.$gallery_featured;       
                                //     }else{
                                //     $thumb = '/templates/dadok/images/pic02.jpg';
                                //     }       

                                //     $attributes_array = explode(',', $post[$i]['attributes']);
                                //     foreach ($attributes_array as $key => $value) {
                                //     $i++;
                                    
                                //     if(count($value['shipping'])){
                                //     $value = $value['shipping'];
                                //     }}


                                // $i2 = $i-3;

                                  

                              // print_r($post);

		
		$i=-1; foreach ($post as $key => $value) { $i++;

		$data = $post[$i];

        $stringWithPs = $data['content'];

        // $stringWithPs = str_replace("\n\n", "</p>\n<p>", $stringWithPs);
        $stringWithPs = str_replace("\n", "<br/>", $stringWithPs);
        $stringWithPs = strip_tags($stringWithPs);

        $content = "<p>" . $stringWithPs  . "</p>";


		$post_details = find_content('data/portfolio.csv', str_replace('/', '', $data['slug']));
		$gallery = $post_details['gallery'];
		$gallery = array_filter($gallery);
		$gallery = array_reverse($gallery);

		foreach ($gallery as $key => $value) {
		$galleries.='<img class="attachment-shop_thumbnail size-shop_thumbnail" src="/files/'.$value.'"><br/><br/>';  
		 } 
		 $projecttitle = preg_replace('#^https?://#', '', rtrim($post_details['attributes']['project-site'],'/'));

		$projectsArray[$i] = array( $data['name'], $post_details['attributes']['project-description'], $post_details['attributes']['project-date'], $post_details['attributes']['project-client'], '<a href="http://'.$post_details['attributes']['project-site'].'" target="_blank">'.$projecttitle.'</a>', $thumb_ourrole, $data['content'].''.$galleries, $data['slug'], 'xx', 'xx', $data['slug'] );
		unset($galleries);
		}


		// print_r($projectsArray);
		?>

<script>

<?php echo 'var projectsArray = ' . json_encode( $projectsArray ) . ';'; ?>


 var portfolio_page_title = jQuery('title').text();
 var portfolio_page_url = location.href;
 var boundary_arrows = false;
 var loop_through = false;
 var global_current_id = false;
 var project_url = '';
	</script>
