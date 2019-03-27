<?php
    require 'db.php';
    include 'auth.php';

    $games = $db->query("SELECT * FROM games");
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Escape The Narcos</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="icon" type="image/png" href="media/icon.ico">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="blink">
        <h1>ESCAPE THE NARCOS</h1>
    </div>
    <p class="menu">Bienvenue <?php echo $_SESSION['pseudo']; ?>, chez "Escape The Narcos" -
    <a href="stats.php">Statistiques du joueur</a> -
    <?php 
        if($_SESSION['gmpass']==md5($gmpassvalue))
            echo "<a href=\"gamemaster.php\">Game Master Page</a> - ";
    ?>
    <a href="logout.php">Déconnexion</a></p>

    <div class="frame">
        
        <h2>Découvrez tous nos Escape-Game !</h2>
        
        <br>  

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">

            <?php
            if(!$games){
            }
            else{
                $active = true;
                while ($game = $games->fetch_assoc()) {
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
                        $("#<?php echo $game['name'] ?>").click(function(){
                            $.cookie('game',<?php echo $game['id'] ?>);
                            $("#zoomBackground").show();
                            $("#launch_game").show();
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

        <div id="zoomBackground" style="display:none;"></div>

        <div class="zoom" id="launch_game" style="display:none;">
            
            <?php include("launch_game.php"); ?>

        </div>

    </div>

    <script src="script.js"></script>
    
</body>

</html>