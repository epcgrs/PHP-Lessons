<?php

// incluindo classe de pessoa
include 'Pessoa.class.php';

//Recebendo valores através do array $_POST[]
$nome = $_POST['txtnome'];
$sexo = $_POST['rdsexo'];
$idade = $_POST['txtidade'];

//Passando nome e sexo através do construtor.
$pessoa = new Pessoa($nome,$sexo);

//Passando a variável idade através do set mágico.
$pessoa->idade = $idade;


/* Imprimindo todos atributos da classe Pessoa através do toString.
    Para chamar o método toString basta solicitar a impressão do objeto conforme exemplo: */
echo $pessoa;


?>