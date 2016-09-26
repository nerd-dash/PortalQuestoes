<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require 'block.php';
require_once "dbConnect.php";

$query = "SELECT * FROM `disciplinas` WHERE idDisciplina IN( SELECT idDisciplina FROM disciplinas_professor WHERE cpf='$cpf')";
$sql = mysqli_query($dbConnection, $query);

if (mysqli_num_rows($sql) > 0) {
    while ($row = mysqli_fetch_array($sql)) {

        $descricao = $row['materia']  . " - " . $row['periodo'] ."º período " . $row['semestre'] ."º semestre de ". $row['ano'];$materia = $row['materia'];
        $id = $row['idDisciplina'];

        echo "<div class='panel panel-default clickable'><div class='panel-heading'><div class='checkbox-inline'><input class='check' type='checkbox' name='materias[]' value='$id'><span>$descricao</span></div></div></div>";
    }
} else {
    echo "<div class='alert alert-warning' role='alert'>Não há matérias cadastradas.</div>";
}

mysqli_close($dbConnection);

