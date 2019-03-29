<?php
    require('db.php');
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

    <?php
        require 'db.php';
        session_start();
        if (isset($_POST['pseudo'])){
            $pseudo = $db->real_escape_string(stripslashes($_REQUEST['pseudo']));
            $password = $db->real_escape_string(stripslashes($_REQUEST['password']));
            $result = $db->query("SELECT * FROM users WHERE pseudo='$pseudo'and password='".md5($password)."'");
            if(mysqli_num_rows($result)==1){
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['gmpass'] = $result->fetch_assoc()['gmpass'];
                header("Location: index.php");
            }
            else{
                echo "
                <div class=\"blink\">
                    <h1>ESCAPE THE NARCOS</h1>
                </div>

                <div class=\"frame\">
                    <h3>Pseudo / Mot de passe incorrect.</h3>
                    <br><a href='login.php'>Essayer à nouveau</a>
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
                <a href="register.php"><h2 id="register">Inscription</h2></a>
            </div>

            <div class="col-6">
                <h2 class="selected" id="login">Connexion</h2>
            </div>

        </div>

        <div class="row">
            <form class="form" action="" method="post" name="login">
                <input type="text" name="pseudo" placeholder="Pseudo" required>
                <br><br><input type="password" name="password" placeholder="Password" required>
                <br><br><input name="submit" type="submit" value="Envoyer">
            </form>
        </div>
        
    </div>

    <?php
        }
    ?>

</body>

</html>