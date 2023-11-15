<?php

if($_POST['post_type']){
$post_type_csv=$_POST['post_type'].'.csv';
// die($post_type_csv);
}else{
$post_type_csv=$_GET['post_type'].'.csv';	
}
// }else{
// 	$post_type_csv=''.$_GET['post_type'].'.csv';
// }


?>

<div class="content">
<div class="container-fluid">


<?php if(!empty($_GET['delete'])){

$row = 0;
$pages = array();
if (($handle = fopen("../data/".$post_type_csv."", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
        $num = count($data);
        $row++;
        // echo $data;
        if($row != $_GET['delete']){
        for ($c=0; $c < $num; $c++) {
            $qq.= $data[$c].";";
        }
        $qq.= $data[$c]."\n";
        }else{
        	add_notifications(''.$data[0].'('.$_GET['post_type'].') {{deleted}}', '/admin/?post_type='.$_GET['post_type'].'&page='.$_GET['page'].'');
        }

    }

	file_put_contents("../data/".$post_type_csv."", $qq);

    fclose($handle);
	// header('location:?post_type='.$_GET['post_type'].'&page='.$_GET['page'].'');
    // die();
}

}


?>


<?php if(!empty($_GET['edit']) || !empty($_GET['addpage']) || isset($_GET['edit'])){

if($_POST['title']){

	// echo '<pre>';
	// print_r($_FILES);
	// echo '</pre>';
	// die();

    if(count($_FILES['files']['name']) > 0){
        foreach ($_FILES['files']['name'] as $i => $name) {     
            // UPLOAD FILES
            $uploaddir = '../files/';
            $uploadfile = $uploaddir . basename($_FILES['files']['name'][$i]);
            

            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $uploadfile)) {
	        	$nums++;
            
                $image = new ImageResize($uploaddir . basename($_FILES['files']['name'][$i]));
                $image->resizeToHeight(900);
                $image->save($uploaddir . basename($_FILES['files']['name'][$i]));
               
                $image = new ImageResize($uploaddir . basename($_FILES['files']['name'][$i]));
                $image->crop(400, 400);

                $image->save($uploaddir.'thumbs/' . basename($_FILES['files']['name'][$i]));

                // $watermark = new Watermark();
                // $watermark->apply($uploaddir . basename($_FILES['files']['name'][$i]), $uploaddir . basename($_FILES['files']['name'][$i]), 'assets/img/watermark-small.png', 3);

                $gallery.=basename($_FILES['files']['name'][$i]); 
                if($nums < count($_FILES['files']['name'])){$gallery.=",";}
            } else {
                $error[]='Nepodařilo se nahrát soubor '.$_FILES['files']['tmp_name'][$i].'';
            }


        }
    }else{
		// $gallery = $_POST['gallery_original_content'];
    }

    if(!empty($_POST['gallery_original_content'])){
    	$gallery = $_POST['gallery_original_content'].','.$gallery;
    }

    $gallery = array_unique(explode(',',$gallery));

    if( !empty($gallery) ){


        for($i=0; $i < count($gallery); $i++){
            if(file_exists('../files/'.$gallery[$i]) && !empty($gallery[$i])){
        	$galleries.=$gallery[$i].'';
        	if($i < count($gallery)-1){
        	$galleries.=',';	
        	}
            }
        unset($active);
        }

    }


    // $gallery = str_replace(',,', ',', $gallery);
	// die($galleries);
    $gallery = base64_encode($galleries);
    // die($gallery);


	// PLUGIN POST AREAS TO ATTRIBUTES
	if(!empty($addtopostarea[$_POST['post_type']])){

	foreach ($addtopostarea[$_POST['post_type']] as $key => $value) {

			if(count($value['shipping'])){
				$value = $value['shipping'];
			}
			if(count($value['billing'])){
				$value = $value['billing'];
			}
			// , konvetrovat na &#44;
			if(is_array($_POST[$value['name']])){$_POST[$value['name']] = base64_encode(json_encode($_POST[$value['name']]));}
			$_POST[$value['name']] = str_replace(',', '&#44;', $_POST[$value['name']]);
			$attributes.= $value['name'].':'.$_POST[$value['name']].',';
			unset($value);
	}
    }
    // print_r($_GET['post_type']);
    // echo $_GET['post_type'];
    // die($attributes);
	$attributes = base64_encode($attributes);



	if($_POST['action'] == 'addpage'){
	
	if(empty($_POST['url'])){
	$slug = slugify($_POST['title']);
	}else{
	$slug = slugify($_POST['url']);
	}

    $check_slug = find_content('../data/pages.csv', $slug);
    
    if(!empty($check_slug['slug'])){
    	$slug = $slug.'1';
    }

	$seo = base64_encode($_POST['seo-title'].','.$_POST['seo-keywords'].','.$_POST['seo-description']);

	if($_POST['post_language'] != ''){$language = $_POST['post_language'];}else{$language = get_settings('default_language');}

	$content="".$_POST['title'].";".$slug.";".time().";".$language.";".base64_encode($_POST['content']).";".base64_encode($_POST['excerpt']).";".$gallery.";".$_POST['template'].";".$seo.";".$attributes.";\n";

	file_put_contents("../data/".$post_type_csv."", $content, FILE_APPEND | LOCK_EX);

	$success = 'added';
	
	}else{

	$row = 0;
	$pages = array();
	if (($handle = fopen("../data/".$post_type_csv."", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
        $num = count($data);
        $row++;
        // echo $data;
        if($row == $_POST['pageid']){

		if(empty($_POST['url'])){
		$slug = slugify($_POST['title']);
		}else{
		$slug = slugify($_POST['url']);
		}

	    $check_slug = find_content('../data/pages.csv', $slug);

	    if(!empty($check_slug['slug'])){
	    	$slug = $slug.'1';;
	    	$slug_original = $_POST['original_url'];
	    }

		$seo = base64_encode($_POST['seo-title'].','.$_POST['seo-keywords'].','.$_POST['seo-description']);
		
		if(isset($_POST['post_language'])){$language = $_POST['post_language'];}else{$language = get_settings('default_language');}
		
		if(isset($_POST['date'])){$date=strtotime($_POST['date']);}else{$date=time();}

        $qq.= "".$_POST['title'].";".$slug.";".$date.";".$language.";".base64_encode($_POST['content']).";".base64_encode($_POST['excerpt']).";".$gallery.";".$_POST['template'].";".$seo.";".$attributes.";\n";

        }else{

	        for ($c=0; $c < $num; $c++) {
	        	if(!empty($check_slug['slug'])){
	        	$data[$c] = str_replace($slug_original, $slug, $data[$c]);
		        }
	            $qq.= $data[$c].";";
	        }
	        $qq.="\n";
        }

    }
    // echo $qq.'<br>';
    // die();

	file_put_contents("../data/".$post_type_csv."", $qq);
	$success = 'updated';
    fclose($handle);
	}

	}

	header('location:?page='.$_GET['page'].'&post_type='.$_GET['post_type'].'&state='.$success.'');
	
}

	$row = 0;
	$page=array();
	if (($handle = fopen("../data/".$post_type_csv."", "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 500000, ";")) !== FALSE) {
	        $num = count($data);
	        $row++;
	        for ($c=0; $c < 11; $c++) {
										            $pages[$row]['row'] = $row;
										            $pages[$row][$c] = $data[$c];
											        $pages[$row]['sort'] = explode(':',$data[0])[1];
											        $pages[$row]['time'] = $data[2];
	        }
	    }
	    fclose($handle);
	}





	// usort($pages,"cmp");

	// echo '<pre>';
	// print_r($pages);
	// echo '</pre>';

	$page_title = $pages[$_GET['edit']][0];
	$page_url = $pages[$_GET['edit']][1];
	$page_content = base64_decode($pages[$_GET['edit']][4]);
	$original_content = $pages[$_GET['edit']][4];

	if($pages[$_GET['edit']][2]){
	$date = date("d-m-Y H:i", $pages[$_GET['edit']][2]);
	}
	
	$excerpt =  base64_decode($pages[$_GET['edit']][5]);
 	$gallery =  base64_decode($pages[$_GET['edit']][6]);
 	$template =  $pages[$_GET['edit']][7];
	$seo =  base64_decode($pages[$_GET['edit']][8]);
	$attributes =  base64_decode($pages[$_GET['edit']][9]);
	$visibility =  $pages[$_GET['edit']][10];

    ?>


	             





	                <div class="row">
	                    <div class="col-md-12">

			<form action="#" method="post" enctype="multipart/form-data">

               <div class="card">
                    <div class="card-content">
                            <div class="row">
                                <div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">{{Page title}}</label>
										<input name="title" type="text" class="form-control" value="<?=$page_title;?>"></div>
                                </div>
                                <div class="col-md-3">
									<div class="form-group label-floating">
										<label class="control-label">{{Page URL}}</label> 
										<input name="url" type="text" class="post-slug slug form-control" value="<?=$page_url;?>"></div>
										<input name="original_url" type="hidden" class="form-control" value="<?=$page_url;?>"></div>

                                <div class="col-md-3">
									<div class="form-group label-floating">
									
											<select name="template" class="form-control">
												<option value="">{{Default}} {{Template}}</option>
												<?php

												$dirname = '../templates/'.get_settings('default_template').'';
												$findme  = "*.php";
												$dirs    = glob($dirname.'*');

												foreach( $dirs as $d ) {
												    $f = glob( $d .'/'. $findme );
												    if( count( $f ) ) {

														// array_multisort(array_map('filemtime', $f), SORT_NUMERIC, SORT_DESC, $f);
														
												    	foreach ($f as $key => $value) {

														$css_read = file_get_contents($value);
														preg_match('/Template name: (.*) /', $css_read, $matches, PREG_OFFSET_CAPTURE, 0);
														$template_name = $matches[1][0];
														if( !empty($template_name) ){
														if($template == basename($value)){$selected = 'selected';}
												    		echo '<option value="'.basename($value).'" '.$selected.'>'.$template_name.'</option>';
												    		unset($selected);
												    	}
												    	}


												    }
												}
												?>
											</select>
										</div>
                                </div>
                            </div>
                            </div>
                    </div>



				<textarea name="original_excerpt" style="display:none;"><?php echo $excerpt;?></textarea>
				<textarea name="original_content" style="display:none;"><?php echo $original_content;?></textarea>
				<input name="action" type="hidden" value="<?php if(!empty($_GET['addpage'])){echo 'addpage';} ?>">
				<input name="pageid" type="hidden" value="<?php if(!empty($_GET['edit'])){echo $_GET['edit'];} ?>">
				<input name="post_language" type="hidden" value="<?php if(!empty($_GET['post_language'])){echo $_GET['post_language'];} ?>">

				<input name="post_type" type="hidden" value="<?=$_GET['post_type'];?>">


                            <div class="row">
                                <?php
                            	//ADD PLUGIN POST AREAS
                            	// print_r($addtopostarea);
								if(!empty($addtopostarea[$_GET['post_type']])){
								$attributes_array = explode(',', $attributes);
								// print_r($addtopostarea[$_GET['post_type']])
								foreach ($addtopostarea[$_GET['post_type']] as $key => $value) {
									$i++;
									
									if(count($value['shipping'])){
										$value = $value['shipping'];
									}

									if(count($value['billing'])){
										$value = $value['billing'];
									}


								?>

	        <div class="col-md-<?=$value['col']?>">
               <div class="card">
                    <div class="card-content">
                            <div class="row">

						        <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label"><?=$value['title'];?></label>
										<?php
										$attributes_array = explode(',', $attributes);
										foreach ($attributes_array as $key => $ATTS) {
											$attributes_array2[$key] = explode(':',$ATTS);
										}

										$attributes_array_key	 = array_search($value['name'], array_column($attributes_array2, 0));

										$att_value = $attributes_array2[$attributes_array_key][1];


										switch ($value['type']) {
										case 'input-textarea':
										// print_r($attributes_array);
											echo $value['prefix'].'<textarea rows="1" class="form-control" name="'.$value['name'].'"/>'.$att_value.'</textarea>';
											if($value['suffix']){echo '<div class="currency-input-symbol">'.$value['suffix'].'</div>';}


										break;
										case 'input-text':
										// print_r($attributes_array);
											echo $value['prefix'].'<input type="text" class="'.$value['class'].' form-control" value="'.$att_value.'" placeholder="" name="'.$value['name'].'"/>';
											if($value['suffix']){echo '<div class="currency-input-symbol">'.$value['suffix'].'</div>';}


										break;
										case 'function':
										if(!empty($_POST)){$post=$_POST;}else{$post=$pages;}
										call_user_func($value['value'], $post, $att_value ); 

										break;
										case 'input-select':
										
										echo $value['prefix'];


										echo $value['suffix'];

										echo '<select class="form-control" name="'.$value['name'].'">';

										foreach ($value['values'] as $key => $values) {
											if(!isset($values['title'])){
												if($att_value == $values){$selected = ' selected';}
												echo '<option value="'.$values.'" '.$selected.'>'.$values.'</option>';
											}else{
												if($att_value == $values['name']){$selected = ' selected';}
												echo '<option value="'.$values['name'].'" '.$selected.'>'.$values['title'].'</option>';
											}
											unset($selected);
										}

										echo '</select>';

												if($value['suffix'] && $value['name'] == 'currency'){
													echo '<div class="currency-input-symbol">'.$value['suffix'].'</div>';
												}else{
													echo ' '.$value['suffix'].'';
												}

										break;

										case 'output-json-base64':
										// print_r($attributes_array);
											$output_json = $att_value;
											// ob_start();
											$function_call = call_user_func($value['function'], $output_json, $_GET['edit'] ); 
											// $content_output = ob_get_contents();
											// ob_end_clean();

											echo $value['prefix'].' '.$function_call.'<input type="hidden" value="'.$output_json.'" name="'.$value['name'].'" />';
											if($value['suffix']){echo '<div class="currency-input-symbol">'.$value['suffix'].'</div>';}


										break;

									
										default:
											# code...
										break;
										}


										?>
										</div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>

									<?php
								}
							    }
							    ?>
							</div>



               <div class="card" style="<?php if($addtopostarea['orders']){echo 'display:';}?>">
                    <div class="card-content">
                            <div class="row">
	                            
	                            <?php if($addtomenu_admin[0]['show-media'] !== false){ ?>

                                <div class="col-md-12">


	                            <section>
	                                <h3>{{Media}}</h3>
	                                <?php $gallery = str_replace(',,', ',', $gallery); ?>
	                                <div class="file-uploaded-images  file-upload-previews">
	                                <?php

	                                $gallery = explode(",", $gallery);


									
	                                if(is_array($gallery)){$gallery=$gallery;}else{$gallery=array($gallery);}
									// $gallery = array_filter($gallery, function($a) { return ($a !== ''); });	
                                    $gallery = array_unique($gallery);

	                                if( !empty($gallery) ){


	                                    for($i=0; $i < count($gallery); $i++){
	                                        if($item['marker_image'] == $gallery[$i] ){$active=' cover-active';}
	                                        if(file_exists('../files/'.$gallery[$i]) && !empty($gallery[$i])){
	                                    	$galleries.=$gallery[$i].',';
	                                    //     echo '
	                                    // <div class="image" style="overfow:hidden;height: 120px; width: auto !important;">
	                                    //     <figure><a class="deletePhoto" attr-post="'. $_GET['edit'] .'" post-type="'. $_GET['post_type'] .'" attr-file="'. $gallery[$i] .'"><i class="fa fa-close"></i></a></figure>
	                                    //     <figure class="addCover '.$active.'"><a attr-post="'. $_GET['edit'] .'" attr-file="'. $gallery[$i] .'" title="Hlavní fotografie"><i class="fa fa-image"></i></a></figure>
	                                        
	                                    //     <a class="MultiFile-insert" href=""><i class="material-icons">note_add</i></a>


	                                    //     <img class="addImage2tiny" src="'.get_settings('siteurl').'/files/'. $gallery[$i] .'" alt="" image-src="'.get_settings('siteurl').'/files/'. $gallery[$i] .'">
	                                    // </div>';
	                                    	echo '
	                                    	<div class="MultiFile-label"><a class="deletePhoto MultiFile-remove" href="#MultiFile1"  attr-post="'. $_GET['edit'] .'" post-type="'. $_GET['post_type'] .'" attr-file="'. $gallery[$i] .'">x</a> <a class="MultiFile-insert" href="#MultiFile1"><i class="material-icons">note_add</i></a> <span><span class="MultiFile-label" title="'. $gallery[$i] .'"><span class="MultiFile-title">'. $gallery[$i] .'</span><img class="MultiFile-preview" style="undefined" src="'.get_settings('siteurl').'/files/'. $gallery[$i] .'"></span></span></div>';
		                                    }
	                                    unset($active);
	                                    }

	                                }
	                                else {

	                                }

	                                ?>
	                                <input type="hidden" name="gallery_original_content" value="<?=$galleries;?>">


	                                </div>

	                                <div class="file-upload">
	                                    <input type="file" name="files[]" class="file-upload-input with-preview" multiple title="Click to add files" accept="gif|jpg|png">
	                                    <span>{{Click or Drag and Drop to upload photos}}</span>
	                                </div>

	                                <!--end form-group-->
	                            </section>

		                        </div>

	                            <?php } ?>

                            	<?php if($_GET['post_type'] == 'posts'){ ?>
                                <div class="col-md-12">

										<label class="control-label">{{Excerpt}}</label>
										 <textarea name="excerpt" class="excerpt" id="" rows="2"><?php echo $excerpt;?></textarea><br/>


                                </div>
                                <?php } ?>


                                <?php

                                foreach ($addtomenu_admin as $key => $value) {
											if($value['post_type'] == $_GET['post_type']){
		                                		$showeditor = $value['show-editor'];
	                                		}

                                		foreach ($value as $key => $value) {
                                			if($value['post_type'] == $_GET['post_type']){
		                                		$showeditor = $value['show-editor'];
	                                		}
                                		}
                                }
                                
                                if($showeditor !== false){ ?>
                                <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">{{Content}}</label>
										 <textarea name="content" class="textarea" id="contents"><?php echo $page_content;?></textarea><br/>

									</div>
                                </div>
	                            <?php } ?>


							    <div class="col-md-2">
									<div class="form-group label-floating">
										<label class="control-label">{{Date}}</label>
									  	 <input type="text" name="date" value="<?=$date;?>">
									</div>
                                </div>

							    <div class="col-md-10">
									<div class="form-group label-floating">
									  	 <input type="submit" class="btn btn-default btn-xs" value="{{Save}}">
									</div>
                                </div>





                            </div>
                    </div>
                </div>




</form>

</div>
</div>


<?php }else{ ?>


	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">

	                                <a href="?addpage=1&post_type=<?=$_GET['post_type'];?>&page=<?=$_GET['page'];?>" class="btn btn btn-info buttonright"><i class="material-icons">add_circle_outline</i>  {{Add new}}</a> 

	                                <h4 class="title" style="text-transform: capitalize;"><?php if($_GET['page'] == 'posts'){?>{{Posts}}<?php }else{ ?><?=$_GET['post_type'];?> <?php } ?></h4>
	                                <p class="category">{{List}}</p>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table <?=$_GET['page'];?>">
	                                 
											<thead>
	                                        	<th width="10"><?php if($_GET['page'] == 'pages'){?>{{Sort}}<?php }else{ ?>{{Thumbnail}}<?php } ?></th>
	                                        	<th>{{Title}}</th>
	                                        	<th>{{Date}}</th>


				                                <?php
				                            	// 	ADD PLUGIN POST AREAS
				                                // echo print_r($addtopostarea[$_GET['post_type']]);
												if(!empty($addtopostarea[$_GET['post_type']])){
												foreach ($addtopostarea[$_GET['post_type']] as $key => $value) {
												if($value['show-menu']){

												?>
												<th><?=$value['title'];?></th>	
												<?php
												}
												}
											    }
											    ?>
	                                        	<th>{{Language}}</th>
												<th>{{Actions}}</th>
	                                        </thead>
											<tbody>

	                                    <?php

										$row = 0;
										$pages = array();
										if (($handle = fopen("../data/".$post_type_csv."", "r")) !== FALSE) {
										    while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
										        $num = count($data);
										        $row++;

										        for ($c=0; $c < 11; $c++) {
										            $pages[$row]['row'] = $row;
										            $pages[$row][$c] = $data[$c];
											        if(isset(explode(':',$data[0])[1])){$pages[$row]['sort'] = explode(':',$data[0])[1];}
											        $pages[$row]['seo'] = base64_decode($data[8]);
											        $pages[$row]['attributes'] = base64_decode($data[9]);
											        $pages[$row]['time'] = $data[2];
										        }

										    }
										    fclose($handle);
										}
										$pagesoriginal = $pages; 
										
							            // usort($pages,"cmp"); 
										usort($pages,"cmp_date");
										$pages = array_reverse($pages);

										// $pages = array_reverse($pages);
										// $pages = array_unique($pages);

										$filename = '../data/settings.csv';
										    $f = fopen($filename, "r");
										    $languages_csv = false;
										    while ($row = fgetcsv($f, 500000, ";")) {
										        if ($row[0] == 'languages') {
										            $languages_csv = $row[1];
										            break;
										        }
										    }
										    fclose($f);

							            $languages = explode(',', $languages_csv);


										//SEARCH FOR LOCALIZATION
										function searchForId($id, $array) {
										   foreach ($array as $key => $val) {
										       if ($val[3] === $id) {
										           return $key;
										       }
										   }
										   return null;
										}
										
										function searchForTime($id, $array) {
										   foreach ($array as $key => $val) {
										       if ($val[2] === $id) {
										           return $key;
										       }
										   }
										   return null;
										}
										
										$number_of_columns = count($addtopostarea[$_GET['post_type']]);
										if(empty($number_of_columns)){$number_of_columns = 5;}
										if(count($pages) == 0){echo '<tr class="emptypage"><td colspan="'.$number_of_columns.'"><center><i class="material-icons emptypage">nature_people</i> {{No posts yet.}}</center></td></tr>';}else{


										
										// echo '<pre>';
										// print_r($pages);
										// echo '</pre>';
										// echo $langSearch = searchForId('en:o-nas', $pages);
										foreach ($pages as $key => $value) {


											  foreach ($languages as $lang) {

												  	$langSearch = searchForId(''.$lang.':'.$value[1].'', $pagesoriginal);
												  	$langSearchOriginal = searchForId(''.$lang.':'.$value[1].'', $pagesoriginal);
												  	
												  	if($langSearchOriginal){
												  	$langSearchOriginal2.=$langSearchOriginal.',';
												  	}

												  	if(is_numeric($langSearch) || $lang == get_settings('default_language')){
											  		if(empty($langSearch)){$langSearch = searchForTime($value[2], $pagesoriginal);}
											  		// if(empty($langSearch)){$langSearch=$value['row'];}
	                                                $langs.= ' 
	                                                <a href="?edit='.$langSearch.'&post_language='.strtolower($lang).':'.$value[1].'&post_type='.$_GET['post_type'].'&page='.$_GET['page'].'">
	                                                <img src="../includes/images/flags/'.strtolower($lang).'.png" style="height:15px; width: auto;" class="page-flag" /></a>';
													
													if($pagesoriginal[$langSearch][10] == 1){$opacity="1";$visibility = '0';}else{$opacity="0.5";$visibility = '1';}

													if($_GET['page'] == 'pages'){
													$langs.= ' 
	                                                <span class="material-icons setvisibility" style="opacity:'.$opacity.'" data-visibility="'.$visibility.'" data-post-type="'.$_GET['post_type'].'" data-id="'.$langSearch.'" data-slug="'.$pagesoriginal[$langSearch][1].'">short_text</span>';
		                                            }


	                                                }elseif($lang != ''){
                                                	$langs.= '
	                                                <a href="?addpage=1&post_language='.strtolower($lang).':'.$value[1].'&post_type='.$_GET['post_type'].'&page='.$_GET['page'].'">
                                                	<img src="../includes/images/flags/'.strtolower($lang).'.png" style="height:15px; width: auto; opacity:0.4;" class="page-flag" /></a>  ';
	                                                }

	                                          }

                                           	  if($value[3] == '' || get_settings('default_language') == $value[3]){
                                           	  // if(empty($value[3])){

										        echo '<tr row-id="'.$value['row'].'" row-slug="'.$value[1].'" row-posttype="'.$_GET['page'].'">';
										        //'.explode(':',$value[0])[1].'
										        if($_GET['page'] == 'pages'){
										        echo '<td style="font-weight:bold;" class="sort"><i class="material-icons">list</i></td>';
												}else{
												$thumb_col = explode(',',base64_decode($value[6]))[0];
												if(file_exists('../files/'.$thumb_col) && file_exists('../files/thumbs/'.$thumb_col) && !empty($thumb_col)){$thumb = '../files/thumbs/'.$thumb_col;}else{$thumb = 'assets/img/defaultthumb.jpg';}
												echo '<td align="center"><img src="'.$thumb.'" style="border-radius: 40px;width:50px;height:50px;" /></td>';
										        }

										        
										        echo '<td style=""><strong>'.explode(':',$value[0])[0].'</strong><br/><small><a href="http://'.$_SERVER['HTTP_HOST'].'/'.$value[1].'/" target="_blank" class="show-link">http://'.$_SERVER['HTTP_HOST'].'/'.$value[1].'/</a></small></td>';
										        echo '<td>'.date('d.m. Y H:i', $value[2]).'</td>';



				                            	//ADD PLUGIN POST AREAS

												if(!empty($addtopostarea[$_GET['post_type']])){
												foreach ($addtopostarea[$_GET['post_type']] as $key => $areas) {
												if($areas['show-menu']){
												?>
												<td><?php

												$attributes_array = explode(',', $value['attributes']);
												foreach ($attributes_array as $key => $ATTS) {
													$attributes_array2[$key] = explode(':',$ATTS);
												}
												// print_r($attributes_array2);

												$attributes_array_key	 = array_search($areas['name'], array_column($attributes_array2, 0));
												// echo $areas['name'];
												$att = $attributes_array2[$attributes_array_key][1];
												
													echo $areas['prefix'].''.$att.''.$areas['suffix'];
												
												unset($att);
												unset($attributes_array_key);


												?></td>	
												<?php
												}
												}
											    }

										        echo '<td>'.$langs.'</td>';
										        // print_r($value[2]);
									            echo '<td>
											            <a href="?edit='.searchForTime($value[2], $pagesoriginal).'&post_type='.$_GET['post_type'].'&page='.$_GET['page'].'" class="btn btn-xs btn-info">{{Edit}}</a>
											            <a href="?delete='.$langSearchOriginal2.''.$value['row'].'&post_type='.$_GET['post_type'].'&page='.$_GET['page'].'" class="btn btn-xxs btn-danger confirmation" swal-title="{{Are you sure?}}" swal-text="{{Do you really want to delete}} '.explode(':',$value[0])[0].'?" swal-confirm="{{Yes, delete}}" swal-cancel="{{Cancel}}"><i class="material-icons">delete</i></a>
									            	  </td>';
										        echo '</tr>';

									          unset($langs);
									          unset($langSearch);


									          }
									          unset($langSearchOriginal2);

										}

										}

										?>



	                                </tbody>
	                                </table>


	                            </div>
	                        </div>
	                    </div>

	                </div>

	                <?php } ?>
	            </div>
	        </div>
