<?php
    
    // informa que a resposta sera em Json
     header('content-type: application/json');

    // Descobrir o metado utilizado na requisiçao
    $metodo = $_SERVER['REQUEST_METHOD'];

    //lista de chamados de exemplo
    $chamados = [
        [
            "id" => 1,
            "titulo" => "Computador sem internet"
        ],
        [
             "id" => 2,
            "titulo" => "Computador sem internet"
        ]
    ];

     // verificar o metodo da requisiçao e executar X acao
     if ($metodo == 'GET'){

        // Define o codigo  de status HTTP dessa requisiçao
        http_response_code(200);

        //Por que  nao preciso utilizar JSON_PRETTY_PRINT
        echo json_encode($chamados, JSON_UNESCAPED_UNICODE);

        exit;
}
        // Se POST:
        if ($metodo == 'POST') {
        //Le o conteudo enviado  no BODY na requisiçao
        $conteudo = file_get_contents('php://input');

        // Converte JSON para ARRAY PHP
        $dados = json_decode($conteudo, true);
    
        // VERIFICA SE DADOS SAO VALIDOS 
        if(
            !is_array($dados) || // O JSON  NAO FOI ENVIADO PARA O ARRAY
            !isset($dados['titulo']) || // O TITULO  NAO FOI INFORMADO OU E NULO
            !is_string($dados['titulo']) || // O TITULO NAO E UM TEXTO
            trim($dados['titulo']) === ''  // O TITULO ESTA VAZIO OU CONTEM APENAS ESPACOES
        ){
            http_response_code(400);

            echo json_encode(["ERRO" => "titulo obrigatorio"]);
        }
        
        // SIMULA  A CRIAÇAO  DE UM  CHAMADO NOVO
        $novoChamado =[
            "id" => 3,
            "titulo" => trim($dados['titulo'])
        ];

         http_response_code(201);

         echo json_encode($novoChamado, JSON_UNESCAPED_UNICODE);

         exit;
        }

        header('Allow: GET, POST');
        http_response_code(405);

        //COMANDOS  NA VPS PARAR TESTAR:
        
        // COMANDOS NA VPS PARA TESTAR:
        // curl -i -X GET https://thiago315.devlook.xyz/projetos/api/api-teste.php

        // curl -i -X POST https://thiago315.devlook.xyz/projetos/api/api-teste.php \
        //   -H "Content-Type: application/json" -d '{"titulo":"Impressora com defeito"}'

        // curl -i -X POST https://thiago315.devlook.xyz/projetos/api/api-teste.php \
        //   -H "Content-Type: application/json" -d '{"titulo":""}'

        // curl -i -X POST https://thiago315.devlook.xyz/projetos/api/api-teste.php \
        //   -H "Content-Type: application/json" -d '{"descricao":"Computador não liga"}'

        // curl -i -X POST https://thiago315.devlook.xyz/projetos/api/api-teste.php \
        //   -H "Content-Type: application/json" -d '{"titulo":3}'

        // curl -i -X POST https://thiago315.devlook.xyz/projetos/api/api-teste.php \
        //   -H "Content-Type: application/json" -d '{"titulo":null}'

        // curl -i -X DELETE https://thiago315.devlook.xyz/projetos/api/api-teste.php

        // curl -i -X GET https://thiago315.devlook.xyz/projetos/api/arquivo-inexistente.php

        /*
            Parâmetro    Significado
            -i           Mostra os headers e o status da resposta
            -X GET       Define o método GET
            -X POST      Define o método POST
            -X DELETE    Define o método DELETE
            -H           Adiciona um header HTTP
            -d           Envia dados no corpo da requisição
        */



?>