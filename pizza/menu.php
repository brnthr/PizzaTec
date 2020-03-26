<?php
session_start();

if ((isset($_SESSION['perso_id']) AND isset($_SESSION['perso_nom'])) == 1)
{
}
else {
    header('Location: connexion.php');
}
?>

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
        <a class="navbar-brand" href="#">PizzaTec</a>
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
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="panier.php">Panier</a>
                </li>
                <li>
                    <a class="btn btn-light" href="deconnexion.php">Déconnexion</a>
                </li>
            </ul>
          </div>
      </div>
    </nav>

    <?php if ($_SESSION['role'] == 0) {?>
    <!-- Page Content -->
    <div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-4">PizzaTec</h1>
        <div class="lead">1 Rue du Port de Valvins, 77215 Avon</div>
      </header>

      <!-- Page Features -->
      <div class="row text-center">

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="https://www.dominos.fr/ManagedAssets/FR/product/PCHP/FR_PCHP_fr_hero_1850.png" alt="">
            <div class="card-body">
              <h4 class="card-title">ORIGINALE PEPPERONI</h4>
              <p class="card-text">33cm de diamètre pour 2/3 personnes</p>
              <p class="card-text">10€</p>
            </div>
              <div class="card-footer">
                  <a href="panier.php?action=ajout&amp;l=Pepperoni&amp;q=1&amp;p=10" onclick="window.blank(this.href, '',
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">Ajouter au panier</a>
              </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="https://www.dominos.fr/ManagedAssets/FR/product/PSME/FR_PSME_fr_hero_1850.png" alt="">
            <div class="card-body">
              <h4 class="card-title">SPÉCIALE MERGUEZ</h4>
              <p class="card-text">33cm de diamètre pour 2/3 personnes</p>
              <p class="card-text">10€</p>
            </div>
              <div class="card-footer">
                  <a href="panier.php?action=ajout&amp;l=Merguez&amp;q=1&amp;p=10" onclick="window.blank(this.href, '',
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">Ajouter au panier</a>
              </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="https://www.dominos.fr/ManagedAssets/FR/product/PCJA/FR_PCJA_fr_hero_1850.png" alt="">
            <div class="card-body">
              <h4 class="card-title">CLASSIQUE JAMBON</h4>
              <p class="card-text">33cm de diamètre pour 2/3 personnes</p>
              <p class="card-text">10€</p>
            </div>
              <div class="card-footer">
                  <a href="panier.php?action=ajout&amp;l=Reine&amp;q=1&amp;p=10" onclick="window.blank(this.href, '',
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">Ajouter au panier</a>
              </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="https://www.dominos.fr/ManagedAssets/FR/product/PMAR/FR_PMAR_fr_hero_1850.png" alt="">
            <div class="card-body">
              <h4 class="card-title">BASIQUE MARGHERITA</h4>
              <p class="card-text">33cm de diamètre pour 2/3 personnes</p>
              <p class="card-text">10€</p>
            </div>
              <div class="card-footer">
                  <a href="panier.php?action=ajout&amp;l=Margherita&amp;q=1&amp;p=10" onclick="window.blank(this.href, '',
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">Ajouter au panier</a>
              </div>
          </div>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->





    <?php } else { ?>
    <!-- Page Content Admin-->
    <div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-4">Admin</h1>
        <div class="lead">1 Rue du Port de Valvins, 77215 Avon</div>
      </header>

      <!-- Page Features -->
      <div class="row text-center">

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="https://www.dominos.fr/ManagedAssets/FR/product/PCHP/FR_PCHP_fr_hero_1850.png" alt="">
            <div class="card-body">
              <h4 class="card-title">ORIGINALE PEPPERONI</h4>
              <p class="card-text">33cm de diamètre pour 2/3 personnes</p>
              <p class="card-text">10€</p>
            </div>
              <div class="card-footer">
                  <a href="panier.php?action=ajout&amp;l=Pepperoni&amp;q=1&amp;p=10" onclick="window.blank(this.href, '',
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">Ajouter au panier</a>
              </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="https://www.dominos.fr/ManagedAssets/FR/product/PSME/FR_PSME_fr_hero_1850.png" alt="">
            <div class="card-body">
              <h4 class="card-title">SPÉCIALE MERGUEZ</h4>
              <p class="card-text">33cm de diamètre pour 2/3 personnes</p>
              <p class="card-text">10€</p>
            </div>
              <div class="card-footer">
                  <a href="panier.php?action=ajout&amp;l=Merguez&amp;q=1&amp;p=10" onclick="window.blank(this.href, '',
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">Ajouter au panier</a>
              </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="https://www.dominos.fr/ManagedAssets/FR/product/PCJA/FR_PCJA_fr_hero_1850.png" alt="">
            <div class="card-body">
              <h4 class="card-title">CLASSIQUE JAMBON</h4>
              <p class="card-text">33cm de diamètre pour 2/3 personnes</p>
              <p class="card-text">10€</p>
            </div>
              <div class="card-footer">
                  <a href="panier.php?action=ajout&amp;l=Reine&amp;q=1&amp;p=10" onclick="window.blank(this.href, '',
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">Ajouter au panier</a>
              </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="https://www.dominos.fr/ManagedAssets/FR/product/PMAR/FR_PMAR_fr_hero_1850.png" alt="">
            <div class="card-body">
              <h4 class="card-title">BASIQUE MARGHERITA</h4>
              <p class="card-text">33cm de diamètre pour 2/3 personnes</p>
              <p class="card-text">10€</p>
            </div>
              <div class="card-footer">
                  <a href="panier.php?action=ajout&amp;l=Margherita&amp;q=1&amp;p=10" onclick="window.blank(this.href, '',
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">Ajouter au panier</a>
              </div>
          </div>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <?php } ?>





    <!-- Footer -->
    <footer class="py-5 bg-dark">
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
