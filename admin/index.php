<?php
date_default_timezone_set('Europe/Prague');
session_start();

include "functions.php";

switch(@$_GET['page']){

case 'users':
$title = '{{Users}}';
$page="users.php";
break;

case 'home':
$title = '{{Dashboard}}';
$page="home.php";
break;

case 'home-reports':
$title = '{{Dashboard}}';
$page="home-reports.php";
break;

case 'home-notifications':
$title = '{{Notifications}}';
$page="home-notifications.php";
break;

case 'pages':
$title = '{{Pages}}';
$page="pages.php";
break;

case 'plugins':
$title = '{{Plugins}}';
$page="plugins.php";
break;


case 'settings':
$title = '{{Settings}}';
$page="settings.php";
break;

case 'newsletter':
$title = '{{Newsletter}}';
$page="newsletter.php";
break;

case 'media':
$title = '{{Media}}';
$page="media.php";
break;

case 'updates':
$title = '{{Updates}}';
$page="updates.php";
break;

case 'newsletter-subscribers':
$title = '{{Subscribers}}';
$page="newsletter-subscribers.php";
break;

case 'settings-localizations':
$title = '{{Languages}}';
$page="settings-localizations.php";
break;

case 'posts':
$title = '{{Posts}}';
$page="pages.php";
break;

default:

// SHOW PLUGIN PAGE
if(isset($_GET['addpage']) || isset($_GET['post_type'])){

if(file_exists('../includes/plugins/'.$_GET['page'].'/functions.php'))
include "../includes/plugins/".$_GET['page']."/functions.php";

$title = '{{Pages}}';
$page="pages.php";


}elseif( array_search($_GET['page'], explode(',',get_settings('plugins'))) ||  get_settings('plugins') == $_GET['page']){

$title = '{{Pages}}';

if(file_exists('../includes/plugins/'.$_GET['page'].'/index.php'))
$page="../includes/plugins/".$_GET['page']."/index.php";

// END PLUGIN PAGE

}else{

$title = '{{Dashboard}}';
$page="home.php";

}

break;

}

if(!isset($_GET['ajax'])){
$output.= get_admin_header($title);
}

if(empty($_GET['page'])){
	$page='home.php';
}

ob_start();
include $page;
$output.= ob_get_contents();
ob_end_clean();

if(!isset($_GET['ajax'])){
$output.= get_admin_footer();
}

echo localize_admin_content($output);

