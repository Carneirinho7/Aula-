<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/layout.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <h2 class="logo">
                Meu Portifólio
            </h2>
            <ul class="menu">
                <li>
                    <a href="../index.php"> Início </a>
                </li>
                <li>
                    <a href="../index.php#projetos"> Projetos </a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="pagina-projeto">
        <section class="cabacalho-projeto">
            <p class="projeto-tipo">
                Projeto
            </p>
            <h1>
                Cadastro de Jogos
            </h1>
            <p>
                Atividade desenvolvida durante as aulas
                de Desenvolvimento de Sistemas.
            </p>
        </section>


        <section class="conteudo-projeto">
        <form method="POST">
        <input type="text" id="jogo" name="jogo" required>
        <p></p>
        <input type="text" id="genero" name="genero" required>
        <p></p>
        <input type="number" id="nota" name="nota" min="0" max="10" required>
        <p></p>
        <button type="submit">Cadastrar</button>
        </form>
        </section>

        <div class="voltar-projeto">
            <a href="../index.php#projetos">Voltar para os Projetos</a>
        </div>
    </main>

    <footer>
        Desenvolvido por: <a href="https://thiago315.devlook.xyz/">Thiago Carneiro </a> 2026
    </footer>
</body>
</html>