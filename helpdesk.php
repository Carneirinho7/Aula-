<?php
require_once __DIR__ . 'helpdesk-func.php';

$mensagem = '';

//identificar a opereçao solicitada
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Cadastrar chamado
    // O operador ?? e chamado  de operador  de coalescencia nula 
    // Ele significa
    // Utilizar  o valor  de esquerda, se ele existir  e nao for nulo Caso contrario, utilize  o valor  da direita 
    if (isset($_POST['cadastrar'])) {
        $nome = is_string($_POST['nome'] ?? null) ? $_POST['nome'] : '';
        $setor = is_string($_POST['setor'] ?? null) ? $_POST['setor'] : '';
        $equipamento = is_string($_POST['equipamento'] ?? null) ? $_POST['equipamento'] : '';
        $descricao = is_string($_POST['descricao'] ?? null) ? $_POST['descricao'] : '';
        $prioridade = is_string($_POST['prioridade'] ?? null) ? $_POST['prioridade'] : '';

        //if  (isset($_POST["acao"])){
        //    $acao = $_POST["acao"];
        // } else {$acao = "";
        //;
        
        if (cadastrarChamado($nome, $setor, $equipamento, $descricao, $prioridade)) {
            $mensagem = 'Chamado cadastrado com sucesso!';
        } else {
            $mensagem = 'Preencha o nome e a descrição do problema.';
        }
    }

    // Atualizar chamado
    if (isset($_POST['atualizar'])) {
        $numero = filter_var($_POST['numero'] ?? '', FILTER_VALIDATE_INT);
        $status = is_string($_POST['status'] ?? null) ? $_POST['status'] : '';

        if ($numero !== false && atualizarChamado($numero, $status)) {
            $mensagem = 'Status atualizado!';
        } else {
            $mensagem = 'Não foi possível atualizar o chamado.';
        }
    }

    // Excluir chamado
    if (isset($_POST['excluir'])) {
        $numero = filter_var($_POST['numero'] ?? '', FILTER_VALIDATE_INT);

        if ($numero !== false && excluirChamado($numero)) {
            $mensagem = 'Chamado excluído!';
        } else {
            $mensagem = 'Chamado não encontrado.';
        }
    }
}

$chamados = listarChamados();
$quantidades = contarChamados();
?>
