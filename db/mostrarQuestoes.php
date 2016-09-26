<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'block.php';
require_once "dbConnect.php";

$idDisciplina = preg_replace("/[^0-9]/", "", $_SESSION['idDisciplina']);

$query = "SELECT questao, idQuestao FROM `questoes` WHERE cpf = '$cpf' AND idDisciplina = '$idDisciplina'";
$sql = mysqli_query($dbConnection, $query);

if (mysqli_num_rows($sql) > 0) {
    while ($row = mysqli_fetch_array($sql)) {

        $questao = $row['questao'];
        $id = $row['idQuestao'];
        echo "<div class='panel panel-default'><div class='panel-heading'><div class='radio-inline'>$questao</div></div><div class='panel-body'>";

        $queryAlternativas = "SELECT resposta, correta FROM `alternativas` WHERE idQuestao = '$id'";
        $sqlAlternativas = mysqli_query($dbConnection, $queryAlternativas);
        while ($alt = mysqli_fetch_array($sqlAlternativas)) {
            if ($alt['correta'] == 1) {
                echo "<p><b>" . $alt['resposta'] . " (correta)</b></p>";
            } else {

                echo "<p>" . $alt['resposta'] . "</p>";
            }
        }
         echo "</div></div>";
    }
} else {
    echo "<div class='alert alert-warning' role='alert'>Não há questões cadastradas.</div>";
}

mysqli_close($dbConnection);

