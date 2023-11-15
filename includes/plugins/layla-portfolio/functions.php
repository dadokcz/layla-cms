<?php

// CUSTOMIZE MENU

// $tomenu = array();
$tomenu['name'] = '{{Portfolio}}';
$tomenu['page'] = 'layla-portfolio';
$tomenu['post_type'] = 'portfolio';
$tomenu['url'] = '?page=layla-portfolio&post_type=portfolio';
$tomenu['icon'] = 'assignment_ind';

$tomenu[0]['name'] = '{{Client categories}}';
$tomenu[0]['page'] = 'category';
$tomenu[0]['post_type'] = 'project-category';
$tomenu[0]['url'] = '?page=layla-portfolio&post_type=project-category';
$tomenu[0]['icon'] = 'shopping_basket';

// $addtomenu[] = array($tomenu);
array_push($addtomenu, $tomenu);
$addtomenu_admin[] = $tomenu;
unset($tomenu);

// echo '<pre>';
// print_r(array($tomenu));
// echo '</pre>';


// CUSTOMIZE EDIT POST AREA



$postarea['orders'][2]['show-menu'] = true;
$postarea['orders'][2]['prefix'] = '';
$postarea['orders'][2]['suffix'] = '';
$postarea['orders'][2]['col'] = '2';


$postarea['portfolio'][0]['title'] = '{{Project color}}';
$postarea['portfolio'][0]['name'] = 'project-color';
$postarea['portfolio'][0]['type'] = 'input-text';
$postarea['portfolio'][0]['show-menu'] = false;
$postarea['portfolio'][0]['prefix'] = '';
$postarea['portfolio'][0]['suffix'] = '';
$postarea['portfolio'][0]['col'] = '2';


$postarea['portfolio'][1]['title'] = '{{Project date}}';
$postarea['portfolio'][1]['name'] = 'project-date';
$postarea['portfolio'][1]['type'] = 'input-text';
$postarea['portfolio'][1]['show-menu'] = false;
$postarea['portfolio'][1]['prefix'] = '';
$postarea['portfolio'][1]['suffix'] = '';
$postarea['portfolio'][1]['col'] = '2';

$postarea['portfolio'][2]['title'] = '{{Project client}}';
$postarea['portfolio'][2]['name'] = 'project-client';
$postarea['portfolio'][2]['type'] = 'input-text';
$postarea['portfolio'][2]['show-menu'] = true;
$postarea['portfolio'][2]['prefix'] = '';
$postarea['portfolio'][2]['suffix'] = '';
$postarea['portfolio'][2]['col'] = '2';

$postarea['portfolio'][3]['title'] = '{{Project website}}';
$postarea['portfolio'][3]['name'] = 'project-site';
$postarea['portfolio'][3]['type'] = 'input-text';
$postarea['portfolio'][3]['show-menu'] = false;
$postarea['portfolio'][3]['prefix'] = '';
$postarea['portfolio'][3]['suffix'] = '';
$postarea['portfolio'][3]['col'] = '2';


$postarea['portfolio'][4]['title'] = '{{Category}} 1';
$postarea['portfolio'][4]['name'] 	= 'project-category';
$postarea['portfolio'][4]['type'] 	= 'input-select';
$postarea['portfolio'][4]['show-menu'] = false;
$postarea['portfolio'][4]['prefix'] = '';
$postarea['portfolio'][4]['suffix'] = '';
$postarea['portfolio'][4]['col'] = '2';


$post = layla_get_posts('project-category', 'DESC', 100);

$i=-1; foreach ($post as $key => $value) { $i++;

$data = $post[$i];


$postarea['portfolio'][4]['values'][] = array('title'=>$data['name'], 	'name'=>$data['slug'], 'description'=>'');


}



$postarea['portfolio'][5]['title'] = '{{Category}} 2';
$postarea['portfolio'][5]['name'] 	= 'project-category2';
$postarea['portfolio'][5]['type'] 	= 'input-select';
$postarea['portfolio'][5]['show-menu'] = false;
$postarea['portfolio'][5]['prefix'] = '';
$postarea['portfolio'][5]['suffix'] = '';
$postarea['portfolio'][5]['col'] = '2';


$post = layla_get_posts('project-category', 'DESC', 100);

$i=-1; foreach ($post as $key => $value) { $i++;

$data = $post[$i];


$postarea['portfolio'][5]['values'][] = array('title'=>$data['name'], 	'name'=>$data['slug'], 'description'=>'');


}


$postarea['portfolio'][6]['title'] = '{{Project description}}';
$postarea['portfolio'][6]['name'] = 'project-description';
$postarea['portfolio'][6]['type'] = 'input-text';
$postarea['portfolio'][6]['show-menu'] = false;
$postarea['portfolio'][6]['prefix'] = '';
$postarea['portfolio'][6]['suffix'] = '';
$postarea['portfolio'][6]['col'] = '12';

$addtopostarea = $postarea;

