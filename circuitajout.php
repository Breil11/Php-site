<?php
session_start();
 
include('usr.php');
 
if(isset($_SESSION['id'])) {
    if(isset($_POST['inscription'])){
    $newnom = $usr->quote($_POST['newnom']);
    $newdes = $usr->quote($_POST['newdes']);
    $newplace = $usr->quote($_POST['newplace']);
    $newdebut = $usr->quote($_POST['newdebut']);
    $newfin = $usr->quote($_POST['newfin']);
    $newprix =$usr->quote($_POST['newprix']);

    $reqemail=$usr->query("SELECT * FROM circuit WHERE nom= $newnom");
    $user = $reqemail->fetch(); 
    $mailexist=$reqemail->rowCount();
    if($mailexist == 0){
           $insertnom = $usr->query("INSERT INTO circuit(nom, description, nombre_place_total, date_debut, date_fin, prix) 
           VALUES($newnom, $newdes, $newplace, $newdebut, $newfin, $newprix)");
           echo "Le nouveau circuit a été ajouté avec succès";
           echo "Vous pouvez faire un retour vous retourner sur votre page admin";
            // header('location: admin.php?id='); ESSAYER DE VOUS RECONNECTER EN ADMIN APRES L4AJOUT SVP J4AI PAS PU REDIRIGER CORRECTEMENT LE HEADER
   }else{
    echo "Un circuit avec ce nom existe déja";
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