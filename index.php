<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>Escape the Narcos</title>
</head>
<body>
    <div class="frame blink">
        <h1>ESCAPE THE NARCOS</h1>
    </div>
    <div class="frame">
        <div class="row">
            <div class="col-6">
                <h2 id="register">Inscription</h2>
            </div>
            <div class="col-6">
                <h2 id="login">Connexion</h2>
            </div>
        </div>
        <div class="row">
            <div class="form" id="register-content" hidden=true>
            <form action="register.php">
                Pseudo : <br>
                <input type="text" name="pseudo"><br>
                Password : <br>
                <input type="text" name="lastname"><br><br>
                <input type="submit" value="Envoyer">
            </form>
            </div>
            <div class="form" id="login-content" hidden=true>
                <span>TEST</span>                    
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>