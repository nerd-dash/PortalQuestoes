<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'block.php';
require_once "dbConnect.php";

$query = "SELECT * FROM `disciplinas` WHERE idDisciplina IN (SELECT idDisciplina FROM disciplinas_professor WHERE cpf = '$cpf');";
$sql = mysqli_query($dbConnection, $query);

while ($row = mysqli_fetch_array($sql)) {

    $id = $row['idDisciplina'];
    $descricao = $row['materia']  . " - " . $row['periodo'] ."º período " . $row['semestre'] ."º semestre de ". $row['ano'];
    echo "<option id='disciplina" . $id . "' value='$id'> $descricao </option>";
}
mysqli_close($dbConnection);

