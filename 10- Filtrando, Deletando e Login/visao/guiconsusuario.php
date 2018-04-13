<?php
session_start();
include_once '../util/controlelogin.class.php';
ControleLogin::verificarAcesso();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Keyboard 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120915

-->
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/modelo.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Keyborad by FCT</title>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link href="../estilos/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
    <div id="wrapper">
       <div id="header-wrapper">
          <div id="header" class="container">
             <div id="logo">
                <h1><a href="#">Site exemplo </a></h1>
            </div>
            <div id="menu">
                <ul>
                   <li class="current_page_item"><a href="../index.php">Homepage</a></li>
                   <li><a href="guicadusuario.php">cadastro</a></li>

               </ul>
           </div>
       </div>
       <div id="banner">
         <div class="content"><img src="../imagens/img02.jpg" width="1000" height="300" alt="" /></div>
     </div>
 </div>
 <!-- end #header -->

 <div id="page">
  <div id="content">

    <div class="post">
        <!-- InstanceBeginEditable name="conteúdo" -->
        <h2 class="title">Consulta</h2>

        <p>
           <?php
           if(isset($_SESSION['usuarios'])){
            include_once '../modelo/usuario.class.php';
            $usu = array();
            $usu = unserialize($_SESSION['usuarios']);		 	
            ?>		

            <table id="customers">
              <caption>Usuarios</caption>    
              <thead>
               <tr>

                   <th>login</th>
                   <th>senha</th>
                   <th>tipo</th>
                   <th>alterar</th>
                   <th>deletar</th>                          
               </tr>
           </thead>

           <tbody>
               <?php
               foreach($usu as $u){
                  echo '<tr>';
                  echo '<td>'.$u->login.'</td>';
                  echo '<td>*********</td>';
                  echo '<td>'.$u->tipo.'</td>';																
                  echo "<td> <a href='../controle/usuariocontrole.php?op=alterar&idUsuario=$u->idUsuario'>alterar</a>  </td>";	
                  echo "<td> 
                  <a href='../controle/usuariocontrole.php?op=deletar&idUsuario=$u->idUsuario'> Deletar </a>  </td>";						
                  echo '</tr>';
				}//fecha foreach
				
				unset($_SESSION['usuarios']);
             ?>
         </tbody>
     </table>

     <?php
 }else{
     echo 'variavel usuarios nao existe!';
	  }//fecha else isset usuarios
     ?>
 </p>
 <!-- InstanceEndEditable -->

</div>
</div>
<!-- end #content -->
<div id="sidebar">
	
    <?php
    if(!isset($_SESSION['privateUser'])){
        ?>

        <form name="login" id="login" method="post" action="../controle/usuariocontrole.php?op=logar" />

        <input type="text" name="txtlogin" id="txtlogin" placeholder="login" /> <br />
        <input type="password" name="txtsenha" id="txtsenha" placeholder="senha" /> <br />            

        <input type="submit" name="btnlogar" id="btnlogar" value="logar" />

    </form>
    <?php
}else{	
    ?>            
    <ul>
        <li>
           <h2>Links privados</h2>
           <ul>
              <li><a href="../controle/usuariocontrole.php?op=consultar">consulta</a></li>

              <li><a href="guibuscausuario.php">busca avanc</a></li>

              <li><a href="../controle/usuariocontrole.php?op=deslogar">deslogar</a></li>
          </ul>
      </li>
  </ul>
  <?php
}
?>
</div>
<!-- end #sidebar -->
<div style="clear: both;">&nbsp;</div>
</div>
<!-- end #page --> 
</div>
<div id="footer">
	<p>Copyright (c) 2012 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org">FCT</a>. Photos by <a href="http://fotogrph.com/">Fotogrph</a>.</p>
</div>
<!-- end #footer -->
</body>
<!-- InstanceEnd --></html>
