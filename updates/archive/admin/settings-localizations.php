<?php
$langs = get_countries();


if($_POST['languages_list']){

	$new_languages.=get_settings('default_language');

	foreach ($_POST['languages_list'] as $value) {
		$new_languages.=','.$value;
	}
	$new_languages.=';';

	$fname = "../data/settings.csv";
	$fhandle = fopen($fname,"r");
	$content = fread($fhandle,filesize($fname));


	if($_GET['localization-set'] == 'admin'){
		$content = str_replace(''.$_POST['default_languages'].'', 'languages_admin;'.$new_languages.'', $content);
	}else{
		$content = str_replace(''.$_POST['default_languages'].'', 'languages;'.$new_languages.'', $content);
	}


	file_put_contents($fname, $content);

	// echo $content;

	fclose($fhandle);

}

$current_language = get_settings('default_language');


if($_GET['localization-set'] == 'admin'){
$languages = explode(",", get_settings('languages_admin'));
}else{
$languages = explode(",", get_settings('languages'));	
}



?>
                   	<div class="container-fluid">
	                <div class="row">

                        <form action="" method="post">


	                    <div class="col-md-12">

	                        <div class="card card-nav-tabs">
	                            <div class="card-header" data-background-color="purple">


											<span class="nav-tabs-title">{{Add or remove languages}}</span>

										


	                            </div>
	                            <div class="card-content">
	                                   
	                                    <div class="row">
                                    	<?php
                                    	if($_GET['localization-set'] == 'admin'){
                                		?>
	                                    <input type="hidden" name="default_languages" value="languages_admin;<?=get_settings('languages_admin');?>;">
		                               	<?php }else{?>
	                                    <input type="hidden" name="default_languages" value="languages;<?=get_settings('languages');?>;">
										<?php }?>


	                               	<?php


	                               	if($_GET['more'] != 1){


	                               	$langs = get_countries();

									if($_GET['localization-set'] == 'admin'){
	                               	$langs = explode(",", get_settings('languages_admin'));
	                                }else{
	                                $langs = explode(",", get_settings('languages'));	
	                                }
	                               	foreach ($langs as $key => $value){ $i++;?>

	                                        <div class="col-md-3" style="zoom:1.2">
	                                        	
												<div class="flagrow"><img src="../includes/images/flags/<?=strtolower($value);?>.png" class="page-flag" /><label class="label flaglabel" for="flag-<?=strtolower($value);?>" <?=($current_language == strtolower($value) || is_numeric(array_search(strtolower($value), $languages)))?'style="font-weight: bold !important;"':'';?>> 
													<input
													<?=($current_language == strtolower($value))?'disabled':'';?>

													<?=(is_numeric(array_search(strtolower($value), $languages)))?'checked':'';?>

													 type="checkbox" name="languages_list[<?=$i;?>]" id="flag-<?=strtolower($key);?>" value="<?=strtolower($value);?>">  <?=strtoupper($value);?></label>
												</div>
	                                        </div>

	                               	<?php	
	                               	}

	                               }else{

	                               	$langs = get_countries();
	                               	foreach ($langs as $key => $value){ $i++;?>

	                                        <div class="col-md-6" style="zoom:1.2">
												<div class="form-group ">
													<input
													<?=($current_language == strtolower($key))?'disabled':'';?>

													<?=(is_numeric(array_search(strtolower($key), $languages)))?'checked':'';?>

													 type="checkbox" name="languages_list[<?=$i;?>]" id="flag-<?=strtolower($key);?>" value="<?=strtolower($key);?>"> <label class="label flaglabel" for="flag-<?=strtolower($key);?>" <?=($current_language == strtolower($key) || is_numeric(array_search(strtolower($key), $languages)))?'style="font-weight: bold !important;"':'';?>> <img src="../includes/images/flags/<?=strtolower($key);?>.png" class="page-flag" /> <?=$value;?></label>
												</div>
	                                        </div>

	                               	<?php
	                               }	
	                               	}
	                               	?>
	                                    </div>

	                                    <div class="row"><br/></div>
	                                    <div class="row">


	                                    <a href="?page=settings-localizations&more=1&localization-set=<?=$_GET['localization-set'];?>" class="btn btn-secondary pull-left">{{Add language}} &rsaquo;&rsaquo;</a>
	                                    <button type="submit" class="btn btn-primary pull-left">{{Confirm changes}}</button>
	                                    </div>

	                            </div>
	                        </div>
	                        


	                    </div>

	                    </form>


                        <form action="" method="post">
                        <?php

                       	$langs = explode(",", get_settings('languages'));

                        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
                        	// echo '<pre>'; print_r($_POST); echo '</pre>'; 

                        foreach($_POST['localization'] as $key => $value) {
                    		if($_GET['localization-set'] == 'admin'){
                    		$fname = "./languages/".$key.".po";
	                    	}elseif($_GET['localization-set'] == 'plugins' && isset($_GET['plugin-name'])){
	                    	$fname = "../includes/plugins/".$_GET['plugin-name']."/languages/".$key.".po";
	                    	}else{
	                    	$fname = "../templates/".get_settings('default_template')."/languages/".$key.".po";		
	                    	}
							$fhandle = fopen($fname,"w");
							ftruncate($fhandle, 0);
							$content = fread($fhandle,filesize($fname));

							// $strings_put.='msgid ""' . PHP_EOL;
							// $strings_put.='msgstr ""' . PHP_EOL;
							$strings_put.='"Content-Type: text/plain; charset=UTF-8\n"' . PHP_EOL;
							$strings_put.='"Content-Transfer-Encoding: 8bit\n"' . PHP_EOL;
							// $strings_put.="\n";


							// $strings_put.='"Content-Type: text/plain; charset=UTF-8\n"';
							// $strings_put.="\n";

                        	foreach ($_POST['localization'][$key] as $key => $value) {
	                        	$strings_put.='msgid "'.$key.'"
msgstr "'.$value.'"
';	                
					        }


							file_put_contents($fname, $strings_put);

							fclose($fhandle);
							unset($strings_put);

                        }

                        }


                        ?>
	                    <div class="col-md-12"><div class="row">x</div></div>		

	                    <div class="col-md-12">

	                        <div class="card card-nav-tabs">
	                            <div class="card-header" data-background-color="purple">
	                                
	                                <div class="nav-tabs-navigation">
										<div class="nav-tabs-wrapper">
											<span class="nav-tabs-title">{{Language strings}}</span>

											<ul class="nav nav-tabs" data-tabs="tabs">
												<li class="<?php if(!isset($_GET['localization-set'])){echo 'active';}?>">
													<a href="?page=settings-localizations">
														<i class="material-icons">fingerprint</i>
														{{Theme}}
													<div class="ripple-container"></div></a>
												</li>
												<li class="<?php if($_GET['localization-set'] == 'admin'){echo 'active';}?>">
													<a href="?page=settings-localizations&localization-set=admin">
														<i class="material-icons">lock_outline</i>
														{{Administration}}
													<div class="ripple-container"></div></a>
												</li>		
												<li class="<?php if($_GET['localization-set'] == 'plugins'){echo 'active';}?>">

													<a href="?page=settings-localizations&localization-set=plugins">
														<i class="material-icons">settings_input_svideo</i>
														{{Plugins}}
													<div class="ripple-container"></div></a>
													<ul>
														<?php

														$camp = array();
														$camp_unique = array();
														$next2 = -1;
														//--- get all the directories
														$dirname = '../includes/plugins/';
														$findme  = "*index.php";
														$dirs    = glob($dirname.'*', GLOB_ONLYDIR);
														$files   = array();
														foreach ($dirs as $key => $value) {
														$basename = basename($value)
														?>


															<li style="z-index: 99999 !important;"><a href="?page=settings-localizations&localization-set=plugins&plugin-name=<?=$basename;?>"><?=$basename;?></a></li>

														<?php } ?>
													</ul>
												</li>
											</ul>


										</div>
									</div>


	                            </div>
	                            <div class="card-content">
	                                   
	                                    <div class="row">
	                                    <input type="hidden" name="default_languages" value="languages;<?=get_settings('languages');?>;">

	                               	<?php

		                    		if($_GET['localization-set'] == 'admin'){
		                    		$files = glob('./{,.}*.php', GLOB_BRACE);
									}elseif($_GET['localization-set'] == 'plugins' && isset($_GET['plugin-name'])){
			                    	$files = glob('../includes/plugins/'.$_GET['plugin-name'].'/{,.}*.php', GLOB_BRACE);
			                    	// $files = glob('../includes/plugins/layla-shop/{,.}*.php', GLOB_BRACE);
									}else{
			                    	$files = glob('../templates/'.get_settings('default_template').'/{,.}*.php', GLOB_BRACE);
			                    	// $files = glob('../includes/plugins/layla-shop/{,.}*.php', GLOB_BRACE);
									}


									foreach ($files as $key => $value) {
										// if (strpos($value, 'functions.php') === false) {
										$data.= file_get_contents($value);
										// }
									}

									preg_match_all("/\{\{(.*?)\}\}/", $data, $matches);
									$strings = $matches[1];
									$strings = array_unique($matches[1]);
									// print_r($strings);

	                               	// $langs = $strings;
	                               	foreach ($strings as $key => $string){ $i++;?>

	                                        <div class="col-md-4" style="zoom:1.2">
												<div class="form-group ">
													 <input type="text" value="<?=$string;?>" style="width: 90%;" disabled />
												</div>
	                                        </div>

	                                        <div class="col-md-8" style="zoom:1.2">
												<div class="form-group ">
													<?php
													foreach ($langs as $key => $value){ $i++;


						                    		if($_GET['localization-set'] == 'admin'){
						                    		
													?>

													  <img src="../includes/images/flags/<?=strtolower($value);?>.png" class="page-flag" /> <input type="text" name="localization[<?=strtolower($value);?>][<?=$string;?>]" value="<?=get_admin_localization_string($string, get_settings('default_template'), strtolower($value))?>" style="width: 90%;"><br/><br/>


					                               	<?php
					                               	}elseif($_GET['localization-set'] == 'plugins'){
				                               		?>
							                    	
													  <img src="../includes/images/flags/<?=strtolower($value);?>.png" class="page-flag" /> <input type="text" name="localization[<?=strtolower($value);?>][<?=$string;?>]" value="<?=get_plugin_localization_string($string, get_settings('default_template'), strtolower($value))?>" style="width: 90%;"><br/><br/>

							                    	<?php
													}else{
				                               		?>
							                    	
													  <img src="../includes/images/flags/<?=strtolower($value);?>.png" class="page-flag" /> <input type="text" name="localization[<?=strtolower($value);?>][<?=$string;?>]" value="<?=get_theme_localization_string($string, get_settings('default_template'), strtolower($value))?>" style="width: 90%;"><br/><br/>

							                    	<?php
													}

					                               }
					                               ?>
												</div>
	                                        </div>

	                               	<?php	
	                               	}

	                               	?>
	                                    </div>


	                                    <div class="row">



	                                    <button type="submit" class="btn btn-primary pull-left">{{Confirm changes}}</button>
	                                    </div>

	                            </div>
	                        </div>
	                        


	                    </div>
	                </form>
						


	                </div>
	            </div>


