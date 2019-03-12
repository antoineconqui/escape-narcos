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
        <p>Voici les règles du jeu.<br>
<br>
Découvrez les règles du Uno, un jeu de cartes très apprécié par les petits et grands. Le but du Uno est de se débarrasser de toutes ses cartes.<br>
<br>
Pour gagner, il vous faudra marquer 500 points ou inversement, c’est-à-dire être celui à avoir le moins de points lorsque l’un des joueurs dépasse les 500 points.<br>
<br>
Répartition des cartes du Uno :<br>
Combien de cartes dans le Uno ? Pour jouer au Uno, il vous faut les 108 cartes réparties de cette manière :<br>
<br>
19 cartes de couleur bleu, numérotées de 0 à 9 (2 pour chaque chiffre sauf pour le 0)<br>
19 cartes de couleur rouge, numérotées de 0 à 9 (2 pour chaque chiffre sauf pour le 0)<br>
19 cartes de couleur jaune, numérotées de 0 à 9 (2 pour chaque chiffre sauf pour le 0)<br>
19 cartes de couleur verte, numérotées de 0 à 9 (2 pour chaque chiffre sauf pour le 0)<br>
et des cartes spéciales:<br>
<br>
8 cartes « +2 », (2 pour chaque couleur)<br>
8 cartes « Inversement de sens », (2 pour chaque couleur)<br>
8 cartes « Passe ton tour », (2 pour chaque couleur)<br>
4 cartes « Joker »<br>
4 cartes « +4 »<br>
Le pouvoir des cartes spéciales Uno :<br>
<br>
Le premier des joueurs à s’être débarrassé de toutes ses cartes gagne. Il faut alors compter les points :<br>
<br>
 Les cartes numérotées se comptent suivant leur valeur.<br>
 La carte « +2 » vaut 20 points.<br>
 La carte « Inversement de sens » vaut 20 points.<br>
 La carte « Passe ton tour » vaut 20 points.<br>
La carte « Joker » vaut 50 points.<br>
 La carte « +4 » vaut 50 points.</p>
    </div>

    <a href="room1.php"><button class="next">Continuer</button></a>

    <script>
        document.documentElement.requestFullscreen();        
    </script>

</body>

</html>