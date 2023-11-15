<?php
include "../../functions.php";

if($_GET['menu']){


	$filename = '../../data/settings.csv';

    $f = fopen($filename, "r");
    $result = false;

    // print_r($row);
    // echo $row[0];
    $column = 'menu_sort';
    // foreach ($_GET['menu'] as $key => $value) {
    //     $menus.=$value.',';
    // }
    while ($row = fgetcsv($f, 500000, ";")) {

        if($row[0] == 'menu_sort'){
            $rows.= 'menu_sort;'.$_GET['menu'].';';
        }else{
            $rows.= $row[0].';'.$row[1].';';
        } 
        $rows.= "\n";

    }

	file_put_contents("../../data/settings.csv", $rows);
    fclose($f);

}elseif($_GET['sort']){

	$post_type_csv = $_GET['post_type'];

	$number = $_GET['sort'];
	$pageid = $_GET['id'];
	$slug = $_GET['slug'];


    $find_string  = find_content('../../data/'.$post_type_csv.'.csv', $slug, 1);
    $page_content = $find_string['content'];
    $page_excerpt = $find_string['excerpt'];
    $page_title   = $find_string['title'];
    $language   = $find_string['language'];
    $slug   = $find_string['slug'];
    $seo   = $find_string['seo'];
    $template   = $find_string['template'];
    $visibility = $find_string['visibility'];


	$row = 0;
	$pages = array();
	if (($handle = fopen("../../data/".$post_type_csv.".csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
        $num = count($data);
        $row++;
        // echo $data;
        if($row != $pageid){
	        for ($c=0; $c < $num; $c++) {
	            $qq.= $data[$c].";";
	        }
	        $qq.="\n";
        }else{

	       $qq.= "".$page_title.":".$number.";".$slug.";".time().";".$language.";".$page_content.";".$page_excerpt.";".$gallery.";".$template.";".$seo.";".$attributes.";".$visibility.";\n";
           
        }

    }
    // echo $qq.'<br>';

	file_put_contents("../../data/".$post_type_csv.".csv", $qq);
	$success = 'updated';
    fclose($handle);

	}

}elseif($_GET['data_visibility'] == 1 || $_GET['data_visibility'] == 0){

    $post_type_csv = $_GET['post_type'];
    $pageid = $_GET['data_id'];
    $slug = $_GET['data_slug'];
    $visibility = $_GET['data_visibility'];

    $find_string  = find_content('../../data/'.$post_type_csv.'.csv', $slug, 1);
    $page_content = $find_string['content'];
    $page_excerpt = $find_string['excerpt'];
    $page_title   = $find_string['title'];
    $language   = $find_string['language'];
    $slug   = $find_string['slug'];
    $seo   = $find_string['seo'];
    $template   = $find_string['template'];

    $row = 0;
    $pages = array();
    if (($handle = fopen("../../data/".$post_type_csv.".csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
        $num = count($data);
        $row++;
        // echo $data;
        if($row != $pageid){
            for ($c=0; $c < $num; $c++) {
                $qq.= $data[$c].";";
            }
            $qq.="\n";
        }else{

            $qq.= "".$page_title.";".$slug.";".time().";".$language.";".$page_content.";".$page_excerpt.";".$gallery.";".$template.";".$seo.";".$attributes.";".$visibility.";\n";
        }

    }
    echo $qq.'<br>';

    file_put_contents("../../data/".$post_type_csv.".csv", $qq);
    $success = 'updated';   
    fclose($handle);

    }

}