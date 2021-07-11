<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Style/pageRecherche.css">
    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/index.js"></script>
    <title>Page de recherches</title>
</head>
<body>
   <SECTION>
       <H1> Page de recherches </H1>
       <div id="resultat_query_container">
           <form method="post" action="">
               <label>
                   Barre de recherche
                   <input id="recherche" type="text" name="recherche">
               </label>
               <button type="submit"> Rechercher</button>
               <div id="resultatQuery"> </div>
           </form>

       </div>
   </SECTION>
</body>
</html>

