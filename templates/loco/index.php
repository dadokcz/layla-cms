<?php $featured_page = layla_get_posts('posts', 'DESC', 1); ?>


						<!-- Featured Post -->
							<article class="post featured">
								<header class="major">
									<span class="date"><?=date("d. m. Y H:i", $featured_page[0]['time']); ?></span>
									<h2><a href="/<?=$featured_page[0]['original_slug']; ?>/"><?=$featured_page[0]['name']; ?></a></h2>
									<p><?=$featured_page[0]['excerpt']; ?></p>
								</header>
								<a href="/<?=$featured_page[0]['original_slug']; ?>/" class="image main"><img src="<?php echo get_settings('siteurl').'/files/'.$featured_page[0]['thumb'];?>" alt="" /></a>
								<ul class="actions">
									<li><a href="/<?=$featured_page[0]['original_slug']; ?>/" class="button big">{{Full Story}}</a></li>
								</ul>
							</article>

						<!-- Posts -->
							<section class="posts">
								
								<?php $featured_page = layla_get_posts('posts', 'DESC', 124); //echo '<pre>'; print_r($featured_page); echo '</pre>'; ?>

								<?php $i=-1; foreach ($featured_page as $key => $value) { $i++;
									if($i == 0){continue;}
									$gallery_featured = explode(',', $featured_page[$i]['gallery']); 
									$gallery_featured = array_filter($gallery_featured, function($a) { return ($a !== ''); });
									$gallery_featured = $gallery_featured[key($gallery_featured)];

									if(file_exists('./files/'.$gallery_featured.'')){
									$thumb = get_settings('siteurl').'/files/'.$gallery_featured;		
									}else{
									$thumb = '/templates/loco/images/pic02.jpg';
									}		
									?>

								<article>
									<header>
										<span class="date"><?=date("d. m. Y H:i", $featured_page[$i]['time']); ?></span>
										<h2><a href="<?=$featured_page[$i]['original_slug']; ?>"><?=$featured_page[$i]['name']; ?></a></h2>
									</header>
									<a href="<?=$featured_page[$i]['original_slug']; ?>" class="image fit"><img src="<?=$thumb;?>" alt="" /></a>
									<p><?=$featured_page[$i]['excerpt']; ?></p>
									<ul class="actions">
										<li><a href="<?=$featured_page[$i]['original_slug']; ?>" class="button">{{Full Story}}</a></li>
									</ul>
								</article>

								<?php } ?>

							</section>

							<?php /* 
						<!-- Footer -->
							<footer>
								<div class="pagination">
									<!--<a href="#" class="previous">Prev</a>-->
									<a href="#" class="page active">1</a>
									<a href="#" class="page">2</a>
									<a href="#" class="page">3</a>
									<span class="extra">&hellip;</span>
									<a href="#" class="page">8</a>
									<a href="#" class="page">9</a>
									<a href="#" class="page">10</a>
									<a href="#" class="next">Next</a>
								</div>
							</footer>
							*/?>
