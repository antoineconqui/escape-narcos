<?php
    require '../db.php';
    $result = $db -> query('SELECT id FROM teams ORDER BY id DESC LIMIT 1');
    echo $result->fetch_assoc()['id'];
?>