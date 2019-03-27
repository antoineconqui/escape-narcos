<?php
    require 'db.php';
    include 'auth.php';
?>

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
    $pseudo = $_SESSION['pseudo'];

    $teams = $db->query("SELECT * FROM teams WHERE playing=1");
    $messages = $db->query("SELECT * FROM messages WHERE team IN (SELECT id FROM teams WHERE playing=1)");
?>

<script>
    let team;
    let container;
    let message;
    let answer;
    let form;
    let input;
    let button;
    let submit;
</script>

    <div class="blink">
        <h1>ESCAPE THE NARCOS</h1>
    </div>
    <p class="menu">Game Master : <?php echo $pseudo; ?> - 
    <a href="index.php">Retour au menu</a> -
    <a href="logout.php">Déconnexion</a></p>

    <div class="frame">

        <h2>PARTIES EN COURS - <a href="gamemaster.php">ACTUALISER</a></h2>

<?php

        foreach($_POST as $id => $answer){
            if($answer!="")
                $db -> query("UPDATE messages SET answer = '$answer' WHERE id = $id");
        }
        if(!$teams){
            echo "<h3>Aucune équipe n'est en train de jouer ...</h3>";
        }
        else{
            while ($team = $teams->fetch_assoc()) {
                echo "<div class='message-box'>
                        <div class='message-header'>
                            <h4>Equipe : ".$team['player1'];
                            for ($i=2; $i < 5; $i++)
                                if ($team['player'.$i]!=null)
                                    echo " - ".$team['player'.$i];
                    echo "</h4>
                        </div>
                        <div class='message-text' id='team".$team['id']."'>
    
                        </div>
                    </div>";
            }
        }

        if(!$messages){
        }
        else{
            while ($message = $messages->fetch_assoc()) {
                ?>
                <script>
                    team = document.getElementById("team<?php echo $message['team']; ?>");
                        container = document.createElement("div");
                            container.id = "message<?php echo $message['id']; ?>"   ;
                        message = document.createElement("p");
                            message.textContent = "Question : <?php echo $message['message']; ?>";
                            container.appendChild(message);
                        if("<?php echo $message['answer']; ?>"!=""){
                            answer = document.createElement("p");
                                answer.textContent = "Réponse : <?php echo $message['answer']; ?>";
                                container.appendChild(answer);
                        }
                        else{
                            form = document.createElement("form");
                                form.className = "message-text";
                                form.method = 'post';
                                form.action = 'gamemaster.php';
                            input = document.createElement("input");
                                input.type = 'text'; 
                                input.name = "<?php echo $message['id']; ?>";
                            button = document.createElement("button");
                                button.type = 'submit';
                                button.className = 'button';
                                button.textContent = 'Répondre';
                            form.appendChild(input);
                            form.appendChild(button);
                            container.appendChild(form);
                        }
                        team.appendChild(container);
                </script>
                <?php
            }
        }
?>
        
    </div>

    <script>
        submit = document.getElementsByClassName("button");

        for (var i = 0; i < submit.length; i++) {
            submit[i].addEventListener('click', function(){
                location.reload();
            });
        }
    </script>
    
</body>

</html>