<?php
session_start();
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
                       <li class="current_page_item"><a href="../index.html">Homepage</a></li>
                       <li><a href="guicadusuario.html">cadastro</a></li>
                       
                       <li><a href="../controle/usuariocontrole.php?op=consultar">consulta</a></li>
                       
                       <li><a href="guidelusuario.html">Excluir</a></li>
                   </ul>
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

            <?php
            if(isset($_SESSION['usuarios'])){
                include_once '../modelo/usuario.class.php';
                $usu = array();
                $usu = unserialize($_SESSION['usuarios']);
                        //Imprimindo o toString da classe Usuario
                ?>
                <table id="customers">
                    <tr>
                        <th>Código</th>
                        <th>Login</th>
                        <th>Senha</th>
                        <th>tipo</th>
                        <?php foreach ($usu as $key => $value) : ?>
                            <tr>
                                <td><?php echo $usu[$key]->idUsuario; ?></td>
                                <td><?php echo $usu[$key]->login; ?></td>
                                <td><?php echo $usu[$key]->senha; ?></td>
                                <td><?php echo $usu[$key]->tipo; ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </tr>
                </table>
                <?php 
            } else {
                echo 'erro ao consultar banco';
            }
            ?>

        </div>
    </div>
    <!-- end #content -->
    <div id="sidebar">
        <ul>
            <li>
                <h2>Categories</h2>
                <ul>
                    <li><a href="#">link 1</a></li>
                    <li><a href="#">link 2</a></li>
                    <li><a href="#">link 3</a></li>
                </ul>
            </li>

        </ul>
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
