<?php 
    
	$page = str_replace('/', '', $_GET['page']);


    // TRY  TO FIND PAGE
    $post = find_content('data/pages.csv', $page);
    // print_r($post);
    		// 			$featured_page = layla_get_posts('DESC', 0);
						// $gallery_featured = explode(',', $featured_page[0]['gallery']); 
						// $gallery_featured = array_filter($gallery_featured, function($a) { return ($a !== ''); });
						// $gallery_featured = $gallery_featured[key($gallery_featured)];

						?>
						<!-- Featured Post -->
			


							<section class="post">
								<header class="major">
									<h1><?=$post['title']; ?></h1>
								</header>
								<p><?=$post['content']; ?></p>
							</section>


