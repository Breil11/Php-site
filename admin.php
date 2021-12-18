<?php
session_start();
include('usr.php');

if(isset($_GET['id']) AND $_GET['id']>0){
    $a = $_GET['id'];
    $request = $usr->prepare("SELECT * FROM utilisateur WHERE id = ?");
    $request->execute(array($a));
    $dataUser=$request->fetch();




?>


<!doctype html>
<html lang="en">
  <head>
  	<title>Profil User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
        <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index2.php"><img src="images\avion.jpg" alt="" width="80" height="60"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav nav-pills">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"></a>
                    </li>
                </div>
                <div id="icon">
                    <!-- <link rel="stylesheet" href="css/icon.css"> -->
                    <a href=""><img src="images\person-square.svg">
                </div>
        </nav>
        <div style="text-align:center">
            <h2 style="text-align:center;"><u> Page admin de <?php echo $dataUser['prenom']." ". $dataUser['nom']; ?></u></h2>
            <section class="ftco-section" >
                    <div class="container">
                        <div class="row justify-content-center">
                            <form class="d-flex"  style="background-color: #0c5460;" style="padding-top:100%">
                                <ul class="nav nav-pills">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" style="padding: 0.5rem 5rem;" name="circuits " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Voir les récentes inscriptions(ALLEZ DANS admin2.php <strong>PLUS BAS👇🏾</strong> SVP JAI PAS PU L'INCLURE DANS CETTE PAGE)</a>
                                        <ul class="dropdown-menu">
                                            
                                            
                                            </ul>
                                        </li>
                                    </ul>
                                </form>
                                <strong style="color:red;"> <a href="admin2.php">RECENTES INSCRIPTIONS</a></strong>
                                
                            </div>
                        </div>
                    </section>
                   <strong style="color:red;"> <a href="admin2.php">RECENTES INSCRIPTIONS</a></strong><br>
            
          

            <?php
            if(isset($_SESSION['id']) AND $dataUser['id'] == $_SESSION['id']){
            ?>
            <?php
            }
            ?> 
            <a href="adminedit2.php">Editer mon profil</a><br>
            <a href="admincircuits.php">Modifier les circuits</a><br>
            <a href="circuitajout.php">Ajouter les circuits</a><br>
            <a href="deconnexion.php">Se déconnecter</a>
        </div>
	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


	</body>
</html>
<?php
}

?>

}

