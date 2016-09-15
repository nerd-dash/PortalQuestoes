<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

Git teste
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
        <form method="post" action="updateQuestao.php">
            <?php
            require_once 'db/listarQuestoesAlternativas.php';
            ?>
            <input type="submit" value="Escolher">
        </form>
    </body>
</html>
