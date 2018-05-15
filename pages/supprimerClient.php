<?php 

    require_once('configuration.php');
    
    $id = isset($_GET['id'])?$_GET['id']:0;

    $reqSql = "delete from client where idclient = $id";
    
    mysqli_query($connexion,$reqSql);

    header('location:affichageClient.php');
?>