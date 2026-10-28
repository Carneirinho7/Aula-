<?php
     require_once __DIR__ . '/../../../../app/Http/Controllers/Portfolio.php';
     require_once __DIR__ . '/../../../../app/Http/Controllers/HelpdeskController.php';

    

    // Listando em arrrys as rotas que vamos criar  .Json  ja exites 
     return[
         'GET'  => [
            'portfolio' =>[new PortifolioController(), 'index'],
            'helpdesk'  =>[new HelpdeskController(), 'index'],
            'idade'     =>[new PortifolioController(), 'idade'],
            'jogos'     =>[new PortifolioController(), 'jogos'],
            'notas'     =>[new PortifolioController(), 'notas'],
            'login-basico' =>[new PortifolioController(), 'loginBasico'],
            'poo2'      =>[new PortifolioController(), 'poo2'],

            //outras atividades
          ],

          'POST' => [
               'helpdesk' =>[new HelpdeskController(), ''],
               'poo2'     =>[new PortifolioController(), 'poo2'],
          ],
          


     ];









?>