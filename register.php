<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Escape The Narcos</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php
    require('db.php');
    if (isset($_REQUEST['pseudo'])){
        $pseudo = mysqli_real_escape_string($con,stripslashes($_REQUEST['pseudo']));
        $password = mysqli_real_escape_string($con,stripslashes($_REQUEST['password']));
        $result = mysqli_query($con,"INSERT INTO users VALUES ('$pseudo', '".md5($password)."')");
        if($result){
            echo "
            <div class=\"blink\">
                <h1>ESCAPE THE NARCOS</h1>
            </div>

            <div class=\"frame\">
                <h3>Inscription réussie !</h3>
                <br><br/><a href='login.php'>Se connecter</a></div>
            </div>";
        }
        else{
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
    else{
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

        <div class="row">
            <form class="form" action="" method="post" name="register">
                <input type="text" name="pseudo" placeholder="Pseudo" required>
                <br><br><input type="password" name="password" placeholder="Password" required>
                <br><br><input name="submit" type="submit" value="Envoyer">
            </form>
        </div>
        
    </div>

    <?php } ?>

</body>

</html>