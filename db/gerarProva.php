<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require 'block.php';

if (isset($_POST['materias'])) {

    require_once 'dbConnect.php';
    $materias = $_POST['materias'];
    $numQuestoes = $_POST['numQuestoes'];

    $idDisciplinaList = "";

    $N = count($materias);

    for ($i = 0; $i < $N; $i++) {
        $idDisciplinaList = $idDisciplinaList . $materias[$i];
        if ($i < $N - 1) {
            $idDisciplinaList = $idDisciplinaList . ",";
        }
    }
    $query = "SELECT idQuestao FROM questoes WHERE idDisciplina IN ($idDisciplinaList) AND cpf = '$cpf'";

    $sqlResult = mysqli_query($dbConnection, $query);


    while ($row = mysqli_fetch_array($sqlResult)) {

        $idQuestoes[] = $row['idQuestao'];
    }

    mysqli_free_result($sqlResult);
    mysqli_close($dbConnection);


    if (count($idQuestoes) >= $numQuestoes) {
        
    }
} else {
    echo "<script>window.location.replace('../menu.php');</script>";
}
