<!doctype html>
<html lang="cs">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>LAYLA - <?php if($title){echo $title;}else{echo 'Publikační systém';}?></title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>


    <!-- Bootstrap core CSS  -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
    
    <!--  Material Icons CSS    -->
    <link href="assets/css/material-icons.css" rel="stylesheet"/>
    
    <!--  Font awesome CSS    -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet"/>

    <link href="assets/css/demo.css" rel="stylesheet" />

    <?php if(get_settings('default_admin_template') == 'night'){ ?>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo-night.css" rel="stylesheet" />
    <?php } ?>
    <!--  Fonts and icons  -->

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>



</head>

<body>	
	<div class="content-preloader"></div>
	<!-- <div class="touch-bar"></div> -->

	<div class="wrapper" style=""  style="overflow:hidden;">

	    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">


			<div class="logo">
				<a class="simple-text" target="_blank">
					<img src="assets/img/logo.png" width="200" height="auto" />
				</a>
				<small class="brand-text">{{Publishing software}}</small>
			</div>






	            <ul class="nav">					
			<li class="user-menu-row" row-id="0">
		    <a class="dropdown-toggle open" href="?page=home" data-toggle="" aria-expanded="true">
		        <i class="material-icons">face</i>
		        <p style="text-transform: capitalize; font-weight: bold;"><?php  if(empty($_SERVER['REMOTE_USER'])){echo '-';}else{echo $username = $_SERVER['REMOTE_USER'];}?></p>
		    </a>


</li>
</ul>





 	<div class="sidebar-wrapper" id="container" style="">


	            <ul class="nav" id="blocks" style="margin-top: 0;">

			
	            	<?=MainMenu($addtomenu_admin);?>

	            </ul>






	    	</div>



<script type="text/javascript">
	(function($){
  
    var $container    = $("#container"),
        $blocks    = $("#blocks"),
        heightContainer = $container.outerHeight(),
        scrolledHeight = $container[0].scrollHeight,
        mousePos = 0,
        posY = 0,
        hDiff = ( scrolledHeight / heightContainer ) - 1
    
    $container.mousemove(function(e){
    	// alert();
      mousePos = e.pageY - this.offsetTop;
    });
  
    setInterval(function(){
		  $blocks.css({marginTop: - mousePos });
	  }, 10);
})(jQuery);


</script>

<style type="text/css">
	#container {
  /*position: relative;*/
  /*margin-top: 100px;*/
  /*margin-left: 100px;*/
  /*overflow: hidden;*/
  height: 100vh;
  /*width: 320px;*/
  top:10px;
  overflow: auto;
  /*font-size: 24px;*/
  /*cursor: pointer;*/
}
#container #blocks {
  text-align: left;
}

</style>
</div>
	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

	

							<div class="breadcrumbs-container">
								<a class="navbar-brand">{{Administration}} &rsaquo; <strong><?=$title;?></strong></a>
								
									
								</div>


						
					</div>
					<div class="collapse navbar-collapse">

						<?php 
						if (($handle = fopen("../data/notifications.csv", "r")) !== FALSE) {
						    while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
						        $num = count($data);
						        $row++;
						        // echo $data;
						        for ($c=0; $c < $num; $c++) {
						        	if($c == 2 && $data[3] == 'unread'){
						        	$notificationscount[] = 1;
						            $notifications[]= $data[$c];
						            $notifications_url[$row]= $data[4];
						            $notifications_system[$row]= $data[5];
						            }
						        }

						    }}
					    ?>


					    <?php
					    $notifications = array_reverse($notifications);
					    $notifications_url = array_reverse($notifications_url);

					    $notifications_count = count($notificationscount);

									$plugins = get_settings('plugins');
									$plugins_array = explode(',',$plugins);
					    $activated_domain_switcher = array_search('layla-multiple-domain-switcher', $plugins_array);

					    ?>

						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a <?=($activated_domain_switcher > 0)?'href="#"':'';?> class="dropdown-toggle notification-center" data-toggle="dropdown" aria-expanded="true">
									<span style="line-height: 50%; font-weight: lighter; text-transform: uppercase; font-size: 85%; letter-spacing: 0.1em; color: #404040;" ><?=str_replace('www.','', $_SERVER['HTTP_HOST']);?></span>
								</a>
									
									<?php

									// echo 'x'.array_search('layla-multiple-domain-switcher', $plugins_array);

									$multiple_domains = explode(',', get_settings('domains-to-switch'));
									if(is_array($multiple_domains) && $activated_domain_switcher > 0){ ?>


								<ul class="dropdown-menu notifications-center">
								    <?php
								    foreach ($multiple_domains as $key => $value) {
								    	$notifications_num++;
								    	if(strlen($value) < 3){continue;}
								    	echo '<li><a href="http://'.$value.'/admin/"  style="text-align: ;">'.$value.'</a></li>';


										// if($notifications_url[$notifications_num-1] == 1){
									 //        echo ' <i class="material-icons">android</i></a>';
								  //       }else{
								  //           echo ' <i class="material-icons">touch_app</i></a>';	
								  //       }

							        echo '</li>';
								    } ?>

								</ul>
								<?php } ?>
							</li>



							<?php if(isset($_GET['post_type']) && isset($_GET['edit'])){ ?>
							
							<li><a id="show-website" class="btn btn-xs show-web show-link" onclick="window.open('<?=get_settings('default_url');?>/'+document.querySelector('.slug').getAttribute('value')); return false;" >{{Show on website}}</a></li>

							<?php }else{?>

							<li></li>
							<li><a id="show-website" class="show-link btn btn-xs show-web" href="<?=get_settings('default_url');?>/" target="_blank">{{Show website}}</a></li>

							

							<?php } //get_settings('domains-to-switch') ?>


							<li class="dropdown">
								<a href="#" class="dropdown-toggle notification-center" data-toggle="dropdown" aria-expanded="true">
									<i class="material-icons">notifications</i>
									<?php if($notifications_count > 0){?>
									<span class="notification"><?=$notifications_count;?></span>
									<?php } ?>
									<p class="hidden-lg hidden-md">Notifications</p>
								<div class="ripple-container"></div></a>
								<ul class="dropdown-menu notifications-center">
								    <?php
								    foreach ($notifications as $key => $value) {
								    	$notifications_num++;
								    	echo '<li><a href="'.$notifications_url[$notifications_num-1].'">'.$value.'';


									if($notifications_url[$notifications_num-1] == 1){
								        echo ' <i class="material-icons">android</i></a>';
							        }else{
							            echo ' <i class="material-icons">touch_app</i></a>';	
							        }

							        echo '</li>';
							    	if($notifications_num > 5){break;}
								    }

								     if($notifications_count == 0){?>
									<li><a href="#">{{No new notifications}}.</a></li>
									


									<?php } ?>
<?php 
									
							    	echo '<li><a href="?page=home-notifications" class="btn btn btn-info">{{All notifications}}</a></li>';



										        ?>
								</ul>
							</li>


							
							 
						</ul>



					</div>
				</div>
			</nav>

			<div class="content">