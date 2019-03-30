<?php //Cette page contient le script de récupération de l'id de la dernière question posée par une équipe
    require '../db.php';
    $result = $db -> query('SELECT id FROM messages ORDER BY id DESC LIMIT 1');
    echo $result->fetch_assoc()['id'];
?>