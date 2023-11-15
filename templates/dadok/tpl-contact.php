<?php
/* Template name: Contact */
?>

    <header class="page-header">
    <h1 class="page-title">Kontakt</h1>

<div class="page-description">Pokud máte cokoliv na srdci, těšíme se na Vaši zprávu. Komunikujeme v češtině a angličtině.</div>
</header>
<div class="site-content clearfix" role="main">
    <div class="content-area">
        <article id="post-31" class="entry-content post-31 page type-page status-publish hentry">
            <div class="grid_6">
                <div id="" class="map_canvas"">



        <!-- <img id="m-img" src="/images/dadokmapa.png" class="animated pulse" style="width: 530px; height: 530px; border-radius: 20px; display: block;" onclick="showmap()" /> -->
        
        <div id="m" class="animated pulse"  style="width: 530px; height: 730px; border-radius: 10px; display: block; "></div>

        <br/>


        <div style="width: 530px; height: auto; border-radius: 0; border: 10px solid #efeef; line-height: 300%; text-align: center; font-size: 220%; color: #000; font-style: italic; font-weight: 100; background: ;" />Krátce o nás.. </div>

        <div style="width: 530px; height: auto; border-radius: 0; border: 10px solid #efeef; line-height: 180%; text-align: center; font-size: 120%; color: #000; font-style: ; font-weight: 100; background: ;" /> Jsme kreativní a vývojářské studio zaměřené na široké odvětví digitální reklamy a digitálního prodeje. 

Vaše nápady si zaslouží prodávat. </div>

       


        <script type="text/javascript" src="https://api.mapy.cz/loader.js"></script>
        <script type="text/javascript">Loader.load();</script>

  <script type="text/javascript">
        Loader.load();
    function showmap(){
        var mapa = document.getElementById("m");
        var mapaimg = document.getElementById("m-img");

        mapa.style.display='block';
        mapaimg.style.display='none';    



    }






    var obrazek = "/templates/dadok/images/mouse.png";

var m = new SMap(JAK.gel("m"));
m.addControl(new SMap.Control.Sync()); /* Aby mapa reagovala na změnu velikosti průhledu */
m.addDefaultLayer(SMap.DEF_TURIST_WINTER).enable(); /* Turistický podklad */
// var mouse = new SMap.Control.Mouse(SMap.MOUSE_PAN | SMap.MOUSE_WHEEL | SMap.MOUSE_ZOOM); /* Ovládání myší */
var mouse = new SMap.Control.Mouse(SMap.MOUSE_PAN); /* Ovládání myší */
m.addControl(mouse); 

var data = {
    "Litoměřice": "50°32'0.522\"N, 14°7'54.488\"E",
    "Hradec Králové": "50°9'4.464\"N, 15°43'34.433\"E",
    "Praha 5": "50°3'9.929\"N, 14°20'56.607\"E"
};
var znacky = [];
var souradnice = [];

for (var name in data) { /* Vyrobit značky */
    var c = SMap.Coords.fromWGS84(data[name]); /* Souřadnice značky, z textového formátu souřadnic */
    
    var options = {
        url:obrazek,
        title:name,
        anchor: {left:70, bottom: 50}  /* Ukotvení značky za bod uprostřed dole */
    }
    
    var znacka = new SMap.Marker(c, null, options);
    souradnice.push(c);
    znacky.push(znacka);
}


/* Křivoklát ukotvíme za střed značky, přestože neznáme její velikost */
var options = {
    anchor: {left:0.5, top:0.5}
}
znacky[1].decorate(SMap.Marker.Feature.RelativeAnchor, options);

var vrstva = new SMap.Layer.Marker();     /* Vrstva se značkami */
m.addLayer(vrstva);                          /* Přidat ji do mapy */
vrstva.enable();                         /* A povolit */
for (var i=0;i<znacky.length;i++) {
    vrstva.addMarker(znacky[i]);
}

var cz = m.computeCenterZoom(souradnice); /* Spočítat pozici mapy tak, aby značky byly vidět */
m.setCenterZoom(cz[0], cz[1]);      

setTimeout(function(){ 

// document.getElementsByClassName("hud")[0].style.display='none';

}, 100);


  </script>



				</div>
            </div>
            <div class="grid_6 last">

                <address>
<div class="grid_12">

<div class="grid_12"><span style="font-size: 150%; font-weight: bold; color: #000;">RÁDI SE S VÁMI SETKÁME </span><br/>Samozřejmě i mimo města naší působnosti.<br/><br/></div>



<div class="grid_6"><strong><span class="cb-title" data-icon="," style="font-size: 70%;margin: 4px 0 0 0; float: left;"></span> Praha 5</strong> - Kancelář</div>
<div class="grid_6 last"><i>158 00, Nušlova 25 - Stodůlky</i></div><br/>

<div class="grid_6"><strong><span class="cb-title" data-icon="," style="font-size: 70%;margin: 4px 0 0 0; float: left;"></span> Hradec Králové</strong> - Kancelář</div>
<div class="grid_6 last"><i>503 13, Dohalice 37</i></div>

<div class="grid_6"><strong><span class="cb-title" data-icon="," style="font-size: 70%;margin: 4px 0 0 0; float: left;"></span> Litoměřice</strong> - Sídlo firmy</div>
<div class="grid_6 last"><i>412 01, Na Výsluní 436/18</i><br/><br/></div>




<div class="grid_6" style="font-size: 120%;"> <span class="cb-title" data-icon="N" style="font-size: 70%;margin: 4px 0 0 0; float: left;"></span> Telefon</div>
<div class="grid_6 last">+420 774 019 903</span>
</div>

<div class="grid_6" style="font-size: 120%;"> <span class="cb-title" data-icon="N" style="font-size: 70%;margin: 4px 0 0 0; float: left;"></span> Telefon</div>
<div class="grid_6 last">+420 735 515 674</span>
</div>

<div class="grid_6" style="font-size: 120%;"><span class="cb-title" data-icon="@" style="font-size: 60%;margin: 5px -3px 0 0; float: left;"></span>E-mail</div>
<div class="grid_6 last" style="font-size: 100%;"><span style="font-size: 130%; font-weight: bold; color: #000;"> <a href="mailto:info@dadok.cz">info@dadok.cz</a><br/><br/></div>

<div class="grid_6">Fakturační údaje</div>
<div class="grid_6 last">DADOK - Global Internet Solutions, Dohalice 37, 503 13 Dohalice</div>
<div class="grid_6">IČO</div>
<div class="grid_6 last">76256961 <br/><br/></div>
<!-- <div class="grid_6">DIČ</div>
<div class="grid_6 last">CZ8609232929 <br/><br/></div> -->
<!-- <div class="grid_6">Právní zastoupení</div> -->
<!-- <div class="grid_6 last">JUDr. Monika Bakešová<br/> Novobranská 270/18, 412 01 Litoměřice<br/> ak@bakesova.cz<br/><br/></div> -->

<div class="grid_12">
<small>Firma zapsána v živnostenském rejstříku v Litoměřicích.</small><br/><br/>
</div>


                    
                            </address>

<div class="grid_12"><span style="font-size: 150%; font-weight: bold; color: #000;">ZAVOLEJTE NEBO NAPIŠTE</span><br/>Jsme rádi, že se o nás zajímáte, dejte nám o sobě nezávazně vědět.<br/><br/></div>


                            <div role="form" class="wpcf7" id="wpcf7-f3070-p31-o1" dir="ltr">
                                <div class="screen-reader-response"></div>
                                <form action="/kontakt/" method="post" class="wpcf7-form" novalidate="novalidate">
                                    <div style="display: none;">
                                        <input type="hidden" name="_wpcf7" value="3070">
                                            <input type="hidden" name="_wpcf7_version" value="4.3">
                                                <input type="hidden" name="_wpcf7_locale" value="">
                                                    <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f3070-p31-o1">
                                                        <input type="hidden" name="_wpnonce" value="6b2e5b9f72">
                                                        </div>
                                                        <div class="grid_4">
                                                            <span class="wpcf7-form-control-wrap your-name">
                                                                <input type="text" name="your_name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="your-name" aria-required="true" aria-invalid="false" placeholder="Jméno *">
                                                                </span>
                                                            </div>
                                                            <div class="grid_4">
                                                                <span class="wpcf7-form-control-wrap your-email">
                                                                    <input type="email" name="your_email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" id="your-email" aria-required="true" aria-invalid="false" placeholder="E-mail *">
                                                                    </span>
                                                                </div>
                                                                <div class="grid_4 last">
                                                                    <span class="wpcf7-form-control-wrap your-phone">
                                                                        <input type="text" name="your_phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="your-email" aria-required="true" aria-invalid="false" placeholder="Telefon*">
                                                                        </span>
                                                                    </div>
                                                                    <div class="grid_12">
                                                                        <span class=""><br/>
                                                                            <textarea name="your_message" cols="40" rows="6 " class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" id="your-message" aria-required="true" aria-invalid="false" placeholder="Zpráva *"></textarea>
                                                                        </span>
                                                                    </div>
                                                                    <p style="display: none;">
                                                                        <span class="">
                                                                            <input name="yourmessagetext" value="">
                                                                        </span>
                                                                    </p>
                                                                    <p>
                                                                        <input type="submit" value="ODESLAT" class="wpcf7-form-control wpcf7-submit">
                                                                            <img class="ajax-loader" src="https://www.dadok.cz/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Odesílám..." style="visibility: hidden;">
                                                                            </p>
                                                                            <div class="wpcf7-response-output wpcf7-display-none"></div>
                                                                        </form>

                                                                        <?php

if($_POST['your_message'] && $_POST['yourmessagetext'] == ''){

// $headers = 'From: noreply@dadok.cz . "\r\n' .
//     'Reply-To: '.$_POST['your_email'].'' . "\r\n" .
//     'X-Mailer: PHP/' . phpversion();


$body = "

".$_POST['your_name']." ".$_POST['your_email']."
".$_POST['your_phone']."
".$_POST['your_message']."
".$_POST['your_email']."

";

mail('info@dadok.cz', 'Dadok.cz | Kontakt', $body, $headers);
echo ' Děkujeme. Vaše zpráva byla odeslána. Brzy se Vám ozveme.';
}

                                                                        ?>
<br/><br/><br/><br/><br/><br/><br/>

                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                    </div>