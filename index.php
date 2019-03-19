<?php
    require('db.php');
    mysqli_query($con,"CREATE TABLE IF NOT EXISTS users (pseudo varchar(50) PRIMARY KEY,password varchar(50))");
    mysqli_query($con,"CREATE TABLE IF NOT EXISTS teams (id INT PRIMARY KEY, player1 varchar(50), player2 varchar(50), player3 varchar(50), player4 varchar(50))");
    // mysqli_query($con,"CREATE TABLE IF NOT EXISTS games (pseudo varchar(50) PRIMARY KEY,password varchar(50))");
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

    <div class="frame">

        <p>Bienvenue <?php echo $_SESSION['pseudo']; ?>, dans le jeu "Escape The Narcos" ! - <a href="stats.php">Statistiques du joueur</a> - <a href="logout.php">Déconnexion</a></p>

        <div class="row">

            <div class="col-6">
                <h2 class="selected" id="single">Un seul ordinateur</h2>
            </div>

            <div class="col-6">
                <h2 id="multi">Plusieurs ordinateurs</h2>
            </div>

        </div>

        <div class="row" id="single-content">
            
            <?php include 'single-computer.php'; ?>

        </div>

        <div class="row" id="multi-content" hidden>

            <span>
                
            </span>
            <!-- <div class="col-6">
                <h3 id="create">Créer une partie</h3>
            </div>

            <div class="col-6">
                <h3 class="selected" id="join">Rejoindre une partie</h3>
            </div> -->

        </div>

        

        
    </div>

    <script src="script.js"></script>
    
</body>

</html>