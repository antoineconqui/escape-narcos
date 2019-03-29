<!-- Cette page contient le script de récupération de la réponse à la question id = $_POST['id'] du gamemaster -->

<?php
    require '../db.php';
    $id = $_POST['id'];
    $result = $db -> query('SELECT answer FROM messages WHERE id ='.$id);
    echo $result->fetch_assoc()['answer'];
?>