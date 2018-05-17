<?php

    session_start(); 

        if(!isset($_SESSION['us'])){
            header("location:authentification.php");
        }

    /*require_once('configuration.php');

    $lpage =isset($GET['page'])?$_GET['page']:1;

        echo $lpage;*/
?>