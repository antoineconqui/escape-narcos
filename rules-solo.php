<?php
    require('db.php');
    include("auth.php");
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Escape The Narcos</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <div class="blink">
        <h1>ESCAPE THE NARCOS</h1>
    </div>
    
    <div class="rules">
        <p>
        Vous êtes un agent de la DEA et vous vous êtes infiltré dans la maison de Pablo Escobar grâce
        aux information d’une taupe. Cependant, le baron de la drogue a réussi à mettre la main sur vous
        et vous a enfermé dans le cachot de sa villa. Il a ensuite tué la taupe d’une balle dans la tête.
        Il s’est ensuite échappé par la sortie secrète cachée dans son bureau depuis laquelle il a pu
        rejoindre les égouts et s’échapper. <br>
        Avant de mourir, la taupe a utilisée son sang pour vous donner quelques indications.<br>
        Vous devez réussir à trouver comment Pablo Escobar s’est échappé afin de sortir de cet enfer.
        </p>
    </div>

    <a href="game.php"><button class="next">Continuer</button></a>

    <script>
        document.documentElement.requestFullscreen();        
    </script>

</body>

</html>