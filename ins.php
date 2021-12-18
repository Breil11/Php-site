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
            <a class="navbar-brand" href="index2.php"><img src="images\avion.jpg" alt="" width="80" height="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
    </nav>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Page d'inscription</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
					<?php 
						include('usr.php');
						if(isset($_POST['inscription'])){
							$nom = $usr->quote($_POST['nom']);
							$prenom = $usr->quote($_POST['prenom']);
							$password = $usr->quote($_POST['password']);
							$email = $usr->quote($_POST['email']);
							
							$reqemail=$usr->query("SELECT * FROM utilisateur WHERE mail= $email");
							$datasUser = $reqemail->fetch(); 
							$mailexist=$reqemail->rowCount();
							if($mailexist == 0){
								$request = $usr->query("INSERT INTO utilisateur(nom, prenom, mail , mdp) 
								VALUES($nom, $prenom, $email ,$password)");
								echo "Votre compte a bien été créé";
								header('location: conn.php'); 

							}
							else{
								echo "L'adresse email existe déja";
							}
							

							 

						}
						?>
		      	<form action="#" class="signin-form" method="POST">
                    <div class="form-group">
                        <input type="text" name="nom" class="form-control" placeholder="Nom" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="prenom" class="form-control" placeholder="Prénom" required>
                    </div>
                    <div class="form-group">
		      			<input type="text" name="email" class="form-control" placeholder="eMail" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" name="password" type="password" class="form-control" placeholder="Mot de passe" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="inscription" class="form-control btn btn-primary submit px-3">S'inscrire</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Se rappeller de moi
							<input type="checkbox" checked>
							<span class="checkmark"></span>
						</label>
						</div>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

