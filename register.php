<html>

<head>
    <meta charset="utf-8">
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
            echo "<h3>Inscription réussie !</h3>
            <br/><a href='login.php'>Se connecter</a></div>";
        }
        else{
            echo "<h3>Le pseudo est déjà utilisé.<h3>
            <br/><a href='register.php'>Essayer à nouveau</a></div>";
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
                <h2 id="register selected">Inscription</h2>
            </div>
            <div class="col-6">
                <a href="login.php"><h2 id="login">Connexion</h2></a>
            </div>
        </div>

        <div class="row">
            <form name="register" action="" method="post">
                <input type="text" name="pseudo" placeholder="Pseudo" required /><br><br>
                <input type="password" name="password" placeholder="Password" required /><br><br>
                <input type="submit" name="submit" value="Envoyer" />
            </form>
        </div>
        
    </div>

    <?php } ?>

</body>

</html>