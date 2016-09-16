<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require 'block.php';

if (isset($_POST['questoes'])) {

    require_once 'dbConnect.php';
    $questoes = $_POST['questoes'];

    $idQuestaoList = "";

    $N = count($questoes);

    for ($i = 0; $i < $N; $i++) {
        $idQuestaoList = $idQuestaoList . $questoes[$i];
        if ($i < $N - 1) {
            $idQuestaoList = $idQuestaoList . ",";
        }
    }
    $query = "DELETE FROM questoes WHERE idQuestao IN ($idQuestaoList)";


    $sqlResult = mysqli_query($dbConnection, $query);


    if ($sqlResult) {
        echo "<script> alert('As questões foram apagadas!'); window.location.replace('../menu.php');</script>";
    } else {
        die("Erro ao apagar questão :" . mysqli_errno($dbConnection));
    }

    mysqli_close($dbConnection);
} else {
    echo "<script>window.location.replace('../menu.php');</script>";
}



