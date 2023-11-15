<?php

$post_type_csv='notifications.csv';

?>

<div class="content">
<div class="container-fluid">


<?php if(isset($_GET['delete'])){

	file_put_contents("../data/".$post_type_csv."", '');

}


?>


<?php if(!empty($_GET['edit']) || !empty($_GET['addpage']) || isset($_GET['edit'])){

if($_POST['title']){


	if($_POST['action'] == 'addpage'){

	
	}else{

	// $fname = "../data/pages.csv";
	// $fhandle = fopen($fname,"r");
	// $content = fread($fhandle,filesize($fname));

	// $content = str_replace($_POST['original_content'], base64_encode($_POST['content']), $content);

	// file_put_contents("../data/pages.csv", $content);

	// // $fhandle = fopen($fname,"w");
	// // fwrite($fhandle,$content);
	// fclose($fhandle);

	$row = 0;
	$pages = array();
	if (($handle = fopen("../data/".$post_type_csv."", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
        $num = count($data);
        $row++;
        // echo $data;
        if($row != $_POST['pageid']){
	        for ($c=0; $c < $num; $c++) {
	            $qq.= $data[$c].";";
	        }
	        $qq.="\n";
        }else{
	        $qq.= "".$_POST['title'].";".$_POST['url'].";".time().";".$_POST['post_language'].";".base64_encode($_POST['content']).";\n";
        }

    }
    // echo $qq.'<br>';

	// file_put_contents("../data/".$post_type_csv."", $qq);
	$success = 'updated';

    fclose($handle);
}



	}
	
	header('location:?page='.$_GET['page'].'&post_type='.$_GET['post_type'].'&success='.$success.'');

}

	$row = 0;
	$page=array();
	if (($handle = fopen("../data/".$post_type_csv."", "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 500000, ";")) !== FALSE) {
	        $num = count($data);
	        $row++;
	        for ($c=0; $c < 7; $c++) {
										            $pages[$row]['row'] = $row;
										            $pages[$row][$c] = $data[$c];
											        $pages[$row]['sort'] = explode(':',$data[0])[1];
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
    ?>


	             





	                <div class="row">
	                    <div class="col-md-12">

			<form action="#" method="post">

               <div class="card">
                    <div class="card-content">
                            <div class="row">
                                <div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">{{Page title}}</label>
										<input name="title" type="text" class="form-control" value="<?=$page_title;?>">
									<span class="material-input"></span><span class="material-input"></span></div>
                                </div>
                                <div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">{{Page URL}}</label>
										<input name="url" type="text" class="form-control" value="<?=$page_url;?>">
									<span class="material-input"></span><span class="material-input"></span></div>
                                </div>

                            </div>
                    </div>
                </div>




<textarea name="original_content" style="display:none;"><?php echo $original_content;?></textarea>
<input name="action" type="hidden" value="<?php if(!empty($_GET['addpage'])){echo 'addpage';} ?>">
<input name="pageid" type="hidden" value="<?php if(!empty($_GET['edit'])){echo $_GET['edit'];} ?>">
<input name="post_language" type="hidden" value="<?php if(!empty($_GET['post_language'])){echo $_GET['post_language'];} ?>">


               <div class="card">
                    <div class="card-content">
                            <div class="row">
                                <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">{{Content}}</label>
										 <textarea name="content" class="textarea" id="contents"><?php echo $page_content;?></textarea><br/>

									  	 <input type="submit" class="btn btn-default" value="{{Save}}">
									<span class="material-input"></span><span class="material-input"></span></div>
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

	                                <a href="?page=home-notifications&delete=1" class="btn btn btn-info buttonright"><i class="material-icons">remove_circle</i>  {{Remove all}}</a> 

	                                <h4 class="title"><?=$title;?></h4>
	                                <p class="category">{{List}}</p>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                 
											<thead>
	                                        	<th width="180">{{Date}}</th>
	                                        	<th>{{Notification}}</th>
	                                        </thead>
											<tbody>

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
										            $notifications_date[$row]= $data[0];
										            $notifications_system[$row]= $data[5];
										            }
										        }

										    }}

									    $notifications = array_reverse($notifications);
									    $notifications_url = array_reverse($notifications_url);

									    $notifications_count = count($notificationscount);

									    foreach ($notifications as $key => $value) {
									    	$notifications_num++;


									
										        echo '<tr>';

										        echo '<td>'.date('d.m. Y H:i', $notifications_date[$notifications_num]).'</td>';
										        echo '<td style=""><a href="'.$notifications_url[$notifications_num-1].'">'.$value.'</a></td>';
										        if($notifications_system[$notifications_num-1] == 1){
											        echo '<td style=""><a><i class="material-icons">timeline</i> {{System action}}</a></td>';
										        }else{
										            echo '<td style=""><a><i class="material-icons">touch_app</i> {{User action}}</a></td>';	
										        }
										        echo '</tr>';


										    	if($notifications_num > 10){break;}
									    }

									     if($notifications_count == 0){echo '<tr class="emptypage"><td colspan="2"><center><i class="material-icons emptypage">nature_people</i> {{No posts yet.}}</center></td></tr>';}





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
