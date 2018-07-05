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
        <?php include('menu.php');
                
            $id=isset($_GET['idclient'])?$_GET['idclient']:0;
            
            $req = "select nom,prenom from client where idclient=$id";
            
            $resultat = mysqli_query($connexion,$req);
            $ligne = mysqli_fetch_assoc($resultat);
            
            $nom = $ligne['nom'];
            $prenom = $ligne['prenom'];
            
        ?>

        <div class="container col-md-4 col-md-offset-4">
            <div class="panel panel-primary marge60 form-disable">
                <div class="panel-heading"> Modifer les données du client [<?php echo $nom.' '.$prenom ?>] </div>
                <div class="panel-body">
                    <form method="post" action="" class="form-block">
                        Nom :
                        <input type="text" name=nomC class="form-control" value="<?php echo $nom ?>"> 
                        Prenom :
                        <input type="text" name=prenomC class="form-control" value="<?php echo $prenom ?>">

                        <center><button type="submit" name="submit1" class="btn btn-success marge20"> <span class="glyphicon glyphicon-save"></span> &nbsp; Enregistrer</button></center>
                    </form>
                </div>
            </div>
        </div>

        <?php 
        
            if(isset($_POST['submit1'])){

                    $sql = "update client set nom='$_POST[nomC]',prenom='$_POST[prenomC]' where idclient=$id";
                    mysqli_query($connexion,$sql);
    
                    header("location:affichageClient.php");
            
            }
    ?>
    </body>

    </html>
