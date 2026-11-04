<?php 
//Programação orientada a objetos//

// ENCAPSULAMENTO
// Proteger informações para que não sejam alteradas de qualquer jeito.

// HERANÇA
// Criar uma classe nova aproveitando características de outra.

// POLIMORFISMO
// Permitir que objetos diferentes respondam à mesma ação de maneiras diferentes.

// ABSTRAÇÃO
// Mostrar o que é necessário e esconder detalhes complicados de funcionamento.

// Exemplo com POO


    abstract class Personagem {
    public string $nome;
    private int $vida;
    public int $dano;

    public function __construct(string $nome, int $vida, int $dano) {
        $this->nome = $nome;
        $this->vida = $vida;
        $this->dano = $dano;
    }

    public function getVida(): int {
        return $this->vida;
    }

    public function setVida(int $vida): void {
        if ($vida < 0) {
            $this->vida = 0;
            echo "Vida nao pode ser negativa!\n";
            return;
        }

        $this->vida = $vida;
    }

    abstract public function atacar(): void;
    abstract public function curar(): void;
}

$lucas = new Guerreiro("Knight", 100, 10);

$lucas->setVida(50);

$aurora = new Mago("Aurora", 50, 5);
$chloe = new Druida("Chloe", 30, 3);

$personagens = [$lucas, $aurora, $chloe];
foreach ($personagens as $p) {
    $p->atacar();
}

$lucas->atacar();

class Guerreiro extends Personagem {
    public function defender(): void {
        echo "$this->nome levantou o escudo!";
    }

      public function atacar(): void {
        echo "$this->nome atacou com um axe!";
    }

        public function curar(): void {
                echo "$this->nome usou uma pocao!";
        }
}

$guerreiro = new Guerreiro("Knigth", 100, 10);

$guerreiro->atacar(); // metado herdado
$guerreiro->defender(); // metodo proprio 

class Mago extends Personagem {

      public function atacar(): void {
        echo "$this->nome lançou um exori amp vis!";
    }

    public function curar(): void {
        echo "$this->nome lançou uma magia de cura!";
    }
}

$mago = new Mago("Aurora", 50, 5);

$mago ->atacar(); // metodo herdado

class Druida extends Personagem {

      public function atacar(): void {
        echo "$this->nome lançou um ice strike!";
    }

    public function curar(): void {
        echo "$this->nome exura gran!";
    }

}









?>

//https://thiago315.devlook.xyz/projeto/resources/Views/Projeto/poo.php


//1. o que e uma classe?
//um molde para criar objetos

//2 o que  signifca  new  personagem()?
//criar  um objeto da classe personagem

//3 para quer serve $this->nome?
//acessar op nome  do objeto  atual

//4. oque significa extends?
//herdar caracteristicas e  metados  de outra classe