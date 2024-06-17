<?php include 'conexao.php';

session_start();

if (isset($_POST['delete'])) {
    $email = $_SESSION['email']; 

    $sql = "DELETE FROM usuarios WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        session_destroy();
        header("Location: ../index.html"); 
        exit();
    } else {
        echo "Erro ao excluir conta: " . $conexao->error;
    }

    $stmt->close();
}

$conexao->close();
?>
