<?php
    require '../db.php';
    $messages = $db -> query('SELECT * FROM messages WHERE team IN (SELECT id FROM teams WHERE playing=1)');
    if(!$messages){
        echo "";
    }
    else{
        while($message = $messages->fetch_assoc()){
            $json[] = array(
                'id' => $message['id'],
                'date' => $message['date'],
                'game' => $message['game'],
                'team' => $message['team'],
                'question' => $message['question'],
                'answer' => $message['answer'],
             );
        }
        echo json_encode($json);
    }
?>