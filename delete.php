<?php 
    include 'MyPDO.php';
    $db = new MyPDO();
    $employe_delete = 'DELETE FROM employes WHERE id='.$_GET['id'];
    echo $employe_delete;
    $sql = $db->prepare($employe_delete);
    $result = $sql->execute();
    var_dump($result);
?>