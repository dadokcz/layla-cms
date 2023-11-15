<?php

			//PAGES COUNT
			$row = 0;
			$pages = array();
			if (($handle = fopen("../data/pages.csv", "r")) !== FALSE) {
			    while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
			        $num = count($data);
			        $row++;

			        for ($c=0; $c < 4; $c++) {
			        	if(empty($data[3])){
			        		
			            $pages[$row]['row'] = $row;
			            $pages[$row][$c] = $data[$c];
				        $pages[$row]['sort'] = explode(':',$data[0])[1];

					    }
			        }

			    }
			    fclose($handle);
			}

            usort($pages,"cmp");


			$pages_count = count($pages);


			//POSTS COUNT
			$row = 0;
			$posts = array();
			if (($handle = fopen("../data/posts.csv", "r")) !== FALSE) {
			    while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
			        $num = count($data);
			        $row++;

			        for ($c=0; $c < 4; $c++) {
			        	if(empty($data[3])){
			        		
			            $posts[$row]['row'] = $row;
			            $posts[$row][$c] = $data[$c];
				        $posts[$row]['sort'] = explode(':',$data[0])[1];

					    }
			        }

			    }
			    fclose($handle);
			}

            usort($posts,"cmp");


			$posts_count = count($posts);








			// POSLDNICH 5 VIEWS

			// ZJISTIME POSLEDNI AKTUALNI FILE

			$camp = array();
			$camp_unique = array();
			$next2 = -1;
			//--- get all the directories
			$dirname = '../data/reports/daily';
			$findme  = "*-viewReport.txt";
			$dirs    = glob($dirname.'*', GLOB_ONLYDIR);
			$files   = array();
			//--- search through each folder for the file
			//--- append results to $files
			foreach( $dirs as $d ) {
			    $f = glob( $d .'/'. $findme );
			    if( count( $f ) ) {
					array_multisort(array_map('filemtime', $dirs), SORT_NUMERIC, SORT_ASC, $dirs);
			    }
			}
			
			$f=array_reverse($f);

			// KONEC ZJISTIME POSLEDNI AKTUALNI FILE


			$csvtmp = array();
			$csvFinal = array();

			@$csvfile = file_get_contents($f[0]);
			$csv = str_getcsv($csvfile,"\n"); //make an array element for every record (new line)

			//Loop through the result 
			foreach ($csv as $key => $item) 
			{
				@$i++;
			    array_push($csvtmp, str_getcsv($item,";")); //push each record to the csv temp array

			    //here's the messy part. This set the key of the csvFinal array to the first field in the current record and for the value it gives it the array we got from the previous str_getcsv.
			    @$csvFinal[$csvtmp[$key][1]] = $csvtmp[$key]; 
			    //Here we just unset the id row in the final array
			    unset($csvFinal[$csvtmp[$key][0]][0]);

			    @$csvFinal_uip[$csvtmp[$key][2]] = $csvtmp[$key]; 
			    //Here we just unset the id row in the final array
			    unset($csvFinal_uip[$csvtmp[$key][0]][0]);

			    @$csvFinal_dates[$csvtmp[$key][1]] = $csvtmp[$key]; 
			    //Here we just unset the id row in the final array
			    unset($csvFinal_dates[$csvtmp[$key][0]][0]);

			    @$csvFinal_dates_unique[$csvtmp[$key][0]] = $csvtmp[$key]; 
			    //Here we just unset the id row in the final array
			    unset($csvFinal_dates_unique[$csvtmp[$key][0]][0]);


			}


// print_r($csvFinal_uip);





			// POSLDDNICH 5 SUBSCRIBERS

			$row = 0;
			$page=array();
			if (($handle = fopen("../data/newsletter-subscribers.csv", "r")) !== FALSE) {
			    while (($data = fgetcsv($handle, 500000, ";")) !== FALSE) {
			        $num = count($data);
			        $row++;
			        for ($c=0; $c < 7; $c++) {
												            $subscribers[$row]['row'] = $row;
												            $subscribers[$row][$c] = $data[$c];
													        $subscribers[$row]['sort'] = explode(':',$data[0])[1];
			        }
			    }
			    fclose($handle);
			}



			// POCET NAVSTEV NON-UIP


			$csvtmp = array();
			$csvFinal = array();


			$camp = array();
			$camp_unique = array();
			$next2 = -1;
			$iqq = -1;
			//--- get all the directories
			$dirname = '../data/reports/monthly';
			$findme  = "*-viewReport.txt";
			$dirs    = glob($dirname.'*', GLOB_ONLYDIR);
			$files   = array();
			//--- search through each folder for the file
			//--- append results to $files
			foreach( $dirs as $d ) {
			    $f = glob( $d .'/'. $findme );
		     // if (!is_dir($d)) {
		     	
			    // SERADIT DLE DATUMU 
				array_multisort(array_map('filemtime', $f), SORT_NUMERIC, SORT_ASC, $f);
			    if( count( $f ) ) {
			    

			    	foreach ($f as $key => $value) {
			    		$next2++;
			    		$qq++;

				        $files = array_merge( $files, $f );
						$csv = file_get_contents($f[$next2]);
						$csv = str_getcsv($csv, "\n");

						foreach ($csv as $key => $item) 
						{
							@$iqq++;
						    array_push($csvtmp, str_getcsv($item,";")); //push each record to the csv temp array

						    foreach ($csvtmp[$iqq] as $key => $value) {
						    	if($key == 0){$values=$value+$values;}
						    	if($key == 1){$values_unique=$value+$values_unique;}
						    }
							

						
						}
							$series.= $values;
							$series_unique.= $values_unique;
							$label = $f[$next2];
					    	$label = str_replace('../data/reports/monthly/web-', '', $label);
					    	$label = str_replace('-viewReport.txt', '', $label);
					    	$label = str_replace('-clickReport.txt', '', $label);

							$label = get_monthname(explode("-", $label)[1]);

							$labels.='"'.$label.'"';

							if(count($f) != $next2+1){
								$series_unique.=', ';
								$series.=', ';
								$labels.=', ';
							}

				    unset($values_unique);
				    unset($values);
				    unset($value);

			    	}

			    	$series_sum = max(explode(", ", $series));
			    	$series_unique_sum = max(explode(", ", $series_unique));

			    }
			// }	
			}



			?>


				<div class="container-fluid home">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="orange">
									<i class="material-icons">view_column</i>
								</div>
								<div class="card-content">
									<p class="category">{{Pages}}</p>
									<h3 class="title"><?=$pages_count;?><small>x</small></h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">date_range</i> {{Reports}}
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
									<i class="material-icons">view_headline</i>
								</div>
								<div class="card-content">
									<p class="category">{{Posts}}</p>
									<h3 class="title"><?=$posts_count;?><small>x</small></h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">date_range</i>  {{Reports}}
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="red">
									<i class="material-icons">trending_up</i>
								</div>
								<div class="card-content">
									<p class="category">{{Number of Visits}}</p>
									<h3 class="title"><?=$series_sum;?></h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">date_range</i>  {{Reports}}
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="blue">
									<i class="material-icons">trending_up</i>
								</div>
								<div class="card-content">
									<p class="category">{{Number of Visits}} (uip)</p>
									<h3 class="title"><?=$series_unique_sum;?></h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">date_range</i>  {{Reports}}
									</div>
								</div>
							</div>
						</div>
					</div>

					<br/>


					<div class="row">
						<div class="col-md-4">
							<div class="card">
								<div class="card-header card-chart" data-background-color="green">
									<div class="ct-chart" id="dailySalesChart"></div>
								</div>
								<div class="card-content">
									<h4 class="title">{{Traffic Chart}}</h4>
									<p class="category"><!-- <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55%  </span> --> {{Report of Visits}}</p>
								</div>
								<div class="card-footer">
									<a href="?page=home-reports&camp=web" class=" pull-right text-success">{{Complete report}} <i class="fa fa-long-arrow-right"></i></a>
									<div class="stats">
										<i class="material-icons">access_time</i> {{updated now}}
									</div>
								</div>
							</div>
						</div>


						<div class="col-md-4">
							<div class="card">
								<div class="card-header card-chart" data-background-color="red">
									<div class="ct-chart" id="completedTasksChart"></div>
								</div>
								<div class="card-content">
									<h4 class="title">{{Traffic Chart}} (uip)</h4>
									<p class="category">{{Report of Visits}}</p>
								</div>
								<div class="card-footer">
									<a href="?page=home-reports&camp=web" class=" pull-right text-success">{{Complete report}} <i class="fa fa-long-arrow-right"></i></a>
									<div class="stats">
										<i class="material-icons">access_time</i> {{updated now}}
									</div>
								</div>
							</div>
						</div>



						<div class="col-md-4 last">
							<div class="card">
								<div class="card-header card-chart" data-background-color="red">
									<div class="ct-chart" id="completedTasksChart"></div>
								</div>
								<div class="card-content">
									<h4 class="title">{{Traffic Chart}} (uip)</h4>
									<p class="category">{{Report of Visits}}</p>
								</div>
								<div class="card-footer">
									<a href="?page=home-reports&camp=web" class=" pull-right text-success">{{Complete report}} <i class="fa fa-long-arrow-right"></i></a>
									<div class="stats">
										<i class="material-icons">access_time</i> {{updated now}}
									</div>
								</div>
							</div>
						</div>
					</div>

					<br/>

					<div class="row">
						<div class="col-lg-6 col-md-12">
							<div class="card card-nav-tabs">
								<div class="card-header" data-background-color="purple">
									<div class="nav-tabs-navigation">
										<div class="nav-tabs-wrapper">
											<span class="nav-tabs-title">{{Last 5 Visits}}</span>
											<ul class="nav nav-tabs" data-tabs="tabs">
												<li class="active">
													<a href="#profile" data-toggle="tab">
														<i class="material-icons">remove_red_eye</i>
														UIP
													<div class="ripple-container"></div></a>
												</li>
												<!-- <li class="">
													<a href="#messages" data-toggle="tab">
														<i class="material-icons">panorama_fish_eye</i>
														{{All}}
													<div class="ripple-container"></div></a>
												</li> -->
											</ul>
										</div>
									</div>
								</div>

								<div class="card-content">
									<div class="tab-content">
										<div class="tab-pane active" id="profile">

									 <table class="table table-hover">
	                                    <thead class="text-primary">
	                                    	<tr>
	                                    	<th>{{Date}}</th>
	                                    	<th>{{IP}}</th>
											<th>{{City}} / {{Country}}</th>
	                                    </tr></thead>
	                                    <tbody>

	                                    <?php

										$csvFinal_uip = array_reverse($csvFinal_uip, true);
										foreach ($csvFinal_uip as $key => $value) {

											@$qqq++;
											if($qqq > 5){break;}

											?>  <tr>
	                                        	<td><?=date('d/m/Y H:i', strtotime($value[1]));?></td>
	                                        	<td><?=$value[2];?></td>
	                                        	<td><?=(file_exists('../includes/images/flags/'.strtolower($value[4]).'.png'))?'<img src="../includes/images/flags/'.strtolower($value[4]).'.png" title="'.$value[4].'" style="width:15px;height:auto;"> ':'';?><?=$value[3];?> </td>
	                                        </tr>

										<?php
										}
										?>

	                                    </tbody>
	                                </table>

										</div>
										<div class="tab-pane" id="messages">
										
										<table class="table table-hover">
	                                    <thead class="text-primary">
	                                    	<tr>
	                                    	<th>{{Date}}</th>
	                                    	<th>{{IP}}</th>
											<th>{{Country}} / {{City}}</th>
	                                    </tr></thead>
	                                    <tbody>

	                                    <?php

										$csvFinal = array_reverse($csvFinal, true);
										foreach ($csvFinal as $key => $value) {

											@$qq++;
											if($qq > 5){break;}

											?>  <tr>
	                                        	<td><?=date('d/m/Y H:i', strtotime($value[1]));?></td>
	                                        	<td><?=$value[2];?></td>
	                                        	<td><?=(file_exists('../includes/images/flags/'.strtolower($value[4]).'.png'))?'<img src="../includes/images/flags/'.strtolower($value[4]).'.png" title="'.$value[4].'" style="width:15px;height:auto;"> ':'';?><?=$value[3];?> </td>
	                                        </tr>

										<?php
										}
										?>

	                                    </tbody>
	                                </table>


										</div>
										
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6 col-md-12">
							<div class="card card-nav-tabs">
								<div class="card-header" data-background-color="orange">
									<div class="nav-tabs-navigation">
										<div class="nav-tabs-wrapper">
											<span class="nav-tabs-title">{{Last 5 Subscribers}}</span>
											<ul class="nav nav-tabs" data-tabs="tabs2">
												
											</ul>
										</div>
									</div>
								</div>

								<div class="card-content">
									<div class="tab-content">
										<div class="tab-pane active" id="profile">
											
										<table class="table table-hover">
	                                    <thead class="text-warning">
	                                    	<tr>
	                                    	<th>{{Date}}</th>
	                                    	<th>{{IP}}</th>
	                                    	<th>{{E-mail}}</th>
											<th>{{Country}} / {{City}}</th>
	                                    </tr></thead>
	                                    <tbody>

	                                    <?php

										$subscribers = array_reverse($subscribers, true);
										foreach ($subscribers as $key => $value) {

											@$qqq1++;
											if($qqq1 > 5){break;}
											$details = base64_decode($value[4]);
											$details = explode(',',$details);

											?>
											<tr>
	                                        	<td><?=date('d/m/Y H:i', $value[2]);?></td>
	                                        	<td><?=explode(',',base64_decode($value[4]))[1];?></td>
	                                        	<td class="text-primary"><?=$value[0];?></td>
	                                        	<td><?=(file_exists('../includes/images/flags/'.strtolower($details[4]).'.png'))?'<img src="../includes/images/flags/'.strtolower($details[4]).'.png" title="'.$details[4].'" style="width:15px;height:auto;"> ':'';?><?=$details[2];?> </td>
	                                        </tr>

										<?php
										}
										?>

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


		type = ['','info','success','warning','danger'];


		demo = {
		    initPickColor: function(){
		        $('.pick-class-label').click(function(){
		            var new_class = $(this).attr('new-class');
		            var old_class = $('#display-buttons').attr('data-class');
		            var display_div = $('#display-buttons');
		            if(display_div.length) {
		            var display_buttons = display_div.find('.btn');
		            display_buttons.removeClass(old_class);
		            display_buttons.addClass(new_class);
		            display_div.attr('data-class', new_class);
		            }
		        });
		    },

		    initFormExtendedDatetimepickers: function(){
		        $('.datetimepicker').datetimepicker({
		            icons: {
		                time: "fa fa-clock-o",
		                date: "fa fa-calendar",
		                up: "fa fa-chevron-up",
		                down: "fa fa-chevron-down",
		                previous: 'fa fa-chevron-left',
		                next: 'fa fa-chevron-right',
		                today: 'fa fa-screenshot',
		                clear: 'fa fa-trash',
		                close: 'fa fa-remove'
		            }
		         });
		    },


		    initDocumentationCharts: function(){
		        /* ----------==========     Daily Sales Chart initialization For Documentation    ==========---------- */

		        dataDailySalesChart = {
		           
			     labels: [<?=$labels;?>],
		          series: [
		            [<?=$series;?>]

		          ]
		        };

		        optionsDailySalesChart = {
		            lineSmooth: Chartist.Interpolation.cardinal({
		                tension: 0
		            }),
		            low: 0,
		            high: 10, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
		            chartPadding: { top: 0, right: 0, bottom: 0, left: 20},
		        }

		        var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

		        md.startAnimationForLineChart(dailySalesChart);
		    },

		    initDashboardPageCharts: function(){

		        /* ----------==========     Daily Sales Chart initialization    ==========---------- */

		        dataDailySalesChart = {

			     labels: [<?=$labels;?>],
		          series: [
		            [<?=$series;?>]

		          ]
		        };

		        optionsDailySalesChart = {
		            lineSmooth: Chartist.Interpolation.cardinal({
		                tension: 0
		            }),
		            low: 0,
		            high: <?=isset($series_sum)?''.$series_sum+($series_sum/2):0;?>, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
		            chartPadding: { top: 0, right: 0, bottom: -10, left: 20},
		        }

		        var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

		        md.startAnimationForLineChart(dailySalesChart);



		        /* ----------==========     Completed Tasks Chart initialization    ==========---------- */

		        dataCompletedTasksChart = {
		            

		        	
			     labels: [<?=$labels;?>],
		          series: [
		            [<?=$series_unique;?>]

		          ]

		        };

		        optionsCompletedTasksChart = {
		            lineSmooth: Chartist.Interpolation.cardinal({
		                tension: 0
		            }),

		            low: 0,
		            high: <?=isset($series_unique_sum)?''.$series_unique_sum+($series_unique_sum/2):0;?>, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
		            chartPadding: { top: 0, right: 0, bottom: -10, left: 20}
		        }

		        var completedTasksChart = new Chartist.Line('#completedTasksChart', dataCompletedTasksChart, optionsCompletedTasksChart);

		        // start animation for the Completed Tasks Chart - Line Chart
		        md.startAnimationForLineChart(completedTasksChart);


		    },

		    // initGoogleMaps: function(){
		    //     var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
		    //     var mapOptions = {
		    //       zoom: 13,
		    //       center: myLatlng,
		    //       scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
		    //       styles: [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]

		    //     }
		    //     var map = new google.maps.Map(document.getElementById("map"), mapOptions);

		    //     var marker = new google.maps.Marker({
		    //         position: myLatlng,
		    //         title:"Hello World!"
		    //     });

		    //     // To add the marker to the map, call setMap();
		    //     marker.setMap(map);
		    // },
			showNotification: function(from, align){
		    	color = Math.floor((Math.random() * 4) + 1);

		    	$.notify({
		        	icon: "notifications",
		        	message: "Welcome to <b>Material Dashboard</b> - a beautiful freebie for every web developer."

		        },{
		            type: type[color],
		            timer: 4000,
		            placement: {
		                from: from,
		                align: align
		            }
		        });
			}



		}
    	$(document).ready(function(){


        	demo.initDashboardPageCharts();

    	});
	</script>

