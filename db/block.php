<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!( isset($_SESSION['nome']) and isset($_SESSION['cpf']))) {
    session_unset();
    session_destroy();
    header('location:index.php');
    die();
    
} else {
    $nome = $_SESSION['nome'];
    $cpf = $_SESSION['cpf'];
}