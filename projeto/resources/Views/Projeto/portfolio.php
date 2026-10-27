<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projeto/resources/css/index.css">
    <title>Thiago Carneiro | Portfólio</title>
</head>
<body class="portfolio-page">
    <header>
        <nav class="navbar">
            <a class="logo" href="#inicio">TC<span>.</span></a>
            <ul class="menu">
                <li><a href="#inicio">Início</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#habilidades">Habilidades</a></li>
                <li><a href="#projetos">Projetos</a></li>
                <li><a href="#contato">Contato</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="inicio" class="inicio">
            <div class="inicio-conteudo">
                <p class="saudacao">PORTFÓLIO</p>
                <h1>Thiago Carneiro</h1>
                <h2>Desenvolvedor em Formação</h2>
                <p class="inicio-descricao">Estudante de Desenvolvimento de Sistemas, aprendendo e criando projetos para a web.</p>
                <a href="#projetos" class="botao">Ver projetos</a>
            </div>
        </section>

        <section id="sobre" class="secao sobre">
            <div class="sobre-texto">
                <h2 class="titulo-secao">Sobre mim</h2>
                <p>Sou estudante de Desenvolvimento de Sistemas e estou aprendendo HTML, CSS, PHP e MySQL.</p>
                <p>Este portfólio reúne alguns dos projetos que desenvolvi durante o curso.</p>
            </div>
        </section>

        <section id="habilidades" class="secao secao-destaque">
            <div class="habilidades-intro">
                <h2 class="titulo-secao">Habilidades</h2>
                <p>Tecnologias que estou estudando:</p>
            </div>
            <div class="lista-habilidades">
                <span>HTML</span>
                <span>CSS</span>
                <span>PHP</span>
                <span>MySQL</span>
            </div>
        </section>
        
        <section id="projetos" class="secao">
            <div class="projetos-cabecalho">
                <div>
                    <h2 class="titulo-secao">Projetos</h2>
                </div>
                <p class="subtitulo-secao">Alguns projetos desenvolvidos durante as aulas.</p>
            </div>
            <div class="projetos-container">
                <div class="projeto-card">
                    <h3>Verificação de Idade</h3>
                    <p>Uma página interativa para praticar formulários, condições e manipulação de dados.</p>
                    <div class="tecnologias"><span>HTML</span><span>CSS</span><span>PHP</span></div>
                    <a href="?rota=idade" class="link-projeto">Ver projeto</a>
                </div>
                <div class="projeto-card">
                    <h3>Cadastro de Jogos</h3>
                    <p>Cadastro de jogos com prática de persistência e manipulação de informações.</p>
                    <div class="tecnologias"><span>HTML</span><span>CSS</span><span>PHP</span><span>MySQL</span></div>
                    <a href="?rota=jogos" class="link-projeto">Ver projeto</a>
                </div>
                <div class="projeto-card">
                    <h3>Notas</h3>
                    <p>Exercício para organizar informações e trabalhar com formulários.</p>
                    <div class="tecnologias"><span>HTML</span><span>CSS</span><span>PHP</span></div>
                    <a href="?rota=notas" class="link-projeto">Ver projeto</a>
                </div>
                <div class="projeto-card">
                    <h3>Login básico</h3>
                    <p>Uma introdução à lógica de autenticação e ao processamento no servidor.</p>
                    <div class="tecnologias"><span>HTML</span><span>CSS</span><span>PHP</span></div>
                    <a href="?rota=login-basico" class="link-projeto">Ver projeto</a>
                </div>
            </div>
        </section>

        <section id="contato" class="secao contato secao-destaque">
            <div>
                <h2 class="titulo-secao">Contato</h2>
                <p>Acompanhe meus projetos no GitHub.</p>
            </div>
            <a class="contato-link" href="https://github.com/Carneirinho7" target="_blank" rel="noopener noreferrer">
                GitHub
            </a>
        </section>
    </main>
    
    <footer>
        <p>Desenvolvido por <strong>Thiago Carneiro</strong></p>
        <a href="#inicio">Voltar ao topo ↑</a>
        <p>© 2026</p>
    </footer>
</body>
</html>