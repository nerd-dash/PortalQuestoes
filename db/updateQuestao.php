<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


session_start();
require 'block.php';
require_once 'dbConnect.php';

$cpf = $_SESSION['cpf'];
$disciplina = preg_replace("/[^0-9]/", "", $_POST['disciplina']);
$questao = $_POST['questao'];
$questaoId = $_SESSION['questaoId'];
$correta = preg_replace("/[^0-9]/", "", $_POST['altCorreta']);


$numRespostas = 4;
$respostas = [];

for ($x = 0; $x <= $numRespostas - 1; $x++) {
    $str = "resposta" . ($x + 1);
    $respostas[$x] = $_POST[$str];
}

$sqlStr = "UPDATE questoes SET questao = '$questao', idDisciplina = '$disciplina' WHERE idQuestao= '$questaoId'";
$sqlResult = mysqli_query($dbConnection, $sqlStr);

if ($sqlResult) {

    for ($i = 0; $i < count($respostas); $i++) {

        $idAlt = $_SESSION['idAlt' . $i];

        if ($correta == $i + 1) {
            $respCerta = true;
        } else {
            $respCerta = false;
        }

        $sqlStr = "UPDATE alternativas SET resposta = '$respostas[$i]', correta = '$respCerta' WHERE idAlternativa = '$idAlt'";
        $sqlResult = mysqli_query($dbConnection, $sqlStr);

        if (!$sqlResult) {
            die("Erro ao atualizar respostas :" . mysqli_errno($dbConnection));
        } else {
            echo "<script> alert('Sua questão foi armazenada!'); window.location.replace('../atualizarQuestao.php');</script>";
        }
    }
}
mysqli_close($dbConnection);


