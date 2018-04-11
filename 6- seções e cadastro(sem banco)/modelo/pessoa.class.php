<?php
class Pessoa{
	private $nome;
	private $idade;
	
	public function __get($a){
		return $this->$a;
	}
	public function __set($a,$v){
		$this->$a = $v;
	}
	public function __toString(){
		return '<br />nome: '.$this->nome.
  		       '<br />idade: '.$this->idade;
	}//fecha toString
	
}//fecha classe
?>