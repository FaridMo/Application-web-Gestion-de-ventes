<?php 
        require_once('configuration.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <!--<script type="text/javascript" src="bootstable/bootstable.js"></script>-->
    <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../js/boostrap.js"></script>
    
    <link href="../css/bootstrap-editable.css" rel="stylesheet">
    <script src="../js/bootstrap-editable.min.js"></script>
    
    
    <style>
        body {
            font-family: "Trebuchet MS", sans-serif;
        }
        
        .farid{
            font-family: "lucida console", sans-serif;
            font-size: 20px;
}
        
    </style>
</head>

<body>
    <?php include('menu.php'); 
        
        
        $limite=5;
        /*$defaut = ($page - 1)*$limite;*/
    
    ?>

    <!--########################### AFFICHAGE DES CLIENTS #########################################-->
    <div class="container">
        <div class="panel panel-success marge60">
            <div class="panel-heading">Rechercher les clients</div>
            <div class="panel-body">

                <form method="get" action="affichage.php" class="form-inline">
                    <div class="input-group">
                        <input type="text" name="rechercheClient" placeholder="id ou nom ou prenom" class="form-control">
                        <div class="input-group-btn form-inline">
                            <button class="btn btn-danger" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                    <!--<button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-search"></span>
                        CHERCHER 
                    </button> -->&nbsp; &nbsp;
                    <!--**************-->
                    <?php 
                         if(isset($_GET['rechercheClient'])){
                            $tape = $_GET['rechercheClient'];
                         }else{
                                $tape="";
                             }
                    /* Requête pour afficher tous les clients y compris les critères de recherche*/
                    $sql="select idclient,nom,prenom from client where nom like '%$tape%' or prenom like '%$tape%' or idclient like '%$tape%'";
                    /*  Requête pour compter le nombre des clients enregistré */
                    $sqlCompteur="select count(*) compteur from client where nom like '%$tape%'";
                    
                    $resultatCompteur = mysqli_query($connexion,$sqlCompteur);
                    $tableauCompteur = mysqli_fetch_assoc($resultatCompteur);
                    ?>
                    <!--**************-->
                    <!--<a href="client.php" class="glyphicon glyphicon-plus">Ajouter</a>-->
                </form>

            </div>
        </div>
        <div class="panel panel-primary marge60">
            <div class="panel-heading"> <center><span class="farid">Liste des clients [<?php echo $tableauCompteur['compteur'] ?> clients]</span></center> </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>
                                <center>ID</center>
                            </th>
                            <th>
                                <center>NOM</center>
                            </th>
                            <th>
                                <center>PRENOM</center>
                            </th>
                            <th>
                                <center>ACTIONS</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                                    $resultat=mysqli_query($connexion,$sql);
                                        while($ligne=mysqli_fetch_assoc($resultat)){  
                        ?>
                        <tr>
                            <td>
                                <center>
                                    <?php echo $ligne['idclient']?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $ligne['nom']?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $ligne['prenom']?>
                                </center>
                            </td>
                            <td>

                                <center>
                                    <a href="modifierClient.php">
                                       
                                        <span class="glyphicon glyphicon-pencil"> </span>
                                    </a> &nbsp; &nbsp;
                                    <a onclick="return confirm('vous êtes sûr ?')" href="">
                                       
                                        <span class="glyphicon glyphicon-trash"> </span>
                                    </a>
                                </center>
                                
                            </td>
                        </tr>
                        <?php                 
                                    }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>




        <!--########################### AFFICHAGE DES PRODUITS #########################################-->
        
        <!-- <div class="panel panel-success margetop">
            <div class="panel-heading">Rechercher...</div>
            <div class="panel-body">

                <form method="get" action="affichage.php" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="rechercheProduit" placeholder="tapez le nom des produits" class="form-control">
                    </div>
                    <input type="submit" value="rechercher">
                </form>

            </div>
        </div>-->
        <div class="panel panel-primary">
            <div class="panel-heading"> <center class="farid">Liste des produits</center> </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>
                                <center>ID</center>
                            </th>
                            <th>
                                <center>LIBELLE</center>
                            </th>
                            <th>
                                <center>PRIX</center>
                            </th>
                            <th>
                                <center>QUANTITE</center>
                            </th>
                            <th>
                                <center>ACTIONS</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--**************-->
                        <?php   /*  Requête pour compter le nombre de produits enregistrés */
                                /*$sql1Compteur="select count(*) compteur from produit where nom like '%$tape%'";
                        
                                $resultat1Compteur = mysqli_query($connexion,$sql1Compteur);
                                $tableau1Compteur = mysqli_fetch_assoc($resultat1Compteur);*/
                        
                                $sql1="select idproduit,libelle,prix,quantite from produit";
                                $resultat1=mysqli_query($connexion,$sql1);
                                while($ligne=mysqli_fetch_assoc($resultat1)){  ?>
                         <!--**************-->
                        <tr>
                            <td>
                                <center>
                                    <?php echo $ligne['idproduit']?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $ligne['libelle']?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $ligne['prix'].' fcfa'?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $ligne['quantite']?>
                                </center>
                            </td>
                            <td>

                                <center>
                                    <a href="modifierProduit.php">
                                        <span class="glyphicon glyphicon-pencil"> </span>
                                    </a> &nbsp; &nbsp;
                                    <a onclick="return confirm('vous êtes sûr ?')" href="supprimerProduit.php">
                                        <span class="glyphicon glyphicon-trash"> </span>
                                    </a>
                                </center>
                            </td>
                        </tr>
                        <?php                 
                                    }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
