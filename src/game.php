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

    <div id="room1"> <!-- On gère chaque salle dans un cadre qui prend tout la page, afin de ne pas recharger la page à chaque changement de salle dans l'escape game -->
        <?php include 'games/pablo-house.php'; ?> <!-- Récupère le script de l'escape-game choisi -->
    </div>

    <span id="enigme" style="display:none;">Enigme n°1</span> <!-- Cadre d'affichage du numéro de l'enigme en cours -->
    
    <span id="timer" style="display:none;"></span> <!-- Cadre d'affichage du timer -->
    
    <button id="indice" style="display:none;">UN INDICE ?</button> <!-- Bouton de demande automatique d'un indice -->

    <div id="chat" style="display:none;"> <!-- Cadre de chat avec le game-master -->
        <p id="question" style="display:none;"></p> <!-- Cadre d'affichage de la question posée -->
        <p id="answer" style="display:none;"></p> <!-- Cadre d'affichage de la réponse renvoyée par le game-master -->
        <span id="ask">
            <form method="post" id="message-form"> <!-- Formulaire d'envoi de la question au game-master -->
                <input type="hidden" name="team" id="inputteam">
                <input type="text" name="question" id="message-text" placeholder=" Chatter avec le GameMaster">
                <button type="button" id="message-button">Envoyer</button>
            </form>
        </span>
    </div>

    <script src="script/game.js"></script>

</body>

</html>