<?php 

require 'block.php';
require_once "dbConnect.php";

$idDisciplina = preg_replace("/[^0-9]/", "", $_SESSION['idDisciplina']);

$query = "SELECT a.idAluno, a.nome AS nome, (SELECT COUNT(f.idOcorrencia) FROM frequencias f WHERE f.idOcorrencia = 1 AND f.idAluno = a.idAluno AND f.idDisciplina = '$idDisciplina' )AS presenca, (SELECT COUNT(f.idOcorrencia) FROM frequencias f WHERE f.idOcorrencia = 2 AND f.idAluno = a.idAluno AND f.idDisciplina = '$idDisciplina' )AS falta, (SELECT COUNT(f.idOcorrencia) FROM frequencias f WHERE f.idOcorrencia = 3 AND f.idAluno = a.idAluno AND f.idDisciplina = '$idDisciplina' )AS justificada , (SELECT DATE_FORMAT(max(dataOcorrencia),'%d/%m/%Y') from frequencias f WHERE f.idAluno = a.idAluno ) AS ultimaData FROM alunos a WHERE a.idAluno IN (SELECT idAluno FROM aluno_disciplina WHERE idDisciplina = '$idDisciplina')";


$sql = mysqli_query($dbConnection, $query);

if (mysqli_num_rows($sql) > 0) {

	echo  "<div class='table-responsive'>
	<table class='table table-striped'>
		<thead>
			<tr>
				<th>Aluno</th>
				<th>Presenças</th>
				<th>Faltas</th>
				<th>Faltas Justificadas</th>
				<th>Última Aula</th>
			</tr>
		</thead>
		<tbody>";
			$i =0;
			while ($row = mysqli_fetch_array($sql)) {

				$id = $row['idAluno'];
				$nome = $row['nome'];
				$presenca = $row['presenca'];
				$falta = $row['falta'];
				$justificada = $row['justificada'];
				$ultimaData = $row['ultimaData'];

				if($i == 0){
					$checked = "checked";
				} else {
					$checked = "";
				}

				$i++;

				echo "<tr class='clickable'>";
				echo "	<td>
				<span for='$id'><input class='check' type='radio' name='idAluno' id='$id' value='$id' $checked>$nome</span>
			</td>";
			echo "	<td>
			<span for='$id'>$presenca</span>
		</td>";
		echo "	<td>
		<span for='$id'>$falta</span>
	</td>";
	echo "	<td>
	<span for='$id'>$justificada</span>
</td>";
echo "	<td>
<span for='$id'>$ultimaData</span>
</td>";
echo "</tr>";
}
echo "	</tbody>
</table>
</div>";
} else {
	echo "<div class='alert alert-warning' role='alert'>Não há alunos cadastrados nesta matéria.</div>";
}

mysqli_close($dbConnection);






?>