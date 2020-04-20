<?php
session_start();
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projetpiscineweb;charset=utf8', 'root', 'root');
}
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}

if ($_POST['button']) {

    $NomAcheteur = ($_POST["NomAcheteur"]);
    $PrenomAcheteur = ($_POST["PrenomAcheteur"]);
    $EmailAcheteur = ($_POST["EmailAcheteur"]);
    $MDPAcheteur = ($_POST["MDPAcheteur"]);
    $AdresseLigne1Acheteur = ($_POST["AdresseLigne1Acheteur"]);
    $AdresseLigne2Acheteur = ($_POST["AdresseLigne2Acheteur"]);
    $VilleAcheteur = ($_POST["VilleAcheteur"]);
    $CodePostalAcheteur = ($_POST["CodePostalAcheteur"]);
    $PaysAcheteur = ($_POST["PaysAcheteur"]);
    $NumAcheteur = ($_POST["NumAcheteur"]);
    $TypeCarteAcheteur = ($_POST["TypeCarteAcheteur"]);
    $NumCarteAcheteur = ($_POST["NumCarteAcheteur"]);
    $NomCarteAcheteur = ($_POST["NomCarteAcheteur"]);
    $DatedExpAcheteur = ($_POST["DatedExpAcheteur"]);
    $CodeSecuAcheteur = ($_POST["CodeSecuAcheteur"]);
    $TypeCarteAchRadio = ($_POST["radio"]);




    if (!empty($NomAcheteur) AND !empty($PrenomAcheteur) AND !empty($EmailAcheteur) AND !empty($MDPAcheteur) AND !empty($AdresseLigne1Acheteur) AND !empty($VilleAcheteur) AND !empty($CodePostalAcheteur) AND !empty($PaysAcheteur) AND !empty($NumAcheteur) AND !empty($TypeCarteAchRadio) AND !empty($NumCarteAcheteur) AND !empty($NomCarteAcheteur) AND !empty($DatedExpAcheteur) AND !empty($CodeSecuAcheteur)) {

        $reqach = $bdd->prepare('SELECT * FROM acheteur where EmailAcheteur = ? ');
        $reqach->execute(array($EmailAcheteur));

        $AchExist = $reqach->rowCount();


        if ($AchExist == 0) {
            $reqaddach = $bdd->prepare("INSERT INTO acheteur VALUES( NULL,'$NomAcheteur', '$PrenomAcheteur', '$EmailAcheteur', '$MDPAcheteur', '$AdresseLigne1Acheteur', '$AdresseLigne2Acheteur', '$VilleAcheteur', '$CodePostalAcheteur', '$PaysAcheteur', '$NumAcheteur', '$TypeCarteAchRadio', '$NumCarteAcheteur', '$NomCarteAcheteur', '$DatedExpAcheteur', '$CodeSecuAcheteur')");
            $reqaddach->execute();
            $reqaddach->closeCursor();
            header("Location:PageLoginn.php");

        }else {
            $Erreur = "Adresse mail déjà utilisée";
        }


    }else {
        $Erreur = "Tous les champs doivent être complétés !";
    }



    $Erreur = "";

    if ($NomAcheteur == "") {$Erreur .= "Le champ Nom est vide. <br>";}
    if ($PrenomAcheteur == "") {$Erreur .= "Le champ Prenom est vide. <br>";}
    if ($EmailAcheteur == "") {$Erreur .= "Le champ Email est vide. <br>";}
    if ($MDPAcheteur == "") {$Erreur .= "Le champ Mot de passe est vide. <br>";}
    if ($AdresseLigne1Acheteur == "") {$Erreur .= "Le champ Adresse Ligne 1 est vide. <br>";}

    if ($VilleAcheteur == "") {$Erreur .= "Le champ Ville est vide. <br>";}
    if ($CodePostalAcheteur == "") {$Erreur .= "Le champ Code Postal est vide. <br>";}
    if ($PaysAcheteur == "") {$Erreur .= "Le champ Pays est vide. <br>";}
    if ($NumAcheteur == "") {$Erreur .= "Le champ Numéro est vide. <br>";}
// if ($TypeCarteAcheteur == "") {$Erreur .= "Le champ Type de carte est vide. <br>";}
    if ($NumCarteAcheteur == "") {$Erreur .= "Le champ Numero de carte est vide. <br>";}
    if ($NomCarteAcheteur == "") {$Erreur .= "Le champ Nom de la carte est vide. <br>";}
    if ($DatedExpAcheteur == "") {$Erreur .= "Le champ Date d'expiration est vide. <br>";}
    if ($CodeSecuAcheteur == "") {$Erreur .= "Le champ Code de securite est vide. <br>";}

    if ($TypeCarteAchRadio == "") {$Erreur .= "Le champ Type de carte est vide. <br>";}




}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>EbayECE : Inscription</title>


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


    <!-- POUR DU JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>

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
                    <a href="#" class = "icon-user"> VotreCompte</a>
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
                      <h6 class="m-0 font-weight-bold text-primary">Inscription Acheteur</h6>
                  </div>
                  <div class="card-body">
                    <form action="InscriptionAcheteur.php" method="post">
                        <table>
                            
                            <tr>
                                <td>Nom :</td>
                                <td><input type="text" class="form-control" name="NomAcheteur" value="<?php if($NomAcheteur){echo $NomAcheteur;}?>"></td>
                            </tr>

                            <tr>
                                <td>Prenom :</td>
                                <td><input type="text" class="form-control" name="PrenomAcheteur" value="<?php if($PrenomAcheteur){echo $PrenomAcheteur;}?>"></td>
                            </tr>
                            
                            <tr>
                                <td>Email :</td>
                                <td><input type="email" class="form-control" name="EmailAcheteur"></td>
                            </tr>

                            <tr>
                                <td>Mot de passe :</td>
                                <td><input type="password" class="form-control" name="MDPAcheteur"></td>
                            </tr>
                            
                            <tr>
                                <td>Numero de la rue :</td>
                                <td><input type="int" class="form-control" name="AdresseLigne1Acheteur"></td>
                            </tr>

                            <tr>
                                <td>Adresse Ligne 2 :</td>
                                <td><input type="text" class="form-control" name="AdresseLigne2Acheteur"></td>
                            </tr>

                            <tr>
                                <td>Ville :</td>
                                <td><input type="text" class="form-control" name="VilleAcheteur" value="<?php if($VilleAcheteur){echo $VilleAcheteur;}?>"></td>
                            </tr>
                            
                            <tr>
                                <td>Code Postal:</td>
                                <td><input type="int" class="form-control" name="CodePostalAcheteur" value="<?php if($CodePostalAcheteur){echo $CodePostalAcheteur;}?>"></td>
                            </tr>

                            <tr>
                                <td>Pays :</td>
                                <td><input type="text" class="form-control" name="PaysAcheteur" value="<?php if($PaysAcheteur){echo $PaysAcheteur;}?>"></td>
                            </tr>
                            
                            <tr>
                                <td>Numero de tel :</td>
                                <td><input type="int" class="form-control" name="NumAcheteur"></td>
                            </tr>
                            
                            <tr>
                                <td>Type de carte :</td>
                                <!-- <td><input type="text" class="form-control" name="TypeCarteAcheteur"></td> -->
                                <td>
                                    <input type="radio" name="radio" value="Mastercard">Mastercard
                                    <input type="radio" name="radio" value="Amex">Amex
                                    <input type="radio" name="radio" value="Visa">Visa
                                    <input type="radio" name="radio" value="Paypal">Paypal
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Num de carte :</td>
                                <td><input type="text" class="form-control" name="NumCarteAcheteur"></td>
                            </tr>
                            
                            <tr>
                                <td>Nom sur la Carte :</td>
                                <td><input type="text" class="form-control" name="NomCarteAcheteur"></td>

                            </tr>

                            <tr>
                                <td>Date d'expiration :</td>
                                <td><input type="date" class="form-control" name="DatedExpAcheteur" placeholder="AAAA-MM-JJ"></td>
                            </tr>
                            
                            <tr>
                                <td>Code de securite :</td>
                                <td><input type="password" class="form-control" name="CodeSecuAcheteur" placeholder="CVV"></td>
                            </tr>

                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" class="btn btn-primary" name="button" onclick="return confirm('En tant que client sur notre site, dès lors que vous faites une offre dachat vous êtes sous contrat légale pour finaliser la commande si le vendeur accepte votre offre. Acceptez-vous cette clause ?');" value="Inscription">
                                    
                                </td>
                            </tr>
                            
                        </table>
                        
                    </form>

                    <?php
                    if (isset($Erreur)) {
                      echo '<font color="red">'.$Erreur.'</font>';
                  }

                  if (isset($NotErreur)) {
                      echo '<font color="green">'.$NotErreur.'</font>';
                  }
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