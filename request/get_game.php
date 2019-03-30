<?php //Cette page contient le script de récupération des différents escape game présents dans la base de données
    require '../db.php';
    $id = $_POST['id'];
    $games = $db -> query('SELECT * FROM games WHERE id='.$id);
    while($game = $games->fetch_assoc()){
        $json[] = array(
            'id' => $game['id'],
            'name' => $game['name'],
            'title' => $game['title'],
            'text' => $game['text'],
            'rules' => $game['rules'],
            'nbEnigme' => $game['nbEnigme'],
            'delay_indices' => $game['delay_indices'],
            'text_indices' => $game['text_indices']
         );
    }
    echo json_encode($json);
?>