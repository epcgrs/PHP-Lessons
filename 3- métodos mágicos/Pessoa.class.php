<?php
class Pessoa{

    private $nome;
    private $sexo;
    private $idade;

    // __contruct atribui o valor para as variaveis
    public function __construct($nome, $sexo){
        $this->nome = $nome;
        $this->sexo = $sexo;
    }

    // get mágico
    public function __get($atributo){
        return $this->$atributo;
    }

    // set mágico
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    // to string é a função de retorno dos dados
    public function __toString(){
        return '<p>nome: '.$this->nome.
        '<br />sexo: '.$this->sexo.
        '<br />idade: '.$this->idade.'</p>';
    }

}





