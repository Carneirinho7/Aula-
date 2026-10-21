<?php
$usuarioCorreto = "aluno";
$senhaCorreta = "1234";
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST["usuario"] ?? "";
    $senha = $_POST["senha"] ?? "";

    if ($usuario === $usuarioCorreto && $senha === $senhaCorreta) {
        $mensagem = "Login realizado com sucesso";
    } else {
        $mensagem = "Usuário ou senha incorretos";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Login</title>
</head>
<body>
    <main class="container login-container">
        <h1>Login</h1>
        <form method="POST">
            <label for="usuario">Usuário:</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <button type="submit" class="login-button">Entrar</button>
        </form>

        <?php if ($mensagem !== "") { ?>
            <p class="login-mensagem" role="status"><?= htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8") ?></p>
        <?php } ?>
    </main>
</body>
</html>

