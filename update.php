<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="create-update.css">
    <title>Update Employe</title>
</head>
<body>
<h2>Employe:</h2>
<h3><a href="read.php">List of Employees</a></h3>
<?php 
    include 'Employe.php';
    $employe = new Employe($_GET['id']);
    var_dump($employe);
?>
<h2>Change employee info:</h2>
<form action="#" method='POST'>
    <input type="hidden" name='id' value='<?php echo $employe->getId(); ?>'>
    <label>Nom:</label>
    <input type="text" name='nom' value='<?php echo $employe->getNom(); ?>'><br>
    <label>Prenom:</label>
    <input type="text" name='prenom' value='<?php echo $employe->getPrenom(); ?>'><br>
    <label>Email:</label>
    <input type="email" name='email' value='<?php echo $employe->getEmail(); ?>'><br>
    <label>Taux Horaire:</label>
    <input type="number" name='tauxHoraire' value='<?php echo $employe->getTauxHoraire(); ?>'><br>
    <input class='btn' type="submit" value="Envoyer">
    <?php 
        if (isset($_POST['nom']) != '' && isset($_POST['prenom']) != '' && isset($_POST['email']) != '' && isset($_POST['tauxHoraire']) != ''){
            $employe->update($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tauxHoraire']);
            var_dump($employe);
        }
    ?>
</form>
</body>
</html>
