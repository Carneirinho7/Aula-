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
</head>
<body>
    <h1>Cadastrar jogo</h1>

    <form method="POST">
        <label>Nome do jogo:</label>
        <input type="text" name="nome" required>
        <br><br>

        <label>Gênero:</label>
        <input type="text" name="genero" required>
        <br><br>

        <label>Nota:</label>
        <input type="number" name="nota" required>
        <br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
