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

    <?php
    require 'db.php'; //On fait appel au script de connexion à la base de données
    if (isset($_REQUEST['pseudo'])){ //Si le pseudo a été posté par le formulaire
        $pseudo = $db->real_escape_string(stripslashes($_REQUEST['pseudo']));
        $password = $db->real_escape_string(stripslashes($_REQUEST['password'])); //real_escape_string et stripslashes servent à se prémunir des caractères spéciaux dans les input du formulaire
        $gmpass = $db->real_escape_string(stripslashes($_REQUEST['gmpass']));
        if($db->query("INSERT INTO users VALUES ('$pseudo', '".md5($password)."', '".md5($gmpass)."')")){ //Insertion dans la BDD de l'utilisateur $pseudo avec le mot de passe $password (avec cryptage md5)
            //Si la requête succeed : affichage d'un texte de succes et d'un lien vers login.php
            echo "
            <div class=\"blink\">
                <h1>ESCAPE THE NARCOS</h1>
            </div>

            <div class=\"frame\">
                <h3>Inscription réussie !</h3>
                <br><br/><a href='login.php'>Se connecter</a></div>
            </div>";
        }
        else{ //Sinon cela signifie qu'il y a déja un utilisateur avec le meme pseudo : affichage d'un texte d'erreur et d'un lien pour rééssayer
            echo "
            <div class=\"blink\">
                <h1>ESCAPE THE NARCOS</h1>
            </div>

            <div class=\"frame\">
                <h3>Le pseudo est déjà utilisé.<h3>
                <br><a href='register.php'>Essayer à nouveau</a>
            </div>";
        }
    }
    else{ //Si le pseudo n'a pas été posté par le formulaire, on affiche le formulaire de connexion
    ?>

    <div class="blink">
        <h1>ESCAPE THE NARCOS</h1>
    </div>

    <div class="frame">

        <div class="row">
            <div class="col-6">
                <h2 class="selected" id="register">Inscription</h2>
            </div>
            <div class="col-6">
                <a href="login.php"><h2 id="login">Connexion</h2></a>
            </div>
        </div>

        <div class="row"> <!-- Formulaire d'inscription -->
            <form class="form" action="" method="post" name="register">
                <input type="text" name="pseudo" placeholder="Pseudo" required>
                <br><br><input type="password" name="password" placeholder="Password" required>
                <br><br><input type="text" name="gmpass" placeholder="GameMaster Pass"> <!-- On demande un mot de passe de gamemaster pour éviter que n'importe qui s'inscrive en tant que gamemaster -->
                <br><br><input name="submit" type="submit" value="Envoyer">
            </form>
        </div>
        
    </div>

    <?php } ?>

</body>

</html>