<?php
    require('db.php');
    include("auth.php");
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

<?php
    $pseudo = $_SESSION['pseudo'];

    $games=$db->query("SELECT g.team, g.times FROM teams t, games g
                        WHERE g.team IN
                            (SELECT id FROM teams
                            WHERE player1='$pseudo'
                                OR player2='$pseudo'
                                OR player3='$pseudo'
                                OR player4='$pseudo')");
?>

    <div class="blink">
        <h1>ESCAPE THE NARCOS</h1>
    </div>
    <p class="menu">Statistiques : <?php echo $pseudo; ?> -
    <a href="index.php">Retour au menu</a> -
    <a href="logout.php">Déconnexion</a></p>

    <div class="frame">

        <h2>Statistiques du joueur</h2>

<?php
        if(!$games){
            echo "<h4>Vous n'avez pas encore fait de parties ...</h4>";
        }
        else{
            while ($game = $games->fetch_assoc()) {
			    echo $game['team'].' ';
            }
        }
?>
        
    </div>
    
</body>

</html>