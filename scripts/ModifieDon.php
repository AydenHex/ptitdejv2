<?php
include 'connect_bdd.php';
if(isset($_POST['Quantite']) AND isset($_POST['idAliment']) AND isset($_POST['idClasse']) AND isset($_POST['dateDon'])){
    $date = $_POST['dateDon'];
    $classe = $_POST['idClasse'];
    $aliment = $_POST['idAliment'];
    $qt = $_POST['Quantite'];

    $reponse = $bdd->exec("UPDATE tb_donner SET qteDon = $qt WHERE dateDon ='$date' AND idDonnerClasse = $classe AND idDonnerAliment = $aliment");

    header("Location:../operationDon.php");
}

?>
