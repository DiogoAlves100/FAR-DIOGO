<?php
require 'configPDO.php';

$id = $_GET['id']; 


$sql = $pdo->prepare("SELECT * FROM estoque WHERE id = :id");
$sql->bindValue(':id', $id);
$sql->execute();
$produto = $sql->fetch(PDO::FETCH_ASSOC); 
if (!$produto) {
    echo "Produto não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>

    <h1>Editar Produto</h1>

    <form method="POST" action="editar_action.php?id=<?= $produto['id']; ?>">
        <label for="produto">Produto:</label>
        <input type="text" id="produto" name="produto" value="<?= $produto['produto']; ?>" required><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" value="<?= $produto['quantidade']; ?>" required><br>

        <label for="preco">Preço:</label>
        <input type="number" step="0.01" id="preco" name="preco" value="<?= $produto['preco']; ?>" required><br>

        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" value="<?= $produto['categoria']; ?>" required><br>

        <label for="data_validade">Data de Validade:</label>
        <input type="date" id="data_validade" name="data_validade" value="<?= $produto['data_validade']; ?>" required><br>

        <input type="submit" value="Salvar Alterações">
    </form>

</body>
</html>
