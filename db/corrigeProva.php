<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'block.php';
require_once "dbConnect.php";


foreach ($_POST as $value) {
    $respostas[] = $value;
}

$N = count($respostas);
$idRespostasList = "";

for ($i = 0; $i < $N; $i++) {
    $idRespostasList = $idRespostasList . $respostas[$i];
    if ($i < $N - 1) {
        $idRespostasList = $idRespostasList . ",";
    }
}
$query = "SELECT idAlternativa FROM alternativas WHERE correta = true AND idAlternativa IN ($idRespostasList)";
$sql = mysqli_query($dbConnection, $query);
$nota = 0;

if ($sql) {
    if (mysqli_num_rows($sql) > 0) {
        while ($row = mysqli_fetch_array($sql)) {
            $nota += (100 / count($respostas));

        }
        $nota = number_format($nota, 2, '.', '');
    }
} else {
    echo "<div class='alert alert-warning' role='alert'>Não foi possível corrigir a prova.<div>";
}


