<?php
// O resultado so aparece depois que o formulario for enviado.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $nota3 = $_POST["nota3"];
    $nota4 = $_POST["nota4"];
    $nota5 = $_POST["nota5"];

    // Media ponderada: cada nota e multiplicada pelo seu peso.
    $media = ($nota1 * 2 + $nota2 * 3 + $nota3 + $nota4 + $nota5 * 3) / 10;

    if ($media >= 7) {
        $situacao = "APROVADO";
    } elseif ($media >= 5) {
        $situacao = "RECUPERAÇÃO";
    } else {
        $situacao = "REPROVADO";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Aluno</title>
</head>
<body>
    <h1>Cadastro de Aluno</h1>

    <form method="POST">
        <label>Nome do aluno:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Idade:</label><br>
        <input type="number" name="idade" min="1" required><br><br>

        <label>Nota 1 (peso 2):</label><br>
        <input type="number" name="nota1" min="0" max="10" step="0.1" required><br><br>

        <label>Nota 2 (peso 3):</label><br>
        <input type="number" name="nota2" min="0" max="10" step="0.1" required><br><br>

        <label>Nota 3 (peso 1):</label><br>
        <input type="number" name="nota3" min="0" max="10" step="0.1" required><br><br>

        <label>Nota 4 (peso 1):</label><br>
        <input type="number" name="nota4" min="0" max="10" step="0.1" required><br><br>

        <label>Nota 5 (peso 3):</label><br>
        <input type="number" name="nota5" min="0" max="10" step="0.1" required><br><br>

        <button type="submit">Calcular situacao</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <h2>Resultado</h2>
        <p>Nome: <?php echo $nome; ?></p>
        <p>Idade: <?php echo $idade; ?> anos</p>
        <p>Media: <?php echo number_format($media, 1, ",", "."); ?></p>
        <p>Situacao: <?php echo $situacao; ?></p>
    <?php } ?>
</body>
</html>
