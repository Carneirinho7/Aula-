<?php 
 
// 1. DECLARAR O CAMINHO  DO ARQUIVO JSON
$caminho = __DIR__ . "/dados.json";

// 2.   ABRIR/LER O ARQUIVO JSON
$json = file_get_contents($caminho);

// 3. TRASFORMAR JSON EM ARRAY PHP
$alunos = json_decode($json, true);

if($_SERVER["REQUEST_METHOD"] == "POST") { 

   $acao = $_POST["acao"];

   if ($acao === "cadastrar") {

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
   }
    if ($acao === "atualizar") {
   // PEGAR OS DADOS  DO FORMULARIO
   $nome = $_POST["nome"];
   $novaidade = $_POST["idade"];
   $novoCurso = $_POST["curso"];

   // PERCORRER TODOS OS ALUNOS
   foreach($alunos as $posicao => $aluno){
      if($aluno["nome"] == $nome){
            $alunos[$posicao]["idade"] = $novaidade;
            $alunos[$posicao]["curso"] = $novoCurso;
      }

   }

    }

echo "DADOS REGISTRADOS EM dados.json";

}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body
>
      <form method="$_POST">
      <label>Nome:</label>
      <input type="text" name="nome" required>

      <label>Idade:</label>
      <input type="text" name="idade" required>

      <label>Curso:</label>
      <input type="text" name="curso" required>

      <button type="submit" name="acao" value="cadastrar">cadastrar</button>            
      </form>

      <form method="$_POST">
      <label>Nome:</label>
      <input type="text" name="nome" required>

      <label>Idade:</label>
      <input type="text" name="idade" required>

      <label>Curso:</label>
      <input type="text" name="curso" required>

      <button type="submit"name="acao" value="atualizar">atualizar</button>            
      </form>

      <h2>Alunos Cadastrados</h2>
      <?php foreach($alunos as $aluno) { ?>
            <h3><?= $aluno["nome"]?> </h3>
            <p>Idade: <?= $aluno["idade"] ?></p>
            <p>Curso: <?= $aluno["curso"] ?></p>

      <?php } ?>

</body>
</html>
