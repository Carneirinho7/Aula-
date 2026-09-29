<?php
     require "conexao.php";
     
     echo "<br> Meu sistema esta conectado!";

     $sql = "CREAT TABLE IF NOT EXISTS teste (
      id INT AUTO_INCREMENT PRIMARY KEY,
      nome VARCHAR(100),
      idade INT
      )";

      $pdo->exec($sql);

      echo "<br> Tabela criada com sucesso!"
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu site</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <a href="idade.php"> Identificador de idade </a>
    <a href="notas.php"> notas </a>
    <a href="login-basico.php">login</a>
</body>
</html>




