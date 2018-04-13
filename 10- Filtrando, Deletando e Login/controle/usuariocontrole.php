	<?php
session_start();

include_once '../modelo/usuario.class.php';
include_once '../util/validacao.class.php';
include_once '../dao/usuariodao.class.php';
include_once '../util/controlelogin.class.php';

if(isset($_GET['op'])){
	switch($_GET['op']){	
		case 'cadastrar':
			if(isset($_POST['txtlogin']) &&
			   isset($_POST['txtsenha']) &&
			   isset($_POST['seltipo']) ){
				$login = $_POST['txtlogin'];
				$senha = $_POST['txtsenha'];	
				$tipo = $_POST['seltipo'];		
				$erros = array();
				if(!Validacao::testarLogin($login))
					$erros[]='Login invalido';
				if(!Validacao::testarSenha($senha))
					$erros[]='Senha invalido';	
				if(!Validacao::testarTipo($tipo))
					$erros[]='Tipo invalido';
				if(count($erros)==0){
					$u = new Usuario();
					$u->login = $login;
					$u->senha = $senha;
					$u->tipo = $tipo;
						
					$uDAO = new UsuarioDAO();
					$uDAO->cadastrarUsuario($u);
					$_SESSION['u'] = serialize($u);
				header("location:../visao/guiresposta.php");
				}else{
					$_SESSION['erros'] = serialize($erros);
					header(	"location:../visao/guierro.php");
				}//fecha else count do array
			}else{
				echo 'DEU PROBLEMA';
			}//fecha else ISSET CADASTRAR
		break; //fecha case cadastrar
	
		case 'consultar':
		
		 $uDAO = new UsuarioDAO();
		 $array = array();
		 $array = $uDAO->buscarUsuarios();	

		 $_SESSION['usuarios'] = serialize($array);
		 header("location:../visao/guiconsusuario.php");
		 
		break; //fecha case buscar
			
		case 'deletar':
		 if(isset($_REQUEST['idUsuario'])){
				 	
			$uDAO = new UsuarioDAO();
			$uDAO->deletarUsuario($_REQUEST['idUsuario']);
			header('location:../controle/usuariocontrole.php?op=consultar');
		 }else{
			echo 'idUsuario nao existe';
		 }
		break;
		
		case 'logar':
			if(isset($_POST['txtlogin']) &&
			   isset($_POST['txtsenha'])){
			   
			   $cont=0;
			   if(!Validacao::testarLogin($_POST['txtlogin'])){
			 	 $cont++;
			   }
				
			   if(!Validacao::testarSenha($_POST['txtsenha'])){
			   	 $cont++;
			   }
				
				if($cont==0){
					$login = Validacao::retirarEspacos($_POST['txtlogin']);
					$login = Validacao::escaparAspas($login);

					$senha = Validacao::retirarEspacos($_POST['txtsenha']);
					$senha = Validacao::escaparAspas($senha);	

					//Montando objeto
					$usuario = new Usuario();
					$usuario->login = $login;
					$usuario->senha = $senha;
					//Logar
					ControleLogin::logar($usuario);
					
				}else{
					$_SESSION['msg'] = 'Login/senha invalidos';
					header('location:../visao/guiresposta.php');
				}

			}else{
				echo 'nao existe txtlogin e/ou txtsenha';
			}
		break;
		
		case 'deslogar':
			ControleLogin::deslogar();
		break;
		
		case 'buscar':
			if(isset($_POST['txtfiltro']) &&
			   isset($_POST['rdfiltro'])){

			  $erros = array();
			  if(!Validacao::validarFiltro($_POST['txtfiltro'])){
			  	$erros[] = 'dado invalido';
			  }
			  
			  if(count($erros)==0){	
			  	$uDAO = new UsuarioDAO();
				$usuarios = array();
				
			if($_POST['rdfiltro']=='idusuario'){
			   $query = 'where idusuario = '.$_POST['txtfiltro'];
			}else if($_POST['rdfiltro']=='login'){
  		       $query = "where login  = \"".$_POST['txtfiltro'].'"';	
			}else if($_POST['rdfiltro']=='parteslogin'){
			   $query = "where login like \"%".$_POST['txtfiltro'].'%"';	
			}else{
			   $query = "where tipo = \"".$_POST['txtfiltro'].'"';	
			}//fecha else if post
			
			$usuarios = $uDAO->buscar($query);
			
			$_SESSION['usuarios']=serialize($usuarios);
			header('location:../visao/guiconsusuario.php');

			  }else{
			  	$_SESSION['erros'] = serialize($erros);
				header('location:../visao/guierro.php');
			  }//fecha else
			}else{
				echo 'variaveis nao existem';
			}
		break;
		
		case 'alterar':
			if(isset($_GET['idUsuario'])){
			   
 			    $query = 'where idusuario = '.$_GET['idUsuario'];			   
				$uDAO = new UsuarioDAO();
				$usuarios = array();
				$usuarios = $uDAO->buscar($query);
				$_SESSION['usuarios']=serialize($usuarios);
				header('location:../visao/guialterar.php');
			    
			}else{
				echo 'nao existem variaveis';
			}
		break;
		
		case 'confirmalterar':
			if(isset($_POST['txtidusuario']) &&
  			   isset($_POST['txtlogin']) &&
			   isset($_POST['txtsenha']) &&
			   isset($_POST['seltipo'])){
			   
				$idUsuario = $_POST['txtidusuario'];							   
		       	$login = $_POST['txtlogin'];
				$senha = $_POST['txtsenha'];	
				$tipo = $_POST['seltipo'];		
				$erros = array();
				
				if(!Validacao::testarLogin($login))
					$erros[]='Login invalido';
				if(!Validacao::testarSenha($senha))
					$erros[]='Senha invalido';	
				if(!Validacao::testarTipo($tipo))
					$erros[]='Tipo invalido';
					
				if(count($erros)==0){
					$u = new Usuario();
					$u->idUsuario = $idUsuario;
					$u->login = $login;
					$u->senha = $senha;
					$u->tipo = $tipo;
						
					$uDAO = new UsuarioDAO();
					//Enviando para o método alterarUsuario
					$uDAO->alterarUsuario($u);
					$_SESSION['u'] = serialize($u);
					header("location:../controle/usuariocontrole.php?op=consultar");
				}else{
					$_SESSION['erros'] = serialize($erros);
					header(	"location:../visao/guierro.php");
				}//fecha else count do array
			}else{
				echo 'variaveis nao existem';
			}//fecha else isset
		break;
		
		default: 
			echo 'deu erro';
		break; //fecha case default
	}//fecha switch
}else{
	echo 'varivel op nao existe';
}//fecha else ISSET OP	
?>