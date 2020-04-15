<?php
session_start();
//récupérer les données venant du formulaire
$login = isset($_POST["Login"])? $_POST["Login"] : "";
$MDP = isset($_POST["MDP"])? $_POST["MDP"] : "";
$type = isset($_POST["type"])? $_POST["type"] : "";

//identifier votre BDD
$database = "projetpiscineweb";

//connectez-vous à votre BDD
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);
 
$erreur = "";

if ($login == "") {$erreur .= "Le champ E-mail est vide. <br>";}
if ($MDP == "") {$erreur .= "Le champ Mot de Passe est vide. <br>";}

// Bouton Connexion

if ($erreur == "") {
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
		$_SESSION['NomAcheteur']=$data['NomAcheteur'];
$_SESSION['PrenomAcheteur']=$data['PrenomAcheteur'];
$_SESSION['EmailAcheteur']=$data['EmailAcheteur'];
$_SESSION['MDPAcheteur']=$data['MDPAcheteur'];
$_SESSION['AdresseLigne1Acheteur']=$data['AdresseLigne1Acheteur'];
$_SESSION['AdresseLigne2Acheteur']=$data['AdresseLigne2Acheteur'];
$_SESSION['VilleAcheteur']=$data['VilleAcheteur'];
$_SESSION['CodePostalAcheteur']=$data['CodePostalAcheteur'];
$_SESSION['PaysAcheteur']=$data['PaysAcheteur'];
$_SESSION['NumAcheteur']=$data['NumAcheteur'];
$_SESSION['TypeCarteAcheteur']=$data['TypeCarteAcheteur'];
$_SESSION['NumCarteAcheteur']=$data['NumCarteAcheteur'];
$_SESSION['NomCarteAcheteur'] =$data['NomCarteAcheteur'];
$_SESSION['DatedExpAcheteur']=$data['DatedExpAcheteur'];
$_SESSION['CodeSecuAcheteur']=$data['CodeSecuAcheteur'];
header("Location : PageConnecté.php");

?>

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
		header("Location : PageConnecté.php");

		 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>EbayECE : Form</title>


	<!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

	<!-- MAKE A LINK WITH THE CSS TO CUSTOME IT -->
	<link href="index1.css" rel="stylesheet">

	<!-- SCROLLBAR CUSTOM CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

	<!-- Font Awesome JS = AUSSI POUR LES PETITS TRAIT A COTE DE SIDEBAR-->
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>


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
					<a href="#">Vendre</a>
				</li>

				<li>
					<a href="#">VotreCompte</a>
				</li>

				<li>
					<a href="#">Panier</a>
				</li>

				<li>
					<a href="AdminLogin.php">Admin</a>
				</li>
        
    </ul>

    <ul class="list-unstyled CTAs">
    	
    	<li>
    		<a href="PageAccueill.php" class="backhome">EbayECE : Home</a>
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
				<span>BIENVENUE CHEZ EBAY ECE <?php echo $_SESSION['PrenomAcheteur']; ?></span>
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
                  <h6 class="m-0 font-weight-bold text-primary">Formulaire de connexion</h6>
                </div>
                <div class="card-body">
                	<form action="PageLoginn.php" method="post">
            <table>
                <tr>
                    <td>E-mail :</td>
                    <td><input type="text" class="form-control" name="Login"></td>
                </tr>
                
                <tr>
                    <td>Mot de passe :</td>
                    <td><input type="password" class="form-control" name="MDP"></td>
                </tr>
                
                <tr>
                    <td>Type d'utilisateur :</td>
                    <td><select name="type">
                        <option>Acheteur
                        <option>Vendeur
                    </select></td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" class ="btn btn-primary"name="button2" value="Connexion">
                        
                    </td>
                </tr>
                
            </table>
        </form>
                	

                </div>
              </div>
            </div>
    </div>


    <div class="rowA">
            <div class="col-lg-6">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Formulaire d'inscription</h6>
                </div>
                <div class="card-body">
                	<p>Veuillez choisir entre vous inscrire ent tant qu'acheteur ou en tant que vendeur</p>
        <br>
        <br>
        <a href="InscriptionAcheteur.php"><button class="btn btn-primary">Acheteur</button></a>
        <br>
        <a href="InscriptionVendeur.php"><button class="btn btn-primary">Vendeur</button></a>
                	

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


<?php

			}
		}
		}
		
	} else {
		echo "Database not found";
	}
}
	}
else{
	echo "Erreur : $erreur";
}

?>
