<!DOCTYPE HTML>
<html>
	<head>
		<title>Kalendar</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link href='http://__fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


	    <script src='/includes/plugins/layla-reservations/assets/js/jquery.min.js'></script>
		<script type="text/javascript" src="/includes/plugins/layla-reservations/assets/js/jquery.openCarousel.js"></script> 
	    <link rel="stylesheet" href="/includes/plugins/layla-reservations/assets/css/clndr.css" type="text/css" />
		<script src= "/includes/plugins/layla-reservations/assets/js/moment-2.2.1.js" type="text/javascript"></script>
	    <script src="/includes/plugins/layla-reservations/assets/js/clndr.js" type="text/javascript"></script>
	   
	    <link rel="stylesheet" href="/includes/plugins/layla-reservations/assets/css/normalize.min.css">

		<link rel='stylesheet' href='/includes/plugins/layla-reservations/assets/css/flexboxgrid.min.css'>

		<script src='/includes/plugins/layla-reservations/assets/js/sweetalert.min.js'></script>
		 <script src="/includes/plugins/layla-reservations/assets/js/site.js" type="text/javascript"></script>



  

	</head>
	<body>

 

<div id="form-template" class="hidden">
  <form>
    <div class="row">
      
        <input name="date" value="" type="hidden" />
        <input name="date-timeslot" value="" type="hidden" />
        <input name="timeslot" value="" type="hidden" />

      <div class="col-sm-12">
        <input name="user" placeholder="Jméno a příjmení" class="swal-content__input" type="text" required>
      </div>

      <div class="col-sm-12">
        <input name="email" placeholder="E-mail" class="swal-content__input" type="text" required>
      </div>

      <div class="col-sm-12">
        <input name="phone" placeholder="Telefon" class="swal-content__input" type="text" required>
      </div>

      <div class="col-sm-12">
        <select>

        	<optgroup label="Podnikání">
		    	<option>Jak rozjet vlastní podnikání</option>
		    	<option>Pracovní nástroje pro podnikání (Software, HW)</option>
		    	<option>Web na Wordpressu krok za krokem</option>
        	</optgroup>

        	<optgroup label="Webové aplikace (Programování)">
	        	<option>HTML5 a CSS3 - Kompletní kurz</option>
	        	<option>PHP a MYSQL - Kompletní kurz</option>
	        	<option>Wordpress - Vývoj pluginů, šablon a témat</option>
	        	<option>Javascript, jQuery</option>
        	</optgroup>

        </select>
      </div>
    </div>
  </form>    
</div>








		<div class="content">
			<div class="cal1"> </div>
		</div>



	</body>
</html>