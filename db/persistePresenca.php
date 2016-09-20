<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require 'block.php';

if (isset($_POST['alunos'])) {

    require_once 'dbConnect.php';
    $alunos = $_POST['alunos'];

    $idAlunosList = "";

    $N = count($alunos);

    for ($i = 0; $i < $N; $i++) {
        $idAlunosList = $idAlunosList . $alunos[$i];
        if ($i < $N - 1) {
            $idAlunosList = $idAlunosList . ",";
        }
    }
    $query = "UPDATE aluno_disciplina SET presencas = presencas + 1 WHERE idDisciplina = '$idDisciplina' AND idAluno IN ($idAlunosList)";
    echo $query;
    die();
    $sqlResult = mysqli_query($dbConnection, $query);


    if ($sqlResult) {
        echo "<script> alert('Os dados de presença foram salvos!'); window.location.replace('../menu.php');</script>";
    } else {
        die("Erro ao registrar presenças :" . mysqli_errno($dbConnection));
    }

    mysqli_close($dbConnection);
} else {
    echo "<script>window.location.replace('../menu.php');</script>";
}

