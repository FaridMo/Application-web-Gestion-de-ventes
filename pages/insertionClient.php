<?php
    
    require_once('configuration.php');

    $id = isset($_POST['idclient'])?$_POST['idclient']:0;
    $nom = isset($_POST['nomM'])?$_POST['nomM']:"";
    $prenom = isset($_POST['prenomM'])?$_POST['prenomM']:"";

    $req = "update client set nom=$nom,prenom=$prenom where idclient=$id";
    $resultat=mysqli_query($connexion,$req);
    
    $ligne = mysqli_fetch_assoc($resultat);
    header("location:affichageClient.php");

?>