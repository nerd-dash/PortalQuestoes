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
        require 'db/block.php';
        ?>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="db/gerarProva.php">
            <label>Disciplinas da prova</label>
            <?php
            require 'db/listarDisciplinas.php';
            ?>
            <label>Quantidade de questões</label>
            <input type="number">
            <input type="submit" value="Gerar Prova">
        </form>

    </body>
</html>
