<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'block.php';
require_once "dbConnect.php";

$idDisciplina = $_SESSION['idDisciplina'];

$query = "SELECT a.idAluno, a.nome, d.presencas FROM alunos as a, aluno_disciplina as d WHERE a.idAluno = d.idAluno AND d.idDisciplina = '$idDisciplina';";

$sql = mysqli_query($dbConnection, $query);

if (mysqli_num_rows($sql) > 0) {
    
    while ($row = mysqli_fetch_array($sql)) {

        $info = $row['nome'] . " - " . $row['presencas'] ." presenças";
        $id = $row['idAluno'];
        echo "<div><input type='checkbox' name='alunos[]' value='$id'><p id='aluno$id'> $info </p></div>";
    }
} else {
    echo "<div><label>Não há alunos cadastrados nesta matéria.</label><div>";
}

mysqli_close($dbConnection);
