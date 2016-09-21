
<?php

if (empty($_POST['inputCpf']) or empty($_POST['inputSenha'])) {
    header("Location: ../areadoprofessor/index.php");
    die();
    
} else {


    session_start();


    $cpf = preg_replace("/[^0-9]/", "", $_POST['inputCpf']);
    $senha = hash('ripemd160', $_POST['inputSenha']);

    $_SESSION['senha'] = $senha;
    $_SESSION['cpf'] = $cpf;


    require_once "dbConnect.php";


    $query = "SELECT * FROM usuarios where cpf = '$cpf' AND senha = '$senha'";
    $sql = mysqli_query($dbConnection, $query);

    mysqli_close($dbConnection);

//Não vou usar o banco não tem pq deixar aberta conexão;

    $loggedIn = false;

    while ($row = mysqli_fetch_array($sql)) {

        $_SESSION['nome'] = $row['nome'];
        $_SESSION['cpf'] = $row['cpf'];
        $loggedIn = true;
    }

    if (!$loggedIn) {
        echo "<script> alert('Os dados insieridos são inválidos!'); window.history.back();</script>";
    } else {
        header("Location: ../areadoprofessor/disciplinaSelect.php");
    }
}
?>
