<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Restaurant de pizza</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Font Awesome -->
    <script defer src="js/fontawesome-all.js"></script>

</head>

<body class="text-center">
<form class="form-signin" method="post" action="enregistrement_post.php">

    <img class="mb-4" src="img/pizza.png" alt="" width="72" height="72">

    <h1 class="h3 mb-3 font-weight-normal">Enregistrement</h1>


    <input type="text" id="inputNom" class="form-control" placeholder="Nom" name="inputNom" required>
    <input type="text" id="inputPrenom" class="form-control" placeholder="Prénom" name="inputPrenom" required>
    <input type="email" id="inputEmail" class="form-control" placeholder="Adresse mail" name="inputEmail" required autofocus>
    <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" name="inputPassword" required>

    <button class="btn btn-lg btn-warning btn-block mt-3" type="submit">S'enregistrer</button>
    <a class="btn btn-lg btn-warning btn-block" href="connexion.php">Connexion</a>
    <a class="btn btn-lg btn-warning btn-block" href="index.php"><i class="fas fa-home"></i> Accueil</a>


    <p class="mt-5 mb-3 text-muted">&copy; Développé par Emilien GELLAERTS & Bryan THEURIER</p>
</form>
</body>
</html>
