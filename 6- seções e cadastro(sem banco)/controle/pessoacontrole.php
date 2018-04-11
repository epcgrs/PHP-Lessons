<?php
session_start();
include '../modelo/pessoa.class.php';
$p = new Pessoa();
$p->nome =$_POST['txtnome'];
$p->idade =$_POST['txtidade'];

//Serializando um objeto na sessão
$_SESSION['pessoa'] = serialize($p);
$_SESSION['msg'] = 'usuario cadastrado';

header("location:../visao/guiresposta.php");
?>