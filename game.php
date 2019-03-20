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

    <div id="room1">
        <?php include 'room1.php'; ?>
    </div>

    <button id="indice" hidden>UN INDICE ?</button>

    <span id="enigme" hidden>Enigme n°1</span>

    <span id="timer" hidden></span>

    <span id="chat" hidden>
        <form action="chat.php">
            <input id="message" type="text" name="message" placeholder=" Chatter avec le GameMaster">
            <button type="submit">Envoyer</button>
        </form>
    </span>

    <script src="game.js"></script>

</body>

</html>