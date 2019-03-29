<?php
    require 'db.php';
    include 'auth.php';
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Escape The Narcos</title>
    <link rel="icon" type="image/png" href="media/icon.ico">
    <link rel="stylesheet" href="libraries/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"/>
    <script src="libraries/bootstrap.min.js"></script>
    <script src="libraries/jquery-3.3.1.min.js"></script>
    <script src="libraries/jquery.cookie.js"></script>
    <script src="libraries/popper.min.js"></script>
</head>

<body>

    <div id="room1">
        <?php include 'games/pablo-house.php'; ?>
    </div>

    <span id="enigme" style="display:none;">Enigme n°1</span>
    
    <span id="timer" style="display:none;"></span>
    
    <button id="indice" style="display:none;">UN INDICE ?</button>

    <div id="chat" style="display:none;">
        <p id="question"></p>
        <p id="answer"></p>
        <span id="ask">
            <form method="post" id="message-form">
                <input type="hidden" name="team" id="inputteam">
                <input type="text" name="question" id="message-text" placeholder=" Chatter avec le GameMaster">
                <button type="button" id="message-button">Envoyer</button>
            </form>
        </span>
    </div>

    <script src="script/game.js"></script>

</body>

</html>