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
                <p class="saudacao">PORTFÓLIO · DESENVOLVIMENTO DE SISTEMAS</p>
                <h1>Thiago Carneiro</h1>
                <h2>Desenvolvedor em Formação</h2>
                <p class="inicio-descricao">Transformando curiosidade em projetos e aprendendo algo novo a cada linha de código.</p>
                <a href="#projetos" class="botao">
                    Conheça meus projetos <span aria-hidden="true">↘</span>
                </a>
            </div>
            <div class="inicio-selo" aria-hidden="true">
                <span>EM<br>CONSTRUÇÃO</span>
                <strong>2026</strong>
            </div>
        </section>

        <section id="sobre" class="secao sobre">
            <div class="sobre-marca" aria-hidden="true">TC</div>
            <div class="sobre-texto">
                <p class="sobretitulo">UM POUCO SOBRE MIM</p>
                <h2 class="titulo-secao">Aprender, criar<br>e evoluir.</h2>
                <p>Sou Thiago Carneiro, estudante de Desenvolvimento de Sistemas. Tenho explorado o desenvolvimento web com HTML, CSS e PHP.</p>
                <p>Este espaço reúne projetos feitos durante o curso e marca cada passo da minha evolução como desenvolvedor.</p>
            </div>
        </section>

        <section id="habilidades" class="secao secao-destaque">
            <div class="habilidades-intro">
                <p class="sobretitulo">FERRAMENTAS DO DIA A DIA</p>
                <h2 class="titulo-secao">O que estou<br>aprendendo.</h2>
            </div>
            <div class="lista-habilidades">
                <div class="habilidade"><span>01</span><strong>HTML</strong><small>Estrutura para a web</small></div>
                <div class="habilidade"><span>02</span><strong>CSS</strong><small>Estilo e responsividade</small></div>
                <div class="habilidade"><span>03</span><strong>PHP</strong><small>Lógica no servidor</small></div>
                <div class="habilidade"><span>04</span><strong>MySQL</strong><small>Dados e consultas</small></div>
            </div>
        </section>
        
        <section id="projetos" class="secao">
            <div class="projetos-cabecalho">
                <div>
                    <p class="sobretitulo">FEITOS EM AULA, COM CURIOSIDADE</p>
                    <h2 class="titulo-secao">Projetos selecionados</h2>
                </div>
                <p class="subtitulo-secao">Uma coleção de exercícios e sistemas que desenvolvi durante o curso.</p>
            </div>
            <div class="projetos-container">
                <div class="projeto-card">
                    <div class="projeto-numero">01 <span>FORMULÁRIOS</span></div>
                    <h3>Verificação de Idade</h3>
                    <p>Uma página interativa para praticar formulários, condições e manipulação de dados.</p>
                    <div class="tecnologias"><span>HTML</span><span>CSS</span><span>PHP</span></div>
                    <a href="idade.php" class="link-projeto">Abrir projeto <span aria-hidden="true">↗</span></a>
                </div>
                <div class="projeto-card">
                    <div class="projeto-numero">02 <span>CADASTRO</span></div>
                    <h3>Cadastro de Jogos</h3>
                    <p>Cadastro de jogos com prática de persistência e manipulação de informações.</p>
                    <div class="tecnologias"><span>HTML</span><span>CSS</span><span>PHP</span><span>MySQL</span></div>
                    <a href="jogos.php" class="link-projeto">Abrir projeto <span aria-hidden="true">↗</span></a>
                </div>
                <div class="projeto-card">
                    <div class="projeto-numero">03 <span>ORGANIZAÇÃO</span></div>
                    <h3>Notas</h3>
                    <p>Exercício para organizar informações e trabalhar com formulários.</p>
                    <div class="tecnologias"><span>HTML</span><span>CSS</span><span>PHP</span></div>
                    <a href="notas.php" class="link-projeto">Abrir projeto <span aria-hidden="true">↗</span></a>
                </div>
                <div class="projeto-card">
                    <div class="projeto-numero">04 <span>LÓGICA</span></div>
                    <h3>Login básico</h3>
                    <p>Uma introdução à lógica de autenticação e ao processamento no servidor.</p>
                    <div class="tecnologias"><span>HTML</span><span>CSS</span><span>PHP</span></div>
                    <a href="login-basico.php" class="link-projeto">Abrir projeto <span aria-hidden="true">↗</span></a>
                </div>
            </div>
        </section>

        <section id="contato" class="secao contato secao-destaque">
            <div>
                <p class="sobretitulo">VAMOS CONVERSAR?</p>
                <h2 class="titulo-secao">Toda boa ideia<br>começa com um oi.</h2>
            </div>
            <a class="contato-link" href="https://github.com/Carneirinho7" target="_blank" rel="noopener noreferrer">
                Meu GitHub <span aria-hidden="true">↗</span>
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