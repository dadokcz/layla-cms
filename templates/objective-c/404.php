</section>



<?php   
$page = str_replace('/', '', $_GET['page']);

if(isset($query['post_type'])){
	$source = $query['post_type'].'.csv';
}else{
	$source = 'pages.csv';	
}
// TRY  TO FIND PAGE
$post = find_content('data/'.$source.'', $page);
?>
<!--Start of Main Content-->
<article role="main page">
<div id="main_content">


<section>
<div class="row">

<h1>oops..  [404]</h1><br/>
Tato stránka neexistuje.. Problém jsme zaznamenali a odeslali správci ke kontrole.<br/><br/>

Přejít na <a href="/">hlavní stranu</a>.

</div>
</section>



