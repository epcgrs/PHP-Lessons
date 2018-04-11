<?php
session_start();
include '../modelo/usuario.class.php';
include '../util/validacao.class.php';
include '../dao/usuariodao.class.php';

//var_dump($_POST); -- 1Њ maneira teste
switch($_GET['op']){

	case 'cadastrar': 
		
		//com validaчуo - testando se existem as variсveis de post		
		if( isset($_POST['txtlogin']) &&
			isset($_POST['txtsenha']) &&
			isset($_POST['seltipo']) ){
		
			//Fazendo a validaчуo
			$erros = array();
			
			if(!Validacao::testarLogin($_POST['txtlogin'])){
				$erros[] = 'login inv';
			}
			

			if(!Validacao::testarSenha($_POST['txtsenha'])){
				$erros[] = 'senha inv';
			}
			
			if(!Validacao::testarTipo($_POST['seltipo'])){
				$erros[] = 'tipo inv';
			}						
		
			if(count($erros)==0){
			
				$u = new Usuario();
				$u->login = $_POST['txtlogin'];
				$u->senha = $_POST['txtsenha'];		
				$u->tipo = $_POST['seltipo'];		
				
				//enviar para o banco - DAO
				$uDAO = new UsuarioDAO();
				$uDAO->cadastrarUsuario($u);
			
				$_SESSION['msg'] = 'usuario cadastrado';		
				$_SESSION['usuario'] = serialize($u);
				header("location:../visao/guiresposta.php");
		
			}else{
			
				$_SESSION['e'] = serialize($erros);
				header("location:../visao/guierro.php");
				
			}//fecha if count
		
		}else{
			echo 'variaveis invalidas';
		}//fecha if isset
	break;
	
	case 'consultar':
		echo "em breve";
	break;
	
	default: echo 'deu erro no switch';
	break;
}//fecha switch
?>