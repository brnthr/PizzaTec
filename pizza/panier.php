<?php
session_start();
include_once("fct_panier.php");

$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
    if(!in_array($action,array('ajout', 'suppression', 'refresh')))
        $erreur=true;

    //récuperation des variables en POST ou GET
    $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
    $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
    $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

    //Suppression des espaces verticaux
    $l = preg_replace('#\v#', '',$l);
    //On verifie que $p soit un float
    $p = floatval($p);

    //On traite $q qui peut etre un entier simple ou un tableau d'entier

    if (is_array($q)){
        $QteArticle = array();
        $i=0;
        foreach ($q as $contenu){
            $QteArticle[$i++] = intval($contenu);
        }
    }
    else
        $q = intval($q);

}

if (!$erreur){
    switch($action){
        Case "ajout":
            ajouterArticle($l,$q,$p);
            break;

        Case "suppression":
            supprimerArticle($l);
            break;

        Case "refresh" :
            for ($i = 0 ; $i < count($QteArticle) ; $i++)
            {
                modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
            }
            break;

        Default:
            break;
    }
}

echo '<?xml version="1.0" encoding="utf-8"?>';?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PizzaTec</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">

    <script defer src="js/fontawesome-all.js"></script>


</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="menu.php">PizzaTec</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <span class="nav-link"><i class="fas fa-id-badge"></i> <?php

                      if (isset($_SESSION['perso_id']) AND isset($_SESSION['perso_nom']))
                      {
                          echo $_SESSION['perso_nom'] ;
                      }
                      ?></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Accueil
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="panier.php">Panier</a>
                </li>
                <li>
                    <a class="btn btn-light" href="deconnexion.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Page Content -->
<div class="container">

    <!-- Page Features -->

    <div class="mb-2 mt-4">

        <form method="post" action="panier.php">

                    <?php
                    if (creationPanier())
                    {
                        $nbArticles=count($_SESSION['panier']['libelleProduit']);
                        if ($nbArticles <= 0)
                            echo "<h1 class=\"m-3 align-items-center\">Votre panier est vide...</h1>";
                        else
                        {
                            echo "<table class=\"table mb-4\"><thead><tr><th scope=\"col\">#</th><th scope=\"col\">Pizza</th><th scope=\"col\">Quantité</th><th scope=\"col\">Prix Unitaire</th></tr></thead>";

                            for ($i=0 ;$i < $nbArticles ; $i++)
                            {

                                echo "<tbody><tr>";
                                echo "<th scope=\"row\">$i</th>";
                                echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</td>";
                                echo "<td><input type=\"number\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
                                echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
                                echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">XX</a></td>";
                                echo "</tr>";


                            }
                            echo "</tbody>";
                            echo "</table>";
                        }
                    }
            if ($nbArticles > 0)
            {
                echo "Total : ".MontantGlobal() . "€";
            }
        ?>

        <hr>

            <div class="btn-group">

                <input type="submit" class="btn btn-dark" value="Recalculer"/>
                <input type="hidden" name="action" value="refresh"/>

                <?php
                    if ($nbArticles == 0)
                    {
                        echo "<a href=\"menu.php\" class=\"btn btn-dark\">Retour</a>";
                        echo "<a href=\"menu.php\" class=\"btn btn-success\">Voir le menu</a>";
                    }
                    else {
                        echo "<a class='btn btn-success' href='card_confirmation/index.html'>Payer</a>";
                    }
                ?>

            </div>
        </form>

        <!-- /.row -->

    </div>
</div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark fixed-bottom">
        <div class="container">
            <p class="m-0 text-center text-white">&copy; Développé par Emilien GELLAERTS & Bryan THEURIER</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery.min.js"></script>
    <script src="vendor/bootstrap.bundle.min.js"></script>

</body>

</html>
