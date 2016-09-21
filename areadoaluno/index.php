<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Area do Aluno</title>
    </head>
    <body>
        <h2>Portal do Aluno</h2>
        <form method="post" action="../db/loginAluno.php">
            <label>CPF</label>
            <input type="text" id="inputCpf" name="inputCpf" placeholder="CPF" required autofocus>
            <label>Senha</label>
            <input type="password" id="inputSenha" name="inputSenha"  placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
        <a href="../areadoprofessor/index.php">Área do Professor</a>
        
    </body>
</html>
