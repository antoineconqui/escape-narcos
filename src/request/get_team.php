<?php // Cette page contient le script de récupération des équipes qui sont actuellement en train de jouer
    require '../db.php';
    $teams = $db -> query('SELECT * FROM teams WHERE playing=1');
    if(!$teams or $teams->num_rows==0){
        
    }
    else{
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
    }
?>