<?php 
require 'configpdo.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./login.css">
</head>
<body>
<form class="form" action="./cadastro.php" method="$_POST">
    <H1>FARMACIA FREITA</H1>
    <p class="heading">LOGIN</p>
    <input class="input" placeholder="Usuario" type="text">
    <input class="input" placeholder="Senha" type="password"> 
    <button class="btn">Login</button>
</form>
</html>