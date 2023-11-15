<?php
/* Template name: Dlužníci */
?>

<?php
/* Template name: Cart */
    // print_r($_SESSION['cart_items']);   
?>
</section>

<article role="main page">
<div id="main_content">

<section>
<div class="row">


<?php   
$page = str_replace('/', '', $_GET['page']);
// TRY  TO FIND PAGE
$post = find_content('data/pages.csv', $page);
?>


<h1><?=$post['title']; ?></h1><br/>


	<?=$post['content']; ?>





<style>
table{width: 100%;}
.first{font-weight: ;}
.first strong{font-size: 130%;}
.red{color: red; line-height: 100%;}
small{opacity: 0.5}
th{background:#000;  color: #fff; font-size: 120%}

tr:nth-child(2) {
  background: #efefff;
}

</style>




<div class="site-content clearfix" role="main">
    <div class="content-area">

    	<table>
    		<thead style="">
    			<th>Klient</th>
    			<th>Předmět hrazení</th>
    			<th>Datum</th>
                <th>Částka</th>
                <th>vč. Penále</th>
    		</thead>
    		<tbody>
 <!-- 

                 <tr>
                <?php
                $timeZAKAZKY = strtotime("2020-01-01");
                $cena = 120; 
                $pocetdni = round((time()-$timeZAKAZKY)/86400);
                $penale = $cena+(($cena*0.0025)*$pocetdni);
                // $penale = ($cena/100*0.15); 
                ?>

                <td class="first"><h2>David Zrůbecký</h2> Malkovského 595, 
19900 Praha <br/>
davidzrubecky@me.com <br/> 
739006305</td>
                <td>Dopravné</td>
                <td><?=date("d/m/Y",$timeZAKAZKY);?></td>
                <td><?=$cena;?> Kč</td>
                <td class="red"><?=$penale;?> Kč<br/> <small>0.25% denně</small></td>

                </tr>
 -->



    		</tbody>
    	</table>


<br/>
Výše poplatku z prodlení činí za každý den prodlení 2,5 promile dlužné částky, nejméně však 25 Kč za každý i započatý měsíc prodlení. <strong>
Dlouhodobě neuhrazené faktury bude posuzovat soud <i>podle obchodního zákoníku</i> nebo přímo <i>exekuční oddělení</i>.</strong> <br/><br/>


    </div>
</div>

<header class="page-header">
    <!-- <h1 class="page-title">Výpočet úroků z prodlení</h1> -->

    <div class="page-description">Kombinovaný výpočet zákonných a smluvních úroků z prodlení (penále).</div>
</header>

<div class="site-content clearfix" role="main">
<div class="content-area">
<strong>do 28.4.2005:</strong><br/>
dle nařízení vlády č. 142/1994 Sb., kterým se stanoví výše úroků z prodlení a poplatku z prodlení podle občanského zákoníku (platné do 28.4.2005)<br/>
<strong>od 28.4.2005:</strong><br/>
dle obchodního a občanského zákoníku včetně novely ve smyslu ust. Nařízením vlády č. 163/2005 Sb. ze dne 23. března 2005.<br/>
<strong>od 1.7.2010:</strong><br/>
dle obchodního a občanského zákoníku včetně novely nařízením č. 33/2010 Sb. (s účinností od 1.7.2010).<br/>
<strong>od 1.7.2013:</strong><br/>
dle obchodního a občanského zákoníku včetně novely nařízením vlády č. 180/2013 Sb., ze dne 26. června 2013<br/>
<br/>Výpočet poplatku z prodlení

<strong>podle 142/1994 Sb. ve znění §2 163/2005 Sb.</strong><br/><br/>




</div>
</section>

</div>
</article>












