<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'block.php';


if (isset($_POST)) {

    require_once 'dbConnect.php';

    $idAluno = $_SESSION['idAluno'];
    $idProva = preg_replace("/[^0-9]/", "", $_POST['idProva']);

    $query = "INSERT INTO `prova_aluno` (`idAluno`, `idProva`, `nota`) VALUES ('$idAluno', '$idProva', '$nota')";

    $sqlResult = mysqli_query($dbConnection, $query);


    if ($sqlResult) {
        echo "<script> alert('Suas respostas foram gravadas no sistema!');</script>";
    } else {
        echo("Erro ao registrar presenças :" . mysqli_errno($dbConnection));
        header("LOCATION: ../areadoaluno/listaProvas.php");
    }

    mysqli_close($dbConnection);
} else {
    echo "<script>window.location.replace('../areadoproareadoaluno/listaProvas.php');</script>";
}

