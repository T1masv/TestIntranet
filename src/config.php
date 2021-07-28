
<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdsite;charset=utf8', 'root', ''); //Connexion a la Base de Données
    } catch (Exception $e) {
        die('Error' . $e->getMessage());
    }
?>