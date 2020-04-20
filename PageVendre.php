<?php
session_start();
try {
	$bdd = new PDO('mysql:host=localhost;dbname=projetpiscineweb;charset=utf8', 'root', 'root');
}
catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
}
if ($_POST['ajoutitem']) {
	$NomItem = ($_POST['nom']);
	$PrixItem = ($_POST['prix']);
	$DescItem = ($_POST['desc']);
	$TypeCateg = ($_POST['typecat']);
	$Photo1Item = ($_POST['photo1']);
	$Photo2Item = ($_POST['photo2']);

	$Check = ($_POST['checkbox']);

	if (!empty($NomItem) AND !empty($PrixItem) AND !empty($DescItem) AND !empty($Photo1Item)) {
		$reqadditem = $bdd->prepare("INSERT INTO item VALUES( NULL, '$NomItem', '$Photo1Item', '$Photo2Item', '$VideoItem', '$DescItem', '$PrixItem', '$Photo3Item', '$TypeCateg', '$Check','".$_SESSION['NomVendeur']."')");
		$reqadditem->execute();
		$reqadditem->closeCursor();
	}else {
		$Erreur = "Tous les champs doivent être complétés !";
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>EbayECE : Vendre</title>


	<!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

	<!-- MAKE A LINK WITH THE CSS TO CUSTOME IT -->
	<link href="vendre.css" rel="stylesheet">

	<!-- SCROLLBAR CUSTOM CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

	<!-- Font Awesome JS = AUSSI POUR LES PETITS TRAIT A COTE DE SIDEBAR-->
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

	<!-- LIEN CSS POUR AVOIR LES ICONES TELECHARGÉES DEPUIS ICOMOON -->
	<link href="style.css" rel="stylesheet">

	<!-- POUR DU JQUERY -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>

	<!-- BOUTON CHECKBOX -->
	<script type="text/javascript">

		function check(){
			if ( $('input[id=encheres]').is(':checked') && $('input[id=offre]').is(':checked') || $('input[id=encheres]').is(':checked') && $('input[id=now]').is(':checked') ) {

				alert("Veuillez bien suivre les instructions, Merci.");
				$("input[id=encheres]").prop("checked", false);
				$("input[id=offre]").prop("checked", false);
				$("input[id=now]").prop("checked", false);


			}
		}

	</script>


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
							<a href="#">Ferrailes ou Trésor</a>
						</li>
						<li>
							<a href="#">Bon pour le musée</a>
						</li>
						<li>
							<a href="#">Accesoire VIP</a>
						</li>

					</ul>
				</li>

				<li>
					<!-- aria expanded pour definir l'etat du menu deroullant false = derme par exemple -->
					<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Achat</a>
					<ul class="collapse list-unstyled" id="pageSubmenu">
						<li>
							<a href="#">Enchéresr</a>
						</li>
						<li>
							<a href="#">Achetez le maintenant</a>
						</li>
						<li>
							<a href="#">Meilleure offre</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="PageVendre.php">Vendre</a>
				</li>

				<li>
					<a href="CompteVendeur.php" class = "icon-user">VotreCompte</a>
				</li>

				<li>
					<a href="#" class = "icon-cart">Panier</a>
				</li>

				<li>
					<a href="AdminLogin.php" class = "icon-user">Admin</a>
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
								<h6 class="m-0 font-weight-bold text-primary">Bonjour <?php echo $_SESSION['NomVendeur']; ?> Ajoutez Un Produit </h6>
							</div>
							<div class="card-body">
								<form action="PageVendre.php" method="post">
									<table>

										<tr>
											<td>Nom : </td>
											<td> 
												<input type="text" class="form-control" name="nom" >
											</td>

											<td>Prix : (en €)</td>
											<td> 
												<input type="number" class="form-control" name="prix" >
											</td>
										</tr>


										<tr>
											<td>Description : </td>
											<td> 
												<textarea type="text" class="form-control-desc" name="desc"> </textarea>
											</td>

											<td>Categorie : </td>
											<td> 
												<select name="typecat">
													<option> Ferraille ou Trésor
														<option> Bon pour le musée
															<option> Accessoire VIP
															</select>
														</td>
													</tr>



													<tr>
														<td>Photo 1 : </td>
														<td> 
															<input type="file" name="photo1" accept="image/png, image/jpeg">
														</td>
														<td>Methode d'achat : </td>
														<td>
															<input type="checkbox" id="encheres" name="checkbox" value="Enchères" onClick="check()">1-Enchères
															<input type="checkbox" id="offre" name="checkbox" value="MeilleureOffre" onClick="check()">2-Meilleure Offre
															<input type="checkbox" id="now" name="checkbox" value="AcheterMaintenant" onClick="check()">3-Achetez-le Maintenant
														</td>
													</tr>

													<tr>
														<td>Photo 2 : </td>
														<td> 
															<input type="file" name="photo2" accept="image/png, image/jpeg">
														</td>
														<td>
															Seul le duo 2 et 3 est autorisé
														</td>
													</tr>

													<tr>
														<td colspan="4" align="center">
															<input type="submit" name="ajoutitem" class="btn btn-ajout tex" value="AJOUTER">
														</td>
													</tr> 

													<br>
													<?php
													if (isset($Erreur)) {
														echo '<font color="red">'.$Erreur.'</font>';
													}
													?>

												</table>
											</form>

										</div>
									</div>



								</div>
							</div>


						</div>










						<div class="container-fluid">

							<div class="rowA">

								<div class="col-lg-6">

									<div class="card shadow mb-4">
										<div class="card-header py-3">
											<h6 class="m-0 font-weight-bold text-primary">Bonjour <?php echo $_SESSION['NomVendeur']; ?> Offres d'achat </h6>
										</div>
										<div class="card-body">
											
											<a href="ChatOffreVend.php"> <input type="submit" name="offre" class="btn btn-primary" value="VOS OFFRES REÇU"> </a>

										</div>
									</div>
								</div>
							</div>
						</div>


















						<div class="container-fluid">

							<div class="rowA">

								<div class="col-lg-6">

									<div class="card shadow mb-4">
										<div class="card-header py-3">
											<h6 class="m-0 font-weight-bold text-primary">Bonjour <?php echo $_SESSION['NomVendeur']; ?> Supprimez Un Produit</h6>
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


											$reqselcitem = $bdd->prepare('SELECT IDItem, NomItem, Photo1Item, Photo2Item, VideoItem, DescriptionItem, PrixItem, Photo3Item, CategorieItem, TypeVenteItem, NomVendeur FROM item WHERE NomVendeur = "'.$_SESSION['NomVendeur'].'" ');

											$reqselcitem->execute();

											?>

											<div id="GroupeAch"> 
												<?php

												while ($data = $reqselcitem->fetch()) {
													echo '<li><p id="nom">'.$data['NomItem'].'&emsp;'.$data['Photo1Item'].'&emsp;'.$data['Photo2Item'].'&emsp;'.$data['VideoItem'].'</p>'.'<p id="DescItem">'.$data['DescriptionItem'].'&emsp;'.$data['PrixItem'].'€</p>'.'<p id="Photo3Item">'.$data['Photo3Item'].'</p>'.'<p id="CategItem">'.$data['CategorieItem'].'&emsp;'.$data['TypeVenteItem'].'</p></li>';


								// while ($data = $reqselcitem->fetch()) {
								// echo '<li><p id="nom">'.$data['NomItem'].'</p>'.'<p id="Photo1Item">'.$data['Photo1Item'].'</p>'.'<p id="Photo2Item">'.$data['Photo2Item'].'</p>'.'<p id="VideoItem">'.$data['VideoItem'].'</p>'.'<p id="DescItem">'.$data['DescriptionItem'].'</p>'.'<p id="PrixItem">'.$data['PrixItem'].'€</p>'.'<p id="Photo3Item">'.$data['Photo3Item'].'</p>'.'<p id="CategItem">'.$data['CategorieItem'].'</p>'.'<p id="TypeVenteItem">'.$data['TypeVenteItem'].'</p></li>';


													echo '<form method="post" action="PageVendre.php">'.
													'<input type="hidden" name="IDItem" value='.$data['IDItem'].'>'.
													'<input type="submit" value="SUPPRIMER" class="btn btn-supp" onClick="history.go(0)">'.
													'</form>';

												}


												?>
											</div>

											<?php
											$reqselcitem->closeCursor();

											$reqsuppitem = $bdd->prepare('DELETE FROM item WHERE IDItem="'.$_POST['IDItem'].'"');
											$reqsuppitem-> execute();
											$reqsuppitem-> closeCursor();

											?>


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