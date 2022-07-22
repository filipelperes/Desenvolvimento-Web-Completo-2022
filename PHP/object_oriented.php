<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orientação a objeto</title>
</head>
<body>
    <?php

        /*
         * 
         * Para acessar atributos ou métodos em PHP utilizamos o ->
         * equivalente ao . em JS
         * 
         ? Herança
         * class Classe2 extends Classe1
         * 
         ? Polimorfismo = sobreescrita de métodos
         * na Classe2 é só reescrever o método da Classe1 mudando apenas a lógica dentro do método
         *  
         ? Encapsulamento = atributos e/ou métodos privados, por questões de segurança
         ! operadores de visibilidade = public, protected, private
         * private não herda é exclusivo da classe mas pode ser referenciado.
         * public e protected são herdados e podem ser usados pelo metodos getters e setters.
         * 
         ! ClassName::property
         ! ClassName::method
         * 
         ? Atributos e métodos estáticos
         * static = podem ser acessados sem serem instanciados.
         * 
         ! ClassName::property
         ! ClassName::method
         * 
         ? Interfaces PHP
         ^ só métodos public
         * Class1 implements Interface
         * nas interfaces PHP, apenas definimos os métodos os atributos não entram
         * Só declaração de métodos, a lógica deve ser implementada na classe
         * Herança em interfaces é permitido e boa pratica
         * interface Interface2 extends Interface1
         * 
         ? namespaces = permitem o agrupamento de classes, interfaces, funções e constantes 
         ? com o objetivo de evitar conflitos de nomes seja de variavel, classe, constante;
         * namespace <nomeDoNameSpace>;
         * para especificar namespace
         * \<nomeDoNameSpace>\class/function/whatever
         * 
         ? Importando e apelidando namespaces
         * use <nomeDoNameSpace>\Classe
         * 
         */

        interface EquipamentoEletronicoInterface {
            public function ligar();
            public function desligar();
        }

        class Geladeira implements EquipamentoEletronicoInterface {
            public function abrirPorta() {
                echo "Abrir a porta";
            }

            public function ligar() {
                echo "Ligar";
            }

            public function desligar() {
                echo "Desligar";
            }
        }
        
        class TV implements EquipamentoEletronicoInterface {
            public function trocarCanal() {
                echo "trocar canal";
            }

            public function ligar() {
                echo "Ligar";
            }

            public function desligar() {
                echo "Desligar";
            }
        }


        //Orientação a objeto
        //PILAR ABSTRAÇÃO

        class Funcionario {
            //constructor/destruct
            function __construct($nome) {
                $this->nome = $nome;
            }

            function __destruct() {}


            //atributos
            private $nome = null;
            protected $telefone = null;
            public $nFilhos = null;
            public $cargo = null;
            public $salario = null;

            //getters setters
            public function getNome($nome) { return $this->nome; }
            public function setNome($nome) { $this->nome = $nome; }

            public function getTelefone($telefone) { return $this->telefone; }
            public function setTelefone($telefone) { $this->telefone = $telefone; }

            public function getNFilhos($nFilhos) { return $this->nFilhos; }
            public function setNFilhos($nFilhos) { $this->nFilhos = $nFilhos; }
            //function modificarNumFilhos($nFilhos) { this->nFilhos = $nFilhos; }

            //overloading / sobrecarga
            public function __set($attr, $val) { $this->$attr = $val; }
            public function __get($attr) { return $this->$attr; }

            //métodos
            public function resumirCadFunc() {
                return "$this->nome possui $this->nFilhos filho(S).";
            }
        }

        $func1 = new Funcionario();
        
        $func1->setNome("José");
        $func1->setNFilhos(3);
        $func1->__set("nome", "José");
        $func1->__get("nome");
        
        echo $func1-> resumirCadFunc();

        $func2 = new Funcionario("Filipe");
        unset($func2);
    ?>
</body>

</html>