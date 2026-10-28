<?php

class PortifolioController {
    public function index() {
        // Lógica para exibir a página do portfólio
        require __DIR__ . "/../../../resources/Views/Projeto/portfolio.php";
    }

    public function idade(): void {
        $this->exibir('idade.php');
    }

    public function jogos(): void {
        $this->exibir('jogos.php');
    }

    public function notas(): void {
        $this->exibir('notas.php');
    }

    public function loginBasico(): void {
        $this->exibir('login-basico.php');
    }

    public function poo2(): void {
        $this->exibir('poo2.php');
    }

    private function exibir(string $arquivo): void {
        require __DIR__ . "/../../../resources/Views/Projeto/" . $arquivo;
    }
}








?>
