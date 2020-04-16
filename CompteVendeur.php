<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>EbayECE : Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="index1.css">
</head>

<body>
<div id="header"> 
	<h1>Bonjour <?php echo $_SESSION['PseudoVendeur']; ?></h1>

	<div id="btn-group">
		<a href="PageAccueil.html"><input type="button" value="Accueil" class="button"></a>
		<input type="button" value="Catégories" class="button">
		<input type="button" value="Vendre" class="button">
		<a href="CompteVendeur.php"><input type="button" value="MonCompte" class="button"></a>
		<input type="button" value="Admin" class="button">
	</div>

</div>
<br>
<div id="section2">
	<p>ID : <?php echo $_SESSION['IDVendeur'] ?> <br>
	Pseudo: <?php echo $_SESSION['PseudoVendeur']; ?> <br>
	Email: <?php echo $_SESSION['EmailVendeur']; ?>  <br>
	Nom:  <?php echo $_SESSION['NomVendeur']; ?> <br>
	Photo: <?php echo $_SESSION['PhotoVendeur']; ?> <br>
	Image : <?php echo $_SESSION['ImageVendeur']; ?></p>
</div>

	<footer class="page-footer">
		
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12">
				<h6 class="text-up">Contact</h6>
				<p>
					37, quai de Grenelle, 75015 Paris, France <br>
					info@ebay.ece.fr <br>
					+33 01 02 03 04 05 <br>
					+33 01 03 02 05 04
				</p>
			</div>
		</div>

		<div class="footer-copyright text-center">
			&copy; 2020 Copyright | Droit d'auteur: Tim et Dany
			<a href="mailto:dany.tadrous.edu.ece.fr">dany.tadrous@edu.ece.fr</a>

		</div>
	</footer>


</body>
</html>