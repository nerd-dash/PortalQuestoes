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
    <link href="../css/bootstrap.min.css" rel="stylesheet"><link href="../css/style.css" rel="stylesheet">
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
        <div class="panel-heading container-fluid">Sua nota é :</div>
        <div class="panel-body">
            <form>
                <?php
                include_once '../db/corrigeProva.php';
                include_once '../db/registraProvaFeita.php';
                ?>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $nota ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $nota ?>%">
                        <?php echo $nota ?> pontos.  
                    </div>
                </div>
                <a class="btn btn-default" role="button" href="listaProvas.php">Voltar</a>
            </div>
        </form>
    </div>
</section>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
