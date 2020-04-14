<?php

session_start();
//récupérer les données venant du formulaire
$login = isset($_POST["Login"])? $_POST["Login"] : "";
$MDP = isset($_POST["MDP"])? $_POST["MDP"] : "";
$type = isset($_POST["type"])? $_POST["type"] : "";

//identifier votre BDD
$database = "projetpiscineweb";

//connectez-vous à votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
 

// Bouton Connexion


if (isset($_POST['button2'])) {

	if ($db_found) {

		//Si acheteur


		if ($type=="Acheteur") {

			$sql = "SELECT * FROM acheteur";
		if ($login != "") {
			$sql .= " WHERE EmailAcheteur LIKE '$login'";
			if ($MDP != "") {
				$sql .= " AND MDPAcheteur LIKE '$MDP'";
			}
		}
	$result = mysqli_query($db_handle, $sql);
//regarder s'il y a de résultat
	if (mysqli_num_rows($result) == 0) {
		echo "Acheteur not found";
	} else {
		while ($data = mysqli_fetch_assoc($result)) {

		$_SESSION['IDAcheteur']=$data['IDAcheteur'];
		$_SESSION['NomAcheteur']=$data['NomAcheteur'];
		$_SESSION['PrenomAcheteur']=$data['PrenomAcheteur'];
		$_SESSION['EmailAcheteur']=$data['EmailAcheteur'];

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
	<h1>Bonjour <?php echo $_SESSION['PrenomAcheteur']; ?></h1>

	<div id="btn-group">
		<a href="PageAccueil.html"><input type="button" value="Accueil" class="button"></a>
		<input type="button" value="Catégories" class="button">
		<input type="button" value="Achat" class="button">
		<input type="button" value="MonCompte" class="button">
		<input type="button" value="Admin" class="button">
	</div>

</div>
<br>
<div id="section2">
	<p>Bienvenue sur votre compte ! Je vous laisse profiter du site. Bons achats à vous </p>
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


		<?php
			}
		}
		}

//Si vendeur 


		if ($type=="Vendeur") {
			$sql = "SELECT * FROM vendeur";
		if ($login != "") {
			$sql .= " WHERE EmailVendeur LIKE '$login'";
			if ($MDP != "") {
				$sql .= " AND PseudoVendeur LIKE '$MDP'";
			}
		}
	$result = mysqli_query($db_handle, $sql);
//regarder s'il y a de résultat
	if (mysqli_num_rows($result) == 0) {
		echo "Vendeur not found";
	} else {
		while ($data = mysqli_fetch_assoc($result)) {
		$_SESSION['IDVendeur']=$data['IDVendeur'];
		$_SESSION['NomVendeur']=$data['NomVendeur'];
		$_SESSION['PseudoVendeur']=$data['PseudoVendeur'];
		$_SESSION['EmailVendeur']=$data['EmailVendeur'];
		$_SESSION['PhotoVendeur']=$data['PhotoVendeur'];
		$_SESSION['ImageVendeur']=$data['ImageVendeur'];

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
	<p>Bienvenue sur votre compte ! Je vous laisse profiter du site. Bons achats à vous </p>
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


		<?php

			}
		}
		}
		
	} else {
		echo "Database not found";
	}
}


?>