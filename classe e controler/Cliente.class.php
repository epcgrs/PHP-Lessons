<?php

$nome = "emmanuel";
echo "<p>bem vindo $nome</p>";

// Class Cliente
class Cliente {

    // Varaiables
    private $idCliente;
    private $nome;
    private $rg;

    // Construtor da classe
    public function Cliente($idCliente, $nome, $rg){
        $this->idCliente = $idCliente;
        $this->nome = $nome;
        $this->rg = $rg;
    }

    //Métodos acessores Classe Cliente
    public function getIdCliente(){
        return $this->idCliente;
    }
    public function setIdCliente($idCliente){
        $this->idCliente = $idCliente;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getRg(){
        return $this->rg;
    }
    public function setRg($rg){
        $this->rg = $rg;
    }

}
?>