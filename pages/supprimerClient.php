<?php 

    require_once('configuration.php');
    
    $id=isset($ligne['idclient'])?$ligne['idclient']:0;

    $reqSql = "delete from client where idclient = $id";
    
    mysqli_query($connexion,$reqSql);

    header('location:affichage.php');
?>