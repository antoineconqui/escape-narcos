<?php
    include '../db.php';
    
    $id = $_POST['id'];
    $answer = $_POST['answer'];
    $db -> query("UPDATE messages SET answer = '$answer' WHERE id=$id");
?>