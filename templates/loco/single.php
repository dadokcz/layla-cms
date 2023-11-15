<?php 
    
	$page = str_replace('/', '', $_GET['page']);


    // TRY  TO FIND PAGE
    $post = find_content('data/posts.csv', $page);
    // print_r($post);
    		// 			$featured_page = layla_get_posts('DESC', 0);
						// $gallery_featured = explode(',', $featured_page[0]['gallery']); 
						// $gallery_featured = array_filter($gallery_featured, function($a) { return ($a !== ''); });
						// $gallery_featured = $gallery_featured[key($gallery_featured)];

						?>
						<!-- Featured Post -->
			


							<section class="post">
								<header class="major">
									<span class="date"><?=date("d. m. Y H:i", $post['time']); ?></span>
									<h1><?=$post['title']; ?></h1>
									<p><?=$post['excerpt']; ?></p>
								</header>
								<div class="image main"><img src="<?php echo get_settings('siteurl').'/files/'.$post['thumb'];?>" alt=""></div>
								<p><?=$post['content']; ?></p>
							</section>


