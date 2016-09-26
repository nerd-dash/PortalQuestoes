<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    require '../db/block.php';
    ?>
    <meta charset="UTF-8" http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <section class="header">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="">
                        <?php echo $nome ?>
                    </a>
                </div>
                <p class="navbar-text"><?php echo "Discipila - " . $_SESSION['descDisciplina']?>                    
                </p>
            </div>
        </nav>
    </section>
    <section class="alternativas panel panel-primary ">
    <div class="panel-heading container-fluid">Inserir nova questão</div>
        <div class="panel-body">
            <form  method="post" action="../db/inserirQuestao.php" onsubmit="return checkRadio()">
                <div class="form-group">
                    <textarea class="form-control" name="questao" placeholder="Enunciado da questão..."></textarea>
                </div>
                <div class="form-group">
                    <div class="input_fields_wrap">
                        <div class="row-fluid">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type='radio' name='altCorreta' value='1'>
                                </span>
                                <input class='form-control' type='text' name='resposta1' placeholder='Alternativa 1'>
                                <span class="input-group-btn">
                                    <button class='remove_field btn btn-danger' role='button'>
                                        <span class='glyphicon glyphicon-remove-sign remove_field' aria-hidden='true'>
                                        </span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="add_field_button btn btn-success" type="button">
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Adicionar uma Alternativa
                    </button>
                </div>
                <button class="btn btn-primary" type="submit">Salvar</button>
                <a class="btn btn-default" role="button" href="menu.php">Voltar ao Menu</a>
            </form>
        </div>
    </section>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
</body>
</html>
