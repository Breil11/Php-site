<?php
    session_start();
    include('usr.php');

     
    if(isset($_POST)){ 
        $email = $_POST['email'];
        $mdp = $_POST['password'];
        if(!empty($email) AND !empty($mdp)){ 
            $request = $usr->prepare("SELECT * FROM utilisateur WHERE mail = ? AND mdp= ?");
            $request->execute(array($email, $mdp));
            $usrexist = $request->rowcount();
            if ($usrexist>=1){
                $dataUser = $request->fetch();
                $_SESSION['id'] = $dataUser['id'];
                $_SESSION['nom']= $dataUser['nom'];
                $_SESSION['email']= $dataUser['mail'];
                if($dataUser['is_admin']>=1){
                    header("location: admin.php?id=".$_SESSION['id']);
                }
                else{
                    header("location: profil2.php?id=".$_SESSION['id']);
                }
            }
            else{                
                echo 'Mot de passe incorrect ou email invalide';}
        }     
    
    }
?>