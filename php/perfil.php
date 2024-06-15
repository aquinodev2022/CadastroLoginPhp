<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];  // Recuperando a senha da sessão

include '../perfil.html';
?>
