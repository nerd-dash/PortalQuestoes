<!DOCTYPE html>
<html>
    <head>
        <?php
        session_start();
        require '../db/block.php';
        ?>
        <title>Portal do Professor</title>
    </head>
    <body>
        <h2>Prof. <?php echo $nome . " - " . $_SESSION['descDisciplina'] ?> </h2>
        <h3>Menu Principal</h3>
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation"><a href="novaQuestao.php">Inserir Nova Questão</a></li>
            <li role="presentation"><a href="apagaQuestao.php">Apagar Questão</a></li>
            <li role="presentation"><a href="atualizaQuestao.php">Atualizar Questão</a></li>
            <li role="presentation"><a href="mostraQuestoes.php">Mostrar todas Questões</a></li>
            <li role="presentation"><a href="montaProva.php">Montar uma Prova</a></li>
            <li role="presentation"><a href="lancaFrequencia.php">Lançamento de Frequência</a></li>
            <li role="presentation"><a href="../db/destroySession.php">Sair</a></li>
        </ul>
    </body>
</html>
