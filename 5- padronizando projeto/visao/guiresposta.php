<!DOCTYPE html>
<html>
	<head>
		<title>Resposta</title>
	</head>

	<body>
    	<h1>Resposta</h1>
        <p>
		<?php
			if( isset($_GET['nome']) &&
				isset($_GET['sobrenome']) &&
				isset($_GET['idade']) ){
				
				echo '<br />nome: '.$_GET['nome'].
					 '<br />sobrenome: '.$_GET['sobrenome'].				
					 '<br />idade: '.$_GET['idade']; 
				
			}//fecha if isset
	    ?>
        </p>        
	</body>
</html>
