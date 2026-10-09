<?php

function consultarChamados()
{
    $caminho = __DIR__ . '/chamados.json';

    if (!file_exists($caminho)) {
        file_put_contents($caminho, '[]');
    }

    $arquivo = file_get_contents($caminho);
    if ($arquivo === false) {
        return [];
    }

    $chamados = json_decode($arquivo, true);

    if (!is_array($chamados)) {
        return [];
    }

    return $chamados;
}

function salvarChamados($chamados)
{
    $json = json_encode($chamados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    if ($json === false) {
        return false;
    }

    return file_put_contents(__DIR__ . '/chamados.json', $json) !== false;
}

function cadastrarChamado($dados)
{
    $nome = trim($dados['nome'] ?? '');
    $descricao = trim($dados['descricao'] ?? '');
    $setor = $dados['setor'] ?? '';
    $equipamento = $dados['equipamento'] ?? '';
    $prioridade = $dados['prioridade'] ?? '';

    if ($nome == '' || $descricao == '') {
        return false;
    }

    if (!in_array($setor, ['Produção', 'Administrativo', 'Logística', 'Financeiro', 'TI'], true)) {
        return false;
    }

    if (!in_array($equipamento, ['Computador', 'Impressora', 'Rede', 'Sistema', 'Outro'], true)) {
        return false;
    }

    if (!in_array($prioridade, ['Baixa', 'Média', 'Alta'], true)) {
        return false;
    }

    $chamados = consultarChamados();
    $chamado = [
        'nome' => $nome,
        'setor' => $setor,
        'equipamento' => $equipamento,
        'descricao' => $descricao,
        'prioridade' => $prioridade,
        'status' => 'Aberto'
    ];

    $chamados[] = $chamado;
    return salvarChamados($chamados);
}

function atualizarStatusChamado($numero, $status)
{
    $chamados = consultarChamados();

    if (!isset($chamados[$numero])) {
        return false;
    }

    if ($status != 'Aberto' && $status != 'Em andamento' && $status != 'Resolvido') {
        return false;
    }

    $chamados[$numero]['status'] = $status;
    return salvarChamados($chamados);
}

function excluirChamado($numero)
{
    $chamados = consultarChamados();

    if (!isset($chamados[$numero])) {
        return false;
    }

    unset($chamados[$numero]);
    $chamados = array_values($chamados);
    return salvarChamados($chamados);
}

function contarChamados()
{
    $chamados = consultarChamados();
    $contagem = [
        'total' => count($chamados),
        'Aberto' => 0,
        'Em andamento' => 0,
        'Resolvido' => 0
    ];

    foreach ($chamados as $chamado) {
        if (($chamado['status'] ?? '') == 'Aberto') {
            $contagem['Aberto']++;
        } elseif (($chamado['status'] ?? '') == 'Em andamento') {
            $contagem['Em andamento']++;
        } elseif (($chamado['status'] ?? '') == 'Resolvido') {
            $contagem['Resolvido']++;
        }
    }

    return $contagem;
}
