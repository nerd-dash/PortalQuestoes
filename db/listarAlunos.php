<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'block.php';
require_once "dbConnect.php";

$idDisciplina = $_SESSION['idDisciplina'];

$queryOcorrencia = "SELECT idOcorrencia, abrev FROM `ocorrencias`";
$sqlOcorrencia = mysqli_query($dbConnection, $queryOcorrencia);


while ($row = mysqli_fetch_array($sqlOcorrencia)) {

	$id = $row['idOcorrencia'];	
	$abrev = $row['abrev'];
	$ocorrencias[$id] = $abrev;
	
}



$query = "SELECT a.idAluno, a.nome FROM alunos as a, aluno_disciplina as d WHERE a.idAluno = d.idAluno AND d.idDisciplina = '".$idDisciplina."'";


$sql = mysqli_query($dbConnection, $query);



if (mysqli_num_rows($sql) > 0) {
	$index = 0;
	while ($row = mysqli_fetch_array($sql)) {

		$nome = $row['nome'];
		$id = $row['idAluno'];

		echo "<div class='row-fluid header'>
				<div class='input-group'>
					<span class='input-group-addon'>";
		
		for ($i=1; $i <= count($ocorrencias); $i++) { 
			if($i == 1){
				$checked = "checked";
			} else {
				$checked = "";
			}
			echo "			<input type='radio' name='ocorrencia".($index)."' id='".$i."' value='".$i."' $checked >". $ocorrencias[$i];
		}
		echo "		</span>
					<p class='form-control'>
						$nome
					</p>
				</div>
				<input type='hidden' value='".$id."' name='aluno".$index."'>
			</div>";
		$index++;
	}
} else {
	echo "<div class='alert alert-warning' role='alert'>Não há alunos matriculados nesta matéria.</div>";
}

mysqli_close($dbConnection);

?>