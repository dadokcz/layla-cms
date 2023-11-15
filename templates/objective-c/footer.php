</div>
</article>
<!--End of Main Content-->

<!--Start of Landing Page Footer-->
<footer role="contentinfo">
<div id="page_footer" class="row">
<ul>
<li><a href="/blog/">Redakční blog</a></li>
<li><a href="/press/">Press</a></li>
<li><a href="/obchodni-podminky/">Obchodní podmínky</a></li>
<li><a href="/podklady/1_Edice_Knihy/">Podklady ke knize</a></li>

<!-- <li><a href="http://help.objective-c.cz">Fórum</a></li> -->
<li><a href="/kontakt/">Kontakt</a></li>
</ul>

<p>
&copy; Všechna práva vyhrazena | <a href="tel:00420 774 019 903">Volejte +420 774 019 903</a>     
</p>

<br/>
<span style="opacity: 0.5;">Při poskytování služeb nám pomáhají soubory cookie. Používáním webu vyjadřujete souhlas.</span>


</div>


</footer>
<!--End of Landing Page Footer-->

<!--End of Contact form-->
<a href="#" class="scrollup">Jedeme nahoru</a>




<script src="/templates/objective-c/js/jquery-1.11.0.min.js"></script>
<script src="/templates/objective-c/js/jquery.backgroundvideo.js"></script>


<link rel="stylesheet" href="/templates/objective-c/js/chocolat.css" />
<script type="text/javascript" src="/templates/objective-c/js/jquery.chocolat.min.js"></script>

<script src="/templates/objective-c/js/books1.js"></script>

<script type="text/javascript" src="/templates/objective-c/js/jquery.ddslick.min.js"></script>

<script type="text/javascript">

jQuery( document ).ready(function() {


jQuery(function(){
      jQuery('video').each(function(){this.muted=true})
});

jQuery( ".ribbon" ).animate({
    // opacity: 0.25,
    margin: "154px 0 0 150px",
    opacity: "1"
  }, 1500, function() {
    // Animation complete.
});


var vybrano = jQuery('#countryselect-select option:selected').val();

optionHeight = jQuery(".split-list").height();


// alert(optionHeight);

jQuery( ".cod_reveal" ).click(function() {

    if(jQuery( ".cod_reveal" ).hasClass('opened')){

    jQuery( ".cod_reveal" ).removeClass('opened');

    jQuery( ".toc .row" ).animate({
        // opacity: 0.25,
        height: "350px"
      }, 1500, function() {
        // Animation complete.
    });

    jQuery('html, body').animate({
        scrollTop: jQuery(".toc").offset().top
    }, 1000);



    }else{

    jQuery( ".cod_reveal" ).addClass('opened');

    jQuery( ".toc .row" ).animate({
        // opacity: 0.25,
        height: "100%"
      }, 1500, function() {
        // Animation complete.
    });

    }

    return false;
});


jQuery('#example0, #screenshots').Chocolat({
    loop           : true,
    imageSize     : 'cover',
    overlayOpacity : 0.2,
    linkImages : true,
    duration : 300,
    setIndex : 'yes',
});

Books.init();



jQuery('#countryselect').ddslick({
    onSelected: function (data) {
        // console.log(data);
        // alert(data.selectedData.value);

        if(vybrano != data.selectedData.value){
        jQuery('#countryselect-select').val('' + data.selectedData.value + '');
        jQuery('#wcpbc-country-selector').submit();
        }
      

    }
});

});



$(function() {
    var num_cols = 3,
    container = $('.split-list'),
    listItem = 'li',
    listClass = 'sub-list';
    container.each(function() {
        var items_per_col = new Array(),
        items = $(this).find(listItem),
        min_items_per_col = Math.floor(items.length / num_cols),
        difference = items.length - (min_items_per_col * num_cols);
        for (var i = 0; i < num_cols; i++) {
            if (i < difference) {
                items_per_col[i] = min_items_per_col + 1;
            } else {
                items_per_col[i] = min_items_per_col;
            }
        }
        for (var i = 0; i < num_cols; i++) {
            $(this).append($('<ul ></ul>').addClass(listClass));
            for (var j = 0; j < items_per_col[i]; j++) {
                var pointer = 0;
                for (var k = 0; k < i; k++) {
                    pointer += items_per_col[k];
                }
                $(this).find('.' + listClass).last().append(items[j + pointer]);
            }
        }
    });
});


</script>









<script>

jQuery( ".switchversion" ).click(function() {

    jQuery( ".switchversion" ).addClass('animated pulse');
    prepnoutver();
});

function prepnoutver(){

    if(jQuery('.ipadslide').hasClass('hidden')){

        jQuery('.switchversion .label').html('iBooks verze');
        jQuery('.ipadslide').removeClass('hidden');
        jQuery('.printslide').addClass('hidden');
        jQuery('.printslide').hide();

        setTimeout(function(){ 

        jQuery('.ipadslide').fadeIn(1500);

         }, 10);



    }else{

        jQuery('.switchversion .label').html('Tištěná verze');
        jQuery('.printslide').removeClass('hidden');
        jQuery('.ipadslide').hide();
        jQuery('.ipadslide').addClass('hidden');

            setTimeout(function(){ 

        jQuery('.printslide').fadeIn(1500);

         }, 10);



    }
}

setInterval(prepnoutver, 6000);



  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-24475778-22', 'objective-c.cz');
  ga('send', 'pageview');
</script>


<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?2U5nRS3DishmlMT7zjikdoLvXgixf9gb';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->

  <style>
    .container {
      width: 90%;
      height: 350px;
      margin: 0 20px 20px 20px;
      float: right;
    }
    .swal2-checkbox{
        display: none !important;
    }
  </style>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



<script type="text/javascript">modal.style.display = "block";</script>


<?php //get_js_reports(); ?>

 
  <!-- <iframe src='/templates/objective-c/checkisic.php?<?=time();?>' style="border-radius: 20px;z-index: 99999999999999999999;" width="100%" height="100%" frameborder="0"></iframe> -->

 


  <script>
  function get_isic(){
Swal.mixin({
  input: 'text',
  confirmButtonText: 'Další &rarr;',
  showCancelButton: true,
  cancelButtonText: 'Zavřít',
  progressSteps: ['1', '2']
}).queue([
  {
    title: 'Sleva na ISIC kartu',
    text: 'Bereme také karty 𝐈𝐓𝐈𝐂 (𝘐𝘯𝘵𝘦𝘳𝘯𝘢𝘵𝘪𝘰𝘯𝘢𝘭 𝘛𝘦𝘢𝘤𝘩𝘦𝘳 𝘐𝘥𝘦𝘯𝘵𝘪𝘵𝘺 𝘊𝘢𝘳𝘥), 𝐈𝐘𝐓𝐂 (𝘐𝘯𝘵𝘦𝘳𝘯𝘢𝘵𝘪𝘰𝘯𝘢𝘭 𝘠𝘰𝘶𝘵𝘩 𝘐𝘥𝘦𝘯𝘵𝘪𝘵𝘺 𝘊𝘢𝘳𝘥) nebo 𝐀𝐋𝐈𝐕𝐄 (𝘗𝘳𝘶̊𝘬𝘢𝘻 𝘻𝘢𝘮𝘦̌𝘴𝘵𝘯𝘢𝘯𝘤𝘦). Poštovné  je ZDARMA 📦. Knihu doručíme do druhého dne. Kniha je ideální jako dárek pro studenty nebo učitele 🎄🎅🏻.',
  },
  'Jméno na kartě'
]).then((result) => {
  if (result.value) {

$.ajax({
  url: "/templates/objective-c/checkisic.php?<?=time();?>&data="+result.value,
  cache: false
})
  .done(function( html ) {
    // $( "#results" ).append( html );
    if(html == 'ok'){

    Swal.fire({
      title: 'Ověřuji',
      html: `
        Vše v pořádku. Můžete přejít na objednávku
      `,
      confirmButtonText: 'Objednat za 790 Kč'
    }).then(function(isConfirm) {

 fetch("/includes/plugins/layla-shop-gateway-stripe/create-simple-session.php?product=objective-c-kniha-tistena-verze&price=790&sku=1&time=<?=time();?>", {
                method: "POST",
                })
                .then(function (response) {
                  return response.json();
                })
                .then(function (session) {
                  return stripe.redirectToCheckout({ sessionId: session.id });
                })
                .then(function (result) {
                  // If redirectToCheckout fails due to a browser or network
                  // error, you should display the localized error message to your
                  // customer using error.message.
                  if (result.error) {
                    alert(result.error.message);
                  }
                })
                .catch(function (error) {
                  console.error("Error:", error);
                });

    })


    }else{
 Swal.fire({
      title: 'Ověřuji',
      html: `
        Zadaná ISIC karta není validní. Zadejte korektní údaje.
      `,
      confirmButtonText: 'OK'
    })
    }
  });




    // const answers = JSON.stringify(result.value)
    
    // Swal.fire({
    //   title: 'Ověřuji',
    //   html: `
    //     Your answers:
    //     <pre><code>${answers}</code></pre>
    //   `,
    //   confirmButtonText: 'Lovely!'
    // })




  }
})
    }
  </script>
</body>
</html>