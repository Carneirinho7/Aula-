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
class Personagem {
    public string $nome;
    private int $vida;
    public int $dano;

    public function __construct(string $nome, int $vida, int $dano) {
        $this->nome = $nome;
        $this->vida = $vida;
        $this->dano = $dano;
    }

    public function getVida(){}

    public function atacar(): void {
        echo "$this->nome realizou um ataque!";
    }
}

$lucas = new Personagem("Lucas", 100, 10);
$aurora = new Personagem("Aurora", 50, 5);
$chloe = new Personagem("Chloe", 30, 3);

$lucas->atacar();

class Guerreiro extends Personagem {
    public function defender(): void {
        echo "$this->nome levantou o escudo!";
    }

}

$guerreiro = new Guerreiro("lucas", 100, 10);

$guerreiro->atacar(); // metado herdado
$guerreiro->defender(); // metodo proprio 

//1. o que e uma classe?
//um molde para criar objetos

//2 o que  signifca  new  personagem()?
//criar  um objeto da classe personagem

//3 para quer serve $this->nome?
//acessar op nome  do objeto  atual

//4. oque significa extends?
//herdar caracteristicas e  metados  de outra classe

?>