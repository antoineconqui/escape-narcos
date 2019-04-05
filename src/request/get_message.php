<?php //Cette page contient le script de récupération des questions des différentes équipes qui sont actuellement en train de jouer
    require '../db.php';
    $messages = $db -> query('SELECT * FROM messages WHERE team IN (SELECT id FROM teams WHERE playing=1)');
    if(!$messages or $messages->num_rows==0){
    }
    else{
        while($message = $messages->fetch_assoc()){
            $json[] = array(
                'id' => $message['id'],
                'date' => $message['date'],
                'team' => $message['team'],
                'question' => $message['question'],
                'answer' => $message['answer'],
             );
        }
        echo json_encode($json);
    }
?>