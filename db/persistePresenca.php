<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require 'block.php';


if (isset($_POST)) {

    require_once 'dbConnect.php';
    $quantAlunos = count($_POST)/2;

    for ($i=0; $i < $quantAlunos ; $i++) { 
        $alunos[] = $_POST['aluno'.$i];
    }
    
    for ($i=0; $i < $quantAlunos ; $i++) { 
        $ocorrencias[] = $_POST['ocorrencia'.$i];
    }
    
    $idDisciplina = $_SESSION['idDisciplina'];

    $valuesList = "";

    $quantAlunos = count($_POST)/2;

    for ($i = 0; $i < $quantAlunos; $i++) {
        $valuesList = $valuesList . "(" .$alunos[$i] .",". $idDisciplina .",". $ocorrencias[$i] .", CURDATE())" ;
        if ($i < $quantAlunos - 1) {
            $valuesList = $valuesList . ",";
        }
    }
    $query = "INSERT INTO `frequencias` (`idAluno`, `idDisciplina`, `idOcorrencia`, `dataOcorrencia`) VALUES ".$valuesList.";";

    $sqlResult = mysqli_query($dbConnection, $query);


    if ($sqlResult) {
        echo "<script> alert('Os dados de presença foram salvos!'); window.location.replace('../areadoprofessor/lancaFrequencia.php');</script>";
    } else {
        echo("Erro ao registrar presenças :" . mysqli_errno($dbConnection));
        header("LOCATION: ../areadoprofessor/lancaFrequencia.php");
    }

    mysqli_close($dbConnection);
} else {
    echo "<script>window.location.replace('../areadoprofessor/lancaFrequencia.php');</script>";
}

