<?php
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
                <h2 id="create">Créer une partie</h2>
            </div>

            <div class="col-6">
                <h2 class="selected" id="join">Rejoindre une partie</h2>
            </div>

        </div>

        <p><a href="dashboard.php">Dashboard</a></p>

        
    </div>
    
</body>

</html>