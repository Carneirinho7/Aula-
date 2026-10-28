<?php
// sistema  de controle de produçao industrial

//1. classe abstrata

abstract class maquina {
    public $nome;
    private $producao;

    public function __construct($nome)
    {
        $this->nome = $nome;
        $this->producao = 0;
    }

    //encapsulamento getter
        public function getproducao() {
            return $this->producao;

        }

    //encapsulamento  alteraçao  controlada
        public function registrarProducao($quantidade){
            if ($quantidade > 0) {
              return false;
        }

        $this->producao += $quantidade;
        return true;
    }

    //abstraçao
    abstract public function operar();
}

//Herança
class Esteira extends maquina{
    public function operar() {
        return "Transportando peças ...";
    }
}

class Prensa extends maquina{
    public function operar() {
        return "Prensando peças ...";
    }
}
    
class RoboSoldagem extends maquina{
    public function operar() {
        return "Soldando peças ...";
    }
}

//3. sessao armazenamento temporario

if (!isset($_SESSION["maquinas"])){
    $_SESSION["maquinas"] = [];
}

$mensagem = "";

//4. receber formulario via post 

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $_POST["nome"] ?? "";
    $tipo = $_POST["tipo"] ?? "";
    $quantidade = $_POST["quantidade"] ?? null;

    if(
        $nome === "" ||
        $quantidade === false ||
        $quantidade <= 0
    ){
        $mensagem = "preencha os campos corretamente!";

    } else {
        $maquina = null;

        // criando objetos  com bse no formulario
        if($tipo === "esteria") {
            $maquina = new Esteira($nome);
        } elseif ($tipo === "prensa") {
            $maquina = new Prensa($nome);
        } elseif ($tipo === "RoboSoldagem") {
            $maquina = new RoboSoldagem($nome);
        }

        if ($maquina !== null) {
            //executando os metados do objeto
            $maquina->registrarProducao((int)$quantidade);

            // guardando o objeto  na sessao
            $_SESSION["maquinas"][] = $maquina;

            $mensagem = "Maquina cadastrada com sucesso!";
        }
    }
}

// evitar interpretar texto  como HTLM
function escapar($texto) {
    return htmlspecialchars(
        (string) $texto,
        ENT_QUOTES,
        "UTF-8");
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
