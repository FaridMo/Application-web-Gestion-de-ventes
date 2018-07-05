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
                
            $id=isset($_GET['idproduit'])?$_GET['idproduit']:0;
            
            $req = "select libelle,prix,quantite from produit where idproduit=$id";
            
            $resultat = mysqli_query($connexion,$req);
            $ligne = mysqli_fetch_assoc($resultat);
            
            $libelle = $ligne['libelle'];
            $prix= $ligne['prix'];
        $quantite= $ligne['quantite'];
            
        ?>

        <div class="container col-md-4 col-md-offset-4">
            <div class="panel panel-primary marge60 form-disable">
                <div class="panel-heading"> Modifer les données du produit [<?php echo $libelle ?>] </div>
                <div class="panel-body">
                    <form method="post" action="" class="form-block">
                        Libellé:
                        <input type="text" name=libelleC class="form-control" value="<?php echo $libelle ?>"> 
                        Prix:
                        <input type="text" name=prixC class="form-control" value="<?php echo $prix ?>">
                        Quantité:
                        <input type="text" name=quantiteC class="form-control" value="<?php echo $quantite ?>">

                        <center><button type="submit" name="submit2" class="btn btn-success marge20"> <span class="glyphicon glyphicon-save"></span> &nbsp; Enregistrer</button></center>
                    </form>
                </div>
            </div>
        </div>

        <?php 
        
            if(isset($_POST['submit2'])){

                    $sql = "update produit set libelle='$_POST[libelleC]',prix='$_POST[prixC]',quantite='$_POST[quantiteC]' where idproduit=$id";
                    mysqli_query($connexion,$sql);
    
                    header("location:affichageProduit.php");
            
            }
    ?>
    </body>

    </html>
