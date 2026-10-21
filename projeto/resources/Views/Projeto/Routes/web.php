<?php
     require_once __DIR__ . '/../app/Http/Controllers/PortifolioController.php';
     require_once __DIR__ . '/../app/Http/Controllers/HelpdeskController.php';
    
    

    // Listando em arrrys as rotas que vamos criar  .Json  ja exites 
     return[
         'GET'  => [
            'portfolio' =>[new PortifolioController(), 'index'],
            'helpdesk'  =>[new HelpdeskController(), 'index'],
            'jogos'     =>[],
            //outras atividades
          ],

          'POST' => [
               'helpdesk' =>[new HelpdeskController(), ''],
          ],
          


     ];









?>