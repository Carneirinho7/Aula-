<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Sistema de controle de produção industrial.
abstract class maquina
{
    public $nome;
    private $producao;

    public function __construct($nome)
    {
        $this->nome = $nome;
        $this->producao = 0;
    }

    public function getproducao()
    {
        return $this->producao;
    }

    public function registrarProducao(int $quantidade): bool
    {
        if ($quantidade <= 0) {
            return false;
        }

        $this->producao += $quantidade;
        return true;
    }

    abstract public function operar();
}

class Esteira extends maquina
{
    public function operar()
    {
        return "Transportando peças...";
    }
}

class Prensa extends maquina
{
    public function operar()
    {
        return "Prensando peças...";
    }
}

class RoboSoldagem extends maquina
{
    public function operar()
    {
        return "Soldando peças...";
    }
}

if (!isset($_SESSION["maquinas"]) || !is_array($_SESSION["maquinas"])) {
    $_SESSION["maquinas"] = [];
}

$mensagem = "";
$tipoMensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nomeRecebido = $_POST["nome"] ?? "";
    $tipoRecebido = $_POST["tipo"] ?? "";
    $quantidadeRecebida = $_POST["quantidade"] ?? null;

    $nome = is_string($nomeRecebido) ? trim($nomeRecebido) : "";
    $tipo = is_string($tipoRecebido) ? $tipoRecebido : "";
    $quantidade = is_scalar($quantidadeRecebida)
        ? filter_var((string) $quantidadeRecebida, FILTER_VALIDATE_INT)
        : false;

    if ($nome === "" || $quantidade === false || $quantidade <= 0) {
        $mensagem = "Preencha todos os campos com valores válidos.";
        $tipoMensagem = "erro";
    } else {
        $maquina = null;

        if ($tipo === "esteira") {
            $maquina = new Esteira($nome);
        } elseif ($tipo === "prensa") {
            $maquina = new Prensa($nome);
        } elseif ($tipo === "robo-soldagem") {
            $maquina = new RoboSoldagem($nome);
        }

        if ($maquina === null) {
            $mensagem = "Selecione um tipo de máquina válido.";
            $tipoMensagem = "erro";
        } else {
            $maquina->registrarProducao($quantidade);
            $_SESSION["maquinas"][] = $maquina;
            $mensagem = "Máquina cadastrada com sucesso!";
            $tipoMensagem = "sucesso";
        }
    }
}

function escapar($texto): string
{
    return htmlspecialchars((string) $texto, ENT_QUOTES, "UTF-8");
}

$maquinas = array_filter(
    $_SESSION["maquinas"],
    static function ($item): bool {
        return $item instanceof maquina;
    }
);
$totalProducao = array_sum(
    array_map(
        static function (maquina $item): int {
            return $item->getproducao();
        },
        $maquinas
    )
);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#101b2c">
    <title>Controle de produção | Indústria</title>
    <link rel="stylesheet" href="../../css/poo2.css">
</head>
<body class="maquinas-page">
    <main class="painel">
        <header class="cabecalho">
            <div class="identidade">
                <span class="marca" aria-hidden="true">IP</span>
                <span>INDÚSTRIA <strong> / CONTROLE</strong></span>
            </div>
            <span class="status-sistema"><span></span> Sistema operacional</span>
        </header>

        <section class="introducao" aria-labelledby="titulo">
            <p class="sobretitulo">PAINEL DE PRODUÇÃO</p>
            <h1 id="titulo">Controle de maquinas</h1>
            <p>Cadastre equipamentos e acompanhe a produção da sua linha industrial.</p>
        </section>

        <section class="resumo" aria-label="Resumo da producao">
            <article class="resumo-card">
                <span class="resumo-icone" aria-hidden="true">01</span>
                <div>
                    <p>Maquinas cadastradas</p>
                    <strong><?= count($maquinas) ?></strong>
                </div>
            </article>
            <article class="resumo-card">
                <span class="resumo-icone" aria-hidden="true">02</span>
                <div>
                    <p>Peças produzidas</p>
                    <strong><?= escapar($totalProducao) ?></strong>
                </div>
            </article>
        </section>

        <div class="conteudo">
            <section class="cartao formulario-cartao" aria-labelledby="titulo-formulario">
                <div class="cartao-cabecalho">
                    <div>
                        <p class="etiqueta">NOVO EQUIPAMENTO</p>
                        <h2 id="titulo-formulario">Cadastrar máquina</h2>
                    </div>
                    <span class="numero-secao">01</span>
                </div>

                <?php if ($mensagem !== ""): ?>
                    <p class="mensagem mensagem-<?= escapar($tipoMensagem) ?>" role="status">
                        <?= escapar($mensagem) ?>
                    </p>
                <?php endif; ?>

                <form method="post" class="formulario">
                    <div class="campo">
                        <label for="nome">Nome da máquina</label>
                        <input
                            type="text"
                            id="nome"
                            name="nome"
                            placeholder="Ex.: Esteira principal"
                            maxlength="100"
                            required
                        >
                    </div>

                    <div class="campo">
                        <label for="tipo">Tipo de equipamento</label>
                        <select id="tipo" name="tipo" required>
                            <option value="" selected disabled>Selecione uma máquina</option>
                            <option value="esteira">Esteira</option>
                            <option value="prensa">Prensa</option>
                            <option value="robo-soldagem">Robô de soldagem</option>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="quantidade">Quantidade produzida</label>
                        <input
                            type="number"
                            id="quantidade"
                            name="quantidade"
                            min="1"
                            step="1"
                            placeholder="Informe o total de pecas"
                            required
                        >
                        <small>Informe um número inteiro maior que zero.</small>
                    </div>

                    <button type="submit">
                        <span aria-hidden="true">+</span>
                        Cadastrar máquina
                    </button>
                </form>
            </section>

            <section class="cartao lista-cartao" aria-labelledby="titulo-lista">
                <div class="cartao-cabecalho">
                    <div>
                        <p class="etiqueta">LINHA DE PRODUÇÃO</p>
                        <h2 id="titulo-lista">Máquinas cadastradas</h2>
                    </div>
                    <span class="contador"><?= count($maquinas) ?></span>
                </div>

                <?php if ($maquinas === []): ?>
                    <div class="estado-vazio">
                        <span aria-hidden="true">--</span>
                        <h3>Nenhuma máquina por aqui</h3>
                        <p>Use o formulario para adicionar o primeiro equipamento.</p>
                    </div>
                <?php else: ?>
                    <div class="lista-maquinas">
                        <?php foreach ($maquinas as $item): ?>
                            <article class="maquina-item">
                                <span class="maquina-simbolo" aria-hidden="true">
                                    <?= $item instanceof Esteira ? "ES" : ($item instanceof Prensa ? "PR" : "RS") ?>
                                </span>
                                <div class="maquina-detalhes">
                                    <h3><?= escapar($item->nome) ?></h3>
                                    <p><?= escapar($item->operar()) ?></p>
                                </div>
                                <div class="producao">
                                    <strong><?= escapar($item->getproducao()) ?></strong>
                                    <span>peças</span>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>
        </div>

        <footer class="rodape">
            <span>Controle industrial</span>
            <span>Os dados ficam salvos durante a sessão.</span>
        </footer>
    </main>
</body>
</html>
