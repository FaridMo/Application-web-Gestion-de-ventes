<?php 

    require_once('configuration.php');
    
    $id = isset($_GET['id'])?$_GET['id']:0;

    $reqSql = "delete from client where idclient = $id";
    
    $resultat = mysqli_query($connexion,$reqSql);


    if($resultat){
        header('location:affichageClient.php');
    }
    else{
            echo "<script> alert('Echec de suppression !')</script>";
            header('location:affichageClient.php');
    }
?>