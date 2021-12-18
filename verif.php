<?php
    session_start();
    include('usr.php');

    var_dump($_POST); 
    if(isset($_POST)){ 
        $email = $_POST['email'];
        $request = $usr->query("SELECT * FROM utilisateur WHERE mail = '$email'");
        if($request->rowCount() > 0){ 
            
            $datasUser = $request->fetch();
            if(password_verify($_POST['password'], $datasUser['mdp'])){
                $_SESSION['user'] = $datasUser;
                echo $_POST['password'];
                echo $datasUser['mdp'];
                echo "bonjour";
                if($datasUser['is_admin']==1){
                    header('location: admin.php');
                }
                else{
                    header('location: profil.php');
                }
            }else{ 
                echo $_POST['password']."<br>";
                echo $datasUser['mdp'];
                echo 'Mot de passe incorrect ou email invalide';}
               
        }
        else{ 
            echo 'email invalide';
        }
    }
?>