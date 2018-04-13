<?php
include '../persistencia/conexaobanco.class.php';
class UsuarioDAO{
	
	private $conexao=null;
	
	public function __construct(){
		/* Buscando uma instancia de banco na classe
		   ConexaoBanco.class.php */
	 $this->conexao = ConexaoBanco::getInstancia();   
	}//fecha construtor
	
	//Método cadastrarUsuario
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
	
	//Método BuscarUsuarios
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
	
	//Método deletarUsuario
	public function deletarUsuario($idUsuario){
		try{
			$stat = $this->conexao->prepare("delete from usuario where idUsuario=?");
			
			$stat->bindValue(1,$idUsuario);
			
			$stat->execute();
			
			$this->conexao = null;
		}catch(PDOException $e){
			echo 'Erro ao deletar usuario';
		}//fecha catch
	}//fecha deletarUsuario
	
	//Método verificarUsuario
	public function verificarUsuario($u){
		try{
			$stat = $this->conexao->query("select * from usuario where login='$u->login' and senha='$u->senha'");
			
		  $usuario = $stat->fetchObject('Usuario');
		  return $usuario;
		  
		}catch(PDOException $e){
			echo 'Erro ao verificar usuario';
		}//fecha catch
	}//fecha verificarUsuario

	//Método buscar
	public function buscar($query){
		try{
			$stat = $this->conexao->query("select * from usuario ".$query);
			$array = $stat->fetchAll(PDO::FETCH_CLASS,'Usuario');
			
			$this->conexao = null;
			
			return $array;

		}catch(PDOException $e){
			echo 'Erro ao buscas com filtro';
		}
	}//fecha buscar
	
	//Método alterar Usuario
	public function alterarUsuario($usu){
		try{
			$stat = $this->conexao->prepare('update usuario set login = ?, senha = ?, tipo = ? where idusuario = ?');

			$stat->bindValue(1,$usu->login);
			$stat->bindValue(2,$usu->senha);			
			$stat->bindValue(3,$usu->tipo);
			$stat->bindValue(4,$usu->idUsuario);

			$stat->execute();
			$this->conexao = null;

		}catch(PDOException $e){
			echo 'Erro ao alterar usuários';
		}//fecha catch
	}//fecha método atualizar
}//fecha classe
?>






