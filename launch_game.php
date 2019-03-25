<?php
    require('db.php');

    if (isset($_POST['try_again'])){
        unset($_POST['pseudo1'],$_POST['try_again']);
        ?>
        <script>
            document.getElementById("zoomBackground").hidden = false;
            document.getElementById("launch_game").hidden = false;
        </script>
        <?php
    }

    function ValidUser($n,$conn){
        $pseudo = $conn->real_escape_string(stripslashes($_REQUEST['pseudo'.$n]));
        $password = $conn->real_escape_string(stripslashes($_REQUEST['password'.$n]));
        return mysqli_num_rows($conn->query("SELECT * FROM users WHERE pseudo='$pseudo'and password='".md5($password)."'"))==1;
    }

    if (isset($_POST['pseudo1'])){
        ?>
        <script>
            document.getElementById("zoomBackground").hidden = false;
            document.getElementById("launch_game").hidden = false;
        </script>
        <?php
        $problem = 0;
        $players = 1;
        $str = "<h3>Les joueurs sont :</h3><br><div class=\"pseudo\">".$_SESSION['pseudo']."</div>";
        $query = "INSERT INTO teams VALUES ('','";

        for ($i=2; $i < 5; $i++) { 
            if (!empty($_POST['pseudo'.$i])){
                if (ValidUser($i,$conn)){
                    $query.=$_POST['pseudo'.$i]."','";
                    $str.= "<div class=\"pseudo\">".$_POST['pseudo'.$i]."</div>";
                }
                else
                    $problem+=$i;
            }
            else
                $query.="','";
        }

        if($problem==0){
            echo "<p>".$query."')"."</p>";
            $conn->query($query."')");
            echo $str;
            echo "<br><p><a href=\"rules.php\">Lancer la partie</a></p>";
        }
        if($problem==2 || $problem==5 || $problem==6 || $problem==9)
            echo "<br><p>Pseudo/Mot de passe du joueur 2 incorrect.</p>";
        if($problem==3 || $problem==5 || $problem==7 || $problem==9)
            echo "<br><p>Pseudo/Mot de passe du joueur 3 incorrect.</p>";
        if($problem==4 || $problem==6 || $problem==7 || $problem==9)
            echo "<br><p>Pseudo/Mot de passe du joueur 4 incorrect.</p>";
        if($problem!=0)
            echo "<br><form action='' method='post'><input type='hidden' name='try_again' placeholder='ok'><button type='submit'>Rééssayer</button></form>";

    }
    else{
?>
        <form class="form" action="" method="post">
            <input type="text" name="pseudo1" placeholder="<?php echo $_SESSION['pseudo']; ?>">
            <div id="player2" hidden>
                <input type="text" name="pseudo2" placeholder="Pseudo Joueur 2">
                <input type="password" name="password2" placeholder="Password">
            </div>
            <div id="player3" hidden>
                <input type="text" name="pseudo3" placeholder="Pseudo Joueur 3">
                <input type="password" name="password3" placeholder="Password">
            </div>
            <div id="player4" hidden>
                <input type="text" name="pseudo4" placeholder="Pseudo Joueur 4">
                <input type="password" name="password4" placeholder="Password">
            </div>
            <br><br>
            <button type="button" id="add_player">Ajouter un joueur</button>
            <button type="submit">Démarrer la partie</button>
        </form>
            
<?php
    }
?>