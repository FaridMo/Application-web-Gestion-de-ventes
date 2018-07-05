<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
    <style>
        strong,
        .far {
            color: darkgreen;
        }
        .navbar-right{
            margin-left: 520px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="affichageClient.php" class="navbar-brand">
               Listes des clients
           </a>
                <a href="affichageProduit.php" class="navbar-brand">
            Listes des produits
            </a>
            </div>
            <ul class="nav navbar-nav far">
                <!--<li><a href="affichage.php">Listes</a></li>-->


                <li><a href="client.php">Ajouter un client </a></li>
                <li><a href="produit.php">Ajouter un produit</a> </li>



                <form class="navbar-form navbar-right" action="logout.php" method="POST">
                    <button type="submit" class="btn btn-success">
                           <span class="glyphicon glyphicon-log-out">
                           </span> &nbsp; se déconnecter
                    </button>
                </form>
            </ul>
        </div>
    </nav>
</body>

</html>