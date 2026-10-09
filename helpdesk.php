<?php
require_once 'helpdesk-func.php';

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Cadastrar chamado
    if (isset($_POST['cadastrar'])) {
        $nome = $_POST['nome'] ?? '';
        $setor = $_POST['setor'] ?? '';
        $equipamento = $_POST['equipamento'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $prioridade = $_POST['prioridade'] ?? '';

        if (cadastrarChamado($nome, $setor, $equipamento, $descricao, $prioridade)) {
            $mensagem = 'Chamado cadastrado com sucesso!';
        } else {
            $mensagem = 'Preencha o nome e a descrição do problema.';
        }
    }

    // Atualizar chamado
    if (isset($_POST['atualizar'])) {
        $numero = filter_var($_POST['numero'] ?? '', FILTER_VALIDATE_INT);
        $status = $_POST['status'] ?? '';

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
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Helpdesk</title>
</head>
<body>
    <h1>Sistema de Helpdesk</h1>

    <p><?php echo htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8'); ?></p>

    <h2>Abrir chamado</h2>
    <form method="POST">
        <label>Nome do funcionário:</label><br>
        <input type="text" name="nome"><br><br>

        <label>Setor:</label><br>
        <select name="setor">
            <option>Produção</option>
            <option>Administrativo</option>
            <option>Logística</option>
            <option>Financeiro</option>
            <option>TI</option>
        </select><br><br>

        <label>Equipamento:</label><br>
        <select name="equipamento">
            <option>Computador</option>
            <option>Impressora</option>
            <option>Rede</option>
            <option>Sistema</option>
            <option>Outro</option>
        </select><br><br>

        <label>Descrição do problema:</label><br>
        <textarea name="descricao"></textarea><br><br>

        <label>Prioridade:</label><br>
        <select name="prioridade">
            <option>Baixa</option>
            <option>Média</option>
            <option>Alta</option>
        </select><br><br>

        <button type="submit" name="cadastrar">Cadastrar chamado</button>
    </form>

    <h2>Relatório</h2>
    <p>Total de chamados: <?php echo $quantidades['total']; ?></p>
    <p>Abertos: <?php echo $quantidades['abertos']; ?></p>
    <p>Em andamento: <?php echo $quantidades['andamento']; ?></p>
    <p>Resolvidos: <?php echo $quantidades['resolvidos']; ?></p>

    <h2>Chamados cadastrados</h2>

    <?php foreach ($chamados as $numero => $chamado) { ?>
        <h3>Chamado número <?php echo $numero + 1; ?></h3>
        <p>Nome: <?php echo htmlspecialchars($chamado['nome'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        <p>Setor: <?php echo htmlspecialchars($chamado['setor'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        <p>Equipamento: <?php echo htmlspecialchars($chamado['equipamento'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        <p>Descrição: <?php echo htmlspecialchars($chamado['descricao'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        <p>Prioridade: <?php echo htmlspecialchars($chamado['prioridade'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        <p>Status: <?php echo htmlspecialchars($chamado['status'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>

        <form method="POST">
            <input type="hidden" name="numero" value="<?php echo $numero; ?>">
            <select name="status">
                <option>Aberto</option>
                <option>Em andamento</option>
                <option>Resolvido</option>
            </select>
            <button type="submit" name="atualizar">Atualizar status</button>
        </form>

        <form method="POST">
            <input type="hidden" name="numero" value="<?php echo $numero; ?>">
            <button type="submit" name="excluir">Excluir chamado</button>
        </form>
        <hr>
    <?php } ?>
</body>
</html>
