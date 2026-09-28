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
    <link rel="stylesheet" href="index.css">
    <title>Identificador de idade</title>
</head>
<body>
    <main class="container">
        <h1>Identificador de idade</h1>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="nascimento">Data de nascimento:</label>
            <input type="date" id="nascimento" name="nascimento" max="<?= date('Y-m-d') ?>" required>

            <button type="submit">Identificar idade</button>
        </form>
        <?php if ($resultado !== "") { ?>
            <h2>
                <?php if ($idade !== null) { ?>
                    Olá, <?= htmlspecialchars($nome, ENT_QUOTES, "UTF-8") ?>! Você tem <?= $idade ?> anos e é <?= $resultado ?>.
                <?php } else { ?>
                    <?= htmlspecialchars($resultado, ENT_QUOTES, "UTF-8") ?>.
                <?php } ?>
            </h2>
        <?php } ?>
    </main>
</body>
</html>
