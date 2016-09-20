<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require 'block.php';
require_once "dbConnect.php";

$query = "SELECT questao, idQuestao FROM `questoes` WHERE cpf = '$cpf' and idDisciplina = '".$_SESSION['idDisciplina']."'";
$sql = mysqli_query($dbConnection, $query);

if (mysqli_num_rows($sql) > 0) {
    while ($row = mysqli_fetch_array($sql)) {

        $questao = $row['questao'];
        $id = $row['idQuestao'];
        echo "<div><input type='radio' name='questaoRadio' value='questao$id'><div><h3> $questao </h3>";
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
    echo "<div><label>Não há questões cadastradas.</label><div>";
}

mysqli_close($dbConnection);
