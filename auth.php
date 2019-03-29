<!-- Cette page contient le script de vérification de l'authentification -->

<?php
    session_start();
    if(!isset($_SESSION["pseudo"])){ //Si le pseudo du joueur n'a pas été enregistré (c'est à dire utilisateur non connecté)
        header("Location: login.php"); //Redirige vers la page de connexion
        exit();
    }
?>