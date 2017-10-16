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
                <h1 class="page-header " style="text-align: justify;">Ajouter un bonus</h1>
            </div>
            <h2 style="text-align:center;">Dernier bonus</h2>
            <table>
                <?php
                    include 'scripts/connect_bdd.php';
                    $reponse = $bdd->query("SELECT dateDebut, dateFin, libelleAliment, coefficient FROM tb_bonus INNER JOIN tb_aliment ON idAliment = idBonusAliment ORDER BY dateFin desc LIMIT 1");
                    $ligne = $reponse->fetch();
                ?>
                <tr>
                    <th>Date Debut</th>
                    <th>Date Fin</th>
                    <th>Aliment</th>
                    <th>coefficient</th>
                </tr>
                <?php
                echo'<tr>
                    <th>$ligne[\'dateDebut\']</th>
                    <th>$ligne[\'dateFin\']</th>
                    <th>$ligne[\'libelleAliment\']</th>
                    <th>$ligne[\'coefficient\']</th>
                </tr>'
                ?>
            </table>
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
