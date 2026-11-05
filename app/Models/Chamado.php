<?php

namespace App\Models;

class Chamado
{
    private function caminhoArquivo(): string
    {
        return storage_path('app/chamados.json');
    }

    public function listarChamados(): array
    {
        $arquivo = $this->caminhoArquivo();

        if (!file_exists($arquivo)) {
            return [];
        }

        $dados = file_get_contents($arquivo);
        if ($dados === false) {
            throw new \RuntimeException('Não foi possível ler os chamados.');
        }

        $chamados = json_decode($dados, true);

        if (!is_array($chamados)) {
            throw new \RuntimeException('O arquivo de chamados contém dados inválidos.');
        }

        return $chamados;
    }

    public function salvarChamados(array $chamados): bool
    {
        $dados = json_encode($chamados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        if ($dados === false) {
            return false;
        }

        return file_put_contents($this->caminhoArquivo(), $dados, LOCK_EX) !== false;
    }


public function cadastrarChamado(string $nome, string $setor, string $equipamento, string $descricao, string $prioridade): bool {
    if (trim($nome) == '' || trim($descricao) == '') {
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

    $chamados = $this->listarChamados();

    $novoChamado = [
        'nome' => $nome,
        'setor' => $setor,
        'equipamento' => $equipamento,
        'descricao' => $descricao,
        'prioridade' => $prioridade,
        'status' => 'Aberto'
    ];

    $chamados[] = $novoChamado;
    return $this->salvarChamados($chamados);
}

public function atualizarChamado(int $numero, string $novoStatus): bool {
    $chamados = $this->listarChamados();

    if (!isset($chamados[$numero])) {
        return false;
    }

    if ($novoStatus != 'Aberto' && $novoStatus != 'Em andamento' && $novoStatus != 'Resolvido') {
        return false;
    }

    $chamados[$numero]['status'] = $novoStatus;
    return $this->salvarChamados($chamados);
}

public function excluirChamado(int $numero): bool {
    $chamados = $this->listarChamados();

    if (!isset($chamados[$numero])) {
        return false;
    }

    //unset = deletar aquelas posiçoes de espesifica
    unset($chamados[$numero]);
    //att a  lista  de chamados em array
    $chamados = array_values($chamados);
    // salvar os chamados novamente pela funçao salvarchamados
    return $this->salvarChamados($chamados);
}

public function contarChamados(): array {
    $chamados = $this->listarChamados();

    $relatorio = [
        'total' => count($chamados),
        'abertos' => 0,
        'andamento' => 0,
        'resolvidos' => 0
    ];

    foreach ($chamados as $chamado) {
        if (is_array($chamado) && isset($chamado['status'])) {
            if ($chamado['status'] == 'Aberto') {
                $relatorio['abertos']++;
            } elseif ($chamado['status'] == 'Em andamento') {
                $relatorio['andamento']++;
            } elseif ($chamado['status'] == 'Resolvido') {
                $relatorio['resolvidos']++;
            }
        }
    }

    return $relatorio;
}

}

