<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Opération sur les dons</title>

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
<?php if(isset($_SESSION['nom'])) { ?>
    <?php include 'sections/nav.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li>
                        <a href="dashboard.php">Vue d'ensemble <span class="sr-only"><span>(current)</span></a></li>
                </ul>
                <hr clas="star-primary ">
                <ul class="nav nav-sidebar ">
                    <li><a href="ajouterDon.php ">Ajouter un don</a></li>
                    <li class="active"><a href="operationDon.php">Modifier un don</a></li>
                    <li><a href="# ">Supprimer un don</a></li>
                </ul>
                <hr clas="primary-star ">
                <ul class="nav nav-sidebar ">
                    <li><a href="ajouterBonus.php">Ajouter un bonus</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main ">
                <h1 class="page-header " style="text-align: justify; ">Modifier un don</h1>
            </div>
            <div class="container">
                <div class="col-lg-10 col-lg-offset-2 col-md-12 col-md-offset-2">
                    <table class="table table-condensed">
                        <tr>
                            <th>Date</th>
                            <th>Classe</th>
                            <th>Denree</th>
                            <th>Quantité</th>

                        </tr>

                        <?php
                        include 'scripts/connect_bdd.php';

                        $reponse = $bdd->query("SELECT dateDon, libelleClasse, idClasse, libelleAliment, idAliment, qteDon FROM tb_donner INNER JOIN tb_classe on idDonnerClasse = idClasse INNER JOIN tb_aliment on idDonnerAliment = idAliment");


                        while ($ligne = $reponse->fetch()) {
                            echo '<tr>';


                            if (isset($_GET['dateDon']) AND isset($_GET['idAliment']) AND isset($_GET['idClasse']) AND $_GET['dateDon'] == $ligne['dateDon'] AND $_GET['idAliment'] == $ligne['idAliment'] AND $_GET['idClasse'] == $ligne['idClasse'] AND isset($_GET['modifier'])) {

                                echo '<form action="scripts/ModifieDon.php" method="post">
                                    <th>' . $ligne['dateDon'] . '</th>
                                    <th>' . $ligne['libelleClasse'] . '</th>
                                    <th>' . $ligne['libelleAliment'] . '</th>
                                    <input name="dateDon" value="' . $ligne['dateDon'] . '" type="hidden">
                                    <input name="idAliment" value="' . $_GET['idAliment'] . '" type="hidden">
                                    <input name="idClasse" value="' . $_GET['idClasse'] . '" type="hidden">
                                    <th> <input type="number" id="inputQt" class="form-control" value="' . $ligne['qteDon'] . '" name="Quantite"></th>
                                    <th> <button type="submit" class="btn btn-primary">Valider</button></th>
                                    <th><a href="operationDon.php">Retour</a></th>
                                    </form>';

                            } else {
                                if (isset($_GET['dateDon']) AND isset($_GET['idAliment']) AND isset($_GET['idClasse']) AND $_GET['dateDon'] == $ligne['dateDon'] AND $_GET['idAliment'] == $ligne['idAliment'] AND $_GET['idClasse'] == $ligne['idClasse'] AND isset($_GET['supprimer'])) {
                                    echo '<form action="scripts/SupprimerDon.php" method="post">
                                        <th>' . $ligne['dateDon'] . '</th>
                                        <th>' . $ligne['libelleClasse'] . '</th>
                                        <th>' . $ligne['libelleAliment'] . '</th>
                                        <input name="dateDon" value="' . $ligne['dateDon'] . '" type="hidden">
                                        <input name="idAliment" value="' . $_GET['idAliment'] . '" type="hidden">
                                        <input name="idClasse" value="' . $_GET['idClasse'] . '" type="hidden">
                                        <th>' . $ligne['qteDon'] . '</th>
                                        <th> <button type="submit" class="btn btn-primary">Valider</button></th>
                                        <th><a href="operationDon.php">Retour</a></th>
                                        </form>';

                                } else {
                                    echo '
                                        <th>' . $ligne['dateDon'] . '</th>
                                        <th>' . $ligne['libelleClasse'] . '</th>
                                        <th>' . $ligne['libelleAliment'] . '</th>
                                        <th>' . $ligne['qteDon'] . '</th>
                                        <th><a href="operationDon.php?dateDon=' . $ligne['dateDon'] . '&idAliment=' . $ligne['idAliment'] . '&idClasse=' . $ligne['idClasse'] . '&supprimer=true">Supprimer</a></th>
                                        <th><a href="operationDon.php?dateDon=' . $ligne['dateDon'] . '&idAliment=' . $ligne['idAliment'] . '&idClasse=' . $ligne['idClasse'] . '&modifier=true">Modifier</a></th>
                                        </tr>';
                                }
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}
else {
    header("Location:index.php");
}
?>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js ">
    < /scrip <
    script >
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js "><\/script>')

</script>
<script src="../../dist/js/bootstrap.min.js "></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="../../assets/js/vendor/holder.min.js "></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js "></script>



</body>

</html>
