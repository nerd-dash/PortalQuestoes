<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portal do Professor</title>

        <!-- Latest compiled and minified CSS -->
        <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!-- Optional theme -->
        <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" -->
    </head>
    <body>
        <h2>Portal do Professor</h2>
        <form method="post" action="db/login.php">
            <label>CPF</label>
            <input type="text" id="inputCpf" name="inputCpf" placeholder="CPF" required autofocus>
            <label>Senha</label>
            <input type="password" id="inputSenha" name="inputSenha"  placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
