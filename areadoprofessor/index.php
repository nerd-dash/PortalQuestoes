<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Portal do Professor</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/signin.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <form class="form-signin" method="post" action="../db/login.php">
                <h2 class="form-signin-heading">Portal do Professor</h2>
                <label for="inputCpf" class="sr-only">CPF</label>
                <input class="form-control" type="text" id="inputCpf" name="inputCpf" placeholder="CPF" required autofocus>
                <label for="inputSenha" class="sr-only">Senha</label>
                <input class="form-control" type="password" id="inputSenha" name="inputSenha"  placeholder="Senha" required>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                <a class="form-control btn btn-default" role="button" href="../areadoaluno/index.php">Área do Aluno</a>
            </form>

        </div>
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
