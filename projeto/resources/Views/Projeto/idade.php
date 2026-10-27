<?php
$nome = "";
$idade = null;
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"] ?? "");
    $nascimento = $_POST["nascimento"] ?? "";
    $dataNascimento = DateTime::createFromFormat("Y-m-d", $nascimento);
    $hoje = new DateTime("today");

    if ($dataNascimento && $dataNascimento->format("Y-m-d") === $nascimento && $dataNascimento <= $hoje) {
        $idade = $dataNascimento->diff($hoje)->y;

        if ($idade >= 18) {
            $resultado = "maior de idade";
        } else {
            $resultado = "menor de idade";
        }
    } else {
        $resultado = "data de nascimento inválida";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projeto/resources/css/index.css">
    <title>Identificador de idade</title>
</head>
<body class="form-page">
    <nav class="form-nav" aria-label="Navegação">
        <a class="back-link" href="?rota=portfolio">Voltar ao portfólio</a>
    </nav>
    <main class="form-shell">
        <header class="form-heading">
            <span class="form-kicker">Verificador</span>
            <h1>Verificador de idade</h1>
            <p>Descubra sua idade a partir da data de nascimento.</p>
        </header>
        <form method="POST" class="form-fields">
            <div class="field">
                <label for="nome">Seu nome</label>
                <input type="text" id="nome" name="nome" autocomplete="name" required>
            </div>
            <div class="field">
                <label for="nascimento">Data de nascimento</label>
                <input type="date" id="nascimento" name="nascimento" max="<?= date('Y-m-d') ?>" required>
            </div>
            <button class="form-submit" type="submit">Verificar idade</button>
        </form>
        <?php if ($resultado !== "") { ?>
            <p class="notice <?= $idade !== null ? 'notice-success' : 'notice-error' ?>" role="status">
                <?php if ($idade !== null) { ?>
                    Olá, <?= htmlspecialchars($nome, ENT_QUOTES, "UTF-8") ?>! Você tem <?= $idade ?> anos e é <?= $resultado ?>.
                <?php } else { ?>
                    <?= htmlspecialchars($resultado, ENT_QUOTES, "UTF-8") ?>.
                <?php } ?>
            </p>
        <?php } ?>
    </main>
</body>
</html>
