<?php 
        session_start(); 

        if(!isset($_SESSION['us'])){
            header("location:authentification.php");
        }

        require_once('configuration.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: "Trebuchet MS", sans-serif;
        }

    </style>
</head>

<body>
    <?php include('menu.php');?>

    <div class="container col-md-4 col-md-offset-4">
        <div class="panel panel-primary marge60">
            <div class="panel-heading"> Créer un produit </div>
            <div class="panel-body">
                <form method="post" action="" class="form-block">
                    Libellé :
                    <input type="text" name=libelle class="form-control"> Prix :
                    <input type="text" name=prix class="form-control"> Quantite :
                    <input type="text" name=quantite class="form-control">
                    
                    <center><button type="submit" name="submit" class="btn btn-success marge20"> <span class="glyphicon glyphicon-save"></span> &nbsp; Enregistrer</button></center>
                </form>
            </div>
        </div>
    </div>

    <?php 
            if(isset($_POST['submit'])){
                $sql1 = "INSERT INTO produit(libelle,prix,quantite) values('$_POST[libelle]','$_POST[prix]','$_POST[quantite]')";
                mysqli_query($connexion,$sql1);
            }
    ?>
</body>

</html>
