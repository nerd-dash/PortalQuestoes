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
        <form method="post" action="db/setDisciplinaSession.php">
            <select name="idDisciplina">
                <?php include_once 'db/selectDisciplinas.php'; ?>  
            </select>
            <input type="submit" value="Acessar">
        </form>
        <a href="menu.php">Voltar ao Menu</a>
    </body>
</html>
