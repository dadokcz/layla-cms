<?php
/* Template name: Single portfolio */

$page = str_replace('/', '', $_GET['page']);
// TRY  TO FIND PAGE
$post = find_content('data/portfolio.csv', $page);
$gallery = $post['gallery'];
$gallery = array_filter($gallery);

$gallery = array_reverse($gallery);

// print_r($data[$Array_row]);
$data[$Array_row] = $post;

// echo $Array_row;

?>





<nav class="compact-nav compact-nav-visible" role="navigation">
    <div class="inner">
        <a class="back" href="/portfolio/" onclick="window.location.href='/portfolio/';">
        <div class="icon">
            <svg class="compact-header-arrow-back-svg" height="34.2px" version="1.1" viewBox="0 0 19.201 34.2" width="19.201px" x="0px" xmlns="http://www.w3.org/2000/svg" y="0px">
            <polyline fill="none" points="17.101,2.1 2.1,17.1 17.101,32.1"></polyline></svg>
        </div>
        <div class="label">
            Zpět
        </div>
        </a>
        <!-- <div class="compact-search">
            <div class="label">
                Hledat
            </div>
        </div> -->
        <div class="compact-container">
            <ul class="nav-menu compact-menu" id="menu-main-menu-1">

                <li class="modernpicrograms-icon-23 menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-3433 current_page_item menu-item-4889">
                    <a href="/portfolio/">Portfolio</a>
                </li><!-- 
                <li class="modernpicrograms-icon-44 menu-item menu-item-type-post_type menu-item-object-page menu-item-4887">
                    <a href="/blog/">Blog</a>
                </li> -->
                <li class=" menu-item menu-item-type-post_type menu-item-object-page menu-item-4890" id="menu-item-4890">
                    <a href="/obchod/">Obchod</a>
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


<div class="portfolio_box portfolio_box-visible">
        <div class="content-projectc">
            <div class="project-meta clearfix">
                <div class="project-meta-col-1">
                    
                    <!-- <div class="project-meta-data project-date clearfix" style="display: none;">
                        <div class="project-meta-heading">
                            DATE
                        </div>
                        <div class="project-meta-description project-exdate"></div>
                    </div> -->
                    <?php if($data[$Array_row]['attributes']['project-client'] != ''){ ?>
                    <div class="project-meta-data project-client clearfix" style="">
                        <div class="project-meta-heading">
                            Klient
                        </div>
                        <div class="project-meta-description project-exclient"><?php echo $data[$Array_row]['attributes']['project-client']; ?></div>
                    </div>
                    <?php } ?>

                    <?php if($data[$Array_row]['attributes']['project-site'] != ''){ ?>
                    <div class="project-meta-data project-agency clearfix" style="">
                        <div class="project-meta-heading">
                            WWW
                        </div>
                        <div class="project-meta-description project-exagency"><a href="http://<?php echo $data[$Array_row]['attributes']['project-site'];?>" target="_blank"><?php echo $data[$Array_row]['attributes']['project-site']; ?></a></div>
                    </div>
                    <?php } ?>

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
                <a class="sharing-icons-twitter" href="https://twitter.com/share?url=http%3A%2F%2Fwww.dadok.cz%2Fportfolio%2F&amp;amp;text=Rychlej%C5%A1%C3%AD%20web" target="_blank"><span class="sharing-icons-icon">t</span> <span class="sharing-icons-tooltip" data-tooltip="Twitter"></span></a> <a class="sharing-icons-facebook" href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Fwww.dadok.cz%2Fportfolio%2F&amp;amp;t=Rychlej%C5%A1%C3%AD%20web" target="_blank"><span class="sharing-icons-icon">f</span> <span class="sharing-icons-tooltip" data-tooltip="Facebook"></span></a> <a class="sharing-icons-googleplus" href="https://plus.google.com/share?url=http%3A%2F%2Fwww.dadok.cz%2Fportfolio%2F" target="_blank"><span class="sharing-icons-icon">g</span> <span class="sharing-icons-tooltip" data-tooltip="Google+"></span></a>
            </div>
            <h2 class="project-title"><?php echo $data[$Array_row]['title']; ?></h2>
            <div class="project-description"><?php echo $data[$Array_row]['attributes']['project-description']; ?></div>
            <div class="project-slides clearfix">

<?php

		$post_details = find_content('data/portfolio.csv', str_replace('/', '', $data[$Array_row]['slug']));
		$gallery = $post_details['gallery'];

        $gallery = array_reverse($gallery);

		foreach ($gallery as $key => $value) {
            if(isset($value) && $value != '')
		$galleries.='<img class="attachment-shop_thumbnail size-shop_thumbnail" src="/files/'.$value.'"><br/><br/>';  
		 } 

        $stringWithPs = $data[$Array_row]['content'];

        // $stringWithPs = str_replace("\n\n", "</p>\n<p>", $stringWithPs);
        $stringWithPs = str_replace("\n", "<br/>", $stringWithPs);
        // $stringWithPs = embedYoutube($stringWithPs);

        echo $stringWithPs = "<p>" . $stringWithPs  . " ".$galleries."</p>";



?>

            </div>
        </div>
    </div>



    <div class="project-coverslide project-coverslide-visible"></div>










<?php


/*
unset($data);


$myfile = fopen("data/data.json", "r") or die("Unable to open file!");
$data = fread($myfile,filesize("data/data.json"));
$data = json_decode($data,true);


include "portfolio.php";


/*
<header class="page-header">
    <h1 class="page-title"><?php echo $data[$Array_row]['title']; ?></h1>
    <div class="page-description"><?php echo $data[$Array_row]['flow_post_description']; ?></div>
</header>
<div class="site-content clearfix">
    <div class="content-area" role="main">

    <?php if($data[$Array_row]['thumbnail']){ ?>
    
    <p><img src="<?php echo $data[$Array_row]['thumbnail']; ?>" /></p>
    
    <?php } ?>

		<?php

		$stringWithPs = $data[$Array_row]['content'];

		// $stringWithPs = str_replace("\n\n", "</p>\n<p>", $stringWithPs);
		$stringWithPs = str_replace("\n", "<br/>", $stringWithPs);
		$stringWithPs = embedYoutube($stringWithPs);

		echo $stringWithPs = "<p>" . $stringWithPs  . "</p>";



?>


        </div>
    </div>
   <!--  <nav class="navigation paging-navigation clearfix" role="navigation">
        <h1 class="screen-reader-text">Posts navigation</h1>
        <div class="nav-previous">
            <a href="/blog/page/2/">Starší příspěvky</a>
        </div>
    </nav> -->


*/
