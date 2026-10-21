<?php

function apresentarSistema() {
    echo "Bem vindo ao Help Desk";
}

apresentarSistema();

function AbrirChamadado($nome, $problema) {
    echo "$nome Abriu um chamado: $problema";
}
    
AbrirChamadado("Thiago", "Impresora nao funciona");

function contarchamados($quantidade){
    return "existem $quantidade chamados registrados";
}

$resultado = contarchamados(5);
   //echo $resultado; 

?>