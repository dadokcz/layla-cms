<?php

// if(!is_user_logged_in()){
// die('Omlouvame se, prave probihaji aktualizace ucetniho systemu.');
// }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
    
    <link rel="stylesheet" href="/includes/plugins/layla-invoices/assets/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/includes/plugins/layla-invoices/assets/style-print.css" type="text/css" media="print" />

    <meta http-equiv="Content-Type" content="" />
    
    <title></title>
    
    <meta name="robots" content="noindex, nofollow">

    <?php //wp_head(); ?>


    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


    <script>
        // A $( document ).ready() block.
        $( document ).ready(function() {

            $('.bubble').hide();

            setTimeout(function() {
                $('.bubble').fadeIn();
                $(".deposit").effect( "shake", 
            {times:2}, 1000 );

            }, 2500);

            $( ".bubble" ).click(function() {
                $('.bubble').fadeOut();
            });

            $( ".deposit" ).hover(function() {
                $('.bubble').fadeIn();
            });
            
            $( ".deposit" ).mouseout(function() {
                $('.bubble').fadeOut();
            });

            $( ".bubble" ).mouseleave(function() {
                $('.bubble').fadeOut();
            });
        
            $( ".showdesc" ).click(function() {
                $(this).find('img').css('opacity', '0.3');
              $( this ).next('p.details').toggle( "slow", function() {
                
                $(this).find('img').css('opacity', '1');

            });
        });

        });
    </script>





</head>
<body>


<div style="" class="container-padding">
<div class="invoice row">

<?php
$page = str_replace('/', '', $_GET['page']);

$get_invoice = @find_content(ROOT_ABSOLUTE_PATH.'data/invoices.csv', $page);

// $invoicenumber = get_settings('invoices-start-number')+$get_invoice['id']+1;
// $invoicenumber = get_settings('invoices-start-number')+$get_invoice['id']+1;
$invoicenumber = $get_invoice['attributes']['invoice-id'];


if($get_invoice['attributes']['invoices-state'] == 'paid'){  ?>
<span class="stamp is-approved">Zaplaceno</span>
<?php }else{ 

if(!file_exists("includes/plugins/layla-invoices/cache/qrcode-".$page.".png")){
include "qrcodeimg.php";
}
}

?>    

<?php if($get_invoice['attributes']['invoices-state'] != 'paid' && file_exists("includes/plugins/layla-invoices/cache/qrcode-".$page.".png")){  ?>
<div class="qrname"><img src="/includes/plugins/layla-invoices/cache/qrcode-<?php echo $page; ?>.png"></div>
<?php } ?>

<div class="invoicename">FAKTURA<br/>#<?=$invoicenumber;?></div>
    <div class="logo">
      <img src="/includes/plugins/layla-invoices/assets/dadoklogo.png" alt="logo"><br>
      <?php
      $fromdetails = explode(',', get_settings('invoices-from-details'));
      foreach ($fromdetails as $key => $value) {
        $first++;
        if($first == 1){
          echo '<strong>'.$value.'</strong><br/>';
        }elseif( strpos($value, "@") !== false ){
          echo '<a href="mailto:'.$value.'">'.$value.'</a><br/>';
        }elseif( strpos($value, "www")  ){
          echo '<a href="http://'.$value.'">'.$value.'</a><br/>';
        }else{
          echo $value.'<br/>';
        }
      }
      ?>
    </div>

    <div class="line row">
      <div class="col-md-6 col-xs-6 padding-0 text-left">
        <h4>DATUM</h4>
        <h2><?php echo date('d.m. Y', $get_invoice['time']); ?></h2>
      </div>
      <div class="col-md-6 col-xs-6 padding-0 text-right">
        <h4>PROJEKT</h4>
        <h2><?=$get_invoice['title'];?></h2>
      </div>
    </div>

    <div class="line row">
      <div class="col-md-6 col-xs-6 padding-0 text-left">
        <h4>ODBĚRATEL</h4>
                <?php
                $client = @find_content(ROOT_ABSOLUTE_PATH.'/data/clients.csv', str_replace('/', '', $get_invoice['attributes']['invoices-clients']));
                ?>
                

                <h2><?=$client['title'];?></h2>
                <?=$client['content'];?>
                <!-- <p class="hidden">...</p> -->
                




      </div>
      <div class="col-md-6 col-xs-6 padding-0 text-right">
        <h4>PLATEBNÍ INFORMACE</h4>


                    <!-- <p><strong>Číslo účtu: </strong>670100-2209106374/6210</p> -->
                    <p><strong>Číslo účtu: </strong>1693035015/3030</p>
                    <p><strong>Variabilní symbol: </strong><?=$invoicenumber;?></p>
                    
                     <?php
                     // echo $get_invoice['invoices-duedate'];
                     if(!empty($get_invoice['attributes']['invoices-duedate'])){
                      $days = $get_invoice['attributes']['invoices-duedate'];
                     }else{
                      $days = 14;
                     }
                     
                     $duedate = $days*(60*60*24);

                     $timed = $get_invoice['time']+$duedate; $timed_today = strtotime(date('m/d/Y')); ?>
                    
                    <p><strong>Datum splatnosti: </strong><?php echo StrFTime("%d/%m/%Y", $timed); ?><?php if($timed < time() && $get_invoice['attributes']['invoices-state'] != 'paid'){?> <img src="/includes/plugins/layla-invoices/assets/vykricnik.png" align="absmiddle" /><?php } ?></p>
                    <div style="color:#a0a0a0;font-size: 80%">
                    <p><u>AIRBANK</u></p>
                    <p>AIRACZPP (SWIFT BIC)</p>
                    <p>CZ7430300000001693035015 (IBAN)</p>
                    <!-- <p><u>AIRBANK</u></p> -->
                    <!-- <p>Sokolovská 668/136D, 186 00 Praha 8</p> -->
                    <!-- <p>BREXCZPP (SWIFT (BIC))</p> -->
                    <!-- <p>CZ04 6210 6701 0022 0910 6374 (IBAN)</p> -->
                    </div>


                    <!-- <p><strong>Toto je cenová kalkulace.</strong></p> -->
                    <!-- <p>Prosím neplatit.<br /> Platba bude požadována až po vystavení faktury.</p> -->


      </div>
    </div>





    <table class="table">
      <thead class="title">
        <tr>
          <td width="60%">POLOŽKY</td>
          <td width="20%">JEDNOTKY&nbsp;&nbsp;</td>
          <td width="20%">SAZBA</td>
          <td class="text-right"  width="20%">CENA</td>
        </tr>
      </thead>
      <tbody>
        


<?php

$decode = json_decode(base64_decode($get_invoice['attributes']['invoices-items']), true);

    foreach ($decode as $key => $value_item) {
      $num++;
      $SUMprice = $value_item['price']+$SUMprice;
?>



      <tr>
          <td><span class="showdesc"><?=$value_item['name'];?></span> <p class="details" style="display:none;">desc</p></td>
          <td><?=$value_item['sku'];?></td>
          <td><?=$value_item['price_per_one'];?></td>
          <td class="text-right"><?=$value_item['price'];?>&nbsp;<?=$currency_symbol[get_settings('invoices-currency')];?></td>
        </tr>





<?php } ?>




       <!--  <tr>
          <td></td>
          <td></td>
          <td class="text-right"></td>
          <td class="text-right">Mezivýpočet<h4 class="total">xx</h4></td>
        </tr> -->
<!--         <tr>
          <td></td>
          <td></td>
          <td class="text-right"></td>
          <td class="text-right">DPH<h4 class="total">xx</h4></td>
        </tr>
 -->
        
        <tr>
          <td></td>
          <td></td>
          <td class="text-right"></td>
          <td class="text-right">CELKEM<h4 class="total"><?=$SUMprice;?> <?=$currency_symbol[get_settings('invoices-currency')];?></h4></td>
        </tr>




      </tbody>
    </table>

    <div class="signature">
      <p><img src="/includes/plugins/layla-invoices/assets/subscr.png" alt="img"></p>
      <p><b>Ondřej Dadok</b>, Director & Lead Developer</p>
    </div>

   

    <div class="bottomtext">
      Výše částky uvedené na faktuře musí být uhrazena bankovním převodem (případně pomocí online platební brány). Platba je splatná dle data splatnosti v této faktuře.
      Opožděné platby jsou penalizovány ve výši 5% za měsíc. Nejsme plátci DPH.  Firma zapsána v živnostenském rejstříku. 
    </div>
        

  </div>
</div>



</body>
</html>