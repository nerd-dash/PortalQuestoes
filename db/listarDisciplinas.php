<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require 'block.php';
require_once "dbConnect.php";

$query = "SELECT idDisciplina, materia FROM `disciplinas` WHERE idDisciplina IN( SELECT idDisciplina FROM disciplinas_professor WHERE cpf='$cpf')";
$sql = mysqli_query($dbConnection, $query);

if (mysqli_num_rows($sql) > 0) {
    while ($row = mysqli_fetch_array($sql)) {

        $materia = $row['materia'];
        $id = $row['idDisciplina'];
        echo "<div><input type='checkbox' name='materias[]' value='$id'><p id='questao$id'> $materia </p></div>";
    }
} else {
    echo "<div><label>Não há matérias cadastradas.</label><div>";
}

mysqli_close($dbConnection);
