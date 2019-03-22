<?php
    require('db.php');

    if (isset($_POST['pseudo1'])){
        $team = -1;
        do{
            $team++;
            $query = "INSERT INTO teams (id,player1) VALUES ('".$team."','".$_SESSION['pseudo']."')";
        } while(!$conn->query($query));

        if ($_POST['pseudo4']!="")
            $n=4;
        else{
            if ($_POST['pseudo3']!="")
                $n=3;
            else{
                if ($_POST['pseudo2']!="")
                    $n=2;
                else
                    $n=1;
            }
        }

        if($n==1)
            echo "<br>Le joueur est :<br><br>";
        else
            echo "<br>Les ".$n." joueurs sont :<br><br>";

        for ($i=1; $i < $n+1; $i++) {
            $pseudo = $conn->real_escape_string(stripslashes($_REQUEST['pseudo'.$i]));
            $password = $conn->real_escape_string(stripslashes($_REQUEST['password'.$i]));
            if(mysqli_num_rows($conn->query("SELECT * FROM users WHERE pseudo='$pseudo'and password='".md5($password)."'"))==1){
                $conn->query("UPDATE teams SET player".$i." = '".$pseudo."'WHERE id=$team");
                echo "<div class=\"pseudo\">$pseudo</div>";
            }
            else
                echo "<div>Pseudo/Mot de passe du joueur ".$i." incorrect. </div>";
        }
        echo "<br><p><a href=\"rules-solo.php\"> Lancer la partie</a></p>";
    }
    else{
?>
        <form class="form" action="" method="post" name="login">
            <br><input type="text" name="pseudo1" placeholder="Pseudo Joueur 1">
            <input type="password" name="password1" placeholder="Password">
            </form>
        
        <div id="player2" hidden>
            <form action="" method="post" name="player2">
                <br><input type="text" name="pseudo2" placeholder="Pseudo Joueur 2">
                <input type="password" name="password2" placeholder="Password">
                <button type="submit">Valider</button>
            </form>
        </div>
        <div id="player3" hidden>
            <form action="" method="post" name="player2">
                <br><input type="text" name="pseudo3" placeholder="Pseudo Joueur 3">
                <input type="password" name="password3" placeholder="Password">
                <button type="submit">Valider</button>                
            </form>
        </div>
        <div id="player4" hidden>
            <form action="" method="post" name="player2">
                <br><input type="text" name="pseudo4" placeholder="Pseudo Joueur 4">
                <input type="password" name="password4" placeholder="Password">
                <button type="submit">Valider</button>
            </form>
        </div>
            <br><br>
            <button type="button" id="add_player">Ajouter un joueur</button>
            <button type="submit">Démarrer la partie</button>
            
<?php
    }
?>