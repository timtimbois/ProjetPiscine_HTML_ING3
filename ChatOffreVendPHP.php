<?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=projetpiscineweb;charset=utf8', 'root', 'root', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
 
// CE CHAT M'A ETE PERMIS PAR LE VISIONNAGE DE PLUSIERS TUTO SUR AJAX ET LA CREATION DE CHAT ET LA REALISATION DE TP SUR INTERNET 

// ANALYSE DE LA DEMANDE FAITE VIA URL (GET) POUR DETERMINER SI ON VEUT RECUP OU ECRIRE UN MESSAGE 

$task = "list";

if(array_key_exists("task", $_GET)){
  $task = $_GET['task'];
}

if($task == "write"){
  postMessage();
} else {
  getMessages();
}

// POUR RECUP FAUT ENVOYER DU JSON

function getMessages(){
  // VAR DISPO A L'EXTERIEURE DE LA FONCTION POUR POUVOIR L'UTILISER À L'INTERIEURE DE LA FONCTION
  global $db;

  //Requête la base de données pour sortir les 10 derniers messages
  $resultats = $db->query("SELECT * FROM messages ORDER BY created_at DESC LIMIT 10");
  //traite les résultats
  $messages = $resultats->fetchAll();
  //affiche les données sous forme de JSON
  echo json_encode($messages);
}

 // ECRIRE = ANALYSER LES PARAMETRES ENVOYÉS EN POST ET LES SAVE DANS LA BDD
 
function postMessage(){
  global $db;
  // 'author' = ""echo $_SESSION['PrenomAcheteur'];""
  //Analyse des paramètres passés en POST
  
  if(!array_key_exists('author', $_POST) || !array_key_exists('contentt', $_POST)){

    echo json_encode(["status" => "error", "message" => "One field or many have not been sent"]);
    return;

  }

  // $author = $_POST['author'];
  $author = $_SESSION['NomVendeur'];
  $contentt = $_POST['contentt'];


  //Requête qui permettra d'insérer ces données dans la BDD
  $query = $db->prepare('INSERT INTO messages SET author = :author, contentt = :contentt, created_at = NOW()');
  $query->execute([
    "author" => $author,
    "contentt" => $contentt
  ]);


  

  //Statut de succes ou d'erreur au format JSON
  echo json_encode(["status" => "success"]);
}


