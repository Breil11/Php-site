
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

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav nav-pills">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"></a>
                    </li>
                </div>
                <div id="icon">
                    <!-- <link rel="stylesheet" href="css/icon.css"> -->
                    <a href="profil2.php"><img src="images\person-square.svg">
                    
                    
                </div>
        </nav>
        <p style="border:4px solid #343a40; text-align:center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum diam ut gravida semper. Fusce ac mattis orci. Vivamus purus nunc, rutrum ullamcorper pulvinar nec, venenatis non neque. Nulla facilisi. Nulla consequat orci vitae commodo porta. Proin ut felis ornare, blandit metus non, commodo diam. Cras consectetur ligula tellus, blandit consequat dolor accumsan sed. Nulla sit amet elit tellus. Donec sed sollicitudin est. In eu elit non diam maximus auctor in non sapien. Maecenas interdum sit amet mi eu viverra. Integer ipsum magna, dapibus at ornare tincidunt, mollis sed lectus. Nulla porta risus in tortor porttitor, vitae aliquam eros semper.</p>
        <?php
            session_start();
            include('usr.php');?>

           
    
                <section class="ftco-section">
                    <div class="container">
                        <div class="row justify-content-center">
                            <form class="d-flex"  style="background-color: #0c5460;" style="padding-top:100%">
                                <ul class="nav nav-pills">
                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" name="circuits " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Circuits</a>
                                <ul class="dropdown-menu">
               
                <?php
                if(isset($_POST)){ 
                    // $email = $datasUser['mail'];
                    $request = $usr->query("SELECT * FROM circuit ");
                    if($request->rowCount() > 0){ 
                        
                    while($datasUser= $request->fetch(PDO::FETCH_ASSOC)) :?>
                            <li><a name=""class="dropdown-item" href="admincircuit22.php?id=<?= $datasUser['id'];?>"><?= $datasUser['nom'];?></a></li>
                                <?php endwhile;
                                    }  
                                    else{ 
                                        echo 'circuit indisponible';
                                    } 
                                    } ?>       
                                </ul>
                            </li>
                        </ul>
                    </form>
                    
                </div>
            </div>
        </section>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


	</body>
</html>




