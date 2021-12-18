<?php
session_start();
 
include('usr.php');
//PS LES REQUETES NE S'APPLIQUENT QUE POUR L'ID DE L'ADMIN 1 DONC LE CIRCUIT 1 C'est a dire l'admin qui a l'id=1
 
if(isset($_SESSION['id'])) {
   $requser = $usr->prepare("SELECT * FROM circuit WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
   if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['nom']) {
      $newnom = $_POST['newnom'];
      $insertpseudo = $usr->prepare("UPDATE circuit SET nom = ? WHERE id = ?");
      $insertpseudo->execute(array($newnom, $_GET['id']));
      header('Location: admin.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newdes']) AND !empty($_POST['newdes']) AND $_POST['newdes'] != $user['description']) {
      $newdes = $_POST['newdes'];
      $insertmail = $usr->prepare("UPDATE circuit SET description = ? WHERE id = ?");
      $insertmail->execute(array($newdes, $_SESSION['id']));
      header('Location: admin.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newplace']) AND !empty($_POST['newplace']) AND $_POST['newplacet'] != $user['nombre_place_total']) {
      $newplace = $_POST['newplace'];
      $insertmail = $usr->prepare("UPDATE circuit SET nombre_place_total   = ? WHERE id = ?");
      $insertmail->execute(array($newplace, $_SESSION['id']));
      header('Location: admin.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newdebut']) AND !empty($_POST['newdebut']) AND $_POST['newdebut'] != $user['date_debut']) {
    $newdebut = $_POST['newdebut'];
    $insertmail = $usr->prepare("UPDATE circuit SET date_debut   = ? WHERE id = ?");
    $insertmail->execute(array($newdebut, $_SESSION['id']));
    header('Location: admin.php?id='.$_SESSION['id']);
    }
    if(isset($_POST['newfin']) AND !empty($_POST['newfin']) AND $_POST['newfin'] != $user['date_fin']) {
        $newfin = $_POST['newfin'];
        $insertmail = $usr->prepare("UPDATE circuit SET date_fin   = ? WHERE id = ?");
        $insertmail->execute(array($newfin, $_SESSION['id']));
        header('Location: admin.php?id='.$_SESSION['id']);
    }
    if(isset($_POST['newprix']) AND !empty($_POST['newprix']) AND $_POST['newprix'] != $user['prix']) {
        $newprix = htmlspecialchars($_POST['newprix']);
        $insertmail = $usr->prepare("UPDATE circuit SET prix   = ? WHERE id = ?");
        $insertmail->execute(array($newprix, $_SESSION['id']));
        header('Location: admin.php?id='.$_SESSION['id']);
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
    <h5>PS LES REQUETES NE S'APPLIQUENT QUE POUR L'ID DE L'ADMIN 1 ET LE CIRCUIT 1 C'est a dire uniquement l'admin qui possède l'id=1</h5>
                    <div class="form-group">
                        
                        <input type="text" name="newnom" class="form-control" placeholder="Nouveau Nom" required>
                    </div>
                    <div class="form-group">
                        
                        <input type="text" name="newdes" class="form-control" placeholder="Nouvelle description" required>
                    </div>
                    <div class="form-group">
                        
                        <input type="text" name="newplace" class="form-control" placeholder="Nouveau nombre de place" required>
                    </div>
                    <div class="form-group">
                        
                        <input type="text" name="newdebut" class="form-control" placeholder="Nouvelle date debut" required>
                    </div>
                    <div class="form-group">
                        
                        <input type="text" name="newfin" class="form-control" placeholder="Nouvelle date fin" required>
                    </div>
                    <div class="form-group">
                        
                        <input type="text" name="newprix" class="form-control" placeholder="Nouveau prix" required>
                    </div>
                  
	           
	            <div class="form-group">
	            	<button type="submit" name="inscription" class="form-control btn btn-primary submit px-3">Valider</button>
	            </div>
	          </form>
  
          
       
	

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