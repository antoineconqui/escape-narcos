<?php
    include("auth.php");
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Escape The Narcos</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <div class="blink">
        <h1>ESCAPE THE NARCOS</h1>
    </div>

    <div class="frame">
        <p>Bienvenue <?php echo $_SESSION['pseudo']; ?>!</p>
        <p>Vous êtes sur la page principale d'Escape The Narcos !</p>
        <p><a href="dashboard.php">Dashboard</a></p>
        <a href="logout.php">Logout</a>
    </div>
    
</body>

</html>