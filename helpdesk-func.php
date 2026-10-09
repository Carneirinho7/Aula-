<?php

function consultarChamados()
{
    if (!file_exists('chamados.json')) {
        file_put_contents('chamados.json', '[]');
    }

    $arquivo = file_get_contents('chamados.json');
    $chamados = json_decode($arquivo, true);

    if (!is_array($chamados)) {
        return [];
    }

    return $chamados;
}

function salvarChamados($chamados)
{
    $json = json_encode($chamados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    return file_put_contents('chamados.json', $json) !== false;
}

function cadastrarChamado($dados)
{
    if (trim($dados['nome']) == '' || trim($dados['descricao']) == '') {
        return false;
    }

    $chamados = consultarChamados();
    $chamado = [
        'nome' => $dados['nome'],
        'setor' => $dados['setor'],
        'equipamento' => $dados['equipamento'],
        'descricao' => $dados['descricao'],
        'prioridade' => $dados['prioridade'],
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
        if ($chamado['status'] == 'Aberto') {
            $contagem['Aberto']++;
        } elseif ($chamado['status'] == 'Em andamento') {
            $contagem['Em andamento']++;
        } elseif ($chamado['status'] == 'Resolvido') {
            $contagem['Resolvido']++;
        }
    }

    return $contagem;
}
