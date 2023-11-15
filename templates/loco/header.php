<!DOCTYPE HTML>
<html>
	<head>
		<title>{{TITLE}}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/templates/loco/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="/templates/loco/assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">

			<ul class="langs">
						    <?php

                                    foreach (get_languages() as $value) {?>
                                    <li class="" ><a href="<?=$value['url'];?>" target="" class="" style="opacity: <?=($value['code'] == $_GET['language'] || ((empty($_GET['language']) && $value['code'] == get_settings('default_language')) ))?'1':'0.5';?>"><?=strtoupper($value['code']);?></a></li><?php } ?>
            </ul> 

				<?php



				if($current_page == $value['original_slug'] || ($current_page == '' && $value['original_slug'] == get_settings('default_homepage'))){ ?>
				<!-- Intro -->
					<div id="intro">
						<h1>{{HELLO}},<br/>{{I'M ADVENTURER}}</h1>
						<p>{{A fully responsive HTML5 + CSS3 site template<br/>for bloggers, geeks, adventurers etc..}}</p>
						<ul class="actions">
							<li><a href="#header" class="button icon solo fa-arrow-down scrolly">Continue</a></li>
						</ul>
					</div>
				<?php } ?>

				<!-- Header -->
					<header id="header">
						<a href="/" class="logo">{{HELLO}}, {{I'M ADVENTURER}}</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">

                                    <?php
                                    $menus = get_main_menu();



                                    foreach ($menus as $value) { $current_page = str_replace('/', '', $_GET['page']);
                                        ?>
                                        <li  class=" <?php if($current_page == $value['original_slug'] || 
                                        ($current_page == '' && $value['original_slug'] == get_settings('default_homepage'))
                                        ){echo 'active';}?>"><a href="<?=$value['slug'];?>"><?=$value['name'];?></a>
                                        </li>
                                        <?php
                                    }
                                        ?>


						</ul>
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
