<?php

$header="MIME-Version: 1.0\r\n";
$header.='From:"EbayECE"<projetpiscineweb2020@gmail.com>'."\n";
$header.='Content-Type:text/html; charset="utf-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit'; 

$message='
<html>
	<body>
		<div align="center">
			
			<br />
			J\'ai envoyé ce mail avec PHP !
			Un achat à été effectué depuis votre compte.
			l\'item ID : 
			Votre numéro de transaction est :
			Voici le numéro de la transaction faite 

			Merci beaucoup de votre confiance et à trés bientôt !!
			<br />
			<a href="http://localhost:8888/ProjetWeb/PageAccueil.php">EbayECE</a>
			
		</div>
	</body>
</html>
';

mail("idanypro@gmail.com", "Confirmation de votre commande ", $message, $header);
?>
