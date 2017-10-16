<?php
/**
 * Created by PhpStorm.
 * User: royerq
 * Date: 16/10/2017
 * Time: 14:06
 */
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img class="logo" alt="logo" src="img/logo.png" /></a>
            <a class="navbar-brand" href="#">P'tit Dej en Carême</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><p style="color:white; margin-top: 15px;"><?php echo 'Bonjour, Mr.'.$_SESSION['nom']; ?></p></li>
                <li><a href="scripts/deconnexion.php">Se Deconnecter</a></li>
            </ul>
        </div>
    </div>
</nav>