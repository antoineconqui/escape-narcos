<?php
    require 'db.php';
    include 'auth.php';
    
    $pseudo = $_SESSION['pseudo'];

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Escape The Narcos</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/png" href="media/icon.ico">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
</head>

<body>

    <div class="blink">
        <h1>ESCAPE THE NARCOS</h1>
    </div>
    <p class="menu">Game Master : <?php echo $pseudo; ?> - 
    <a href="index.php">Retour au menu</a> -
    <a href="logout.php">Déconnexion</a></p>

    <div class="frame">

        <h2>PARTIES EN COURS - <a href="gamemaster.php">ACTUALISER</a></h2>

        <h3 id="nb_team"></h3>

        <div id="teams-container"></div>
        
    </div>
    
    <script src="gamemaster.js"></script>

</body>

</html>