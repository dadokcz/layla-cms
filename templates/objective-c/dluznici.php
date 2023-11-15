<header class="page-header">
    <h1 class="page-title">Dlužníci</h1>

    <div class="page-description">Seznam klientů, kteří nám (prozatím) nedoplatili za naše služby.</div>
</header>

<style>

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
    			<th>klient</th>
    			<th>Předmět hrazení</th>
    			<th>Datum</th>
                <th>Částka</th>
                <th>vč. Penále</th>
    		</thead>
    		<tbody>
               <?php /*
                <tr>
                <?php
                $timeZAKAZKY = strtotime("2017-11-17");
                $cena = 6900; 
                $pocetdni = round((time()-$timeZAKAZKY)/86400);
                $penale = $cena+(($cena*0.0025)*$pocetdni);
                // $penale = ($cena/100*0.15); 
                ?>
                <td class="first"><strong>Manira s.r.o.</strong><br/>Martin Šedivý, Jana Rejmonová</td>
                <td>Webové stránky, Firemní identita</td>
                <td><?=date("d/m/Y",$timeZAKAZKY);?></td>
                <td><?=$cena;?> Kč</td>
                <td class="red"><?=$penale;?> Kč<br/> <small>0.25% denně</small></td>

                </tr>
                */?>

                 <tr>
                <?php
                $timeZAKAZKY = strtotime("2017-09-01");
                $cena = 29990; 
                $pocetdni = round((time()-$timeZAKAZKY)/86400);
                $penale = $cena+(($cena*0.0025)*$pocetdni);
                // $penale = ($cena/100*0.15); 
                ?>

                <td class="first"><strong>STAVSEC</strong><br/>Otakar Švec</td>
                <td>Webové Portfolio stavební firmy STAVSEC</td>
                <td><?=date("d/m/Y",$timeZAKAZKY);?></td>
                <td><?=$cena;?> Kč</td>
                <td class="red"><?=$penale;?> Kč<br/> <small>0.25% denně</small></td>

                </tr>

                 <tr>
                <?php
                $timeZAKAZKY = strtotime("2017-12-28");
                $cena = 1490; 
                $pocetdni = round((time()-$timeZAKAZKY)/86400);
                $penale = $cena+(($cena*0.0025)*$pocetdni);
                // $penale = ($cena/100*0.15); 
                ?>

                <td class="first"><strong>Httpool a.s., IČ: 28537190</strong><br/>Radek Vašíček</td>
                <td>Samsung Holidays 2017_spotify UPDATE</td>
                <td><?=date("d/m/Y",$timeZAKAZKY);?></td>
                <td><?=$cena;?> Kč</td>
                <td class="red"><?=$penale;?> Kč<br/> <small>0.25% denně</small></td>

                </tr>


                 <tr>
                <?php
                $timeZAKAZKY = strtotime("2018-01-19");
                $cena = 4470; 
                $pocetdni = round((time()-$timeZAKAZKY)/86400);
                $penale = $cena+(($cena*0.0025)*$pocetdni);
                // $penale = ($cena/100*0.15); 
                ?>

                <td class="first"><strong>Httpool a.s., IČ: 28537190</strong><br/>Radek Vašíček</td>
                <td>3x Spotify HPTO pro Red Bull</td>
                <td><?=date("d/m/Y",$timeZAKAZKY);?></td>
                <td><?=$cena;?> Kč</td>
                <td class="red"><?=$penale;?> Kč<br/> <small>0.25% denně</small></td>

                </tr>



<!-- 
                <tr>
                <?php
                $timeZAKAZKY = strtotime("2017-11-24");
                $cena = 990; 
                $pocetdni = round((time()-$timeZAKAZKY)/86400);
                $penale = $cena+(($cena*0.0025)*$pocetdni);
                // $penale = ($cena/100*0.15); 
                ?>

                <td class="first"><strong>PIMPINELLA.CO</strong><br/>Petra Nováková</td>
                <td>E-shop, doplnění fontu, doplnění editovatelné menu, doplnění faktur</td>
                <td><?=date("d/m/Y",$timeZAKAZKY);?></td>
                <td><?=$cena;?> Kč</td>
                <td class="red"><?=$penale;?> Kč<br/> <small>0.25% denně</small></td>

                </tr>
 -->



    		</tbody>
    	</table>

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
</div>
    