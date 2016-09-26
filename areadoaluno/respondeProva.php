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
            </div>
        </nav>
    </section>
    <section class="panel panel-primary ">
        <div class="panel-heading container-fluid">Visualizar questões</div>
        <div class="panel-body">
            <form method="post" action="resultadoProva.php"  onsubmit="return confirm('Você tem certeza que deseja enviar as respostas?');">
                <h4 class="form-signin-heading"><?php echo $_POST['hiddenInput'] ?></h4>
                <?php
                $idProva = $_POST['questaoRadio'];            
                include_once '../db/listaQuestoesProva.php';
                ?>
                <input type="hidden" value="<?php echo $idProva ?>" name="idProva">
                <button class="btn btn-primary" type="submit">Responder Prova</button>
                <a class="btn btn-default" role="button" href="listaProvas.php">Voltar</a>
            </form>
        </div>
    </section>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>
