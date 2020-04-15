<?php

    $bdd = new PDO('mysql:host=localhost;dbname=pizza', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));



    $nom = $_POST['inputNom'];
    $prenom = $_POST['inputPrenom'];
    $email = $_POST['inputEmail'];
    $pass = $_POST['inputPassword'];

    $testmail = $bdd->prepare('SELECT perso_mail FROM personne WHERE perso_mail = :email');
    $testmail->execute(array('email' => $email));
    $resultat = $testmail->fetch();


    if ($resultat)
    {
        echo 'E-mail déjà utilisé !';
    }
    else {
        $requete = $bdd->prepare('INSERT INTO personne (perso_nom, perso_prenom, perso_mail, perso_psw) VALUES (:nom , :prenom , :email , :pass)');

        $requete->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'pass' => password_hash($pass, PASSWORD_BCRYPT)
        ));

        $requeteid = $bdd->prepare('SELECT perso_id FROM personne WHERE perso_mail = :email');
        $requeteid->execute(array(
            'email' => $email
        ));
        $resultatid = $requeteid->fetch();

        if ($resultatid) {
            session_start();
            $_SESSION['perso_id'] = $resultatid;
            $_SESSION['perso_nom'] = $nom;
            header('Location: menu.php');
        }
    }

?>