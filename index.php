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
    <link rel="stylesheet" href="style.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="blink">
        <h1>ESCAPE THE NARCOS</h1>
    </div>
    <p class="menu">Bienvenue <?php echo $_SESSION['pseudo']; ?>, chez "Escape The Narcos" -
    <a href="stats.php">Statistiques du joueur</a> -
    <a href="logout.php">Déconnexion</a></p>

    <div class="frame">
        
        <h2>Découvrez tous nos Escape-Game !</h2>
        
        <br>  
            
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="media/escape-pablo-house.jpg" class="image" alt="Escape Pablo House">
                    <div class="carousel-caption d-none d-md-block caption">
                    <a id="game-pablo-house"><h3>Escape from Pablo's House</h3></a>
                        <p>Pablo Escabar vous a enfermé dans sa maison. En tant qu'agent de la DEA, vous devez vite vous en échapper !</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="media/escape-la-catedral.jpg" class="image" alt="Escape La Catedral">
                    <div class="carousel-caption d-none d-md-block caption">
                        <a id="game-catedral"><h3>Escape from La Catedral</h3></a>
                        <p>Aidez Pablo Escobar à s'échapper de sa célèbre prison "La Catedral" !</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div id="zoomBackground" hidden></div>

        <div class="zoom" id="launch_game" hidden>
            
            <?php include 'launch_game.php'; ?>

        </div>

    </div>

    <script src="script.js"></script>
    
</body>

</html>