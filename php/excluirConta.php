<?php
session_start();
include 'conexao.php';

// Verifica se o usuário está logado
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // SQL para excluir a conta
    $sql = "DELETE FROM usuarios WHERE email = ?";

    // Prepara a declaração
    if ($stmt = $conexao->prepare($sql)) {
        $stmt->bind_param("s", $email);

        // Executa a declaração
        if ($stmt->execute()) {
            // Fecha a sessão e redireciona para a página de login
            session_destroy();
            header("Location: ../php/home.php");
            exit;
        } else {
            echo "Erro ao excluir a conta: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro ao preparar a declaração: " . $conexao->error;
    }
} else {
    echo "Usuário não logado.";
}

$conexao->close();
?>
