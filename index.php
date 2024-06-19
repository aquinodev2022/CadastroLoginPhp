<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form action="php/login.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <button type="submit">Entrar</button>
    </form>
    <p>Não tem uma conta? <a href="cadastro.html">Cadastre-se</a></p>
    <p>Deseja voltar? <a href="home.php">Voltar</a></p>
</div>
</body>
</html>
