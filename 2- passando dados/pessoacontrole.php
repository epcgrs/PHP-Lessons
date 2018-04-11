<?php
include 'pessoa.class.php';

$p = new Pessoa();

$p->setNome($_POST['txtnome']);
$p->setIdade($_POST['txtidade']);

echo '<br />nome: '.$p->getNome().
	 '<br />idade: '.$p->getIdade().
	 '<br />idade em meses: '.$p->calcularMeses();
?>