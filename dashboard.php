<?php
    require('db.php');
    include("auth.php");
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard - Secured Page</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="frame">
        <p>Dashboard</p>
        <p>This is another secured page.</p>
        <p><a href="index.php">Home</a></p>
        <a href="logout.php">Logout</a>
    </div>
</body>

</html>