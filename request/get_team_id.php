<!-- Cette page contient le script de récupération de l'id de l'équipe qui vient d'être créer en démarrant une partie -->

<?php
    require '../db.php';
    $result = $db -> query('SELECT id FROM teams ORDER BY id DESC LIMIT 1');
    echo $result->fetch_assoc()['id'];
?>