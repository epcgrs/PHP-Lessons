<?php
include '../persistencia/conexaobanco.class.php';
class UsuarioDAO{
	
	private $conexao=null;
	
	public function __construct(){
		/* Buscando uma instancia de banco na classe
		ConexaoBanco.class.php */
		$this->conexao = ConexaoBanco::getInstancia();   
	}//fecha construtor
	
	//Método cadastrar
	public function cadastrarUsuario($u){
		try{
			$stat=$this->conexao->prepare("insert into usuario(idusuario,login,senha,tipo)values(null,?,?,?)");	

			$stat->bindValue(1,$u->login);
			$stat->bindValue(2,$u->senha);
			$stat->bindValue(3,$u->tipo);		
			
			$stat->execute();
			
			//encerramento da conexão
			$this->conexao = null;

		}catch(PDOException $e){
			echo 'Erro ao cadastrar usuario';
		}//fecha catch
	}//fecha cadastrar
	
	public function buscarUsuarios(){
		try{
			$stat = $this->conexao->query("select * from usuario");
			$array = array();
			$array = $stat->fetchAll(PDO::FETCH_CLASS,'Usuario');
			$this->conexao = null;
			return $array;
		}catch(PDOException $e){
			echo 'Erro ao buscar usuarios'.$e;
		}//fecha catch
	}//fecha buscarUsuarios
	
}//fecha classe
?>