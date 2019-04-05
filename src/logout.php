<?php
    session_start();
    if(session_destroy()) //Destruction des variables de session et redirection vers login.php
        header("Location: login.php");
?>