<?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=projetpiscineweb;charset=utf8', 'root', 'root', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
 


$task = "list";

if(array_key_exists("task", $_GET)){
  $task = $_GET['task'];
}

if($task == "write"){
  postMessage();
} else {
  getMessages();
}

function getMessages(){
  // VAR DISPO A L'EXTERIEURE DE LA FONCTION POUR POUVOIR L'UTILISER À L'INTERIEURE DE LA FONCTION
  global $db;

  $resultats = $db->query("SELECT * FROM messages ORDER BY created_at DESC LIMIT 10");
  
  $messages = $resultats->fetchAll();
 
  echo json_encode($messages);
}

function postMessage(){
  global $db;
  // 'author' = ""echo $_SESSION['PrenomAcheteur'];""
  
  
  if(!array_key_exists('author', $_POST) || !array_key_exists('contentt', $_POST)){

    echo json_encode(["status" => "error", "message" => "One field or many have not been sent"]);
    return;

  }

  // $author = $_POST['author'];
  $author = $_SESSION['PrenomAcheteur'].$_SESSION['IDItem'];
  $contentt = $_POST['contentt'];


  
  $query = $db->prepare('INSERT INTO messages SET author = :author, contentt = :contentt, created_at = NOW()');
  $query->execute([
    "author" => $author,
    "contentt" => $contentt
  ]);


  
  echo json_encode(["status" => "success"]);
}
