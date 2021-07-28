<?php
session_start();
require_once 'config.php';
if (empty($_SESSION['token'])){

    header('location:../Pages/pageDeConnexion.php?login_err=back');
    echo 'oui';

}
>?