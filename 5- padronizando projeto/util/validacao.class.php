<?php
class Validacao{

	// função para validar nome
	public static function testarNome($v){
		if(!is_numeric($v)){
			return true;
		}else{
			return false;
		}
	}
	
	// função para validar sobrenome
	public static function testarSobrenome($v){
		$exp='/^[a-zA-Z]{2,50}$/';			
		if(preg_match($exp,$v)){
			return true;
		}else{
			return false;
		}
	}
	
	// função para validar idade
	public static function testarIdade($v){
		if(is_numeric($v)){
			return true;
		}else{
			return false;
		}
	}
	
	// função para converter uma string para minusculo (padrionização para o banco de dados)
	public static function converterMin($v){
		return strtolower($v);
	}

}
?>