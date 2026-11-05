<?php

use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\Portfolio;

$portfolio = new Portfolio();
$helpdesk = new HelpdeskController();

return [
    'GET' => [
        '/' => [$portfolio, 'index'],
        'portfolio' => [$portfolio, 'index'],
        'helpdesk' => [$helpdesk, 'index'],
        'idade' => [$portfolio, 'idade'],
        'jogos' => [$portfolio, 'jogos'],
        'notas' => [$portfolio, 'notas'],
        'login-basico' => [$portfolio, 'loginBasico'],
        'poo2' => [$portfolio, 'poo2'],
    ],
    'POST' => [
        'helpdesk' => [$helpdesk, 'index'],
        'idade' => [$portfolio, 'idade'],
        'jogos' => [$portfolio, 'jogos'],
        'notas' => [$portfolio, 'notas'],
        'login-basico' => [$portfolio, 'loginBasico'],
        'poo2' => [$portfolio, 'poo2'],
    ],
];
