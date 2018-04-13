<?php
class Validacao{

	public static function testarLogin($valor){
		$exp='/^[a-z@_]{3,20}$/';
		if(preg_match($exp,$valor)){
			return true;
		}else{
			return false;
		}//fecha else
	}//fecha método
	
	public static function testarSenha($valor){
		$exp='/^[0-9]{6,12}$/';
		if(preg_match($exp,$valor)){
			return true;
		}else{
			return false;
		}//fecha else
	}//fecha método
	
	public static function testarTipo($valor){
		$exp='/^(adm|visitante)$/';
		if(preg_match($exp,$valor)){
			return true;
		}else{
			return false;
		}//fecha else
	}//fecha método		
	
	public static function retirarEspacos($valor){
		return trim($valor);
	}//fecha método
	
	public static function escaparAspas($valor){
		return addslashes($valor);
	}//fecha método
	
	public static function validarFiltro($valor){
		$exp = '/^[a-z@_0-9]{1,20}$/';	
		if(preg_match($exp,$valor)){
			return true;
		}else{
			return false;
		}//fecha else
	}//fecha método validarFiltro
}//fecha classe
?>