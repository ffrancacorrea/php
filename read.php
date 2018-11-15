<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/read.css">
    <title>INFO</title>
</head>
<body>
        <!-- //MYSQLI WAY

    $db = new mysqli($host = 'localhost', $username = 'root', $passwd = '', $dbname = 'entreprise');
    $employe_list = "SELECT * FROM employes";
    $sql = $db->query($employe_list);
    $info_employe = $sql->fetch_assoc();
    var_dump($info_employe);
    -->

    <?php //PDO WAY (WORKS FOR ANY DB)

    include 'MyPDO.php';
    $db = new MyPDO();
    $employe_list = "SELECT * FROM employes";
    $sql = $db->prepare($employe_list);
    $sql->execute();
    $info_employe = $sql->fetchAll(PDO::FETCH_ASSOC);
    /* var_dump($info_employe); */
    ?>

    <div class="header">
        <h1>Liste d'employés</h1>
        <h2><a href="create.php">Ajouter un employé</a></h2>
    </div>
    <div class="table-content">
        <table>
            <thead>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Taux Horaire</th>
            </thead>
            <tfoot>

            </tfoot>
            <tbody>
                <?php 
                    foreach($info_employe as $employe){?>
                        <tr>
                            <td><?php echo $employe['id'] ?></td>
                            <td><?php echo $employe['nom'] ?></td>
                            <td><?php echo $employe['prenom'] ?> </td>
                            <td><?php echo $employe['mail'] ?></td>
                            <td><?php echo $employe['tauxHoraire'] ?></td>
                            <td class='deleteBtn'><a href="delete.php?id=<?php echo $employe['id'] ?>">Suprimer</a></td>
                            <td class='updateBtn'><a href="update.php?id=<?php echo $employe['id'] ?>">Modifier</a></td>
                        </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>