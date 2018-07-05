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
        body{
            font-family:"Trebuchet MS",sans-serif;
        }
    </style>
</head>

<body>
    <?php include('menu.php'); ?>

    <div class="container col-md-4 col-md-offset-4">
        <div class="panel panel-primary marge60 form-disable">
            <div class="panel-heading"> Créer un client </div>
            <div class="panel-body">
                <form method="post" action="" class="form-block">
                   Nom : 
                    <input type="text" name=nom class="form-control" required>
                    Prenom :
                    <input type="text" name=prenom class="form-control" required>
                    <center><button type="submit" name="submit1" class="btn btn-success marge20"> <span class="glyphicon glyphicon-save"></span> &nbsp; Enregistrer</button></center>
                </form>
            </div>
        </div>
    </div>
    
   <?php 
             
        
            if(isset($_POST['submit1'])){
               $sql = "INSERT INTO client(nom,prenom) values('$_POST[nom]','$_POST[prenom]')";
                mysqli_query($connexion,$sql);
         }
            
            
            
    ?>
</body>

</html>
