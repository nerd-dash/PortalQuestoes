<?php

if (!( isset($_SESSION['senha']) and isset($_SESSION['cpf']))) {

    session_unset();
    session_destroy();
    header('location:index.php');
    die();
}
 

$dbHost = "127.0.0.1";
$dbName = "escola_db";
$user = "root";
$password = "";
$dbConnection = mysqli_connect($dbHost, $user, $password, $dbName);
mysqli_set_charset($dbConnection, 'utf8');

if (!$dbConnection) {
    die("Connection failed: " . mysqli_connect_error());
}


?>