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
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Prof. <?php echo $nome . " - " . $_SESSION['descDisciplina'] ?></h2>
        <h3>Questões Cadastradas</h3>
        <?php
        require_once '../db/mostrarQuestoes.php';
        ?>
        <a href="menu.php">Voltar ao Menu</a>
    </body>
</html>
