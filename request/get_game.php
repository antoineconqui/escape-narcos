<?php
    require 'db.php';
    $id = $_POST['id'];
    $games = $db -> query('SELECT * FROM games WHERE id='.$id);
    while($game = $games->fetch_assoc()){
        $json[] = array(
            'name' => $game['name'],
            'rules' => $team['rules']
         );
    }
    echo json_encode($json);
?>