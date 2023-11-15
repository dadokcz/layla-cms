function do_login(name, pass, url, lang){

      var error;
      if(name == ''){error = 1;}
      if(pass == ''){error = 1;}
      if(url == ''){error = 1;}

      if(error != 1){


      $.get('https://'+url+'/includes/auth.php?username='+name+'&password='+pass+'',
      function(json) {


      if(json == 'ok'){

        localStorage.setItem("name", name);
        localStorage.setItem("pass", pass);
        localStorage.setItem("url", url);
        localStorage.setItem("lang", lang);


        window.location = 'https://'+name+':'+pass+'@'+url+'/admin/index.php?setlocale='+lang;
      
      }else{
        reset_storage();
        alert($('#errorfields2').text());
      
      }


      }).fail(function() {
          reset_storage();
          alert($('#woops').text()); // or whatever
      });

      }else{
          reset_storage();
          alert($('#errorfields').text()); // or whatever

      }


      $(this).append('<span class="click-efect x-' + oX + ' y-' + oY + '" style="margin-left:' + (pX - oX) + 'px;margin-top:' + (pY - oY) + 'px;"></span>')
      $('.x-' + oX + '.y-' + oY + '').animate({
         "width": "500px",
         "height": "500px",
         "top": "-250px",
         "left": "-250px",

      }, 600);
      $("button", this).addClass('active');

}
function reset_storage(){
        
        $('.login-fields').show();
        $('.spinner').hide();

        localStorage.setItem("name", '');
        localStorage.setItem("pass", '');
        localStorage.setItem("url", '');
        localStorage.setItem("lang", '');
}



$(function() {

var username = 'layla';
var password = 'layla';  


$( "input" ).each(function( index ) {
  // console.log( index + ": " + $( this ).text() );
 
   if ($(this).val().length > 0) {
      // alert('x');

$(this).parent(".input").each(function() {
         $("label", this).css({
            "line-height": "18px",
            "font-size": "18px",
            "font-weight": "100",
            "top": "0px"
         })
         $(".spin", this).css({
            "width": "100%"
         })
      });


   }

});





// $.ajax({
//   method: "GET",
//   cache: false,
//     url: "https://www.dadok.cz/layla/includes/auth.php",
//   data: { username: "layla", password: "layla" }
// }).done(function( msg ) {
//     alert( "Data Saved: " + msg );
//   });

   $(".input input").focus(function() {

      $(this).parent(".input").each(function() {
         $("label", this).css({
            "line-height": "18px",
            "font-size": "18px",
            "font-weight": "100",
            "top": "0px"
         })
         $(".spin", this).css({
            "width": "100%"
         })
      });
   }).blur(function() {
      $(".spin").css({
         "width": "0px"
      })
      if ($(this).val() == "") {
         $(this).parent(".input").each(function() {
            $("label", this).css({
               "line-height": "60px",
               "font-size": "24px",
               "font-weight": "300",
               "top": "10px"
            })
         });

      }
   });


   $("button.rundemo").click(function(e) {
      var pX = e.pageX,
         pY = e.pageY,
         oX = parseInt($(this).offset().left),
         oY = parseInt($(this).offset().top);

      var name = $('#demo_name').val();
      var email = $('#demo_email').val();
      var phone = $('#demo_phone').val();
      var url = $('#demo_url').val();
      var lang = $('#lang').val();

      var error;
      if(name == ''){error = 1;}
      if(email == ''){error = 1;}
      if(phone == ''){error = 1;}

      if(error != 1){

      $.get('https://demo.laylacms.com/includes/demo-users.php?type=demorun&name='+name+'&email='+email+'&phone='+phone+'&url='+url+'',
      function(json) {

      if(json == 'ok'){

        window.location = 'http://layla:layla@demo.laylacms.com/admin/index.php?setlocale='+lang;
        
      }else{

        alert($('#errorfields3').text());

      }


      }).fail(function() {


          alert($('#woops').text()); // or whatever
      });

    }else{


          alert($('#errorfields').text()); // or whatever

    }

      // $(this).append('<span class="click-efect x-' + oX + ' y-' + oY + '" style="margin-left:' + (pX - oX) + 'px;margin-top:' + (pY - oY) + 'px;"></span>')
      // $('.x-' + oX + '.y-' + oY + '').animate({
      //    "width": "500px",
      //    "height": "500px",
      //    "top": "-250px",
      //    "left": "-250px",

      // }, 600);
      // $(this, this).addClass('active');


   });




   $("button.login").click(function(e) {
      var pX = e.pageX,
         pY = e.pageY,
         oX = parseInt($(this).offset().left),
         oY = parseInt($(this).offset().top);

      var name = $('#name').val();
      var pass = $('#pass').val();
      var url = $('#url').val();
      var lang = $('#lang').val();

      do_login(name, pass, url, lang);



   });


   $(".alt-2").click(function() {

      $('.alt-2 .label').show();


      if (!$(this).hasClass('material-button')) {

         $('.material-button .shape:before, .material-button .shape:after').show();

         $(".shape").css({
            "width": "100%",
            "height": "100%",
            "transform": "rotate(0deg)"
         })

         setTimeout(function() {
            $(".overbox").css({
               "overflow": "initial"
            })
         }, 600)

         $(this).animate({
            "width": "140px",
            "height": "140px"
         }, 500, function() {
            $(".box").removeClass("back");

            $(this).removeClass('active')
         });

         $(".overbox .title").fadeOut(300);
         $(".overbox .input").fadeOut(300);
         $(".overbox .button").fadeOut(300);

         $(".alt-2").addClass('material-buton');
      }

   })

   $(".material-button").click(function() {

      $('.material-button .label').hide();

      if ($(this).hasClass('material-button')) {


         setTimeout(function() {
            $(".overbox").css({
               "overflow": "hidden"
            })
            $(".box").addClass("back");
         }, 200)
         $(this).addClass('active').animate({
            "width": "900px",
            "height": "900px"
         });

         setTimeout(function() {
            $(".shape").css({
               "width": "50%",
               "height": "50%",
               "transform": "rotate(45deg)"
            })

            $(".overbox .title").fadeIn(300);
            $(".overbox .input").fadeIn(300);
            $(".overbox .button").fadeIn(300);
         }, 700)

         $(this).removeClass('material-button');

      }

      if ($(".alt-2").hasClass('material-buton')) {
         $(".alt-2").removeClass('material-buton');
         $(".alt-2").addClass('material-button');
      }

   });

});




  var dict = {

  "Přihlášení": {
    en: "Sign up",
    gb: "Sign up",
    cs: "Přihlášení",
    at: "Anmelden",
    de: "Anmelden",
    it: "Accesso",
    pl: "Zaloguj się",
    ru: "Войти",
    sk: "Prihlásenie"
  },

  
  "Webová adresa": {
    en: "Website",
    gb: "Website",
    cs: "",
    at: "Webadresse",
    de: "Webadresse",
    it: "Sito web",
    pl: "Stronie internetowej",
    ru: "Веб-сайт",
    sk: "WWW adresa"
  },

  
  "E-mailová adresa": {
    en: "E-mail",
    gb: "E-mail",
    cs: "E-mail",
    at: "E-mail",
    de: "E-mail",
    it: "E-mail",
    pl: "E-mail",
    ru: "Электронная почта",
    sk: "E-mail"
  },
  "Heslo": {
    en: "Password",
    gb: "Password",
    cs: "",
    at: "Passwort",
    de: "Passwort",
    it: "Password",
    pl: "Hasło",
    ru: "пароль",
    sk: ""
  },
  "Spustit": {
    en: "Run a",
    gb: "Run a",
    cs: "",
    at: "Laufen",
    de: "Laufen",
    it: "Corsa",
    pl: "Uruchom",
    ru: "запуск",
    sk: "Spustiť"
  },
  "Vyzkoušet demo": {
    en: "Try a demo",
    gb: "Try a demo",
    cs: "",
    at: "Name und Nachname",
    de: "Name und Nachname",
    it: "Nome e Cognome",
    pl: "Imię i nazwisko",
    ru: "Имя и фамилия",
    sk: "Meno a priezvisko"
  },
  "Jméno a příjmení": {
    en: "Name & Surname",
    gb: "Name & Surname",
    cs: "",
    at: "Name und Vorname",
    de: "Name und Vorname",
    it: "Nome e cognome",
    pl: "Imię i nazwisko",
    ru: "Имя и фамилия",
    sk: "Meno a priezvisko"
  },
  "Telefonní číslo": {
    en: "Phone number",
    gb: "Phone number",
    cs: "",
    at: "Telefonnummer",
    de: "Telefonnummer",
    it: "Numero di telefono",
    pl: "Numer telefonu",
    ru: "Номер телефона",
    sk: "Telefónne číslo"
  },
  "Přihlásit se": {
    en: "Sign Up",
    gb: "Sign Up",
    cs: "",
    at: "Anmelden",
    de: "Anmelden",
    it: "Accedi",
    pl: "Zaloguj się",
    ru: "Логин",
    sk: "Prihlásenie"
  },
  "Spustit demo": {
    en: "Try a demo",
    gb: "Try a demo",
    cs: "",
    at: "Führen Sie die demo",
    de: "Führen Sie die demo",
    it: "Eseguire la demo",
    pl: "Uruchom demo",
    ru: "Запустить демо",
    sk: "Spustiť demo"
  },
  "Přepnout jazyk na": {
    en: "Switch language to",
    gb: "Switch language to",
    cs: "",
    at: "Sprache wechseln zu",
    de: "Sprache wechseln zu",
    it: "Passa alla lingua",
    pl: "Zmień język na",
    ru: "Переключить язык на",
    sk: "Prepnúť jazyk na"
  },
  "Publishing system": {
    en: "Publishing system",
    gb: "Publishing system",
    cs: "Publikační systém",
    at: "Publishing system",
    de: "Publishing system",
    it: "Sistema di pubblicazione",
    pl: "System publikacji",
    ru: "Издательская система",
    sk: "Publikačný systém"
  },
  "Všechna pole jsou povinná": {
    en: "All fields are required",
    gb: "All fields are required",
    cs: "Všechna pole jsou povinná",
    at: "Alle Felder sind Pflichtfelder",
    de: "Alle Felder sind Pflichtfelder",
    it: "Tutti i campi sono obbligatori",
    pl: "Wszystkie pola są wymagane",
    ru: "Все поля являются обязательными",
    sk: "Všetky polia sú povinné"
  },
  "Oops, na zadané adrese neběží publikační systém Layla": {
    en: "Oops, at the specified address is not running a publication system Layla",
    gb: "Oops, at the specified address is not running a publication system Layla",
    cs: "Oops, na zadané adrese neběží publikační systém Layla",
    at: "Hoppla, läuft unter der angegebenen Adresse ein Veröffentlichungssystem Layla nicht",
    de: "Hoppla, läuft unter der angegebenen Adresse ein Veröffentlichungssystem Layla nicht",
    it: "Oops, presso l'indirizzo specificato non è in esecuzione un sistema di pubblicazione Layla",
    pl: "Oops pod podanym adresem nie jest uruchomiony system publikacji Layla",
    ru: "К сожалению по указанному адресу не выполняется системы публикации Лейла",
    sk: "Jejda, na zadanej adrese nebeží publikačný systém Layla"
  },
  "Špatný e-mail nebo heslo": {
    en: "Wrong email or password",
    gb: "Wrong email or password",
    cs: "Špatný e-mail nebo heslo",
    at: "Falsche e-Mail oder Passwort",
    de: "Falsche e-Mail oder Passwort",
    it: "Indirizzo email errato o la password",
    pl: "Niewłaściwy adres e-mail lub hasło",
    ru: "Неправильный адрес электронной почты или пароль",
    sk: "Nesprávny e-mail alebo heslo"
  },
  "Nastala neočekávaná chyba, zkuste to prosím později.": {
    en: "Unexpected error occurred, please try again later.",
    gb: "Unexpected error occurred, please try again later.",
    cs: "Nastala neočekávaná chyba, zkuste to prosím později.",
    at: "Unerwarteter Fehler ist aufgetreten, bitte versuchen Sie es später erneut.",
    de: "Unerwarteter Fehler ist aufgetreten, bitte versuchen Sie es später erneut.",
    it: "Errore imprevisto si è verificato, si prega di riprovare più tardi.",
    pl: "Wystąpił nieoczekiwany błąd, spróbuj ponownie później.",
    ru: "Произошла непредвиденная ошибка, повторите попытку позже.",
    sk: "Vyskytla sa neočakávaná chyba, prosím skúste to znova neskôr."
  },
  "Cancel": {
    en: "Cancel",
    gb: "Cancel",
    cs: "Zrušit",
    at: "Abbrechen",
    de: "Abbrechen",
    it: "Annulla",
    pl: "Anuluj",
    ru: "Отмена",
    sk: "Zrušiť"
  },
  "Loading last session..": {
    en: "Loading last session..",
    gb: "Loading last session..",
    cs: "Načítání poslední relace...",
    at: "Laden die letzte Sitzung...",
    de: "Laden die letzte Sitzung...",
    it: "Ultima sessione di caricamento...",
    pl: "Ładowanie ostatniej sesji...",
    ru: "Загрузка последней сессии...",
    sk: "Načítanie poslednú relácie..."
  },


}


var translator = $('body').translate({lang: "en", t: dict}); //use English

if(localStorage.getItem("lang")){

translator.lang(localStorage.getItem("lang")); //change to Portuguese
$('input#lang').val(localStorage.getItem("lang"));
var lang = localStorage.getItem("lang");

}else{

var userLang = navigator.language || navigator.userLanguage;
var res = userLang.split("-");

translator.lang(res[0]); //change to Portuguese
$('input#lang').val(res[0]);
var lang = res[0];

}
// $(this).attr('data-lang').parent().addClass



$('img[data-lang="'+lang+'"]').css('opacity', '1');

$( ".nav img" ).click(function() {
  var lang = $(this).attr('data-lang');

   $('.nav img').css('opacity', '0.3');
   $(this).css('opacity', '1');

  translator.lang($(this).attr('data-lang')); //change to Portuguese  
  $('input#lang').val(lang);
  localStorage.setItem("lang", lang);
  var mourek = 1;
  return false;
});


// $( ".nav img" ).click(function() {
  
//    $('.nav img').css('opacity', '0.3');
//    $(this).css('opacity', '1');

// });


$( document ).ready(function() {

  if( localStorage.getItem("name") ){
    // alert('x');
    $('.login-fields').hide();
    $('.spinner').fadeIn();

    redirect = setTimeout(function(){ 
    do_login(localStorage.getItem('name'), localStorage.getItem('pass'), localStorage.getItem('url'), localStorage.getItem('lang'));
    }, 3000);

  } 

   $( "li img" ).hover(
  function() {

    translator.lang($(this).attr('data-lang')); //change to Portuguese
//    $(this).css('opacity', '1');

    $( '.hoverdiv span' ).html($(this).attr('data-tipso'));
    $( '.hoverdiv' ).show();
  }, function() {

    if($('input#lang').val() != $(this).attr('data-lang')){
    translator.lang($('input#lang').val()); //change to Portuguese  

    $( '.hoverdiv' ).hide();
    }

  }
);

});






   $(".cancel-loading").click(function(e) {

    $('.login-fields').show();
    $('.spinner').hide();

    localStorage.setItem("name", '');
    localStorage.setItem("pass", '');
    localStorage.setItem("url", '');
    localStorage.setItem("lang", '');

    clearTimeout(redirect);


    });



