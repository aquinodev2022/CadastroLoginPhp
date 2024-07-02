<?php
$updateMessage = "";

$host = "localhost";
$user = "root";
$pass = "";
$bd = "projetoPhp";

$conn = new mysqli($host, $user, $pass, $bd);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$nome = $email = $senha = $telefone = "";

// Verifica se o usuário está logado 
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql_select = "SELECT * FROM usuarios WHERE id='$id'";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        $email = $row['email'];
        $telefone = $row['telefone'];
    }
}

// Verificação se o formulário foi enviado
if (isset($_POST['update'])) {
    // Recuperação dos dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];

    // Verifica o ID do usuário com base no email
    $sql_select = "SELECT id FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row["id"];

        // Atualização dos dados no banco de dados
        $sql = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha', telefone='$telefone' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            $updateMessage = "<p style='color: green'>Dados atualizados com sucesso</p>";
        } else {
            $updateMessage = "<p style='color: red'>Erro ao atualizar dados: " . $conn->error . "</p>";
        }
    } else {
        $updateMessage = "<p style='color: red'>Nenhum usuário encontrado com o email fornecido.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/perfilEstilo.css">
</head>
<body class="d-flex justify-content-center align-items-center">
<div class="container-perfil w-50 p-3">
    <h1 class="text-center mb-4 mt-0">Perfil do Usuário</h1>
    <?php echo $updateMessage; ?>
    <form method="POST" action="atualizarDados.php">
        <div class="form-group mb-3">
            <label for="nome"><strong>Nome:</strong></label>
            <input type="text" class="form-control" id="nome" name="nome"
                   value="<?php echo htmlspecialchars($nome); ?>">
        </div>
        <div class="form-group mb-3">
            <label for="email"><strong>Email:</strong></label>
            <input type="text" class="form-control" id="email" name="email"
                   value="<?php echo htmlspecialchars($email); ?>" readonly>
        </div>
        <div class="form-group mb-3">
            <label for="telefone"><strong>Telefone:</strong></label>
            <input type="text" class="form-control" id="telefone" name="telefone"
                   value="<?php echo htmlspecialchars($telefone); ?>">
        </div>
        <div class="form-group mb-3 position-relative">
            <label for="senha"><strong>Senha:</strong></label>
            <input type="password" class="form-control" id="senha" name="senha"
                   value="<?php echo htmlspecialchars($senha); ?>">
            <span class="IconeMostrarSenha" onclick="MostrarSenha()">👁️</span>
        </div>
        <div class="row">
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block" name="update">Atualizar Dados</button>
            </div>
            <div class="col-4">
                <a href="home.php" class="btn btn-secondary btn-block">Sair da conta</a>
            </div>
            <div class="col-4">
                <a href="excluirConta.php" class="btn btn-danger btn-block">Excluir Conta</a>
            </div>
        </div>
    </form>
</div>

<script src="../js/mostrarSenha.js"></script>
<script src="../js/jquery-3.3.1.slim.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>

