<?php 

include 'MyPDO.php';
$db = new MyPDO();
/* $db = mysqli::__construct(); */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/create-update.css">
    <title>User Register Form</title>
</head>
<body>
    <h2>Créer un nouveau employé</h2>
    <h3><a href="read.php">Liste d'employés</a></h3>
    <form action="#" method="post">
        <label>Nom:</label>
        <input type="text" name="nom" placeholder="Nom"><br>
        <label>Prenom:</label>
        <input type="text" name="prenom" placeholder="Prenom"><br>
        <label>Email:</label>
        <input type="email" name="email" placeholder="Email"><br>
        <label>Taux Horaire:</label>
        <input type="number" step="1" name="tauxHoraire" placeholder="Taux Horaire"><br>
        <input class='btn' type="submit" value="Submit Form">
    </form>
    <?php 
    
    if (isset($_POST['nom']) != '' && isset($_POST['prenom']) != '' && isset($_POST['email']) != '' && isset($_POST['tauxHoraire']) != '') {
        $rqt = "INSERT INTO employes (nom, prenom, mail, tauxHoraire) VALUES ('". $_POST['nom']."','".$_POST['prenom']."','".$_POST['email']."','".$_POST['tauxHoraire']."')";
        echo $rqt;
        $sql = $db->prepare($rqt);
        $sql->execute();
    }
    ?>
</body>
</html>