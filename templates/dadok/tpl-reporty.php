<?php
/* Template name: Reporty */
?>

<header class="page-header">
<h1 class="page-title">Reporty</h1>

<div class="page-description">Seznamte se s těmi nejčerstvějšími vizuály nebo odhalte technické podrobnosti z našich projektů. </div>
</header>
<div class="site-content">
<div class="content-area" role="main">





<?php

        $post = layla_get_posts('posts', 'DESC', 100);

        $i=-1; foreach ($post as $key => $value) { $i++;
        	$q++;
        $data = $post[$i];

      



?>


<article id="post-5250" class="clearfix entry-container post-5250 post type-post status-publish format-standard hentry category-uncategorized">
<header class="entry-header">
<h1 class="entry-title">
<a href="#report-<?=$data['id'];?>" name="report-<?=$data['id'];?>" rel="bookmark"><?=$data['name'];?></a>
</h1>
<div class="entry-meta">

<span class="date"><a href="#" title="Permalink to Unreasonably long post title" rel="bookmark"><time class="entry-date" datetime="2018-03-01T13:27:16+00:00">
<?=date("d.m. Y ", $data['time']);?></time></a></span> </div>
</header>
<div class="entry-summary clearfix">
<div class="entry-thumbnail clearfix">
</div>
<strong><?=$data['excerpt'];?></strong>
<?=$data['content'];?>
</div>
</article>

<?php } ?>



</div>
</div>
