<?php

$fname = "../data/settings.csv";



if(isset($_GET['trash_plugin'])){

    $del = $_GET['trash_plugin'];

    // if ($del != '' && $del != '..' && $del != '.') {
        $path = '../includes/plugins/';
        chmod($del, 0777);
        $is_dir = is_dir($del);
        if($is_dir){
            rmdir($del);
        }elseif (unlink($del)) {
            // $msg = $is_dir ? 'Folder <b>%s</b> deleted' : 'File <b>%s</b> deleted';
        } else {
            // $msg = $is_dir ? 'Folder <b>%s</b> not deleted' : 'File <b>%s</b> not deleted';
        }
}


if(isset($_GET['activate_plugin']) || isset($_GET['remove_plugin'])){

	$get_plugins = explode(',',get_settings('plugins'));

	if($_GET['remove_plugin']){
	$get_plugins = array_diff($get_plugins, array($_GET['remove_plugin']));
	// print_r($get_plugins);
	// die();
	}else{
	array_push($get_plugins, $_GET['activate_plugin']);
	}

	$get_plugins = array_unique($get_plugins);


	foreach ($get_plugins as $key => $value) {
		$hps_rows++;
		$plugins.= $value;
		if(count($get_plugins) > $hps_rows){
			$plugins.= ",";
		}
	}



	$row = 0;
	$pages = array();
	if (($handle = fopen("../data/settings.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
        $num = 2;
        $row++;

        // die($plugins);
        for ($c=0; $c < $num; $c++) {
        	if(strpos($data[0], 'plugins') !== FALSE){
        		if($c == 1){
            $qq.= $plugins.";";
	        }else{

            $qq.= "plugins;";
	        }
	        }else{
            $qq.= $data[$c].";";
	        }
        }
        $qq.="\n";


    }
	}
    // echo $qq.'<br>';
 //    die();

	file_put_contents("../data/settings.csv", $qq);
	$success = 'updated';
    fclose($handle);
	// }

	// header('location:index.php?page=plugins');
}


$camp = array();
$camp_unique = array();
$next2 = -1;
//--- get all the directories
$dirname = '../includes/plugins/';
$findme  = "*index.php";
$dirs    = glob($dirname.'*', GLOB_ONLYDIR);
$files   = array();



?>
    <div class="container-fluid">

<?php if($_GET['add'] == 1){?>
	<div class="row">

		<?php
		$json = file_get_contents('http://laylacms.com/updates/plugins.php?'.time());
		$fetch_json = json_decode($json);

		foreach ($fetch_json as $key => $value) {
			# code...
			$color[1] = 'red';
			$color[2] = 'blue';
			$color[3] = 'green';
			$color[4] = 'purple';
			$color[5] = 'orange';
		?>

            <div class="col-md-3" style="zoom:0.7;margin-bottom: 20px;">
             <div class="card card-nav-tabs ">

             	 <div class="card-header card-header-primary" data-background-color="<?=$color[rand(1,5)];?>" style="  font-size: 150%; font-weight: bold; box-shadow: 0 42px 42px -12px rgba(0, 0, 0, 0.92), 0 4px 25px 0px rgba(0, 0, 0, 0.22), 0 8px 10px -5px rgba(0, 0, 0, 0.9)">
                 <?=$value->plugin_name;?>  <small style="float: right; opacity: 0.5"><?=$value->plugin_version;?></small> 
                </div>
             	 <div class="card-header card-header-primary" data-background-color="purple" style="background: url('data:image/png;base64,<?=$value->screenshot;?>'); background-size: cover; height: 200px; ">
                 

                </div>



                <div class="card-header card-header-primary" data-background-color="gray" style="border-radius:0; box-shadow: none; background: #fff; "> 

                  <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper"><span style="float: left; color:#000; font-size: 120%;line-height: 300%;"><?php if($value->paid == 'true'){ echo $value->price;?>€<?php }else{ ?>{{Free}}<?php } ?></span>
                      <ul class="nav nav-tabs" data-tabs="tabs">

                        <li class="nav-item active">



                        	<?php if($value->paid == 'true'){ ?>
                          <a href="?install_plugin=<?=$value->plugin_dir;?>&version=<?=$value->plugin_version;?>&ajax=1" class="nav-link active"  data-background-color="green" ><i class="material-icons">add_circle_outline</i>  {{Buy}} </a>
                        	<?php }else{ ?>

                          <a href="?install_plugin=<?=$value->plugin_dir;?>&version=<?=$value->plugin_version;?>&ajax=1" class="nav-link active"  data-background-color="blue" ><i class="material-icons">add_circle_outline</i>  {{Install}} </a>
                        	<?php } ?>
                        </li>
                        <?php if(!empty($value->changelog)){?>
                        <li class="nav-item">
                          <a class="nav-link" href="#updates" data-toggle="tab">{{Updates}}</a>
                        </li>
		                <?php } ?>

                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content text-left" style="padding:20px; overflow: ; height: 180px;">
                  	<?php if(!empty($value->plugin_description)){?>
                    <div class="tab-pane active" id="home">
                      <p><?=$value->plugin_description;?></p>
                    </div>
	                <?php } ?>

                  	<?php if(!empty($value->changelog)){?>
					<div class="tab-pane" id="updates">
                      <p> <?=$value->changelog;?> </p>
                    </div>
	                <?php } ?>
                  </div> 
                </div>
              </div>
          </div>
	      <?php } ?>
	</div>

        <div class="row">.</div><div class="row">.</div>

<?php }else{ ?>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card card-nav-tabs ">
                	  <div class="card-header" data-background-color="purple">

	                                <a href="?add=1&page=<?=$_GET['page'];?>" class="btn btn btn-info buttonright"><i class="material-icons">add_circle_outline</i>  {{Add new}}</a> 

	                                <h4 class="title" style="text-transform: capitalize;">{{Plugins}}</h4>
	                                <p class="category">{{List}}</p>
	                            </div>

                    <div class="card-content">
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                <table id="summary-report" class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>{{Plugin}}</th>
                                            <th>{{Description}}</th>
                                            <th>{{State}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dirs as $key => $value) {

										if(!file_exists($value.'/index.php')){continue;}
										$css_read = file_get_contents($value.'/index.php');
										preg_match('/Plugin name: (.*) /', $css_read, $matches, PREG_OFFSET_CAPTURE, 0);
										preg_match('/Plugin description: (.*) /', $css_read, $matches_desc, PREG_OFFSET_CAPTURE, 0);
										preg_match('/Plugin version: (.*) /', $css_read, $version, PREG_OFFSET_CAPTURE, 0);
										preg_match('/Author: (.*) /', $css_read, $matches2, PREG_OFFSET_CAPTURE, 0);
										preg_match('/Plugin category: (.*) /', $css_read, $matches3, PREG_OFFSET_CAPTURE, 0);
										$plugin_name = $matches[1][0];
										$plugin_version = $version[1][0];
										$plugin_description = $matches_desc[1][0];
										$plugin_author = $matches2[1][0];
										$plugin_category = $matches3[1][0];
										if(!is_dir($value)){continue;}
										$basename = basename($value);
										?>
                                        <tr>
                                            <td><strong>
                                                <?=$plugin_name;?></strong>
                                                <small><?=$plugin_version;?></small>
                                            </td>
                                            <td>
                                                <?=$plugin_description;?>
                                            </td>
                                            <td>
                                                <?php
	                                    	if(array_search($basename, explode(',',get_settings('plugins'))) && strpos(get_settings('plugins'), $basename) !== false){
	                                    	?>
                                                    <a href="?page=plugins&remove_plugin=<?=$basename;?>" class="btn btn-xs btn-success">{{Active}}</a>
                                                    <?php }else{ ?>
                                                    <a href="?page=plugins&activate_plugin=<?=$basename;?>" class="btn btn-xs btn-warning">{{Disabled}}</a>
                                                    <a href="?page=plugins&trash_plugin=<?=$basename;?>" class="btn btn-xxs btn-danger confirmation" swal-title="{{Are you sure?}}" swal-text="{{Do you really want to delete}} <?=$plugin_name;?>?" swal-confirm="{{Yes, delete}}" swal-cancel="{{Cancel}}"><i class="material-icons">delete</i></a>
                                                    <?php } ?>




                                                    <?php
                                                    // if($_GET['doUpdate'] == $basename){
                                                    echo get_updates($basename, $plugin_version, 0);
                                                    // }
                                                    ?>

												   <?php /* if(strtolower($_SERVER['REMOTE_USER']) == 'layla-master' || strtolower($_SERVER['REMOTE_USER']) == 'dadok'){ ?>
                                                    <a href="?page=plugins&release_plugin=<?=$basename;?>" class="btn btn-xs btn-warning">{{Release version}}</a>

                                                    <?php
                                                    if($_GET['release_plugin'] == $basename){

                                                        archiveBackup($basename.'-'.$plugin_version.'.zip', '../includes/plugins/'.$basename.'/', '../updates/archive/');
                                                    }

	                                                }*/ ?>


	                                               



                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <!-- 
                                    	<tr class="summary">
	                                    	<th>Celkem</th>
	                                    	<th>0</th>
	                                    </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	    <?php } ?>
    </div>