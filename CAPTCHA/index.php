<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <!--
No campo src da tag img abaixo enviaremos 4 parametros via GET
l = largura da imagem
a = altura da imagem
tf = tamanho fonte das letras
ql = quantidade de letras do captcha
-->
<img src="captcha.php?l=150&a=50&tf=20&ql=5">
<!--
O texto digitado no campo abaixo sera enviado via POST para
o arquivo validar.php que ira vereficar se o que voce digitou é igual
ao que foi gravado na sessao pelo captcha.php
-->
<form action="validar.php" name="form" method="post">
   <input type="text" name="palavra"  />
   <input type="submit" value="Validar Captcha" />
</form>
</body>
</html>