<?php
session_start();

include 'conexao.php';

if (isset($_POST['delete'])) {
    $email = $_SESSION['email']; 

    $sql = "DELETE FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        session_destroy();
        header("Location: ../index.html"); // Redireciona para a página de login após excluir a conta
        exit();
    } else {
        echo "Erro ao excluir conta: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
