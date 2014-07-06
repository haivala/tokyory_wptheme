<?php
/**
 * The template for displaying ruokalistat from lounasaika.net.
 * Ei mikään paras systeemi.
Template Name: Lounasaika.net
 */
?>

<?php
function HaeRuokalistat () {
			$arabia = False;
			$today = getdate();
			$now = ($today["wday"]-1);
			$handle = fopen("http://www.lounasaika.net/api/v1/menus.json", "r");
			$string = stream_get_contents($handle);
			$json_a=json_decode($string,true);
			foreach($json_a as $key => $value) {
			    if (gettype($value) == "array") {
			        foreach ($value as $key => $value) {
					if ((($key=="name") && ($value=="Kipsari")) || (($key=="name") && ($value=="Meccala")) || (($key=="name") && ($value=="Ravintola Arabianranta"))){
						#echo  $key. ':' . $value . " taso1. </br>";
						$ravintola = $value;
						$arabia = True;
					}
				if ($arabia == True) {
					if ($key == "open") {
					$aukiolo = $value;
					}
				        foreach ($value as $key => $value) {
							if(($key == "fi") && (gettype($value) == "string")){
							#echo  $key. ':' . $value . " taso2. \n";
							 _e("[:en]<h3>".$ravintola."</h3><small>".$aukiolo." </small> <a href=".$value.">Homepage</a></br>[:fi]<h3>".$ravintola."</h3><small>".$aukiolo." </small> <a href=".$value.">Kotisivut</a></br>");
							}
							
							if(qtrans_getLanguage()=='en' && $key=="en"){
								if (gettype($value) == "array" and $key=="en") { 
									foreach ($value as $key => $value) {
											#echo  $key . ':' . $value . " aika oikein. \n";
										if ($key == $now){
											#echo  "<h3>".$ravintola."</h3></br>";
										    if (gettype($value) == "array") {
										        foreach ($value as $key => $value) {
								      			      _e(  "[:en]" . $value . "</br>");
											}
										    }
										}
										if ((($now == "-1") && ($key==0)) || (($now == "5") && ($key==0))){
										_e(  "[:en]Restaurant is closed today" );
										}
									}
								}

							}
							if(qtrans_getLanguage()=='fi' && $key=="fi"){
								if (gettype($value) == "array" and $key=="fi") { 
									foreach ($value as $key => $value) { 
										if ($key == $now){
											#echo  "<h3>".$ravintola."</h3></br>" .$now;
											#echo  $key . ':' . $value . " aika oikein. \n";
										    if (gettype($value) == "array") {
										        foreach ($value as $key => $value) {
								      			      _e(  "[:fi]" . $value . "</br>");
											}
										    }
										}
										if ((($now == "-1") && ($key==0)) || (($now == "5") && ($key==0))){
										_e(  "[:fi]Ravintola on tänään kiinni" );
										}
									}
								}
							}

				    	}
				 } # Arabia -> tarvitaan listat

				}
			    }
			$arabia = False;
			}
if ($ravintola) {return True;}
else {return False;}
}


get_header(); ?>
<div id="primary">
<div id="content" role="main">
        <?php  while (have_posts()) : the_post();?>
                <div class="post">
			<?php
			_e( "<h1>[:en]Lunch time[:fi]Ruokalistat</h1>" );  
			$result = HaeRuokalistat();
			if ($result == False){
			_e(  "<h2>[:fi]Ravintolat ovat kiinni[:en]Restaurants are closed</h2>" );
			} #$today = getdate(); $now = $today['wday']; echo $now; ?>
	</div>
<hr>
			<?php _e( "<small>[:en]Information is from [:fi]Ruokalistat tarjoaa "); ?><a href="http://lounasaika.net">lounasaika.net</a></small>                
        <?php endwhile; ?>
		</div><!-- #content -->
		<?php get_footer(); ?>
</div><!-- #primary -->

