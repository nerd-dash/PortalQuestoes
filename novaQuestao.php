<!DOCTYPE html>
<html>
    <head>
        <?php
        session_start();
        require 'db/block.php';
        ?>
        <meta charset="utf-8">
    </head>
    <body>
        <form method="post" action="db/inserirQuestao.php">
            <h2>Prof. <?php echo $nome . " - " . $_SESSION['descDisciplina'] ?></h2>
            <h3>Inserir Nova Questão </h3>
            <textarea name="questao"></textarea>
            <input type="radio" name="altCorreta" value="1">
            <input type="text" name="resposta1">
            <input type="radio" name="altCorreta" value="2">
            <input type="text" name="resposta2">
            <input type="radio" name="altCorreta" value="3">
            <input type="text" name="resposta3">
            <input type="radio" name="altCorreta" value="4">
            <input type="text" name="resposta4">
            <button type="submit">Salvar</button>
        </form>
        <a href="menu.php">Voltar ao Menu</a>
    </body>
</html>
