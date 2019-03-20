<?php
    require('db.php');

    if (isset($_POST['pseudo1'])){
        $team = -1;
        do{
            $team++;
            $query = "INSERT INTO teams (id,player1) VALUES ('".$team."','".$_SESSION['pseudo']."')";
        } while(!mysqli_query($con,$query));

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
            $pseudo = mysqli_real_escape_string($con,stripslashes($_REQUEST['pseudo'.$i]));
            $password = mysqli_real_escape_string($con,stripslashes($_REQUEST['password'.$i]));
            if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE pseudo='$pseudo'and password='".md5($password)."'"))==1){
                mysqli_query($con,"UPDATE teams SET player".$i." = '".$pseudo."'WHERE id=$team");
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
            <div id="player2" hidden>
                <br><input type="text" name="pseudo2" placeholder="Pseudo Joueur 2">
                <input type="password" name="password2" placeholder="Password">
            </div>
            <div id="player3" hidden>
                <br><input type="text" name="pseudo3" placeholder="Pseudo Joueur 3">
                <input type="password" name="password3" placeholder="Password">
            </div>
            <div id="player4" hidden>
                <br><input type="text" name="pseudo4" placeholder="Pseudo Joueur 4">
                <input type="password" name="password4" placeholder="Password">
            </div>
            <br><br>
            <button id="add_player">Ajouter un joueur</button>
            <button type="submit">Démarrer la partie</button>
            
        </form>
<?php
    }
?>