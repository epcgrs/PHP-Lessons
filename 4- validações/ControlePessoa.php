<?php

// incluindo classe de pessoa
include 'Pessoa.class.php';
include 'Validacao.class.php';

//Recebendo valores através do array $_POST[]
$nome = $_POST['txtnome'];

// expressão regular de validação Primeira letra miúscula
$expressao = '/[A-Z][a-z]*/';

//Passando nome através do construtor.
$pessoa = new Pessoa($nome);


/* Imprimindo todos atributos da classe Pessoa através do toString.
    Para chamar o método toString basta solicitar a impressão do objeto conforme exemplo: */
echo $pessoa;
echo '<br>Resultado teste: '.Validacao::validacaoNome($expressao,$nome);

?>