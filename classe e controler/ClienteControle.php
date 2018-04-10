<?php

include_once 'Cliente.class.php';

/* Instanciando um objeto chamado $cli a partir da classe Cliente*/
$cli = new Cliente('1','Thiago Cury', '1122334050');

echo '<p>Código do cliente: ' . $cli->getIdCliente() . '<br />' ;
echo 'Nome: ' . $cli->getNome() . '<br />' ;
echo 'rg: ' . $cli->getRg() . '</p>' ;

?>