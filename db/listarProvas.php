<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'block.php';
require_once "dbConnect.php";


$N = count($_SESSION['idDisciplinas']);

$idDisciplinasList= "";

for ($i = 0; $i < $N; $i++) {
  $idDisciplinasList = $idDisciplinasList . $_SESSION['idDisciplinas'][$i];
  if ($i < $N - 1) {
    $idDisciplinasList = $idDisciplinasList . ",";
  }
}

$query = "SELECT DISTINCT idProva, GROUP_CONCAT(disciplinas.materia SEPARATOR ', ') AS materias "
. "FROM prova_disciplina, disciplinas WHERE disciplinas.idDisciplina = prova_disciplina.idDisciplina "
. "AND idProva IN (SELECT DISTINCT idProva FROM prova_disciplina WHERE idDisciplina IN ($idDisciplinasList)) AND idProva NOT IN (SELECT idProva FROM prova_aluno WHERE idAluno = ".$_SESSION['idAluno'].") GROUP BY idProva";

$sqlResult = mysqli_query($dbConnection, $query);

$counter = 0;
if (mysqli_num_rows($sqlResult) > 0) {
  while ($row = mysqli_fetch_array($sqlResult)) {

    $id = $row['idProva'];       
    $materias = $row['materias']; 

    

    echo "<div class='panel panel-default clickable'><div class='panel-heading'><div class='radio-inline'><input type='radio' id='".$counter++."'name='questaoRadio' value='$id'><p>Prova ". $id . " - " .$materias. "</p></div></div></div>";

  }
} else {
  echo "<div class='alert alert-warning' role='alert'>Você não tem provas para responder.</div>";
}

mysqli_close($dbConnection);
