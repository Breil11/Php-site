<?php
include('usr.php');
                if(isset($_POST)){ 
                    // $email = $datasUser['mail'];
                    $request = $usr->query("SELECT * FROM utilisateur_circuit ");
                   
                        
                    while($datasUser= $request->fetch(PDO::FETCH_ASSOC)) :?>
                            <li><a name=""class="dropdown-item" href="profil22circuit.php?id=<?= $datasUser['id'];?>"><?= $datasUser['date_reservation'];?></a></li>
                                <?php endwhile;
                                    }  
                                    else{ 
                                        echo 'circuit indisponible';
                                    } 
                                    ?>       