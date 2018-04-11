<?php
class Pessoa{

    private $nome;

    // __contruct atribui o valor para as variaveis
    public function __construct($nome){
        $this->nome = $nome;
    }


    // to string é a função de retorno dos dados
    public function __toString(){
        return '<p>nome: '.$this->nome;
    }

}





