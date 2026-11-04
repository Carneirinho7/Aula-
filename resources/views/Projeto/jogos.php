<?php
require __DIR__ . "/../../../config/conexao.php";

$sql = "CREATE TABLE IF NOT EXISTS jogos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    genero VARCHAR(50),
    nota INT
)";

$pdo->exec($sql);

if (isset($_POST["nome"])) {
    $nome = $_POST["nome"];
    $genero = $_POST["genero"];
    $nota = $_POST["nota"];

    $sql = "INSERT INTO jogos (nome, genero, nota)
            VALUES ('$nome', '$genero', '$nota')";

    $pdo->exec($sql);
    $mensagem = "Jogo cadastrado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar jogos</title>
    <link rel="stylesheet" href="/projeto/resources/css/index.css">
</head>
<body class="form-page">
    <nav class="form-nav" aria-label="Navegação">
        <a class="back-link" href="?rota=portfolio">Voltar ao portfólio</a>
    </nav>
    <main class="form-shell">
        <header class="form-heading">
            <span class="form-kicker">Sua coleção</span>
            <h1>Cadastrar jogo</h1>
            <p>Adicione um jogo à sua lista.</p>
        </header>
        <?php if (isset($mensagem)) { ?>
            <p class="notice notice-success jogos-mensagem" role="status"><?= htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8") ?></p>
        <?php } ?>

        <form method="POST" class="form-fields">
            <div class="field">
                <label for="nome">Nome do jogo</label>
                <input id="nome" type="text" name="nome" maxlength="100" required>
            </div>
            <div class="field">
                <label for="genero">Gênero</label>
                <input id="genero" type="text" name="genero" maxlength="50" required>
            </div>
            <div class="field">
                <label for="nota">Nota</label>
                <input id="nota" type="number" name="nota" min="0" max="10" required>
            </div>
            <button class="form-submit" type="submit">Cadastrar jogo</button>
        </form>
    </main>
</body>
</html>
