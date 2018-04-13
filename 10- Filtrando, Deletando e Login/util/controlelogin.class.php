<?php
include_once '../dao/usuariodao.class.php';

class ControleLogin{

	public static function logar($u){
		$uDAO = new UsuarioDAO();
		$usuario = $uDAO->verificarUsuario($u);
		
		if($usuario && !is_null($usuario)){

			$_SESSION['privateUser']=serialize($usuario);
			//Mando o usuário para a página desejada
			header('location:../index.php'); 
		}else{
		  $_SESSION['msg']='login/senha invalidos';
		  header('location:../visao/guiresposta.php');
		}//fecha else
	}//fecha método
	
	public static function deslogar(){
	   unset($_SESSION['privateUser']);
	   $_SESSION['msg'] = 'voce foi deslogado';
	   header('location:../visao/guiresposta.php');
	}
	
	public static function verificarAcesso(){
 	 if(!isset($_SESSION['privateUser'])){
	   $_SESSION['msg'] = 'voce nao esta logado';
	   header('location:../visao/guiresposta.php');
	 }//fecha if
	}//fecha método
	
}//fecha classe
?>