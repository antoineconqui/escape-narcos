<?php

    if (isset($_POST['try_again'])){ //Permet de réafficher le fond flou et le cadre de lancement de partie lorsque le joueur rééssaye de lancer la partie
        unset($_POST['pseudo1'],$_POST['try_again']);
        ?>
        <script>
            $("#zoomBackground").show();
            $("#launch_game").show();
        </script>
        <?php
    }

    function ValidUser($n,$db){ //Fonction qui vérifie dans la BDD si l'utilisateur $pseudo de mot de passe $password existe bien
        $pseudo = $db->real_escape_string(stripslashes($_REQUEST['pseudo'.$n]));
        $password = $db->real_escape_string(stripslashes($_REQUEST['password'.$n]));
        return mysqli_num_rows($db->query("SELECT * FROM users WHERE pseudo='$pseudo'and password='".md5($password)."'"))==1;
    }

    if (isset($_POST['pseudo1'])){ //Si au moins un pseudo a été posté par le formulaire d'inscription des joueurs pour le lancement de partie
        ?>
        <script>
            $("#zoomBackground").show();
            $("#launch_game").show();
        </script>
        <?php
        $problem = 0;
        $players = 1;
        $str = "<h3>Les joueurs sont :</h3><br><div class=\"pseudo\">".$_SESSION['pseudo']."</div>"; //Cette chaine de caractères correspond au texte affiché si le lancement de partie est correct
        $query1 = "\"query=INSERT INTO teams VALUES ('',\""; //Cette chaine de caractère correspond à la requète d'insertion de l'équipe dans la BDD lorsque que le lancement de partie est correct
        $query2 = "\",'".$_SESSION['pseudo']."','";

        for ($i=2; $i < 4; $i++) {
            if (!empty($_POST['pseudo'.$i])){
                if (ValidUser($i,$db)){ //Ajoute les utilisateurs valides dans la chaine de caractères de message et dans la chaine de caractères de requète BDD
                    $query2.=$_POST['pseudo'.$i]."','";
                    $str.= "<div class=\"pseudo\">".$_POST['pseudo'.$i]."</div>";
                }
                else
                    $problem+=$i;
            }
            else
                $query2.="','";
        }

        if($problem==0){ //Si tous les joueurs sont valides
            $query2.="',1,'')\"";
            echo $str."<br><button id='launch'>Lancer la partie</button>";
            ?>
            <script>
                $("#launch").click(function(){ //Requète AJAX d'ajout d'équipe dans la BDD
                    $.ajax({
                        url: "request/add_team.php",
                        type: "POST",
                        data: <?php echo $query1; ?>+$.cookie('game')+<?php echo $query2; ?>,
                        success: function(){
                            $.ajax({ //Requête AJAX de récupération de l'id de l'équipe dans la BDD
                                url: "request/get_team_id.php",
                                type: "POST",
                                success: function(data){
                                    $.cookie('team',data); //Définition du cookie 'team' avec l'id de l'équipe
                                    window.location.href = "rules.php"; //Redirection vers la page rules.php
                                }
                            });
                        }   
                    });
                });
            </script>
            <?php
        }
        if($problem==2 || $problem==5 || $problem==6 || $problem==9) //Ces tests de problèmes permettent d'écrire le message d'erreur renvoyé en fonction du nombre d'utilisateurs invalides
            echo "<br><p>Pseudo/Mot de passe du joueur 2 incorrect.</p>";
        if($problem==3 || $problem==5 || $problem==7 || $problem==9)
            echo "<br><p>Pseudo/Mot de passe du joueur 3 incorrect.</p>";
        if($problem==4 || $problem==6 || $problem==7 || $problem==9)
            echo "<br><p>Pseudo/Mot de passe du joueur 4 incorrect.</p>";
        if($problem!=0)
            echo "<br><form action='' method='post'><input type='hidden' name='try_again' placeholder='ok'><button type='submit'>Rééssayer</button></form>"; //Affiche un bouton pour rééssayer

    }
    else{ //Si aucun pseudo n'a été posté par le formulaire, on affiche le formulaire d'inscription des joueurs pour le lancement de partie
        ?>
        <form class="form" action="" method="post">
            <input type="text" name="pseudo1" placeholder="<?php echo $_SESSION['pseudo']; ?>">
            <div id="player2" style="display:none;">
                <input type="text" name="pseudo2" placeholder="Pseudo Joueur 2">
                <input type="password" name="password2" placeholder="Password">
            </div>
            <div id="player3" style="display:none;">
                <input type="text" name="pseudo3" placeholder="Pseudo Joueur 3">
                <input type="password" name="password3" placeholder="Password">
            </div>
            <div id="player4" style="display:none;">
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