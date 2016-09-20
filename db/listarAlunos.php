<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'block.php';
require_once "dbConnect.php";

$idDisciplina = 1;

$query = "SELECT nome, idAluno FROM `alunos` WHERE idAluno IN (SELECT idAluno FROM aluno_disciplina WHERE idDisciplina = '$idDisciplina')";

$sql = mysqli_query($dbConnection, $query);

if (mysqli_num_rows($sql) > 0) {
    while ($row = mysqli_fetch_array($sql)) {

        $nome = $row['nome'];
        $id = $row['idAluno'];
        echo "<div><input type='checkbox' name='alunos[]' value='$id'><p id='aluno$id'> $nome </p></div>";
    }
} else {
    echo "<div><label>Não há alunos cadastrados nesta matéria.</label><div>";
}

mysqli_close($dbConnection);
