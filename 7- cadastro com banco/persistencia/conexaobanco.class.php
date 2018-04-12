<?php
class ConexaoBanco extends PDO{

	private static $instancia = null;
	
	public function ConexaoBanco($dsn,$usuario,$senha){
		//Construtor da classe pai PDO
		parent::__construct($dsn,$usuario,$senha);
	}//fecha construtor
	
	public static function getInstancia(){
		if(!isset(self::$instancia)){
			try{

				self::$instancia = new ConexaoBanco('mysql:host=localhost;port=3306;dbname=phplesson','root','');
			
			}catch(PDOException $e){
				echo 'erro ao conectar';
			}//fecha catch
		}//fecha if
		return self::$instancia;
	}//fecha método
}//fecha conexaobanco


?>
