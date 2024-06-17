<?php
$host = "localhost";
$user = "root";
$pass = "";
$bd = "projetoPhp";

$conexao = new mysqli($host, $user, $pass, $bd);

if ($conexao->connect_error) {
    echo "Conexão falhou: " . $conexao->connect_error;
    exit();
}
?>
