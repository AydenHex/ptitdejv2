<?php
session_start();
include 'connect_bdd.php';
$login = $_POST['login'];
$mdp = md5($_POST['mdp']);

$reponse = $bdd->query("SELECT * FROM tb_admin WHERE login = '$login' AND mdp = '$mdp'");
var_dump($reponse);
if($reponse->rowCount() > 0){
    $ligne = $reponse->fetch();
    $_SESSION['nom'] = $ligne['nom'];
    header("Location:../dashboard.php");
}
else{
    $msg = "Identifiants incorrect ! ";
    header("Location:..\index.php?msg=".$msg);
}