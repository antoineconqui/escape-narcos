<?php
    require '../db.php';
    include '../auth.php';

    $query = $_POST['query'];
    $db -> query($query);
?>
