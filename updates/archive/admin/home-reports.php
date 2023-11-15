<?php
$_SESSION['campaign'] = $_GET['camp'];


if(!empty($_GET['delete'])){
	@unlink('../data/reports/daily/'.$_GET['delete'].'-clickReport.txt');
	@unlink('../data/reports/daily/'.$_GET['delete'].'-viewReport.txt');
}


$camp = array();
$camp_unique = array();
$next2 = -1;
//--- get all the directories
$dirname = '../data/reports/monthly';
$findme  = "*-viewReport.txt";
$dirs    = glob($dirname.'*', GLOB_ONLYDIR);
$files   = array();
//--- search through each folder for the file
//--- append results to $files
foreach( $dirs as $d ) {
    $f = glob( $d .'/'. $findme );
    if( count( $f ) ) {

		array_multisort(array_map('filemtime', $f), SORT_NUMERIC, SORT_DESC, $f);
		
    	foreach ($f as $key => $value) {
    		$next2++;
    		$qq++;
    		unlink($f[$next2]);
    	}

    	$series_sum = array_sum(explode(", ", $series));

    }
}



?>
				<div class="container-fluid">




								<?php
								$camp = array();
								$camp_unique = array();
								$i = 0;
								//--- get all the directories
								$dirname = '../data/reports/daily';
								$findme  = "*-viewReport.txt";
								$dirs    = glob($dirname.'*', GLOB_ONLYDIR);
								$files   = array();
								//--- search through each folder for the file
								//--- append results to $files
								foreach( $dirs as $d ) {
								    $f = glob( $d .'/'. $findme );
							     // if (!is_dir($d)) {
								    if( count( $f ) ) {
								    	
		array_multisort(array_map('filemtime', $f), SORT_NUMERIC, SORT_DESC, $f);
								        $files = array_merge( $files, $f );
								    }
								// }	
								}


								if( count($files) ) {
									
								    foreach( $files as $f ) {
								    $nazev = '';
							    	$a = str_replace('../data/reports/daily/', '', $f);
							    	$a = str_replace('-viewReport.txt', '', $a);
							    	$a = str_replace('-clickReport.txt', '', $a);
							    	@$q++;
							    	@$pocet_fotografii++;

										// echo "<li><a href='?camp={$a}'>{$a}</a>x</li>";

							    		$camp[$q] = array('name' =>$a, 'key' => explode('-', $a)[0]);
							    		$camp_unique[$q] = explode('-', $a)[0];

								}
							
								} else {
								   echo "{{Nothing was found.}}";//Tell the user nothing was found.
								}

								@$camp_unique = array_unique($camp_unique);
								// @$camp_unique = array_search($camp_unique, $_SESSION['campaign']);

								$dates = array();

								foreach ($camp_unique as $key => $value) {
									// echo '<strong style="float:left; margin:10px 0 -5px 15px; ">&nbsp;&nbsp;'.$value.'</strong><br/>';

										//	echo "<li style=\"zoom:1; margin:0 0 -10px -3px;\"><a href='#'><strong>{$value}</strong></a></li>";

									foreach ($camp as $key => $value2) {
										if( strpos($value2['name'], $value) !== false  ){

											if($_SESSION['campaign'] == $value2['name']){
												$selected = 'background: #efefef;';
											}else{
												$selected = '';
											}
											if(strpos($value2['name'], $_SESSION['campaign'])  !== false){
												$i++;
										//	echo "<li style=\"zoom:0.9; margin-bottom:-10px;".$selected."\"><a href='?camp={$value2['name']}'>{$value2['name']}</a></li>";
											$dates[]=$value2['name'];
										

											}
										}
										unset($selected);
									}

								}

								$dates_js_count = count($dates);
								$dates_js = '';
								$dates_tr = '';
								$iqq = 0;

								foreach ($dates as $value2) {
									$iqq++;
												$dates_js.='"'.$value2.'"';
											// if($iqq != $dates_js_count){
												$dates_js.=', ';
												$dates_tr.='<tr id="row-'.$iqq.'"><td colspan="13"><div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></td></tr>';

											// }

								}


								?>

								<script type="text/javascript">
								var datesjs = [<?php echo $dates_js;?>];
								</script>


					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="card card-nav-tabs">
								<div class="card-header" data-background-color="green">
									<div class="nav-tabs-navigation">
										<div class="nav-tabs-wrapper">
											<span class="nav-tabs-title">Basic data</span>
											<ul class="nav nav-tabs" data-tabs="tabs">
												
											</ul>
										</div>
									</div>
								</div>

								<div class="card-content">
									<div class="tab-content">
										<div class="tab-pane active" id="profile">

										<table id="summary-report" class="table table-hover">
	                                    <thead class="text-primary">
	                                    	<tr>
	                                    	<th>{{Date}}</th>
	                                    	<th>{{Impressions}}</th>
	                                    	<th>{{Impressions}} ({{UIP}})</th>
	                                    	<th></th>
	                                    </tr></thead>
	                                    <tbody>

	                                    <?=$dates_tr;?>
									
                                    	<tr class="summary">
	                                    	<th>{{Summary}}</th>
	                                    	<th>0</th>
	                                    	<th>0</th>
	                                    	<th></th>
	                                    </tr>

	                                    </tbody>
		                                </table>

										</div>
										
										
									</div>
								</div>
							</div>
						</div>

						

					</div>


				</div>


<script type="text/javascript">
	

    		var q = 0;
    		var col = 1;

			for (var i = 0; i < <?=count($dates);?>; i++) {

					 $.ajax({
					      type: "GET",
					      // contentType: "application/json; charset=utf-8",
					      url: "includes/ajax_campaign_summary.php",
					      data: { 'date': datesjs[i]},
					      beforeSend: function() { 


					      },
					      success: function (result) {
					      	q++;
					      	// alert(q);
					           var result_data = result.split("|");
					           $('#summary-report #row-'+q+'').html('<td>'+result_data[0]+'</td><td>'+result_data[1]+'</td><td>'+result_data[2]+'</td><td><a href="?camp=<?=$_SESSION['campaign'];?>&delete=<?=$_SESSION['campaign'];?>-'+result_data[0]+'" Onclick="return ConfirmDelete()"><i class="material-icons">delete_forever</i> Delete</a></td>');
					           if(result_data[1] < 100){$('#summary-report #row-'+q+'').css('opacity', '.4');}
					           

							for (var col = 1; col < 4; col++) {

					           val_default = $('.summary th:nth-child('+col+')').text(); 
					           val_1 = $('#summary-report #row-'+q+' td:nth-child('+col+')').text(); ;
					           counter = parseInt(val_1)+parseInt(val_default);

					        //    if(col == 6){
					        //    var CTR = $('.summary th:nth-child(4)').text()/$('.summary th:nth-child(2)').text()*100;
					        //    $('.summary th:nth-child('+col+')').text(CTR.toFixed(2)+'%');
						       // }else if(col == 7){
					        //    var CTRUIP = $('.summary th:nth-child(5)').text()/$('.summary th:nth-child(3)').text()*100;
					        //    $('.summary th:nth-child('+col+')').text(CTRUIP.toFixed(2)+'%');
					        //    }else{
					           if(!isNaN(counter)){$('.summary th:nth-child('+col+')').text(counter);}	
					           // }

								}


					      }
					 });

			}

			// Javascript method's body can be found in assets/js/demos.js





</script>

