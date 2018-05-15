<?php
    $hoteBD="localhost";
    $login = "root";
    $pass = "";
    $nomBD="gesvente";

    $connexion = mysqli_connect($hoteBD,$login,$pass);
    mysqli_select_db($connexion,$nomBD);

    
    if(!$connexion){
        die('Impossible de se connecter à la base de données'.mysqli_connect_error()); 
    }
?>