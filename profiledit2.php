<?php
session_start();
 
$bdd = new PDO('mysql:host=localhost;dbname=vitemonvol', 'root', '');
 
if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
   if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newpnom'] != $user['nom']) {
      $newnom = htmlspecialchars($_POST['newnom']);
      $insertpseudo = $bdd->prepare("UPDATE utilisateur SET nom = ? WHERE id = ?");
      $insertpseudo->execute(array($newnom, $_SESSION['id']));
      header('Location: profil2.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE utilisateur SET mail = ? WHERE id = ?");
      $insertmail->execute(array($newmail, $_SESSION['id']));
      header('Location: profil2.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = ($_POST['newmdp1']);
      $mdp2 = ($_POST['newmdp2']);
      if($mdp1 == $mdp2) {
         $insertmdp = $bdd->prepare("UPDATE utilisateur SET mdp = ? WHERE id = ?");
         $insertmdp->execute(array($mdp1, $_SESSION['id']));
         header('Location: profil2.php?id='.$_SESSION['id']);
      } else {
          $msg= "Vos deux mdp ne correspondent pas !";
      }
   }
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index4.php"><img src="images\avion.jpg" alt="" width="80" height="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

    </nav>
    <form action="#" class="signin-form" method="POST">
                    <div class="form-group">
                        
                        <input type="text" name="newnom" class="form-control" placeholder="Nouveau Nom" required>
                    </div>
                    <div class="form-group">
                        
                        <input type="text" name="newmail" class="form-control" placeholder="Nouvel email" required>
                    </div>
                    <div class="form-group">
                       
		      			<input type="password" name="newmdp1" class="form-control" placeholder="Nouveau Mot de passe">
		      		</div>
	            <div class="form-group">
                   
	              <input id="password-field" name="newmdp2" type="password" class="form-control" placeholder="Confirmer mot de passe">
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="inscription" class="form-control btn btn-primary submit px-3">Valider</button>
	            </div>
	          </form>
  
            <?php if(isset($msg)) { echo $msg; } ?>
       
	

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


	</body>
</html>

<?php   
}
else {
   header("Location: conn.php");
}
?>