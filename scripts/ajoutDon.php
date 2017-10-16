<?php
/**
 * Created by PhpStorm.
 * User: royerq
 * Date: 16/10/2017
 * Time: 09:49
 */

include 'connect_bdd.php';


if(isset($_POST['Secteur']) AND isset($_POST['Niveau']) AND isset($_POST['Denree']) AND isset($_POST['Classe']) AND isset($_POST['Quantite']) AND isset($_POST['Date'])){
    $date = $_POST['Date'];
    $denree = $_POST['Denree'];
    $classe = $_POST['Classe'];
    $qt = $_POST['Quantite'];


    $reponseCoef = $bdd->query("SELECT coefficient FROM tb_bonus WHERE '".$date."' BETWEEN dateDebut AND dateFin AND idAlimentBonus = '".$denree."';");


    if($reponseCoef->rowCount() > 0){
        $ligne = mysqli_fetch_array($result);
        $coef = $ligne['coefficient'];
    }
    else {
        $coef = 1;

    }
    $reponseCoef->closeCursor();
    $nbPoint = $qt * $coef;
    $requeteAjouter = $bdd->exec("INSERT INTO tb_donner VALUES('$date',$qt,$nbPoint,$denree,$classe)");

    header('Location:../ajouterDon.php');
}

?>