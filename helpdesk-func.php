<?php

function listarChamados() {
    $arquivo = __DIR__ . '/chamados.json';

    if (!file_exists($arquivo)) {
        file_put_contents($arquivo, '[]');
    }

    $dados = file_get_contents($arquivo);
    $chamados = json_decode($dados, true);

    if (!is_array($chamados)) {
        return [];
    }

    return $chamados;
}

function salvarChamados($chamados) {
    $arquivo = __DIR__ . '/chamados.json';
    $dados = json_encode($chamados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    if ($dados === false) {
        return false;
    }

    return file_put_contents($arquivo, $dados) !== false;
}


function cadastrarChamado($nome, $setor, $equipamento, $descricao, $prioridade) {
    if (trim($nome) == '' || trim($descricao) == '') {
        return false;
    }

    $chamados = listarChamados();

    $novoChamado = [
        'nome' => $nome,
        'setor' => $setor,
        'equipamento' => $equipamento,
        'descricao' => $descricao,
        'prioridade' => $prioridade,
        'status' => 'Aberto'
    ];

    $chamados[] = $novoChamado;
    return salvarChamados($chamados);
}

// Atualiza o status de um chamado
function atualizarChamado($numero, $novoStatus) {
    $chamados = listarChamados();

    if (!isset($chamados[$numero])) {
        return false;
    }

    if ($novoStatus != 'Aberto' && $novoStatus != 'Em andamento' && $novoStatus != 'Resolvido') {
        return false;
    }

    $chamados[$numero]['status'] = $novoStatus;
    return salvarChamados($chamados);
}

// Exclui um chamado
function excluirChamado($numero) {
    $chamados = listarChamados();

    if (!isset($chamados[$numero])) {
        return false;
    }

    unset($chamados[$numero]);
    $chamados = array_values($chamados);

    return salvarChamados($chamados);
}

// Faz a contagem dos chamados por status
function contarChamados() {
    $chamados = listarChamados();

    $quantidades = [
        'total' => count($chamados),
        'abertos' => 0,
        'andamento' => 0,
        'resolvidos' => 0
    ];

    foreach ($chamados as $chamado) {
        if (isset($chamado['status'])) {
            if ($chamado['status'] == 'Aberto') {
                $quantidades['abertos']++;
            } elseif ($chamado['status'] == 'Em andamento') {
                $quantidades['andamento']++;
            } elseif ($chamado['status'] == 'Resolvido') {
                $quantidades['resolvidos']++;
            }
        }
    }

    return $quantidades;
}
