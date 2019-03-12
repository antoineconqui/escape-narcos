<html>

<head>
    <meta charset="utf-8">
    <title>Escape The Narcos</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php
        require('db.php');
        session_start();
        if (isset($_POST['pseudo'])){
            $pseudo = mysqli_real_escape_string($con,stripslashes($_REQUEST['pseudo']));
            $password = mysqli_real_escape_string($con,stripslashes($_REQUEST['password']));
            $query = "SELECT * FROM users WHERE pseudo='$pseudo'and password='".md5($password)."'";
            $result = mysqli_query($con,$query) or die(mysql_error());
            $rows = mysqli_num_rows($result);
                if($rows==1){
                    $_SESSION['pseudo'] = $pseudo;
                    header("Location: index.php");
                }
                else{
                    echo "<h3>Pseudo / Mot de passe incorrect.</h3>
                    <br/><a href='login.php'>Essayer à nouveau</a></div>";
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
                <a href="register.php"><h2 id="register">Inscription</h2></a>
            </div>

            <div class="col-6">
                <h2 id="login selected">Connexion</h2>
            </div>

        </div>

        <div class="row">
            <form action="" method="post" name="login">
                <input type="text" name="pseudo" placeholder="Pseudo" required /><br><br>
                <input type="password" name="password" placeholder="Password" required /><br><br>
                <input name="submit" type="submit" value="Envoyer" />
            </form>
        </div>
        
    </div>

    <?php
        }
    ?>

</body>

</html>