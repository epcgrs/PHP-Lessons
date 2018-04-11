<?php 
class Validacao{

    public static function validacaoNome($expressao, $nome){

        if (preg_match($expressao, $nome)) {
            return 'nome valido!';
        } else {
            return 'nome invalido!';
        }

    }

}


?>