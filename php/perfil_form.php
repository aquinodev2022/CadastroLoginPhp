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
            left: 90%;
            bottom: 12.5vh; 
            cursor: pointer;
        }

        #botaoExcluirConta {
            width: 30%;
            background-color: red;
            position: absolute;
            bottom: 8.5%; 
            left: 35%; 
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Perfil do Usuário</h1>
        <form method="POST" action="atualizarDados.php">
            <p><strong>Nome:</strong>
                <input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>">
            </p>
            <p><strong>Email:</strong>
                <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
            </p>
            <p><strong>Telefone:</strong> <!-- Adicionando campo de telefone -->
                <input type="text" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>">
            </p>
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
