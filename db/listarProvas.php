<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'block.php';
require_once "dbConnect.php";


$N = count($_SESSION['idDisciplinas']);

for ($i = 0; $i < $N; $i++) {
    $idDisciplinasList = $idDisciplinasList . $alunos[$i];
    if ($i < $N - 1) {
        $idDisciplinasList = $idDisciplinasList . ",";
    }
}

$query = "SELECT DISTINCT idProva FROM prova_disciplina WHERE idDisciplina IN ($idDisciplinasList)";
$sqlResult = mysqli_query($dbConnection, $query);


mysqli_close($dbConnection);
