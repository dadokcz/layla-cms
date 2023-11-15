<?php

	if($_POST['adduser']){
	
	$clearTextPassword = $_POST['password'];
	$password = crypt($clearTextPassword, base64_encode($clearTextPassword));

	$content="\n".$_POST['adduser'].":".$password.":".$_POST['email']."";
	file_put_contents("./.htpasswd", $content, FILE_APPEND | LOCK_EX);


	}





if(isset($_GET['delete_user'])){
	// unlink('../files/'.$_GET['delete_photo']);

	$post_type_csv = './.htpasswd';

	$row = -1;
	$pages = array();
	if (($handle = fopen("".$post_type_csv."", "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 1000000, ":")) !== FALSE) {
	        $num = count($data);
	        $row++;
	        // echo $data;
	        if($row != $_GET['delete_user']){
	        	
		     for ($c=0; $c < $num; $c++) {
		            $qq.= $data[$c].":";
		        }
	        // $qq.="\n";

	        }else{


	        }

	    }
	    // echo  $qq;
		file_put_contents("".$post_type_csv."", $qq);

	    fclose($handle);
	}



}






?>	

<div class="content">
	            <div class="container-fluid">
	                <div class="row">



<?php if(!empty($_GET['adduser'])){ ?>

	                <div class="row">
	                    <div class="col-md-12">

			<form action="#" method="post">

                <div class="col-md-4">

               <div class="card">
                    <div class="card-content">


						<form action="#" method="post">

                            <div class="row">
                                <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Uživatelské jméno</label>
										<input name="adduser" type="text" class="form-control" value="">
									<span class="material-input"></span></div>
                                </div>

                                <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">E-mail</label>
										<input name="email" type="text" class="form-control" value="">
									<span class="material-input"></span></div>
								</div>

                                <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Heslo</label>
										<input name="password" type="text" class="form-control" value="">
									<span class="material-input"></span></div>
								</div>

									  	 
                                </div>


									  	 <input type="submit" class="btn btn-default" value="Ulozit">
						</form>
									  	 
                            </div>

                        </div>
                    </div>
                </div>
                <?php } ?>



</form>

</div>
</div>




	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">

	                                <a href="?adduser=1&page=users" class="btn btn btn-info buttonright"><i class="material-icons">add_circle_outline</i>  Nový uživatel</a>

	                                <h4 class="title">{{Users}}</h4>
	                                <p class="category">{{List}}</p>
	                                <?php


	                ?>

	                
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                 
											<thead>
	                                        	<th>{{Name}}</th>
	                                        	<th>{{E-mail}}</th>
	                                        	<th>{{Actions}}</th>
	                                        </thead>

	                                    <?php

	                                    $content = file_get_contents('./.htpasswd');

	                                    $content = explode("\n", $content);
	                                    $content_count = count($content);
	                                    $rows=-1;
										foreach ($content as $item) {
											$rows++;
											$item = explode(':', $item);
											if(empty($item[0])){continue;}
										?>
											<tr style="">

	                                        	<td>
	                                        	<i class="material-icons" style="float: left; margin-right: 7px">account_box</i> <strong style="font-size: 110%;"><?=$item[0];?></strong></td>
												<td><?=$item[2];?></td>
												<td>
												<?php if($content_count > 1){ ?>
							            	    <a href="?delete_user=<?=$rows;?>&page=<?=$_GET['page'];?>" class="btn btn-xs btn-danger">{{Delete}}</a>
								            	<?php } ?>
							            	    </td>

	                                        </tr>

										<?php
										}
										?>


	                                </table>

	                            </div>
	                        </div>
	                    </div>

	                </div>
	            </div>
	        </div>
