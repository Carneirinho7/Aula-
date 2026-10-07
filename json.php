<?php 
 
// 1. DECLARAR O CAMINHO  DO ARQUIVO JSON
$caminho = __DIR__ . "/dados.json";

// 2.   ABRIR/LER O ARQUIVO JSON
$json = file_get_contents($caminho);

// 3. TRASFORMAR JSON EM ARRAY PHP
$alunos = json_decode($json, true);

// 4. CRIAR ALUNO
$novoAluno =[
   "nome" => "thiago",
   "idade" => "24",
   "curso" => "Desenvolvimento de sistema"
];

// 5. ADICIONAR O ALUNO NA ARRAY
$alunos[] = $novoAluno;

// 6. TRANSFORMA A ARRAY PHP EM JSON
$jsonAtualizado = json_encode($alunos,
   JSON_PRETTY_PRINT |
   JSON_UNESCAPED_UNICODE   
);

// 7. SALVAR  NO ARQUIVO
file_put_contents($caminho,$jsonAtualizado);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
