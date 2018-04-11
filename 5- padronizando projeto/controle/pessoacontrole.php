<?php
include '../modelo/pessoa.class.php';
include '../util/validacao.class.php';

if( isset($_POST['txtnome']) &&
    isset($_POST['txtsobrenome']) &&
	isset($_POST['txtidade']) ){

		$erros = array();
		
		//validacões
		// observe que estamos criando um array que armazena todos os erros
		if(!Validacao::testarNome($_POST['txtnome'])){
			$erros[] = 'nome invalido';
		}
		
		if(!Validacao::testarSobrenome($_POST['txtsobrenome'])){
			$erros[] = 'sobrenome invalido';
		}
		
		if(!Validacao::testarIdade($_POST['txtidade'])){
			$erros[] = 'idade invalida';
		}
		

		//Teste de validacação
		//var_dump($erros);

		// se nao houver erros
		if( count($erros) == 0 ){
			$p = new Pessoa();
			
			$p->nome = Validacao::converterMin($_POST['txtnome']);
		  	$p->sobrenome = Validacao::converterMin($_POST['txtsobrenome']);
			$p->idade = $_POST['txtidade'];			

			//var_dump($p);
			//
			// passando dados via GET 
			header("location:../visao/guiresposta.php?nome=$p->nome&sobrenome=$p->sobrenome&idade=$p->idade");

		// se houver erros (senão)
		}else{
			// aqui os erros sao montados em string e mandados via GET
			$e = serialize($erros);

			header("location:../visao/guierro.php?erros=$e");

		}//fecha else count $erros

}else{
	echo 'NAO ENTROU';
}//fecha else isset


?>