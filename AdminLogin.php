<?php
session_start();
try {
  $bdd = new PDO('mysql:host=localhost;dbname=projetpiscineweb;charset=utf8', 'root', 'root');
}
catch (Exception $e){
  die('Erreur : ' . $e->getMessage());
}
if ($_POST['btcon']) {
  $InputEmail = ($_POST['InputEmail']);
  $InputPassword = ($_POST['InputPassword']);

  if (!empty($InputEmail) AND !empty($InputPassword)) {
    $reqadmin = $bdd->prepare('SELECT * FROM admin where EmailAdmin = ? AND MdpAdmin = ?');
    $reqadmin->execute(array($InputEmail, $InputPassword));

    $AdminExist = $reqadmin->rowCount();

    if ($AdminExist == 1) {
      $AdminInfo = $reqadmin->fetch();
      $_SESSION['IDAdmin']= $AdminInfo['IDAdmin'];
      header("Location: PageAdmin.php");
    } else {
      $Erreur = "mail ou mdp incorrect";
    }
  }else {
    $Erreur = "Tous les champs doivent être complétés !";
  }
}
?>
<!DOCTYPE html>
<html>
<head>

	<title>EbayECE : Admin Login</title>
  <meta charset="utf-8">

  <!-- MAKE A LINK WITH THE CSS TO CUSTOME IT -->
  <link href="AdminLogin.css" rel="stylesheet">

</head>

<!-- BODY DEVIENDRA GRADIENT DE COULEUR -->
<body class="bg-gradient-primary">
  <div>
    <a href="PageAccueil.php"><input type="submit" name="backto" class="btn btn-supp" value="Back To Ebay ECE"></a>
  </div>

  <!-- DIMENSION DE L ACARTE BLANCHE -->
  <div class="row justify-content-center">
    <!-- CLASS DE LA CARTE BLANCHE -->
    <div class="card o-hidden border-0 shadow-lg my-5">
      <!-- CLASS DIMENSION DE LA CARTE BLANCHE -->
      <div class="p-5">
        <!-- CLASS POUR LA MARGE ENTRE LE TEXTE ET LE CHAMPS DU TEXTE -->
        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
        <form method="POST" action="">
          <div class="form-group">
            <input type="email" name="InputEmail" class="form-control" placeholder="Enter Email Address...">
          </div>

          <div class="form-group">
            <input type="password" name="InputPassword" class="form-control" placeholder="Password">
          </div>

          <input type="submit" name="btcon" class="btn btn-primary btn-block" value="Login">
        </form>
        <br>
        <?php
        if (isset($Erreur)) {
          echo '<font color="red">'.$Erreur.'</font>';
        }
        ?>
        

      </div>
    </div>
  </div>
</div>
</div>


</body>
</html>