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
                    <a href="conn.php"><img src="images\person-square.svg">
                </div>
        </nav>
        <h1><u>Planning du jour</u></h1>
        
        <?php
            session_start();
            include('usr.php');
            $a=$_GET['id'];
            $b=$_SESSION['id'];

            if(isset($a)){
                // echo $a;
                echo $b;

                $request4 = $usr->query("SELECT * FROM utilisateur_circuit WHERE id_utilisateur=$b ");

                
                
                    while($datasUser= $request4->fetch(PDO::FETCH_ASSOC)) :?>
                        <li><a name=""class="dropdown-item" href="#">Vos dates reservées sont:<br><?="<strong>".$datasUser['date_reservation']."</strong>"."<br>";?></a></li>
                        <?php endwhile;
                        // echo $_SESSION['id'];
                    if(isset($_POST['supprimer'])){
                        $req="DELETE FROM  utilisateur_circuit WHERE id_utilisateur=$b";
                        $pre=$usr->prepare($req);
                        $pre->execute();
                        echo "Votre reservation a bien été supprimée Merci!";
                        


                        $req2="UPDATE circuit SET nombre_place_total=nombre_place_total+1 WHERE   id=$b";/*Requete non réussie*/
                        $pre2=$usr->prepare($req2);
                        $pre2->execute();
                        // echo "Votre reservation a bien été supprimée Merci!";









                        // $request = $usr->query("DELETE FROM  utilisateur_circuit WHERE id=$a ");
                        // $request2 = $usr->query("UPDATE circuit SET nombre_place_total=nombre_place_total+1 WHERE  id=$a");
                        // while ($dataUser=$request->fetch(PDO::FETCH_ASSOC) AND $dataUser2=$request2->fetch()){
                        //     echo "Votre reservation a bien été supprimée Merci!";
                        //     // header('location: index4.php'); 
                        // }
                        // print_r("Votre reservation a bien été supprimée Merci!");
                    }
              
            }
                
            
            ?>
            <h5 style="color:red;">MAINTENANT LA SUPPRESSION REUSSIE, EN PRINCIPE VOUS DEVRIEZ RETOURNER A VOTRE PAGE DE PROFIL AVEC VOTRE ID utilisateur MAIS LE GET RECUPERE PLUTOT LE ID CIRCUIT  DU COUP LA VOUS DEVEZ JUSTE FAIRE DES RETOURS EN ARRIERE OU PLUTOT VOUS RECONNECTER(<strong>cliquez sur👆🏾 l'icone de profil</strong>) POUR ARRIVER EFFECTIVEMENT SUR VOTRE PAGE DE PROFIL</h5>
            <form method="POST">
                <button class="btn btn-outline-success"  type="submit" name="supprimer">Supprimer</button><br>
            </form>
           
            
    
               
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


	</body>
</html>

<!-- if(isset($_POST['Circuits'])){
    $circuit = $_POST['circuits'];
    switch($circuit){
        case 'id<=4':
            $request = $usr->query("SELECT * FROM deplacement WHERE id<=4 ");
            break;
        case 'id>4 and id<8':
            $request = $usr->query("SELECT * FROM deplacement WHERE id>4 and id<8 ");
            break;
        case 'id>7':
            $request = $usr->query("SELECT * FROM deplacement WHERE id>7 ");
            break;
    }
} -->


