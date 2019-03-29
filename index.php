<!-- Il s'agit de la page d'accueil -->

<?php
    require 'db.php'; //On fait appel au script de connexion à la base de données
    include 'auth.php'; //On fait appel au script qui vérifie l'authentification

    $games = $db->query("SELECT * FROM games"); //Récupération des différents escape-game présents dans la base de données
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
    <p class="menu">Bienvenue <?php echo $_SESSION['pseudo']; ?>, chez "Escape The Narcos" -
    <a href="stats.php">Statistiques du joueur</a> -
    <?php 
        if($_SESSION['gmpass']==md5($gmpassvalue)) //Si l'utilisateur est identifié en tant que gamemaster : on affiche un lien vers la page de gestion du gamemaster 
            echo "<a href=\"gamemaster.php\">Game Master Page</a> - ";
    ?>
    <a href="logout.php">Déconnexion</a></p>

    <div class="frame">
        
        <h2>Découvrez tous nos Escape-Game !</h2>
        
        <br>  

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> <!-- Ce carousel contient tous les escapes-game présents dans la BDD -->

            <div class="carousel-inner">

            <?php
            if(!$games){ //S'il n'y a pas d'escapegame dans la BDD
            }
            else{ //Sinon, on rentre tous les escape-game dans le carousel
                $active = true;
                while ($game = $games->fetch_assoc()) { //Tant qu'il y a des escape-game à afficher
                    echo "  <div class='carousel-item ";
                    if($active)
                        echo "active";
                    echo " '>
                                <img src='media/".stripslashes($game['name']).".jpg' class='image'> 
                                <div class='carousel-caption d-none d-md-block caption' id='".stripslashes($game['name'])."'>
                                    <h3>".stripslashes($game['title'])."</h3>
                                    <p>".stripslashes($game['text'])."</p>
                                </div>
                            </div>";
                    ?>
                    <script>
                        $("#<?php echo $game['name'] ?>").click(function(){ //On créé un eventListener de click sur les titres d'escape-game
                            $.cookie('game',<?php echo $game['id'] ?>); //On définit un cookie qui stock le numéro de l'escape-game choisi
                            $("#zoomBackground").show(); //Affiche un fond flou
                            $("#launch_game").show(); //Affiche un cadre de lancement de partie par dessus le fond flou
                        });
                    </script>
                    <?php
                    $active = false;
                }
            }
            ?>
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

        <div id="zoomBackground" style="display:none;"></div> <!-- Fond flou estétique -->

        <div class="zoom" id="launch_game" style="display:none;"> <!-- Cadre de lancement de partie -->
            
            <?php include("launch_game.php"); ?> <!-- Récupère le script de lancement de partie -->

        </div>

    </div>

    <script src="script/script.js"></script>
    
</body>

</html>