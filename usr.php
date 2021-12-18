<?php
    try {
        $usr = new PDO('mysql:host=localhost;dbname=vitemonvol;charset=utf8', 'root', '');
        $usr->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    catch(Exception $e){    
        die('error: '. $e->getMessage());
    }
?>