<?php

require_once 'config.php';


if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repassword'])) {
    // Patch XSS
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $repassword = htmlspecialchars($_POST['repassword']);

    // On vérifie si l'utilisateur existe
    $check = $bdd->prepare('SELECT * FROM utilisateur WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    $email = strtolower($email);


    if ($row === 0) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // On verrifie si l'email est valide
            if ($password === $repassword) { //On verrifie que les deux mot de passes sont identiques

                $password = password_hash($password, PASSWORD_DEFAULT); //on Hash le mot de passe avec l'algorithme par default


                $insert = $bdd->prepare('INSERT INTO utilisateur(nom, prenom , email, password,token) VALUES(:nom,:prenom,:email, :password, :token)');
                $insert->execute(array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'email' => $email,
                    'password' => $password,
                    'token' => bin2hex(openssl_random_pseudo_bytes(64))
                ));

                header('Location:pageDInscription.php?reg_err=success');
                die();
            } else {
                header('Location:loginpage.php?reg_err=password');
                die();
            }
        } else {
            header('Location:pageDInscription.php?reg_err=emailInvalide');
            die();
        }
    } else {
        header('Location:pageDInscription.php?reg_err=existeDeja ');
        die();
    }
} else header('Location:pageDInscription.php?reg_err=erreurSaisie');
