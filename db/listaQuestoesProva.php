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
$numeroQuestao = 1;
if (mysqli_num_rows($sql) > 0) {
    while ($row = mysqli_fetch_array($sql)) {

        $questao = $row['questao'];
        $id = $row['idQuestao'];
        echo "<div class='panel panel-default'>
                <div class='panel-body'>
                    <h4 lass='form-signin-heading'>".$numeroQuestao++.") $questao </h4>";
        $queryAlternativas = "SELECT idAlternativa, resposta FROM `alternativas` WHERE idQuestao = '$id'";
        $sqlAlternativas = mysqli_query($dbConnection, $queryAlternativas);
        $counter = 0;
        while ($alt = mysqli_fetch_array($sqlAlternativas)) {
            if($counter++ == 0){
                echo "<div class='radio'><label><input type='radio' name='questao" . $id . "' value='" . $alt['idAlternativa'] . "' checked>" . $alt['resposta'] . "</input></label></div>";
            } else {
                echo "<div class='radio'><label><input type='radio' name='questao" . $id . "' value='" . $alt['idAlternativa'] . "'>" . $alt['resposta'] . "</input></label></div>";
            }
            
        }
        echo "</div></div>";
    }
} else {
    echo "<div class='alert alert-warning' role='alert'>Não há questões cadastradas.</div>";
}

mysqli_close($dbConnection);
