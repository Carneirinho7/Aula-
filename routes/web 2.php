<?php 

    require_once __DIR__ . '/../app/Http/Controllers/HelpdeskController.php';    

    return[
        'GET' =>[
            'portifolio' => [new PortifolioController(), 'index'],
            'helpdesk' => [new HelpdeskController(), 'index'],
            'jogos' => [],
            'login' => [],
            'notas' => [],
            'idade' => []
        ],
            'POST' => [
                'helpdesk' => [new HelpdeskController, ''],
        ]
            ];