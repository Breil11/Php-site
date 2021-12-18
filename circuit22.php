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
                    <a href="profil.php"><img src="images\person-square.svg">
                </div>
        </nav>
        <h1><u>Planning du circuit</u></h1>
        
        <?php
            session_start();
            include('usr.php');
            $a=$_GET['id'];

            if(isset($a)){
                echo $a;
                $request1 = $usr->query("SELECT * FROM deplacement WHERE id<=4 ");
                $request2 = $usr->query("SELECT * FROM deplacement WHERE id>4 and id<8 ");
                $request3 = $usr->query("SELECT * FROM deplacement WHERE id>8 ");

                // if($a==$_SESSION['id'])
                
                
                
                
                
                
                if ($a==1){
                    while($datasUser= $request1->fetch(PDO::FETCH_ASSOC)) :?>
                        <li><a name=""class="dropdown-item" href="#"><?="<strong>".$datasUser['planning_jour']."<br>"."<strong>"."Heure de départ: ".$datasUser['heure_depart']."</strong>"."<br>"."<strong>"."Heure d'arrivée: "."</strong>".$datasUser['heure_arrivee']."<strong>";?></a></li>
                        <?php endwhile;
                        // echo $_SESSION['id'];
                        if(isset($_POST['reserver'])){
                            $req="UPDATE circuit SET nombre_place_total=nombre_place_total-1 WHERE id=$a";
                            $pre=$usr->prepare($req);
                            $pre->execute();
                            echo "Votre reservation a bien été enregistrée Merci!";
                            
                            // $request = $usr->query("UPDATE circuit SET nombre_place_total=nombre_place_total-1 WHERE id=$a");
                            // while($dataUser=$request->fetch(PDO::FETCH_ASSOC)){
                            //     header('location: index4.php'); 
                            // }
                            // print_r("Votre reservation a bien été enregistrée Merci!");
                            
                            
                            
                            $date= date('y-m-j');
                            $req = $usr->prepare("INSERT INTO utilisateur_circuit(date_reservation, id_utilisateur, id_circuit) VALUES(:date_reservation, :id_utilisateur, :id_circuit)");
                            $req->bindParam(':date_reservation', $date);
                            $req->bindParam(':id_utilisateur', $_SESSION['id']);
                            $req->bindParam(':id_circuit', $a);
                            $req->execute();

                           
                    }
                }
                elseif ($a==2){
                    while($datasUser= $request2->fetch(PDO::FETCH_ASSOC)) :?>
                        <li><a name=""class="dropdown-item" href="#"><?="<strong>".$datasUser['planning_jour']."<br>"."<strong>"."Heure de départ: ".$datasUser['heure_depart']."</strong>"."<br>"."<strong>"."Heure d'arrivée: "."</strong>".$datasUser['heure_arrivee']."<strong>";?></a></li>
                        <?php endwhile;
                    if(isset($_POST['reserver'])){
                        $req="UPDATE circuit SET nombre_place_total=nombre_place_total-1 WHERE id=$a";
                            $pre=$usr->prepare($req);
                            $pre->execute();
                            echo "Votre reservation a bien été enregistrée Merci!";

                            $date= date('y-m-j');
                            $req = $usr->prepare("INSERT INTO utilisateur_circuit(date_reservation, id_utilisateur, id_circuit) VALUES(:date_reservation, :id_utilisateur, :id_circuit)");
                            $req->bindParam(':date_reservation', $date);
                            $req->bindParam(':id_utilisateur', $_SESSION['id']);
                            $req->bindParam(':id_circuit', $a);
                            $req->execute();
                    }
                }
                elseif ($a==3){
                    while($datasUser= $request3->fetch(PDO::FETCH_ASSOC)) :?>
                        <li><a name=""class="dropdown-item" href="#"><?="<strong>".$datasUser['planning_jour']."<br>"."<strong>"."Heure de départ: ".$datasUser['heure_depart']."</strong>"."<br>"."<strong>"."Heure d'arrivée: "."</strong>".$datasUser['heure_arrivee']."<strong>";?></a></li>
                        <?php endwhile;
                    if(isset($_POST['reserver'])){
                        $req="UPDATE circuit SET nombre_place_total=nombre_place_total-1 WHERE id=$a";
                            $pre=$usr->prepare($req);
                            $pre->execute();
                            echo "Votre reservation a bien été enregistrée Merci!";

                            $date= date('y-m-j');
                            $req = $usr->prepare("INSERT INTO utilisateur_circuit(date_reservation, id_utilisateur, id_circuit) VALUES(:date_reservation, :id_utilisateur, :id_circuit)");
                            $req->bindParam(':date_reservation', $date);
                            $req->bindParam(':id_utilisateur', $_SESSION['id']);
                            $req->bindParam(':id_circuit', $a);
                            $req->execute();

                    }
                }
            }
                
            
            ?>
            <form method="post">
                <button class="btn btn-outline-success"  type="submit" name="reserver">Reserver ce circuit</button><br>
            </form>
           
            
    
               
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


	</body>
</html>


