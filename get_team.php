<?php
    require 'db.php';
    $teams = $db -> query('SELECT * FROM teams WHERE playing=1');
    while($team = $teams->fetch_assoc()){
        $json[] = array(
            'id' => $team['id'],
            'game' => $team['game'],
            'player1' => $team['player1'],
            'player2' => $team['player2'],
            'player3' => $team['player3'],
            'player4' => $team['player4'],
            'playing' => $team['playing']
         );
    }
    echo json_encode($json);
?>