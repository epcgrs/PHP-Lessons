<?php
class Pessoa{

	private $nome;
	private $sobrenome;
	private $idade;
	
	public function __construct(){
	}
	
	public function __get($a){
		return $this->$a;
	}
	
	public function __set($a,$v){
		$this->$a = $v;
	}
}//fecha classe
?>