<?php
require_once '../config.php'; // Connexion a la BD;

if (isset($_POST['recherche'])&&!empty($_POST['recherche'])) { // On verifie si la balise input est vide
    // patch XSS
    $query = $_POST['recherche'];

    $output = '';
    $request = $bdd->prepare('SELECT * FROM catalogue WHERE id  LIKE ?  OR nomProduit LIKE ? ');
    $request->execute(array('%'.$query.'%', '%'.$query.'%'));
    $result = $request->fetchAll(); //Recuperation de tous les resultats
    $row = $request->rowCount();
    $output = '<ul>';

    if ($row > 0) {
        foreach ($result as $res) { // Pour chaque resultat on affiche son id et son nom
          $output .='<li>'.$res['id'] . '-' . $res['nomProduit'].'</li>';
        }

    }
    else {
        die();
    }
    $output .='</ul>';
    echo $output; //Retour du resultat
}

?>