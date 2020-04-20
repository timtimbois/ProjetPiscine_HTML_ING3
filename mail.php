<?php
session_start();

$longueur = 4;
$num = "";
for ($i=1; $i < $longueur; $i++) { 
	$num .= mt_rand(0,9);
}

$header="MIME-Version: 1.0\r\n";
$header.='From:"EbayECE"<projetpiscineweb2020@gmail.com>'."\n";
$header.='Content-Type:text/html; charset="utf-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit'; 

$message='
<!DOCTYPE html>
<html>
<head>
	<link href="index1.css" rel="stylesheet">
</head>
<body>
	<div align="center">
		<h1>EbayECE</h1>
		<h1>'.$_SESSION['PrenomAcheteur'].', Merci de votre confiance.</h1>

		<br />
		Un achat à été effectué depuis votre compte. '.$_SESSION['PrixTotal'].'€ seront prelevé de votre compte bancaire.
		<br />
		Votre commande '.$num.' a bien été enregistrée.
		<br>
		<br>
		Livraison de votre commande sous 3 jours ouvrés, le livreur passera entre 9h00 et 12h00.  
		<br>
		<br>
		<br>
		Votre commande sera expediée à : '.$_SESSION['PrenomAcheteur'].' '.$_SESSION['NomAcheteur'].' au '.$_SESSION['AdresseLigne1Acheteur'].', '.$_SESSION['AdresseLigne2Acheteur'].'. '.$_SESSION['VilleAcheteur'].', '.$_SESSION['CodePostalAcheteur'].'.
		<br>
		<br>
		<br>
		<br>
		<br>
		En espérant vous revoir trés vite.
		<a href="http://localhost:8888/ProjetWeb/PageAccueil.php"><button class="btn btn-primary"> EbayECE </button></a>

		<br>
		<br>
		<br>

		<img src="https://media.giphy.com/media/14thJ0mmBPOtRS/giphy.gif" alt="this box moves"  width=250/>

	</div>
</body>
</html>';

mail($_SESSION['EmailAcheteur'], "Confirmation de votre commande ", $message, $header);
?>
