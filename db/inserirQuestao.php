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
$disciplina = preg_replace("/[^0-9]/", "", $_SESSION['idDisciplina']);
$questao = $_POST['questao'];
$correta = preg_replace("/[^0-9]/", "", $_POST['altCorreta']);


$numRespostas = count($_POST) - 2;
$respostas = [];

for ($x = 0; $x <= $numRespostas - 1; $x++) {
    $str = "resposta" . ($x + 1);
    $respostas[$x] = $_POST[$str];
}

$sqlStr = "INSERT INTO questoes (questao, idDisciplina, cpf) VALUES ('$questao','$disciplina','$cpf')";

$sqlResult = mysqli_query($dbConnection, $sqlStr);
if ($sqlResult) {
    $ultimoId = mysqli_insert_id($dbConnection);
    for ($i = 0; $i < count($respostas); $i++) {
        if ($correta == $i + 1) {
            $respCerta = true;
        } else {
            $respCerta = false;
        }
        $sqlStr = "INSERT INTO alternativas (resposta, idQuestao, correta) VALUES ('$respostas[$i]','$ultimoId','$respCerta')";
        $sqlResult = mysqli_query($dbConnection, $sqlStr);
        if (!$sqlResult) {
            die("Erro ao inserir respostas :" . mysqli_errno($dbConnection));
        } else {
            echo "<script> alert('Sua questão foi armazenada!'); window.history.back();</script>";
        }
    }
}
mysqli_close($dbConnection);


