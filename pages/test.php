<?php 
    require_once('configuration.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <form name="form1" action="" method="post">
        <table>
            <tr>
                <td>Entrez nom</td>
                <td><input type="text" name="t1"></td>
            </tr>
            <tr>
                <td>Entrez prenom</td>
                <td><input type="text" name="t2"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" align="center"><input type="submit" name="submit1" value="insert"></td>
            </tr>
        </table>
    </form>

    <?php 
        if(isset($_POST["submit1"])){
            $sql="insert into client(nom,prenom) values('$_POST[t1]','$_POST[t2]')";
            mysqli_query($connexion,$sql);
        }
    ?>

    <br><br>

    <?php 
                $res = mysqli_query($connexion,"select * from client");
                echo"<table>";
                       echo"<tr>";
                         echo"<th>"; echo "nom"; echo "</th>";
                         echo"<th>"; echo "prenom"; echo "</th>";
                        echo"<tr>";
                    while($row=mysqli_fetch_array($res)){
                        echo"<tr>";
                         echo"<td>"; echo $row["nom"]; echo "</td>";
                         echo"<td>"; echo $row["prenom"]; echo "</td>";
                        echo"<tr>";
                    }
                echo"</table>";
        ?>
</body>

</html>
