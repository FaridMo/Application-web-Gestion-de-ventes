<?php
        session_start();
   require_once('configuration.php');
    
   
        
        $login =isset($_POST['login'])?$_POST['login']:"";
        $pass  =isset($_POST['mdp'])?$_POST['mdp']:"";
        
        
        $reqlogin="select * from admin where utilisateur='$login' and motdepasse=sha1('$pass')";
        $resultat = mysqli_query($connexion,$reqlogin);
        
        $final= mysqli_fetch_assoc($resultat);
        
        
        if($final){
            $_SESSION['us']="faridmo";
            header("location:affichageClient.php");
        }else{
            header("location:authentification.php?info=1");
        }
        

         
    

?>
