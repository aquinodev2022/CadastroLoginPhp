<?php
$host = "localhost";
$user = "root";
$pass = "";
$bd = "projetoPhp";

$conn = new mysqli($host, $user, $pass, $bd);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
