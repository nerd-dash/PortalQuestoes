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
        <form method="post" action="respondeProva.php">
            <h2><?php echo $nome  ?> </h2>
        <h3>Provas Disponíveis</h3>
            <?php
            include_once '../db/listarProvas.php';
            ?>
            <button type="submit">Fazer essa prova</button>
        </form>
    </body>
</html>
