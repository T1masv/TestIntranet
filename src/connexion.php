<?php
session_start();
require_once 'config.php';


if (!empty($_POST['email']) && !empty($_POST['Password'])) {
    //Patch XSS
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['Password']);

    $email = strtolower($email);

    //on vérifie si l'utilisateur existe
    $query = $bdd->prepare('SELECT * FROM utilisateur WHERE email= ? ');
    $query->execute(array($email));
    $result = $query->fetch();

    $row = $query->rowCount();

    if ($row === 1) {
        if (password_verify($password, $result['password'])) { // on verrifie si c'est le bon mot de passe
            $_SESSION['token'] = $result['token']; // on cree la session
            header('location:Pages/pageDeRecherche.php');// On redirige vers la page de recherche
        } else {
            header('location:Pages/pageDeConnexion.php?login_err=wrong_password');
            die();
        }

    } else header('Location:Pages/pageDeConnexion.php?login_err=NoAccount');


}