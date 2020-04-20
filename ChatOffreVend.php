<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>EbayECE : Chat Vendeur</title>


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

	<!-- LIEN CSS DU CHAT POUR LES OFFRES -->
	<link href="chat.css" rel="stylesheet">

	<!-- DESACTIVER LA TOUCHE ENTRÉE DANS TOUTE CETTE PAGE -->
	<Script> 
		function desactiveEnter(){ 
			if (event.keyCode == 13) { 
				event.keyCode = 0; 
				window.event.returnValue = false; 
			} 
		} 
	</Script> 



</head>

<body onKeyDown='desactiveEnter()'>

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
					<a href="CompteVendeur.php" class = "icon-user"> VotreCompte</a>
				</li>

				<li>
					<a href="#" class = "icon-cart"> Panier</a>
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
								<h6 class="m-0 font-weight-bold text-primary">Bonjour <?php echo $_SESSION['NomVendeur']; ?> </h6>
							</div>
							<div class="card-body">
								<p>Offres Reçu</p>

								<header>
									<h1>Chat avec des acheteurs !</h1>
								</header>

								<section class="chat">
									<div class="messages">

									</div>
									<div class="user-inputs">
										<form action="ChatOffreVend.php?task=write" method="POST">
											<input type="null" name="author" id="author"class = "form-control" value="<?php echo $_SESSION['NomVendeur']; ?>" readonly >
											<select id="contentt" name="contentt">
												<option>OUI<?php echo $_SESSION['PrenomAcheteur']; ?><?php echo $_SESSION['IDItem']; ?>
												<option>NON<?php echo $_SESSION['PrenomAcheteur']; ?><?php echo $_SESSION['IDItem']; ?>
											</select>
											<br>

											<?php 
											
											for($compt = 1; $compt<6; $compt++)
											{
												?>
												
												<button type="submit" class="btn btn-primary" onClick = "this.style.visibility= 'hidden';"> 💬 Reponse : <?php echo $compt; ?></button>
												

												<?php
												
											} 
											?>
											
										</form>
									</div>
									
								</section>

								<script type="text/javascript">
									
									author = "<?php echo $_SESSION['NomVendeur'];?>";

									function getMessages(){
						  // La fonction doit créer une requête AJAX pour se connecter au serveur et au fichier ChatOffrePHP.php
						  const requeteAjax = new XMLHttpRequest();
						  requeteAjax.open("GET", "ChatOffreVendPHP.php");

						  // Quand la fonction reçoit les données, il faut qu'elle les traite affiche ces données au format HTML
						  requeteAjax.onload = function(){
						  	const resultat = JSON.parse(requeteAjax.responseText);
						  	const html = resultat.reverse().map(function(message){
						  		return `
						  		<div class="message">
						  		<span class="date">${message.created_at.substring(11, 16)}</span>
						  		<span class="author">${message.author}</span> : 
						  		<span class="contentt">${message.contentt}</span>
						  		</div>
						  		`
						  	}).join('');

						  	const messages = document.querySelector('.messages');

						  	messages.innerHTML = html;
						  	messages.scrollTop = messages.scrollHeight;
						  }

						  // On envoie ici la requête
						  requeteAjax.send();
						}


						function postMessage(event){
						  // La fonction doit stoper le submit du formulaire
						  event.preventDefault();

						  // doit récupérer les données du formulaire, ici l'auteur sera = au prenom/nom de l'acheteur/vendeur suivi de l'id de litem 
						  const author = document.querySelector('#author');
						  const contentt = document.querySelector('#contentt');

						  // doit conditionner les données
						  const data = new FormData();
						  data.append('author', author.value);
						  data.append('contentt', contentt.value);

						  // configurer une requête ajax en POST et envoyer les données
						  const requeteAjax = new XMLHttpRequest();
						  requeteAjax.open('POST', 'ChatOffreVendPHP.php?task=write');
						  
						  requeteAjax.onload = function(){
						  	contentt.value = '';
						  	contentt.focus();
						  	getMessages();
						  }

						  requeteAjax.send(data);
						}

						document.querySelector('form').addEventListener('submit', postMessage);

						// ILLUSION DU TEMPS REEL ICI, RAFRAICHISSEMENT TOUTES LES "SECS"
						const interval = window.setInterval(getMessages, 3000);
						// POUR CHARGER LES MESSAGES DES L'ACTUALISATION DE LA PAGE SANS ATTENDRE LE TEMPS DE RAFFRAICHISSEMENT
						getMessages();
					</script>


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