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
		
		echo "<div class='panel panel-default clickable'><div class='panel-heading'><div class='checkbox-inline'><input type='checkbox' name='questoes[]' value='$id'><p id='questao$id'>$questao</p></div></div></div>";
	}
} else {
	echo "<div class='alert alert-warning' role='alert'>Não existem questões cadastrardas.</div>";
}

mysqli_close($dbConnection);

