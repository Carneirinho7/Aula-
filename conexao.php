<?php

// dados para entrar no myslq

$hots = "localhots";
$banco = "thiago315";
$usuario = "thiago315";
$senha = "315!@#";

//PDO = PHP data  obejtos = e uma ferramenta de PHP para conversr com banco de dados

try {
    $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utfmb4",$usuario,$senha); 
    $pdo->setAttribute(
// -> = Serve para puxar algo que pertece aquele objeto
// PDO:: = ATTR_ERRMODE, e para confugurar o modo de errros do PDO
// PDO:: ERRMODE_EXCEPTION = e paraquando acontecer algum erro de trasforma em execuçao        

         PDO::ATTR_ERRMODE,
         PDO::ERRMODE_EXCEPTION
      
    );

    echo "Conectado com secesso!";


} catch (PDOException $erro) {

    echo "Erro ao conectar:".$erro->getMessage();

}
?>