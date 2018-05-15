<?php 
        require_once('configuration.php');
/*PAGINATION <ul class="nav nav-pills"> */

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

        .farid {
            font-family: "lucida console", sans-serif;
            font-size: 20px;
        }

    </style>
</head>

<body>
    <?php include('menu.php'); ?>

    <!--########################### AFFICHAGE DES CLIENTS #########################################-->
    <div class="container">
        <div class="panel panel-success marge60">
            <div class="panel-heading">Rechercher les clients</div>
            <div class="panel-body">

                <form method="get" action="affichageClient.php" class="form-inline">
                    <div class="input-group">
                        <input type="text" name="rechercheClient" placeholder="nom ou prenom" class="form-control">
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
                    
                    /*$page=1;
                    $limite=5;*/
                    
                    
                    
                    $limite=isset($_GET['limite'])?$_GET['limite']:5;
                    $page=isset($_GET['page'])?$_GET['page']:1;
                    $defaut = ($page - 1)*$limite;
                    
                    /* Requête pour afficher tous les clients y compris les critères de recherche*/
                    $sql="select * from client where nom like '%$tape%' or prenom like '%$tape%' limit $limite offset $defaut";
                    /*  Requête pour compter le nombre des clients enregistré */
                    $sqlCompteur="select count(*) compteur from client where nom like '%$tape%'";
                    
                    $resultatCompteur = mysqli_query($connexion,$sqlCompteur);
                    $tableauCompteur = mysqli_fetch_assoc($resultatCompteur);
                    
                    $nombre=$tableauCompteur['compteur'];
                    
                   
                    
                    $reste = $nombre % $limite; /*reste de la division euclidienne du $nombre par $limite*/
                    
                    if($reste === 0){  
                        $pageNombre = $nombre/$limite;
                    }else{
                        $pageNombre = floor($nombre/$limite)+1; /*Floor est une methode permettant de retourner
                                                                        la partie entière
                                                                        +1 pour la page suivante'*/
                    }
                    ?>


                    <!--**************-->
                    <!--<a href="client.php" class="glyphicon glyphicon-plus">Ajouter</a>-->
                </form>

            </div>
        </div>
        <div class="panel panel-primary marge60">
            <div class="panel-heading">
                <center><span class="farid">Liste des clients [<?php echo $tableauCompteur['compteur'] ?> clients]</span></center>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <!--<th>
                                <center>ID</center>
                            </th>-->
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
                            <!--<td>
                                <center>
                                    <?php /*echo $ligne['idclient']*/?>
                                </center>
                            </td>-->
                            <td>
                                <center>
                                    <?php echo strtoupper($ligne['nom'])?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $ligne['prenom']?>
                                </center>
                            </td>
                            <td>

                                <center>
                                    <a href="modifierClient.php?idclient=<?php echo $ligne['idclient']?>">
                                       
                                        <span class="glyphicon glyphicon-pencil"> </span>
                                    </a> &nbsp; &nbsp;
                                    <a onclick="return confirm('vous êtes sûr ?')" href="supprimerClient.php?id=<?php echo $ligne['idclient']?>">
                                       
                                        <span class="glyphicon glyphicon-trash" > </span>
                                    </a>
                                </center>

                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <div>
                    <!--########### PAGINATION ###########-->
                    <ul class="pagination">
                        <?php
                        if($page == 1){
                            echo '<li class="page-item disabled"><a class="page-link" href="">Précèdent</a></li>';
                        }
                        if($page>1){
                            echo '<li class="page-item"><a class="page-link" href="affichageClient.php?page=<?php echo $page ?>">Précèdent</a></li>';
                        } 
                        
                        for($i=1;$i<=$pageNombre;$i++){ ?>

                                <li class="page-item <?php if($page==$i) echo " active " ?>">
                                    <a class="page-link" href="affichageClient.php?page=<?php echo $i?>">
                                        <?php echo $i ?>
                                    </a>
                                </li>
                                <?php 
                                    } 
                                
                                if($page>=$pageNombre){
                                    echo '<li class="page-item disabled"><a class="page-link" href="">Suivant</a></li>';
                                    }
                            
                                if($page<$pageNombre){
                                    echo '<li class="page-item"><a class="page-link" href="affichageClient.php?page=<?php echo $page ?>">Suivant</a></li>'; 
                                } ?>
                                <!--href="pagination.php?page=<?page/* echo '$page'*/ ?>"-->
                                
                                <?php
                                    
                                ?>
                                
                        

                    </ul>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
