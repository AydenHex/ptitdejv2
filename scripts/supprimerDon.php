<?php
include 'connect_bdd.php';
if(isset($_POST['idAliment']) AND isset($_POST['idClasse']) AND isset($_POST['dateDon'])){
    $date = $_POST['dateDon'];
    $classe = $_POST['idClasse'];
    $aliment = $_POST['idAliment'];

    $reponse = $bdd->exec("DELETE FROM tb_donner WHERE idDonnerAliment = $aliment AND idDonnerClasse = $classe AND dateDon = '$date'");

    header("Location:../operationDon.php");
}

?>
