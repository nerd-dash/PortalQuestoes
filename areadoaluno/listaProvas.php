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
    <title>Provas Disponíveis</title>
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
            </div>
        </nav>
    </section>
    <section class="panel panel-primary ">
        <div class="panel-heading container-fluid">Visualizar questões</div>
        <div class="panel-body">
            <form method="post" action="respondeProva.php" onsubmit="return checkRadio();">
                <div class="form-group">
                    <?php
                    include_once '../db/listarProvas.php';
                    ?>
                </div>
                <input type="hidden" name="hiddenInput" id="hiddenInput" > <!-- o js vai atribuir a desc da prova selecionada -->
                <button class="btn btn-primary" type="submit">Fazer essa prova</button>
                <a class="btn btn-default" role="button" href="../db/destroySession.php">Sair</a>
            </form>
        </div>
    </section>
</div>    
<script src="../js/jquery.js"></script>
<script src="../js/scripts.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
