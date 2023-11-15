<html lang="cs"><head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Layla - {{PUBLISHING SYSTEM}}</title>

    <link href="/templates/layla/assets/css/google-fonts.css" rel="stylesheet">
    <link href="/templates/layla/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/templates/layla/assets/css/main.css" rel="stylesheet">
    <link href="/templates/layla/assets/css/font-awesome.min.css" rel="stylesheet">
    
    <link rel="apple-touch-icon" sizes="57x57" href="/templates/layla/assets/favicon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/templates/layla/assets/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/templates/layla/assets/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/templates/layla/assets/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/templates/layla/assets/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/templates/layla/assets/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/templates/layla/assets/favicon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/templates/layla/assets/favicon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/templates/layla/assets/favicon/apple-touch-icon-180x180.png">
    
    <?php /*
    <link rel="icon" type="image/png" href="../../../20151013231624/https-/aurous.me/assets/favicon/favicon-32x32-v=ngg2aw6M5y.png" sizes="32x32">
    <link rel="icon" type="image/png" href="../../../20151013231629/https-/aurous.me/assets/favicon/android-chrome-192x192-v=ngg2aw6M5y.png" sizes="192x192">
    <link rel="icon" type="image/png" href="../../../20151013231620/https-/aurous.me/assets/favicon/favicon-96x96-v=ngg2aw6M5y.png" sizes="96x96">
    <link rel="icon" type="image/png" href="../../../20151013231619/https-/aurous.me/assets/favicon/favicon-16x16-v=ngg2aw6M5y.png" sizes="16x16">

    */?>

    <meta name="msapplication-TileColor" content="#202328">
    <meta name="msapplication-TileImage" content="/templates/layla/assets/favicon/mstile-144x144.png?v=ngg2aw6M5y">
    <meta name="msapplication-config" content="/templates/layla/assets/favicon/browserconfig.xml?v=ngg2aw6M5y">
    <meta name="theme-color" content="#ffffff">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


        
</head>
    <body>


    <div id="particles-js"></div>
            
        <nav class="navbar navbar-inverse navbar-static-top">
        	<div class="container">
        		<div class="navbar-header">
        			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        				<span class="sr-only">Toggle navigation</span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        			</button>
        			<a class="navbar-brand" href="<?=get_settings('default_url');?>">
                        <span class="logo-slogan">{{PUBLISHING SYSTEM}}</span>
                        <img src="<?=get_settings('default_url');?>/templates/layla/assets/img/logo-nav.png" alt="">
                    </a>
        		</div>
        		<div id="navbar" class="navbar-collapse collapse">
        			<ul class="nav navbar-nav navbar-right">

    								

                                    <?php

                                    foreach (get_languages() as $value) {?>
                                    <li class=""><a href="<?=$value['url'];?>" target="" class="lang" style="opacity: <?=($value['code'] == $_GET['language'] || ((empty($_GET['language']) && $value['code'] == get_settings('default_language')) ))?'1':'0.5';?>"><img src="<?=get_settings('default_url');?>/includes/images/flags/<?=strtolower($value['code']);?>.png" data-tipso="{{Switch to}} <?=get_countries()[strtoupper($value['code'])];?>" /></a></li><?php } ?>

<li class="credits-top"><a href="https://www.dadok.cz" target="_blank">Proudly developed in Prague <i class="fa fa-2x fa-diamond"></i></a></li>


        			</ul>
        		</div>
        	</div>
        </nav>



        <!-- Modal -->
        <div id="myModal" class="modal fade " role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">{{Buy Layla License}}</h2>
              </div>
              <div class="modal-body">

                <div class="row" style="width: 95%;">
                    <label for="title">{{Number of Licences}}: </label>
                    <select name="license" class="license">
                        <?php for ($i=1; $i < 10; $i++) {  ?>
                        <option value="<?=$i;?>"><?=$i;?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>


         
                <div class="row">
                    <label for="title">{{First & Last name}}</label>
                    <input type="text" name="name" placeholder="{{Please fill}} {{First & Last name}}" />
                </div>

                <div class="row">
                    <label for="title">{{Company}}</label>
                    <input type="text" name="company" placeholder="{{Please fill}} {{Company}}" />
                </div>

         
                <div class="row">
                    <label for="title">{{Address}}</label>
                    <input type="text" name="address" placeholder="{{Please fill}} {{Address}}" />
                </div>
         
                <div class="row">
                    <label for="title">{{City}}</label>
                    <input type="text" name="city" placeholder="{{Please fill}} {{City}}" />
                </div>
         
                <div class="row">
                    <label for="title">{{VAT}}</label>
                    <input type="text" name="vat" placeholder="{{Please fill}} {{VAT}}" />
                </div>
         
                <div class="row">
                    <label for="title">{{Your e-mail}}: </label>
                    <input type="text" name="email" placeholder="{{Please fill}} {{Your e-mail}}" />
                </div>
         
                <div class="row">
                    <label for="title">{{Your phone}}: </label>
                    <input type="text" name="phone" placeholder="{{Please fill}} {{Your phone}}" />
                </div>

                <div class="row">
                    <label for="title">{{State}}: </label>
                    <input type="text" name="state" placeholder="{{Please fill}} {{State}}" />
                </div>

                <input type="hidden" name="price" value="{{3120}}" />
                <input type="hidden" name="currency" value="{{EUR}}" />
                <input type="hidden" name="pricesum" value="{{EUR}}" />
         


                <div class="row">
                    <!-- <label for="title"></label> -->
                    <div style="zoom: 1.2; color:#fff; margin-top: 10px">
                    <input type="checkbox" name="agree" id="agree" class="" style="float: left; width:auto;" />&nbsp;&nbsp; <label for="agree" style="float: right; width:190px;">{{I agree with the}} <a data-toggle="modal" data-target="#terms">{{terms and conditions}}</a></label>
                    </div>
                </div>



                <div class="row">
                    <label for="title">{{Price}}: </label>
                    <span class="price">{{3120}} {{EUR}}</span> <small class="sleva">{{Discount}} <span></span></small>
                </div>

                <input type="submit" value="{{Buy Layla}}" class="buy-layla">

              </div>

            </div>

          </div>
        </div>
                                            

    
           
        <!-- Modal -->
        <div id="terms" class="modal fade " role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">{{Buy Layla}} - {{terms and conditions}}</h2>
              </div>
              <div class="modal-body">
               <p>
               1) You will receive source code of Layla after we receive your payment through regular Invoice. <br/><br/>
               2) You agree number of licenses is regular count of domains where Layla will be used. <br/> <br/>
               3) Further distribution of the source code is forbidden by a penalty 12000EUR.<br/><br/>
               <center>
               Provider: <br/>
               DADOK - Global Internet Solutions<br/>
               Na Výsluní 436/18<br/>
               412 01 Litoměřice<br/>
               Czech republic<br/><br/>

               <a href="mailto:helpdesk@dadok.cz">helpdesk@dadok.cz</a><br/>
               00420 774 019 903
               </center>
               </p>
              </div>

            </div>

          </div>
        </div>
                                            

           
        <div class="main-header container container-mini">
            <center>
            <img src="/templates/layla/assets/img/layla.png" style="max-width: 350px; margin: 40px auto -10px 0; padding: auto; width: 100%; height: auto;">
            </center>
            <h1>{{Layla is software you can use to create a beautiful & fast website, blog, or app.}}</h1>

            <p class="lead">{{Start create proffesional websites now.}}</p>


           <div class="download top">

                <!-- <p class="lead">Download & Buy Layla</p> -->
                <a href="/download.php?os=osx" class="btn btn-primary osx" data-tipso="{{Click to try a demo}}">
                    <div class="pull-left"><i class="fa fa-apple"></i></div>
                    <div class="pull-right"><p>{{Download}}</p><small>{{for OSX}}</small></div>
                    <div class="download-info">{{client}}</div>
                </a>
<!-- 
                 <a href="/download.php?os=windows" class="btn btn-primary win" data-tipso="{{Click to try a demo}}">
                    <div class="pull-left"><i class="fa fa-windows"></i></div>
                    <div class="pull-right"><p>{{Download}}</p><small>{{for Windows}}</small></div>
                    <div class="download-info">{{client}}</div>
                </a>
 -->
                <a href="#" class="btn btn-primary php" data-toggle="modal" data-target="#myModal"  data-tipso="{{Požadavky: PHP5+}}">
               
                    <div class="pull-left"><i class="fa fa-shopping-cart"></i></div>
                    <div class="pull-right"><p>{{Buy}}</p><small>{{License}}</small></div>
                    <div class="download-info">{{server}}</div>
                </a>
                
				
            </div>
                
        </div>
          

           
        <div class="teaser">
			<div class="screenshot">
               


				<div class="container">

                <div class="videoWrapper" onclick="playvideo();">
                    <video width="1124" id="video" height="728" loop="true" poster="/templates/layla/assets/img/screenshot.png" onclick="playvideo();">
                    <source src="https://shack.httpool.cz/dadok/layla.mp4" type="video/mp4">
                    <source src="https://shack.httpool.cz/dadok/layla.webm" type="video/webm">
                    </video>
                </div>

                <script type="text/javascript">

// var video = document.getElementById('video');

// video.addEventListener('click',function(){
// // alert('x');
// playvideo();

// },false);


function playvideo(){

    var video = document.getElementById('video');

    video.play();

    if (video.requestFullscreen) {
        video.requestFullscreen();
    }
    else if (video.msRequestFullscreen) {
        video.msRequestFullscreen();
    }
    else if (video.mozRequestFullScreen) {
        video.mozRequestFullScreen();
    }
    else if (video.webkitRequestFullScreen) {
        video.webkitRequestFullScreen();
    }

}




                </script>



                </div>
			</div>
<!-- 

            <section class="average">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 section-image section-image-1">
                             <video width="100%" id="video" height="auto" loop="true" poster="/templates/layla/assets/img/screenshot.png" onclick="playvideo();">
                    <source src="https://shack.httpool.cz/dadok/layla.mp4" type="video/mp4">
                    <source src="https://shack.httpool.cz/dadok/layla.webm" type="video/webm">
                    </video>
                        </div>
                        
                        <div class="col-sm-4 section-image section-image-1">
                             <video width="100%" id="video" height="auto" loop="true" poster="/templates/layla/assets/img/screenshot.png" onclick="playvideo();">
                    <source src="https://shack.httpool.cz/dadok/layla.mp4" type="video/mp4">
                    <source src="https://shack.httpool.cz/dadok/layla.webm" type="video/webm">
                    </video>
                        </div>
                        
                        <div class="col-sm-4 section-image section-image-1">
                             <video width="100%" id="video" height="auto" loop="true" poster="/templates/layla/assets/img/screenshot.png" onclick="playvideo();">
                    <source src="https://shack.httpool.cz/dadok/layla.mp4" type="video/mp4">
                    <source src="https://shack.httpool.cz/dadok/layla.webm" type="video/webm">
                    </video>
                        </div>
                        
                    </div>
                </div>
            </section>

 -->

<!-- 


            <section class="average">
                <div class="container">
                    <div class="row"><h2>{{Plugins}}</h2></div>
                    <div class="row">
                        <div class="col-sm-2" style="background: ; border: 2px solid #fff; border-radius: 5px; padding: 40px;  text-align: center; text-transform: uppercase;">
                             Shop<br/>
                             asdadad
                        </div>
                    
                        
                    </div>
                </div>
            </section>
 -->


       	
        	<section class="average">
        		<div class="container">
        			<div class="row">
        				<div class="col-sm-6 section-image section-image-1">
							<img src="<?=get_settings('default_url');?>/templates/layla/assets/img/teaser-average.png" alt="" style="visibility: visible; ">
        				</div>
						<div class="col-sm-6" style="visibility: visible; ">
							<h2><img src="<?=get_settings('default_url');?>/templates/layla/assets/img/rank-average.png" alt="">{{For Users}}</h2>
       						<h3>{{Jednodušší ovládání webu než kdy předtím.}}</h3>
							<p>{{Již první vydání publikačního systému Layla ovládá jednoduchou správu statických stránek i příspěvků. Chcete vytvořit novou stránku a zařadit ji do navigace? Prostě přidejte novou stránku. Chcete vytvořit nový příspěvek do sekce novinky nebo do blogu? Udělejte to.}}</p>

							<h3>{{Šablony a vzhled stránek.}}</h3>

							<p>{{Vyberte si právě tu šablonu, která vystihuje téma k Vaší prezentaci. A na zcela nových šablonách stále pracujeme.}}</p>

							<h3>{{Instalační pokyny.}}</h3>
							<p>{{Layla běží na každém webhostingu s podporou PHP5+. Ano, a to je opravdu vše. Žádné nastavování externí databáze. Layla má vlastní lokální databázi. Žádné další nároky na provoz.}}</p>
       					</div>
        			</div>
        		</div>
			</section>

			<section class="power">
				<div class="container">
					<div class="row">
						<div class="col-sm-6" style="visibility: visible; ">
							<h2><img src="<?=get_settings('default_url');?>/templates/layla/assets/img/rank-power.png" alt="">{{For Advanced Users}}</h2>
							<h3>{{Možnost jazykových lokalizací administrace.}}</h3>
							<p>{{Layla je sice vyvíjena v Praze (Česká republika), ale umí několik jazyků i v administračním rozhraní. Zvládne ji tak ovládat i Váš kolega ze zahraničí.}}</p>
							<h3>{{Možnost jazykových lokalizací šablon.}}</h3>
							<p>{{Vaše nápady a prezentace si zaslouží prodávat globálně. Jednoduchost nastavení jazykových lokalizací skrz libovolné textové řetězce v šablonách je v Layle samozřejmost.}}</p>
							<h3>{{Jazykové lokalizace pod kontrolou.}}</h3>
							<p>{{Všechny jazykové lokalizace od administrace po šablony a Váš obsah můžete jednoduše spravovat z administraci.}}</p>
						</div>
						<div class="col-sm-6 section-image section-image-1">
							<img src="<?=get_settings('default_url');?>/templates/layla/assets/img/teaser-power.png" alt="" style="visibility: visible; ">
						</div>
					</div>
				</div>
			</section>

			<section class="geeks">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 section-image section-image-1">
							<img src="<?=get_settings('default_url');?>/templates/layla/assets/img/teaser-geeks.png" alt="" style="visibility: visible; ">
						</div>
						<div class="col-sm-6" style="visibility: visible; ">
							<h2><img src="<?=get_settings('default_url');?>/templates/layla/assets/img/rank-geeks.png" alt="">{{For Developers}}</h2>
							<h3>{{Kompletní přizpůsobitelnost.}}</h3>
							<p>{{Chcete přidat vlastní funkci? Nebo jen chcete zlepšit kvalitu publikačního systému? Můžete se podílet na aktualizacích publikačního systému s námi. Aktualizace zahrneme do oficiálního vydání.}}</p>
							<h3>{{Jeden univerzální publikační systém na všechno.}}</h3>
							<p>{{Nikoho nenutíme použivat publikační systém Layla v defaultní funkční verzi a vzhledu. Používejte publikační systém Layla jako základ pro Vaše nové aplikace a projekty a obohaťte ho o nové funkce dle Vašich představ.}}</p>
						</div>
					</div>
				</div>
			</section>
			
			<div class="ask-on-twitter container">

				<h1>{{Do you have any questions?}}</h1>

				<a href="mailto:info@laylacms.com" class="btn btn-default btn-twitter btn-lg" target="_blank">{{Ask us anything}}</a>
			</div>
			
            <div class="container">

           <div class="download bottom">

                <p class="lead">Download & Buy Layla</p>
                <a href="/download.php?os=osx" class="btn btn-primary osx" data-tipso="{{Click to try a demo}}">
                    <div class="pull-left"><i class="fa fa-apple"></i></div>
                    <div class="pull-right"><p>{{Download}}</p><small>{{for OSX}}</small></div>
                    <!-- <div class="pull-right"><p>{{Try it}}</p><small>{{on browser}}</small></div> -->
                    <div class="download-info">{{client}}</div>
                </a>

                 <!-- <a href="/download.php?os=windows" class="btn btn-primary osx" data-tipso="{{Click to try a demo}}">
                    <div class="pull-left"><i class="fa fa-apple"></i></div>
                    <div class="pull-right"><p>{{Download}}</p><small>{{for OSX}}</small></div>
                    <div class="download-info">{{client}}</div>
                </a> -->

                <a href="#" class="btn btn-primary php" data-toggle="modal" data-target="#myModal"  data-tipso="{{Požadavky: PHP5+}}">
               
                    <div class="pull-left"><i class="fa fa-shopping-cart"></i></div>
                    <div class="pull-right"><p>{{Buy}}</p><small>{{License}}</small></div>
                    <div class="download-info">{{server}}</div>
                </a>
                
            </div>

