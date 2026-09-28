<?php
         $nome = "";
         $idade = 0;
         $resultado = "";
    
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $nome = $_POST["nome"];
            $idade = $_POST["idade"];

            if($idade >= 18){
                $resultado = "maior de idade";
            }
            else if($idade <= 0){
                $resultado = "idade invalida";
            }
            else{
            $resultado = "menor de idade";
            }
        }
?>
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="index.css">
            <title>Document</title>
        </head>
        <body>
            <div class="container" >
            <form method="POST">
                <input type="text" id="nome" name="nome" required>
                <input type="number" id="idade" name="idade" required>
                <button type="submit">enviar</button>
            </form>
            <?php if($resultado != ""){ ?>
            
                <h2>olá <?= $nome ?>, 
                você tem <?=  $idade ?>
                 e é <?=  $resultado ?></h2>
            
            <?php } ?> 
            </div>
        </html>
        
        </body>
        </html>