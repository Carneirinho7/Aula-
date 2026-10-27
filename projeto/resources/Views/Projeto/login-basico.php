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
    <link rel="stylesheet" href="/projeto/resources/css/index.css">
    <title>Login</title>
</head>
<body class="form-page">
    <nav class="form-nav" aria-label="Navegação">
        <a class="back-link" href="?rota=portfolio">Voltar ao portfólio</a>
    </nav>
    <main class="form-shell">
        <header class="form-heading">
            <span class="form-kicker">Acesso</span>
            <h1>Login básico</h1>
            <p>Entre com seus dados para continuar.</p>
        </header>
        <form method="POST" class="form-fields">
            <div class="field">
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="usuario" autocomplete="username" required>
            </div>
            <div class="field">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" autocomplete="current-password" required>
            </div>
            <button type="submit" class="form-submit">Entrar</button>
        </form>

        <?php if ($mensagem !== "") { ?>
            <p class="notice <?= $mensagem === 'Login realizado com sucesso' ? 'notice-success' : 'notice-error' ?>" role="status"><?= htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8") ?></p>
        <?php } ?>
    </main>
</body>
</html>

