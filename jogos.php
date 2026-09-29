<?php
require "conexao.php";

echo "<br> Meu sistema está conectado!";

$sql = "CREATE TABLE IF NOT EXISTS jogos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    genero VARCHAR(50),
    nota INT
)";

$pdo->exec($sql);

echo "<br> Tabela jogos criada com sucesso!";

if (isset($_POST["nome"])) {
    $nome = $_POST["nome"];
    $genero = $_POST["genero"];
    $nota = $_POST["nota"];

    $sql = "INSERT INTO jogos (nome, genero, nota)
            VALUES ('$nome', '$genero', '$nota')";

    $pdo->exec($sql);
    echo "Jogo cadastrado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar jogos</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <main class="container jogos-container">
        <h1>Cadastrar jogo</h1>

        <form method="POST" class="jogos-form">
            <label for="nome">Nome do jogo:</label>
            <input id="nome" type="text" name="nome" required>

            <label for="genero">Gênero:</label>
            <input id="genero" type="text" name="genero" required>

            <label for="nota">Nota:</label>
            <input id="nota" type="number" name="nota" required>

            <button type="submit">Cadastrar</button>
        </form>
    </main>
</body>
</html>
