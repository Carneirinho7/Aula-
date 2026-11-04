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
    <link rel="stylesheet" href="/projeto/resources/css/index.css">
    <title>Cadastro de Aluno</title>
</head>
<body class="form-page">
    <nav class="form-nav" aria-label="Navegação">
        <a class="back-link" href="?rota=portfolio">Voltar ao portfólio</a>
    </nav>
    <main class="form-shell form-shell-wide">
        <header class="form-heading">
            <span class="form-kicker">Desempenho escolar</span>
            <h1>Calcular notas</h1>
            <p>Informe os dados do aluno e as cinco notas.</p>
        </header>

        <?php if ($erro !== "") { ?>
            <p class="notice notice-error" role="alert"><?= htmlspecialchars($erro, ENT_QUOTES, "UTF-8") ?></p>
        <?php } ?>

        <form method="POST" class="form-fields">
            <div class="field-row">
                <div class="field">
                    <label for="nome">Nome do aluno</label>
                    <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($nome, ENT_QUOTES, "UTF-8") ?>" autocomplete="name" required>
                </div>
                <div class="field">
                    <label for="idade">Idade</label>
                    <input type="number" id="idade" name="idade" min="1" value="<?= htmlspecialchars((string)$idade, ENT_QUOTES, "UTF-8") ?>" required>
                </div>
            </div>
            <fieldset class="notes-fieldset">
                <legend>Notas</legend>
                <div class="notes-grid">
                    <div class="field">
                        <label for="nota1">Nota 1 <span>Peso 2</span></label>
                        <input type="number" id="nota1" name="nota1" min="0" max="10" step="0.1" required>
                    </div>
                    <div class="field">
                        <label for="nota2">Nota 2 <span>Peso 3</span></label>
                        <input type="number" id="nota2" name="nota2" min="0" max="10" step="0.1" required>
                    </div>
                    <div class="field">
                        <label for="nota3">Nota 3 <span>Peso 1</span></label>
                        <input type="number" id="nota3" name="nota3" min="0" max="10" step="0.1" required>
                    </div>
                    <div class="field">
                        <label for="nota4">Nota 4 <span>Peso 1</span></label>
                        <input type="number" id="nota4" name="nota4" min="0" max="10" step="0.1" required>
                    </div>
                    <div class="field">
                        <label for="nota5">Nota 5 <span>Peso 3</span></label>
                        <input type="number" id="nota5" name="nota5" min="0" max="10" step="0.1" required>
                    </div>
                </div>
            </fieldset>
            <button class="form-submit" type="submit">Calcular resultado</button>
        </form>

        <?php if ($media !== null) { ?>
            <section class="result-panel" aria-live="polite">
                <h2>Resultado</h2>
                <p><strong><?= htmlspecialchars($nome, ENT_QUOTES, "UTF-8") ?></strong>, <?= htmlspecialchars((string)$idade, ENT_QUOTES, "UTF-8") ?> anos</p>
                <div class="result-summary">
                    <span>Média <strong><?= number_format($media, 1, ",", ".") ?></strong></span>
                    <span>Situação <strong><?= htmlspecialchars($situacao, ENT_QUOTES, "UTF-8") ?></strong></span>
                </div>
            </section>
        <?php } ?>
    </main>
</body>
</html>
