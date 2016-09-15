<?php

	require_once "connect.php";

	$sql = mysqli_query($dbConnection, "SELECT * FROM funcionario");
	while($row = mysqli_fetch_array($sql))
	{
		$cpf = $row["cpf"];
		$nome = $row["nome"];
		$senha = $row["senha"];

		echo "<br>". $cpf . " - " . $nome . " - " . $senha;
	}

	mysqli_close($dbConnection);
 ?>
