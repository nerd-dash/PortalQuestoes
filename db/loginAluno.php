
<?php

if (empty($_POST['inputCpf']) or empty($_POST['inputSenha'])) {
    header("Location: ../areadoaluno/index.php");
    die();
} else {


    session_start();


    $cpf = preg_replace("/[^0-9]/", "", $_POST['inputCpf']);
    $senha = hash('ripemd160', $_POST['inputSenha']);

    $_SESSION['senha'] = $senha;
    $_SESSION['cpf'] = $cpf;


    require_once "dbConnect.php";


    $query = "SELECT * FROM alunos where cpf = '$cpf' AND senha = '$senha'";
    $sql = mysqli_query($dbConnection, $query);


//Não vou usar o banco não tem pq deixar aberta conexão;

    $loggedIn = false;

    while ($row = mysqli_fetch_array($sql)) {

        $_SESSION['nome'] = $row['nome'];
        $_SESSION['cpf'] = $row['cpf'];
        $_SESSION['idAluno'] = $row['idAluno'];
        $loggedIn = true;
    }

    $query = "SELECT * FROM aluno_disciplina where idAluno = ". $_SESSION['idAluno'];

    $sql = mysqli_query($dbConnection, $query);
    
    while ($row = mysqli_fetch_array($sql)) {

        $disciplinas[] = $row['idDisciplina'];
        
    }
    $_SESSION['idDisciplinas'] = $disciplinas;

    mysqli_close($dbConnection);

    if (!$loggedIn) {
        echo "<script> alert('Os dados insieridos são inválidos!'); window.history.back();</script>";
    } else {
        header("Location: ../areadoaluno/listaProvas.php");
    }
}
?>
