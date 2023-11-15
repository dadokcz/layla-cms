<?php
// if($_GET['iloveyou'] == 'kontakt'){
// mail('info@dadok.cz', 'Klára Čechová', "URL: ".$_SERVER['HTTP_REFERER']." IP:".$_SERVER['REMOTE_ADDR']."");
// }
// if($_SERVER["HTTPS"] != "on")
// {
//     header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
//     exit();
// }


if($_GET['wordpress_plugin_sponsors'] == 1){

  $sponsors = Array('Petr Záprtek', 'Lenka Šejdířová');


  echo json_encode($sponsors);


  die();
}


function searchForId($id, $array) {
   foreach ($array as $key => $val) {
       if ($val['post_slug'] === $id) {
           return $key;
       }
   }
   return null;
}


function gen_slug($str){
    # special accents
    $a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','Ð','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','?','?','J','j','K','k','L','l','L','l','L','l','?','?','L','l','N','n','N','n','N','n','?','O','o','O','o','O','o','Œ','œ','R','r','R','r','R','r','S','s','S','s','S','s','Š','š','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Ÿ','Z','z','Z','z','Ž','ž','?','ƒ','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','?','?','?','?','?','?');
    $b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o');
    return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/','/[ -]+/','/^-|-$/'),array('','-',''),str_replace($a,$b,$str)));
}


if(!function_exists('citaty')){
function citaty($onpage = 0){

if($_GET['page'] == '/akademie'){
  $citaty = 'Jolana Slávková|Když jsem se rozhodla odejít z práce, potřebovala jsem si ujasnit následující kroky. Kurz „startu podnikání“ mi dodal <strong>sebedůvěru</strong> a <strong>mám strategii</strong> do začátků. Děkuji.|https://www.dadok.cz/templates/dadok/images/team1.png
  Petr Koláček|S Wordpressem si hraji jako laik kvůli mému podnikání. <strong>Kurz programování</strong> mi <strong>rozšířil obzory</strong>.|data:image/jpeg;base64,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
  ';

}else{
$citaty = 'Patrick White|Dosáhnout dokonalosti je nemožné. Ale je naší povinností se o to pokusit.|https://www.nobelprize.org/images/white-13246-content-portrait-mobile-tiny.jpg
Jack Welch|Strategie znamená jasně zvolit způsob, jak konkurovat.|https://vialogue.files.wordpress.com/2010/08/jack_welch.jpg
Pelé|Nadšení je vše. Musí být pevné a vibrující jako struna kytary.|https://www.menhouse.eu/upload/gallery/menhouse_3440_01_hublot-ambassador-pele-4.jpg
Jack Welch|Pokud jde o strategii, méně hloubejte a více dělejte.|https://vialogue.files.wordpress.com/2010/08/jack_welch.jpg
Jack Welch|Chcete-li, aby lidé žili a dýchali vizí, zaplaťte jim za to, že to dělají.|https://vialogue.files.wordpress.com/2010/08/jack_welch.jpg
Jack Trout|Poznejte svou konkurenci. Vyhněte se jejich silným a využijte jejich slabé stránky.|https://citaty.net/media/authors/jack-trout.jpg
Zig Ziglar|Budoucnost je místo, kam se ubíráte strávit zbytek svého života. Každodenní výkony jsou cihly, z kterých ho budujete.|http://www.businessanimals.cz/wp-content/uploads/2014/07/Zig-Ziglar.jpg
Zig Ziglar|Pokud chceme vykonat něco velkého, musíme pro tento cíl pracovat každý den svého života.|http://www.businessanimals.cz/wp-content/uploads/2014/07/Zig-Ziglar.jpg
Zig Ziglar|Dosáhnout cíle, který si neurčíte, je stejně obtížné jako se vrátit z místa, kde jste nikdy nebyli.|http://www.businessanimals.cz/wp-content/uploads/2014/07/Zig-Ziglar.jpg
Zig Ziglar|Úspěch není cíl, je to cesta, je to směr, kterým jdete.|http://www.businessanimals.cz/wp-content/uploads/2014/07/Zig-Ziglar.jpg
Napoleon Hill|Hýčkejte své vize a své sny, jako by to byly děti vaší duše, náznaky cílů, kterých nakonec dosáhnete|http://upload.wikimedia.org/wikipedia/commons/7/75/Napoleon_Hill_headshot.jpg
Michael Lewis|Máte-li úspěch, měli jste štěstí. Dlužíte těm, co štěstí nemají.|http://www.wired.com/wp-content/uploads/2014/04/michael-lewis-inline.jpg';
}


// Kjell A Nördström:Je lepší odepsat 90% lidí a upoutat pozornost zbývajících 10% než mít mírný úspěch u všech.
// Jonas Ridderstrale:Je lepší být někým pro někoho než nikým pro všechny.
// Hadjime Mitari:Tvrdí-li lidé o něčem, že je to šílené, měli bychom se do toho pustit. Tvrdí-li o něčem, že je to dobré, znamená to, že to už dělá někdo jiný.

// Americké přísloví:Business is like a car. It will not run by itself except downhill.
// Benjamin Mays:Mnohem větší tragédie než je nedosáhnout cíle, je nemít žádný cíl.


// W.J.Bryan:Destiny is not a matter of chance, it is a matter of choice! It is not a thing to be waited for, it is a thing to be achieved.
// Neznámý autor:If you do not know where you are going, any road will take you there.
// Ian McDermott:Vize spojuje lidi v rámci organizace. Propojuje to, co lidé dělají a co je pro ně důležité, s tím, čeho chce dosáhnout organizace. Každý ve firmě musí vizi znát a musí také cítit, že je její součástí, má-li dojít naplnění!
// Harvey Mackay:A goal is a dream with a deadline.
// J.F. Kennedy:Problémy světa nemohou vyřešit skeptikové a cynici, jejichž obzory jsou omezené viditelnou realitou. Potřebujeme muže a ženy, kteří dokážou snít o věcech, které nikdy nebyly.
// Earl Nightingale:Lidé, kteří mají cíl, uspějí, protože vědí, kam směřují.
// G.B. Shaw:Někteří lidé vidí věci takové jaké jsou, a ptají se:Proč? Já raději sním o věcech, které nikdy neexistovaly a ptám se:Proč ne?
// Steve Rivkin:Cíle jsou jako sny. Probuďte se a uvědomte si realitu.
// Robert Frost:Nejlepší cesta ven vede vždy skrz.
// Ronald Coase:Co se týče předpovídání budoucnosti mají ekonomové a meteorologové mnoho společného.
// J.P. Morgan:Milionáři nevěří v astrologii. Miliardáři ano.
// Jonas Ridderstrale:Společnosti se musí naučit zapomínat, škrtat a ničit tak, aby mohli stavět znovu.
// A.A Lazarus:Míříte-li příliš vysoko, můžete minout cíl.
// Napoleon Hill:Žít bez cílů je jako jít na výlet a nevědět kam.
// T.A.Harris:Nemůžete se učit navigaci uprostřed bouře.

// Japonské přísloví:Vision without action is a daydream. Action without vision is a nightmare.
// Lao C:Vidět věci, když jsou teprve v zárodku, to je genialita.
// G. R. Blair:Long-term planning is not about making long-term decisions. It is about understanding the future consequences of today´s decisions.
// Yogi Berra:You got to be careful if you do not know where you are going, because you might not get there.
// Wayne Gretzky:I skate to where the puck is going to be, not where it is.
// John Sculley:The future belongs to those who see possibilities before they become obvious.
// John Rock:A mission statements story:A bunch of guys take off their ties and coats, go into a motel room for three days, and put a bunch of words on a piece of paper. Then go back to business as usual.
// Steve Rivkin:Put your money where your opportunities are, not where they were.
// Robert Goizueta:In real estate it is all about location, location, location. In business it is differentiate, differentiate, differentiate.
// “Když dva jedou na koni jeden musí sedět vzadu” Shakespeare

// “Má-li problém řešení, nemá smysl dělat si starosti. Když řešení nemá, starosti nepomohou.” Dalajláma

// “Kam míří vaše pozornost, tam směruje vaše energie a tam se objeví i výsledky” Harv Eker

// “Nic není víc matoucí než lidé, kteří rozdávájí dobré rady, ale sami jsou špatný příklad.” Norman Vincent Peale

// “Charakter je schopnost realizovat hodnotná rozhodnutí i poté, co odezněly emoce, které k rozhodnutí vedly.” Harv Eker

// “Člověk je připraven a ochoten přijmout jakékoliv utrpení, jakmile a dokud je schopen v něm vidět nějaký smysl.” Viktor Frankl

// “Každý z nás dělá mnoho věcí tak, aby vyhověl snům jiných lidí – rodičů, partnerů, učitelů nebo spolužáků.” Jack Welch

// “Někdy je nejlepší životní investicí ta, kterou jste právě neudělali.” Milan Zelený



// $arr = explode("\n", $citaty);
// // var_dump($arr);

// // $dadok_citat_day_expire = 86400;
// $dadok_citat_day_expire = 5;


// if(isset($_COOKIE["dadok_citat_expire_day"])){

// $rand_keys_number = $_COOKIE["dadok_citat_expire_day"];

// }else{


// $rand_keys = array_rand($arr, 2);
// $rand_keys_number = $rand_keys[0];

// @setcookie("dadok_citat_expire_day",$rand_keys_number,time()+$dadok_citat_day_expire);

// }


$arr = explode("\n", $citaty);
$rand_keys = array_rand($arr, 2);

$rand_keys_number = $rand_keys[0];
$citat = $arr[$rand_keys_number];


$citat_exploded = explode("|", $citat);

$imgname_path = $citat_exploded[2];

// $imgname = md5($citat_exploded[2]);

// $imgname_path = './cache/'.$imgname.'.jpg';

// @copy($citat_exploded[2], './cache/'.$imgname.'.jpg');
// chmod('./cache/'.md5($citat_exploded[2]).'.jpg', 0777);

if($citat_exploded[1] != ''){
?>

<div class="site-content clearfix" role="main">


<div class="row-wrapper">
<div class="row">
<div class="grid_12" style="text-align: center;">

<?php if($onpage != 1){ if($_GET['page'] == '/akademie'){$citaty_title = 'Reference absolventů AKADEMIE';}else{$citaty_title = 'Citát dne';} ?>
<div class="rpp-header footersocial"><h2><?=$citaty_title;?></h2>
	<span class="spacer"></span><a class="" href="https://twitter.com/share?url=http://www.dadok.cz/citat-dne/&via=dadokofficial&text=<?php echo $citat_exploded[1].' - '.$citat_exploded[0]; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Sdílet na Twitteru">t</a>
	<a href="https://www.facebook.com/sharer/sharer.php?u=http://www.dadok.cz/citat-dne/&t=<?php echo $citat_exploded[1].' - '.$citat_exploded[0]; ?>&img=<?php echo $citat_exploded[1].' - '.$citat_exploded[0]; ?>"
   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
   target="_blank" title="Sdílet na FaceBooku">f</a>
</a>
</div>
<?php } ?>

<?php
//<a href="https://twitter.com/share?url=URLENCODED_URL&via=TWITTER_HANDLE&text=TEXT"
// onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
// target="_blank" title="Share on Twitter">
// </a>
echo "


<blockquote style='width: 80%; margin: 10px auto 0 auto; line-height: 180%; font-weight: none !important; font-size: 180%; margin-bottom: 15px;'>„".$citat_exploded[1]."“</blockquote>
<div class='animated bounceIn' style='width:90px; height:90px; border-radius: 90px; background: url(".$imgname_path."); background-size: 90px auto; float:; margin: 0 auto 10px auto; padding: auto;'></div>
<p style='width: 80%; margin: 0 auto -10px auto;'>".$citat_exploded[0]."</p>

</div>
</div>
</div>
</div>

";


}

}}



function embedYoutube($text)
{
    $search = '~
        # Match non-linked youtube URL in the wild. (Rev:20130823)
        (?:https?://)?    # Optional scheme.
        (?:[0-9A-Z-]+\.)? # Optional subdomain.
        (?:               # Group host alternatives.
          youtu\.be/      # Either youtu.be,
        | youtube         # or youtube.com or
          (?:-nocookie)?  # youtube-nocookie.com
          \.com           # followed by
          \S*             # Allow anything up to VIDEO_ID,
          [^\w\s-]        # but char before ID is non-ID char.
        )                 # End host alternatives.
        ([\w-]{11})       # $1: VIDEO_ID is exactly 11 chars.
        (?=[^\w-]|$)      # Assert next char is non-ID or EOS.
        (?!               # Assert URL is not pre-linked.
          [?=&+%\w.-]*    # Allow URL (query) remainder.
          (?:             # Group pre-linked alternatives.
            [\'"][^<>]*>  # Either inside a start tag,
          | </a>          # or inside <a> element text contents.
          )               # End recognized pre-linked alts.
        )                 # End negative lookahead assertion.
        [?=&+%\w.-]*      # Consume any URL (query) remainder.
        ~ix';

    $replace = '
    <iframe width="560" height="315" src="https://www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe>';

    return preg_replace($search, $replace, $text);
}

