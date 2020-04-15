<?php

    $bdd = new PDO('mysql:host=localhost;dbname=pizza', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];


    $requete = $bdd->prepare('SELECT * FROM personne WHERE perso_mail = :mail');
    $requete->execute(array(
        'mail' => $email));
    $resultat = $requete->fetch();

    // Comparaison du pass envoyé via le formulaire avec la base


    $passwordCorrect = password_verify($password, $resultat['perso_psw']);


    if (!$resultat)
    {
        echo 'Mauvais identifiant ou mot de passe !';
    }
    else
    {
        if ($passwordCorrect) {
            session_start();
            $_SESSION['perso_id'] = $resultat['perso_id'];
            $_SESSION['perso_nom'] = $resultat['perso_nom'];
            $_SESSION['role'] = $resultat['role'];
            header('Location: menu.php');
        }
        else {
            echo 'Mauvais identifiant ou mot de passe !';
        }
    }

?>

