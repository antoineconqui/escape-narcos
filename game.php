<?php
    require('db.php');
    include("auth.php");
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <title>Escape The Narcos</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <div id="room1">
        <?php include 'room1.php'; ?>
    </div>

    <span id="enigme" style="display:none;">Enigme n°1</span>
    
    <span id="timer" style="display:none;"></span>
    
    <button id="indice" style="display:none;">UN INDICE ?</button>



    
    <div id="reponse" style="display:none;">
        <span></span>
        <button type="submit" id="message-button">Envoyer</button>
    </div>

    <div id="chat" style="display:none;">
        <p id="question"></p>
        <p id="answer"></p>
        <span id="ask">
            <form method="post" id="message-form">
                <input type="hidden" name="team" value="
                <?php echo $_SESSION['team']; ?>
                ">
                <input type="text" name="message" id="message-text" placeholder=" Chatter avec le GameMaster">
                <button type="button" id="message-button">Envoyer</button>
            </form>
        </span>
    </div>

    <script src="game.js"></script>

    <script>
        document.documentElement.requestFullscreen();

    </script>

</body>

</html>