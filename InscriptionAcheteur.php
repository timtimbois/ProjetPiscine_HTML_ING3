<?php

$NomAcheteur = isset($_POST["NomAcheteur"])? $_POST["NomAcheteur"] : "";
$PrenomAcheteur = isset($_POST["PrenomAcheteur"])? $_POST["PrenomAcheteur"] : "";
$EmailAcheteur = isset($_POST["EmailAcheteur"])? $_POST["EmailAcheteur"] : "";
$MDPAcheteur = isset($_POST["MDPAcheteur"])? $_POST["MDPAcheteur"] : "";
$AdresseLigne1Acheteur = isset($_POST["AdresseLigne1Acheteur"])? $_POST["AdresseLigne1Acheteur"] : "";
$AdresseLigne2Acheteur = isset($_POST["AdresseLigne2Acheteur"])? $_POST["AdresseLigne2Acheteur"] : "";
$VilleAcheteur = isset($_POST["VilleAcheteur"])? $_POST["VilleAcheteur"] : "";
$CodePostalAcheteur = isset($_POST["CodePostalAcheteur"])? $_POST["CodePostalAcheteur"] : "";
$PaysAcheteur = isset($_POST["PaysAcheteur"])? $_POST["PaysAcheteur"] : "";
$NumAcheteur = isset($_POST["NumAcheteur"])? $_POST["NumAcheteur"] : "";
$TypeCarteAcheteur = isset($_POST["TypeCarteAcheteur"])? $_POST["TypeCarteAcheteur"] : "";
$NumCarteAcheteur = isset($_POST["NumCarteAcheteur"])? $_POST["NumCarteAcheteur"] : "";
$NomCarteAcheteur = isset($_POST["NomCarteAcheteur"])? $_POST["NomCarteAcheteur"] : "";
$DatedExpAcheteur = isset($_POST["DatedExpAcheteur"])? $_POST["DatedExpAcheteur"] : "";
$CodeSecuAcheteur = isset($_POST["CodeSecuAcheteur"])? $_POST["CodeSecuAcheteur"] : "";

//identifier votre BDD
$database = "projetpiscineweb";

//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$erreur = "";

if ($NomAcheteur == "") {$erreur .= "Le champ Nom est vide. <br>";}
if ($PrenomAcheteur == "") {$erreur .= "Le champ Prenom est vide. <br>";}
if ($EmailAcheteur == "") {$erreur .= "Le champ Email est vide. <br>";}
if ($MDPAcheteur == "") {$erreur .= "Le champ Mot de passe est vide. <br>";}
if ($AdresseLigne1Acheteur == "") {$erreur .= "Le champ Adresse Ligne 1 est vide. <br>";}
if ($AdresseLigne2Acheteur == "") {$erreur .= "Le champ Adresse Ligne 2 est vide. <br>";}
if ($VilleAcheteur == "") {$erreur .= "Le champ Ville est vide. <br>";}
if ($CodePostalAcheteur == "") {$erreur .= "Le champ Code Postal est vide. <br>";}
if ($PaysAcheteur == "") {$erreur .= "Le champ Pays est vide. <br>";}
if ($NumAcheteur == "") {$erreur .= "Le champ Numéro est vide. <br>";}
if ($TypeCarteAcheteur == "") {$erreur .= "Le champ Type de carte est vide. <br>";}
if ($NumCarteAcheteur == "") {$erreur .= "Le champ Numero de carte est vide. <br>";}
if ($NomCarteAcheteur == "") {$erreur .= "Le champ Nom de la carte est vide. <br>";}
if ($DatedExpAcheteur == "") {$erreur .= "Le champ Date d'expiration est vide. <br>";}
if ($CodeSecuAcheteur == "") {$erreur .= "Le champ Code de securite est vide. <br>";}


if ($erreur=="") {

if (isset($_POST['button'])) {
if ($db_found) {
$sql = "SELECT * FROM acheteur";
if ($EmailAcheteur != "") {
$sql .= " WHERE EmailAcheteur LIKE '$EmailAcheteur'";
if ($MDPAcheteur != "") {
$sql .= " AND MDPAcheteur LIKE '$MDPAcheteur'";
}
}
$result = mysqli_query($db_handle, $sql);
if (mysqli_num_rows($result) != 0) {
echo "Email and MDP already exists. Duplicate not allowed.";
} else {
$sql = "INSERT INTO acheteur(NomAcheteur, PrenomAcheteur, EmailAcheteur, MDPAcheteur, AdresseLigne1Acheteur, AdresseLigne2Acheteur, VilleAcheteur, CodePostalAcheteur, PaysAcheteur, NumAcheteur, TypeCarteAcheteur, NumCarteAcheteur, NomCarteAcheteur, DatedExpAcheteur, CodeSecuAcheteur)
 VALUES('$NomAcheteur', '$PrenomAcheteur', '$EmailAcheteur', '$MDPAcheteur'? '$AdresseLigne1Acheteur', '$AdresseLigne2Acheteur', '$VilleAcheteur', '$CodePostalAcheteur', '$PaysAcheteur', '$NumAcheteur', '$TypeCarteAcheteur', '$NumCarteAcheteur', '$NomCarteAcheteur', '$DatedExpAcheteur', '$CodeSecuAcheteur')";
$result = mysqli_query($db_handle, $sql);
echo "Add successful. <br>";
}
} else {
echo "Database not found";
}
}
}else{
	echo "Erreur : $erreur";
}
?>