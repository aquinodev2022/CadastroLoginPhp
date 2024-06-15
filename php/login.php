<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";  // Verificando a senha em texto claro (não recomendado)
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        session_start();
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['senha'] = $row['senha'];  // Armazenando a senha na sessão

        // Redireciona para a página de perfil
        header('Location: perfil.php');
        exit();
    } else {
        echo "Usuário ou senha incorretos";
    }

    $conn->close();
}
?>
