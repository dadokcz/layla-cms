<?php




			//SCRIPT GRAPH OF VISTS - ALL

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
				// array_multisort(array_map('filemtime', $f), SORT_NUMERIC, SORT_DESC, $f);
				
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

						    //here's the messy part. This set the key of the csvFinal array to the first field in the current record and for the value it gives it the array we got from the previous str_getcsv.
						    
							// $values = array_sum($csvtmp[$iqq]);
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




						// $values = array_sum($csv);

						// $series.=$values;

						// $label = $f[$next2];
				  //   	$label = str_replace('../data/reports/monthly/web-', '', $label);
				  //   	$label = str_replace('-viewReport.txt', '', $label);
				  //   	$label = str_replace('-clickReport.txt', '', $label);

						// $label = explode("-", $label)[1].''.explode("-", $label)[0];

						// $labels.=$label;

						// if(count($f) != $next2+1){
						// 	$series.=', ';
						// 	$labels.=', ';
						// }

						// print_r($csv);




			    	}

			    	$series_sum = max(explode(", ", $series))+20;
			    	$series_unique_sum = max(explode(", ", $series_unique))+20;

			    }
			// }	
			}


			?>



			</div>

			<footer class="footer">
				<div class="container-fluid">
					<nav class="copyright pull-left">
						<small style="opacity: 0.7"> <a href="http://www.laylacms.com" class="show-link" target="_blank">LAYLA <?=CURRENT_VERSION;?></a> <span class="version-laylaapp">| {{Version}} </span> &copy; 2018 - <script>document.write(new Date().getFullYear())</script></small>
					</nav>
					<p class="copyright pull-right" style="text-align: right;opacity: 0.7 ">
						 <small><i class="fa fa-diamond" style="zoom:1.2;"></i> &nbsp;&nbsp;Proudly developed in Prague <br/>
						
					</p>
				</div>
			</footer>
		</div>
	</div>


	<script type="text/javascript" src="assets/js/jQuery.MultiFile.min.js"></script>




	<!--   Core JS Files   -->

	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="assets/js/bootstrap-notify.js"></script>


	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>



	<?php //if($_GET['page'] == 'home' || !isset($_GET['page'])){ ?>


	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>



	<!-- include summernote -->
	<link rel="stylesheet" href="assets/js/tinymce/skins/lightgray/skin.min.css">
	<link rel="stylesheet" href="assets/css/file-upload.css">
	<script type="text/javascript" src="assets/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="assets/js/fastclick.js"></script>
	<script type="text/javascript" src="assets/js/execute.js"></script>
	<script type="text/javascript" src="assets/js/sweetalert2.all.js"></script>
	<?php /* <script type="text/javascript" src="assets/js/motiongallery2.js"></script>*/ ?>

	<script type="text/javascript" src="assets/js/demo.js"></script>





<script type="text/javascript">

	 $('.notification-center').click(function(){
	 	$('span.notification').fadeOut();
		            $.post('../?read_notifications=1').done(function() {
					    // console.log("Uploaded images and posted content as an ajax request.");
					    // alert('ok');
					  });
    });



function init_tinymce(){
		tinymce.init({
		  selector: '.textarea',
		  height: 500,
		  menubar: true,

		  relative_urls : false,
		  remove_script_host : true,
		  convert_urls : true,

		  // images_upload_url: 'postAcceptor.php',
		  // images_upload_base_path: '../files',
		  // images_upload_credentials: true,
		  // file_browser_callback_types: 'file image media',

		  content_css: [
		 //    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		 //    '//www.tinymce.com/css/codepen.min.css',
		 //    '//www.bcgconsulting.cz/css/style.css',
		 //    '//www.bcgconsulting.cz/js/custom/trx/trx_addons.css',
		 //    '//www.bcgconsulting.cz/js/vendor/js_comp/js_comp_custom.css',
		 //    '/css/animation.css',
			// '/css/colors.css',
			// '/css/styles.css',
			// '/css/responsive.css',
			// '/css/custom.css',
			// '/js/vendor/js_comp/font-awesome.min.css'
		    ],
		  plugins: [
		  	'media',
		    'advlist autolink lists link image charmap print preview anchor',
		    'searchreplace visualblocks code fullscreen',
		    'insertdatetime media table contextmenu paste code'
		  ],
		  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
		});

		 // $(function() {


		tinymce.init({
		  selector: '.excerpt',
		  height: 100,
		  menubar: false,
		});
}
init_tinymce();


	</script>



	<?php //} ?>	


  <!-- include libraries BS3 -->



  <script type="text/javascript">

	  	<?php if($_GET['state'] == 'updated'){ ?>
		swal({position: 'middle-center',type: 'success',title: '{{Updated}}',showConfirmButton: false,timer: 1500});
		<?php } ?>


		// tinymce.activeEditor.uploadImages(function(success) {
		//   $.post('ajax/post.php', tinymce.activeEditor.getContent()).done(function() {
		//     console.log("Uploaded images and posted content as an ajax request.");
		//   });
		// });


		// tinymce.activeEditor.uploadImages(function(success) {
		//    document.forms[0].submit();
		// });




		// tinymce.activeEditor.execCommand('mceInsertContent', false, 'xxx');


      // $('.summernote').summernote({
      //   height: 500
      // });

      // $('form').on('submit', function (e) {
      //   e.preventDefault();
      //   // alert($('.summernote').summernote('code'));
      //   // alert($('.summernote').val());
      // });
    // });






  </script>










<?php //if($_GET['page'] == 'home-reports'){ ?>





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
								   // echo "Bohužel nic nenalezeno";//Tell the user nothing was found.
								}

								@$camp_unique = array_unique($camp_unique);
								// @$camp_unique = array_search($camp_unique, $_SESSION['campaign']);

								$dates = array();

								foreach ($camp_unique as $key => $value) {
									// echo '<strong style="float:left; margin:10px 0 -5px 15px; ">&nbsp;&nbsp;'.$value.'</strong><br/>';
									?>
									<?php
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
function ConfirmDelete()
{
var x = confirm("Are you sure you want to delete?");
if (x)
	return true;
else
	return false;
}




    	$(document).ready(function(){
			// dates2[0]='KV2017-2017-07-02';
	// var datesjs = ["KV2017-2017-07-02"];


$( ".addImage2tiny" ).click(function() {
	var url = $(this).attr('image-src');
	// $('textarea').val('x');
	tinymce.editors[0].execCommand('mceInsertContent', false, '<img src="'+url+'">');
});


$( ".MultiFile-label" ).click(function() {

	var url = $(this).find('img').attr('image-src');
	var src = $(this).find('img').attr('src');
	// $('textarea').val('x');
	tinymce.editors[0].execCommand('mceInsertContent', false, '<img src="'+src+'">');
});



    	});
	</script>


	<?php //} ?>


<script type="text/javascript">

$('.lds-ripple').remove();

function init_clicks(){
	// alert('init');


$( ".sidebar ul.nav a, .content .btn" ).click(function(e) {
	// confirm
if($(this).hasClass('confirmation')){
	confirmation();
}

 $(this).unbind('click');
  e.preventDefault();
	$(this).append('<div class="lds-ripple"><div></div><div></div></div>');

	$.getScript( "assets/js/filemanager.js" );
	$('ul.nav li').removeClass('active');
	$(this).parent().addClass('active');
	$('.sidebar ul.nav .dropdown-menu').hide();
	

	$(this).parent().find('.dropdown-menu').show();
	$(this).parent().find('.dropdown-menu li').removeClass('active');
	$(this).parent().parent().parent().addClass('active');
	$(this).parent().parent('ul').show();

	// $(".content").html('');
				var name = $(this).find('p').html();
				$('.navbar-brand strong').html(name);

	$.ajax({
    url: $(this).attr('href')+'&ajax=1',
    cache: false,
    dataType: "html",
    success: function(data, name) {
        $(".content").html(data);

			    $('.lds-ripple').remove();


		      setTimeout(function(){
				
				init_clicks();
				// demo.initDashboardPageCharts();
				sortable_posts();
				// init_filemanager();
				// init_tinymce();
    return false;

		      }, 1500);
    }

});
	// $(".content").load( $(this).attr('href')+'&ajax=1', function() {
		

	// 	    $('.lds-ripple').remove();

	// 	      setTimeout(function(){
				
	// 			init_clicks();
	// 			demo.initDashboardPageCharts();
	// 			sortable_posts();
	// 			init_filemanager();
	// 			init_tinymce();

	// 	      }, 2000);
	// });
	var url = $(this).attr('href');
	var url2 = $(this).attr('href')+'&ajax=1';

	window.history.pushState("Text", "Title", url);


// init_clicks();
	return false;
});


}
init_clicks();


if( $("input[type=file].with-preview").length ){
    $("input.file-upload-input").MultiFile({
        list: ".file-uploaded-images"
    });
}


setInterval(function(){ 
 
  const alertOnlineStatus = () => {
    if(navigator.onLine){
    }else{
    window.alert('You must be online to run Layla.');
    }
  }

  // window.addEventListener('online',  alertOnlineStatus)
  window.addEventListener('offline',  alertOnlineStatus)

  alertOnlineStatus();


 }, 3000);



// var userAgent = navigator.userAgent.toLowerCase();
// if (userAgent.indexOf(' electron/') > -1) {
//    $('.version-laylaapp span').html('1.0');
// }



// Open all links in external browser
//let shell = require('electron').shell;


// document.addEventListener('click', function (event) {

//   // if (event.target.tagName === 'a' ||  event.target.tagName === 'A' ||  (event.target.id == 'show-website' || event.target.className == 'show-link') ) {
//     // event.preventDefault();
//     // shell.openExternal(event.target.href);
//     alert('x');
  
//   // }

// });


</script>


</body>
</html>