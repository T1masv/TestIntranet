<?php
    session_start();
    require_once 'config.php';


if (!empty($_POST['email']) && !empty($_POST['Password'])){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['Password']);

    $email = strtolower($email);



    $verify= $bdd->prepare('SELECT * FROM utilisateur WHERE email= ? ');
    $verify->execute(array($email));
    $result = $verify->fetch();

    $row =$verify->rowCount();

    if ( $row === 1){
       if (password_verify($password, $result['password'])){
           $_SESSION = $result['token'];
           header('location:home.php');
       }else header('location:index.php?login_err=wrong_password');

    }else header('Location:index.php?login_err=NoAccount');


}