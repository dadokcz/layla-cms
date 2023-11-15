<!DOCTYPE html>
<html  style="zoom: 0.85">
  <head>
    <link href="/includes/login/css/style.css" rel="stylesheet"/>
    <link href="/includes/login/css/animate.css" rel="stylesheet"/>

    <meta charset="UTF-8">
    <title>LAYLA</title>
  </head>


<body>


<div class="touch-bar"></div>

<div class="hoverdiv"><div><small class="trn">Přepnout jazyk na</small><span></span></div></div>
<div class="materialContainer animated fadeIn" style="zoom:0.7">


<div class="langs" style="zoom: 0.8">
<ul class="nav navbar-nav navbar-right">
    <li class=""><img class="tipso_style" data-tipso="Česká republika" src="/includes/images/flags/cz.png" data-lang="cs"></li>
    <li class=""><img class="tipso_style" data-tipso="Austria" src="/includes/images/flags/at.png" data-lang="at"></li>
    <li class=""><img class="tipso_style" data-tipso="Germany" src="/includes/images/flags/de.png" data-lang="de"></li>
    <li class=""><img class="tipso_style" data-tipso="Italy" src="/includes/images/flags/it.png" data-lang="it"></li>
    <li class=""><img class="tipso_style" data-tipso="Poland" src="/includes/images/flags/pl.png" data-lang="pl"></li>
    <li class=""><img class="tipso_style" data-tipso="Russia" src="/includes/images/flags/ru.png" data-lang="ru"></li>
    <li class=""><img class="tipso_style" data-tipso="Slovakia" src="/includes/images/flags/sk.png" data-lang="sk"></li>
    <li class=""><img class="tipso_style" data-tipso="United Kingdom (UK)" src="/includes/images/flags/gb.png" data-lang="gb"></li>
</div>


<div  class="logo">
<img src="/includes/login/img/logo.png"><span class="trn">Publishing system</span>
</div>

<div class="box">

      <div id="woops" class="trn">Oops, na zadané adrese neběží publikační systém Layla</div>
      <div id="errorfields" class="trn">Všechna pole jsou povinná</div>
      <div id="errorfields2" class="trn">Špatný e-mail nebo heslo</div>
      <div id="errorfields3" class="trn">Nastala neočekávaná chyba, zkuste to prosím později.</div>
      


      <div class="title trn">Přihlášení</div>

      <div class="spinner"><span class="trn">Loading last session..</span> <span class="trn cancel-loading">Cancel</span>
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
      </div>

      <div class="login-fields">

      <div class="input">
         <label for="url" class="trn">Webová adresa</label>
         <input type="text" name="url" id="url" value="<?=$_SERVER['HTTP_HOST'];?>" disabled>
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="name" class="trn">E-mailová adresa</label>
         <input type="text" name="name" id="name">
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="pass" class="trn">Heslo</label>
         <input type="password" name="pass" id="pass">
         <span class="spin"></span>
      </div>


      <div class="button login">
         <button class="login"><span class="trn">Přihlásit se</span> <i class="fa fa-check"></i></button>
      </div>

      <a href="mailto:support@dadok.cz?subject=I forgot my password to Layla&body=Hi Layla Team, can you change my password paired to my e-mail: XXXXXX. Thank you." class="pass-forgot trn">Zapomněl/a jste heslo?</a>

      </div>

   </div>

   <div class="overbox">
      <div class="material-button alt-2"><span class="shape"></span><div class="label"><b class="trn">Spustit</b><br/><span class="trn">DEMO</span></div></div>

      <div class="title trn">Vyzkoušet demo</div>

      <div class="input">
         <label for="regname" class="trn">Jméno a příjmení</label>
         <input type="text" name="name" id="demo_name">
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="email" class="trn">E-mailová adresa</label>
         <input type="email" name="email" id="demo_email">
         <span class="spin"></span>
      </div>


      <div class="input">
         <label for="phone" class="trn">Telefonní číslo</label>
         <input type="text" name="phone" id="demo_phone">
         <span class="spin"></span>
      </div>

      <div class="input">
         <label for="site" class="trn">Webová adresa</label>
         <input type="text" name="url" id="demo_url">
         <span class="spin"></span>
      </div>
      <input type="hidden" name="lang" id="lang" value="cs">
      <div class="button">
         <button class="rundemo"><span class="trn">Spustit demo</span></button>
      </div>


   </div>

</div>




<script  src='/includes/login/js/jquery.js'></script>
<script  src="/includes/login/js/jquery.translate.js"></script>
<script  src="/includes/login/js/index.js"></script>


<script>
  const alertOnlineStatus = () => {
    if(navigator.onLine){
    }else{
    window.alert('You must be online to run Layla.');
    }
  }

  // window.addEventListener('online',  alertOnlineStatus)
  window.addEventListener('offline',  alertOnlineStatus)

  alertOnlineStatus();


</script>



</body>


</html>
