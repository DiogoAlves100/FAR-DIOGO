<?php
require 'configPDO.PHP';

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Cadastro de Medicamento</title>
<link rel="stylesheet" href="./style.css">
</head>
<body>
    <form action="inseri.php" method="post">
        <h1>Cadastro de Medicamento</h1>
   
                <label for="produto">Nome do Medicamento:</label>
                <input type="text" class="form-control" id="produto" name="produto" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço Unitário:</label>
                <input type="text" class="form-control" id="preco" name="preco" required pattern="^\d+(\.\d{1,2})?$" title="Digite um preço válido (ex: 19.99)">
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade em Estoque:</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" required min="1">
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select class="form-control" id="categoria" name="categoria" required>
                    <option value="">Selecione uma categoria</option>
                    <option value="Analgésico">Analgésico</option>
                    <option value="Antibiótico">Antibiótico</option>
                    <option value="Anti-inflamatório">Anti-inflamatório</option>
                    <option value="Antidepressivo">Antidepressivo</option>
                    <option value="Outros">Outros</option>
                </select>
            </div>
            <div class="form-group">
                <label for="data_validade">Data de Validade:</label>
                <input type="date" class="form-control" id="data_validade" name="data_validade" required>
            </div>
            <button type="submit">Cadastrar Medicamento</button>
            </form>
</body>
</html>
