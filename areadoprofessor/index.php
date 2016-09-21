<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Portal do Professor</title>
    </head>
    <body>
        <h2>Portal do Professor</h2>
        <form method="post" action="../db/login.php">
            <label>CPF</label>
            <input type="text" id="inputCpf" name="inputCpf" placeholder="CPF" required autofocus>
            <label>Senha</label>
            <input type="password" id="inputSenha" name="inputSenha"  placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
        <a href="../areadoaluno/index.php">Área do Aluno</a>

    </body>
</html>
