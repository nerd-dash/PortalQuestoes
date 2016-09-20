<!DOCTYPE html>
<html>
    <head>
        <?php
        session_start();
        require 'db/block.php';
        ?>
        <title>Portal do Professor</title>
    </head>
    <body>
        <div class="row centered-form center-block">
            <div class="container col-md-4 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2>Prof. <?php echo $nome . " - " . $_SESSION['descDisciplina'] ?> </h2></div>
                    <h3>Menu Principal</h3>
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation"><a href="novaQuestao.php">Inserir Nova Questão</a></li>
                        <li role="presentation"><a href="apagaQuestao.php">Apagar Questão</a></li>
                        <li role="presentation"><a href="atualizaQuestao.php">Atualizar Questão</a></li>
                        <li role="presentation"><a href="mostraQuestoes.php">Mostrar todas Questões</a></li>
                        <li role="presentation"><a href="montaProva.php">Montar uma Prova</a></li>
                        <li role="presentation"><a href="lancaFrequencia.php">Lançamento de Frequência</a></li>
                        <li role="presentation"><a href="db/destroySession.php">Sair</a></li>
                    </ul>
                </div>
            </div> <!-- /container -->
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
