<?php
include '../persistencia/conexaobanco.class.php';
class UsuarioDAO{

	private $conexao = null;
	
	public function __construct(){
		/* Buscando uma instancia de banco */
		$this->conexao=ConexaoBanco::getInstancia();
	}//fecha construtor

	public function cadastrarUsuario($u){

		try{

			$stat = $this->conexao->prepare("INSERT INTO usuario(idusuario,login,senha,tipo) VALUES(null,?,?,?);");

			$stat->bindValue(1,$u->login);
			$stat->bindValue(2,$u->senha);
			$stat->bindValue(3,$u->tipo);	

			$stat->execute();
		  	//encerrando conexao
			$this->conexao = null;

		}catch(PDOException $e){

			echo 'erro ao cadastrar';
			
		}//fecha catch
	}//fecha método cadastrar
}//fecha usuariodao
?>