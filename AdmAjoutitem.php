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
		$reqadditem = $bdd->prepare("INSERT INTO item VALUES( NULL, '$NomItem', '$Photo1Item', '$Photo2Item', '$VideoItem', '$DescItem', '$PrixItem', '$Photo3Item', '$TypeCateg', '$Check', 'Admin')");
		$reqadditem->execute();
		$reqadditem->closeCursor();
	}else {
		$Erreur = "Tous les champs doivent être complétés !";
	}

// $Target = "Applications/MAMP/htdocs/ProjetWeb";
// $UploadedFile = $Target.basename($_FILES['photo1']['name']);
// if (move_uploaded_file($_FILES['photo1']['tmp_name'], $UploadedFile)) {
//  echo "File valid ans uploaded";
//  }else {echo "FAILED";}



}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>EbayECE : Admin</title>


	<!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

	<!-- MAKE A LINK WITH THE CSS TO CUSTOME IT -->
	<link href="AdminLogin.css" rel="stylesheet">

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

<!-- getElementById('encheres') && getElementById('offre') || getElementById('encheres') && getElementById('now') || getElementById('encheres') && getElementById('offre') && getElementById('now'))
-->

</head>

<body >

	<!-- SIDEBAR -->
	<div class="wrapper">

		<!-- Sidebar -->
		<nav id="sidebar">
			<div class="sidebar-header">
				<h3>HELLO ADMIN</h3>
			</div>

			<ul class="list-unstyled components">
				<p>Catégories</p>
				<li class="active">
					<!-- data toggle = collaps c'est pour drop down menu et la class pour ajouter le petit triangle a cote -->
					<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Vendeurs</a>
					<ul class="collapse list-unstyled" id="homeSubmenu">
						<li>
							<a href="MenuAjoutVend.php" class = "icon-plus"> Ajouter</a>
						</li>
						<li>
							<a href="MenuSuppVend.php" class = "icon-bin"> Supprimer</a>
						</li>

					</ul>
				</li>
				<li>
					<a href="SidebarAcheteur.php">Acheteurs</a>
				</li>
				<li>
					<!-- aria expanded pour definir l'etat du menu deroullant false = derme par exemple -->
					<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Produits</a>
					<ul class="collapse list-unstyled" id="pageSubmenu">
						<li>
							<a href="AdmAjoutitem.php" class = "icon-plus"> Ajouter</a>
						</li>
						<li>
							<a href="AdmSuppitem.php" class = "icon-bin"> Supprimer</a>
						</li>
					</ul>
				</li>

			</ul>

			<ul class="list-unstyled CTAs">
				<li>
					<a href="deconnexionAdmin.php" class="logout">Log Out</a>
				</li>
				<li>
					<a href="PageAccueil.php" class="backhome">Back to EbayECE</a>
				</li>
			</ul>

		</nav>














		<!-- Page Content -->
		<div id="content">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">

					<button type="button" id="sidebarCollapse" class="btn btn-info">
						<i class="fas fa-align-left"></i>
						<span>Sidebar</span>
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
								<h6 class="m-0 font-weight-bold text-primary">Ajouter un produit</h6>
							</div>
							<div class="card-body">

								<form action="AdmAjoutitem.php" method="post" >
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