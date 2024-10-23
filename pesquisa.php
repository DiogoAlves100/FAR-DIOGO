<?php
require './configpdo.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa </title>
    <link rel="stylesheet" href="./styled.css">
</head>
<body>
<h1>Buscar Medicamento</h1>
    <form action="./pesquisar.php" method="POST">
        <input type="text" name="nome_medicamento" placeholder="Nome do Medicamento" required>
        <button type="submit">Buscar</button>
    </form>
    
</body>
</html>