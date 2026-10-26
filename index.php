<?php
     //Carregando o arquivo de rotas e guradando  o valor  retornado por ele na variavel $rotas
    $rotas = require __DIR__ . "/projeto/resources/Views/Projeto/Routes/web.php";

     // se a rota estiver vazia  vai direcionar  automaticamente para  o portifolio 
     $rota = $_GET['rota'] ?? 'portfolio'; 

     //Definindo a variavel  de verificaçao  do metado HTTP requisitado
     $metodo  = $_SERVER['REQUEST_METHOD'];

     // Verificando se a rato existe se nao existir define status 404
     if(!isset($rotas[$metodo][$rota])){
         http_response_code(404);
         echo "Pagina nao encontrada";
         exit;
     }  

     //
     [$controller, $acao] = $rotas[$metodo][$rota];

     //
     $controller -> $acao();





?>