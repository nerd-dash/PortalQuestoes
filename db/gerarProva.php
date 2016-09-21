<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require 'block.php';

if (isset($_POST['materias']) && ($_POST['numQuestoes'] > 0)) {

    require_once 'dbConnect.php';
    $materias = preg_replace("/[^0-9]/", "", $_POST['materias']);
    $numQuestoes = preg_replace("/[^0-9]/", "", $_POST['numQuestoes']);

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

        $idQuestoes[] = intval($row['idQuestao']);
    }

    if ((isset($idQuestoes)) && (count($idQuestoes) >= $numQuestoes)) {

        shuffle($idQuestoes);

        $query = "INSERT INTO `provas` (`idProva`, `cpf`) VALUES (NULL, '$cpf');";
        $sqlResult = mysqli_query($dbConnection, $query);

        if ($sqlResult) {

            $ultimoId = mysqli_insert_id($dbConnection);

            $valuesArgument = "";

            for ($index = 0; $index < count($materias); $index++) {
                $valuesArgument .= "('" . $ultimoId . "', '" . $materias[$index] . "')";
                if ($index < count($materias) - 1) {
                    $valuesArgument .= ",";
                }
            }

            $query = "INSERT INTO `prova_disciplina` (`idProva`, `idDisciplina`) VALUES " . $valuesArgument;
            $sqlResult = mysqli_query($dbConnection, $query);

            $valuesArgument = "";

            for ($index = 0; $index < $numQuestoes; $index++) {
                $valuesArgument .= "('" . $ultimoId . "', '" . $idQuestoes[$index] . "')";
                if ($index < $numQuestoes - 1) {
                    $valuesArgument .= ",";
                }
            }

            $sqlStr = "INSERT INTO `provas_questoes` (`idProva`, `idQuestao`) VALUES " . $valuesArgument;
            $sqlResult = mysqli_query($dbConnection, $sqlStr);

            if (!$sqlResult) {
                die("Erro ao inserir questões na prova :" . mysqli_errno($dbConnection));
            } else {
                echo "<script> alert('Sua prova foi criada!'); window.location.replace('../areadoprofessor/montaProva.php');</script>";
            }
        }
    } else {
        echo "<script> alert('Não existem questões suficientes cadastradas para esta prova.'); window.location.replace('../areadoprofessor/novaQuestao.php');</script>";
    }
    mysqli_free_result($sqlResult);
    mysqli_close($dbConnection);
} else {
    echo "<script> alert('Você deve selecionar pelo menos uma matéria'); window.location.replace('../areadoprofessor/montaProva.php');</script>";
}
