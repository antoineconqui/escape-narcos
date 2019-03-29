<?php
    require 'db.php';
    $id = $_POST['id'];
    $result = $db -> query('SELECT answer FROM messages WHERE id ='.$id);
    echo $result->fetch_assoc()['answer'];
?>