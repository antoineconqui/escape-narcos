<?php
    include 'db.php';

    $date = date();
    $team = $_POST['team'];
    $message = $_POST['message'];
    
    $db -> query("INSERT INTO messages VALUES ('','$date',0,$team,'$message','')");
?>