<?php
    require 'db.php'; //On fait appel au script de connexion à la base de données
    include 'auth.php'; //On fait appel au script qui vérifie l'authentification
    
    $pseudo = $_SESSION['pseudo']; //Stock le pseudo du game-master
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Escape The Narcos</title>
    <link rel="icon" type="image/png" href="media/icon.ico">
    <link rel="stylesheet" href="libraries/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"/>
    <script src="libraries/jquery-3.3.1.min.js"></script>
    <script src="libraries/jquery.cookie.js"></script>
    <script src="libraries/popper.min.js"></script>
    <script src="libraries/bootstrap.js"></script>
</head>

<body>

    <div class="blink">
        <h1>ESCAPE THE NARCOS</h1>
    </div>
    <p class="menu">Game Master : <?php echo $pseudo; ?> - 
    <a href="index.php">Retour au menu</a> -
    <a href="logout.php">Déconnexion</a></p>

    <div class="frame">

        <h2 id="nb_team"></h2> <!-- Cadre d'affichage du nombre d'équipe en train de jouer -->

        <div id="teams-container"></div> <!-- Cadre d'affichage des messages d'équipe en train de jouer -->
        
    </div>
    
    <script src="script/gamemaster.js"></script>

</body>

</html>