<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'block.php';
require_once "dbConnect.php";



$query = "SELECT questao, idQuestao FROM `questoes` WHERE idQuestao IN "
        . "(SELECT idQuestao FROM `provas_questoes` WHERE idProva = " . $idProva . ")";
$sql = mysqli_query($dbConnection, $query);

if (mysqli_num_rows($sql) > 0) {
    while ($row = mysqli_fetch_array($sql)) {

        $questao = $row['questao'];
        $id = $row['idQuestao'];
        echo "<div><h4> $questao </h4>";
        $queryAlternativas = "SELECT idAlternativa, resposta FROM `alternativas` WHERE idQuestao = '$id'";
        $sqlAlternativas = mysqli_query($dbConnection, $queryAlternativas);
        while ($alt = mysqli_fetch_array($sqlAlternativas)) {

            echo "<label><input type='radio' name='questao" . $id . "' value='" . $alt['idAlternativa'] . "'>" . $alt['resposta'] . "</input></label>";
        }
        echo "</div>";
    }
} else {
    echo "<div><label>Não há questões cadastradas.</label><div>";
}

mysqli_close($dbConnection);
