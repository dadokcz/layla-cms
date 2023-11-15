<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
            	<div class="card-header" data-background-color="blue">

                                    <?php if(strtolower($_SERVER['REMOTE_USER']) == 'layla-master'){ ?>
                                    <a href="?page=updates&do_version=1" class="btn btn btn-warning buttonright"><i class="material-icons">update</i>  {{Release version}}</a> 
                                    <?php } ?>

                                    <a href="?page=updates&check_updates=1" class="btn btn btn-info buttonright"><i class="material-icons">update</i>  {{Check updates}}</a> 
                                    

	                                <h4 class="title">{{Updates}}</h4>
									<p class="category">{{Keep your Layla CMS updated}}</p>
	                            </div>

                <div class="card-content" style="">

                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">

<?php
// ini_set('max_execution_time',60);
get_updates('layla-cms', CURRENT_VERSION, 0);

if(isset($_GET['do_version'])){
    archiveBackup('layla-cms-'.CURRENT_VERSION.'.zip', '../', '../updates/archive/');
}



// $updates = file_get_contents('https://www.laylacms.com/updates/changelog.txt');


//  function convertHashtoLink($string)  
//  {  
//       $string = preg_replace("/#+[^\n]+[^\n]/", '<strong style="font-size:150%;color:black;">$0</strong>', $string);  
//       $string = str_replace('[', '<em>', $string);  
//       $string = str_replace(']', '</em>', $string);   
       

//       return $string;
//  }

//  $updates = convertHashtoLink($updates);  


// $updates = str_replace("\n", "<br/>", $updates);


// $updates = str_replace('#', '<span class="cb-title" data-icon=";" style="font-size:80%;;"></span>', $updates); 


// echo $updates;



?>


                        <!-- Include our script files -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>