<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>EbayECE : Acheter Maintenant</title>


	<!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

	<!-- MAKE A LINK WITH THE CSS TO CUSTOME IT -->
	<link href="index1.css" rel="stylesheet">

	<!-- SCROLLBAR CUSTOM CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

	<!-- Font Awesome JS = AUSSI POUR LES PETITS TRAIT A COTE DE SIDEBAR-->
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

	<!-- LIEN CSS POUR AVOIR LES ICONES TELECHARGÉES DEPUIS ICOMOON -->
	<link href="style.css" rel="stylesheet">


</head>

<body >

	<!-- SIDEBAR -->
	<div class="wrapper">

		<!-- Sidebar -->
		<nav id="sidebar">
			<div class="sidebar-header">
				<h3>Ebay ECE</h3>
			</div>

			<ul class="list-unstyled components">
				<p>Sections</p>
				<li class="active">
					<!-- data toggle = collaps c'est pour drop down menu et la class pour ajouter le petit triangle a cote -->
					<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Catégories</a>
					<ul class="collapse list-unstyled" id="homeSubmenu">
						<li>
							<a href="PageFerrailleOuTresor.php">Ferrailes ou Trésor</a>
						</li>
						<li>
							<a href="PageBonPourMusee.php">Bon pour le musée</a>
						</li>
						<li>
							<a href="PageVIP.php">Accesoire VIP</a>
						</li>

					</ul>
				</li>

				<li>
					<!-- aria expanded pour definir l'etat du menu deroullant false = derme par exemple -->
					<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Achat</a>
					<ul class="collapse list-unstyled" id="pageSubmenu">
						<li>
							<a href="PageEnchere.php">Enchéres</a>
						</li>
						<li>
							<a href="PageAcheterMaintenant.php">Achetez le maintenant</a>
						</li>
						<li>
							<a href="PageMeilleureOffre.php">Meilleure offre</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="#">Vendre</a>
				</li>

				<li>
					<a href="CompteAcheteur.php" class = "icon-user"> VotreCompte</a>
				</li>

				<li>
					<a href="#Panier.php" class = "icon-cart"> Panier</a>
				</li>

				<li>
					<a href="AdminLogin.php" class = "icon-user"> Admin</a>
				</li>
				
			</ul>

			<ul class="list-unstyled CTAs">
				
				<li>
					<a href="PageAccueil.php" class="backhome">EbayECE : Home</a>
				</li>
			</ul>

			<ul>
				<p>CONTACT<br>
					37, quai de Grenelle, 75015 Paris, France <br>
					info@ebay.ece.fr <br>
					+33 01 02 03 04 05 <br>
					+33 01 03 02 05 04
				</p>
			</ul>

		</nav>




		<!-- Page Content -->
		<div id="content">
			<!-- LA BARRE BLANCHE DU HAUT -->
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">

					<button type="button" id="sidebarCollapse" class="btn btn-info">
						<i class="fas fa-align-left"></i>
						<span>BIENVENUE CHEZ EBAY ECE</span>
					</button>

					<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fas fa-align-justify"></i>
					</button>

				</div>
			</nav>


			<div class="container-fluid">

				<div class="rowA">

					<div class="col-lg-6">

						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Voici les objets à acheter au prix fort <?php echo $_SESSION['PrenomAcheteur']; ?> </h6>
							</div>
							<div class="card-body">
								<p>NOM / PHOTO1 / PHOTO2 / VIDEO </p>
								<p>DESCRIPTION / PRIX </p>
								<p>PHOTO3 </p>
								<p>CATEGORIE / TYPEVENTE</p>
								

								<?php

								try {
									$bdd = new PDO('mysql:host=localhost;dbname=projetpiscineweb;charset=utf8', 'root', 'root');
								}
								catch (Exception $e){
									die('Erreur : ' . $e->getMessage());
								}


						//Affichage des objets AcheterMaintenant
								

								$reqselcitem = $bdd->prepare('SELECT IDItem, NomItem, Photo1Item, Photo2Item, VideoItem, DescriptionItem, PrixItem, Photo3Item, CategorieItem, TypeVenteItem FROM item WHERE TypeVenteItem LIKE "AcheterMaintenant"');

								$reqselcitem->execute();

								while ($data = $reqselcitem->fetch()) {
									echo '<li><p id="nom">'.$data['NomItem'].'&emsp;'.'<img src="'.$data['Photo1Item'].'" height="100" width="120">'.'&emsp;'.'<img src="'.$data['Photo2Item'].'" height="100" width="120">'.'&emsp;'.'<video src="'.$data['VideoItem'].'" height="100" width="120"></video>'.'</p>'.'<p id="DescItem">'.$data['DescriptionItem'].'&emsp;'.$data['PrixItem'].'€</p>'.'<p id="Photo3Item">'.'<img src="'.$data['Photo3Item'].'" height="100" width="120">'.'</p>'.'<p id="CategItem">'.$data['CategorieItem'].'&emsp;'.$data['TypeVenteItem'].'<p> Mis en vente par :'.$data['NomVendeur'].'</p>'.'</li>';


									
									echo '<form method="post" action="PageAcheterMaintenant.php">'.
									'<input type="hidden" name="IDItem" value='.$data['IDItem'].'>'.
									'<input type="hidden" name="PrixItem" value='.$data['PrixItem'].'>'.
									'<input type="hidden" name="NomItem" value='.$data['NomItem'].'>'.
									'<input type="hidden" name="Photo1Item" value='.$data['Photo1Item'].'>'.
									'<input type="submit" value="AJOUTER AU PANIER" class="btn btn-ajout tex" onClick="history.go(0)">'.
									'</form>';
									

								}


								
								
								
								$reqselcitem->closeCursor();
								$IDItem = isset($_POST["IDItem"])? $_POST["IDItem"] : "";
								$PrixItem = isset($_POST["PrixItem"])? $_POST["PrixItem"] : "";
								$NomItem = isset($_POST["NomItem"])? $_POST["NomItem"] : "";
								$Photo1Item = isset($_POST["Photo1Item"])? $_POST["Photo1Item"] : "";

								$reqajoutitem = $bdd->prepare('INSERT INTO panier(IDAcheteur, IDItem, PrixItem, NomItem, Photo1Item) VALUES('.$_SESSION['IDAcheteur'].', '.$IDItem.', '.$PrixItem.', "'.$NomItem.'", "'.$Photo1Item.'")');

								$reqajoutitem-> execute();
								$reqajoutitem-> closeCursor();

								?>
							</div>

							
						</div>
					</div>

					

				</div>
			</div>


		</div>

		<!-- Footer -->
		<footer class="sticky-footer ">
			<div class="container my-auto">
				<div class="copyright text-center my-auto">
					<span>&copy; 2020 Copyright | Droit d'auteur: Tim et Dany</span>
					<a href="mailto:dany.tadrous.edu.ece.fr">dany.tadrous@edu.ece.fr</a>

				</div>
			</div>
		</footer>
		<!-- FIN DU Footer -->


	</div>

</div>   






<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- jQuery Custom Scroller CDN = SLIDER -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
		$("#sidebar").mCustomScrollbar({
			theme: "minimal"
		});

		$('#sidebarCollapse').on('click', function () {
			$('#sidebar, #content').toggleClass('active');
			$('.collapse.in').toggleClass('in');
			$('a[aria-expanded=true]').attr('aria-expanded', 'false');
		});
	});
</script>

</body>
</html>