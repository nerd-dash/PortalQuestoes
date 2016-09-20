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
            <h2>Prof. <?php echo $nome  ?></h2>
            <h3>Disciplinas da prova</h3>
            <?php
            require 'db/listarDisciplinas.php';
            ?>
            <label>Quantidade de questões</label>
            <input type="number" name="numQuestoes">
            <input type="submit" value="Gerar Prova">
        </form>
        <a href="menu.php">Voltar ao Menu</a>
    </body>
</html>
