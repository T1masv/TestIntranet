<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../Style/style.css" rel="stylesheet" type="text/css">
    <title>Page de connexion</title>

<body>
    <div id="Connection-Form">

        <form action="../connexion.php" method="post">
            <h2 class="center"> Connexion </h2>

            <label for="email">Email :
                <input type="email" name="email" placeholder="Saisir Email" required="required" autocomplete="off">
            </label>

            <label for="Password">Mot de Passe :
                <input type="password" name="Password" placeholder="Saisir le mot de passe" required="required" autocomplete="off">
            </label>
            <input id="connect-button" type="submit" value="Connection">
        </form>

        <p>Si vous n'avez pas encore de compte : </p>
        <a href="pageDInscription.php"> Log In</a>

    </div>
</body>

</html>
<!--
                                                         _                 _______  _______
                                                        | \    /\|\     /|(  ____ \(  ___  )
                                                        |  \  / /| )   ( || (    \/| (   ) |
                                                        |  (_/ / | |   | || (_____ | |   | |
                                                        |   _ (  | |   | |(_____  )| |   | |
                                                        |  ( \ \ | |   | |      ) || |   | |
                                                        |  /  \ \| (___) |/\____) || (___) |
                                                        |_/    \/(_______)\_______)(_______)
-->
