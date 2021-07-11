<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Style/styleFormulaire.css" rel="stylesheet" />
    <title>Document</title>

</head>
<body>
<section class="container">
    <H2>Création de compte</H2>
    <div id="alert"></div>
    <form action="../logInTraitement.php" method="post">
        <div class="labels">
            <label for="nom">
                Nom
            </label>
            <label for="prenom">
                Prénom
            </label>
            <label for="email">
                Email
            </label>
            <label for="password">
                Password
            </label>
            <label for="repassword">
                Confirmer Password
            </label>
        </div>
        <div id="mov1" class="inputs">
            <input id="nom" name="nom" type="text" required="required" placeholder="Votre Nom..." />
            <input id="prenom" name="prenom" type="text" required="required"  placeholder="Votre Prénom..." />
            <input id="email" name="email" type="email" required="required" placeholder="Votre email..." />
            <input id="password" name="password" type="password" required="required"  placeholder="Votre password..." />
            <input id="repassword" name="repassword" type="password" required="required"  placeholder="Votre password..." />
            <button id="signin" type="submit" name="register">Register</button>
    </form>

</section>

</body>
</html>