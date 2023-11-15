/* -----------------------------------------------
/* How to use? : Check the GitHub README
/* ----------------------------------------------- */

/* To load a config file (particles.json) you need to host this demo (MAMP/WAMP/local)... */
/*
particlesJS.load('particles-js', 'particles.json', function() {
  console.log('particles.js loaded - callback');
});
*/

/* Otherwise just put the config content (json): */

particlesJS('particles-js',
  
  {
    "particles": {
      "number": {
        "value": 50,
        "density": {
          "enable": true,
          "value_area": 800
        }
      },
      "color": {
        "value": "#efefef"
      },
      "shape": {
        "type": "circle",
        "stroke": {
          "width": 0,
          "color": "#000000"
        },
        "polygon": {
          "nb_sides": 1
        },
        "image": {
          "src": "img/github.svg",
          "width": 100,
          "height": 100
        }
      },
      "opacity": {
        "value": 0.5,
        "random": true,
        "anim": {
          "enable": false,
          "speed": 1,
          "opacity_min": 0.1,
          "sync": false
        }
      },
      "size": {
        "value": 6,
        "random": true,
        "anim": {
          "enable": false,
          "speed": 40,
          "size_min": 0.1,
          "sync": false
        }
      },
      "line_linked": {
        "enable": false,
        "distance": 150,
        "color": "#ffffff",
        "opacity": 0.4,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 1,
        "direction": "none",
        "random": false,
        "straight": false,
        "out_mode": "out",
        "attract": {
          "enable": false,
          "rotateX": 600,
          "rotateY": 1200
        }
      }
    },
    
    "retina_detect": true,
    "config_demo": {
      "hide_card": false,
      "background_color": "#b61924",
      "background_image": "",
      "background_position": "50% 50%",
      "background_repeat": "no-repeat",
      "background_size": "cover"
    }
  }

);

function numberWithCommas(n) {
    var parts=n.toString().split(".");
    return parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, " ") + (parts[1] ? "." + parts[1] : "");
}

$( document ).ready(function() {

setTimeout(function(){
// declare a variables first
$(".download a").first().trigger('mouseenter');
$(".download a").first().trigger('hover');
$(".download a").first().trigger('mouseover');
 
},1200);

$(".buy-layla").click(function(e) {
var error;

$( "#myModal input" ).each(function( index ) {
 

  if($(this).val() == '' && $(this).attr('name') != 'company'){
    error = '{{All fields are required.}}';
  }

});

  if($('#agree').is(":checked") ){
  }else{
    error = '{{Please agree with TERMS AND CONDITIONS.}}';
  }



if(error == null){
$.post( "/templates/layla/mail.php", { name: "John", time: "2pm" })
  .done(function( data ) {
    $('#myModal .modal-body').html('<p>{{Thanks for your order, we will process the order until the next day.}}</p>');
  });
}else{
  alert(error);
}

});





  $('.navbar-right img, .download .btn').tipso({
    speed             : 400,        
    background        : '#8b60e8',
    titleBackground   : '#333333',
    color             : '#ffffff',
    titleColor        : '#ffffff',
    titleContent      : '',       
    showArrow         : true,
    position          : 'bottom',
    width             : '170',
    maxWidth          : '',
    delay             : 0,
    hideDelay         : 0,
    animationIn       : 'fadeIn',
    animationOut      : '',
    useTitle          : false,
    templateEngineFunc: null

  });



  var priceO = $('input[name="price"]').val();
  var currency = $('input[name="currency"]').val();
  $('.modal-body .price').html(numberWithCommas(priceO)+' '+currency);

  
});

$('.modal-body .license').change(function() {

  var price = $(this).val();
  var currency = $('input[name="currency"]').val();
  if(price > 1){
    var sleva = price*10;
  }
  if(price > 3){
    sleva = 4*10; 
  }
  var priceO = $('input[name="price"]').val();
  var amount = price*priceO;
  
  amount = amount-(amount/100*sleva);
  amount = numberWithCommas(amount);
  
  if(price == 1){
    
    amount = $('input[name="price"]').val();
    amount = numberWithCommas(amount);

    $('.modal-body .price').html(amount+' '+currency);

    $('.modal-body .sleva').css('display', 'inline');
    $('.modal-body .sleva').css('display', 'none');
    $('.modal-body .sleva span').html('');

  }else{

    $('.modal-body .price').html(amount+' '+currency);
    $('.modal-body .sleva').fadeIn();
    $('.modal-body .sleva span').html(sleva+'%');

  }

  $('.modal-body .price').html(amount+' '+currency);

});

// translator.lang("pt"); //change to Portuguese








