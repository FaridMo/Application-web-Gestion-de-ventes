<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    
    <link rel="stylesheet" href="../css/login.css">
    
    <link rel="stylesheet" href="../css/font-awesome.css">
    
    <link rel="stylesheet" href="../css/css/fontawesome-all.min.css">
</head>
<body>
        <div class="containe-fluid marge60 bg">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-sm-4 col-xs-12">
               
                <form id="login" method="POST" action="login.php" class="form">
                  
                  <?php  if(isset($_GET['info'])){
                                echo "connexion échouée";
                    }  ?>
                   <center><h1 class="titrelogin">Veuillez vous connecter svp !</h1></center>
                   <img class="img img-responsive img-circle" src="../images/icons/login.gif" alt="login">
                    <center>
                    <div class="form-inline marge20">
                     <input name="login" type="text" class="form-control username" placeholder="votre pseudo" >
                    </div>
                    
                    
                    <div class="form-inline marge20">
                     <input name="mdp" type="password" class="form-control password" placeholder="votre mot de passe">
                    </div>
                    
                    
                        <div class="checkbox">
                        <label id="checkbox"> <input type="checkbox"> se souvenir de moi </label>
                    </div>
                    
                    <button type="submit" name="boutonconnection" class="btn btn-success marge20"> <span class="glyphicon glyphicon-log-in"></span> &nbsp; Se connecter </button>
                    
                    </center>
                </form>
            </div>
        </div>
</body>
</html>