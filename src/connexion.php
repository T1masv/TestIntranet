<?php
session_start();
require_once 'config.php';


if (!empty($_POST['email']) && !empty($_POST['Password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['Password']);

    $email = strtolower($email);


    $query = $bdd->prepare('SELECT * FROM utilisateur WHERE email= ? ');
    $query->execute(array($email));
    $result = $query->fetch();

    $row = $query->rowCount();

    if ($row === 1) {
        if (password_verify($password, $result['password'])) {
            $_SESSION = $result['token'];
            header('location:pageDeRecherche.php');// On redirige vers la page de recherche
        } else {
            header('location:pageDeConnexion.php?login_err=wrong_password');
            die();
        }

    } else header('Location:pageDeConnexion.php?login_err=NoAccount');


}