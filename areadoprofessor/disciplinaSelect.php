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
        <div class="panel-heading container-fluid">Selecionar Disciplina</div>
        <div class="panel-body">        
            <form method="post" action="../db/setDisciplinaSession.php">
            <div class="form-group">
                    <select  class="form-control" name="idDisciplina">
                        <?php include_once '../db/selectDisciplinas.php'; ?>  
                    </select>
                </div>
                <input class="btn btn-primary" type="submit" value="Acessar">
                <a class="btn btn-default" role="button" href="index.php">Voltar ao Menu</a>
            </form>

        </div>
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
    </html>
