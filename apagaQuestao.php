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
        <form method="post" action="db/apagarQuestao.php">
            <?php require_once 'db/listarQuestoes.php';?>
            <input type="submit" value="Apagar">
        </form>            
    </body>
</html>
