<?php 

require 'block.php';
require_once "dbConnect.php";

if(isset($_POST)){

	$idAluno = preg_replace("/[^0-9]/", "", $_POST['idAluno']);
	$idDisciplina = preg_replace("/[^0-9]/", "", $_SESSION['idDisciplina']);

	$query = "SELECT DATE_FORMAT(f.dataOcorrencia,'%d/%m/%Y') as dataOcorrencia, o.ocorrencia FROM frequencias f JOIN ocorrencias o ON f.idOcorrencia = o.idOcorrencia WHERE f.idAluno = $idAluno AND f.idDisciplina = $idDisciplina ORDER BY dataOcorrencia DESC";

	$sql = mysqli_query($dbConnection, $query);

	if (mysqli_num_rows($sql) > 0) {

		echo  "<div class='table-responsive'>
			<table class='table table-striped'>
				<thead>
					<tr>
						<th>Data</th>
						<th>Ocorrência</th>
					</tr>
				</thead>
				<tbody>";

		while ($row = mysqli_fetch_array($sql)) {

	
			$ocorrencia = $row['ocorrencia'];
			$dataOcorrencia = $row['dataOcorrencia'];
			

			echo "<tr>";
			echo "	<td>
						$dataOcorrencia
					</td>";
			echo "	<td>						
						$ocorrencia
					</td>";
			echo "</tr>";
		}
		echo "</tbody>
			</table>
			</div>";
	} else {
		echo "<div class='alert alert-warning' role='alert'>Não há alunos matriculados nesta matéria.</div>";
	}

	mysqli_close($dbConnection);

}






?>