<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require 'block.php';
require_once "dbConnect.php";

$idDisciplina = preg_replace("/[^0-9]/", "", $_POST['idDisciplina']);

$query = "SELECT * FROM disciplinas where idDisciplina = '$idDisciplina'";
$sql = mysqli_query($dbConnection, $query);

  while ($row = mysqli_fetch_array($sql)) {

        $_SESSION['idDisciplina'] = $row['idDisciplina'];
        $_SESSION['descDisciplina'] = $row['materia']  . " - " . $row['periodo'] ."º período "
           . $row['semestre'] ."º semestre de ". $row['ano'];
        $_SESSION['numeroDeAulas'] = $row['numeroDeAulas'];
    }

header("Location: ../areadoprofessor/menu.php");
