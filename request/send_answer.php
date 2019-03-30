<?php //Cette page contient le script d'envoi de la réponse du gamemaster à la question de numéro $_POST['id'] posée par une équipe
    include '../db.php';
    
    $id = $_POST['id'];
    $answer = $_POST['answer'];
    $db -> query("UPDATE messages SET answer = '".$answer."' WHERE id=".$id);
?>