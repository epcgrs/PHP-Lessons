<!DOCTYPE html>
<html>
	<head>
		<title>Erro</title>
	</head>

	<body>
    	<h1>Erro</h1>
		<?php
		if(isset($_GET['erros'])){
		
			$erros = array();
		$erros=unserialize($_GET['erros']);
			
			foreach($erros as $e){
				echo '<br />'.$e;
			}//fecha foreach
		}//fecha if isset
	    ?>
	</body>
</html>
