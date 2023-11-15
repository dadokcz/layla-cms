<?php

// LOOP PLUGINS TO HEADER
$plugins = get_settings('plugins');

if(is_array(explode(',',$plugins)) || get_settings('plugins') != ''){

if(is_array(explode(',',$plugins))){

	foreach (explode(',', $plugins) as $key => $value) {
		if(file_exists('../includes/plugins/'.$value.'/index.php') && is_string($value)){
		include "../includes/plugins/".$value."/functions.php"; }
	}
}
}




$langs = get_countries();
$fname = "../data/settings.csv";

// echo get_layla_currencies();

if($_POST['default_template']){



foreach ($_POST['hp'] as $key => $value) {
	$hps_rows++;
	$hps.= $value['language'].":".$value['value'];
	$new_languages.= $value['language'];
	if(count($_POST['hp']) > $hps_rows){
		$hps.= ",";
		$new_languages.= ",";
	}
}

$languages = get_settings('languages');
$menu_sort = get_settings('menu_sort');
$plugins = get_settings('plugins');
$default_template = get_settings('default_template');



file_put_contents($fname, "");
file_put_contents($fname, "default_template;".$_POST['default_template'].";\n", FILE_APPEND | LOCK_EX);
file_put_contents($fname, "default_admin_template;".$_POST['default_admin_template'].";\n", FILE_APPEND | LOCK_EX);
file_put_contents($fname, "default_url;".$_POST['default_url'].";\n", FILE_APPEND | LOCK_EX);
file_put_contents($fname, "sitename;".$_POST['sitename'].";\n", FILE_APPEND | LOCK_EX);
file_put_contents($fname, "siteemail;".$_POST['siteemail'].";\n", FILE_APPEND | LOCK_EX);
file_put_contents($fname, "sitephone;".$_POST['sitephone'].";\n", FILE_APPEND | LOCK_EX);
file_put_contents($fname, "sitedescription;".$_POST['sitedescription'].";\n", FILE_APPEND | LOCK_EX);
file_put_contents($fname, "default_language;".$_POST['default_language'].";\n", FILE_APPEND | LOCK_EX);
file_put_contents($fname, "default_admin_language;".$_POST['default_admin_language'].";\n", FILE_APPEND | LOCK_EX);
file_put_contents($fname, "languages;".$languages.";\n", FILE_APPEND | LOCK_EX);
file_put_contents($fname, "languages_admin;".$_POST['languages_admin'].";\n", FILE_APPEND | LOCK_EX);
file_put_contents($fname, "default_homepage;".$hps.";\n", FILE_APPEND | LOCK_EX);
file_put_contents($fname, "plugins;".$plugins.";\n", FILE_APPEND | LOCK_EX);
file_put_contents($fname, "menu_sort;".$menu_sort.";\n", FILE_APPEND | LOCK_EX);

global $settings;
foreach ($settings as $key => $valueXX) {
foreach ($valueXX as $key => $value) {
	$i++;
	file_put_contents($fname, "".$value['name'].";".$_POST[$value['name']].";\n", FILE_APPEND | LOCK_EX);
}}


// INSTALL DEMO CONTENT
if($default_template != $_POST['default_template']){
	install_demo($_POST['default_template']);
}

}


// languages;cz,at,de,it,pl,ru,sk,gb

if($_POST){

$errors='
<div class="alert alert-success">
<div class="container-fluid">
	<div class="alert-icon">
		<i class="material-icons">check</i>
	</div>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true"><i class="material-icons">clear</i></span>
	</button>
	<b>{{Success!}}</b> {{Changes was saved.}}
</div>
</div>';
}


$current_language = get_settings('default_language');
$current_admin_language = get_settings('default_admin_language');
$homepage_languages = explode(',', get_all_homepages('default_homepage'));
$languages = explode(',', get_settings('languages'));


?>
                   	<div class="container-fluid">
	                <div class="row">

                        <form action="index.php?page=settings&state=updated" method="post">


	                    <div class="col-md-12">
	                        
	                        <div class="card settings-page">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">{{Settings}}</h4>
									<p class="category">{{System Settings}}</p>
	                            </div>
	                            <div class="card-content">
	                            	<?//$errors;?>

	                                    <div class="row">
	                                    	  <div class="col-md-3" style="zoom:1.0">{{Site name}}:</div>
		                                        <div class="col-md-4" style="zoom:1.2">
													<div class="form-group label-floating flagrow">
				                                    <input type="hidden" name="sitename_original" value="<?=get_settings('sitename');?>" />
				                                    <input type="text" name="sitename" value="<?=get_settings('sitename');?>" class="form-control" />
													</div>
		                                        </div>
	                                    </div>


	                                    <div class="row">
	                                    	  <div class="col-md-3" style="zoom:1.0">{{Site email}}:</div>
		                                        <div class="col-md-4" style="zoom:1.2">
													<div class="form-group label-floating flagrow">
				                                    <input type="hidden" name="siteemail_original" value="<?=get_settings('siteemail');?>" />
				                                    <input type="text" name="siteemail" value="<?=get_settings('siteemail');?>" class="form-control" />
													</div>
		                                        </div>
	                                    </div>

	                                    <div class="row">
	                                    	  <div class="col-md-3" style="zoom:1.0">{{Site phone}}:</div>
		                                        <div class="col-md-4" style="zoom:1.2">
													<div class="form-group label-floating flagrow">
				                                    <input type="hidden" name="sitephone_original" value="<?=get_settings('sitephone');?>" />
				                                    <input type="text" name="sitephone" value="<?=get_settings('sitephone');?>" class="form-control" />
													</div>
		                                        </div>
	                                    </div>



	                                    <div class="row">
	                                    	  <div class="col-md-3" style="zoom:1.0">{{Site description}}:</div>
		                                        <div class="col-md-4" style="zoom:1.2">
													<div class="form-group label-floating flagrow">
				                                    <input type="hidden" name="sitedescription_original" value="<?=get_settings('sitedescription');?>" />
				                                    <input type="text" name="sitedescription" value="<?=get_settings('sitedescription');?>" class="form-control" />
													</div>
		                                        </div>
	                                    </div>


	                                   

	                                    <div class="row">


	                                    	  <div class="col-md-3" style="zoom:1.0">
		                                        	{{URL}}:
		                                        </div>

		                                        <div class="col-md-4" style="zoom:1.2">
													<div class="form-group label-floating flagrow">


				                                    <input type="hidden" name="default_url_original" value="<?=get_settings('default_url');?>" />
				                                    <input type="text" name="default_url" value="<?=get_settings('default_url');?>" class="form-control" />


													</div>
		                                        </div>


	                                    </div>


	                                   
	                                    <div class="row">


	                                    	  <div class="col-md-3" style="zoom:1.0">
			                                        	{{Theme}}:
		                                        </div>

		                                        <div class="col-md-4" style="zoom:1.2">
													<div class="form-group label-floating flagrow">
													


				                                    <input type="hidden" name="default_template_original" value="<?=get_settings('default_template');?>">
				                                    
				                                    <select name="default_template" class="form-control">
					                               	<?php
					                               	foreach(glob('../templates/*', GLOB_ONLYDIR) as $dir) {
													    $dirname = basename($dir);
													 ?>

					                                        <option value="<?=strtolower($dirname);?>" <?=(get_settings('default_template') == $dirname)?'selected':'';?>><?=ucwords($dirname);?></option>

					                               	<?php
					                               	}
					                               	?>
					                               	</select>
													</div>


					                               		<?php
					                               	foreach(glob('../templates/*', GLOB_ONLYDIR) as $dir) {
													    $dirname = basename($dir);


														$css_read = file_get_contents('../templates/'.strtolower($dirname).'/style.css');
														preg_match('/Template name: (.*) /', $css_read, $matches, PREG_OFFSET_CAPTURE, 0);
														preg_match('/Template category: (.*) /', $css_read, $matches2, PREG_OFFSET_CAPTURE, 0);
														$template_name = $matches[1][0];
														$template_category = $matches2[1][0];


														// // if (preg_match("/Template name: (.*) /", $css_read, $tmp)[1]) {
														// //     $width = $template_name[1];
														// // } else {
														// //     $width = "not defined";
														// // }

														// echo $width;

													 ?>
													 <div class="col-md-12">
													 	<div class="<?=(get_settings('default_template') == $dirname)?'theme-selected':'';?> theme-list" swal-title="{{Are you sure?}}" swal-text="{{Saved content will be lost. Whole content will be replaced to demo content!}}" swal-ok="{{OK}}" swal-cancel="{{Cancel}}" data-id="<?=strtolower($dirname);?>" style="background:url('../templates/<?=strtolower($dirname);?>/screenshot.jpg') no-repeat !important; background-size: cover !important;">
													 		<div class="theme-name"><?=$template_name;?></div>
													 		<div class="theme-category"><?=$template_category;?></div>
														 </div>
													 </div>


					                               	<?php
					                               	}
					                               	?>


													 <div class="col-md-12" style="margin: 10px 0 0 -20px">
													 <a class="btn btn-xs" href="mailto:theme@laylacms.com?subject=LAYLA theme INQUIRY ">Buy & Request custom theme</a><br/><br/>
													 </div>


					                              

		                                        </div>


	                                    </div>


	                                    <div class="row">

	                                    	  <div class="col-md-3" style="zoom:1.0">
			                                        	{{Admin Theme}}:
		                                        </div>

		                                        <div class="col-md-4" style="zoom:1.2">
													<div class="form-group label-floating flagrow">


				                                    <input type="hidden" name="default_admin_template_original" value="<?=get_settings('default_admin_template');?>">
				                                     <select name="default_admin_template" class="form-control">
					                               		<option value="day" <?=(get_settings('default_admin_template') == 'day')?'selected':'';?>>{{Day}}</option>
					                               		<!-- <option value="night" <?=(get_settings('default_admin_template') == 'night')?'selected':'';?>>{{Night}}</option> -->
					                               	 </select>


													</div>
		                                        </div>

										</div>


	                                   
	                                    <div class="row">


	                                    	  <div class="col-md-3" style="zoom:1.0">
		                                        	{{Default language}}:
		                                        </div>

		                                        <div class="col-md-4" style="zoom:1.2">
													<div class="form-group label-floating flagrow">


	                                    <input type="hidden" name="default_language_original" value="<?=$current_language;?>" style=""> 
	                                     <select name="default_language" class="form-control">
	                               	<?php
	                               	foreach ($langs as $key => $value){ ?>

	                                        <option value="<?=strtolower($key);?>" <?=($current_language == strtolower($key))?'selected':'';?>><?=strtoupper(str_pad($key,0,""));?> | <?=strtolower($value);?></option>

	                               	<?php
	                               	}
	                               	?>
	                               	</select>


													</div>
		                                        </div>


	                                    </div>




	                                   
	                                    <div class="row">


	                                    	  <div class="col-md-3" style="zoom:1.0">
		                                        	{{Language in Administration}}:
		                                        </div>

		                                        <div class="col-md-4" style="zoom:1.2">
													<div class="form-group label-floating flagrow">


	                                    <input type="hidden" name="default_admin_language_original" value="<?=$current_admin_language;?>">
	                                     <select name="default_admin_language" class="form-control">
	                               	<?php
	                               	foreach ($langs as $key => $value){ ?>

	                                        <option value="<?=strtolower($key);?>" <?=($current_admin_language == strtolower($key))?'selected':'';?>><?=strtoupper(str_pad($key,0,""));?> | <?=strtolower($value);?></option>

	                               	<?php
	                               	}
	                               	?>
	                               	</select>


													</div>
		                                        </div>


	                                    </div>




	                                    <input type="hidden" name="default_homepage_original" value="default_homepage;<?=get_all_homepages('default_homepage');?>;">

	                                	<?php

		                               	$hps = $languages;

		                               	foreach ($hps as $value_hps){

		                               	$qq++; $value_hps = explode(':',$value_hps);
		                               
		                               	if($current_language == $value_hps[0]){
		                               	$language = 'default';
										}else{
		                               	$language = $value_hps[0];
		                               	$language_label = $langs[strtoupper($value_hps[0])];
										}

										$inputvalue = explode(':',$homepage_languages[$qq-1])[1];
										


		                               	?>
	                                    <div class="row">

		                                        <div class="col-md-3" style="zoom:1.0">
		                                        	<?php if($language_label){echo $language_label;}else{echo '{{Main Homepage}}';}?>
		                                        </div>
		                                        <div class="col-md-4" style="zoom:1.2">
													<div class="form-group label-floating flagrow">
<input type="hidden" name="hp[<?=$qq;?>][language]" value="<?=$language;?>" />
														 <input type="text" name="hp[<?=$qq;?>][value]" value="<?=$inputvalue;?>" class="form-control" />
													</div>
		                                        </div>
                                        </div>

		                               	<?php
		                               	unset($inputvalue);
		                               	}	


		                               	?>

		                     <?php
                            	//ADD PLUGIN POST AREAS
        //                     	echo '<pre>';
								// print_r($addtosettings);
        //                     	echo '</pre>';
								if(!empty($addtosettings)){
								foreach ($addtosettings as $key => $valueXX) {
								$i++;
								$plugin_title = ($settings[$key]['plugin-title'] != '')?$settings[$key]['plugin-title']:$key;
								echo '<div class="row">
								<div class="col-md-12" style="zoom:1.0">
                                	<h2>'.$plugin_title.'</h2>
                                </div></div>';
								foreach ($valueXX as $key => $value) {
									if(empty($value['title'])){continue;}
								?>
                                <div class="row">

								<div class="col-md-3" style="zoom:1.0">
									<?=$value['title'];?>
                                </div>

						        <div class="col-md-4">
									<div class="form-group label-floating ">
										<?php

										switch ($value['type']) {
											case 'input-text':
											if(isset($value['prefix'])){echo $value['prefix'];}
											echo '<input type="text" class="form-control" placeholder="" value="'.$value['selected'].'" name="'.$value['name'].'"/>';
											if(isset($value['suffix'])){echo $value['suffix'];}
											break;
											case 'input-select':
											if(isset($value['prefix'])){echo $value['prefix'];}
											echo '<select name="'.$value['name'].'" class="form-control">';
											$selected_val = $value['selected'];
											foreach ($value['values'] as $key => $value) {
												if($key == $selected_val){$selected='selected';}
												echo '<option value="'.$key.'" '.$selected.'>'.$key.' # '.$value.'</option>';
												unset($selected);
											}
											echo '</select>';
											if(isset($value['suffix'])){echo $value['suffix'];}
											break;

											default:
												# code...
												break;
										}
										?>
										</div>
                                </div>

	                            </div>

									<?php

								}}
							    }
							    ?>

		                               	<input type="hidden" name="hpcount" value="<?=$qq;?>" />
	                                    <div class="row">
	                                    <button type="submit" class="btn btn-primary pull-left">{{Save}}</button>
	                                    </div>
	                            </div>
	                        </div>
	                        


	                        


	                    </div>
						

	                    </form>

	                </div>
	            </div>


