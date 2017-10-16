<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Ajout d'un nouveau don</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php if(isset($_SESSION['nom'])){ ?>
<?php include'sections/nav.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li>
                    <a href="dashboard.php">Vue d'ensemble <span class="sr-only"><span>(current)</span></a></li>
            </ul>
            <hr clas="star-primary ">
            <ul class="nav nav-sidebar ">
                <li class="active"><a href="ajouterDon.php ">Ajouter un don</a></li>
                <li><a href="operationDon.php">Modifier un don</a></li>
                <li><a href="# ">Supprimer un don</a></li>
            </ul>
            <hr clas="primary-star ">
            <ul class="nav nav-sidebar ">
                <li><a href="ajouterBonus.php">Ajouter un bonus</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header " style="text-align: justify;">Ajouter un don</h1>
        </div>
        <form action="scripts/ajoutDon.php" method="post">
            <div class="col-lg-10 col-lg-offset-3 col-md-12 col-md-offset-4">
                <div class="col-lg-10 col-md-12">
                    <label for="inputSecteur" class="label-control">Secteur</label>
                    <select id="inputSecteur" class="form-control" name="Secteur">
                        <?php
                        //Connexion à la Bdd
                        try {
                            $bdd = new PDO('mysql:host=localhost;dbname=ptitdej_v1;charset=utf8','root', '');
                        }
                        catch(Exception $e){
                            die('Erreur : '.$e->getMessage());
                        }
                        //On envoie la requete et traite la réponse
                        $reponse = $bdd->query('SELECT * FROM tb_secteur');
                        var_dump($reponse);
                        //On remplis la combobox
                        while ($ligne=$reponse->fetch())
                        {
                            echo '<option value='.$ligne['idSecteur'].'>'.$ligne['libelleSecteur'].'</option>';
                            echo $ligne['idSecteur'];
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-5 col-md-6">
                    <label for="inputNiveau" class="label-control">Niveau</label>
                    <select id="inputNiveau" class="form-control" name="Niveau">
                        <?php
                        //Connexion à la Bdd
                        try {
                            $bdd = new PDO('mysql:host=localhost;dbname=ptitdej_v1;charset=utf8','root', '');
                        }
                        catch(Exception $e){
                            die('Erreur : '.$e->getMessage());
                        }
                        //On envoie la requete et traite la réponse
                        $reponse = $bdd->query('SELECT * FROM tb_niveau');
                        var_dump($reponse);
                        //On remplis la combobox
                        while ($ligne=$reponse->fetch())
                        {
                            echo '<option value='.$ligne['idNiveau'].' data-chained='.$ligne['idNiveauSecteur'].'>'.$ligne['libelleNiveau'].'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="col-lg-5 col-md-6">
                    <label for="inputClasse" class="label-control">Classe</label>
                    <select id="inputClasse" class="form-control" name="Classe">
                        <?php
                        try {
                            $bdd = new PDO('mysql:host=localhost;dbname=ptitdej_v1;charset=utf8','root', '');
                        }
                        catch(Exception $e){
                            die('Erreur : '.$e->getMessage());
                        }
                        //On envoie la requete et traite la réponse
                        $reponse = $bdd->query('SELECT * FROM tb_classe');
                        var_dump($reponse);
                        //On remplis la combobox
                        while ($ligne=$reponse->fetch())
                        {
                            echo '<option value='.$ligne['idClasse'].' data-chained='.$ligne['idClasseNiveau'].'>'.$ligne['libelleClasse'].'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="col-lg-5 col-md-6">
                    <label for="inputDenree" class="label-control">Denrée</label>
                    <select id="inputDenree" class="form-control" name="Denree">
                        <?php
                        try {
                            $bdd = new PDO('mysql:host=localhost;dbname=ptitdej_v1;charset=utf8','root', '');
                        }
                        catch(Exception $e){
                            die('Erreur : '.$e->getMessage());
                        }
                        //On envoie la requete et traite la réponse
                        $reponse = $bdd->query('SELECT * FROM tb_aliment');
                        var_dump($reponse);
                        //On remplis la combobox
                        while ($ligne=$reponse->fetch())
                        {
                            echo '<option value='.$ligne['idAliment'].'>'.$ligne['libelleAliment'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class=" col-lg-5 col-md-6">
                    <label for="inputQt" class="label-control">Quantite</label>
                    <input type="number" id="inputQt" class="form-control" placeholder="Text input" name="Quantite">
                </div>
                <div class="col-lg-10 col-md-12">
                    <label for="inputDate" class="label-control">Date du don</label>
                    <input type="date" id="inputDate" class="form-control" name="Date">
                </div>
                <div class="col-lg-3 col-md-4">
                    <button type="submit" class="btn btn-primary" style="margin-top:30px;">AJOUTER</button>
                </div>

            </div>

        </form>
    </div>
</div>
<?php }
else{
    header("Location: index.php");
}
?>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js "></script>
<script src="jquery.chained.js"></script>
<script>
    $(function(){
        $("#inputSecteur").chained("#inputSecteur");
    });
</script>
<script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js "><\/script>')
</script>
<script src="../../dist/js/bootstrap.min.js "></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="../../assets/js/vendor/holder.min.js "></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js "></script>



</body>

</html>
