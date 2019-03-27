<?php
    include 'db.php';
    $message = $_POST['message'];
    $date = date();
    $team = $_SESSION['team'];
    $db -> query("INSERT INTO messages VALUES ('','$date',0,$team,'$message','')");
?>