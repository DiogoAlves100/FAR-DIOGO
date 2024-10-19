<?php
require './configpdo.php';


$nomeProduto = $_POST['produto'];
$quantidadeProduto = $_POST['quantidade'];
$precoProduto = $_POST['preco'];
$categoriaProduto = $_POST['categoria'];
$dataValidadeProduto = $_POST['data_validade'];

$sql = $pdo->prepare("INSERT INTO medicamento (produto, preco, quantidade, categoria, data_validade) VALUES (:produto, :preco, :quantidade, :categoria, :data_validade)");


$sql->bindValue(':produto', $nomeProduto);
$sql->bindValue(':preco', $precoProduto);
$sql->bindValue(':quantidade', $quantidadeProduto); 
$sql->bindValue(':categoria', $categoriaProduto);
$sql->bindValue(':data_validade', $dataValidadeProduto);

header("Location: lista.php");

try {
    $sql->execute();
    echo "Medicamento cadastrado com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao cadastrar medicamento: " . $e->getMessage();
}
?>
