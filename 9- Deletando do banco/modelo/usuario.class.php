<?php
class Usuario{
	//Atributo
	private $idUsuario;
	private $login;
	private $senha;
	private $tipo;
	
	//Construtor
	public function __construct(){
	}//fecha construtor

	public function Usuario(){
	}
	
	public function __get($atrib){
		return $this->$atrib;
	}	
	public function __set($atrib,$valor){
		$this->$atrib = $valor;
	}
	public function __toString(){
		return '<br />Codigo: '.$this->idUsuario.
			   '<br />Login: '.$this->login.
		  	   '<br />Senha: '.$this->senha.
        	   '<br />Tipo: '.$this->tipo;
	}//fecha toSTring
}//fecha classe
?>