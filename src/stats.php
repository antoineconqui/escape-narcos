<?php
    require 'db.php'; //On fait appel au script de connexion à la base de données
    include 'auth.php'; //On fait appel au script qui vérifie l'authentification
    $pseudo = $_SESSION['pseudo'];

    $teams = $db->query("SELECT * FROM teams WHERE (player1='".$pseudo."' OR player2='".$pseudo."' OR player3='".$pseudo."' OR player4='".$pseudo."') AND playing=0");
    
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

    <div class="blink">
        <h1>ESCAPE THE NARCOS</h1>
    </div>
    <p class="menu">Statistiques : <?php echo $pseudo; ?> -
    <a href="index.php">Retour au menu</a> -
    <a href="logout.php">Déconnexion</a></p>

    <div class="frame">

        <h2>Statistiques du joueur</h2>

        <?php
        if(!$teams){
            echo "<h4>Vous n'avez pas encore fait de parties ...</h4>";
        }
        else{
            echo '<table>
                    <thead>
                        <tr>
                            <th>Escape Game</th>
                            <th>Coéquipiers</th>
                            <th>Temps total</th>
                            <th>Temps enigmes (en secondes)</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($team = $teams->fetch_assoc()) {
                
                echo '  <tr>
                            <td>'.$team['game'].'</td>
                            <td>';
                for ($i=2; $i < 4; $i++)
                    if ($team['player'.$i]!="")
                        echo $team['player'.$i].' ';
                echo '      </td>
                            <td>';
                ?><script>document.write(<?php echo $team['times']; ?>)</script><?php
                echo ' secondes</td>
                            <td>'.$team['times'].'</td>
                        </tr>';
            }
            echo '  </tbody>
                </table>';
        }
        ?>
        
    </div>
    
</body>

</html>