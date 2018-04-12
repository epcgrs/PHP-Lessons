<?php
session_start();
session_unset(); //Removendo sessões anteriores

include_once '../modelo/usuario.class.php';
include_once '../util/validacao.class.php';
include_once '../dao/usuariodao.class.php';

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

				} else {

					$_SESSION['erros'] = serialize($erros);
					header(	"location:../visao/guierro.php");

				}//fecha else count do array

			} else {

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
		
		case 'default':
		break; //fecha case default
	}//fecha switch
} else {
	echo 'varivel op nao existe';
}//fecha else ISSET OP	
?>