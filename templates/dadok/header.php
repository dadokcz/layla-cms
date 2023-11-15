<!DOCTYPE html>
<html lang="cs"  style="">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="index, follow">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	
    <title><?=get_title();?></title>

	<link href='/templates/dadok/style.css?time=14' id='flow-style-css' media='all' rel='stylesheet' type='text/css'>
	<link href='/templates/dadok/js/modules/shortcode-content-slider/content-slider-ver=4.5.2.css' media='all' rel='stylesheet' type='text/css'>
	<link href='/templates/dadok/fonts/google-fonts.css' media='all' rel='stylesheet' type='text/css'>
	<link href='/templates/dadok/fonts/fonts.css' id='flow-fonts-css' media='all' rel='stylesheet' type='text/css'>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	<link href='/templates/dadok/fonts/fontawesome/font-awesome.css' id='flow-fontawesome-css' media='all' rel='stylesheet' type='text/css'>
	
	<link href='/templates/dadok/js/modules/library-isotope/portfolio-ver=4.5.2.css' id='flow-portfolio-style-css' media='all' rel='stylesheet' type='text/css'>

	<link href='/templates/dadok/js/modules/library-iscroll4/slideshow-ver=4.5.2.css' id='flow-slideshow-style-css' media='all' rel='stylesheet' type='text/css'>
	
	<meta name="google-site-verification" content="EONxrwdfGZOEjvG9RfJIZ_7fAuolaYJo0Rz3bBko4cU" />
	
	<link rel='stylesheet' id='woocommerce-layout-css'  href='/templates/dadok/css/woocommerce-layout.css' type='text/css' media='all' />
	<link rel='stylesheet'  href='/templates/dadok/css/marquee.css' type='text/css' media='all' />

	<script src='/templates/dadok/js/countup.js' type='text/javascript'></script>



</head>
<body class="home page <?php echo $body_class; ?> woocommerce woocommerce-page single-author sidebar-active body-visible">

<div class="page">

	<header class="site-header" id="header" role="banner">
		<div class="site-header-inner">
			<div class="logo">
				<div class="logo-inner">
					<a class="home-link" href="/" title="DADOK" rel="home">
												

						<?php if($_SERVER['REMOTE_ADDR'] == '109.239.70.119'){ ?>
						<!--<div class="project-label">domény</div>-->
						<?php } ?>
					
						<h1 class="site-title">DADOK</h1>
						<h2 class="site-description flip animated" style="color: rgb(123, 137, 147); font: 91%/1 Roboto; font-weight: 200 !important; letter-spacing: -.05em; text-transform: uppercase; ">Global Internet Solutions</h2>


					</a>
				</div>
			</div>
			<nav class="site-navigation" role="navigation">
				<h3 class="menu-toggle">Menu</h3>
				<div class="menu-main-menu-container">
					<ul class="nav-menu" id="menu-main-menu">

						<li class="<?php if($_GET['page'] == '/sluzby'){echo 'current_page_item';} ?> modernpicrograms-icon-72 menu-item menu-item-type-post_type menu-item-object-page menu-item-4886" id="menu-item-4886">
							<a href="/sluzby/">Služby</a>

							<?php /*
							<ul class="sub-menu">
								<li><a href="/sluzby/#webdevelopment" class="" target="_parent">Web-development</a></li>
								<li><a href="/sluzby/#mobilnidevelopment" class="" target="_parent">Mobilní-development</a></li>
								<li><a href="/sluzby/#pokladnnisystemy" class="" target="_parent">Pokladní systémy</a></li>
								<li><a href="/eshop-eet/" class="" target="_parent">Elektronická evidence tržeb</a></li>
								<li><a href="/sluzby/#distribuceknih" class="" target="_parent">Distribuce knih</a></li>
								<li><a href="/sluzby/#oziveniprojektu" class="" target="_parent">Oživení projektu</a></li>
								<li><a href="/sluzby/#virtualniprohlidky" class="" target="_parent">Virtuální prohlídky</a></li>
								<li><a href="/sluzby/#konzultaceaskoleni" class="" target="_parent">Konzultace a školení</a></li>
								<!-- <li><a href="http://www.stestiprotebe.cz" class="" target="_blank">Štěstí pro tebe</a></li> -->
							</ul>
							*/?>



						</li>
					
						<?php /*if($_SERVER['REMOTE_ADDR'] == '109.239.70.119'){ ?>
							<li class="<?php if($_GET['page'] == '/domeny'){echo 'current_page_item';} ?> modernpicrograms-icon-49 menu-item menu-item-type-post_type menu-item-object-page menu-item-4886" id="menu-item-4886">
								<a href="/domeny/">Domény</a>
							</li>
						<?php }	*/ ?>
						

						<li class="<?php if($_GET['page'] == '/portfolio' || $_GET['page'] == 'portfolio-single'){echo 'current_page_item';} ?> modernpicrograms-icon-73 menu-item menu-item-type-post_type menu-item-object-page page_item page-item-3433 menu-item-4889" id="menu-item-4889">
							<a href="/portfolio/">Portfolio</a>
						</li>
						
						<!-- <li class="<?php if($_GET['page'] == '/blog' || $_GET['page'] == 'blog-single'){echo 'current_page_item';} ?> modernpicrograms-icon-44 menu-item menu-item-type-post_type menu-item-object-page menu-item-4887" id="menu-item-4887">
							<a href="/blog/">Blog</a>
						</li>
 -->


			 			<?php if($_SERVER['REMOTE_ADDR'] == '89.103.20.20'){ ?>
						<li class="<?php if($_GET['page'] == '/akademie'){echo 'current_page_item';} ?> modernpicrograms-icon-25	 menu-item menu-item-type-post_type menu-item-object-page menu-item-4890" id="menu-item-4890">
							<a href="/akademie/">Akademie</a>
						</li>
						<?php } ?>

						<!-- 
						<li class="<?php if($_GET['page'] == '/osx-aplikace'){echo 'current_page_item';} ?> modernpicrograms-icon-4 menu-item menu-item-type-post_type menu-item-object-page menu-item-4890" id="menu-item-4890">
							<a href="/osx-aplikace/">Aplikace</a>
						</li> -->
						<li class="<?php if($_GET['page'] == '/obchod' || $_GET['page'] == 'obchod-single'){echo 'current_page_item';} ?> modernpicrograms-icon-10 menu-item menu-item-type-post_type menu-item-object-page menu-item-4890" id="menu-item-4890">
							<a href="/obchod/">Obchod</a>
						</li>
						


						<li class="<?php if($_GET['page'] == '/tym'){echo 'current_page_item';} ?> modernpicrograms-icon-33 menu-item menu-item-type-post_type menu-item-object-page menu-item-4888" id="menu-item-4888">
							<a href="/tym/">Náš tým</a>
						</li>
						<li class="<?php if($_GET['page'] == '/team'){echo 'current_page_item';} ?> modernpicrograms-icon-38 menu-item menu-item-type-post_type menu-item-object-page menu-item-4888 has-submenu	" id="menu-item-4888">
							<a href="#">Naše projekty</a>
							<ul class="sub-menu">
								<!-- <li><a href="https://3zpravy.cz" class="" target="_blank">3Zprávy</a></li> -->
								<li><a href="https://dadok.cz/laylacms/" class="" target="_blank">Layla</a></li>
								<li><a href="https://www.objective-c.cz" class="" target="_blank">Objective-C Kniha</a></li>
								<li><a href="https://www.krindypindy.cz" class="" target="_blank">KrindyPindy</a></li>
								<li><a href="https://www.spherio.cz" class="" target="_blank">Spherio</a></li>
								<!-- <li><a href="/squek/" class="" target="_blank">Squek</a></li> -->
								<!-- <li><a href="http://www.rychlejsiweb.cz" class="" target="_blank">Rychlejší Web</a></li> -->
								<!-- <li><a href="http://www.stestiprotebe.cz" class="" target="_blank">Štěstí pro tebe</a></li> -->
							</ul>
						</li>
						<li class="<?php if($_GET['page'] == '/kontakt'){echo 'current_page_item';} ?> modernpicrograms-icon-39 menu-item menu-item-type-post_type menu-item-object-page menu-item-4885" id="menu-item-4885">
							<a href="/kontakt/"">Kontakt</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>



