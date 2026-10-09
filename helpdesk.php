<?php
require_once 'helpdesk-func.php';

$mensagem = '';

if (isset($_POST['cadastrar'])) {
    if (cadastrarChamado($_POST)) {
        $mensagem = 'Chamado cadastrado!';
    } else {
        $mensagem = 'Informe o nome e a descrição.';
    }
}

if (isset($_POST['atualizar'])) {
    $numero = filter_var($_POST['numero'] ?? '', FILTER_VALIDATE_INT);
    $status = $_POST['status'] ?? '';
    if ($numero !== false && atualizarStatusChamado($numero, $status)) {
        $mensagem = 'Status atualizado!';
    } else {
        $mensagem = 'Chamado ou status inválido.';
    }
}

if (isset($_POST['excluir'])) {
    $numero = filter_var($_POST['numero'] ?? '', FILTER_VALIDATE_INT);
    if ($numero !== false && excluirChamado($numero)) {
        $mensagem = 'Chamado excluído!';
    } else {
        $mensagem = 'Chamado não encontrado.';
    }
}

$chamados = consultarChamados();
$relatorio = contarChamados();
?>
<h1>Helpdesk da empresa</h1>

<p><?php echo htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8'); ?></p>

<h2>Abrir chamado</h2>
<form method="POST">
    Nome:<br>
    <input type="text" name="nome"><br><br>

    Setor:<br>
    <select name="setor">
        <option>Produção</option>
        <option>Administrativo</option>
        <option>Logística</option>
        <option>Financeiro</option>
        <option>TI</option>
    </select><br><br>

    Equipamento:<br>
    <select name="equipamento">
        <option>Computador</option>
        <option>Impressora</option>
        <option>Rede</option>
        <option>Sistema</option>
        <option>Outro</option>
    </select><br><br>

    Descrição do problema:<br>
    <textarea name="descricao"></textarea><br><br>

    Prioridade:<br>
    <select name="prioridade">
        <option>Baixa</option>
        <option>Média</option>
        <option>Alta</option>
    </select><br><br>

    <button type="submit" name="cadastrar">Cadastrar</button>
</form>

<h2>Relatório</h2>
<p>Total: <?php echo $relatorio['total']; ?></p>
<p>Abertos: <?php echo $relatorio['Aberto']; ?></p>
<p>Em andamento: <?php echo $relatorio['Em andamento']; ?></p>
<p>Resolvidos: <?php echo $relatorio['Resolvido']; ?></p>

<h2>Lista de chamados</h2>
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
        <button type="submit" name="excluir">Excluir</button>
    </form>
    <hr>
<?php } ?>
