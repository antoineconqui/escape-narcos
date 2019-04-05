<?php
    require 'db.php'; //On fait appel au script de connexion à la base de données
    include 'auth.php'; //On fait appel au script qui vérifie l'authentification
    $pseudo = $_SESSION['pseudo'];
    $team_str = $db->query("SELECT * FROM teams WHERE id='".$_GET['team']."'")->fetch_assoc()['times'];
    $team_tab = explode(' + ',$team_str);
?>

<script>
    function ReadTime(time) { //Fonction d'écriture standardisée du temps
        let str = "";
        let sec = Math.floor(time%60000/1000);
        let min = Math.floor((time-sec)/60000);
        if (min!=0){
            str+=min+" minute";
            if(min>1)
                str+="s";
            if(sec!=0)
                str+=" - ";
        }
        if(sec!=0){
            str+=sec+" seconde"
        }
        if(sec>1)
            str+="s";
        return str;
    }
</script>

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
        <h1>VICTOIRE</h1>
    </div>

    <div class="frame">

        <h2>Bien joué, <?php echo $_SESSION['pseudo'];?> !</h2><br>

        <div class="times">
            <p> Temps Total : <script>document.write(ReadTime((<?php echo $team_str; ?>)*1000));</script></p>
            
            <?php 
            for ($i=0; $i < count($team_tab); $i++) { 
                echo '<p>    Enigme n°'.($i+1).' : ';
                ?><script>document.write(ReadTime((<?php echo $team_tab[$i]; ?>)*1000));</script><?php
                echo '</p>';
            }
            ?>
        </div>
        
        <br>
        <p class="menu">
            <a href="stats.php">Statistiques</a> -
        <a href="index.php">Retour au menu</a> -
        <a href="logout.php">Déconnexion</a></p>
        
    </div>
    
</body>

</html>