<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Test connexion</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
    <link href="font-awesome-4.7.0\css\font-awesome.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/dashboard.css">

</head>

<body>


    <h1 class="titre" style="text-align:center;">Connexion <br> Administrateur</h1>

<div class="container">

    <div class="col-lg-6 col-md-10 col-lg-offset-3 col-md-offset-5">
        <p><?php
            if(isset($_GET['msg'])){
                echo $_GET['msg'];
            }

            ?></p>
        <form id="connect" method="post" action="scripts/connect_utilisateur.php" style="margin-top:30%;">
            <input type="text" id="loginUser" size="32" class="form-control" placeholder="Votre Pseudo" name="login" required>
            <input type="password" id="passwordUser" size="32" class="form-control" placeholder="******" name="mdp" required>
            <button type="submit" class="btn btn-primary"><i class="fa fa-connectdevelop fa-lg"  aria-hidden="true"></i>Se connecter </button>
        </form>
    </div>
</div>

</body>

</html>
