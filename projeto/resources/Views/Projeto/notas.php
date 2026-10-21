<?php
$erro = "";
$nome = "";
$idade = "";
$media = null;
$situacao = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"] ?? "");
    $idade = filter_input(INPUT_POST, "idade", FILTER_VALIDATE_INT);
    $camposNota = ["nota1", "nota2", "nota3", "nota4", "nota5"];
    $notas = [];

    foreach ($camposNota as $campo) {
        $valor = $_POST[$campo] ?? "";
        if ($valor === "" || !is_numeric($valor) || (float)$valor < 0 || (float)$valor > 10) {
            $erro = "Preencha todas as notas com valores entre 0 e 10.";
            break;
        }
        $notas[] = (float)$valor;
    }

    if ($erro === "" && $nome === "") {
        $erro = "Informe o nome do aluno.";
    } elseif ($erro === "" && ($idade === false || $idade < 1)) {
        $erro = "Informe uma idade válida.";
    }

    if ($erro === "") {
        [$nota1, $nota2, $nota3, $nota4, $nota5] = $notas;
        $media = ($nota1 * 2 + $nota2 * 3 + $nota3 + $nota4 + $nota5 * 3) / 10;

        if ($media >= 7) {
            $situacao = "APROVADO";
        } elseif ($media >= 5) {
            $situacao = "RECUPERAÇÃO";
        } else {
            $situacao = "REPROVADO";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Cadastro de Aluno</title>
</head>
<body>
    <main class="container">
        <h1>Cadastro de Aluno</h1>

        <?php if ($erro !== "") { ?>
            <p role="alert"><?= htmlspecialchars($erro, ENT_QUOTES, "UTF-8") ?></p>
        <?php } ?>

        <form method="POST">
            <label for="nome">Nome do aluno:</label><br>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($nome, ENT_QUOTES, "UTF-8") ?>" required><br><br>

            <label for="idade">Idade:</label><br>
            <input type="number" id="idade" name="idade" min="1" value="<?= htmlspecialchars((string)$idade, ENT_QUOTES, "UTF-8") ?>" required><br><br>

            <label for="nota1">Nota 1 (peso 2):</label><br>
            <input type="number" id="nota1" name="nota1" min="0" max="10" step="0.1" required><br><br>

            <label for="nota2">Nota 2 (peso 3):</label><br>
            <input type="number" id="nota2" name="nota2" min="0" max="10" step="0.1" required><br><br>

            <label for="nota3">Nota 3 (peso 1):</label><br>
            <input type="number" id="nota3" name="nota3" min="0" max="10" step="0.1" required><br><br>

            <label for="nota4">Nota 4 (peso 1):</label><br>
            <input type="number" id="nota4" name="nota4" min="0" max="10" step="0.1" required><br><br>

            <label for="nota5">Nota 5 (peso 3):</label><br>
            <input type="number" id="nota5" name="nota5" min="0" max="10" step="0.1" required><br><br>

            <button type="submit">Calcular situação</button>
        </form>

        <?php if ($media !== null) { ?>
            <h2>Resultado</h2>
            <p>Nome: <?= htmlspecialchars($nome, ENT_QUOTES, "UTF-8") ?></p>
            <p>Idade: <?= htmlspecialchars((string)$idade, ENT_QUOTES, "UTF-8") ?> anos</p>
            <p>Média: <?= number_format($media, 1, ",", ".") ?></p>
            <p>Situação: <?= $situacao ?></p>
        <?php } ?>
    </main>
</body>
</html>
