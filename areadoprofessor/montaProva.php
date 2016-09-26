<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <?php
    session_start();
    require '../db/block.php';
    ?>
    <meta charset="UTF-8" http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
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
    <section class="panel panel-primary">
        <div class="panel-heading container-fluid">Gerar Prova</div>
        <div class="panel-body">
            <form method="post" action="../db/gerarProva.php" onsubmit="return checkCheckbox()">
                <div class="panel panel-default">
                    <div class="panel-heading">Quais matérias a prova deve conter?</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <?php
                            require '../db/listarDisciplinas.php';
                            ?>
                        </div>
                    </div>
                    <div class="panel-heading">Quantas questões a prova deve conter?</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input class="form-control" type="number" name="numQuestoes" min="1">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary " type="submit">Gerar</button>
                            <a class="btn btn-default " role="button" href="menu.php">Voltar ao Menu</a>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
</section>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/scripts.js"></script>
</body>
</html>
