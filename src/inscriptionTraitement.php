<?php

require_once 'config.php';


if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repassword'])) {
    // Patch XSS
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $repassword = htmlspecialchars($_POST['repassword']);

    // On vérifie si l'utilisateur existe dans la base de données
    $check = $bdd->prepare('SELECT * FROM utilisateur WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    $email = strtolower($email);


    if ($row === 0) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // On vérifie si l'email est valide
            if (strlen($password)>=6) {


                if ($password === $repassword) { //On verifie que les deux mots de passes sont identiques

                    $password = password_hash($password, PASSWORD_DEFAULT); //on Hash le mot de passe avec l'algorithme par default


                    $insert = $bdd->prepare('INSERT INTO utilisateur(nom, prenom , email, password,token) VALUES(:nom,:prenom,:email, :password, :token)');
                    $insert->execute(array(
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'email' => $email,
                        'password' => $password,
                        'token' => bin2hex(openssl_random_pseudo_bytes(64))
                    ));

                    header('Location:Pages/pageDeConnexion.php');
                } else
                {
                    header('Location:Pages/pageDInscription.php?reg_err=password');
                    die();
                }
            }else
            {
                header('Location:Pages/pageDInscription.php?reg_err=password_inf_6char');
                echo ' mot de passe trop courts';
            }
        } else
        {
            header('Location:Page/pageDInscription.php?reg_err=emailInvalide');
            die();
        }
    } else
    {
        header('Location:Page/pageDInscription.php?reg_err=existeDeja ');
        die();
    }
} else header('Location:pageDInscription.php?reg_err=erreurSaisie');
?>