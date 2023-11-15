<?php
// error_reporting(-1);
// error_reporting(E_ALL);
// die($_SERVER['REMOTE_ADDR']);
// echo 'x';
// die();
// if($_SERVER['REMOTE_ADDR'] != '109.81.215.49'){
// die('Provadime upravy, prijdte prosim pozdeji.');
// }
include "functions.php";


    // LOOP PLUGINS TO HEADER
    $plugins = get_settings('plugins');
    if(is_array(explode(',',$plugins)) || get_settings('plugins') != ''){

    if(is_array(explode(',',$plugins))){

        foreach (explode(',', $plugins) as $key => $value) {
            if(file_exists('includes/plugins/'.$value.'/index.php')){
                include "includes/plugins/".$value."/functions.php";
            }
        }
    }
    }



    if(!empty($_GET['page']) && $_GET['page'] != '/'){

    $page = str_replace('/', '', $_GET['page']);

    }else{

    $page = get_settings('default_homepage');

    }


    // TRY  TO FIND PAGE
    $find_string = find_content('data/pages.csv', $page);
    $page_content = $find_string['content'];
    // $page_slug = base64_decode($find_string['slug']);
    $page_slug = $find_string['slug'];
    $page_title = explode(':', $find_string['title'])[0];
    $page_usertemplate = $find_string['template'];


    // TRY  TO FIND POST
    if(!empty($page_slug)){
        $page_template='page.php';
    }else{

    // TRY  TO FIND PAGE
    $find_string = find_content('data/posts.csv', $page);
    $page_content = $find_string['content'];
    $page_slug = $find_string['slug'];
    $page_title = explode(':', $find_string['title'])[0];
    $page_usertemplate = $find_string['template'];
    $page_template='single.php';

    }
    if(empty($page_slug)){


    // LOOP PLUGINS TO HEADER
    $addtomenu = array();
    $plugins = get_settings('plugins');
    if(is_array(explode(',',$plugins)) || get_settings('plugins') != ''){
    
    if(is_array(explode(',',$plugins))){
        foreach (explode(',', $plugins) as $key => $value_plugin) {
            if(file_exists('includes/plugins/'.$value_plugin.'/index.php'))
            include 'includes/plugins/'.$value_plugin.'/functions.php';
        
        }
    }
    }



    // $addtomenu2 = array_search($addtomenu, 'page');

    // echo '<pre>';
    // print_r($addtomenu);
    // echo '</pre>';
    

    $page_usertemplate_plugins = array();
    $poradnik = -1;
    foreach ($addtomenu as $keyX => $valueXX) {

        if(count($valueXX) > 0){
            // echo '<pre>';
            // print_r($valueXX[$keyX]);
            // echo '</pre>';
            foreach ($valueXX as $keyX2 => $valueXX2) {
                // if($keyX2 == 'page'){   
                // print_r($valueXX2);
                foreach ($valueXX2 as $key => $value) {
                if($key == 'post_type'){   
                    $page = str_replace('/', '', $_GET['page']);
                    // $result = get_usertemplate($value, $page);
                    $result = find_content('data/'.$value.'.csv', $page);
                    // print_r($result);
                    if($result['template'] != ''){
                    $page_title = $result['page_title'];
                    $page_usertemplate_plugins[] = $result['template'];
                    }
                }
                }
                unset($post_type);

            }

        }
      

    }

    if(is_array($page_usertemplate_plugins)){

        foreach ($addtomenu as $keyX => $valueXXX) {

           
                    $page = str_replace('/', '', $_GET['page']);
                    // $result = get_usertemplate($valueXXX['post_type'], $page)['template'];
                    $result = find_content('data/'.$valueXXX['post_type'].'.csv', $page);
                    if($result['template'] != ''){
                    $page_title = $result['page_title'];
                    $page_usertemplate_plugins[] = $result['template'];
                    }
                    // unset($post_type);

        }
    }

    }
    
    // print_r($page_usertemplate_plugins);

    if(is_array($page_usertemplate_plugins)){
        $page_usertemplate = array_filter($page_usertemplate_plugins);
        $page_usertemplate = $page_usertemplate_plugins[0];
    }
    if(empty($page_usertemplate) && empty($page_template)){
        $page_usertemplate = '404.php';
    }
    if(isset($_GET['s'])){
        $page_title = '{{Search}}';
        $page_content = get_search_page($_GET['s']);
    }


$output = '';
$output.= get_header();

// if((empty($page_slug) || $page == get_settings('default_homepage')) && empty($page_usertemplate)){
if( ( empty($page_slug) || $page == get_settings('default_homepage') ) && empty($page_usertemplate)){
    ob_start();
    include "templates/".get_settings('default_template')."/index.php";
    $index = ob_get_contents();
    ob_end_clean();
    $output.= $index;

}elseif(!empty($page_usertemplate)){
    ob_start();
    include "templates/".get_settings('default_template')."/".$page_usertemplate."";
    $index = ob_get_contents();
    ob_end_clean();

    $output.= $index;

}else{
    ob_start();
    include "templates/".get_settings('default_template')."/".$page_template."";
    $index = ob_get_contents();
    ob_end_clean();

    $output.= $index;

}

$output.= get_footer();
echo localize_content($output);