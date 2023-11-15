<!DOCTYPE html>
<html lang="cs-CZ" class="no-js scheme_default">

<head>
    <title><?=get_settings('sitename');?></title>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="format-detection" content="telephone=no" />
    <link rel='stylesheet' href='/templates/default/js/vendor/revslider/settings.css' type='text/css' media='all' />
    <link rel='stylesheet' href='/templates/default/js/custom/trx/trx_addons_icons-embedded.css' type='text/css' media='all' />
    
    <link rel='stylesheet' href='/templates/default/js/vendor/swiper/swiper.min.css' type='text/css' media='all' />

    <link rel='stylesheet' href='/templates/default/js/custom/trx/trx_addons.css' type='text/css' media='all' />
    <link rel='stylesheet' href='/templates/default/js/vendor/js_comp/js_comp_custom.css' type='text/css' media='all' />
    <link rel='stylesheet' href='/templates/default/fonts/Carnas/stylesheet.css' type='text/css' media='all' />
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans%3A400%2C800italic%2C300%2C300italic%2C400italic%2C600%2C600italic%2C700%2C700italic%2C800&amp;subset=latin%2Clatin-ext&amp;ver=4.7.3' type='text/css' media='all' />
    <link rel='stylesheet' href='/templates/default/css/fontello/css/fontello.css' type='text/css' media='all' />
    
    <link rel='stylesheet' href='/templates/default/css/style.css' type='text/css' media='all' />

    <link rel='stylesheet' href='/templates/default/css/animation.css' type='text/css' media='all' />
    <link rel='stylesheet' href='/templates/default/css/colors.css' type='text/css' media='all' />
    <link rel='stylesheet' href='/templates/default/css/styles.css' type='text/css' media='all' />
    <link rel='stylesheet' href='/templates/default/css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='/templates/default/css/custom.css' type='text/css' media='all' />
    <link rel='stylesheet' href='/templates/default/js/vendor/js_comp/font-awesome.min.css' type='text/css' media='all' />

    <link rel="icon" href="/templates/default/images/cropped-fav-big-32x32.jpg" sizes="32x32" />
    <link rel="icon" href="/templates/default/images/cropped-fav-big-192x192.jpg" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="/templates/default/images/cropped-fav-big-180x180.jpg" />
    <meta name="msapplication-TileImage" content="/templates/default/images/cropped-fav-big-270x270.jpg" />
   
    
</head>
<body  class="<?php if(empty($_GET['page']) || $_GET['page'] == '/kontakt' || $_GET['page'] == '/contact/' || $_GET['page'] == '/'){echo 'homepg home page body_style_wide scheme_default blog_style_excerpt sidebar_hide expand_content remove_margins header_style_header-2 header_title_off no_layout vc_responsive';}elseif(isset($_GET['s'])){echo'remove_margins page body_style_wide scheme_default blog_mode_page sidebar_hide header_style_header-2 header_title_on vc_responsive desktop_layout';}else{ echo 'page body_style_wide scheme_default blog_mode_page sidebar_hide header_style_header-2 header_title_on vc_responsive desktop_layout';} ?>">
    <div class="body_wrap">
        <div class="page_wrap">
            <header class="top_panel top_panel_style_2 scheme_default">
                <div class="top_panel_fixed_wrap"></div>
                <div class="top_panel_navi scheme_dark">
                    <div class="menu_main_wrap clearfix">
                        <div class="content_wrap">
                            <a class="logo scheme_dark" href="/">
                                <img src="/templates/default/images/logo.png" class="logo_main" alt="">
                            </a>
                            <nav class="menu_main_nav_area menu_hover_fade">
                                <div class="menu_main_inner">
                                    <div class="contact_wrap scheme_default ">
                                        <div class="phone_wrap icon-mobile">+420 731 554 950</div>

                                        

                                            <?php foreach (get_languages() as $value) {?>
                                            <div class="socials_wrap">

                                                <a href="<?=$value['url'];?>" target="" class="" style="opacity: 

                                <?=($value['code'] == $_GET['language'] || ((empty($_GET['language']) && $value['code'] == get_settings('default_language')) )

                                                )?'1':'0.5';?>">

                                                <?=strtoupper($value['code']);?>

                                                </a> &nbsp;
                                            </div>
                                            <?php } ?>


                                        <div class="search_wrap search_style_fullscreen">
                                            <div class="search_form_wrap">
                                                <form role="search" method="get" class="search_form" action="/search/">
                                                    <input type="text" class="search_field" placeholder="Hledat" value="" name="s">
                                                    <button type="submit" class="search_submit icon-search"></button>
                                                    <a class="search_close icon-cancel"></a>
                                                </form>
                                            </div>
                                            <div class="search_results widget_area">
                                                <a href="index.html#" class="search_results_close icon-cancel"></a>
                                                <div class="search_results_content"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul id="menu_main" class="sc_layouts_menu_nav menu_main_nav">
                                    
                                    <?php
                                    $menus = get_main_menu();



                                    foreach ($menus as $value) { $current_page = str_replace('/', '', $_GET['page']);
                                        ?>
                                        <li class="menu-item  <?php if($current_page == $value['original_slug'] || 
                                        ($current_page == '' && $value['original_slug'] == get_settings('default_homepage'))
                                        ){echo 'current-menu-parent';}?>"><a href="<?=$value['slug'];?>"><span><?=$value['name'];?></span></a>
                                        </li>
                                        <?php
                                    }
                                        ?>

                                    </ul>
                                </div>
                            </nav>
                            <a class="menu_mobile_button"></a>
                        </div>
                    </div>
                </div>

            <?php if(!empty($_GET['page']) && $_GET['page'] != '/' ){ ?>
            <div class="top_panel_title_wrap">
            <div class="content_wrap">
                        <div class="top_panel_title">
                            <div class="page_title">
                                <h3 class="page_caption"><?=$page_title;?></h3>
                            </div>
                            <div class="breadcrumbs">
                                <a class="breadcrumbs_item home" href="/">Úvodní strana</a>
                                <span class="breadcrumbs_delimiter"></span>
                                <span class="breadcrumbs_item current"><?=$page_title;?></span>
                            </div>
                        </div>
            </div>
            </div>
            <?php } ?>

            </header>
            <div class="menu_mobile_overlay"></div>
            <div class="menu_mobile scheme_">
                <div class="menu_mobile_inner">
                    <a class="menu_mobile_close icon-cancel"></a>
                    <nav class="menu_mobile_nav_area">
                        <ul id="menu_mobile" class="sc_layouts_menu_nav menu_main_nav">


                         <?php
                                    $menus = get_main_menu();



                                    foreach ($menus as $value) { $current_page = str_replace('/', '', $_GET['page']);
                                        ?>
                                        <li class="menu-item  <?php if($current_page == $value['original_slug']){echo 'current-menu-parent';}?>"><a href="<?=$value['slug'];?>"><span><?=$value['name'];?></span></a>
                                        </li>
                                        <?php
                                    }
                                        ?>




                        </ul>
                    </nav>
                    <div class="search_mobile">
                        <div class="search_form_wrap">
                            <form role="search" method="get" class="search_form" action="/search/">
                                <input type="text" class="search_field" placeholder="Hledat ..." value="" name="s">
                                <button type="submit" class="search_submit icon-search" title="Začit hledat"></button>
                            </form>
                        </div>
                    </div>
                    <div class="socials_mobile">
                        <span class="social_item">
                            <a href="index.html#" target="_blank" class="social_icons social_twitter">
                                <span class="trx_addons_icon-twitter"></span>
                            </a>
                        </span>
                        <span class="social_item">
                            <a href="index.html#" target="_blank" class="social_icons social_facebook">
                                <span class="trx_addons_icon-facebook"></span>
                            </a>
                        </span>
                        <span class="social_item">
                            <a href="index.html#" target="_blank" class="social_icons social_gplus">
                                <span class="trx_addons_icon-gplus"></span>
                            </a>
                        </span>
                    </div>
                </div>
            </div>

