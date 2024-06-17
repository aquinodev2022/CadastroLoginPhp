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

$nome = $email = $senha = $telefone = ""; // Adicionando a variável $telefone

// Verifica se o usuário está logado 
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql_select = "SELECT * FROM usuarios WHERE id='$id'";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        $email = $row['email'];
        $telefone = $row['telefone']; // Adicionando o campo telefone
        // senha não deve ser recuperada para segurança
    }
}

// Verificação se o formulário foi submetido
if (isset($_POST['update'])) {
    // Recuperação dos dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone']; // Adicionando o campo telefone

    // Verifica o ID do usuário com base no email
    $sql_select = "SELECT id FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row["id"];

        // Atualização dos dados no banco de dados
        $sql = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha', telefone='$telefone' WHERE id=$id"; // Adicionando o campo telefone
        if ($conn->query($sql) === TRUE) {
            $updateMessage = "<p style='color: green'>Dados atualizados com sucesso</p>";
        } else {
            $updateMessage = "<p style='color: red'>Erro ao atualizar dados: " . $conn->error . "</p>";
        }
    } else {
        $updateMessage = "<p style='color: red'>Nenhum usuário encontrado com o email fornecido.</p>";
    }
}

// Verifica se o formulário de exclusão da conta foi submetido
if (isset($_POST['delete'])) {
    // Realiza a exclusão da conta
    // Aqui você pode adicionar o código para excluir a conta do usuário do banco de dados
    // Lembre-se de adicionar as devidas verificações e ações necessárias para realizar essa exclusão
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #00aef9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 450px;
            padding: 20px;
            background-color: #e3dddd;
            border-radius: 8px;
            position: relative;
        }

        h1 {
            margin-top: 0;
        }

        strong {
            font-weight: bold;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        a.button,
        form button {
            display: inline-block;
            width: 32%;
            background-color: red;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            text-align: center;
            height: 50px;
            line-height: 50px;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }


        .show-password {
            position: absolute;
            right: 20px;
            transform: translateY(-170%);
            cursor: pointer;
        }

        #botaoExcluirConta {
            width: 29%;
            background-color: red;
            cursor: pointer;
            position: absolute;
            bottom: 4.2vh;
            left: 17.8vh;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Perfil do Usuário</h1>
        <?php echo $updateMessage; ?>
        <form method="POST" action="atualizarDados.php">
            <p><strong>Nome:</strong>
                <input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>">
            </p>
            <p><strong>Email:</strong>
                <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
            </p>
            <p><strong>Telefone:</strong> <!-- Adicionando o campo telefone -->
                <input type="text" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>"> <!-- Adicionando o campo telefone -->

            <div class="password-container">
                <p><strong>Senha:</strong>
                    <input type="password" name="senha" value="<?php echo htmlspecialchars($senha); ?>">
                    <span class="show-password" onclick="togglePassword()">👁️</span>
                </p>
            </div>
            <div class="button-container">
                <button type="submit" name="update">Atualizar Dados</button>
                <a href="sairDaConta.php" class="button">Sair da conta</a>
            </div>
        </form>

        <!-- Formulário de exclusão da conta -->
        <form method="POST" action="excluirConta.php">
            <button type="submit" name="delete" id="botaoExcluirConta">Excluir Conta</button>
        </form>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.querySelector('input[name="senha"]');
            var passwordVisibility = document.querySelector('.show-password');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordVisibility.textContent = '👁️';
            } else {
                passwordField.type = 'password';
                passwordVisibility.textContent = '👁️';
            }
        }
    </script>
</body>

</html>