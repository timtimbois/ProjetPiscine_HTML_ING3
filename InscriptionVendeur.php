<?php

$PseudoVendeur = isset($_POST["PseudoVendeur"])? $_POST["PseudoVendeur"] : "";
$EmailVendeur = isset($_POST["EmailVendeur"])? $_POST["EmailVendeur"] : "";
$NomVendeur = isset($_POST["NomVendeur"])? $_POST["NomVendeur"] : "";
$ImageVendeur = isset($_POST["ImageVendeur"])? $_POST["ImageVendeur"] : "";
$PhotoVendeur = isset($_POST["PhotoVendeur"])? $_POST["PhotoVendeur"] : "";

//identifier votre BDD
$database = "projetpiscineweb";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$erreur = "";

if ($PseudoVendeur == "") {$erreur .= "Le champ Pseudo est vide. <br>";}
if ($EmailVendeur == "") {$erreur .= "Le champ Email est vide. <br>";}
if ($NomVendeur == "") {$erreur .= "Le champ Nom est vide. <br>";}
if ($ImageVendeur == "") {$erreur .= "Le champ Image est vide. <br>";}
if ($PhotoVendeur == "") {$erreur .= "Le champ Photo est vide. <br>";}

if ($erreur=="") {

if (isset($_POST['button'])) {
	echo "$PseudoVendeur";
if ($db_found) {
$sql = "SELECT * FROM vendeur";
if ($EmailVendeur != "") {
$sql .= " WHERE EmailVendeur LIKE '$EmailVendeur'";
if ($PseudoVendeur != "") {
$sql .= " AND PseudoVendeur LIKE '$PseudoVendeur'";
}
}
$result = mysqli_query($db_handle, $sql);
if (mysqli_num_rows($result) != 0) {
echo "Email and Pseudo already exists. Duplicate not allowed.";
} else {
$sql = "INSERT INTO vendeur(PseudoVendeur, EmailVendeur, NomVendeur, PhotoVendeur, ImageVendeur)
 VALUES ('$PseudoVendeur', '$EmailVendeur', '$NomVendeur', '$PhotoVendeur', '$ImageVendeur')";
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