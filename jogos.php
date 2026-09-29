<?php
     require "conexao.php";
     
     echo "<br> Carregando jogo";

     $sql = "CREATE TABLE IF NOT EXISTS teste (
      id INT AUTO_INCREMENT PRIMARY KEY,
      nome VARCHAR(101),
      genero VARCHAR(50)
      nota INT
      )";

      $pdo->exec($sql);

      echo "<br> Jogo conectado com sucesso";
?>

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
      <a href=""></a>



</body>
</html>