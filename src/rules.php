<?php
    require 'db.php'; //On fait appel au script de connexion à la base de données
    include 'auth.php'; //On fait appel au script qui vérifie l'authentification
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
    
    <div class="rules">
        <p>
        Vous êtes un agent de la DEA et vous vous êtes infiltré dans la maison de Pablo Escobar grâce aux information d’une taupe. Cependant, le baron de la drogue a réussi à mettre la main sur vous et vous a enfermé dans le cachot de sa villa. Il a ensuite tué la taupe d’une balle dans la tête. <br>
        Il s’est ensuite échappé par la sortie secrète cachée dans son bureau depuis laquelle il a pu rejoindre les égouts et s’échapper. <br>
        Vous devez réussir à trouver comment Pablo Escobar s’est échappé afin de sortir de cet enfer.
        </p>
    </div>

    <a href="game.php"><button class="next">Continuer</button></a>

</body>

</html>